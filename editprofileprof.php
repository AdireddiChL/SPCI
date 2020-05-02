<?php
// Initialize the session
 session_start();

if(!isset($_SESSION["loginprof"]) || $_SESSION["loginprof"] !== true){
    header("location: loginprof.php");
    exit;
}
  if(empty($_SESSION['username'])) {
      header('location: loginprof.php');
  } ?>
 <!DOCTYPE html>
<html>
<head>
     <title>Edit profile for professor</title>
    
</head>
<style>
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
    border-radius: 5px;
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
    border-radius: 5px solid gray;
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
    <h2>Edit your Profile</h2>
    </div>
    <form  method="post"  onSubmit="return validate_password_reset();">

            <div class="input-group">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" value="<?php echo $_SESSION["username"]?>" required> <br>
                  </div>
            <div class="input-group">
            <label for="mobilenumber">Phone Number</label><br>
            <input type="tel" id="mobilenumber" name="mobilenumber"value="<?php echo $_SESSION["MobileNumber"]?>"required><br>
            </div>
            <div class="input-group">
             <label for="Password">Change Password:</label>
             <input type="password" name="member_password" id="member_password" class="input-field" ></div>
           </div>
 
        <div class="input-group">
          <input type="submit" name="submit" class="btn" value="Update Profile"><br>
        </div>
    </form>
    
    <?php
                 require_once "db.php";
                 // Check connection    
                 
                 if ($mysqli->connect_error) {
                      die("Connection failed: " . $mysqli->connect_error); 
                  } 
                 if(isset($_POST['submit'])){
                    $username=$_POST['username'];
                    $mobilenumber= $_POST['mobilenumber'];
                    $password=$_POST['member_password'];
                    if(empty($password)){
                        $passwordhash=$_SESSION["password"];
                    }
                    else{
                        $passwordhash= password_hash($password, PASSWORD_DEFAULT);
                    }
                 
                    
                    if(strcmp($username,$_SESSION["username"])){
                        $check_user = "SELECT username FROM userprofessor WHERE username = '$username'";
 
                        $find_user = $mysqli->query($check_user);
    
 
                       if($find_user->num_rows)
                         {
                               echo "$username already exists in our database! Please try again with a different username.";
                                 $user_err = "invalid";
                         }
                         if(!($find_user->num_rows)){
                             $user_err = "";
                         }
                    }

                    $id = $_SESSION["id"];

                    if(empty($user_err)){
                    $sql= "UPDATE  userprofessor SET username= '$username', mobileno='$mobilenumber',password='$passwordhash' 
                        WHERE  id ='$id'";
                       
                     if(!mysqli_query($mysqli,$sql))
                    {
                        echo "Server Busy! Please try again";
                    } 
                    if(mysqli_query($mysqli,$sql))
                    {
                        $_SESSION["username"]=$name;
                        $_SESSION["MobileNumber"] =$mobilenumber;
                        $_SESSION["password"]=$passwordhash;
                      echo "<script>alert('Succesfully Edited');document.location.href='welcomeprof.php';</script>";
                    }
                     
                 }
                 
  
                   
                 }
    ?>
    <p style="text-align: center;"> don't want to edit ? return to Home page <a href="welcomeprof.php" >Home</a>
    </body>
    </html>
