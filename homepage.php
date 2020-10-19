<?php
session_start();
require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body style="font-family: Courier New;
background-color: #1fc8db;background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);">

    <div id="main-wrapper2" style="margin-top:10%;">
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
            <br>
            <h3>Welcome
                <?php
                echo $_SESSION['username'];
                ?>
                !
            </h3>

        </center>

        <form class="myform" action="homepage.php" method="post">

            <a href=" taskmenu.php"><input type="button" id="post_btn" value="Post Task" />

                <a href=" huntmenu.php"><input type="button" id="hunt_btn" value="Hunt Task" style="float: right;" />


        </form>
        <input name="logout" type="submit" id="logout_btn" value="Logout" style="float: center;" />
        <?php
        if (isset($_POST['logout'])) {
            session_destroy();
            header('location:index.php');
        }
        ?>

    </div>

    <img src="imgs/logo.png" class="logo" />

</body>


</html>