<?php
// 2. POST Request
// 3. Berechne ob das eingegebene Jahr ein Schaltjahr ist oder nicht.

// INFO: Jedes Schaltjahr ist ein Jahr, das durch 4 teilbar ist.

$isLeapYear = null;
$year = null;

if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $isLeapYear = $year % 4 === 0 ? true : false;
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <title>Schaltjahr berechnen</title>
     <style media="screen">
       h1{
         color: darkblue;
       }
       header{
         margin-bottom: 5vh;
       }
       input {
         max-width: 25%;
       }
       .done{
         background-color: lightgreen;
       }
       .error{
         background-color: red;
       }
       .msg{
         margin-top: 5vh;
         font-size: 16pt;
         padding: 2vh 2vw;
       }
     </style>
   </head>
   <body>
     <div class="container">
       <header>
         <h1>Schaltjahr überprüffen</h1>
       </header>
       <main >
         <!-- 1. Inputfelt [name=year] + Button -->
         <form method="post">
           <div class="mb-3">
             <label for="year" class="form-label">Email address</label>
             <input type="number" class="form-control" id="year" placeholder="Schaltjahr" name="year" value="<?=isset($year) ? $year : ''?>">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         <?php if ($isLeapYear === true): ?>
          <div class="msg done">Das Jahr <?=$year?> ist ein Schaltjahr.</div>
         <?php elseif ($isLeapYear === false): ?>
          <div class="msg error">Das Jahr <?=$year?> ist kein Schaltjahr.</div>
         <?php endif ?>
       </main>
       <footer></footer>
     </div>


      <!-- 4. Wenn ja: dann Meldung [eingegebenes Jahr] ist ein Schaltjahr -->
      <!-- 5. Wenn nein: dann Meldung [eingegebenes Jahr] ist kein Schaltjahr -->

   </body>
 </html>
