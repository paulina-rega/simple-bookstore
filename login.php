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
            <h1><a href="index.php">Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="cart-details.php">Koszyk</a></li>
                <li><a href="index.php">Strona głowna</a></li>
                <li><a href="register.php">Zarejestruj się</a></li>
            </ul>
        </div>
        <div class="main">
          <div>
            <h4>Logowanie</h4>
            <form class="order-form" method="POST">
              <p>Login</p>
              <input type="text" name ="login" value="">
              <p>hasło</p>
              <input type="password" name="password" value="">
              <br><br>
              <input type="submit" name="button" value="Zaloguj">
            </form>
          <div>
             <?php
              $conn = open_connection();

              if (isset($_POST['button'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                if (!check_if_login_is_available($login, $conn)) {
                  $login_output = login_user($login, $password, $conn);
                  if ($login_output) {
                    $_SESSION['user']=$login_output;
                    header('Location: index.php');
                  }
                  else {
                    echo "<br><br><h5>Hasło niepoprawne</h5>";
                  }
                }
                else {
                  echo "<br><br><h5>Ups! Podanego loginu nie ma w bazie</h5>";
                }
              }
              ?>
        </div>
    </div>
</body>
</html>
