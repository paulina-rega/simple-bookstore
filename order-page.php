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
            <h1><a href="#">Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="/zadanie2/index.php">Strona głowna</a></li>
            </ul>
        </div>
        <div class="main">
             <?php
              $conn = open_connection();


              if(isset($_POST['submit'])){
                ini_set("SMTP","aspmx.l.google.com");
                  $to = "paulina.m.rega@gmail.com"; // this is your Email address
                  $from= $_POST['email']; // this is the sender's Email address
                  $name = $_POST['firstname'].' '.$_POST['lastname'];
                  $address1 = $_POST['street'].' '.$_POST['house_number'].'/'.$_POST['apartment_number'];
                  $address2 = $_POST['city'].' '.$_POST['postcode'];
                  $address = $address1."\n".$address2;
                  $number = $_POST['telephone'];
                  $message = $name ."\n\n" . $address."\n\n Telefon: ".$number;

                  echo $message;
                  $headers = "Order from:" . $from;
                  mail($to,$subject,$message,$headers);

                  echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
                  // You can also use header('Location: thank_you.php'); to redirect to another page.
                  }


              ?>

              <form class="order-form" action:"" method:"post" enctype="text/plain">
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
                <input type="text" name="apartment_number" maxlength="10" class="basic-input">
                <p>miejscowość</p>
                <input type="text" name="city" maxlength="30" required>
                <p>kod pocztowy</p>
                <input type="text" name="postcode" required pattern="[0-9]{2}-[0-9]{3}"><br/>
                <input type="submit" value="Zamów" class="submit-button">
              </form>



        </div>
    </div>
</body>
</html>
