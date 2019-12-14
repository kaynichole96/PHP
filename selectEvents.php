<?php
  include("database.php");
  
  if(!$db) {
    echo "<h1>Error connecting to database!</h1>";
  } else {
    if(!$stmt = $db->prepare("SELECT * FROM wdv341_students")) {
      echo "<h1> Error preparing SQL Query!</h1>";
    } else {
      if(!$stmt->execute()) {
        echo "<h1> Error executing SQL Query!</h1>";
      } else {
        // Display results

?>

<style>
  th, td {
    padding: 10px;
    border-right: 1px solid black;
    border-bottom: 1px solid black;
  }
</style>

<html>

<table>
  <tr>
    <th>Event ID</th>
    <th>Event Name</th>
    <th>Event Description</th>
    <th>Event Location</th>
    <th>Event Date</th>
  </tr>

<?php
  // Show existing images in the database.

      while($row = $stmt->fetch()) {
        // Create table
        echo("<tr>");
        echo("<td>{$row["id"]}</td>");
        echo("<td>{$row["eventName"]}</td>");
        echo("<td>{$row["eventDesc"]}</td>");
        echo("<td>{$row["eventLocation"]}</td>");
        echo("<td>{$row["eventDate"]}</td>");
        echo("<td><a href='updateEventForm.php?id={$row["id"]}'>Update</a></td>");
        echo("</tr>");
      }

    }
  }
}

?>

<html>