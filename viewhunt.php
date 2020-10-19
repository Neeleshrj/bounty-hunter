<?php

session_start();
require 'dbconfig/config.php';
?>

<?php require "templates/header3.php"; ?>

<table>

    <tr>
        <th>Task ID</th>
        <th>Work description</th>
        <th colspan="2">Date</th>
        <th>Time</th>
        <th>City</th>
        <th>Money</th>
        <th>Status</th>
        <th>Poster</th>
    </tr>

    <?php

    if (isset($_POST['submit'])) {
        $username = $_SESSION['username'];

        if (isset($_POST['submit'])) {

            // $sql = "SELECT * from taskinfo INNER JOIN taskinfo ON 'taskinfo.t_userid'='huntinfo.h_userid'";
            $sql = "SELECT * from taskinfo WHERE hunter='$username'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {

                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["taskid"] . "</td><td>" . $row["w_desc"] . "</td><td>" . $row["doc"] . "</td><td>" . "</td><td>" . $row["toc"] . "</td><td>" .
                        $row["city"] . "</td><td>" . $row["money"] . "</td><td>" . $row["status"] . "</td><td>" . $row["t_userid"] . "</td></tr>";
                }
            } else {
                echo "No results!";
            }
        }
    }
    ?>

</table>


<form class="myform" action="viewhunt.php" method="post" enctype="multipart/form-data">


    <!-- <input name="h_userid" type="text" class="inputvalues" placeholder="Enter your UserID" required />
    <br>
 -->

    <br><input type="submit" name="submit" id="results" value="View Results" style="margin-left:-170px">
</form>

<a href="huntmenu.php">Back to home</a>

<?php include "templates/footer2.php"; ?>


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