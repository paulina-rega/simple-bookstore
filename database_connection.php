<?php

  function open_connection()
  {
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "pwdpwd";
    $db = "zadanie2";

    $connection = new mysqli($db_host, $db_user, $db_password, $db)
      or die("Connection failed: %s\n".$connection->error);

      return $connection;
  }

  function close_connection($connection)
  {
    $connection -> close();
  }

?>
