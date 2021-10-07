<?php

$name = "Sigi";
$zahl = [1,2,3,4,5,6,7,8,9,10];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>meine erste PHP Seite</title>
  </head>
  <body>
    <header>
      Mein Menu
    </header>
    <main>
      Mein Name ist <?php echo $name ?>
</main>
<section>
  <ul>
    <?php foreach ($zahl as $value): ?>
    <li><?=$value?></li>
  <?php endforeach;?>
  </ul>
</section>
     <?php
     $color = null;
if ($name === "Sigi"){
  $color = "blue";
} else {
  $color = "red";
}

echo '<script type="text/javascript">
  let main = document.querySelector("main");
  main.style.color = "' . $color . '";
</script>'

      ?>

  </body>
</html>
