<?php


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
    <title>Hello, world!</title>
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
  <form>
    <div class="mb-3">
  <label for="email" class="form-label">Email address</label>
  <input type="email" class="form-control" id="email" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="password" class="form-label">Passwort</label>
  <input type="password" class="form-control" id="password" placeholder="******">
</div>
<div class="mb-3">
  <label for="passwordRpt" class="form-label">Passwort Wiederholen</label>
  <input type="password" class="form-control" id="passwordRpt" placeholder="******">
</div>
<div class="mb-3">
  <label for="name" class="form-label">Vor- und Zuname</label>
  <input type="text" class="form-control" id="name" placeholder="Max Mustermann">
</div>
<div class="mb-3">
  <button type="submit" class="btn btn-success">Speichern</button>
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
