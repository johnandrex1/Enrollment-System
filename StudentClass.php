<?php
    class Student
  {
      public $studName;
      public $studSex;
      public $studBday;
      public $studAddress;
      public $studEmail;
      public $studCp;
      public $studProg;
      private $servername;
      private $dbName;
      private $charset;
      private $username;
      private $password;
      private $connection;
      private $pdo;

    function __construct($name,$address,$bday,$email,$cpnumber,$edProg,$sex)
    {
      $this->studName = $this->cleanInput($name);
      $this->studAddress = $this->cleanInput($address);
      $this->studBday = $bday;
      $this->studEmail = $email;
      $this->studCp = $cpnumber;
      $this->studProg = $edProg;
      $this->studSex = $sex;
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

      }catch (PDOException $e) {
        echo "Connection failed: " .$e->getMessage();
      }

      }

    public function cleanInput($dirtyInput)
        {
          $clean = trim($dirtyInput);
          $clean = stripslashes($dirtyInput);
          $clean = htmlspecialchars($dirtyInput);
          $clean = filter_var($dirtyInput,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
          return $clean;
        }

    public function insertData(){
      try {
        $dsn = "mysql:host=". $this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
        $mpo = new PDO($dsn,$this->username,$this->password);
        $statement = $mpo->prepare("INSERT INTO student_record(StudentName,StudentSex,StudentBirthday,StudentAddress,StudentEmail,StudentNum,StudentProg) VALUES (:name,:sex,:birthday,:address,:email,:num,:prog)");
        $statement->execute(array(
          ':name'=>$this->studName,
          ':sex'=>$this->studSex,
          ':birthday'=>$this->studBday,
          ':address'=>$this->studAddress,
          ':email'=>$this->studEmail,
          ':num'=>$this->studCp,
          ':prog'=>$this->studProg
        ));

      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
?>
