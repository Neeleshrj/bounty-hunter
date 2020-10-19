<?php
session_start();
require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Hunt Menu</title>

    <link rel="stylesheet" href="css/style2.css" />
</head>

<body
    style="font-family: Courier New;background: -webkit-linear-gradient(to right, #12c2e9, #c471ed, #f64f59);background: linear-gradient(to right, #12c2e9, #c471ed, #f64f59);">

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

    <div id="main-wrapper2" style="margin-top:10%">
        <center>
            <h2>
                Hunt Menu
            </h2>

        </center>

        <form class="myform" action="huntmenu.php" method="post">

            <a href=" hunttask.php"><input type="button" id="newt_btn" value="Hunt Task" />

                <a href="viewhunt.php"><input type="button" id="viewh_btn" value="Hunt History" style="float: right;" />


        </form>
        <a href="homepage.php"><input type="button" id="home_btn" value="Home" />
</body>

</html>