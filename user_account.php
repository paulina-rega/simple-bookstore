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
<meta http-equiv="Content-type" content="text/html; charset=utf8">
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
            </ul>
        </div>
        <div class="main">
          <div>
            <?php
              $conn = open_connection();
              $sql = "SELECT email FROM user WHERE id_number='".$_SESSION['user']['user_id']."';";
              $result = $conn->query($sql);

              if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $email = $row['email'];
                echo "<h5>email:</h5>";
                echo "<p>".$email."</p>";
                echo "<h5>login:</h5>";
                echo "<p>".$_SESSION['user']['user_login']."</p>";
              }
              ?>



            <form class="order-form" method="POST">
              <br>
              <input type="submit" name="button" value="Wyloguj się">
            </form>
          <div>
             <?php
              if (isset($_POST['button'])) {
                unset($_SESSION['user']);
                header('Location: /zadanie3/index.php');
              }

              ?>
        </div>
    </div>
</body>
</html>
