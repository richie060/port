<?php

session_start();


require '../config/db.php';

$errors = array();
$username ="";
$email="";

if (isset($_POST['signup-btn'])){

   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $passwordConf = $_POST['passwordConf'];

// validation
   if (empty($username)){
   	$errors['username']= "username required";
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   	$errors['email'] = "Email address is invalid";
   }
      if (empty($email)){
   	$errors['email']= "Email required";
   }
      if (empty($password)){
   	$errors['password']= "Password required";
   }
   if($password !== $passwordConf){
   	$errors['password'] =" The two password do not match";
   }
   $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
   $stmt=$conn->prepare($emailQuery);
   $stmt -> bind_param('s',$email);
   $stmt ->execute();
   $result = $stmt->get_result();
   $userCount = $result->num_rows;
   $stmt->close();  


   if ($userCount > 0) {
      $email['email'] = "Email already exist";
   }

   if ($errors === 0) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $token = bin2hex(random_bytes(50));
      $verified = false;

      $sql = "INSERT INTO users (username,email,verified,token,password) VALUES (?,?,?,?,?)";
   $stmt=$conn->prepare($emailQuery);
   $stmt-> bind_param('ssbss',$username,$email,$verified,$token,$password);
   
   if ($stmt->execute()) {
      $user_id = $conn->insert_id;
      $_SESSION['id']=$user_id;
       $_SESSION['username']=$username;
        $_SESSION['email']=$email;
         $_SESSION['verified']=$verified;

         $_SESSION['message']= "you are now logged in";
         $_SESSION['alert-class'] = "alert-success";
         header('location: index.php');
         exit();

      // code...
   }else{
      $errors['db_error'] = "Database errors: failed to register";
   }

      // code...
   }

}