<?php

$fruits = [
'banana',
'apple',
'orange'
];

// for ($i=0; $i < ; $i++) { code... }

for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i] . '<br>';
}

echo '<br><br><br><br><br>';

// foreach ($variable as $key => $value) { code... }

foreach ($fruits as $key => $value) {
    echo $key . ": " . $value . '<br>';
}

echo '<br><br><br><br><br>';

// do while ($a <= 10) { code... }

$i = 0;
do {
    echo $fruits[$i] . '<br>';
    $i++;
} while ($i < count($fruits));

echo '<br><br><br><br><br>';

// while ($a <= 10) { code... }

$i = 0;
while ($i < count($fruits)) {
    echo $fruits[$i] . '<br>';
    $i++;
}

echo '<br><br><br><br><br>';


$student = [
  'name' => 'Max',
  'age' => 20,
  'hobbies' => 'Essen, Schlafen'
];

foreach ($student as $key => $value) {
    echo $key . ': ' . $value . '<br>';
}

echo '<br><br><br><br><br>';

$students = [
  [
    'name' => 'Max',
    'age' => 20,
    'hobbies' => 'schlafen, essen'
  ],
  [
    'name' => 'Michael',
    'age' => 19,
    'hobbies' => 'onlinegames, Fahrad fahren'
  ],
  [
    'name' => 'Killian',
    'age' => 18,
    'hobbies' => 'coden, laufen'
  ],
  [
    'name' => 'Felix',
    'age' => 18,
    'hobbies' => 'schwimmen, coden'
  ],
  [
    'name' => 'Chris',
    'age' => 21,
    'hobbies' => 'Kino, Tennis'
  ]
];

foreach ($students as $student) {
    echo '<h2>' . $student['name'] . '</h2>';
    echo '<ul>';
    //echo '<li>' . $student['age'] . '</li>';
    //echo '<li>' . $student['hobbies'] . '</li>';
    foreach ($student as $key => $value) {
        echo '<li>' . $key . ': ' . $value . '</li>';
    }
    echo '</ul>';
}
