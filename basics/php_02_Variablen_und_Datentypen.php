<?php
// Variablen in php

// Primitive Datentypen

$number = 1; // Integer

$text = "Hallo Info 2"; // String

$isBoolean = true; // Boolean

// Debuggen von primitiven Datentypen
var_dump($isBoolean);
echo "<br>";
echo gettype($isBoolean);
echo "<br>";
echo "<br>";
echo "<br>";


// Komplexe Datentypen

// Numerische Arrays

$numericArray = ['Test', 5, true];
//var_dump($numericArray);
//print_r($numericArray);

// Assoziative Arrays
$assocArray = [
  'name' => 'Sigi',
  'age' => 21,
  'sleep' => false
];
echo '<pre>';
print_r($assocArray);
echo '</pre>';

//die($text); // Bricht die Scriptausführung ab und kann als Parameter eine Information enthalten.

function dd($var) {
  if (is_array($var)){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
  } else {
    var_dump($var);
  }
  die();
}

dd($assocArray);

 ?>
