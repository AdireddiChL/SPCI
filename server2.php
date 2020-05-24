<?php
session_start();

     $username = "";
     $email = "";
     $errors = array();
   //conecting to the database
   $conn = mysqli_connect('localhost','root','','registration');

   //If register button is clicked
   if(isset($_POST['register'])){
       $username = trim($_POST['username']);
       $email = trim($_POST['email']);
       $password_1 = trim($_POST['password_1']);
       $password_2 = trim($_POST['password_2']);
       $mobileno = trim($_POST['MobileNumber']);

       //mandatory fields
       if(empty($username)){
           array_push($errors,"username is required");
       }

       $emailQuery="SELECT * FROM userprofessor WHERE username='$username' ";
       $result = mysqli_query($conn,$emailQuery);
       if(mysqli_num_rows($result)>0){
           array_push($errors,"Username already exists");
       }
  
       if(empty($email)){
        array_push($errors,"Email is required");
    }
    else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             array_push($errors,"Email address is invalid");
         }
     }

     $emailQuery="SELECT * FROM userprofessor WHERE email='$email' ";
     $result = mysqli_query($conn,$emailQuery);
     if(mysqli_num_rows($result)>0){
         array_push($errors,"Email already exists,please change your email");
     }

    if(empty($password_1)){
        array_push($errors,"Password is required");
    }

    if($password_1!=$password_2) {
        array_push($errors,"The two passwords do not match ");
    }

     if(count($errors)==0) {
         //$password = md5($password_1);
         $sql = "INSERT INTO userprofessor(username,email,password,mobileno) VALUES ('$username','$email','$password_1','$mobileno')";
         mysqli_query($conn,$sql);
         $_SESSION["username"] = $username;
         $_SESSION["success"] = "You are loggen in";
       echo "<script>alert('Successfully registered login for better experience');document.location.href='loginprof.php';</script>";
     }
}

//log user in from login page
if(isset($_POST['loginprof'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password_1']);
   
    //mandatory fields
    if(empty($username)){
        array_push($errors,"username is required");
    }
  
 if(empty($password)){
     array_push($errors,"Password is required");
 }
  if(count($errors)==0){
      $query = "SELECT * FROM userprofessor WHERE username='$username' AND password='$password'";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result)==1){
        $_SESSION["username"] = $username;
        $_SESSION["MobileNumber"] = $row["mobileno"];
        $_SESSION["password"] = $password;
        $_SESSION["id"] =  $row["id"];
        $_SESSION["loginprof"] = true;
        $_SESSION["success"] = "You are loggen in";
        header('location: welcomeprof.php');
      }
      else{
          array_push($errors,"Invalid login");
      }
  }
}

  //logout
  if(isset($_GET['logout'])){
      session_destroy();
      unset($_SESSION['username']);
      header('location: loginprof.php');
  }

?>
