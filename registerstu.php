<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
   <title>Student Registration using PHP and MYSQL</title>
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
      <h2>Student Register</h2>
    </div>
     
    <form method="post" action="registerstu.php">
        <!--Displaying validation errors--> 
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Student Username</label>
            <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
       </div>
       <div class="input-group">
            <label>Email</label>
            <input type="text" name="email"placeholder="Email" value="<?php echo $email; ?>">
       </div>
       <div class="input-group">
            <label>password</label>
            <input type="Password" name="password_1" placeholder="Password">
       </div>
       <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2" placeholder="Confirm Password">
       </div>
       <div class="input-group">
            <label>Mobile Number</label>
            <input type="text" name="MobileNumber" placeholder="Mobile Number">
       </div>
       <div class="input-group">
           <button type="submit" name="register" class="btn">Register</button>
       </div>   
       <p>
           Already a member? <a href="loginstu.php">Sign in</a>
       </p> 
   </form>
</body>
</html>
