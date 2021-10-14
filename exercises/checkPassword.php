<?php
// Erstelle eine Html Struktur mit zwei Inputfelder (Email + Passwort) und einem Button.
// Nach dem klick auf dem Button soll die Email und das Passwort in die output.php geladen werden, wo es überprüfft wird.

 ?>

 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <title>Login</title>
   </head>
   <body>
    <h1>Meine erste Loginseite.</h1>
      <main>
        <form class="row g-3">
          <div class="col-auto">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="example@php.de">
          </div>
          <div class="col-auto">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
          </div>
        </form>
      </main>

   </body>
 </html>
