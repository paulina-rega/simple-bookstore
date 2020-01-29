<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              if (isset($_POST['button-plus-1'])) {
            book_plus(1);
            header("Refresh:0");
            }
            else if(isset($_POST['button-plus-2'])) {
                book_plus(2);
                header("Refresh:0");
            }
            else if(isset($_POST['button-plus-3'])) {
                book_plus(3);
                header("Refresh:0");
            }
            else if(isset($_POST['button-plus-4'])) {
                book_plus(4);
                header("Refresh:0");
            }
            else if(array_key_exists('button-plus-5', $_POST)) {
                book_plus(5);
                header("Refresh:0");
            }
            else if(array_key_exists('button-plus-6', $_POST)) {
                book_plus(6);
                header("Refresh:0");
            }
            else if(array_key_exists('button-plus-7', $_POST)) {
                book_plus(7);
                header("Refresh:0");
            }
            else if(array_key_exists('button-plus-8', $_POST)) {
                book_plus(8);
                header("Refresh:0");
            }
            else if(array_key_exists('button-plus-9', $_POST)) {
                book_plus(9);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-1', $_POST)) {
                book_minus(1);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-2', $_POST)) {
                book_minus(2);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-3', $_POST)) {
                book_minus(3);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-4', $_POST)) {
                book_minus(4);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-5', $_POST)) {
                book_minus(5);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-6', $_POST)) {
                book_minus(6);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-7', $_POST)) {
                book_minus(7);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-8', $_POST)) {
                book_minus(8);
                header("Refresh:0");
            }
            else if(array_key_exists('button-minus-9', $_POST)) {
                book_minus(9);
                header("Refresh:0");
            }
}
?>
