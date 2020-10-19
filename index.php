<?php

session_start();

require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body style="font-family: Courier New;
background-color: #1fc8db;background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);">


    <div id="main-wrapper" style="width: 1000px;margin-left:15%">
        <center>
            <img src="imgs/logo.png" style="height: 150px;width:500px;padding:20px" />

            <h2>Welcome to Bounty Hunter!</h2>

            <form class="myform" action="index.php" method="post">

                <input name="username" type="text" class="inputvalues" placeholder="Username" required /> <br>

                <input name="pass" type="password" class="inputvalues" placeholder="Password" required /><br>

                <input name="login" type="submit" id="login_btn" value="Login" />

                <p>Not a user yet?</p>
                <a href="register.php"><input type="button" id="register_btn" value="Register" />

            </form>
        </center>
        <?php

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $query = "SELECT * FROM userinfo WHERE userid='$username' AND pass='$pass'";

            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                $_SESSION['username'] = $row['userid'];
                $_SESSION['gender'] = $row['gen'];
                header('location:homepage.php');
            } else {
                echo '<script type="text/javascript"> alert("Invalid Credentials!") </script>';
            }
        }

        ?>

    </div>
</body>


</html>