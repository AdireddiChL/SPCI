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
     <title>View feedback for professor</title>
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
<body style="background-color: #f0dbe9;">
<h1 style="text-align:center;"> Feedback given by students </h1> 

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
           while($row = $result->fetch_assoc()) {
                                         $cn = $row["coursename"];
          $sql_1 = "SELECT * FROM student WHERE coursenamestu='$cn'";
          $result_1 = $mysqli->query($sql_1);
          if($result_1->num_rows>0){
              while($row_1 = $result_1->fetch_assoc()) {
                  if($row_1["feedback"]){?>
                  <div style="text-align:center;font-style: normal;font-size: 25px;">
                  <?php  echo "Course name:   " .$row["coursename"] ."<br><br>";
                      echo "Student:   " .$row_1["stusername"] ."<br><br>";
                      echo "Feedback:  " .$row_1["feedback"] ."<br><br><br><br>";?> </dv>
                <?php  }
               
              }
          }
          else{?>
          <div style="text-align:center;font-style: italic;font-size: 25px;">
             <?php echo "No student enrolled in your course with Course name:  $cn. <br><br>"; ?>
              </div>
         <?php }
        }
    }
    
?>

 </body>
</html>
 