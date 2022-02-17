<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 ?>
<header>
  <nav>
    <ul>
      <li class="menu-link"><a href="home"><img id="nav-image" src="assets/img/coin.png" alt="CryptoCoins"></a></li>
      <li>
        <ul>
          <li class="menu-link"><a href="home">Home</a></li>
          <li class="menu-link"><a href="aboutus">Über uns</a></li>
          <li class="menu-link"><a href="contact">Kontakt</a></li>
        </ul>
      </li>
      <li>
        <ul>
        <?php if (isset($_SESSION['user_id'])):?>
          <li class="menu-link">Hallo <?=$_SESSION['firstname']?></li>
          <li class="menu-link"><a href="signout">Abmelden</a></li>
        <?php else : ?>
          <li class="menu-link"><a href="signin">Anmeldung</a></li>
          <li class="menu-link"><a href="signup">Registrieren</a></li>
        <?php endif ?>
        </ul>
      </li>
    </ul>
  </nav>
</header>
