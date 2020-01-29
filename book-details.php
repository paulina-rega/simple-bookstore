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
                <li><a href="/zadanie3/cart-details.php">Koszyk</a></li>

            </ul>
        </div>

<?php


$conn = open_connection();

$sql = "SELECT * FROM book WHERE id_book=".$_GET['id_book'];
$result = $conn->query($sql);

if(array_key_exists('button', $_POST)) {
    add_book_to_cart();
 }


 function add_book_to_cart() {

    if (isset($_SESSION['cart'][$_GET['id_book']])) {
      $_SESSION['cart'][$_GET['id_book']]['quantity']=$_SESSION['cart'][$_GET['id_book']]['quantity']+1;
    }
    else {
      $_SESSION['cart'][$_GET['id_book']] = array();
      $_SESSION['cart'][$_GET['id_book']]['id'] = $_GET['id_book'];
      $_SESSION['cart'][$_GET['id_book']]['quantity'] = 1;
    }
 }
?>
        <div class="main">
          <?php
           if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                   echo '<div class="image-box">';
                   echo "\n";

                   echo '<img src="'.$row['img_link'].'" alt="book cover picture" border="0">';
                   echo "\n";
                   echo '</div>';
                   echo "\n";
                   echo '<div class="info-box">';
                   echo "\n";
                   echo '<h3>'. $row['title'] .'</h3>';

                   echo '<p class="author">'.$row['author'].'</p>';
                   echo "\n";

                   echo '<p>'.$row['description'].'</p>';
                   echo "\n";
                   echo '<p class="price">'.$row['price'].' zł </p>';
                   echo "\n";

                   echo '<form action="" method="post">';
                   echo '<input type="hidden" name="book-id" value="'.$_GET['id_book'].'">';
                   echo '<input type="submit" name="button" id="button"
                               class="add-to-basket" value="Do koszyka" />
                   </form>';

                   echo '<div class="details">';
                   echo '<table>';

                   echo '<tr>';
                   echo '<td class="info-table-1">okładka</td>';
                   echo '<td>'.$row['cover_type'].'</td>';
                   echo '</tr>';


                   echo '<tr>';
                   echo '<td class="info-table-1">wydawnictwo</td>';
                   echo '<td>';
                   echo $row['publisher'];
                   echo '</td>';
                   echo '</tr>';

                   echo '<tr>';
                   echo '<td class="info-table-1">ISBN</td>';
                   echo '</td>';
                   echo '<td>'.$row['isbn_number'].'</td>';
                   echo '</tr>';

                   echo '<tr>';
                   echo '<td class="info-table-1">data wydania</td>';
                   echo '</td>';
                   echo '<td>'.$row['realise_data'].'</td>';
                   echo '</tr>';


                   echo '</table>';
                   echo '</div>';
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
