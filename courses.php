<?php
 session_start();
  // if user is not logged in , they cannot access this page
  if(!isset($_SESSION["loginstu"]) || $_SESSION["loginstu"] !== true){
    header("location: loginstu.php");
    exit;
}
  if(empty($_SESSION['username'])) {
      header('location: loginstu.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
     <title>Courses available for student to enroll </title>
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
    background: #a3e0e9;
    border-radius: 5px;
}
.x{
    margin: 25px 500px 50px 500px;
    padding: 10px;
    font-size: 15px;
    color: black;
    background: #a3e0e9;
    border-radius: 5px;
    text-align: center;
}
</style>
<body style="background-color: #ebeaf5;">
<h1 style="text-align:center;">Available Courses </h1> 

<?php 
      require_once "db.php";
      // checking connection with the database
      if($mysqli->connect_error){
          die("connection failed: " .$msqli->connect_error);
      }
      $pusername = $_SESSION["username"];
      $sql = "SELECT coursename,profusername FROM professor";
      $result = $mysqli->query($sql);
      if($result->num_rows>0){
           while($row = $result->fetch_assoc()) {?>
                                               <div class="q"><strong><?php  echo "Coursename: " . $row["coursename"] ."<br> <br>";
                                                                              echo "By Professor:" .$row["profusername"];
                                                                             ?>
                                               </div><br>
     <?php }
    }?>
    <?php
      if(!($result->num_rows)){?>
         <div style="text-align: center;  font-size: 20px; font-style: italic;"><strong> <?php echo "No courses available by any professor" ?> </strong></div><br>
     <?php }
?>
   <h3 style="text-align: center;">   Want to enroll in a course?   <a href="enroll.php"><div class="x">Enroll</div></a> 
                                       Dont want to enroll ? Back to  <a href="welcomestu.php"><div class="x">Home</div></a> </h3>

 </body>
</html>
 
