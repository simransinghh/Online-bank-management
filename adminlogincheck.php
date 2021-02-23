<?php
session_start();

$con = mysqli_connect('localhost', 'root' );
if($con){
	//echo "connection successful";
}else{
	echo "no connection";
}

$db = mysqli_select_db($con, 'admin');

if(isset($_POST['submit'])){
	$username = $_POST['email'];
	$password = $_POST['password'];

	$sql = " select * from  admintable where email='$username' and password='$password' ";
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['user'] = $username;
			header('location:custList.php');
		}else{
			$error = "Your Login Name or Password is invalid";
			header('location:admin.php?msg=$error');
			
		}
			

}

?>
