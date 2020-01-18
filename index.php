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
                <li><a href="/zadanie2/cart-details.php">Koszyk</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="#">Kontakt</a></li>

            </ul>
        </div>
        <div class="main">


             <?php


              $conn = open_connection();

              $sql = "SELECT id_book, title, price, author, img_link FROM book";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo '<div class="book-box">';
                      echo "\n";
                      echo '<img src="'. $row['img_link'] .  'alt="book cover picture" border="0">';
                      echo "\n";
                      echo '<a href="/zadanie2/book-details.php?id_book='.$row['id_book'].'" class="book-title">'. $row['title'] .'</a>';
                      echo "\n";
                      echo '<p class="author-caption">'.$row['author'].'</p>';
                      echo "\n";
                      echo '<p class="price">'.$row['price'].' zł</p>';
                      echo "\n";
                      echo '</div>';
                      echo "\n";

                  }
              } else {
                  echo "0 results";
              }

              ?>



        </div>
    </div>


</body>
</html>
