<?php
	include("classes/Card.php");

	$card = new Card();
	session_start();

	$deckId = $card->escape_string($_POST['deckId']);
	$deckName = $card->escape_string($_POST['deckName']);
	$deckDescription = $card->escape_string($_POST['deckDescription']);
	$deckSize = $card->escape_string($_POST['deckSize']);

	$userId = $_SESSION['sess_user_id'];
	$deckList = $_SESSION['current_list'];
	$deckQtyList = $_SESSION['current_qty_list'];

	$deckCount = count($deckList);

	if($deckId == "None"){
		$query = "INSERT INTO DECK(DECK_NAME, DECK_SIZE, DECK_DESCRIPTION, USER_ID) VALUES('$deckName','$deckSize','$deckDescription','$userId')";
		$result = $card->execute($query);
		
		$findDeckIdQuery = "SELECT * FROM DECK WHERE DECK_NAME='$deckName' AND DECK_DESCRIPTION='$deckDescription' AND USER_ID='$userId'";
		
		$finder = $card->getData($findDeckIdQuery);
		
		$newDeckId = $finder[0]['DECK_ID'];
		
		for($i = 0; $i < $deckCount; $i++){
			$specificQuery = "INSERT INTO CARD_DECK(CARD_ID, QUANTITY, DECK_ID) VALUES('$deckList[$i]','$deckQtyList[$i]','$newDeckId')";
			$res = $card->execute($specificQuery);
		}
	}else{
		$query = "UPDATE DECK SET DECK_NAME='$deckName',DECK_SIZE='$deckSize',DECK_DESCRIPTION='$deckDescription' WHERE DECK_ID=".$deckId;
		$result = $card->execute($query);

		for($i = 0; $i < $deckCount; $i++){
			$specificQuery = "UPDATE CARD_DECK SET QUANTITY = '$deckQtyList[$i]' WHERE DECK_ID='$deckId' AND CARD_ID='$deckList[$i]'";
			$res = $card->execute($specificQuery);
		}
	}
	header('Location: index.php');
?>