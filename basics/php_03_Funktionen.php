<?php

$someVar = 'Hallo Info 2';

/*
Gültigkeitsbereich von Variablen bei Funktionen

Jede Funktion definiert einen eigen Gültigkeitsbereich/Scope
*/

$output = function () use ($someVar) {
  // global $someVar Macht die Variable im Scope sichtbar
  echo $someVar;
};

$output(); // Keine Ausgabe solange die Variable nicht global ist

 ?>
