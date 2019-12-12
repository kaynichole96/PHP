<?php
	// Get the Event data from the server.

	// Connect to local MySQL server
	$mysqli = new mysqli("localhost", "katelynn96_ei4", "A62lRDdr9n", "katelynn96_ei4");
	if($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	// Retrieve the event data from db table - events will be descending by date and ascending by time
	$query_result = $mysqli->query("SELECT * FROM wdv341_event_table ORDER BY DATE(event_date) DESC, event_time ASC");

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;
			padding: 10px;
		}

		.displayEvent{
			text-align: left;
			font-size:18px;
		}

	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>
    <h3><?php echo $query_result->num_rows ?> Events are available today.</h3>

<?php
	// Display each row as formatted output in the div below
	for($row_no = $query_result->num_rows - 1; $row_no >= 0; $row_no--) {
		$query_result->data_seek($row_no);
		$this_row = $query_result->fetch_assoc();
?>

<p>
	<div class="eventBlock">
		<div>
			<span class="displayEvent">Event: <?php echo $this_row['event_name']; ?></span>
			<br>
			<span>Presenter: <?php echo $this_row['event_presenter']; ?> </span>
		</div>
		<div>
			<span class="displayDescription">Description: <?php echo $this_row['event_description']; ?></span>
		</div>
		<div>
			<span class="displayTime">Time: <?php echo $this_row['event_time']; ?></span>
		</div>
		<div>
			<span class="displayDate">Date: <?php echo $this_row['event_date']; ?></span>
		</div>
	</div>
</p>

<?php
	}

	// Close the database connection
	$mysqli->close();
?>
</div>
</body>
</html>
