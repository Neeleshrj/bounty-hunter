<?php
session_start();
require 'dbconfig/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Task Menu</title>

    <link rel="stylesheet" href="css/style2.css" />
</head>

<body style="font-family: Courier New;background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);">

    <img src="imgs/logo.png" class="logo" />
    <div id="curuser">
        <center>
            <?php
            if ($_SESSION['gender'] == 'male') {
                echo '<img class="avatar" src="imgs/ava1.png">';
            } else if ($_SESSION['gender'] == 'female') {
                echo '<img class="avatar" src="imgs/ava2.png">';
            } else {
                echo '<img class="avatar" src="imgs/ava3.png">';
            }
            ?>
            <h3>
                Hello
                <?php
                echo $_SESSION['username']
                ?>
            </h3>
            <a href="logout.php"><input name="logout" type="submit" id="logout_btn" value="Logout"
                    style="float: center;width:100%" /></a>
        </center>
    </div>
    <div id="main-wrapper2" style="margin-top:10%;">
        <center>
            <h2>Task Menu</h2>

            <h3>Post new tasks or hunt some!</h3>

        </center>
        <a href="addtask.php"><input type="button" id="addt_btn" value="New Task" />

            <a href=" viewtask.php"><input type="button" id="viewt_btn" value="Task History" style="float: right;" />

                <a href="homepage.php"><input type="button" id="home_btn" value="Home" />
    </div>



</body>

</html>