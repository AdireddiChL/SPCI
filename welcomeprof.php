<? 
 //start the session
  session_start();
  
  // if user is ot logged in , they cannot access this page
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
     <title>Home page for professor</title>
</head>
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
    <h2>Home page for professor</h2>
    </div> -->
    <div style="background-color:#3ce0cb;padding:15px;text-align:center;">
  <h1>Welcome Professor</h1>
</div>


<div style="overflow:auto">
  <div class="menu">
    <a href="welcomeprof.php">Home</a>
    <a href="addcourse.php">Add Course</a>
    <a href="yourcoursesprof.php">Your Courses</a>
    <a href="editprofileprof.php">Edit Profile</a>
    <a href="loginprof.php?logout='1'">Logout</a>
  </div>

  <div class="main">
     <h4>Add Course</h4>
    <p>Here you can upload a course </p>
    <h4>Your Courses</h4>
    <p>Here you can view the list of courses you have added</p>
     <h4>Edit Profile</h4>
    <p>Here you can edit your profile information</p>
     <?php if(isset($_SESSION['username'])): ?>
           <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php endif ?> 
  </div>

  <div class="right">
    <h2>About</h2>
    <p>This is the professor portal where professors can add as many          number of courses and clarify the students doubts</p>
  </div>
</div>
    <div class="content">
        <?php if(isset($_SESSION['success'])): ?>
        <div class="error success">
          <h3>
              <?php
                   echo $_SESSION['success'];
                   unset($_SESSION['success']);
                 ?>
            </h3>
        </div>
        <?php endif ?>

    </div>

</body>
</html>

