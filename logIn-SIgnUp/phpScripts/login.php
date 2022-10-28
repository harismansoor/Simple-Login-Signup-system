<?php

@include 'connection.php';

session_start();

if(isset($_POST['login'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      header('location:/logIn-SIgnUp/home.html');
     
   }else{
      $error[] = 'incorrect email or password!';
      header('location:/login-SignUp/index.html');
   }

};
?>