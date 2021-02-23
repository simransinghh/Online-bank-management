<html>
<head>
<title>index</title>
<style>
body{
            background-image: url('1.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            background-repeat:round; 
            
        }
        h1{
            color: white;
            background-color: rgb(90, 29, 29);
            z-index: 2;
            text-align: center;
            font-family: Ink Free,Comic Sans MS, Gabriola;
        }

.btn{
    float: right;
            border: 2px solid rgb(90, 29, 29);
            z-index: 9999;
            padding: 5px 5px;
            border-radius: 5px;
            transition: background-color 0.2s, color 0.2s;
            max-width: 110%;
            /* margin-left: auto; */
            font-weight: bold;
            color: black;
            margin-right: 30px;
        }
        .btn:hover,
        .btn:active{
            background-color: rgb(90, 29, 29);
            color: white;
            border: 2px solid rgb(90, 29, 29);
            border-radius: 5px;
            padding: 5px 5px;
            cursor: pointer;

        }
        a{
            text-decoration: none;
        }
    footer{
        text-align: center;
        background-color: grey;
        margin-top: 50%;
        /* margin-bottom: 0%; */
        /* position: absolute; */
    }
    .skill-box table{
    width: 100%;
    /* height: 100%; */
    padding-bottom: 50px;
    /* margin-left: 5%; */
    margin-top: 100px;
    position: absolute;
    
}
.skill-box table tr{
    padding: 5px 5px;
}
/* .skill-box table meter{
    width: 500px;
    height: 52px;
} */
.skill-box table td{
    /* display: block; */
    width: 20%;
    /* float: left; */
    overflow: hidden;
    /* background-color: black; */
    padding: 5%;
    height: 5%%
}
.skill-box img{
    width: 100%;
    margin:0;
    height: auto;
    opacity: 0.5;
    
    transform: scale(1.15);
    transition: opacity 0.5s, transform 0.5s;

}
.skill-box img:hover{
 
    opacity: 1;
    cursor: pointer;
    transform: scale(1.03);

}
    
</style>
</head>
<body>
<h1>
LOAN APPLICATION SYSTEM</h1>
<a class="btn" href="login.php">Login</a>
<a class="btn" href="register.php">Register</a>
<!-- <img src="2.jpg"> -->
<section id="skills">
            <!-- <div class="titl2">PROJECTS</div> -->
            <div class="skill-box">
                
                <table>
                    <tr>
                        <td><img src="3.jfif"></td><td><img src="5.jfif"></td><td><img src="4.jfif"></td>
                    </tr>
                    <!-- <tr>
                        <td><img src="new1.jpg"></td><td><img src="new2.jpg"></td><td><img src="new4.jpg"></td>
                    </tr> -->
                    
                </table>
            </div>
        </section>
<footer>
<h4>Only for admin <a href="admin.php">click here</a></h4>
</footer>
</body>
</html>
