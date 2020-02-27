<?php 
  $dsn = 'mysql:host=localhost; dbname=todolist';
  $username = 'root';
  $password='MesA683103!';

  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../Errors/database_error.php');
    exit ();
  }

?>