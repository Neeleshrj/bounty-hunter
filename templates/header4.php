<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Hunt Menu</title>

    <link rel="stylesheet" href="css/style.css" />
</head>

<body style="font-family: Courier New;background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);">
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
    <div id="main-wrapper2" style="margin-top:100px;width:800px;margin-left:20%;">
        <center>
            <h1>Task History</h1>
        </center>
</body>

</html>