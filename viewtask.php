<?php

session_start();
require 'dbconfig/config.php';
?>
<?php require "templates/header4.php"; ?>


<h2 style="text-align:center;"> Find your posted tasks history</h2>


<table>

    <tr>
        <th>Task ID</th>
        <th>Work description</th>
        <th colspan="2">Date</th>
        <th>Time</th>
        <th>City</th>
        <th>Money</th>
        <th>Status</th>
        <th>Hunter</th>
    </tr>
    <?php

    $username = $_SESSION['username'];
    $var = 0;
    if (isset($_POST['all'])) {
        $sql = "SELECT * from taskinfo WHERE t_userid='$username'";
        $var = 1;
    } else if (isset($_POST['ip'])) {
        $sql = "SELECT * from taskinfo WHERE t_userid='$username' AND status='in progress'";
        $var = 1;
    } else if (isset($_POST['pending'])) {
        $sql = "SELECT * from taskinfo WHERE t_userid='$username' AND status='pending'";
        $var = 1;
    } else if (isset($_POST['com'])) {
        $sql = "SELECT * from taskinfo WHERE t_userid='$username' AND status='completed'";
        $var = 1;
    }
    if ($var == 1) {
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["taskid"] . "</td><td>" . $row["w_desc"] . "</td><td>" . $row["doc"] . "</td><td>" . "</td><td>" . $row["toc"] . "</td><td>" .
                    $row["city"] . "</td><td>" . $row["money"] . "</td><td>" . $row["status"] . "</td><td>" . $row["hunter"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='9' style='text-align:center;font-size:20px;font-weight:bold;'>" . "No results found!" . "</td><tr>";
        }
    }

    ?>


</table>
<form class="myform" action="viewtask.php" method="post" enctype="multipart/form-data">

    <br><input name="all" type="submit" id="sub_btn" value="View All"
        style="position:absolute;left:0;width:20%;margin-left:10px">
    <input name="ip" type="submit" id="sub_btn" value="In progress" style="width:40%;">
    <input name="pending" type="submit" id="sub_btn" value="Pending" style="width:30%;">
    <input name="com" type="submit" id="sub_btn" value="Completed"
        style="width:20%;position:absolute;margin-left:10px;"><br>
</form>

<br> <a href="gethunterinfo.php">Change Status of Tasks</a>
<br><br><a href="taskmenu.php">Back to home</a>
<?php include "templates/footer.php"; ?>


<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    word-wrap: 1;

    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background-color: #f5f5f5;
}

th {
    background-color: #00008b;
    color: white;
}
</style>