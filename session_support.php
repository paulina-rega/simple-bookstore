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


function book_plus($book_id) {
  $_SESSION['cart'][$book_id]['quantity']++;


}

function book_minus($book_id) {
  if ($_SESSION['cart'][$book_id]['quantity']>1) {
    $_SESSION['cart'][$book_id]['quantity']--;
  }
  else {
    unset($_SESSION['cart'][$book_id]);
  }
}

 ?>
