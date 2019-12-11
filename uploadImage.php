<?php
    session_start();

    if(!isset($_SESSION["logged_in"])) {
        header('Location: adminLogin.php');
        die();
    }

    if(isset($_POST["pictureName"]) && isset($_FILES["uploadFile"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(file_exists($target_file)) {
            // Error
            $_SESSION["message"] = "<h2 style='color: red'>That file already exists! Try changing the name of the file.</h2>";
        } else {
            if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
                // Error
                $_SESSION["message"] = "<h2 style='color: red'>Invalid file type, please use jpg/jpeg or png!</h2>";
            } else {
                if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
                    // Add to db
                    $db = new PDO("mysql:host=localhost;dbname=katelynn96_ei4", "katelynn96_ei4", "A62lRDdr9n");

                    $stmt = $db->prepare("INSERT INTO images (name, filename) VALUES(:name, :filename)");

                    if($stmt->execute(array(":name" => $_POST["pictureName"], ":filename" => $target_file))) {
                        $_SESSION["message"] = "<h2 style='color: green'>File uploaded!</h2>";
                    } else {
                        $_SESSION["message"] = "<h2 style='color: red'>Failed to add file to database!</h2>";
                    }

                    $db = null;
                } else {
                    // Error
                    $_SESSION["message"] = "<h2 style='color: red'>File moving failed!</h2>";
                }
            }
        }
    } else {
        
    }
?>


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

/* Table Styles */
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  text-align: left;
  padding: 8px;
  background-color: #dddddd;
  border-bottom: 1px solid black;
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
   <li><a href="logout.php">Logout</a></li>
   <li><a href="dashboard.php">Dashboard</a></li>
   <li><a href="contact.html">Contact Page</a></li>
   </ul>
   </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
   </nav>
<center><font color="white"><h1> Upload an Image!</h1></font>

<div>
<?php
  if(isset($_SESSION["message"])) {
    // Display a message to the user
    echo($_SESSION["message"]);

    unset($_SESSION["message"]);
  }
?>

<form action="uploadImage.php" method="POST" enctype="multipart/form-data">
<input type="text" name="pictureName" placeholder="Picture Name">  
<br>
<input type="file" name="uploadFile">
<br> 
<button type="submit">Upload this image!</button>
</form>

</div>

  </body>
  </html>
