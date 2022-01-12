<?php

if (isset($_POST['submit'])) {
    // Valiediere alle Felder mit den jeweiligen Werten
  // Errorhandling | Fehlerausgabe bei den Inputfeldern
  // Wenn alles ok, speichere in die Datenbank
}


?>

<div id="signup" class="container">
<h1>Regiestrierung</h1>
<div>
  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" placeholder="********" name="password">
    </div>
    <div class="mb-3">
      <label for="passwordRpt" class="form-label">Password Wiederholen</label>
      <input type="password" class="form-control" id="passwordRpt" placeholder="********" name="passwordRpt">
    </div>
    <div class="mb-3">
      <label for="firstname" class="form-label">Vorname</label>
      <input type="text" class="form-control" id="firstname" placeholder="Max" name="firstname">
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Nachname</label>
      <input type="text" class="form-control" id="lastname" placeholder="Mustermann" name="lastname">
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Adresse</label>
      <input type="text" class="form-control" id="address" placeholder="Mustergasse 8" name="address">
    </div>
    <div class="mb-3">
      <label for="zip" class="form-label">Postleitzahl</label>
      <input type="text" class="form-control" id="zip" placeholder="83022" name="zip">
    </div>
    <div class="mb-3">
      <label for="zip" class="form-label">Land</label>
      <select class="form-select" aria-label="Default select example">
        <option selected>wähle...</option>
        <option value="1">Deutschland</option>
        <option value="2">Österreich</option>
        <option value="3">Italien</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Geburtsdatum</label>
      <input type="date" class="form-control" id="age" placeholder="Max" name="age">
    </div>
    <div class="mb-3">
      <label class="form-label">Wählen Sie ihr Geschlecht</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="men">
        <label class="form-check-label" for="men">
        Mann
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="woman">
        <label class="form-check-label" for="woman">
        Frau
      </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="other">
        <label class="form-check-label" for="other">
        Divers
      </label>
      </div>
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="chkbox" name="agb">
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
