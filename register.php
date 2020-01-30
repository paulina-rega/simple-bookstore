<?php
include 'session_support.php';
include 'database_connection.php';
include 'login_support.php';
init_cart();



?>




<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> Czytelnia </title>
<meta http-equiv="Content-type" content="text/html; charset=iso- 8859-2">
<meta name="Czytelnia" content=" [wstaw tu opis strony] "> <meta name="Keywords" content=" [wstaw tu slowa kluczowe] "> <meta name="Author" content=" [dane autora] ">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1><a href="/zadanie3/index.php">Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="/zadanie3/cart-details.php">Koszyk</a></li>
                <li><a href="/zadanie3/index.php">Strona głowna</a></li>
                <li><a href="/zadanie3/login.php">Zaloguj się</a></li>
            </ul>
        </div>
        <div class="main">
          <div>
            <h4>Tworzenie konta</h4>
            <form class="order-form" method="POST">
              <p>Login</p>
              <input type="text" maxlength="30" name="login" value="" required>
              <p>email</p>
              <input type="email" maxlength="255" name ="email" value="" required>
              <p>hasło</p>
              <input type="Password" name="password" minlength="8" maxlength="30"  required>
              <br><br>
              <input type="submit" name="button" value="Utwórz konto">
            </form>
          <div>

        </div>
        <?php
         $conn = open_connection();

         if (isset($_POST['button'])) {
           $login = $_POST['login'];
           if (check_if_login_is_available($login, $conn)) {
             register_user($_POST['login'], $_POST['email'], $_POST['password'], $conn);
           }
           else {
             echo "<br><br><h5>Ups! Wygląda na to, że login jest zajęty. Spróbuj jeszcze raz.</h5>";
           }
         }

         ?>
    </div>
</body>
</html>
