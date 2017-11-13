<!DOCTYPE HTML>
<html>

<head>
  <title>Personal Website</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">Fridah<span class="logo_colour">_Kanario</span></a></h1>
          <h2>Personal Website</h2>
        </div>
        <p style="float: right;"><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About Me</a></li>
          <li><a href="portfolio.html">My Portfolio</a></li>



          <li><a href="#">More About Me</a>
            <ul>
                <li><a href="work.html">Work Experience</a>
                <li><a href="#">Education</a>
                  <ul>
                  <li><a href="undergraduate.html">Undergraduate</a></li>
                  <li><a href="highschool.html">High school</a></li>
                  <li><a href="primary.html">Primary school</a></li>
                </ul>
              <li><a href="Achievements.html">Achievements</a></li>
              <li><a href="hobbies.html">Hobbies/Intrest</a></li>
              </li>

            </ul>
          </li>
          <li class="selected"><a href="contact.php">Contact Me</a></li>
        </ul>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div id="gallery">
          <ul class="images">
            <li class="show"><img width="450" height="450" src="images/1.jpg" alt="photo_one" /></li>
            <li><img width="450" height="450" src="images/2.jpg" alt="photo_two" /></li>
            <li><img width="450" height="450" src="images/3.jpg" alt="photo_three" /></li>
            <li><img width="450" height="450" src="images/4.jpg" alt="photo_four" /></li>
            <li><img width="450" height="450" src="images/5.jpg" alt="photo_five" /></li>
          </ul>
        </div>
      </div>
      <div id="content">
        <h1>Contact</h1>
        <?php
        if(isset($_POST['contact_submitted'])){
           $name=$_POST['your_name'];
           $user_email= $_POST['your_email'];
           $user_message = $_POST['your_message'];

           require 'PHPMailer/PHPMailerAutoload.php';
           $mail = new PHPMailer;
            //production for  SMTP for GMAIL
            $mail->Mailer = "smtp";
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = 'enter your email address';
            $mail->Password = 'email password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom($user_email, $name);
            $mail->addAddress('enter email address,'');
             //end of SMTP configuration
            $mail->addCC('');

            $mail->isHTML(true);
            $mail->Subject = 'Enquiry from the website';
            $mail->Body =  "Hello there, \nThis message was sent by <strong><i> $user_email</i> </strong>. The Entire message is as follows: <br>".$user_message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            else {
                echo 'Email has been sent successfully.';
            }

        }

        ?>
        <form id="contact"  method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <p>Designed by <a href="contact.php">FridahKanario</a></p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
