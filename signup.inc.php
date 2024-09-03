<?php
session_start();
if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';
  require '../vendor/autoload.php'; 

  $roll = $_POST['student_roll_no'];
  $fname = $_POST['student_fname'];
  $lname = $_POST['student_lname'];
  $mobile = $_POST['mobile_no'];
  $dept = $_POST['department'];
  $year = $_POST['year_of_study'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $cnfpassword = $_POST['confirmpwd'];

  if(!preg_match("/^[a-zA-Z0-9]*$/",$roll)){
    echo "<script>alert('Invalid Roll Number');window.location='../signup.php'</script>";
    exit();
  }
  else if($password !== $cnfpassword){
    echo "<script>alert('Passwords entered do not match');window.location='../signup.php'</script>";
    exit();
  }
  else {
    $sql = "SELECT Student_id FROM Student WHERE Student_id=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo "<script>window.location='../signup.php'</script>";
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $roll);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        echo "<script>alert('User already exists');window.location='../signup.php'</script>";
        exit();
      }
      else {
        $sql = "INSERT INTO Student (Student_id, Fname, Lname, Mob_no, Dept, Year_of_study, email, Pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "<script>window.location='../signup.php'</script>";
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ssssssss", $roll, $fname, $lname, $mobile, $dept, $year, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);

          // Sending email
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);
          try {
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'manikumar0459@gmail.com';            
            $mail->Password   = 'ftie wnlb hfbl xeyb';                      
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587;                                   

            $mail->setFrom('manikumar0459@gmail.com', 'Hostel Management System');
            $mail->addAddress($email, $fname . ' ' . $lname);        

            $mail->isHTML(true);                                     
            $mail->Subject = 'Welcome to Hostel Management System';
            $mail->Body    = '<p>Dear ' . $fname . ',</p>
                              <p>Thank you for signing up for the Hostel Management System. Here are your details:</p>
                              <ul>
                                <li>Roll Number: ' . $roll . '</li>
                                <li>Name: ' . $fname . ' ' . $lname . '</li>
                                <li>Mobile Number: ' . $mobile . '</li>
                                <li>Department: ' . $dept . '</li>
                                <li>Year of Study: ' . $year . '</li>
                              </ul>
                              <p>We are excited to have you on board!</p>';
            $mail->AltBody = 'Dear ' . $fname . ', Thank you for signing up for the Hostel Management System. Here are your details: Roll Number: ' . $roll . ', Name: ' . $fname . ' ' . $lname . ', Mobile Number: ' . $mobile . ', Department: ' . $dept . ', Year of Study: ' . $year . '. We are excited to have you on board!';

            $mail->send();
            echo 'Message has been sent';
          } catch (PHPMailer\PHPMailer\Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }

          echo "<script>window.location='../index.php?signup=success'</script>";
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  echo "<script>window.location='../signup.php'</script>";
  exit();
}
?>
