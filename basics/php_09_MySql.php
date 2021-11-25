<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "todo_list";

/*
mysqli Methode
$db = new mysqli($host, $user, $password, $database);
if ($db->connect_error) {
    die("Verbindung fehlgeschlagen: " . $db->connect_error);
}
*/

/*
pdo Methode
*/
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);

$select = "SELECT * FROM tasks";

//$newTask = $pdo->prepare("INSERT INTO tasks (name, priority) VALUES (?, ?)");
//$newTask->execute(["putzen", "hoch"]);

//$updateTask = $pdo->prepare("UPDATE tasks SET priority= :priority WHERE id = :id");
//$updateTask->execute([':id' => 2, ':priority' => 'hoch']);

$deleteTask = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
$deleteTask->execute([':id' => 2]);

//var_dump($pdo->lastInsertId()); Zeigt die letzte eingespeicherte ID;

foreach ($pdo->query($select) as $item) {
    var_dump($item);
}


/*
erster Weg
$tasks = mysqli_query($db, $select);
var_dump(mysqli_fetch_assoc($tasks));
*/

/*
zweite Möglichkeit
$tasks = $db->prepare($select);
$tasks->execute();
$result = $tasks->get_result();
var_dump($result->fetch_object());
*/
