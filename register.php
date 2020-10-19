<?php
session_start();
require 'dbconfig/config.php';


?>
<!DOCTYPE html>
<html>
<img src="imgs/logo.png" class="logo" />

<head>
    <title>Registration</title>

    <link rel="stylesheet" href="css/style.css">


</head>

<body
    style="font-family: Courier New;background-color: #1fc8db;background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);">

    <div id="sidebox">
        <center>
            <script>
            function picture(fieldvalue) {
                switch (fieldvalue) {
                    case 1:
                        document.getElementById("image").src = 'imgs/ava1.png';
                        break;
                    case 2:
                        document.getElementById("image").src = 'imgs/ava2.png';
                        break;
                    case 3:
                        document.getElementById("image").src = 'imgs/ava3.png';
                        break;
                }
            }
            </script>

            <img src="imgs/ava1.png" class="avatar" id="image" />

        </center>
    </div>
    <div id="main-wrapper2" style="width: 800px;margin-left:20%">


        <?php
        if (isset($_POST['signup_btn'])) {


            $fname = $_POST['fname'];
            $gen = $_POST['gender'];
            $cntnumber = $_POST['cntnumber'];
            $email = $_POST['email'];
            $userid = $_POST['userid'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            if ($pass == $cpass) {
                $query = "SELECT * FROM userinfo WHERE userid= '$userid' ";

                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    echo '<script type="text/javascript"> alert("Username already exists,try another name") </script>';
                } else {

                    $query = "INSERT INTO userinfo VALUES('$fname','$gen','$cntnumber','$email','$userid','$pass' )";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {
                        echo '<script type="text/javascript"> alert("User Registered!") </script>';
                        echo '<script>window.location.href = "./index.php";</script>';
                    } else {
                        echo '<script type="text/javascript"> alert("Error!") </script>';
                    }
                }
            } else {
                echo '<script type="text/javascript"> alert("Error!Password and confirm password do not match!") </script>';
            }
        }

        ?>


        <form class="myform" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">

            <input name="fname" type="text" class="inputvalues" style="margin-top:25px;margin-bottom:15px;"
                placeholder="Enter your Full Name" required /> <br>

            <label style="margin-left:10px;font-size: medium;letter-spacing: 1px;"><b>Gender: </b>
                </lable>
                <input name="gender" type="radio" class="radiobtn" value="male" onclick="picture(1)" checked
                    required>Male

                <input name="gender" type="radio" class="radiobtn" value="female" onclick="picture(2)" required>Female

                <input name="gender" type="radio" class="radiobtn" value="others" onclick="picture(3)"
                    required>Others<br>


                <input name="cntnumber" type="tel" style="margin-top:15px;" class="inputvalues"
                    placeholder="Enter your contact number" /> <br>


                <input name="email" type="email" class="inputvalues" placeholder="Enter your email id" required />
                <br>

                <input name="userid" type="text" class="inputvalues" placeholder="Enter a username" required /> <br>

                <input name="pass" type="password" class="inputvalues" placeholder="Enter a password" required /><br>

                <input name="cpass" type="password" class="inputvalues" placeholder="Confirm your password"
                    style="margin-bottom:15px;" required /><br>

                <input type="checkbox" id="terms" name="terms" value="True"
                    style="font-weight: bold;font-size: medium;letter-spacing: 1px;" required />
                I agree to the Terms of use
                <br>


                <a href="index.php"><input name="signup_btn" type="submit" id="signup_btn" value="Register" /></a>
                <br><br>

                <a href="index.php"><input name="backlg_btn" type="button" id="backlg_btn" value="Back" /></a>

        </form>
    </div>
</body>


</html>