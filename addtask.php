<?php
session_start();
?>
<?php
require 'dbconfig/config.php';

if (isset($_POST['submit'])) {

  $t_userid = $_SESSION['username'];
  $w_desc = $_POST['w_desc'];
  $doc = $_POST['date'];
  $toc = $_POST['time'];
  $city = $_POST['city'];
  $money = $_POST['money'];
  $image=$_FILES['image']['name'];
  $status = 'pending';
  $hunter = 'none';

  $target= "uploaded-images/".basename($_FILES['image']['name']);

  $query = "INSERT INTO taskinfo VALUES(NULL,'$t_userid','$w_desc','$doc','$toc','$city','$money','$image','$status','$hunter')";
  $query_run = mysqli_query($con, $query);
  
  if ($query_run) {
  
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    echo '<script type="text/javascript"> alert("Task put for hunting!") </script>';
  } else {
    echo '<script type="text/javascript"> alert("Error!") </script>';
  }
}

?>
<?php include "templates/header.php"; ?>




<form class="myform" action="addtask.php" method="post" enctype="multipart/form-data" autocomplete="off">


    <!-- <input name="t_userid" type="text" class="inputvalues" placeholder="Enter your UserID" required /> <br> -->

    <textarea name="w_desc" type="text" class="inputvalues" placeholder="Describe the task in less than 1000 words"
        required style="height: 100px;border-radius:10px;font-size:large"></textarea> <br>

    <input type="date" id="date" name="date" style="padding:10px;margin-left:10px;margin-top:10px;margin-bottom:10px;"
        required>

    <label for="appt">Select a time:</label>
    <input type="time" id="appt" name="time">

    <input name="city" type="text" class="inputvalues" placeholder="Enter City" required /> <br>

    <input name="money" type="text" class="inputvalues" placeholder="Enter payment amount in ₹" required /> <br>

    <input name="image" type="file" style="padding:20px;" /><br>

    <input type="submit" name="submit" id="sub_btn" value="Submit" style="float:left;margin-top:10px;">
    <br> <a href="taskmenu.php"></a>
</form>

<br><br><br><a href="taskmenu.php" style="margin-left:80px;font-family: Courier New;margin-bottom:30px;">Back to
    home</a>