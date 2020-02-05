<?php
include 'session_support.php';
include 'database_connection.php';
include 'login_support.php';
init_cart();
check_if_user_is_logged($_SESSION["user"]);
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
            <h1><a href="index.php">>Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php">Strona głowna</a></li>
            </ul>
        </div>
        <div class="main">

            <?php
            if (sizeof($_SESSION['cart'])>0) {
              $_SESSION['cart'] = array();
              echo "<h4>Zamówienie złożone i niedługo je do ciebie wyślemy!</br> W razie pytań skontaktuj sie z info@example.pl</h4>";
            }
            else {
              echo "<h4>Ale przeciez Twój koszyk był pusty :( </h4>";
            }
           ?>

        </div>
    </div>
</body>
</html>
