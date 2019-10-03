<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>WDV341 Intro PHP - Form Example</title>

	<style>

		form {
			margin-left: 50px;
		}

		#nicknameHP, #likeToSingHP {
			display: none;
		}

	</style>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>WDV101 Intro HTML and CSS Chapter 9 - Creating Forms - Code Example</h2>
	<p><strong>Basic Form Handler</strong> - This process will display the 'name = value' pairs for all the elements of a form. This summary will on any number of form elements regardless of their name attribute value. </p>

	<p>Use <strong>basicFormExample.php</strong> in the action attribute of your form. </p>
	<p>Field '<strong>name</strong>' - The value of the name attribute from the HTML form element.</p>
	<p>Field <strong>'value</strong>' - The value entered in the field. This will vary depending upon the HTML form element.</p>

	<hr/>
	<br/>

	<form id="form1" name="form1" method="post" action="formHandler.php">
		<p>First Name:
			<input type="text" name="firstName" id="firstName" />
		</p>
		<p id="nicknameHP">Nickname:
			<input type="text" name="nickname" id="nickname" />
		</p>
		<p>Last Name:
			<input type="text" name="lastName" id="lastName" />
		</p>
		<p>School:
			<input type="text" name="school" id="school" />
		</p>
		<p> Do you play an instrument: <br/>
			<input type="radio" name="playInstrument" value="yes" checked> Yes <br/>
			<input type="radio" name="playInstrument" value="no"> No <br/>
			<input type="radio" name="playInstrument" value="multiple"> Multiple <br/>
		</p>
		<p id="likeToSingHP"> Do you like to sing: <br/>
			<input type="radio" name="likeToSing" value="yes"> Yes <br/>
			<input type="radio" name="likeToSing" value="no"> No <br/>
		</p>
		<p> Favorite Music: <br/>
			<input type="checkbox" name="favoriteMusic1" value="blues"> Blues <br/>
			<input type="checkbox" name="favoriteMusic2" value="classical"> Classical <br/>
			<input type="checkbox" name="favoriteMusic3" value="country"> Country <br/>
			<input type="checkbox" name="favoriteMusic4" value="jazz"> Jazz <br/>
			<input type="checkbox" name="favoriteMusic5" value="pop"> Pop <br/>
			<input type="checkbox" name="favoriteMusic6" value="rock"> Rock <br/>
			<input type="checkbox" name="favoriteMusic7" value="soundtrack"> Soundtrack <br/>
		</p>

		<p> Preferred listening experience: <br/>
			<select name="listeningExperience" multiple>
				<option value="home"> Home </option>
				<option value="car"> Car </option>
				<option value="liveConcert"> Live Concert </option>
				<option value="musicFestival"> Music Festival </option>
			</select>
		</p>
		<p>
			<input type="submit" name="button" id="button" value="Submit" />
			<input type="reset" name="button2" id="button2" value="Reset" />
		</p>
	</form>

	<p>&nbsp;</p>
</body>

</html>
