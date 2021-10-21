<?php

// Kontrollstrukturen braucht man um Verzweigungen zu realiesieren

$guthaben = 10;
$limit = 5;

// Einfachverzweigung mit if/else

if ($guthaben > $limit) {
    echo "alles ok";
} else {
    echo "Guthaben bitte aufladen";
}
echo "<br>";
// Mehrfachverzweigung mit switch/case

switch ($guthaben) {
  case $guthaben > $limit:
    echo "Alles ok";
    break;
  case $guthaben === $limit:
    echo "Sie haben ihr Limit erreicht";
    break;
  default:
    echo "Guthaben bitte aufladen";
}
echo "<br>";

if (true) {
    echo "Hallo";
}
