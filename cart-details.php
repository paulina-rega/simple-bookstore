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

           function book_plus($book_id) {
             echo "Dodano ".$book_id;
             echo count($_SESSION['cart']);
           }

           function book_minus($book_id) {
             echo "Usunięto ".$book_id;

           }


           foreach ($_SESSION['cart'] as $item) {
              echo '<tr>';
              $sql = "SELECT id_book, title, price, img_link FROM book WHERE id_book=".$item['id'];
              $result = $conn->query($sql);








              if(array_key_exists('button-plus-1', $_POST)) {
            book_plus(1);
            }
            else if(array_key_exists('button-plus-2', $_POST)) {
                book_plus(2);
            }
            else if(array_key_exists('button-plus-3', $_POST)) {
                book_plus(3);
            }
            else if(array_key_exists('button-plus-4', $_POST)) {
                book_id_plus(4);
            }
            else if(array_key_exists('button-plus-5', $_POST)) {
                book_plus(5);
            }
            else if(array_key_exists('button-plus-6', $_POST)) {
                book_plus(6);
            }
            else if(array_key_exists('button-plus-7', $_POST)) {
                book_plus(7);
            }
            else if(array_key_exists('button-plus-8', $_POST)) {
                book_plus(8);
            }
            else if(array_key_exists('button-plus-9', $_POST)) {
                book_plus(9);
            }
            else if(array_key_exists('button-minus-1', $_POST)) {
                book_minus(1);
            }
            else if(array_key_exists('button-minus-2', $_POST)) {
                book_minus(2);
            }
            else if(array_key_exists('button-minus-3', $_POST)) {
                book_minus(3);
            }
            else if(array_key_exists('button-minus-4', $_POST)) {
                book_minus(4);
            }
            else if(array_key_exists('button-minus-5', $_POST)) {
                book_minus(5);
            }
            else if(array_key_exists('button-minus-6', $_POST)) {
                book_minus(6);
            }
            else if(array_key_exists('button-minus-7', $_POST)) {
                book_minus(7);
            }
            else if(array_key_exists('button-minus-8', $_POST)) {
                book_minus(8);
            }
            else if(array_key_exists('button-minus-9', $_POST)) {
                book_minus(9);
            }















              while($row = $result->fetch_assoc()) {
                  $quantity = $_SESSION['cart'][$row['id_book']]['quantity'];
                  echo '<td><img src="'. $row['img_link'] .  'alt="book cover picture" border="0" ></td>';
                  echo '<td>'.$row['title'].'</td>';
                  echo '<td class="book-quantity">'.$quantity.'</td>';
                  echo '<td>'.$row['price']*$quantity.' zł</td>';
                  echo '<td>';
                  echo '<form method="post">';

                  echo '<input type="submit" name="button-plus-'.$row['id_book'].'"  value="+" />';
                  echo '<input type="submit" name="button-minus-'.$row['id_book'].'"  value="-" />
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
