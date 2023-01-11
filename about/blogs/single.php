
<?php
//  include('topics.php');
 include ('../../path.php'); 
 include('post.php'); 



 if(isset($_GET['id'])){
  $posts = selectOne('post', ['id' => $_GET['id']]);
 }

 
 $post = getPublishedPost();

//  $post = selectAll('post', [published] => 0 );

//  dd($post);


//  $topic = selectAll('topics');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<title><?php echo $posts['title']; ?> | Richie</title>
</head>
<body>
	<!-- NAVBAR -->
  <div>
  <nav>
    <div class="wrapper">
      <div class="logo"><a href="<?php echo BASE_URL . '/index.php' ?>"> <span style="color: yellow;">Dig</span>ital</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="<?php echo BASE_URL . '/about/contactus/contactus.php' ?>">Contact Us</a></li>
        <li><a href="<?php echo BASE_URL . '/about/blogs/blog.php' ?>">Blogs</a></li>
         <li><a href="<?php echo BASE_URL . '/Admin/login.php' ?>">Admin</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
</div>
<div class="bodsizing">
</div>

<!-- Main content -->
	<div class="content clearfix">
		<div class="main-content single">
			<h2 class="post-title"><?php echo $posts['title']; ?> </h2>
      <div class="post-content">
      <?php echo html_entity_decode($posts['body']); ?> 
      </div>
		</div>

		<div class="sidebar single">
    <div class="section popular">
        <h2 class="section-title">Popular </h2>
        
           <?php foreach ($post as $p): ?>
        <div class="post clearfix">
          <img src="<?php echo BASE_URL . '/images/' . $p['image']; ?>" alt="">
           <a href="single.php?id=<?php echo $p['id']; ?>" class="title" ><?php echo $p['title']; ?></a>
        </div>
        <?php endforeach;  ?>
    </div>
    
<!-- //Main content -->
			<div class="section topics">
				<h2 class="section-title single" >Topics</h2>
				     <ul>
					    <?php foreach ($topics as $topic): ?>
						  <li>
                  <a href="<?php echo BASE_URL .  '/about/blogs/blog.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a>
              </li>
              <?php endforeach; ?>
				    </ul>
			</div>
		</div>
	</div>



<!-- footer -->
<div class="footer">
  <div class="footer-content">
    <div class="footer-section about">
      <h1 class="logo-text"><span>Dig</span>ital</h1>
        <p>Reasons Internet Marketing Agency is a full-service digital marketing agency. Attract, Impress, and Convert more leads online and get results with Reasons.
      </p>
      <div class="contact">
        <span><i class="fas fa-phone"></i>&nbsp;071840400</span>
        <span><i class="fas fa-envelope"></i>&nbsp;reasonsdigital@gmail.com</span>

      </div>
      <div class="socials">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
     <div class="footer-section links">
       <h2>Quick links</h2>
       <br>
       <ul>
       <a href="<?php echo BASE_URL . '/index.php' ?>"><li>Home</li></a>
    
         <a href="<?php echo BASE_URL . '/about/contactus/contactus.php' ?>"><li>Contact Us</li></a>
         <a href="<?php echo BASE_URL . '/about/blogs/blog.php' ?>"><li>Blogs</li></a>
      
       </ul>
     </div>
     <div class="footer-section contact-form" >
       <h2>Contact us</h2>
       <br>
       <form action="blog.php" method="post">
         <input type="email" name="email" class="text-input contact-input" style="width: 100%;" placeholder="Your email address.....">

         <textarea name="message" class="text-input contact-input" style="width: 100%;"  placeholder="Type your message here....."></textarea>

         <button type="submit" name="sendmessage" class="btn btn-big contact-btn">
          <i class="fas fa-envelope"></i> Send</button>
       </form>
     </div>
  </div>
    <div class="footer-bottom">&copy; Reasons | All rights reserved</div>

</div>


</body>
</html>