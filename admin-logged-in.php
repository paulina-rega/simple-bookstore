<?php
include 'session_support.php';
include 'database_connection.php';
include 'login_support.php';
init_admin_session();
check_if_admin_is_logged($_SESSION["user"]);
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
        </div>
        <div class="main">
          <div>
            <h3>Część administracyjna</h3>
            <p>Baza produktów:</p>
            <table class="admin-table">
              <?php

              if (isset($_POST['button-edit'])) {
                echo $_POST['book-id'];
                $_SESSION['to_edit'] = $_POST['book-id'];
                header('Location: /zadanie3/admin-logged-in-edit.php');
              }



              $conn = open_connection();
              $sql = "SELECT id_book, title, price, img_link FROM book;";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
                echo '<tr style="border: 1px solid black">';
                  echo '<td style="border: 1px solid black">'.$row['id_book'].'</td>';
                  echo '<td style="border: 1px solid black">'.$row['title'].'</td>';
                  echo '<td style="border: 1px solid black">'.$row['price'].'</td>';
                  echo '<td style="border: 1px solid black">'.$row['img_link'].'</td>';
                  echo '<td style="border: 1px solid black">';
                    echo '<form method="POST">';
                    echo '<input type="hidden" name="book-id" value="'.$row['id_book'].'">';
                    echo '<input type="submit" name="button-edit"  value="Edit" />';
                    echo '</form>';
                  echo'</td>';
                echo '</tr>';
              }
              ?>
            </table>
            <form method="POST">
              <input type="submit" name="button-add"  value="Dodaj produkt" />
            </form>









        </div>
        </div>
    </div>
</body>
</html>
