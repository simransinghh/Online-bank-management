<?php
session_start();
$con = mysqli_connect('localhost', 'root' );
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
	 <meta charset="utf-8">
	 <title>Customer List</title>
	 <style >
	 	*{
	 		background: url(download.jpg);
	 		background-size: cover;
	 	}
	 	#customers {
	 		font-family: "Trebuchet MS", Arial,Helvetica, sans-serif;
	 		font-size: 80px;
	 		border-collapse: collapse;
	 		width: 85%
	 	}
	 	#customers td, #customers th{
	 		border: 1px solid #ddd;
	 		padding: 8px;
	 	}
	 	#customers tr:nth-child(even){background-color: #f2f2f2;}
	 	#customers tr:hover{background - color: #ddd;}
	 	#customers th{
	 		padding-top: 12px;
	 		padding-bottom: 12px;
	 		text-align: center;
	 		background-color:  #FF0000;
	 		color: white;
	 	}
	 </style>
</head>


<?php
//$aID = $_REQUEST['aid'];
//$uName = $_REQUEST['uname'];
$query = "SELECT * FROM loan_form where status = 'pending'";

$supportQry = $con->query($query);

$cntt = mysqli_num_rows($supportQry);
?>
<body>
<?php

if($cntt>0)
{
?>
<table id="customers">
<tr>
<th>Name </th>
<th>Email </th>                  
<th>Purpose</th>
<th> Application</th>
</tr>
<?php 
$qryForm = $con->query($query);
while ($row= mysqli_fetch_array($qryForm)) {
?>
<tr class="clickable text-cente onclick="window.location.href='custLFApproval.php>id=<?php echo $row['id'];?>&email=<?php echo $row['email']?>&aid=<?php echo $aID;?> &uname=<?php echo $uName;?>'" >
<td> <?php echo $row['fname']." ".$row['lname']; ?></td>
<td> <?php echo $row['email'];?></td>
<td> <?php echo $row['purpose'];?></td>
<td> <a href="custLFApproval.php"> Look </a></td>
</tr>
<?php 
}
?>
</table>
<?php
} else {
?>
<table id="customers">
<tr>
<th align="center">NO RECORDS FOUND</th>
</tr>
</table>
<?php
}
?>

</body>
</html>
