<?php

  function check_if_admin_is_logged($user) {
    if(!isset($user)) {
      header('Location: /zadanie3/admin-page.php');
    }
  }

 ?>
