<?php

  function check_if_admin_is_logged($user) {
    if(!isset($user)) {
      header('Location: admin-page.php');
    }
  }

  function check_if_user_is_logged($user) {
    if(!isset($user)) {
      header('Location: index.php');
    }
  }


  function check_if_login_is_available($login, $conn) {
    $logins = $conn->query("SELECT login FROM user");

    $reserved_logins[] = "";
    while ($row = $logins->fetch_assoc()) {
      $reserved_logins[] = $row['login'];
    }
    if (in_array($login, $reserved_logins)) {
      return FALSE;
    }
    else {
      return TRUE;
    }
  }

  function register_user($login, $email, $password, $conn) {
    $pass = password_hash($password, PASSWORD_DEFAULT);

    // TUTAJ SKONCZONE
    $sql = "INSERT INTO user (login, email, usr_password) VALUES ('".$login."', '". $email . "', '".$pass."');";
    $register = $conn->query($sql);
    if($register) {
      echo "<br><br><h5>Konto założono pomyślne dla ".$login.".</h5>";
    }
    else {
      echo "<br><br><h5>Ups! Coś poszło nie tak. Spróbuj jeszcze raz!</h5>";
    }
  }


  function login_user($login, $password, $conn) {


    $sql = 'SELECT login, id_number, usr_password FROM user WHERE login="'.$login.'";';
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user = array();
          if (password_verify($password,$row['usr_password'])) {
            return array(
              "user_login" => $row['login'],
              "user_id" => $row['id_number'],
            );

          }
          else {
            return FALSE;
          }

        }
        else {
          return FALSE;
        }
    }



    function create_order($user_id, $conn, $cart) {
      $name = $_POST['firstname']." ".$_POST['lastname'];
      $address1 = $_POST['street'].' '.$_POST['house_number'].'/'.$_POST['apartment_number'];
      $address2 = $_POST['city'].' '.$_POST['postcode'];
      $address = $name."; ".$address1."; ".$address2;
      $number = $_POST['telephone'];


      date_default_timezone_set('Europe/Berlin');
      $date = date('m/d/Y h:i:s a', time());
      //echo $date;
      $sql = "INSERT INTO user_order (user_id, telephone, address, order_time) VALUES ('".$user_id."', '".$number."', '". $address."', '".$date."');";




      $created_order = $conn->query($sql);

      $sql = "SELECT user_order_id FROM user_order WHERE order_time='".$date."';";
      $order_id = $conn->query($sql);
      if ($order_id->num_rows == 1) {
          $row = $order_id->fetch_assoc();
          $order_id = $row['user_order_id'];
        }


      foreach ($cart as $item) {
        $sql = "INSERT INTO order_product (user_order_id, product_id, quantity) VALUES (".$order_id.", ".$item['id'].", ".$item['quantity'].");";
      //   $sql = "INSERT INTO order_product (user_order_id, product_id, quantity) VALUES ('".$user_id."', '".$item['id']."', '".$item['quantity']."');";
         $result = $conn->query($sql);
         if ($result) {
           echo "<p>udało sie</p>";
         }
         else {
           echo"<p>nie udalo sie</p>";
         }
         echo $sql;
      }

    }















 ?>
