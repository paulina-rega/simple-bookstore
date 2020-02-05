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
            <h1><a href="/admin-logged-in.php">Czytelnia<span style="color:#FEC65F;">.</span>admin</a></h1>
        </div>
        <div class="menu">
          <ul>
              <li><a href="/admin-page.php">Wyloguj</a></li>
          </ul>
        </div>
        <div class="main">
          <div>
            <h3>Część administracyjna</h3>
            <?

            $conn = open_connection();

            if (isset($_POST['button-confirm'])) {
              $sql = "INSERT INTO book (title, price, description, author, realise_data, isbn_number, cover_type, publisher, img_link)
                      VALUES ('".
                      $_POST['title']."', '".
                      $_POST['price']."', '".
                      $_POST['description']."', '".
                      $_POST['author']."', '".
                      $_POST['rdate']."', '".
                      $_POST['isbn']."', '".
                      $_POST['cover']."', '".
                      $_POST['publisher']."', '".
                      $_POST['link']."'); ";

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

            ?>

              <form method="POST">
                <p class="admin-edit-p">Tytuł:</p>
                <input name="title" style="width: 400px; height: auto;"type = "textarea" required maxlength="100" value="">
                <p class="admin-edit-p">Cena:</p>
                <input name="price" style="width: 400px" type="number" step="0.01" required value="">
                <p class="admin-edit-p">Wydawnictwo:</p>
                <input name="publisher" style="width: 400px"type = "text" required maxlength="40" value="">
                <p class="admin-edit-p">Opis:</p>
                <input name="description" style="width: 400px;"type = "textarea" required maxlength="500" value="">
                <p class="admin-edit-p">Autor:</p>
                <input name="author" style="width: 400px"type = "text" required maxlength="100" value="">
                <p class="admin-edit-p">Data wydania:</p>
                <input name="rdate" style="width: 400px"type = "date" pattern="^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$" required value="">
                <p class="admin-edit-p">ISBN:</p>
                <input name="isbn" style="width: 400px"type = "text" required maxlength="13" value="">
                <p class="admin-edit-p">Okładka:</p>
                <input name="cover" style="width: 400px"type = "text" required maxlength="15" value="">
                <p class="admin-edit-p">Link do obrazka:</p>
                <input  name="link" style="width: 400px"type = "text" required maxlength="300" value="">
                <p></p>
                <input type="submit" name="button-confirm"  value="Zapisz" />
                <p></p>
              </form>
              <form method="POST">
                <input type="submit" name="button-back"  value="Wróć" />
              </form>
            </div>
        </div>
    </div>
</body>
</html>
