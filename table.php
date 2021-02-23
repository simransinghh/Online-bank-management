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
        }
        #form_box{
            position: absolute;
            margin-left: 25%;
            margin-top: 4%;
            /* margin-right: 10%; */
            padding: 5% 10%;
            width: 45%;
            text-align: left;
            border: 2px solid rgb(78, 6, 6);
            border-radius: 5px;
            /* box-shadow: 1px 1px 1px 1px blue;s */
            background-color: white;
            z-index: 999;
            font-family:  Gabriola;
            height: 70%;
        }
        
        input{
            border: 1px solid rgb(131, 0, 0);
            width: 99%;
           margin-left: auto;
           height: 20%;
        }
        /* input:hover,
        input:active{
            border: 1px solid rgb(131, 0, 0);
            
        } */
        #btn{
            border: 2px solid rgb(131, 0, 0);
            z-index: 9999;
            padding: 5px 5px;
            border-radius: 5px;
            transition: background-color 0.2s, color 0.2s;
            max-width: 110%;
            margin-left: auto;
            font-weight: bold;
        }
        #btn:hover,
        #btn:active{
            background-color: rgb(90, 29, 29);
            color: white;
            border: 2px solid rgb(131, 0, 0);
            border-radius: 5px;
            padding: 5px 5px;
            cursor: pointer;

        }
table{
    width: 100%;
    
}
th{
    /* border: black;
    background-color: grey; */
    width: 33.3%;
    /* position: center; */
    font-weight: bold;
    /* max-width: 100%; */
    height: 80px;

}
td{
    /* border: black;
    background-color: grey; */
    width: 33.3%;
    position: center;
    color: white;
    height: 50px;
}
</style>
</head>
<?php
    include('connection.php');
    $aID=$_REQUEST['aid'];
    $uName=$_REQUEST['uname'];
    $query="SELECT * FROM loan_form where status='Pending'";
    $supportQry=$conn->query($query);
    $cntt=mysqli_num_rows($supportQry);
    ?>
<body>
<?php 
    if(cntt>0){
        ?>
        <table id="customers">
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Purpose</th>
        </tr>
        <?php
        $qryForm=$conn->query($query);
        while($row=mysqli_fetch_array($qryForm)){
            ?>

        <tr onclick="window.location.href='custLFApproval.php?id=<?php echo $row['id']; ?>&email=<?php echo $row['email']; ?>&aid=<?php echo $aID; ?>&uname=<?php echo $uName; ?>'">
        <td><?php echo $row['fname']." ".$row['lname']; ?></td>
        <td><?php echo $row['email']." ".$row['email']; ?></td>
        <td><?php echo $row['purpose']." ".$row['purpose']; ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
            <?php
    }else{
    ?>
        <table id="customers">
        <tr>
        <th text-align="center"><h1>NO RECORDS FOUND<h1></th>
        </tr>
        </table>
        <?php
    }
?>
    </body>
    </html>
