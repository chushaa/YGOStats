<?php
	include_once("classes/Card.php");

	$card = new Card();

if(isset($_POST['deckDeleteId'])){
	$id = $_POST['deckDeleteId'];

	$querry1 = "DELETE FROM DECK WHERE DECK_ID =".$id;
	$querry2 = "DELETE FROM CARD_DECK WHERE DECK_ID =".$id;
	
	$result1 = $card->execute($querry1);
	$result2 = $card->execute($querry2);
}
	
header('Location: index.php');
?>