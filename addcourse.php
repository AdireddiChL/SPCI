<?php
  session_start();
   // if user is not logged in , they cannot access this page
   if(!isset($_SESSION["loginprof"]) || $_SESSION["loginprof"] !== true){
    header("location: loginprof.php");
    exit;
}
  if(empty($_SESSION['username'])) {
      header('location: loginprof.php');
  }
    ?>
<!DOCTYPE html>
<html>
<head>
   <title>Addig courses by professor using PHP and MYSQL</title>
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
      <h2>Add Course</h2>
    </div>
     
    <form method="post" action="addcourse.php">
        <div class="input-group">
            <label>Coursename</label>
            <input type="text" name="coursename" placeholder="coursename" required>
       </div>
       <div class="input-group">
            <label>Erollment Key</label>
            <input type="text" name="enrollmentkey" placeholder="Enrollment Key" required>
       </div>
      
       <div class="input-group">
           <button type="submit" name="addcourse" class="btn">ADD</button>
       </div>   
       <p>
          Don't want to add? <a href="welcomeprof.php">Home</a>
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
                 if(isset($_POST['addcourse'])){
                    $coursename=$_POST['coursename'];
                    $enrollmentkey= $_POST['enrollmentkey'];
                    $profusername = $_SESSION["username"];
                    
                    $courseQuery="SELECT * FROM professor WHERE coursename='$coursename' ";
                    $find_course = $mysqli->query($courseQuery);
                    if($find_course->num_rows){
                        echo "$coursename alredy exists in our data! please try again with different coursename";
                    }
               else{
                $sql = "INSERT INTO professor (coursename,enrollmentkey,profusername) VALUES ('$coursename','$enrollmentkey','$profusername')";
                
                if ($mysqli->query($sql)) {
                    $_SESSION["coursename"] = $coursename;
                    $_SESSION["enrollmentkey"] = $enrollmentkey;
                    $_SESSION["profusername"] = $profusername;
                    echo "<script>alert('Succesfully Added');document.location.href='welcomeprof.php';</script>";
                } else {
                   echo "Course could not be added! please try again";
                }
                
               }
                    
            }
    ?>
