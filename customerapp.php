<?php
session_start();
$con = mysqli_connect('localhost', 'root' );

//$uID = $_REQUEST['id'];
//$uEmail = $_REQUEST['email'];
if($con){
        //echo "connection successful !!!";
}else{
        echo "no connection";
}
 $db = mysqli_select_db($con, 'admin');
?>
<!DOCTYPE html>
<html>
<head>
        <title>Customer Form Approval</title>
       <style type="text/css">
         

         * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
  background: url(images.jpg);
  background-size: cover;
}
 .container  label{
  font-size:190%;
 }
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  font-size:160%;
  
}
input[type=radio] {
    border: 0px;
    width: 20%;
    height: 2em;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
  font-size:160%;
  
}
input[type="submit"], input[type="button"] {
  font-size: 48px;
  font-family: sans-serif;
  font-weight: bolder;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
  font-size:160%;
}
select {
        width: 150px;
        margin: 10px;
    }
    select:focus {
        min-width: 150px;
        width: auto;
    }    
 optgroup{
  font-size:190%;
 }

/* Set a style for the submit/register button */
.buttona {
  background-color: #FF0000;
  color: #FFFFFF;
  padding: 14px 40px;
  width: 30%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  float: left;
  border: 13px solid black;
  cursor: pointer;
  font-family: 'Arial'; 
  font-size: 20px;
  
  opacity: 0.9;
 
}

.buttona:hover {
  opacity:1;
  color: white;
}


/* Add a blue text color to links */
a {
  color: dodgerblue;
}


       </style>
</head>
<?PHP

$uID = (isset($_POST['id']) ? $_POST['id'] : '');
$uEmail = (isset($_POST['email']) ? $_POST['email'] : '');
$flagCK = "NO";
//$flagCK = "YES";
$query = "SELECT * FROM loan_form where email = '$uEmail' and custid = '$uID'";
$supportQry = mysqli_query($con,$query);
$cntt = mysqli_num_rows($supportQry);
$dfname = "";
$dlname = "";
$dage = "";
$ddob = "";
$dmincome = "";
$dlaneed = "";
$dpurpose = "";
$dtenure = "";
$dstatus = "";
if($cntt > 0){
$flagCK = "YES";
$qryForm = $con->query($query);
while ($row = mysqli_fetch_array($qryForm)){
	   $dEmail= $row['email'];
        $dfname = $row['fname'];
        $dlname = $row['lname'];
        $dage = $row['age'];
        $ddob = $row['dob'];
        $dmincome = $row['mincome'];
        $dlaneed = $row['laneed'];
        $dpurpose = $row['purpose'];
        $dtenure = $row['tenure'];
        $dstatus = $row['status'];
}
}
$statMsg = "Please fill in this Loan Application form.";
if($dstatus == "Pending"){
$statMsg = "Loan Application form is Pending.";
}elseif($dstatus == "Accept"){
$statMsg = "Loan Application form is Accepted.";
}elseif($dstatus == "Reject"){
$statMsg = "Loan Application form is Rejected.";
}else{
$statMsg = "Please fill in this Loan Application form.";
}
?>
<form action="custloan_act.php" method = "POST">
<div class="container">
<h1 style="color:red ; font-family:verdana;font-size:300%">Application Form </h1>
<p style="font-size:190%;"> <?PHP echo $statMsg; ?>    </p>
<hr>
<label for="fname"><b>First Name</b></label>
<input type="text" placeholder="Enter First Name" name="fname" value="<?PHP echo $dfname; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>

<label for="lname"><b>Last Name</b></label>
<input type="text" placeholder="Enter Last Name" name="lname" value="<?PHP echo $dlname; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>

<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" value="<?PHP echo $uEmail; ?>"<?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>
<hr>

<label for="age"><b>Age</b></label>
<input type="text" placeholder="Enter Age" name="age" value="<?PHP echo $dage; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>
<hr>

<label for="dob"><b>DOB</b></label>
<input type="text" placeholder="Enter DOB" name="dob" value="<?PHP echo $ddob; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>
<hr>

<label for="mIncome"><b>Monthly Income</b></label>
<input type="text" placeholder="Enter Monthly Income" name="mIncome" value="<?PHP echo $dmincome; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>
<hr>

<label for="lAmount"><b>Loan Amount Needed</b></label>
<input type="text" placeholder="Enter Loan Amount" name="lAmount" value="<?PHP echo $dlaneed; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>
<hr>

<label for="purpose"><b>Purpose</b></label>

<select id="purpose" name="purpose" size="1.5" <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>
	<optgroup>
<option value="Housing Loan" <?php if($dpurpose == "" || $dpurpose == "Housing Loan"){ echo "selected"; } ?>>Housing Loan</option>
<option value="Car Loan" <?php if($dpurpose == "" || $dpurpose == "Car Loan"){ echo "selected"; } ?>>Car Loan</option>
<option value="Personal Loan" <?php if($dpurpose == "" || $dpurpose == "Personal Loan"){ echo "selected"; } ?>>Personal Loan</option>
</optgroup>
</select>
<hr>
<label for="tenure"><b>Please select the tenure</b></label><br>
<input type="radio" id="sixmn" name="tenure" value="6 Months" <?php if($dtenure == "" || $dpurpose == "6 Months"){ echo "checked"; } ?> <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>
<label for="sixmn">6 Months</label><br>
<input type="radio" id="twmn" name="tenure" value="12 Months" <?php if($dtenure == "12 Months"){ echo "checked"; } ?> <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>
<label for="twmn">12 Months</label><br>
<input type="radio" id="twmn" name="tenure" value="24 Months" <?php if($dtenure == "24 Months"){ echo "checked"; } ?> <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>
<label for="twnmn">24 Months</label><br>
<input type="radio" id="thrmn" name="tenure" value="32 Months" <?php if($dtenure == "32 Months"){ echo "checked"; } ?> <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>
<label for="thrmn">32 Months</label><br>
<hr>
<input type="hidden" name="cust_ID" value="<?PHP echo $uID; ?>">
<input type="hidden" name="custEmail" value="<?PHP echo $uEmail; ?>">
<div class="buttona">
<button type="submit"style="width: 0.0%;height:0px;font-size: 24px;font-family: sans-serif;font-weight: bold"; class="registerbtn" <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>Submit</button>
</div>
<hr><br>
<p style="font-size:190%;">I agree to your <a href="#">Terms & Privacy</a>.</p>

</div>
</form>
<body>
</body>
