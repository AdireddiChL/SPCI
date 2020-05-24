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
     <title>Feedback by student </title>
</head>
<style>
<style>
    *{
    margin: 0px;
    padding: 0px;
}
body { 
   font-size: 120%;
   background: #f0f0f0;
}

.header {
    width: 30%;
    margin: 50px auto 0px;
    color: white;
    background: #60a9aa;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: 10px 10px 0px 0px;
    padding: 20px; 
}
form { 
    width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
    border-radius: 0px 0px 10px 10px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}

.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}

.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #60a9aa;
    border-radius: 5px;
}
.topleft {
  position: absolute;
  top: 8px;
  left: 16px;
  font-size: 18px;
}
</style>
<body>
    <div class="header">
      <h2>Give feedback <?php echo $_SESSION["username"] ?></h2>
    </div>
     
    <form method="post" action="givefeedback.php">
    <div class="input-group">
            <label>Course Name</label>
            <input type="text" name="coursenamestu" placeholder="course name" required>
       </div>

        <div class="input-group">
            <label>Feedback</label>
            <textarea type="text" name="feedback" rows="10" cols="50" required></textarea>
       </div>
      
       <div class="input-group">
           <button type="submit" name="submit" class="btn">Submit</button>
       </div>   
       <p>
          Don't want to give feedback? Back to<a href="yourcoursesstu.php"> your courses</a>
       </p> 
   </form>

<?php
           require_once "db.php";
                 // Check connection    
                 
                 if ($mysqli->connect_error) {
                      die("Connection failed: " . $mysqli->connect_error); 
                  } 
                 if(isset($_POST['submit'])){
                    $coursenamestu = $_POST['coursenamestu'];
                    $feedback = $_POST['feedback'];
                    $stusername = $_SESSION["username"];
                    
                   $sql="SELECT * FROM student WHERE coursenamestu='$coursenamestu' AND stusername='$stusername'";
                    $result = $mysqli->query($sql);
                    if($result->num_rows==1){

                        $sql_1 = "UPDATE student SET feedback='$feedback' WHERE coursenamestu = '$coursenamestu' AND stusername='$stusername'";
                       $result_1 = $mysqli->query($sql_1);
                if ($result_1) {
                    
                    echo "<script>alert('Feedback given successfully');document.location.href='yourcoursesstu.php';</script>";
                }
                else {?>
                  <div class="topleft" style="text-align: center;color: red;"><?php  echo "something went wrong! please try again." ?> <div>
               <?php }
           
        }
        else {?>
           <div class="topleft" style="text-align: center;color: red;"> <?php echo "wrong course name! Enter valid coursename./You have not enrolled in this course"?> </div>
       <?php }
    }

            $mysqli->close();
    ?>
    </body>
</html>

