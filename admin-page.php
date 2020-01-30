<?php
include 'session_support.php';
include 'database_connection.php';
init_admin_session();
$_SESSION = array();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['submit'])) {
    $conn = open_connection();
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $sql = 'SELECT admin_password FROM user_admin WHERE admin_login="'.$login.'";';
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
          if (password_verify($pass,$row['admin_password'])) {
            $_SESSION = array();
            $_SESSION['user'] = admin;
            header('Location: /zadanie3/admin-logged-in.php');
          }
          else {
            echo '<h4 style="color: red">Wprowadzono błędne dane!</h4>';
          }
        }
        else {
          echo '<h4 style="color: red">Wprowadzono błędne dane!</h4>';
        }
    }


}
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
            <h1><a href="#">Czytelnia<span style="color:#FEC65F;">.</span>admin</a></h1>
        </div>
        <div class="menu">
        </div>
        <div class="main">
          <div>
          <h3>Część administracyjna</h3>
          <form action="" method="POST">
            <p>Login</p>
            <input type ="password" name="login" required maxlength="50">
            <p>Hasło</p>
            <input type ="password" name="password" required maxlength="50">
            <br>
            <input type="submit" name="submit" value="Zaloguj się" class="submit-button">
          <form/>
        </div>
        </div>
    </div>
</body>
</html>
