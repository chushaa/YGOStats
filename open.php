<?php
	include("classes/Card.php");
	session_start();

	$card = new Card();

	$userId = $_SESSION['sess_user_id'];
	
	$query = "SELECT * FROM DECK where USER_ID=".$userId;

	$result = $card->getData($query);

	$numOfDecks = count($result);

	if($numOfDecks > 0){
		$response = "<table border='0'>";
		$response .= "<tr>";
		$response .= "<td>";
		$response .= "<select name = 'deckName' id = 'deckName'>";
		foreach($result as $row){
			$deckId = $row['DECK_ID'];
			$deckName = $row['DECK_NAME'];
			
			$response .= "<option value='".$deckId."'>$deckName</option>";
		}
		$response .= "</td>";
		$response .= "</tr>";
		$response .= "<tr>";
		$response .=  "<td><input type = 'submit' name='submit' onClick='openAction()' value='Open'></td>";
		$response .= "</tr>";
		$response .= "</table>";
	}else{
		$response = "<p>No Saved Decks Yet!</p>";
	}

	echo $response;
	exit;
?>