<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="contact-form">
<h2>Contact us</h2>

     <form method="post" action="">
     <input type="text" name="name" placeholder="Your Name" required>
     <input type="text" name="phone" placeholder="phone no" required>
     <input type="email" name="email" placeholder="Your Email" required>
     <textarea  name="message" placeholder="Leave us a message..." required></textarea>
     <div class="g-recaptcha" data-sitekey="6LdWCgAVAAAAAMxVWCUosuru1GW8Qra2jj3Epkv6"></div>
     <input type="submit" name="name" value="SUBMIT" class="submit-btn" required>
     <div class="status">

     <?php
      if(isset($_POST['submit'])){
          $user_name = $_POST['name'];
          $phone = $_POST['phone'];
          $user_email = $_POST['email'];
          $user_message = $_POST['message'];

          $email_from = 'channel76400@gmail.com';
          $email_subject = "New Form Submission";
          $email_body = "Name: $user_name. \n".
                        "Phone no: $phone. \n".
                        "Email: $user_email. \n".
                        "Message: $user_message. \n".

        $to_email = "jobins9633@gmail.com";
        $headers = "From: $email_from \r\n";
        $headers .= "Replay-To: $user_email \r\n";

        $secretKey = "6LdWCgAVAAAAAC-z7HwTpyGR5aeLcG_SeV4f_YKo";
        $responseKey = $_POST['g-recaptcha-response'];
        $UserIP = $_SERVER['REMOTE_ADDR'];
        $url = " https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

        $response = file_get_contents($url);
        $response = json_decode($response);

        if($response->success){
            mail($to_email,$email_subject,$email_body,$headers);
            echo "Message sented successfully";
        }else{
            echo "<span>Invalid Captcha, Please try again</span>";
        }


      }

     ?>

     </div>

     </form>
    </div>
</body>
</html>