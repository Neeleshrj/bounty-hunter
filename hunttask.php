<?php

session_start();
require 'dbconfig/config.php';

?>
<?php require "templates/header2.php"; ?>

<?php
  if (isset($_POST['add'])) {
    $taskid = $_POST['taskid'];
    $userid = $_SESSION['username'];
    $query = "UPDATE taskinfo SET status ='in progress',hunter='$userid' WHERE taskid='$taskid' AND t_userid != '$userid'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
      echo '<script type="text/javascript"> alert("Task accepted successfully!") </script>';
    } else {
      echo '<script type="text/javascript"> alert("Error!") </script>';
    }
  }
  ?>


<div id="top">
    <?php
  if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $loc = $_POST['city'];
    if (isset($_POST['submit'])) {
      $sql = "SELECT * from taskinfo WHERE city='$loc' AND status='pending' AND t_userid != '$username' ";

      $result = mysqli_query($con, $sql);

      while($row = mysqli_fetch_assoc($result)) { ?>
    <center>
        <div id="taskbox">
            <h3>TaskId:</h3>
            <h4><?php echo $row["taskid"]?></h4>
            <h3>Description:</h3>
            <p><?php echo $row["w_desc"]?></p>
            <h3>Image:</h3>
            <div>
                <?php 
                if($row["image"]=="blank"){
                  echo "No image Attached";
                }else{
                  echo "<img id='images' src='uploaded-images/".$row["image"]."'/>";
                }
              
              ?>
            </div>
            <h3>Time Of Completion:</h3>
            <p><?php echo $row["toc"]?></p>
            <h3>City:</h3>
            <p><?php echo $row["city"]?></p>
            <h3>Reward:</h3>
            <p><?php echo $row["money"]?></p>
        </div>
    </center>
    <?php }
        
    }
  }
      ?>


</div>

<h4>Find tasks based on location -></h4>

<form method="post">
    <input type="text" id="city" name="city" class="inputvalues" placeholder="Enter City Name" required />

    <input type="submit" name="submit" id="results" value="View Results">
</form>

<form method="post">
    <h4>Enter the task you want to hunt -></h4>

    <input type="text" id="taskid" name="taskid" class="inputvalues" placeholder="Enter Task ID"
        style="width: 15%;padding:10px" required />

    <input type="submit" name="add" id="add_btn" value="Hunt" />
    <p>Note->This process cannot be reverted.</p>
</form>

<br><a href=" huntmenu.php">Back to home</a>

<?php include "templates/footer2.php"; ?>

<style>
#taskbox {
    width: 400px;
    border: black solid 1px;
    padding: 20px;
    text-align: left;
}

#images {
    width: 250px;
    height: 200px;
}
</style>