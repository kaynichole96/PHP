<?php
	$validForm = false;
	$event_name = "";
	$event_description = "";
	$event_presenter = "";
	$event_setting = "";
	$event_date = "";
	$event_time = "";
	$event_name_errorMessage = "";
	$event_description_errorMessage = "";
	$event_presenter_errorMessage = "";
	$event_setting_errorMessage = "";
	$event_date_errorMessage = "";
	$event_time_errorMessage = "";
	if( isset($_POST["submitButton"]) ) {

		echo "The value from the event setting input is:" . $_POST['eventSetting'];

		if( isset($_POST["eventSetting"]) ) {
			//echo "Event Setting is: " . $event_setting;
			//header("Location: http://www.google.com");
		};

		$event_name = $_POST["eventName"];
		$event_description = $_POST["eventDescription"];
		$event_presenter = $_POST["eventPresenter"];
		$event_setting = $_POST["eventSetting"];
		$event_date = $_POST["eventDate"];
		$event_time = $_POST["eventTime"];
		//echo $event_date . "<br/>" . $event_time;

		$event_name_errorMessage = "";
		$event_description_errorMessage = "";
		$event_presenter_errorMessage = "";
		$event_setting_errorMessage = "";
		$event_date_errorMessage = "";
		$event_time_errorMessage = "";

		$validForm = true;

		include("Unit8Validations.php");
		$formValidations = new validations();

		$event_name = $formValidations->filterSpecialCharacters($event_name);
		$event_description = $formValidations->filterSpecialCharacters($event_description);
		$event_presenter = $formValidations->filterSpecialCharacters($event_presenter);

		//Validate Event Name
		if ( $formValidations->cannotBeEmpty($event_name) ) {
			$validForm = false;
			$event_name_errorMessage = "-Please enter an Event Name";
		}
		if( $formValidations->cannotBeNullOrUndefined($event_name) ) {
			$validForm = false;
			$event_name_errorMessage = "-Invalid entry, please enter an Event Name";
		}

		//Validate Event Description
		if ( $formValidations->cannotBeEmpty($event_description) ) {
			$validForm = false;
			$event_description_errorMessage = "-Please enter an Event Description";
		}
		if( $formValidations->cannotBeNullOrUndefined($event_description) ) {
			$validForm = false;
			$event_description_errorMessage = "-Invalid entry, cannot contain text 'null' or 'undefined' ";
		}
		//Validate Presenter
		if ( $formValidations->cannotBeEmpty($event_presenter) ) {
			$validForm = false;
			$event_presenter_errorMessage = "-Please enter a Presenter";
		}
		if( $formValidations->cannotBeNullOrUndefined($event_presenter) ) {
			$validForm = false;
			$event_presenter_errorMessage = "-Invalid entry, please enter a Presenter";
		}

		//Validate Event Date
		if ( $formValidations->cannotBeEmpty($event_date) ) {
			$validForm = false;
			$event_date_errorMessage = "-Please enter an Event Date";
		}

		//Validate Event Time
		if ( $formValidations->cannotBeEmpty($event_time) ) {
			$validForm = false;
			$event_time_errorMessage = "-Please enter an Event Time";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Katelyn Neuhaus</title>
	
	<style>
		* {
			box-sizing: border-box;
			font-family: "Tahoma", "Verdana", "Segoe", sans-serif;
		}

		body {
			background-color #F5F5F5;
			height: 100vh;
		}

		main {
			align-items: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.eventFormSubmitContainer {
			align-items: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
			margin-top: 200px;
		}

		.eventFormContainer {
			background-color:pink;
			border-radius: 5%;
			color: rgb(245, 245, 245);
			margin-top: 25px;
			width: 40%;
		}
		.eventFormContainer > form {
			align-items: flex-start;
			display: flex;
			flex-direction: column;
			justify-content: center;
			margin: 50px;
		}
		.eventFormContainer > form > div {
			display: flex;
			flex-direction: row;
			margin-bottom: 30px;
			width: 100%;
		}
		.eventFormContainer > form > div > div {
			display: flex;
			flex-direction: column;
			margin-right: 50px;
		}
		.eventFormContainer > form > label {
			font-size: 1.1em;
			margin-bottom: 10px;
		}
		.eventFormContainer > form > input {
			margin-bottom: 30px;
			width: 75%;
		}
		.eventFormContainer > form > textarea {
			font-size: .9em;
			margin-bottom: 30px;
			width: 100%;
		}
		.eventFormContainer input[type=submit], .eventFormContainer input[type=reset] {
			font-size: .9em;
			height: 30px;
			margin: 30px 20px 0 0;
			width: 85px;
		}

		label[for=eventSetting], #eventSetting {
			display: none;
		}

		.errorMessage	{
			color: #66ccff;
			font-size: .9em;
			font-style: italic;
			margin-bottom: 5px;
		}

		@media only screen and (min-width: 480px) and (max-width: 767px) {
		}
		@media only screen and (min-width: 768px) {
		}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready( function() {
			$("#resetButton").click( function() {
				$(".errorMessage").html("");
			});
		});
	</script>
</head>

<body>
	<main>

<?php
if($validForm) {


	include("dbConnect.php");
	try {
		$sql = "INSERT INTO wdv341_event (event_name, event_description, event_presenter, event_date, event_time)
		VALUES (:evtName, :evtDescription, :evtPresenter, :evtDate, :evtTime)";


		$statementObject = $conn->prepare($sql);

		$statementObject->bindParam(':evtName', $event_name);
		$statementObject->bindParam(':evtDescription', $event_description);
		$statementObject->bindParam(':evtPresenter', $event_presenter);
		$statementObject->bindParam(':evtDate', $event_date);
		$statementObject->bindParam(':evtTime', $event_time);

		$statementObject->execute();
    }
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
?>

	<div class="eventFormSubmitContainer">
		<h1>Thank You!</h1>
		<h3>Your event has been submitted.</h3>
		<p><?php echo $sql ?></p>
	</div>

<?php
}
else {
?>
	<div class="eventFormContainer">
		<form action="Unit8EventForm.php" method="post">
			<label for="eventName"> Event Name <span class="errorMessage"><?php echo $event_name_errorMessage ?></span> </label>
			<input id="eventName" name="eventName" placeholder="Ex. Parade" type="text" value="<?php echo $event_name ?>" />

			<label for="eventDescription"> Event Description -- (Limit 200 characters)</label>
			<span class="errorMessage"><?php echo $event_description_errorMessage ?></span>
			<textarea id="eventDescription" maxlength="200" name="eventDescription" placeholder="Tell us about your event..."><?php echo $event_description ?></textarea>

			<label for="eventPresenter"> Presenter <span class="errorMessage"><?php echo $event_presenter_errorMessage ?></span> </label>
			<input id="eventPresenter" name="eventPresenter" placeholder="Ex. James White" type="text" value="<?php echo $event_presenter ?>" />

			<label for="eventSetting"> Event Setting <span class="errorMessage"><?php echo $event_setting_errorMessage ?></span> </label>
			<input id="eventSetting" name="eventSetting" placeholder="Ex. Inside or Outside?" type="text" value="NULL <?php echo $event_setting ?>" />

			<div>
				<div>
					<label for="eventDate"> Event Date </label>
					<input id="eventDate" name="eventDate" type="date" value="<?php echo $event_date ?>" />
				</div>
				<div>
					<label for="eventTime"> Event Time </label>
					<input id="eventTime" name="eventTime" type="time" value="<?php echo $event_time ?>" />
				</div>
				<div>
					<span class="errorMessage"><?php echo $event_date_errorMessage ?></span>
					<span class="errorMessage"><?php echo $event_time_errorMessage ?></span>
				</div>
			</div>
			<div>
				<input type="submit" name="submitButton" id="submitButton" value="Submit">
				<input type="reset" name="resetButton" id="resetButton" value="Reset">
			</div>
		</form>
	</div>
<?php
}
?>
	</main>
</body>
</html>
