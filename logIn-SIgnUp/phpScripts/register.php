<?php

@include 'connection.php';

if(isset($_POST['register'])){

   $fname = mysqli_real_escape_string($conn, $_POST['firstName']);
   $lname = mysqli_real_escape_string($conn, $_POST['lastName']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(empty($email)){
      $error[] = 'Email is needed';
      header('location:/login-SignUp/index.html');
   }

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User already exists';
      header('location:/login-SignUp/index.html');

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
         header('location:/login-SignUp/index.html');
      }else{
        $insert = "INSERT INTO users(fName,lName, email, password) VALUES('$fname','$lname','$email','$pass')";
        mysqli_query($conn, $insert);
        header('location:/login-SignUp/home.html');
      } 
   }
};


?>