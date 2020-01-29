<?php
include 'session_support.php';
include 'database_connection.php';
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
                <li><a href="/zadanie3/index.php">Strona główna</a></li>
            </ul>
        </div>
        <div class="main">
             <?php
              $conn = open_connection();

              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['btnsubmit'])) {
                    $to = "paulina.m.rega@gmail.com";
                    $from= $_POST['email'];
                    $name = $_POST['firstname'].' '.$_POST['lastname'];
                    $address1 = $_POST['street'].' '.$_POST['house_number'].'/'.$_POST['apartment_number'];
                    $address2 = $_POST['city'].' '.$_POST['postcode'];
                    $address = $address1."\n".$address2;
                    $number = $_POST['telephone'];
                    $message = $name ."\n\n" . $address."\n\n Telefon: ".$number;
                    $message = $message."\n";
                    echo $message;
                    foreach ($_SESSION['cart'] as $item) {
                        $message=$message."ID produktu: ".$item['id'].", ilosc: ".$item['quantity']."\n";
                    }
                    $headers = "Order from:" . $from;
                    mail($to,$subject,$message,$headers);
                    $_SESSION['cart'] = array();
                    header('Location: /zadanie3/order-completed.php');
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
