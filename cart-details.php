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
            <h1><a href="/zadanie2/index.php">Czytelnia<span style="color:#FEC65F;">.</span></a></h1>
        </div>
        <div class="menu cart-margin">
            <ul>
                <li><a href="/zadanie2/cart-details.php">Koszyk</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="#">Kontakt</a></li>

            </ul>
        </div>






        <div class="main">
          <h3 class="cart-title">Koszyk</h3>
          <table class ="table-cart cart-margin">

          <?php
           $conn = open_connection();

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

                  echo '<input type="submit" name="button"  value="+" />
                  </form>';
                  echo'</td>';


                  echo '<td>';
                  echo '<form method="post">';

                  echo '<input type="submit" name="button"  value="-" />
                  </form>';
                  echo'</td>';
                  $total_amount=$total_amount+$quantity*$row['price'];

                }

           }

           echo '</tr>';
           echo '<tr><td></td><td></td><td colspan="2" text-align="right">łącznie</td>';
           echo '<td>'.$total_amount.' zł</td></tr>';

        ?>


        </table>





        </div>
    </div>
</body>
</html>
