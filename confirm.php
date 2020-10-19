<?php

session_start();
require 'dbconfig/config.php';
?>

<script>
function changePage() {
    document.location.href = "gethunterinfo.php";
}
</script>

<?php
if (isset($_POST['yes'])) {

    $query = "UPDATE taskinfo SET status ='completed' WHERE taskid='$tkid' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo '<script type="text/javascript"> alert("Task Status updated successfully!") </script>';
    } else {
        echo '<script type="text/javascript"> alert("Error!Task Id invalid or already completed!") </script>';
    }
}
?>

<?php require "templates/header4.php"; ?>

<center>
    <h4>Change task status -></h4>
    <form method="post" action="gethunterinfo.php">
        <h4>Are you sure you want to continue?This process cannot be undone!</h4>
        <input type="submit" name="yes" id="sub_btn" value="Yes" style="width:20%">
    </form>
    <a href="gethunterinfo.php"><input type="submit" name="no" id="sub_btn" value="No" style="width:20%"></a>
</center>