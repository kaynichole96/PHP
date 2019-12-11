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
<center><font color="white"><h1>Admin Login</h1></font>

<div>
<?php
    session_start();

    // Handle admin login
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        // Check for these details in DB
        $db = new PDO("mysql:host=localhost;dbname=katelynn96_ei4", "katelynn96_ei4", "A62lRDdr9n");
        if(!$db) {
            // Display Error to user
            echo('<h3 class="display-error"> Sorry, I am unable to check your login! (connection error)<h3>');
        } else {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if(empty($username) || empty($password)) {
                echo('<h3 class="display-error"> Invalid input, try again!</h3>');
            } else {

                // Search for user
                if(!$stmt = $db->prepare("SELECT * FROM logins WHERE username=:user AND password=:pass LIMIT 1")) {
                    // DisplayError to user
                    echo('<h3 class="display-error"> Sorry, I am unable to check your login! (prepare error)</h3>');
                } else {
                      // Execute statement
                      if(!$stmt->execute(array(":user" => $username, ":pass" => $password))) {
                          // Display Error to user
                          echo('<h3 class="display-error"> Sorry, I am unable to check your login! (execution error)</h3>');
                      } else {
                          // Check if user is logged in
                          $query_result = $stmt->fetchAll();
                          if(count($query_result) == 1) {
                              $_SESSION["logged_in"] = true;
                              $_SESSION["username"] = $username;
                              header('Location: dashboard.php');

                              $db = null;
                              die();
                          } else {
                              echo('<h3 class="display-error"> Those are invalid details!</h3>');
                          }
                      }
                    }
                }
            }

            $db = null;
        }

    // Redirect already logged in users
    if(isset($_SESSION["logged_in"])) {
        header('Location: dashboard.php');
        die();
    }
?>

<form method="POST" action="">
    <input name="username" type="text" placeholder="Username">
    <input name="password" type="password" placeholder="Password">
    <button type="submit">Login!</button>
</form>
</div>

  </body>
  </html>
