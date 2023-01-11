<?php
require('../../Admin/db.php');
$table = 'post';

$topics = selectAll('topics');
$post = selectAll($table);

    $errors = array();
    $id = "";
	$title = "";
	$body = "";
	$topic_id = "";
	$published = "";

	if (isset($_GET['id'])) {
	$post = selectOne($table , ['id' => $_GET['id']]);
	$id = $post['id'];
	$title = $post['title'];
	$body = $post['body'];
	$topic_id = $post['topic_id'];
	$published = $post['published'];
		// dd($post);
	}

	if (isset($_GET['delete_id'])) {
	$count = delete($table, $_GET['delete_id']);
	$_SESSION['message'] = 'Post Deleted Successfully';
	$_SESSION['type'] = "success";
	header('location: index.php');
    exit();
		
	}

	if (isset($_GET['published']) && isset($_GET['p_id'])) {
		$published = $_GET['published'];
		$p_id = $_GET['p_id'];
		$count = update($table , $p_id, ['published' => $published]);
		$_SESSION['message'] = 'Post published state changed';
	    $_SESSION['type'] = "success";
	    header('location: index.php');
        exit();

	}




if (isset($_POST['add-post'])) {
	    // dd($_FILES);
	    $errors = validatePost($_POST);
	if (!empty($_FILES['image']['name'])) {
		$image_name = time() . '_' .  $_FILES['image']['name'];
		$destination =  ('../../images') . $image_name;
		$result = move_uploaded_file($_FILES['image']['tmp_name'] ,$destination);
		if ($result) {
			$_POST['image'] = $image_name;
		} else {
			array_push($errors , "Failed to upload the image");
		}
	}else{
		array_push($errors , "Post image is required");
	}

if (count($errors) == 0) {
	unset($_POST['add-post']);
	$_POST['user_id'] = $_SESSION['username'];
	$_POST['published'] = isset($_POST['published']) ? 1 : 0 ;
	$_POST['body'] = htmlentities($_POST['body']);
	$post_id = create($table, $_POST);
	$_SESSION['message'] = 'Post created Successfully';
	$_SESSION['type'] = "success";
	header('location: index.php');
     exit();
}else{
	$title = $_POST['title'];
	$body = $_POST['body'];
	$topic_id = $_POST['topic_id'];
	$published = isset($_POST['published']) ? 1 : 0 ;
}
}


if (isset($_POST['update-post'])) {
	// dd($_FILES);
	    $errors = validatePost($_POST);
	if (!empty($_FILES['image']['name'])) {
		$image_name = time() . '_' .  $_FILES['image']['name'];
		$destination =  ('../../images') . $image_name;
		$result = move_uploaded_file($_FILES['image']['tmp_name'] ,$destination);
		if ($result) {
			$_POST['image'] = $image_name;
		} else {
			array_push($errors , "Failed to upload the image");
		}
	}else{
		array_push($errors , "Post image is required");
	}
	if (count($errors) == 0) {
	  $id = $_POST['id'];
	 unset($_POST['update-post'], $_POST['id']);
	$_POST['user_id'] = $_SESSION['username'];
	$_POST['published'] = isset($_POST['published']) ? 1 : 0 ;
	$_POST['body'] = htmlentities($_POST['body']);
	$post_id = update($table, $id, $_POST);
	$_SESSION['message'] = 'Post updated Successfully';
	$_SESSION['type'] = "success";
	header('location: index.php');
     exit();
}else{
	$title = $_POST['title'];
	$body = $_POST['body'];
	$topic_id = $_POST['topic_id'];
	$published = isset($_POST['published']) ? 1 : 0 ;
}
}
 ?>