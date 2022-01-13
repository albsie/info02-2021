<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "cryptocoins";

$db = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
