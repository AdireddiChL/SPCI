<?php
include('server.php');  ?>
<!DOCTYPE html>
<html>
<head>
   <title>Enrollment of student in a course</title>
   <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<style>
    *{
    margin: 0px;
    padding: 0px;
}
body { 
   font-size: 120%;
   background: #F8F8FF;
}

.header {
    width: 30%;
    margin: 50px auto 0px;
    color: white;
    background: #5F9EA0;
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
    background: #5F9EA0;
    border-radius: 5px;
}
.error {
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    border: 1px solid #a94442;
    color: #a94442;
    background: #f2dede;
    border-radius: 5px;
    text-align: left;  
}
</style>
<body>
    <div class="header">
      <h2>Enroll <?php echo $_SESSION["username"] ?></h2>
    </div>
     
    <form method="post" action="enroll.php">
    <div class="input-group">
            <label>Course Name</label>
            <input type="text" name="coursenamestu" placeholder="course name" required>
       </div>

        <div class="input-group">
            <label>Enrollment Key</label>
            <input type="text" name="enrollmentkey" placeholder="enrollment key" required>
       </div>
      
       <div class="input-group">
           <button type="submit" name="enroll" class="btn">ENROLL</button>
       </div>   
       <p>
          Don't want to enroll? Back to<a href="courses.php"> courses</a>
       </p> 
   </form>
</body>
</html>
<?php
           require_once "db.php";
                 // Check connection    
                 
                 if ($mysqli->connect_error) {
                      die("Connection failed: " . $mysqli->connect_error); 
                  } 
                 if(isset($_POST['enroll'])){
                    $coursenamestu = $_POST['coursenamestu'];
                    $ennrollmentkey = $_POST['enrollmentkey'];
                    $stusername = $_SESSION["username"];
                    
                    $keyQuery="SELECT enrollmentkey FROM professor WHERE coursename='$coursenamestu'";
                    $result = $mysqli->query($keyQuery);
                    if($result->num_rows==1){
                        $row = $result->fetch_assoc();
                        if($row["enrollmentkey"]==$ennrollmentkey){
                        $sql = "INSERT INTO student (coursenamestu,stusername) VALUES ('$coursenamestu','$stusername')";
                
                if ($mysqli->query($sql)) {
                    echo "<script>alert('Succesfully Enrolled');document.location.href='courses.php';</script>";
                } else {
                   echo "Could not enroll ! please try again";
                }
            }
               if(($row["enrollmentkey"]!=$ennrollmentkey)){
                   echo "Wrong enrollmennt key! Enter the correct value.";
               }
               
            }
            $result -> free_result();

        }
            $mysqli->close();
    ?>
