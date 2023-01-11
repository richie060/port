<?php
 $table = 'topics';
 $errors = array();


$id ='';
$name ='';
$description='';




$topics = selectAll($table);

if (isset($_POST['add-topic'])) {
  $errors = validateTopic($_POST);
if (count($errors) === 0) {
   unset($_POST['add-topic']);
    $topic_id = create('topics', $_POST);
    $_SESSION['message'] = 'Topic created Successfully';
    $_SESSION['type'] = 'success';
    header('location: index.php');
 
} else{
  $name=$_POST['name'];
  $description = $_POST['description']; 

}
}

if (isset($_POST['update-topic'])) {
    $errors = validateTopic($_POST);
    
   if (count($errors) === 0) {
            $id = $_POST['id'];
            unset($_POST['update-topic'], $_POST['id']);
            $topic_id = update($table, $id , $_POST);
            $_SESSION['message'] = 'Topic updated Successfully';
            $_SESSION['type'] = 'success';
            header('location: index.php');
           exit();
     }else{
           $id=$_POST['id'];
           $name=$_POST['name'];
           $description = $_POST['description']; 


}
}



  if (isset($_GET['id'])) {
$id = $_GET['id'];
$topic=selectOne($table,['id' => $id]);
$id = $topic['id'];
$name = $topic['name'];
$description = $topic['description'];
}

if (isset($_GET['del_id'])) {
  $id = $_GET['del_id'];
  $count = delete($table, $id);
     $_SESSION['message'] = 'Topic deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: index.php');
     exit();

}



  
?> 