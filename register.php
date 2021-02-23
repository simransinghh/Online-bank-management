<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="registration.css">
  </head>
  <body>
<div class="registration-box">
  <h1>Registration</h1>
  <form action="created.php" method="POST">
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="firstname" placeholder="Firstname" >
  </div>

  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="lastname" placeholder="Lastname">
  </div>

  <div class="textbox">
    <i class="fas fa-envelope"></i>
    <input type="text" name="email" placeholder="EmailID">
  </div>

  <div class="textbox">
    <i class="fas fa-birthday-cake"></i>
    <input type="number" name="age" placeholder="Age">
  </div>

  <div class="textbox">
    <i class="fas fa-calendar"></i>
    <input type="date" name="dateofbirth" placeholder="Date Of Birth">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password">
  </div>

  <input type="submit" value="Submit">
  <p>Already Registered? <a href="login.php">Login here</a></p>
</div>
</form>
  </body>
</html>
