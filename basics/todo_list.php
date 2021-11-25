<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "todo_list";

$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
header{
  margin-bottom: 5vh;
}
</style>
  <title>Todo List</title>
</head>
<body>
  <header>
    <!-- As a heading -->
<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Navbar</span>
  </div>
</nav>
  </header>
  <main class="container">
    <section id="input">
      <form class="row g-3">
        <div class="col-auto">
          <label for="todo" class="visually-hidden">Mein Todo</label>
          <input type="text" class="form-control" id="todo" placeholder="waschen">
        </div>
        <div class="col-auto">
          <select class="form-select" aria-label="Default select example">
            <option selected>Wähle...</option>
            <option value="niedrig">Niedrig</option>
            <option value="mittel">Mittel</option>
            <option value="hoch">Hoch</option>
          </select>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">Speichern</button>
        </div>
      </form>
    </section>
    <section id="output">

    </section>
  </main>
  <footer></footer>
</body>
</html>
