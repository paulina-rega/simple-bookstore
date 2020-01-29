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
            <?php
            $conn = open_connection();
            $sql = 'SELECT * FROM book WHERE id_book="'.$_SESSION['to_edit'].'";';
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
              $row = $result->fetch_assoc();
              echo '<form method="POST">';
              echo '<p class="admin-edit-p">Tytuł:</p>';
              echo '<input style="width: 400px; height: auto;"type = "textarea" required maxlength="100" value="'.$row['title'].'">';
              echo '<p class="admin-edit-p">Cena:</p>';
              echo '<input style="width: 400px" type="number" step="0.01" required value="'.$row['price'].'">';
              echo '<p class="admin-edit-p">Wydawnictwo:</p>';
              echo '<input style="width: 400px"type = "text" required maxlength="40" value="'.$row['publisher'].'">';
              echo '<p class="admin-edit-p">Opis:</p>';
              echo '<input style="width: 400px;"type = "textarea" required maxlength="500" value="'.$row['description'].'">';
              echo '<p class="admin-edit-p">Autor:</p>';
              echo '<input style="width: 400px"type = "text" required maxlength="100" value="'.$row['author'].'">';
              echo '<p class="admin-edit-p">Data wydania:</p>';
              echo '<input style="width: 400px"type = "date" pattern="^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$" required value="'.$row['realise_data'].'">';
              echo '<p class="admin-edit-p">ISBN:</p>';
              echo '<input style="width: 400px"type = "text" required maxlength="13" value="'.$row['isbn_number'].'">';
              echo '<p class="admin-edit-p">Okładka:</p>';
              echo '<input style="width: 400px"type = "text" required maxlength="15" value="'.$row['cover_type'].'">';
              echo '<p class="admin-edit-p">Link do obrazka:</p>';
              echo '<input style="width: 400px"type = "text" required maxlength="300" value="'.$row['img_link'].'">';
              echo '<p></p>';
              echo '<input type="submit" name="button"  value="Zapisz" />';
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
