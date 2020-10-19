<?php

session_start();
require 'dbconfig/config.php';

?>
<?php require "templates/header2.php"; ?>


<table>

    <tr>
        <th>Task ID</th>
        <th>Work description</th>
        <th>Time</th>
        <th>City</th>
        <th>Money</th>
        <th>Status</th>
    </tr>
    <?php
  if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $loc = $_POST['city'];
    if (isset($_POST['submit'])) {
      $sql = "SELECT * from taskinfo WHERE city='$loc' AND status='pending' AND t_userid != '$username' ";

      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {

        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row["taskid"] . "</td><td>" . $row["w_desc"] . "</td><td>" . $row["toc"] . "</td><td>" .
            $row["city"] . "</td><td>" . $row["money"] . "</td><td>" . $row["status"] . "</td></tr>";
        }
      } else {
        echo "No results!";
      }
    }
  }
  ?>


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

</table>

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
    <p>Note->This is process cannot be reverted.</p>
</form>

<br><a href=" huntmenu.php">Back to home</a>

<?php include "templates/footer2.php"; ?>


<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
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