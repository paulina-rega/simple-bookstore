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
<meta http-equiv="Content-type" content="text/html; charset=utf8">
<meta name="Czytelnia" content=" Czytelnia. Księgarnia internetowa "> <meta name="Keywords" content="książki, księgarnia, sklep internetowy"> <meta name="Author" content="Paulina Rega">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1><a href="admin-logged-in.php">Czytelnia<span style="color:#FEC65F;">.</span>admin</a></h1>
        </div>
        <div class="menu">
          <ul>
              <li><a href="admin-page.php">Wyloguj</a></li>
          </ul>
        </div>
        <div class="main">
          <div>
            <h3>Część administracyjna</h3>
            <?
            $conn = open_connection();
            $sql = 'SELECT * FROM book WHERE id_book="'.$_SESSION['to_edit'].'";';
            $result = $conn->query($sql);

            if (isset($_POST['button-confirm'])) {
              $book_id = $_SESSION['to_edit'];
              $sql = "UPDATE book SET
                      title = '". $_POST['title']."',
                      price = '".$_POST['price']."',
                      description = '".$_POST['description']."',
                      author = '".$_POST['author']."',
                      realise_data = '".$_POST['rdate']."',
                      isbn_number = '".$_POST['isbn']."',
                      cover_type = '".$_POST['cover']."',
                      publisher = '".$_POST['publisher']."',
                      img_link = '".$_POST['link']."'
                      WHERE id_book='" .$book_id."';";

                      $is_executed = $conn->query($sql);

                      if ($is_executed) {
                        header("Refresh:0");
                      }
                      else {
                        echo "Ups, coś poszło nie tak. Spróbuj ponownie.";
                      }
            }


            if (isset($_POST['button-back'])) {
              header('Location: admin-logged-in.php');
            }

            if (isset($_POST['button-delete'])) {
              $book_id = $_SESSION['to_edit'];
              $sql = "DELETE FROM book WHERE id_book='".$book_id."';";

              $is_executed = $conn->query($sql);

              if ($is_executed) {
                header('Location: admin-logged-in.php');
              }
              else {
                echo "Ups, coś poszło nie tak.";
              }
            }

            if ($result->num_rows == 1) {
              $row = $result->fetch_assoc();
              echo '<form method="POST">';
              echo '<p class="admin-edit-p">Tytuł:</p>';
              echo '<input name="title" style="width: 400px; height: auto;"type = "textarea" required maxlength="100" value="'.$row['title'].'">';
              echo '<p class="admin-edit-p">Cena:</p>';
              echo '<input name="price" style="width: 400px" type="number" step="0.01" required value="'.$row['price'].'">';
              echo '<p class="admin-edit-p">Wydawnictwo:</p>';
              echo '<input name="publisher" style="width: 400px"type = "text" required maxlength="40" value="'.$row['publisher'].'">';
              echo '<p class="admin-edit-p">Opis:</p>';
              echo '<input name="description" style="width: 400px;"type = "textarea" required maxlength="500" value="'.$row['description'].'">';
              echo '<p class="admin-edit-p">Autor:</p>';
              echo '<input name="author" style="width: 400px"type = "text" required maxlength="100" value="'.$row['author'].'">';
              echo '<p class="admin-edit-p">Data wydania:</p>';
              echo '<input name="rdate" style="width: 400px"type = "date" pattern="^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$" required value="'.$row['realise_data'].'">';
              echo '<p class="admin-edit-p">ISBN:</p>';
              echo '<input name="isbn" style="width: 400px"type = "text" required maxlength="13" value="'.$row['isbn_number'].'">';
              echo '<p class="admin-edit-p">Okładka:</p>';
              echo '<input name="cover" style="width: 400px"type = "text" required maxlength="15" value="'.$row['cover_type'].'">';
              echo '<p class="admin-edit-p">Link do obrazka:</p>';
              echo '<input  name="link" style="width: 400px"type = "text" required maxlength="300" value="'.$row['img_link'].'">';
              echo '<p></p>';
              echo '<input type="submit" name="button-confirm"  value="Zapisz"/>';
              echo '<p></p>';
              echo '<input type="submit" name="button-back"  value="Wróć" />';
              echo '<p></p>';
              echo '<p></p>';
              echo '<input style="float: left; margin-top: 20px; color:red"type="submit" name="button-delete"  value="Usuń" />';
              echo '</form>';
            }
            else {
              echo "Cos poszlo nie tak!";
            }
            ?>
        </div>
        </div>
    </div>
</body>
</html>
