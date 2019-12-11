<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<style type="text/css">
   body { background: #708090 !important; }

<style>

* {box-sizing: border-box}
body {font-family: 'Lobster', cursive; Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}



}
.nav a{
Color: white !important;
font-size: 1.8em !important;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}

/* Mobile Styles */
@media only screen and (max-width: 400px) {
  body {
    background-color: #F09A9D; /* Red */
  }
}

/* Tablet Styles */
@media only screen and (min-width: 401px) and (max-width: 960px) {
  body {
    background-color: #F5CF8E; /* Yellow */
  }
}

/* Desktop Styles */
@media only screen and (min-width: 961px) {
  body {
    background-color: #B2D6FF; /* Blue */
  }
}

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color:white;
  padding: 5px;
}
.grid-item {
  background-color:white;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 5px;
  font-size: 10px;
  text-align: center;
}


</style>
</head>
 <body>

   <nav class="navbar navbar-inverse">
   <div class="container-fluid">
   <!-- Brand and toggle get grouped for better mobile display -->
   <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
   <span class="sr-only">Toggle navigation</span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   </button>
   </div>

   <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <center><ul class="nav navbar-nav">
   <li><a href="homepage.html">Home</a></li>
   <li><a href="Aboutpage.html">About Me</a></li>
   <li><a href="Client%20Proofs.php">Client Proofs</a></li>
   <li><a href="adminLogin.php">Login</a></li>
   <li><a href="contact.html">Contact Page</a></li>
   </ul>
   </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
   </nav>
<center><font color="white"><h1>Client Proofs</h1></font>

 <div class="grid-container">

<?php
      $db = new PDO("mysql:host=localhost;dbname=katelynn96_ei4", "katelynn96_ei4", "A62lRDdr9n");

      $stmt = $db->prepare("SELECT * FROM images");
      
      if($stmt->execute()) {
        while($row = $stmt->fetch()) {
          // Create images
          echo "<div class='grid-item'><img src='{$row["filename"]}' alt='{$row["name"]}' width='200' height='150'>";
          echo '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">';
          echo '<input type="hidden" name="cmd" value="_s-xclick">';
          echo '<input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">';
          echo '<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">';
          echo '<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">';
          echo '</form></div>';
        }
      }
  
  
  
      $db = null;
?>

<div class="grid-item">
<img src="wedding1.jpg" alt="wedding1" width="200" height="150">
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></div>

   <div class="grid-item">
  <img src="family.jpg" alt="family" width="200" height="150">
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">
  <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
  <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
  </form></div>

   <div class="grid-item">
   <img src="dog3.jpg" alt="dog3" width="200" height="150">
   <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
   <input type="hidden" name="cmd" value="_s-xclick">
   <input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">
   <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
   <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form></div>

    <div class="grid-item">
    <img src="brother.jpg" alt="brother" width="200" height="150">
     <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
     <input type="hidden" name="cmd" value="_s-xclick">
     <input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">
     <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
     <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
     </form></div>

   <div class="grid-item">
   <img src="couple.jpg" alt="couple" width="200" height="150">
   <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
   <input type="hidden" name="cmd" value="_s-xclick">
   <input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">
   <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
   <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
     </form></div>

    <div class="grid-item">
     <img src="flower2.jpg" alt="flowers" width="200" height="150">
     <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
     <input type="hidden" name="cmd" value="_s-xclick">
     <input type="hidden" name="hosted_button_id" value="456KPJLPYHW9Y">
     <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
     <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
     </form></div>

</div>

    <div class="footer">
    </div>

  </body>
  </html>
