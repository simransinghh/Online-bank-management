<!DOCTYPE html>
<html> 
    <head>
        <title>Application form</title>
        <style type="text/css">
        *{
            box-sizing: border-box;
            text-align: center;
            /* background-image: url('1.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: cover; */
            font-family:  Gabriola;
        }
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
            margin-left: 10%;
            margin-right: 10%;
            padding: 5% 10%;

            text-align: left;
            border: 2px solid rgb(131, 0, 0);
            border-radius: 5px;
            /* box-shadow: 1px 1px 1px 1px blue;s */
            background-color: white;
            z-index: 999;
            font-family:  Gabriola;
        }
        .mand{
            color: rgb(131, 0, 0);
        }
        h6{
            color: white;
            background-color: rgb(90, 29, 29);
            z-index: 2;
            font-family: Ink Free,Comic Sans MS, Gabriola;
        }
        input{
            border: 1px solid white;
        }
        
        .btnbtn{
            border: 2px solid rgb(131, 0, 0);
            z-index: 9999;
            padding: 5px 5px;
            border-radius: 5px;
            transition: background-color 0.2s, color 0.2s;
        }
        .btn:hover,
        .btn:active{
            background-color: rgb(90, 29, 29);
            color: white;
            border: 2px solid rgb(131, 0, 0);
            border-radius: 5px;
            padding: 5px 5px;
            cursor: pointer;

        }

        textarea:link,
        textarea:visited{
            border: 1px solid white;
        }
        textarea:hover,
        textarea:active{
            border: 1px solid rgb(131, 0, 0);
        }
        </style>
        <script type="text/javascript">
        
        var formExample = document.getElementById("form_box");
         formExample.submit();
         
        document.getElementById("form_box").onsubmit = function(e){
            var fieldValue=document.getElementById("name").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your name");
                }
            var fieldValue=document.getElementById("email").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your email address");
                }
            var fieldValue=document.getElementById("institution").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your institution name");
                }
            // var fieldValue=document.getElementByID("dob").value;
            //     if(fieldValue==null || fieldValue== "")
            //     {  
            //       e.preventDefault(); 
            //        alert("you must enter your dob");
            //     }
            // var fieldValue=document.getElementByID("course").value;
            //     if(fieldValue==null || fieldValue== "-select-")
            //     {  
            //       e.preventDefault(); 
            //        alert("you must enter your course");
            //     }
            var fieldValue=document.getElementById("stream").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your stream");
                }
            var n=document.getElementById("sem").value;
               if(!isNaN(parseFloat(n)) && isFinite(n)) 
                   {e.preventDefault(); 
                   alert("you must enter your semester"); }
            var fieldValue=document.getElementById("skill").value;
                if(fieldValue==null || fieldValue== "")
                {  
                  e.preventDefault(); 
                   alert("you must enter your skills");
                }

            
             }

            function onconf()
            {document.getElementById("conf").innerHTML="Please confirm your details before submitting...";
            document.getElementById("conf").style.color="rgb(90, 29, 29)";
            }
            function offconf()
            {
                document.getElementById("conf").innerHTML=" ";
            
            }
        
        </script>
    </head>

    <body>
        <?php
            include('connection.php');
            $uID= $_REQUEST['id'];
            $uEmail = $_REQUEST['email'];
            $flagCK= "NO";
            $query = "SELECT * FROM loan_form where email='$uEmail' and cust_id= '$uID'";
            $supportQry=$con->query($query);
            $cntt= mysqli_num_rows($supportQry);

            $dfname="";
            $dlname="";
            $dage="";
            $ddob="";
            $dmincome="";
            $dlaneed="";
            $dpurpose="";
            $dtenure="";
            $dstatus="";
            if($cntt>0){
                $flagCK="YES";

                $qryForm = $con->query($query);
                while($row= mysqli_fetch_array($qryForm)){
                $dfname=$row['fname'];
                $dlname=$row['lname'];
                $dage=$row['age'];
                $ddob=$row['dob'];
                $dmincome=$row['mincome'];
                $dlaneed=$row['laneed'];
                $dpurpose=$row['purpose'];
                $dtenure=$row['tenure'];
                $dstatus=$row['status'];
            }
        }
        $statMsg = "Please fill in this Loan Application Form.";
        if($dsataus == "Pending"){
            $statMsg="Loan Application form is Pending.";
        }
        elseif($dstatus=="Accept"){
            $statMsg="Loan Application form is Accepted.";
        }
        elseif($dstatus=="Reject"){
            $statMsg="Loan Application form is Rejected.";
        }else{
            $statMsg="Please fill in this Loan Application Form.";
        }
        ?>

        <h1>Application Form</h1>
            <!-- <div class="form_box"> -->
                <form action="custLFApp_act.php" method="POST" id="form_box">
                <p><?PHP echo $statMsg; ?> </p>
                <hr>
                <label>Firstname: </label>
                <input type="text" name="fname" value="<?PHP echo $dfname; ?>" <?PHP if($flagCK=="YES"){?> disabled <?PHP } ?> required><br><br>
                <label>Lastname: </label>
                <input type="text" name="lname"  value="<?PHP echo $dlname; ?>" <?PHP if($flagCK=="YES"){?> disabled <?PHP } ?> required><br><br>
            

                <label for="email">Email id: </label>
                <input type="email" name="email" value="<?PHP echo $uEmail; ?>" disabled required><br><br>

                <label for="age"><span class="mand">*</span>Age: </label>
                <input type="number" name="age" max="100" min="18" value="<?PHP echo $dage; ?>" <?PHP if($flagCK=="YES"){?> disabled <?PHP } ?> required><br><br>
                <label for="dob"><span class="mand">*</span>Date of birth: </label>
                <input type="date"  name="dob" value="<?PHP echo $ddob; ?>" <?PHP if($flagCK=="YES"){?> disabled <?PHP } ?> required><br><br>

                <label>Monthly Income: </label>
                <input type="text" name="mIncome"  value="<?PHP echo $dmincome; ?>" <?php if($flagCK=="YES"){?> disabled <?php } ?> required><br><br>
                <label>Loan Amount needed: </label>
                <input type="text" name="amount"  value="<?PHP echo $dlaneed; ?>" <?php if($flagCK=="YES"){?> disabled <?php } ?> required><br><br>
                <label for="purpose"><span class="mand">*</span>Purpose of the Loan: </label>
                <select name="purpose"  <?php if($flagCK=="YES"){?> disabled <?php } ?> required>
            
                    <option value="Housing Loan" <?php if($dpurpose =="Housing Loan"){ echo "selected";} ?>>Housing Loan</option>
                    <option value="Car Loan" <?php if($dpurpose =="Car Loan"){ echo "selected";}?> >Car Loan</option>
                    <option value="Personal Loan" <?php if($dpurpose =="Personal Loan"){ echo "selected";}?> >Personal Loan</option>
                </select>
                    <br><br>
                <label for="tenure"><span class="mand">*</span>Tenure of the Loan: </label>
                <input type="radio" id="onemn" name="tenure" value="6 Months" <?php if($dtenure == "6 Months")?>
                <?php if($flagCK=="YES"){?> disabled <?php } ?>  >    
                <label for="onemn">6 Months</label>  
            
                <input type="radio" id="twomn" name="tenure" value="12 Months" <?php if($dtenure == "12 Months")?>
                <?php if($flagCK=="YES"){?> disabled <?php } ?>  >    
                <label for="twomn">12 Months</label>  
            
                <input type="radio" id="formn" name="tenure" value="24 Months" <?php if($dtenure == "24 Months")?>
                <?php if($flagCK=="YES"){?> disabled <?php } ?>  >    
                <label for="formn">24 Months</label>  
            
                <input type="radio" id="thrmn" name="tenure" value="32 Months" <?php if($dtenure == "32 Months")?>
                <?php if($flagCK=="YES"){?> disabled <?php } ?>  >    
                <label for="thrmn">32 Months</label>                      <br><br>
            
                <input type="checkbox" id="check" <?php if($flagCK=="YES"){?> disabled <?php } ?> required>
                <label for="check">You agree to the terms and conditions</label>
                <br><br><br>

                <input type="hidden" name="custID" value="<?php echo $uID; ?>">
                <input type="hidden" name="custEmail" value="<?php echo $uEmail; ?>">
                <input type="hidden" name="aid" value="<?php echo $aID; ?>">
                <input type="hidden" name="uname" value="<?php echo $uName; ?>">
            
                <!-- <input type="submit" id="btn" value="Register" onmouseover="onconf();" onmouseout="offconf();"><br>
                <p id="conf"> </p> -->
                <button class="btn" type="submit" name="statusAct" value="Accept">Accept</button>
                <button class="btn" type="submit" name="statusAct" value="Reject">Reject</button>
                <button class="btn" type="button" name="statusAct" onclick="window.location.href='table.php?aid=<?php echo $aID; ?>&uname=<?php echo $uName; ?>'" >Back</button>
            </form>            

    </body>
</html>
