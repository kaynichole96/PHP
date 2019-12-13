<?php
    // Self posting form

    if(!empty($_POST)) {
        include("database.php");
        if(!$db) {
            echo "Failed to connect to database!";
        } else {
            $stmt = $db->prepare("INSERT INTO wdv341_students (eventName, eventDesc, eventLocation, eventDate) VALUES (?, ?, ?, ?)");
            if($stmt->execute(array($_POST["eventName"], $_POST["eventDesc"], $_POST["eventLocation"], $_POST["eventDate"]))) {
                echo "<h2 style='color: green'>Your event has been submitted!</h2>";
            } else {
                echo "<h2 style='color: red'>Error submitting your event!</h2>";
            }
        }
    }
?>

<html>
<body>

<h2>Event form</h2>

<form action=""method="POST">
  Event Location:<br>
  <input type="text" name="eventLocation">
  <br>
  Event Name:<br>
  <input type="text" name="eventName">
  <br>
  Event Time:<br>
  <input type="date" name="eventDate">
  <br>
  Event Description:<br>
  <textarea cols="20" rows="5" name="eventDesc"></textarea>
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
