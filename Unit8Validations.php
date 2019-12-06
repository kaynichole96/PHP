<?php
	class validations {

		public function __construct() {

		public function filterSpecialCharacters($inFieldValue) {
			$inFieldValue = htmlspecialchars($inFieldValue);
			$inFieldValue = filter_var($inFieldValue, FILTER_SANITIZE_SPECIAL_CHARS);
			return $inFieldValue;
		}


		public function cannotBeEmpty($inFieldValue) {
			$inFieldValue = trim($inFieldValue);
			if( empty($inFieldValue) ) {
				return true;
			}
		}

		public function cannotBeNullOrUndefined($inFieldValue) {
			if(preg_match("/undefined|null/i", $inFieldValue) ) {
				return true;
			}
		}

		public function validatePhoneCharacters($inFieldValue) {
			if( preg_match("/[-\(\)]/", $inFieldValue) ) {
				return true;
			}
		}
		public function characterLengthLessThan200($inFieldValue) {
			if( strlen($inFieldValue) > 200 ) {
				return true;
			}
		}
	}
?>
