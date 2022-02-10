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
        $errors['passwordRpt'] = $errors['password'];
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
    if (isset($_POST['age']) && $_POST['age'] !== "") {
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
      <input type="email" class="form-control <?=isset($errors['email']) ? 'is-invalid' : (isset($_POST['email']) ? 'is-valid' : '')?>" id="email" placeholder="name@example.com" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
      <?php if (isset($errors['email'])): ?>
        <div id="validationEmail" class="invalid-feedback"><?=$errors['email']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control <?=isset($errors['password']) ? 'is-invalid' : (isset($_POST['password']) ? 'is-valid' : '')?>" id="password" placeholder="********" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
      <?php if (isset($errors['password'])): ?>
        <div id="validationPassword" class="invalid-feedback"><?=$errors['password']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="passwordRpt" class="form-label">Password Wiederholen</label>
      <input type="password" class="form-control <?=isset($errors['passwordRpt']) ? 'is-invalid' : (isset($_POST['passwordRpt']) ? 'is-valid' : '')?>" id="passwordRpt" placeholder="********" name="passwordRpt" value="<?= isset($_POST['passwordRpt']) ? $_POST['passwordRpt'] : '' ?>">
      <?php if (isset($errors['passwordRpt'])): ?>
        <div id="validationPasswordRpt" class="invalid-feedback"><?=$errors['passwordRpt']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="firstname" class="form-label">Vorname</label>
      <input type="text" class="form-control <?=isset($errors['firstname']) ? 'is-invalid' : (isset($_POST['firstname']) ? 'is-valid' : '')?>" id="firstname" placeholder="Max" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
      <?php if (isset($errors['firstname'])): ?>
        <div id="validationFirstname" class="invalid-feedback"><?=$errors['firstname']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Nachname</label>
      <input type="text" class="form-control <?=isset($errors['lastname']) ? 'is-invalid' : (isset($_POST['lastname']) ? 'is-valid' : '')?>" id="lastname" placeholder="Mustermann" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
      <?php if (isset($errors['lastname'])): ?>
        <div id="validationLastname" class="invalid-feedback"><?=$errors['lastname']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Adresse</label>
      <input type="text" class="form-control <?=isset($errors['address']) ? 'is-invalid' : (isset($_POST['address']) ? 'is-valid' : '')?>" id="address" placeholder="Mustergasse 8" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>">
      <?php if (isset($errors['address'])): ?>
        <div id="validationAddress" class="invalid-feedback"><?=$errors['address']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="zip" class="form-label">Postleitzahl</label>
      <input type="text" class="form-control <?=isset($errors['zip']) ? 'is-invalid' : (isset($_POST['zip']) ? 'is-valid' : '')?>" id="zip" placeholder="83022" name="zip" value="<?= isset($_POST['zip']) ? $_POST['zip'] : '' ?>">
      <?php if (isset($errors['zip'])): ?>
        <div id="validationZip" class="invalid-feedback"><?=$errors['zip']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="zip" class="form-label">Land</label>
      <select class="form-select <?=isset($errors['country']) ? 'is-invalid' : (isset($_POST['country']) ? 'is-valid' : '')?>" name="country" aria-describedby="validationCountry">

        <?php
        $country = isset($_POST['country']) ? $_POST['country'] : 0;
         ?>

        <?php foreach ($countrys as $key => $value): ?>
          <option <?= $country == $key ? 'selected' : '' ?> value="<?= $key?>"><?= $value?></option>
        <?php endforeach; ?>

      </select>
      <?php if (isset($errors['country'])): ?>
        <div id="validationCountry" class="invalid-feedback"><?=$errors['country']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Geburtsdatum</label>
      <input type="date" class="form-control <?=isset($errors['age']) ? 'is-invalid' : (isset($_POST['age']) ? 'is-valid' : '')?>" id="age" placeholder="Max" name="age" value="<?= isset($_POST['age']) ? $_POST['age'] : '' ?>">
      <?php if (isset($errors['age'])): ?>
        <div id="validationAge" class="invalid-feedback"><?=$errors['age']?></div>
      <?php endif ?>
    </div>
    <div class="mb-3">
      <label class="form-label">Wählen Sie ihr Geschlecht</label>

      <?php
      $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
       ?>

      <div class="form-check">
        <input class="form-check-input <?=isset($errors['gender']) ? 'is-invalid' : (isset($_POST['gender']) ? 'is-valid' : '')?>" type="radio" name="gender" value="m" <?=$gender === 'm' ? 'checked' : ''?> id="man">
        <label class="form-check-label" for="man">
        Mann
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input <?=isset($errors['gender']) ? 'is-invalid' : (isset($_POST['gender']) ? 'is-valid' : '')?>" type="radio" name="gender" value="w" <?=$gender === 'w' ? 'checked' : ''?> id="woman">
        <label class="form-check-label" for="woman">
        Frau
      </label>
      </div>
      <div class="form-check">
        <input class="form-check-input <?=isset($errors['gender']) ? 'is-invalid' : (isset($_POST['gender']) ? 'is-valid' : '')?>" type="radio" name="gender" value="o" <?=$gender === 'o' ? 'checked' : ''?> id="other">
        <label class="form-check-label" for="other">
        Divers
      </label>
      <?php if (isset($errors['gender'])): ?>
        <div id="validationGender" class="invalid-feedback"><?=$errors['gender']?></div>
      <?php endif ?>
      </div>
    </div>
    <div class="mb-3">
      <div class="form-check">

        <?php
        $agb = isset($_POST['agb']) ? $_POST['agb'] : 0;
         ?>

        <input type="hidden" name="agb" value="0">
        <input class="form-check-input <?=isset($errors['agb']) ? 'is-invalid' : (isset($_POST['agb']) ? 'is-valid' : '')?>" type="checkbox" value="1" id="chkbox" name="agb" <?= $agb == 1 ? 'checked' : ''?>>
        <?php if (isset($errors['agb'])): ?>
          <div id="validationAgb" class="invalid-feedback"><?=$errors['agb']?></div>
        <?php endif ?>
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
