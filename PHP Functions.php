<?php
	//$inDate = date("m/d/Y");
	$inDate = $_POST['date'];
	function formatDateMonthFirst($inDate) {
		$outDate = date_create($inDate);
		$outDate = date_format($outDate, "m/d/Y");
		echo $outDate;
	}
	function formatDateDayFirst($inDate) {
		$outDate = date_create($inDate);
		$outDate = date_format($outDate, "d/m/Y");
		echo $outDate;
	}
	//$inString = "   QWERTY   ";
	$inString = $_POST['string'];
	function formatString($inString) {
		echo "<p> The length of the string is: <b>" . strlen($inString) . "</b> </p>";
		echo "<p> When you remove the outside white space the string is: <b>" . trim($inString) . "</b> </p>";
		echo "<p> The string in lower case is: <b>" . strtolower($inString) . "</b> </p>";

		$outString = stristr($inString, "DMACC");
		if ($outString == false) {
			echo "<p> Does the string contain 'DMACC': <b> false </b>";
		}
		else {
			echo "<p> Does the string contain 'DMACC': <b> true </b>";
		}

		/*
		echo "<p> Does the string contain 'DMACC': <b>" . function() {
			if ( stristr($inString, "DMACC") !== false ) {
				echo "TRUE";
			}
		} . "</b> </p>";
		*/
	}
	//$inNumber = 1234567890;
	$inNumber = $_POST['number'];
	function formatNumber($inNumber) {
		$outNumber = number_format($inNumber);
		echo $outNumber;
	}
	//$inCurrencyNumber = 123456;
	$inCurrencyNumber = $_POST['currencyNumber'];
	function formatCurrency($inCurrencyNumber) {
		setlocale(LC_ALL,"en_US");
		$outCurrencyNumber = money_format("%.2n", $inCurrencyNumber);
		echo $outCurrencyNumber;
	}
?>

<!DOCTYPE html>
<html>
<head>
</head>

<body>
	<main>

	<div class="assignment">
		<?php
			echo "<h3> Intro to PHP: Unit 3 PHP Functions Assignment </h3>";
			echo "<hr>";
		?>

		<br/>

		<form action="" method="post">
			<label for="date"> Date </label>
			<input type="date" id="date" name="date" />

			<div>
				<input class="button" type="submit" value="Submit" />
				<input class="button" type="reset" value="Reset" />
			</div>
		</form>
		<p> The date with the <b>month</b> first: <?php echo formatDateMonthFirst($inDate); ?> </p>
		<p> The date with the <b>day</b> first: <?php echo formatDateDayFirst($inDate); ?> </p>

		<br/><br/>

		<form action="" method="post">
			<label for="string"> String </label>
			<input type="text" id="string" name="string" value="DMACC" />

			<div>
				<input class="button" type="submit" value="Submit" />
				<input class="button" type="reset" value="Reset" />
			</div>
		</form>
		<p>
			<b> Some information about this string: </b> <?php echo $inString ?> <br/>
			<?php echo formatString($inString); ?>
		</p>

		<br/><br/>

		<form action="" method="post">
			<label for="number"> Number </label>
			<input type="number" id="number" name="number" value="1234567890" />
			<p>
				Here is a formatted number: <b> <?php echo formatNumber($inNumber); ?> </b>
			</p>


			<label for="currencyNumber"> Number </label>
			<input type="number" id="currencyNumber" name="currencyNumber" value="123456" />
			<p>
				Here is a number formatted as currency: <b> <?php echo formatCurrency($inCurrencyNumber) ?> </b>
			</p>

			<div>
				<input class="button" type="submit" value="Submit" />
				<input class="button" type="reset" value="Reset" />
			</div>
		</form>
	</div>

	</main>

	<li><a href="https://github.com/kaynichole96">GitHub</a></li>
	
</body>
</html>
