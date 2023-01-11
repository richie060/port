<?php

session_start();

require('db.php');
$id = "";
$username="";
$email="";
$errors = array();

//connect to the database
$db = mysqli_connect('localhost','root','','registration');

if (isset($_POST['register'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
   $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {

		array_push($errors, "Email is required");
	}
	if (empty($password_1)) {

		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2) {
		array_push($errors,"The two passwords do not match");
		}
		
	
		

	if (count($errors) == 0) {

		$password = md5($password_1);
		$sql = "INSERT INTO users(username, 
			email,password)
		VALUES ('$username','$email','$password')";
		mysqli_query($db,$sql);
		$_SESSION['message'] = "yolo";
		$_SESSION['type'] = 'success';
		header('location: login.php');

			}
}


// save subscribe to database

if (isset($_POST['subscribe'])) {
	 $name = mysqli_real_escape_string($db, $_POST['name']);
     $email = mysqli_real_escape_string($db, $_POST['mail']);

	if (empty($name)) {

		array_push($errors, "Username is required");
	}
	if (empty($email)) {

		array_push($errors, "Email is required");
	}
	
	if (count($errors) == 0) {
		$sql = "INSERT INTO newsletter(name, 
			mail)
		VALUES ('$name','$email')";
		mysqli_query($db,$sql);
		header('location: index.php');
			}
}





// save topic to database

// if (isset($_POST['Add-topic'])) {
// 	 $title = mysqli_real_escape_string($db, $_POST['title']);
//    $body = mysqli_real_escape_string($db, $_POST['body']);

// 	if (empty($title)) {

// 		array_push($errors, "Title is required");
// 	}
// 	if (empty($body)) {

// 		array_push($errors, "Body is required");
// 	}
	
// 	if (count($errors) == 0) {
// 		$sql = "INSERT INTO topics(name, 
// 			description)
// 		VALUES ('$title','$body')";
// 		mysqli_query($db,$sql);
// 		$_SESSION['message'] = "Topic created Successfully";
//     $_SESSION['type'] = "success";
// 		header('location: create.php');
// 			}
// }




// save messages to the database

if (isset($_POST['sendmessage'])) {
	 $email = mysqli_real_escape_string($db, $_POST['email']);
     $message = mysqli_real_escape_string($db, $_POST['message']);
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($message)) {
		array_push($errors, "Message is required");
	}
	if (count($errors) == 0) {
		$sql = "INSERT INTO messages(email, 
			messages)
		VALUES ('$email','$message')";
		mysqli_query($db,$sql);
		header('location: index.php');
		}
}


// if (isset($_POST['booking'])) {
// 	$name = mysqli_real_escape_string($db, $_POST['name']);
// 	dd($_POST);
// 	$message = mysqli_real_escape_string($db, $_POST['message']);
//    if (empty($email)) {
// 	   array_push($errors, "Email is required");
//    }
//    if (empty($message)) {
// 	   array_push($errors, "Message is required");
//    }
//    if (count($errors) == 0) {
// 	   $sql = "INSERT INTO messages(email, 
// 		   messages)
// 	   VALUES ('$email','$message')";
// 	   mysqli_query($db,$sql);
// 	   header('location: index.php');
// 	   }
// }



// save appointment to the database

if (isset($_POST['booking'])) {
	  $name = mysqli_real_escape_string($db, $_POST['name']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
      $companyname = mysqli_real_escape_string($db, $_POST['companyname']);
      $businessname = mysqli_real_escape_string($db, $_POST['businessname']);
	  $link = mysqli_real_escape_string($db,$_POST['link']);
    //   $link = mysqli_real_escape_string($db, $_POST['link']);
      $message = mysqli_real_escape_string($db, $_POST['msg']);
	//   unset($_POST['booking']);
	//   dd($_POST);
	if (empty($name)) {
		array_push($errors, "Nmae is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}

	if (empty($phoneno)) {

		array_push($errors, "Phone is required");
	}
	if (empty($companyname)) {

		array_push($errors, "Company name is required");
	}
	if (empty($businessname)) {

		array_push($errors, "Business name is required");
	}
	if (empty($link)) {
		array_push($errors, "Link is required");
	}
	if (empty($message)) {
		array_push($errors, "Message is required");
	}
	if (count($errors) == 0) {
		$sql = "INSERT INTO appointment(name,email,phoneno,companyname,businessname,link,messages)
		VALUES ('$name','$email','$phoneno','$companyname','$businessname','$link','$message')";
		mysqli_query($db, $sql);
		$_SESSION['message'] = 'Topic created Successfully';
		$_SESSION['type'] = 'success';
		header('location: contactus.php');
	}
}
// if (isset($_POST['sendmessa'])) {
// 	 $email = mysqli_real_escape_string($db, $_POST['email']);
//      $message = mysqli_real_escape_string($db, $_POST['message']);

// 	if (empty($email)) {

// 		array_push($errors, "Email is required");
// 	}
// 	if (empty($message)) {

// 		array_push($errors, "Message is required");
// 	}
	
// 	if (count($errors) == 0) {
// 		$sql = "INSERT INTO messages(email, 
// 			messages)
// 		VALUES ('$email','$message')";
// 		mysqli_query($db,$sql);
// 		header('location: contactus.php');
// 			}
// }
// log user ib from login page
if (isset($_POST['login'])) {
		 $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = mysqli_real_escape_string($db,$_POST['password']);
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT *  FROM users WHERE  username='$username' AND password ='$password'";
		$result = mysqli_query($db,$query);
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['id'] = $id;
			$_SESSION['username'] = $username;
		   $_SESSION['success'] = "";
		header('location: post/index.php');
		//redirect to home page
		}else{
			array_push($errors,"wrong username and password");		}
	}
}


// logout



if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}

?>