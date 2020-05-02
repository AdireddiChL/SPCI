<?php
//start the session
session_start();
if(!isset($_SESSION["loginprof"]) || $_SESSION["loginprof"] !== true){
    header("location: loginprof.php");
    exit;
 }
?>
<!DOCTYPE html>
<html>
<head>
     <title>Doubt answers by professor </title>
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
  left: 450px;
  font-size: 22px;
}
</style>
<body>
    <div class="header">
      <h2>Clarify Doubt <?php echo $_SESSION["username"] ?></h2>
    </div>
     
    <form method="post" action="clarifydoubt.php">
    <div class="input-group">
            <label>Course Name</label>
            <input type="text" name="coursename" placeholder="course name" required>
       </div>
       <div class="input-group">
            <label>Clarify to: Student Name</label>
            <input type="text" name="studentname" placeholder="student name" required>
       </div>
        <div class="input-group">
            <label>Clarify</label>
            <textarea type="text" name="clarify" rows="10" cols="50" required></textarea>
       </div>
      
       <div class="input-group">
           <button type="submit" name="submit" class="btn">Submit</button>
       </div>   
       <p>
          Don't want to clarify? Back to<a href="viewquestions.php"> View Qestions</a>
       </p> 
   </form>

<?php
           require_once "db.php";
                 // Check connection    
                 
                 if ($mysqli->connect_error) {
                      die("Connection failed: " . $mysqli->connect_error); 
                  } 
                 if(isset($_POST['submit'])){
                    $coursename = $_POST['coursename'];
                    $stusername = $_POST['studentname'];
                    $clarify = $_POST['clarify'];
                    $profsername = $_SESSION["username"];
                    
                    $sql="SELECT * FROM professor WHERE coursename='$coursename'";
                    $result = $mysqli->query($sql);
                    if($result->num_rows==1){
                    $sql_1 = "SELECT * FROM student WHERE coursenamestu='$coursename'AND stusername='$stusername'";
                    $result_1 = $mysqli->query($sql_1);
                    if($result_1->num_rows==1){
            
                        $sql_2 = "UPDATE student SET Doubtanswer='$clarify' WHERE coursenamestu = '$coursename' AND stusername='$stusername'";
                       $result_2 = $mysqli->query($sql_2);

                if ($result_2===TRUE) {
                    
                    echo "<script>alert('Doubt clarified successfully');document.location.href='viewquestions.php';</script>";
                }
                else {?>
                  <div class="topleft" style="text-align: center;color: red;"><p> something went wrong! please try again.<p> <div>
               <?php }
                    }    
        }
       

        else {?>
           <div class="topleft" style="text-align: center;color: red;"> <?php echo "you have no course with course name $coursename"?> </div>
       <?php }
    }

            $mysqli->close();
    ?>
    </body>
</html>
