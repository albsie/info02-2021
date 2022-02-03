<?php

$countrys = include_once "countrys.php";

$errors = [];

if (isset($_POST['submit'])) {
    $email = null;
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $email = null;
        $errors['email'] = "Bitte geben Sie eine korrekte E-Mail Adresse ein.";
    }
    $password = null;
    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['password'])) {
        $password = $_POST['password'] === $_POST['passwordRpt'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) :
        $errors['passwordRpt'] = "Die Wiederholung vom Password stimmt nicht mit dem Password zusammen.";
    } else {
        $password = null;
        $errors['password'] = "Das Passwort muss aus mindestens 8 Zeichen bestehen und muss mindestens eine Nummer, ein Großbuchstaben, ein Kleinbuchstaben und ein Spezialzeichen enthalten.";
    }

    $firstname = verifyString(2, 255, "firstname");
    $lastname = verifyString(2, 255, "lastname");
    $address = verifyString(3, 255, "address");
    $zip = verifyString(4, 6, "zip");
    $country = 0;
    if (isset($_POST['country'])) {
        $countryVal = filter_var($_POST['country'], FILTER_VALIDATE_INT);
        if ($countryVal > 0 && $countryVal <= count($countrys)) {
            $country = $countryVal;
        } else {
            $errors['country'] = "Bitte wählen Sie ein Land aus";
        }
    }
    $age = null;
    if (isset($_POST['age'])) {
        $ageDate = date_create_from_format('Y-m-d', $_POST['age']);
        $now = date_create_from_format('Y-m-d', date('Y-m-d'));
        $ageDiff = date_diff($ageDate, $now);
        if ($ageDiff->y >= 16 && $now > $ageDate) {
            $age = date_format($ageDate, 'Y-m-d');
        } else {
            $errors['age'] = "Sie müssen mindestens 16 Jahre alt sein um sich regiestrieren zu können.";
        }
    } else {
        $errors['age'] = "Wählen Sie ihr Geburtsdatum aus.";
    }

    $gender= null;
    if (isset($_POST['gender'])) {
        $genderValues = ['m', 'w', 'o'];
        if (in_array($_POST['gender'], $genderValues)) {
            $gender = $_POST['gender'];
        } else {
            $errors['gender'] = "Die Auswahl hat nicht funktioniert.";
        }
    } else {
        $errors['gender'] = "Wählen Sie ihr Geschlecht.";
    }
    $agb= "";
    if ($_POST['agb'] === '1') {
        $agb = date("Y-m-d H:i:s");
    } else {
        $errors['agb'] = "Bestätigen Sie die AGB's um mit der Regiestrierung fort zu fahren.";
    }

    echo "<br>";
    echo "<pre>";
    print_r($errors);
    echo "</pre>";
    $now = date('Y-m-d H:i:s');
    if (count($errors) === 0) {
        try {
            $statement = $db->prepare("
      INSERT INTO users (
        email, password, firstname, lastname, address, zip, country, age, gender, agb, last_login
        ) VALUES (
          :email, :password, :firstname, :lastname, :address, :zip, :country, :age, :gender, :agb, :last_login
          )");
            $statement->execute([
        ':email' => $email,
        ':password' => $password,
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':address' => $address,
        ':zip' => $zip,
        ':country' => $country,
        ':age' => $age,
        ':gender' => $gender,
        ':agb' => $agb,
        ':last_login' => $now
      ]);
        } catch (PDOException $Exception) {
            die($Exception->getMessage() . " | " . $Exception->getCode() . " | " . Exception->getTrace());
        }
    }
}

function verifyString($min, $max, $key)
{
    global $errors;
    $string = $_POST[$key];
    if (strlen($string) >= $min && strlen($string) <= $max) {
        return $string;
    } else {
        $errors[$key] = strlen($string) >= $min ? "Der Wert ist zu lange." : "Der Wert ist zu kurz.";
        return null;
    }
};

?>

<div id="signup" class="container">
<h1>Regiestrierung</h1>
<div>
  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" placeholder="********" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="passwordRpt" class="form-label">Password Wiederholen</label>
      <input type="password" class="form-control" id="passwordRpt" placeholder="********" name="passwordRpt" value="<?= isset($_POST['passwordRpt']) ? $_POST['passwordRpt'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="firstname" class="form-label">Vorname</label>
      <input type="text" class="form-control" id="firstname" placeholder="Max" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Nachname</label>
      <input type="text" class="form-control" id="lastname" placeholder="Mustermann" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Adresse</label>
      <input type="text" class="form-control" id="address" placeholder="Mustergasse 8" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="zip" class="form-label">Postleitzahl</label>
      <input type="text" class="form-control" id="zip" placeholder="83022" name="zip" value="<?= isset($_POST['zip']) ? $_POST['zip'] : '' ?>">
    </div>
    <div class="mb-3">
      <label for="zip" class="form-label">Land</label>
      <select class="form-select" name="country">

        <?php
        $country = isset($_POST['country']) ? $_POST['country'] : 0;
         ?>

        <?php foreach ($countrys as $key => $value): ?>
          <option <?= $country == $key ? 'selected' : '' ?> value="<?= $key?>"><?= $value?></option>
        <?php endforeach; ?>

      </select>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Geburtsdatum</label>
      <input type="date" class="form-control" id="age" placeholder="Max" name="age" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Wählen Sie ihr Geschlecht</label>

      <?php
      $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
       ?>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="m" <?=$gender === 'm' ? 'checked' : ''?> id="man">
        <label class="form-check-label" for="man">
        Mann
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="w" <?=$gender === 'w' ? 'checked' : ''?> id="woman">
        <label class="form-check-label" for="woman">
        Frau
      </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="o" <?=$gender === 'o' ? 'checked' : ''?> id="other">
        <label class="form-check-label" for="other">
        Divers
      </label>
      </div>
    </div>
    <div class="mb-3">
      <div class="form-check">

        <?php
        $agb = isset($_POST['agb']) ? $_POST['agb'] : 0;
         ?>

        <input type="hidden" name="agb" value="0">
        <input class="form-check-input" type="checkbox" value="1" id="chkbox" name="agb" <?= $agb == 1 ? 'checked' : ''?>>
        <label class="form-check-label" for="chkbox">
        Hiermit bestätige ich die allgemeinen Geschäftsbedingungen.
      </label>
    </div>
    </div>
    <button type="reset" class="btn btn-danger">Löschen</button>
    <button type="submit" name="submit" class="btn btn-success">Speichern</button>
  </form>
</div>
</div>
