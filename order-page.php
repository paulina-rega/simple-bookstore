<?php
include 'session_support.php';
include 'database_connection.php';
include 'login_support.php';
init_cart();
if (!isset($_SESSION['user'])) {
  header('Location: register.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> Czytelnia </title>
<meta http-equiv="Content-type" content="text/html; charset=utf8">
<meta name="Czytelnia" content=" Czytelnia. Księgarnia internetowa "> <meta name="Keywords" content="książki, księgarnia, sklep internetowy"> <meta name="Author" content="Paulina Rega">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1><a href="index.php">Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Strona główna</a></li>
            </ul>
        </div>
        <div class="main">
             <?php
              $conn = open_connection();

              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['btnsubmit']) && isset($_SESSION['cart'])) {
                  create_order($_SESSION['user']['user_id'], $conn, $_SESSION['cart']);

                  header('Location: order-completed.php');
                }
                else {
                  echo "Koszyk jest pusty!";
                }
              }
              ?>
              <form class="order-form" method="post">
                <p>imię</p>
                <input type ="text" name="firstname" required maxlength="50">
                <p>nazwisko</p>
                <input type ="text" name="lastname" required maxlength="50">
                <p>email</p>
                <input type="email"name="email" required maxlength="60">
                <p>telefon</p>
                <input type="tel" name="telephone" required pattern="[0-9]{9}">
                <p>ulica</p>
                <input type="text" name="street" required maxlength="30">
                <p>numer domu</p>
                <input type="text" name="house_number" required maxlength="10">
                <p>numer mieszkania</p>
                <input type="text" name="apartment_number" maxlength="10" class="basic-input" required>
                <p>miejscowość</p>
                <input type="text" name="city" maxlength="30" required>
                <p>kod pocztowy</p>
                <input type="text" name="postcode" required pattern="[0-9]{2}-[0-9]{3}"><br/>
                <input type="submit" name="btnsubmit" value="Zamów" class="submit-button">
              </form>
        </div>
    </div>
</body>
</html>
