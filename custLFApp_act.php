<?php
session_start();
$con = mysqli_connect('localhost', 'root' );
if($con){
        //echo "connection successful !!!";
}else{
        echo "no connection";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>custLFApp_action</title>title>
</head>
<style>
	*{box-sizing: border-box;}
	.container{
		padding: 16px;
	}
	input[type=text],input[type=password]{
		width:100%;
		padding:15px;
		margin: 5px 0 22px 0;
		display: inline-block;
		border: none;
		background: #f1f1f1;
	}
	input[type=text]:focus,input[type=password]:focus{
		background-color: #ddd;
		outline: none;
	}
	hr{
		border: 1px solid #f1f1f1;
		margin-bottom: 25px;
	}

	.registerbtn{
		background-color: #4CAF50;
		color: white;
		padding: 16px 20px;
		margin:  8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		opacity: 0.9;
	} 
	.registerbtn:hover{
		opacity: 1;
	}

    a{
    	color: dodgerblue;
    }
    .signin{
    	background-color: #f1f1f1;
    	text-align: center;
    }
    .success{
    	color: #4CAF50;
    	font-size: 20px;
    }
    .error{
    	color: darkred;
    	font-size: 20px;
    }
</style>

<?php



$custID = $_REQUEST['custid'];
$custEmail= $_REQUEST['email'];

$aid = $_REQUEST['aid'];
$uname= $_REQUEST['uname'];
$statusAct = $_REQUEST['status'];

$msg = "";
$msgFlag="Error";
$status = "Pending";

$queryUpd="update loan_form set status='$statusAct' where custid='$custID'";
$queryUPdd = $con->query($queryUpd);
if($queryUpd){
	$msg = "Form submitted sucessfully";
	$msgFlag="Success";
}else{
	$msg="Problem in form submission";
	$msgFlag="Error";
}

$className="error;
if($msgFlag == "Success"){
	$className="success";
}
?>
<div class="container signin">
<p class="<?php echo $className;?><?php echo $msg;?></p>
</div>
<button class="registerbtn" onclick="window.location.href='custList.php?aid=<?php echo $aid;?>&uname=<?php echo $uname;?>'">Back</button>
<body>
</body>
</html>
