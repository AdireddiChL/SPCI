<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body style="font-family:Verdana;color:black;background-color:#f0f0f0;">

<div style="background-color:#3ce0cb;padding:15px;text-align:center;">
  <h1>Welcome Professor</h1>
</div>


<div style="overflow:auto">
  <div class="menu">
    <a href="#">Home</a>
    <a href="#">Add Course</a>
    <a href="#">Your Courses</a>
    <a href="#">Edit Profile</a>
    <a href="#">Logout</a>
  </div>

  <div class="main">
     <h4>Add Course</h4>
    <p>Here you can upload a course </p>
    <h4>Your Courses</h4>
    <p>Here you can view the list of courses you have added</p>
     <h4>Edit Profile</h4>
    <p>Here you can edit your profile information</p>
  </div>

  <div class="right">
    <h2>About</h2>
    <p>This is the professor portal where professors can add as many          number of courses and clarify the students doubts</p>
  </div>
</div>

</body>
</html>