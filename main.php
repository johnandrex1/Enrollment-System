<!---
function cleanInput($dirtyInput)
{
$clean = trim($dirtyInput);
$clean = stripslashes($dirtyInput);
$clean = htmlspecialchars($dirtyInput);
$clean = filter_var($dirtyInput,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
return $clean;
}

  if (filter_has_var(INPUT_POST, 'submit')) {
    $name =cleanInput($_POST['stud_name']);
    $sex = $_POST['stud_sex'];
    $bday = $_POST['stud_birthdate'];
    $address = cleanInput($_POST['stud_address']);
    $email = $_POST['stud_email'];
    $cpnumber = $_POST['stud_cpNumber'];
    $prog = $_POST['stud_shsProg'];

      if (!empty($name) && !empty($sex) && !empty($bday) && !empty($address) && !empty($email) && !empty($cpnumber) && !empty($prog)) {

      }else {
        echo "Error";
      }
  }


-->
<?php
include_once 'StudentClass.php';
      if(isset($_POST['stud_name']) && isset($_POST['stud_sex'])){
          $object = new Student($_POST['stud_name'],$_POST['stud_address'],$_POST['stud_birthdate'],$_POST['stud_email'],$_POST['stud_cpNumber'],$_POST['stud_shsProg'],$_POST['stud_sex']);
          $object->echoer();
      }

  $dbcon = new DBFunction;
  $dbcon->dbConnect();
  echo $dbcon->fetchAllRecord();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="jquery.datetimepicker.css">
    <script src="jquery.js"></script>
    <script src="jquery.datetimepicker.full.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      Name:<input type="text" name="stud_name">
      <br>
      Sex:
      <input type="radio" name="stud_sex" value="male">Male
      <input type="radio" name="stud_sex" value="female">Female
      <br>
      Birthday:<input  id="datepicker" name="stud_birthdate">
      Address:<input type="text" name="stud_address">
<br>
  Contact Details:
  <br>
      Email:<input type="email" name="stud_email">
      Cellphone / Telephone Number:<input type="number" name="stud_cpNumber">


<br>
      Educational Program:
      <select name="stud_shsProg">
        <option value="shs_ict">ICT</option>
        <option value="shs_abm">ABM</option>
        <option value="shs_abm">STEM</option>
        <option value="shs_humms">HUMMS</option>
      </select>
<br>
    <input type="submit" name="submit" value="Submit">
    </form>

  <script>
          $('#datepicker').datetimepicker({
              timepicker:false,
              format:'Y/m/d'
          });

  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
