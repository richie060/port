<?php
$receiver = "richuhiwa@gmai.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "richuhi060@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
 echo "Email sent successfully to $receiver";
}else{
 echo "Sorry, failed while sending mail!";
}
?>