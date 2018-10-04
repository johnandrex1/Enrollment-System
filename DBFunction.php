<?php

class DBFunction
{
  private $servername;
  private $dbName;
  private $charset;
  private $username;
  private $password;

   function dbConnect() //PDO CONNECTION
  {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "sample";
    $this->charset = "utf8mb4";
    try //ERROR HANDLING
    {
      $dsn = "mysql:host=". $this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
      $pdo = new PDO($dsn,$this->username,$this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $pdo;

    } catch (PDOException $e) {
      echo "Connection failed: " .$e->getMessage();
    }

  }

  public function fetchAllRecord()
  {
    $sqlst = $this->dbConnect()->query('SELECT * FROM user_info');
    while ($row = $sqlst->fetch()) {
      $uid=$row['Name'];
      return $uid; // EDIT THIS!
    }

  }


}


?>
