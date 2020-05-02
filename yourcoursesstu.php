<?php
// Initialize the session
// Check if the user is logged in, if not then redirect him to login page
 session_start();
 
 if(!isset($_SESSION["loginstu"]) || $_SESSION["loginstu"] !== true){
    header("location: loginstu.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
     <title>Your Courses for student</title>
</head>
<style>
  .q { 
    width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 2px solid #B0C4DE;
    background: white;
    border-radius: 10px 10px 10px 10px;
    text-align: center;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: black;
    background: #bfffe4;
    border-radius: 5px;
}
.x{
    margin: 15px 500px 25px 500px;
    padding: 10px;
    font-size: 15px;
    color: black;
    background: #a3e0e9;
    border-radius: 5px;
    text-align: center;
}
</style>
<body style="background-color: #ebe7de;">
<h1 style="text-align:center;"> Your Courses </h1> 

<?php 
      require_once "db.php";
      // checking connection with the database
      if($mysqli->connect_error){
          die("connection failed: " .$msqli->connect_error);
      }
      $stusername = $_SESSION["username"];
      $sql = "SELECT * FROM student WHERE stusername='$stusername'";
      $result = $mysqli->query($sql);
      if($result->num_rows>0){
           while($row = $result->fetch_assoc()) {?>
                                               <div class="q"><strong><?php  echo "Coursename: " . $row["coursenamestu"] ?></strong></div><br><br>
                                             
     <?php }?>
     <h3 style="text-align: center"> Want to give feedback on a course? </h3>
     <a href="givefeedback.php"><div class="x">Give feedback</div></a>
     <h3 style="text-align: center"> Have a doubt? </h3>
     <a href="askdoubt.php"><div class="x">Ask Doubt Question</div></a>
     <h3 style="text-align: center"> view if your doubt is clarified? </h3>
     <a href="viewdoubtanswer.php"><div class="x">View Doubts Answered</div></a>
     <br>
   <?php } 

      if(!($result->num_rows)){?>
         <div style="text-align: center;  font-size: 20px; font-style: italic;"><strong> <?php echo "You have no courses enrolled! Enroll to view them. " ?> </strong></div><br>
         <div class="x"><a href="enroll.php">Enroll </a></div>
     <?php }
?>
<h3 style="text-align:center;"> Back to Home Page? <a href="welcomestu.php" >Home</a> </h3>
 </body>
</html>
 
