<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              if (isset($_POST['button-plus-1'])) {
            book_plus(1);
            }
            else if(isset($_POST['button-plus-2'])) {
                book_plus(2);
            }
            else if(isset($_POST['button-plus-3'])) {
                book_plus(3);
            }
            else if(isset($_POST['button-plus-4'])) {
                book_plus(4);
            }
            else if(array_key_exists('button-plus-5', $_POST)) {
                book_plus(5);
            }
            else if(array_key_exists('button-plus-6', $_POST)) {
                book_plus(6);
            }
            else if(array_key_exists('button-plus-7', $_POST)) {
                book_plus(7);
            }
            else if(array_key_exists('button-plus-8', $_POST)) {
                book_plus(8);
            }
            else if(array_key_exists('button-plus-9', $_POST)) {
                book_plus(9);
            }
            else if(array_key_exists('button-minus-1', $_POST)) {
                book_minus(1);
            }
            else if(array_key_exists('button-minus-2', $_POST)) {
                book_minus(2);
            }
            else if(array_key_exists('button-minus-3', $_POST)) {
                book_minus(3);
            }
            else if(array_key_exists('button-minus-4', $_POST)) {
                book_minus(4);
            }
            else if(array_key_exists('button-minus-5', $_POST)) {
                book_minus(5);
            }
            else if(array_key_exists('button-minus-6', $_POST)) {
                book_minus(6);
            }
            else if(array_key_exists('button-minus-7', $_POST)) {
                book_minus(7);
            }
            else if(array_key_exists('button-minus-8', $_POST)) {
                book_minus(8);
            }
            else if(array_key_exists('button-minus-9', $_POST)) {
                book_minus(9);
            }
}
?>
