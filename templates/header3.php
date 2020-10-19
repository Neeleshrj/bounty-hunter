<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Hunt Menu</title>

    <link rel="stylesheet" href="css/style.css" />
</head>

<body
    style="font-family:'Courier New';background: -webkit-linear-gradient(to right, #240b36, #c31432);background: linear-gradient(to right, #240b36, #c31432);">
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
    <div id="main-wrapper2" style="width: 800px;margin-left:20%">
        <center>

            <h1>Hunt Menu</h1>
            <h2><u>
                    Hunt History
            </h2></u>
        </center>

</body>

</html>