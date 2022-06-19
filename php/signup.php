<?php

@include 'Configuration.php';

if(isset($_POST['submit'])){

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);
$user_type = $_POST['user_type'];

$select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){

    $error[] = 'user already exists';

}else{

    if($pass !=$cpass){
        $error[] = 'passwords dont match';
    }else{
        $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
        mysqli_query($conn, $insert);
        header('location:login.php');
    }
}

};
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="..\css\signup.css">


</head>
<body>

<div class="body">

    <header>
        <div class="logo">
            <div class="word">

                <span id= "std-word" >STUDENT</span>
                <br>
                <span id="lib-word">LIBRARY</span>

            </div>
        </div>
    </header>
<div class="form-container">

   <form action="" method="post">
      <h3>SignUp Form</h3>
      <?php
      if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        };
      };
      ?>

      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      
    <a href="login.php"> <input type="submit" name="submit" value="register now" class="form-btn" >  </a>
    <p>already have an account? <a href="login.php">login now</a></p>
   </form>

    </div>
</div>
</body>
</html>