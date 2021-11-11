<?php
$data = [
    [
        'name' => 'Trekkingschue',
        'type' => 'zuknöpfen',
        'sole' => 'outside',
        'min_size' => 32,
        'max_size' => 45,
        'color' => ['red', 'black', 'grey', 'orange'],
        'price' => 35.86,
        'stock' => 56,
        'gender' => 'm'
    ],
    [
        'name' => 'Fußballschuhe',
        'type' => 'zuknöpfen',
        'sole' => 'outside',
        'min_size' => 32,
        'max_size' => 47,
        'color' => ['red', 'black', 'blue', 'white', 'grey'],
        'price' => 143.98,
        'stock' => 23,
        'gender' => 'm'
    ],
    [
        'name' => 'Laufschuhe',
        'type' => 'zuknöpfen',
        'sole' => 'outside',
        'min_size' => 34,
        'max_size' => 46,
        'color' => ['red', 'black', 'blue', 'white'],
        'price' => 85.75,
        'stock' => 35,
        'gender' => 'm'
    ],
    [
        'name' => 'Fitnessschuhe',
        'type' => 'kleben',
        'sole' => 'inside',
        'min_size' => 35,
        'max_size' => 42,
        'color' => ['white', 'blue', 'deeppink'],
        'price' => 37.99,
        'stock' => 5,
        'gender' => 'w'
    ],
    [
        'name' => 'Duschschuhe',
        'type' => '',
        'sole' => 'inside',
        'min_size' => 35,
        'max_size' => 48,
        'color' => ['white', 'deeppink'],
        'price' => 9.99,
        'stock' => 158,
        'gender' => 'w'
    ],
    [
        'name' => 'Tennisschuhe',
        'type' => 'kleben',
        'sole' => 'inside',
        'min_size' => 32,
        'max_size' => 43,
        'color' => ['white', 'lightgrey', 'deeppink'],
        'price' => 49.99,
        'stock' => 20,
        'gender' => 'w'
    ],
    [
        'name' => 'Golfschuhe',
        'type' => 'zuknöpfen',
        'sole' => 'outside',
        'min_size' => 39,
        'max_size' => 46,
        'color' => ['white', 'grey', 'black'],
        'price' => 89.99,
        'stock' => 39,
        'gender' => 'm'
    ],
    [
        'name' => 'Handballschuhe',
        'type' => 'zuknöpfen',
        'sole' => 'inside',
        'min_size' => 37,
        'max_size' => 46,
        'color' => ['white', 'grey', 'black', 'blue', 'brown', 'green'],
        'price' => 99.99,
        'stock' => 69,
        'gender' => 'm'
    ],
    [
        'name' => 'Skateboardschuhe',
        'type' => 'zuknöpfen',
        'sole' => 'outside',
        'min_size' => 30,
        'max_size' => 42,
        'color' => ['white', 'grey', 'black', 'blue', 'brown', 'green', 'orange'],
        'price' => 112.49,
        'stock' => 178,
        'gender' => 'm'
    ],
    [
        'name' => 'Outdoorsandalen',
        'type' => 'kleben',
        'sole' => 'outside',
        'min_size' => 30,
        'max_size' => 45,
        'color' => ['white', 'grey', 'black', 'braun'],
        'price' => 39.99,
        'stock' => 249,
        'gender' => 'm'
    ],
    [
        'name' => 'Outdoorsandalen',
        'type' => 'kleben',
        'sole' => 'outside',
        'min_size' => 28,
        'max_size' => 43,
        'color' => ['white', 'grey', 'black', 'braun'],
        'price' => 39.99,
        'stock' => 179,
        'gender' => 'w'
    ]
];

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 		<title>Schuh Verkauf</title>
		<style media="screen">
			* {
				margin: 0;
				padding: 0;
        box-sizing: border-box;
        list-style-type: none;
        text-decoration: none;
			}
      main{
        min-height: 80vh;
      }

      main ul {
        margin: 0;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(10, 1fr);
      }
      li {
        border: 1px solid black;
        border-left: 0;
        margin-bottom: -1px;
      }
      li:first-of-type {
        border-left: 1px solid black;
      }
		</style>
 	</head>
 	<body>
 		<header>
      <nav class="navbar navbar-dark bg-primary">
       <div class="container-fluid">
         <a class="navbar-brand" href="#">
           <img src="img/shoe.png" alt="Shoe" width="30" height="24" class="d-inline-block align-text-top">
           Shuh Shop
         </a>
       </div>
      </nav>
     </header>
     <main class="container">
       <!-- Content -->
       <ul>
         <li>12</li>
         <li>32</li>
         <li>12</li>
         <li>33</li>
         <li>22</li>
         <li>12</li>
         <li>55</li>
         <li>12</li>
         <li>df</li>
         <li>23</li>
       </ul>
       <ul>
         <li>12</li>
         <li>32</li>
         <li>12</li>
         <li>33</li>
         <li>22</li>
         <li>12</li>
         <li>55</li>
         <li>12</li>
         <li>df</li>
         <li>23</li>
       </ul>
       <ul>
         <li>12</li>
         <li>32</li>
         <li>12</li>
         <li>33</li>
         <li>22</li>
         <li>12</li>
         <li>55</li>
         <li>12</li>
         <li>df</li>
         <li>23</li>
       </ul>
     </main>
     <footer>
       <nav class="navbar navbar-dark bg-primary">
         <div class="container-fluid">
           <a class="navbar-brand" href="#">
             <img src="img/shoe.png" alt="Shoe" width="30" height="24" class="d-inline-block align-text-top">
             Shuh Shop
           </a>
         </div>
       </nav>
     </footer>

 	</body>
 </html>
