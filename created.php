<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$age = $_POST['age'];
$dateofbirth = $_POST['dateofbirth'];
$password = $_POST['password'];
if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($age) || !empty($dateofbirth) || !empty($password)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "admin";
    //create connection
    $con = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From login Where email = ? Limit 1";
     $INSERT = "INSERT Into login (firstname, lastname, email, age, dateofbirth, password) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $con->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $con->prepare($INSERT);
      $stmt->bind_param("ssssii", $firstname, $lastname, $email, $age, $dateofbirth, $password);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $con->close();
    }
} else {
 echo "All field are required";
 die();
 
}
?>
<html>
<head></head>
<body>
<p><a href="login.php">Login here</a></p>
</body>
</html>
