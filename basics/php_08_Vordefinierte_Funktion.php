<?php

/* Vordefinierte Funktionen zum Typprüfen */
// is_int(), is_array(), is_bool(), is_float(), is_string(), is_numeric(), is_null(), is_empty()

//$zahl = 10;
//is_int($zahl)

/* Zwei sehr hilfreichen Funktionen zum Konvertieren von Arrays zu Strings und umgekrehrt */
// implode(), explode();

//$someString = 'Peter, Marc, Susi, Maria, Marcel';

//echo "<pre>";
//$arr = explode(', ', $someString);
//print_r($arr);

//echo "<br><br>";

//$string = implode(', ', $arr);

//var_dump($string);


// Strings

// Länge von einem String ermitteln
$str = "Hallo Info 2";
//echo strlen($str);

// den Index eines Strings ermitteln
//echo strpos($str, 'Info');

// einen Teilstring ausgeben
//$pos = strpos($str, 'Info'); // position von "Info" im $str
//$len = strlen('Info'); // string länge
//echo substr($str, $pos, 6);

// Zeichen auszauschen
//$str = str_replace('2', '1', $str);
//echo $str;

// strtolower($str) -> alles klein geschrieben
// strtoupper($str) -> alles groß schreiben
// ucfirst(strtolower($str)) -> alles klein -> erster Buchstabe groß
//var_dump(ucfirst(strtolower($str)));

// Wie findest du heraus ob das Wort Lagerregal ein Palindrome ist?
//$palindrome = "Lagerregal";
//var_dump(strrev(strtolower($palindrome)) === strtolower($palindrome));

//$str = "                   Test                      ";
// trim() löscht alle Leerzeichen || ltrim() löscht alle Whitespaces links || rtrim() löscht alle Whitespaces rechts
//var_dump(strlen(trim($str)));


$someString = "<b style='font-size: 100em'>Hallo</b>";

echo htmlentities($someString); // output: <b style='font-size: 100em'>Hallo</b>
echo "<br>";
echo strip_tags($someString);// Hallo
