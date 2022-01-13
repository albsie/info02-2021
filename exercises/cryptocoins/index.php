<?php

$configs = include_once('config.php');

$filename = isset($_GET['filename']) ? $_GET['filename'] : 'home';

include_once "src/partials/head.php";
include_once "src/partials/header.php";

echo "<main>";

foreach ($configs as $key => $value) {
    if ($filename === $key || 'errorPage' === $key) {
        include_once $value['path'];
        break;
    }
}
echo "</main>";

include_once "src/partials/footer.php";
