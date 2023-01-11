<?php include ('../../Admin/server.php'); 
include ('../../path.php'); 
include ('../../Admin/errors.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets talk over coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../../css/style.css">
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
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="../blogs/blog.php">Home</a></li>
        <li><a href="<?php echo BASE_URL . '/Admin/login.php' ?>">Admin</a></li>
      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
</div>
<!-- //NAVBAR -->
<br>
<br>
    <form action="contactus.php" method="post">
        <div class="container">
            <h4>Book an appointment with us</h4><br>
           <div class="gridmsg" style="width:60%; float: right;">
               <input type="text"  name="name" placeholder="Name" required>
               <input type="email" name="email" placeholder="Email" required>
               <input type="number" name="phoneno" placeholder="Phone number"  required>
               <input type="text"  name="companyname" placeholder="Company Name" required>
               <input type="text"  name="businessname" placeholder="Business Name" required>
               <input type="url"   name="link" placeholder="Company Website" required>
               <textarea name="msg"  cols="40" rows="5" placeholder="Message" required ></textarea>
                <button class="btn btn-success" name="booking" type="submit" style="margin: 10px auto; ">Submit</button>
          </div>
        </div>
    </form>
    <!-- footer -->
<div class="footer">
  <div class="footer-content">
    <div class="footer-section about">
      <h1 class="logo-text"><span>Dig</span>ital</h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt int occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <div class="contact">
        <span><i class="fas fa-phone"></i>&nbsp;071840400</span>
        <span><i class="fas fa-envelope"></i>&nbsp;digital@gmail.com</span>
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
       <form action="contactus.php" method="post">
         <input type="email" name="email" class="text-input contact-input" style="width: 100%;" placeholder="Your email address.....">
         <textarea name="message" class="text-input contact-input" style="width: 100%;"  placeholder="Type your message here....."></textarea>
         <button type="submit" class="btn btn-big contact-btn">
          <i class="fas fa-envelope"></i> Send</button>
       </form>
     </div>
  </div>
    <div class="footer-bottom">&copy; Reasons | All rights reserved</div>
</div>
</body>
</html>