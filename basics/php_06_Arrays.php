<?php

$arr = [1,2,3,4,5];
// old version: $arr = array(1,2,3,4,5);

// einige Nummern hinzufügen?
// ähnlich wie in JS:

array_push($arr, 6, 7, 8, 9);
$arr[] = 10;
$arr[] = 11;
$arr[] = 12;
$arr[] = 13;
$arr[] = 14;

echo "<pre>";
print_r($arr);
echo "</pre><br><br><br>";

// Assoziative Arrays

// JS:
/*
var obj = {
'name': 'Sigi',
'age': 21
}
*/

$assocArray = [
  'name' => 'Sigi',
  'age' => 21,
  'sun' => true
];

echo "<pre>";
print_r($assocArray);
echo "</pre><br><br><br>";
