<?php

$countrys = include_once "countrys.php";

if (isset($_POST['submit'])) {
    var_dump($_POST);
}


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
