<?php

  function open_connection()
  {
    $db_host = "us-cdbr-iron-east-04.cleardb.net";
    $db_user = "b9f516cb836024";
    $db_password = "2b23b2de";
    $db = "heroku_08d8a5059303a4c";
    $connection = new mysqli($db_host, $db_user, $db_password, $db)
      or die("Connection failed: %s\n".$connection->error);
    $connection->query("SET NAMES 'utf8'");

      return $connection;
  }
  function close_connection($connection)
  {
    $connection -> close();
  }

?>
