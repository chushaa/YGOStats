<?php
	include("classes/Card.php");

	$card = new Card();
	session_start();

	$userId = $_SESSION['sess_user_id'];
	$deckList = $_SESSION['current_list'];
	$deckQtyList = $_SESSION['current_qty_list'];

	$deckCount = count($deckList);
	
	for($i = 0; $i <= $deckCount; $i++){
		$specificQuery = "INSERT INTO CARD_DECK(CARD_ID, QUANTITY, DECK_ID) VALUES($deckList[$i], $deckQtyList[$i], $deckId)";
		$res = $card->execute($specificQuery);
	}
	header('Location: index.php');
?>