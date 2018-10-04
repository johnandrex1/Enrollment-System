<?php
include 'DBFunction.php';
    class Student extends DBFunction
  {
      public $studName;
      public $studSex;
      public $studBday;
      public $studAddress;
      public $studEmail;
      public $studCp;
      public $studProg;

    function __construct($name,$address,$bday,$email,$cpnumber,$edProg,$sex)
    {
      $this->studName = $this->cleanInput($name);
      $this->studAddress = $this->cleanInput($address);
      $this->studBday = $bday;
      $this->studEmail = $email;
      $this->studCp = $cpnumber;
      $this->studProg = $edProg;
      $this->studSex = $sex;

    }

    public function cleanInput($dirtyInput)
    {
      $clean = trim($dirtyInput);
      $clean = stripslashes($dirtyInput);
      $clean = htmlspecialchars($dirtyInput);
      $clean = filter_var($dirtyInput,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
      return $clean;
    }
  }

?>
