<? 
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
     <title>Home page for student</title>
<style>

* {
  box-sizing: border-box;
}
.menu {
  float:left;
  width:20%;
  text-align:center;
}
.menu a {
  background-color:#a8d756;
  padding:8px;
  margin-top:7px;
  display:block;
  width:100%;
  color:black;
}
.main {
  float:left;
  width:60%;
  padding:0 20px;
}
.right {
  background-color:#f7829c;
  float:left;
  width:20%;
  padding:15px;
  margin-top:7px;
  text-align:center;
}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width:100%;
  }
}
</style> 
<body style="font-family:Verdana;color:black;background-color:#f0f0f0;">
  <!--- <div class="header">
    <h2>Home page for student</h2>
    </div> --->

    <div style="background-color:#3ce0cb;padding:15px;text-align:center;">
  <h1>Welcome Student</h1>
</div>

<div style="overflow:auto">
  <div class="menu">
    <a href="welcomestu.php">Home</a>
    <a href="yourcoursesstu.php">Your Courses</a>
    <a href="courses.php">Available Courses</a>
    <a href="editprofilestu.php">Edit Profile</a>
    <a href="loginstu.php?logout='1'">Logout</a>
  </div>

  <div class="main">
    <h4>Your Courses</h4>
    <p>Here you can view the list of courses you erolled in.</p>
     <h4> Available Courses</h4>
    <p>Here you can view all the courses available and you can enroll in the courses.</p>
     <h4>Edit Profile</h4>
    <p>Here you can edit your profile information.</p>
  </div>

  <div class="right">
    <h2>About</h2>
    <p>This is the student portal where students can enroll in a          course and can clarify their doubts</p>
  </div>
</div>

<!--- code befor--->
    <div class="content">
        <?php if(isset($_SESSION["success"])): ?>
        <div class="error success">
          <h3>
              <?php
                   echo $_SESSION["success"];
                   unset($_SESSION["success"]);
                 ?>
            </h3>
        </div>
        <?php endif ?>

        <?php if(isset($_SESSION["username"])): ?>
           <p>Welcome <strong><?php echo $_SESSION["username"]; ?></strong></p>
        <?php endif ?>
    </div>
</body>
</html>


        