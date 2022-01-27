<?php
// php Code
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
        max-width: clamp(500px, 50vw, 900px);
      }
      ol{
        margin: 10vh auto;
        max-width: clamp(500px, 80vw, 1300px);
      }
      #input{
        margin: 5vh 0;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 50px;
      }
      #output{
        margin: 5vh 0;
      }
      #output ul{
        margin: 0;
        padding: 0;
        list-style-type: none;
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 1fr;
        grid-gap: 20px;
        border-bottom: 1px solid black;
      }
      #output ul li{
        padding-left: 5px;
        font-size: 1.2em;
      }
    </style>
    <title>Klausur</title>
  </head>
  <body>

<header>
  <nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Klausur - Einkaufsliste</span>
  </div>
</nav>
</header>
<main>
<div id="main-wrapper">
  <h1>Einkaufsliste</h1>
  <section id="output">
    <!-- Beispielliste -->
    <ul>
      <li>1.</li>
      <li>Honig</li>
      <li>2 Gläser</li>
      <li>
        <form>
          <button type="button" class="btn-close" aria-label="Close"></button>
        </form>
      </li>
    </ul>
    <ul>
      <li>2.</li>
      <li>Milch</li>
      <li>1l</li>
      <li>
        <form>
          <button type="button" class="btn-close" aria-label="Close"></button>
        </form>
      </li>
    </ul>
    <!-- Beispielliste fertig -->
  </section>
  <div class="alert alert-danger" role="alert">Eine Fehlermeldung</div>
  <div class="alert alert-success" role="alert">Erfolgreichmeldung</div>
  <form method="post">
<section id="input">
  <input type="text" class="form-control" id="name" placeholder="Brot">
  <input type="text" class="form-control" id="amount" placeholder="Menge">
  <button type="submit" class="btn btn-success">Hinzufügen</button>
</section>
  </form>
</div>
<ol>
  <h3>Deine Aufgabe:</h3>
  <li>Erstelle eine neue Datenbank mit endsprechenden Spalten für die Einkaufsliste.</li>
  <li>Validiere die Eingabe und gib einen Fehler aus, falls der Wert nicht richtig oder leer ist.</li>
  <li>Speichere die Werte der Einkaufliste in die Datenbank</li>
  <li>Gib eine Meldung aus, wenn der Eintrag erfolgreich in die Datenbank gespeichert wurde - gib einen Fehler aus, wenn nicht.</li>
  <li>Gib die Daten der Einkaufliste aus wie in der Beispielliste dargestellt.</li>
  <li>Wenn man auf das X klickt, soll der Eintrag aus der Datenbank gelöscht werden.</li>
  <li>Exportiere die Datenbank und schicke sie zusammen mit der php Datei als zip/rar an albsie@hotmail.com</li>
  <li>Die Bewertung: Datenbank erstellen 20P, Eingabe in die DB 20P, Validierung der Daten | Fehlermeldungen | Erfolgsmeldungen 20P, Ausgabe aus der DB 20P, Löschen aus der DB 20P</li>
</ol>
</main>

  </body>
</html>
