<?php

/**
  * Open a connection via PDO to create a
  * new database and table with structure.
  *
  */

require "dbconfig/config.php";

try {
  $connection = new PDO("mysql:servername =$servername;dbname=$dbname", $username, $password );
  $sql = file_get_contents("data/init.sql");
  $connection->exec($sql);

  echo "Database and table users created successfully.";
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}