<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "todo_list";
$error = "";
$success = false;
$successUpdate = false;
$priorityDatas = ["niedrig","mittel","hoch"];
$selectAll = "SELECT * FROM tasks";

$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $priority = $_POST['priority']; // niedrig mittel hoch

    try {
        if (strlen($name) <= 3 || strlen($name) > 20) {
            throw new Exception("Der Wert muss eine Länge zwischen 3 und 20 haben!");
        }

        if (!in_array($priority, $priorityDatas)) {
            throw new Exception("Die Priorität darf nicht diesen Wert haben!");
        }

        // 1. Speichere das Todo in die DB;
        $newTask = $pdo->prepare("INSERT INTO tasks (name, priority) VALUES (?,?)");
        if ($newTask->execute([$name, $priority])) {
            $success = true;
        }
    } catch (\Exception $e) {
        $error = $e->getMessage();
    }
}

  // 2. Mache eine Ausgabe der Daten in das output Element.
    $querys = $pdo->prepare($selectAll);
    $querys->execute();
    $tasks = $querys->fetchAll();


  // 3. Das Todo auf "done" setzen und optisch darstellen.
if (isset($_POST['done'])) {
    $updateTask = $pdo->prepare("UPDATE tasks SET done = 1 WHERE id = :id");
    if ($updateTask->execute([':id' => $_POST['done']])) {
        $successUpdate = true;
    }
    var_dump($_POST['done']);
}


  // 4. Lösche ein Todo

  if (isset($_POST['delete'])) {
      var_dump($_POST['delete']);
  }

  // 5. überprüfft ob die id ein int ist
  // 6. Wenn ein Task auf done gesetzt ist, dann soll der Button verschwinden.
  // 7. Zeige eine Status Meldung an ob der Eintrag auf erledigt gesetzt sowie gelöscht wurde.

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
#input{
  margin-top: 5vh;
}
#output{
  margin-top: 5vh;
}
#output ul {
  margin: 0;
  padding: 0 0 0 5px;
  list-style-type: none;
  display: grid;
  grid-template-columns: 1fr 3fr 2fr 2fr 2fr;
  grid-template-rows: repeat(auto-fill, 50px);
  border-bottom: 1px solid grey;
}
#output ul:first-of-type{
  border-bottom: 2px solid grey;
}
#output ul li{
  align-self: center;
}

#output ul:first-of-type li{
  font-weight: bold;
  align-self: end;
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

      <?php if ($error !== ""): ?>
        <div class="alert alert-danger" role="alert">
        <?=$error ?>
        </div>
      <?php endif; ?>

      <?php if ($success): ?>
        <div class="alert alert-success" role="alert">
        Das Todo wurde erfolgreich angelegt.
        </div>
      <?php endif; ?>

      <?php if ($successUpdate): ?>
        <div class="alert alert-success" role="alert">
        Das Todo wurde erfolgreich geupdated.
        </div>
      <?php endif; ?>

      <form class="row g-3" method="post">
        <div class="col-auto">
          <label for="todo" class="visually-hidden">Mein Todo</label>
          <input type="text" class="form-control" id="todo" placeholder="waschen" name="name">
        </div>
        <div class="col-auto">
          <select class="form-select" aria-label="Default select example" name="priority">
            <option selected>Wähle...</option>
            <option value="niedrig">Niedrig</option>
            <option value="mittel">Mittel</option>
            <option value="hoch">Hoch</option>
          </select>
        </div>
        <div class="col-auto">
          <button type="submit" name="register" class="btn btn-primary mb-3">Speichern</button>
        </div>
      </form>
    </section>
    <section id="output">
      <ul>
        <li>Nr.</li>
        <li>Todo</li>
        <li>Priorität</li>
        <li>Erledigt</li>
        <li>Löschen</li>
      </ul>

    <?php foreach ($tasks as $key => $value): ?>
      <ul>
        <li><?=$key + 1 ?></li>
        <li><?=$value['done'] ? "<s>" . $value['name'] . "</s>" : $value['name']?></li>
        <li><?=$value['priority']?></li>
        <li>
          <form method="post">
            <button type="submit" name="done" value="<?=$value['id']?>" class="btn btn-success">Erledigt</button>
          </form>
        </li>
        <li>
          <form method="post">
            <button type="submit" name="delete" value="<?=$value['id']?>" class="btn btn-danger">Löschen</button>
          </form>
        </li>
      </ul>
    <?php endforeach; ?>
    </section>
  </main>
  <footer></footer>
</body>
</html>
