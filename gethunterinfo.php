<?php

session_start();
require 'dbconfig/config.php';
?>


<?php

if (isset($_POST['add'])) {
    $tkid = $_POST['taskid'];
    $ctkid = $_POST['ctaskid'];
    if ($tkid == $ctkid) {
        $query = "UPDATE taskinfo SET status ='completed' WHERE taskid='$tkid' AND status LIKE 'in progress' ";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            echo '<script type="text/javascript"> alert("Task Status updated successfully!") </script>';
            header("Location: viewtask.php");
        } else {
            echo '<script type="text/javascript"> alert("Error!Task Id invalid or already completed!") </script>';
        }
    } else {
        echo '<script type="text/javascript"> alert("Error!Task Id and confirm not same!") </script>';
    }
}
?>

<?php require "templates/header4.php"; ?>


<center>
    <h4>Change task status -></h4>

    <form method="post">
        <input type="text" name="taskid" class="inputvalues" placeholder="Enter completed task Task ID "
            style="width:40%" required />
        <input type="text" name="ctaskid" class="inputvalues" placeholder="Confirm completed task Task ID "
            style="width:40%" required />
        <input type="submit" name="add" id="sub_btn" value="Complete" style="width:20%">
    </form>
    <p>Note-This process cannot be reverted!</p>


</center>

<a href=" viewtask.php">Back</a><br>
<a href="taskmenu.php">Back to home</a>

<?php include "templates/footer.php"; ?>