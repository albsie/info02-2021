<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "todo_list";

$db = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);



if (isset($_POST['submitBtn'])) {
    $error = null;
    $dbError = null;
    $password = null;
    $email = null;
    $name = null;

    if (strlen($_POST['password']) > 8) {
        if ($_POST['passwordRpt'] === $_POST['password']) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // password hash
        } else {
            $error = "Die Passwortwiederholung ist nicht korrekt!";
        }
    } else {
        $error = "Das Passwort ist zu kurz!";
    }

    if (strlen($_POST['email']) > 3) {
        $email = $_POST['email'];
    } else {
        $error = "Ihre Email Adresse ist nicht korrekt";
    }

    if (strlen($_POST['name']) > 3) {
        $name = $_POST['name'];
    } else {
        $error = "Der Name ist nicht lange genug";
    }

    if ($error === null) {
        try {
            $statement = $db->prepare("
        INSERT INTO users (
          email, password, name
          ) VALUES (
            :email, :password, :name
            )");
            $statement->execute([
          'email' => $email,
          'password' => $password,
          'name' => $name
        ]);
            $dbError = false;
        } catch (PDOException $e) {
            $dbError = true;
            echo $e;
        }
    }
}

 ?>


 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style media="screen">
      #main-wrapper{
        margin: 10vh auto;
        max-width: clamp(300px, 50vw, 600px);
      }
      ol{
        margin: 10vh auto;
        max-width: clamp(500px, 80vw, 1300px);
      }
    </style>
    <title>Probe Klausur</title>
  </head>
  <body>

<header>
  <nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Probe Klausur</span>
  </div>
</nav>
</header>
<main>
<div id="main-wrapper">
<?php if (isset($error)) :?>
  <div class="alert alert-danger" role="alert"><?=$error?></div>
<?php endif; ?>
  <form method="post">
    <div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?=isset($email) ? $email : ''?>">
</div>
<div class="mb-3">
  <label for="password" class="form-label">Passwort</label>
  <input type="password" class="form-control" id="password" placeholder="******" name="password">
</div>
<div class="mb-3">
  <label for="passwordRpt" class="form-label">Passwort Wiederholen</label>
  <input type="password" class="form-control" id="passwordRpt" placeholder="******" name="passwordRpt">
</div>
<div class="mb-3">
  <label for="name" class="form-label">Vor- und Zuname</label>
  <input type="text" class="form-control" id="name" placeholder="Max Mustermann" name="name" value="<?=isset($name) ? $name : ''?>">
</div>
<?php if (isset($dbError) && $dbError === true) :?>
  <div class="alert alert-danger" role="alert">Der Eintrag wurde nicht gespeichert</div>
<?php endif; ?>
<?php if (isset($dbError) && $dbError === false) :?>
  <div class="alert alert-success" role="alert">Der Eintrag wurde erfolgreich gespeichert</div>
<?php endif; ?>
<div class="mb-3">
  <button type="submit" class="btn btn-success" name="submitBtn">Speichern</button>
</div>
  </form>
</div>
<ol>
  <h3>Deine Aufgabe für heute:</h3>
  <li>Erstelle eine neue Datenbank mit endsprechenden Spalten</li>
  <li>Valiediere diese Daten und gib einen Fehler aus, falls sie nicht stimmen</li>
  <li>Email muss unique sein und das Feld darf nicht leer sein; Passwort min. 8 Zeichen haben und mit der Passwort Wiederholung zusammenstimmen; Der Name muss eine Mindestlänge haben, das Feld darf nicht leer sein.</li>
  <li>Versuche das Passwort zu verschlüsseln [password_hash()]</li>
  <li>Speichere dieses Formular in die Datenbank</li>
  <li>Gib eine Meldung aus, wenn der Eintrag erfolgreich in die Datenbank gespeichert wurde</li>
  <li>Falls noch Zeit ist: erstelle eine zweite php Seite wo du alle Datenbank User, die du eingespeichert hast wieder ausgibst</li>
</ol>
</main>

  </body>
</html>
