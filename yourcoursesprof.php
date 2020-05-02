<?php
 session_start();
 if(!isset($_SESSION["loginprof"]) || $_SESSION["loginprof"] !== true){
    header("location: loginprof.php");
    exit;
 }
?>
<!DOCTYPE html>
<html>
<head>
     <title>Your Courses for professor</title>
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
    margin: 25px 500px 10px 500px;
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
      $pusername = $_SESSION["username"];
      $sql = "SELECT * FROM professor WHERE profusername='$pusername'";
      $result = $mysqli->query($sql);
      if($result->num_rows>0){
           while($row = $result->fetch_assoc()) {?>
                                               <div class="q"><strong><?php  echo "Coursename: " . $row["coursename"] ?></strong><br><br>
                                               </div><br>
     <?php }?>
       <h3 style="text-align:center">Want to view the feedback given by students? </h3> 
       <a href="viewfeedback.php"><div class="x">View feedback</div></a><br>
       <h3 style="text-align:center">Want to view the questions asked by students?<br>
       You can clarify if there are any doubts. </h3> 
       <a href="viewquestions.php"><div class="x">View Doubt Question</div></a><br>
      
    <?php
      }
      if(!($result->num_rows)){?>
         <div style="text-align: center;  font-size: 20px; font-style: italic;"><strong> <?php echo "You have no courses! Add courses to view them " ?> </strong></div><br>
         <div class="x"><a href="addcourse.php">Add Course </a></div>
     <?php }
?>

 </body>
</html>
 
