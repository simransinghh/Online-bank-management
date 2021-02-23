<html>
<head>
<style>
body{
            background-image: url('1.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            /* background-repeat:round; */
            
        }
        h1{
            color: white;
            background-color: rgb(90, 29, 29);
            z-index: 2;
            font-family: Ink Free,Comic Sans MS, Gabriola;
            text-align: center;
            margin-top: 20%;
        }
</style>
</head>
<?php
include('connection.php');
$email=$_REQUEST['email'];
$uPwd= md5($_REQUEST['psw']);
$msg="";
$msgFlag="Error";
$sql="select * from login where email='$email' ";
$result=$con->query($sql);
if($result->num_rows>0){
    while($row1= $result->fetch_assoc()){
        // $id=$row1['id'];
        $uname=$row1['email'];
        $pwd=$row1['password'];
    }
    if($pwd==$uPwd){
        header("Location: apply.php?id=$id&email=$uname");
    
    }
    else{
        $msg="Login Failed! Invalid Password";
        $msgFlag="Error";
    }
    }else{
        $msg="Login Failed! Invalid username";
        $msgFlag="Error";
    }
    $clasName="error";
    if($msgFlag=="Success"){
        $className="success";
    }
?>
<body>
<div class="container signin">
<p class="<php echo $className;?>"><h1><?php echo $msg;?></h1></p>
</div>
</body>
</html>
