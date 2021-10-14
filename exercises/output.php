<?php
// Überprüffe deine Daten und mache eine Ausgabe (Angemeldet oder nicht)

$email = "test@php.de";
$password = "php123";
$auth = false;


if(isset($_POST['email']) && isset($_POST['password'])) {
  if ($_POST['email'] === $email && $_POST['password'] === $password){
    $auth = true;
  } else {
    header("Location: checkPassword.php?error=login");
exit();
  }
} else {
  echo "Sie sind nicht berechtigt";
}


 ?>

<?php if ($auth):?>

<h1 style="color:red">Super du bist angemeldet!!!</h1>
<p>Hier ist jetzt ein angemeldeter Bereich</p>

<?php endif; ?>
