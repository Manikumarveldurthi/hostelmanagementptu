<?php
session_start();
if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['student_roll_no'];
  $password = $_POST['pwd'];

  if (empty($roll) || empty($password)) {
    echo"<script>alert('Input All Fields');window.location='../index.php'</script>";
    exit();
  } else {
    $sql = "SELECT * FROM Student WHERE Student_id = '$roll'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
      $pwdCheck = password_verify($password, $row['Pwd']);
      if ($pwdCheck == false) {
        echo"<script>alert('Incorrect Password, Try Again');window.location='../index.php'</script>";
        exit();
      } else if ($pwdCheck == true) {
        $_SESSION['roll'] = $row['Student_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['department'] = $row['Dept'];
        $_SESSION['year_of_study'] = $row['Year_of_study'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['room_id'] = $row['Room_id'];

        
        setcookie('userId', $row['Student_id'], time() + (86400 * 30), "/"); 
        setcookie('userRoll', $row['Student_id'], time() + (86400 * 30), "/");
        setcookie('userFname', $row['Fname'], time() + (86400 * 30), "/");
        setcookie('userLname', $row['Lname'], time() + (86400 * 30), "/");
        setcookie('userDept', $row['Dept'], time() + (86400 * 30), "/");
        setcookie('userYear', $row['Year_of_study'], time() + (86400 * 30), "/");

        echo"<script>window.location='../home.php'</script>";
      } else {
        echo"<script>alert('Error Occured, Try Again');window.location='../index.php'</script>";
        exit();
      }
    } else {
      echo"<script>alert('User does not exist, Sign up');window.location='../index.php'</script>";
      exit();
    }
  }

} else {
  echo"<script>alert('');window.location='../index.php'</script>";
  exit();
}
