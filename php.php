<?PHP
include('connection.php');
$uID = $_REQUEST['id'];
$uEmail = $_REQUEST['email'];
$flagCK = "NO";
//$flagCK = "YES";
$query = "SELECT * FROM loan_form where email = '$uEmail' and cust_id = '$uID'";
$supportQry = $conn->query($query);
$chtt = mysqli_num_rows($supportQry);
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
	$qryForm = $conn->query($query);
	while ($row = mysqli_fetch_array($qryForm)){
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
<h1>Application Form</h1>
<p> <?PHP echo $statMsg; ?>    </p>
<hr>
<label for="fname"><b>First Name</b></label>
<input type="text" placeholder="Enter First Name" name="fname" value="<?PHP echo $dfname; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>

<label for="lname"><b>Last Name</b></label>
<input type="text" placeholder="Enter Last Name" name="lname" value="<?PHP echo $dlname; ?>" <?PHP if($flagCK == "YES"){
?> disabled <?PHP } ?> required>

<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" value="<?PHP echo $dEmail; ?>" disabled required>
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

<select id="purpose" name="purpose" <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>
<option value="Housing Loan" <?php if($dpurpose == "" || $dpurpose == "Housing Loan"){ echo "selected"; } ?>>Housing Loan</option>
<option value="Car Loan" <?php if($dpurpose == "" || $dpurpose == "Car Loan"){ echo "selected"; } ?>>Car Loan</option>
<option value="Personal Loan" <?php if($dpurpose == "" || $dpurpose == "Personal Loan"){ echo "selected"; } ?>>Personal Loan</option>
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
<button type="submit" class="registerbtn" <?PHP if($flagCK == "YES"){ ?> disabled <?PHP } ?>>Submit</button>
<p>I agree to your <a href="#">Terms & Privacy</a>.</p>
