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


function init_admin_session() {
  if(!session_id())
  {
      session_start();
  }
}





function book_plus($book_id) {
  $_SESSION['cart'][$book_id]['quantity']++;
  header("Refresh:0");


}

function book_minus($book_id) {
  if ($_SESSION['cart'][$book_id]['quantity']>1) {
    $_SESSION['cart'][$book_id]['quantity']--;
    header("Refresh:0");
  }
  else {
    unset($_SESSION['cart'][$book_id]);
    header("Refresh:0");
  }
}

 ?>
