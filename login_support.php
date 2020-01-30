<?php

  function check_if_admin_is_logged($user) {
    if(!isset($user)) {
      header('Location: /zadanie3/admin-page.php');
    }
  }

  function check_if_user_is_logged($user) {
    if(!isset($user)) {
      header('Location: /zadanie3/index.php');
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
 ?>
