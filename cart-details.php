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
        <div class="menu cart-margin">
          <ul>
              <li><a href="index.php">Strona główna</a></li>
              <?php
                if (!isset($_SESSION['user'])) {
                  echo '<li><a href="register.php">Zarejestruj się</a></li>';
                  echo '<li><a href="login.php">Zaloguj się</a></li>';
                }
                else {
                  echo '<li><a href="user_account.php">Twoje konto</a></li>';
                }
              ?>
          </ul>
        </div>

        <div class="main">


          <?php

           if (!isset($_SESSION['cart']['id_book'])) {
             echo '<p class="empty-cart-msq"><br/><br/><br/><br/>Koszyk jest pusty!</p>';
           }
           else {


             echo '<table class ="table-cart cart-margin">';
             echo '<tr><td colspan="5"><h3 class="cart-title"><br/><br/>Koszyk</h3></td></tr>';

             $conn = open_connection();
             if (isset($_POST['button-change'])) {
                 if ($_POST['button-change']=='+') {
                   book_plus($_POST['book-id']);
                 }
                 else if ($_POST['button-change']=='-'){
                   book_minus($_POST['book-id']);
                 }
             }



              echo '<tr class="info">
              <td><p></p></td>
              <td>tytuł</td>
              <td>ilość</td>
              <td>cena</td>
              </tr>';
              $total_amount = 0;
               foreach ($_SESSION['cart'] as $item) {
                  echo '<tr>';
                  $sql = "SELECT id_book, title, price, img_link FROM book WHERE id_book=".$item['id'];
                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) {
                      $quantity = $_SESSION['cart'][$row['id_book']]['quantity'];
                      echo '<td><img src="'. $row['img_link'] .  'alt="book cover picture" border="0" ></td>';
                      echo '<td>'.$row['title'].'</td>';
                      echo '<td class="book-quantity">'.$quantity.'</td>';
                      echo '<td>'.$row['price']*$quantity.' zł</td>';
                      echo '<td>';
                      echo '<form method="post">';
                      echo '<input type="hidden" name="book-id" value="'.$row['id_book'].'">';
                      echo '<input type="submit" name="button-change"  value="+" />';
                      echo '<input type="submit" name="button-change"  value="-" />
                      </form>';
                      echo'</td>';
                      $total_amount=$total_amount+$quantity*$row['price'];
                    }
                 }
               echo '</tr>';
               echo '<tr><td></td><td></td><td colspan="2" text-align="right">łącznie</td>';
               echo '<td>'.$total_amount.' zł</td></tr>';
               echo '<tr><td colspan="6"><a href="order-page.php" class="order-page-link"> Złóż zamówienie </a></td></tr>';
               echo '</table>';

           }
        ?>



        </div>
    </div>
</body>
</html>
