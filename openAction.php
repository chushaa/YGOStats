<?php
	include("classes/Card.php");
	session_start();

	$card = new Card();

	$userId = $_SESSION['sess_user_id'];
	
	$deckChoice = $_POST['deckChoice'];
	
	$query = "SELECT * FROM DECK where DECK_NAME='$deckChoice' AND USER_ID=".$userId;

	$result = $card->getData($query);

	$resultQuery = "SELECT * FROM CARD_DECK WHERE DECK_ID='$deckChoice'";
	$resultSet = $card->getData($resultQuery);
	
	
	$response = json_encode($resultSet);

	echo $response;
	exit;
?>