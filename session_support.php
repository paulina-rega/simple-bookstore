<?php
function init_cart() {
  if(!session_id())
  {
      session_start();
  }

  if (empty($_SESSION))  {
    $_SESSION['cart'] = array();

  };
}




 ?>
