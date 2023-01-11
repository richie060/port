

<?php include ('../server.php');


// if user not logged in cannot access the home page

if (empty($_SESSION['username'])) {
  header('location: ../login.php');
  // code...
}

?>
<?php include ('post.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--  <link rel="stylesheet" href="../../css/style.css">
 -->    <link rel="stylesheet" href="../admi.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <title></title>
</head>
<body>
  <!-- NAVBAR -->   
  <div class="wrapper">
      <div class="logo"><a href="index.html"> <span style="color: yellow;">Dig</span>ital</a></div>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
              <div class="contentadmin">
    
    <?php if (isset($_SESSION['success'])):?> 
      <div class="error success">
        <h3>
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </h3>
      </div>
  <?php endif ?>
    <?php if (isset($_SESSION["username"])): ?> 
      <p style="color:yellow;">Welcome    <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
      <?php endif ?>

  </div>
    </div>
  <div>
  </div>
<div class="admin-wrapper">
  <div class="left-sidebar">
  <ul>
   
    <li><a href="../appointments/index.php">Manage Appointments</a></li>
    <li><a href="../subscription/index.php">Manage Subscription </a></li>
    <li><a href="../messages/index.php">Manage Messages </a></li>
     <li><a href="index.php">Manage Posts</a></li>
    <li><a href="index.php">Manage Topics</a></li>


  </ul>

   </div>
  <div class="admin-content">
<div class="button-group"> 
<a href="create.php" class="btn btn-big btn-primary">Add post</a>
<a href="index.php" class="btn btn-big btn-primary">Manage post</a>
 </div>


 <div class="content">

   
   <h2 class="page-title">Manage post</h2>


  
   <?php include('../errors.php'); ?>

   
   <form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" class="text-imput" value="<?php echo $id ?>">
     <div>
       <label>Title</label>
       <input type="text" name="title" class="text-imput" value="<?php echo $title ?>">
     </div>
     <div>
       <label>Body</label>
       <textarea name="body" id="body"><?php echo $body ?></textarea>
            </div>

             <div>
       <label>Image</label>
       <input type="file" name="image"  class="text-imput" ></textarea>
            </div>
            <div>
              <label>Topic</label>
               <select name="topic_id" class="text-input">
                 <option value=""></option>
                    <?php foreach ($topics as $key => $topic): ?>
                      <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name']; ?></option>
                      <?php else:  ?>
                  <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name']; ?></option>
                        <?php endif;  ?>
                         <?php endforeach ?>

               </select>
            </div>
<div>
<?php if (empty($published) && $published == 0): ?>
  <label>
  <input   type="checkbox" name="published">
    Publish
  </input>
  </label>
<?php else: ?>
  <label>
    <input   type="checkbox" name="published" checked>
    Publish
  </label>
<?php endif; ?>
</div>

            <div>
              <button type="submit" name="update-post" value="update-post" class="btn btn-big btn-primary">Update Post</button>
            </div>
   </form>
 </div>
   </div>
  </div>
     <script type="text/javascript" src="script.js"></script>

</body>
</html>