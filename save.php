<?php
	include("classes/Card.php");
	session_start();

	$card = new Card();

	$deckId = $_POST['deckId'];
	$mainDeckSize = $_POST['mainDeckSize'];
	$extraDeckSize = $_POST['extraDeckSize'];
	$deckSize = $mainDeckSize + $extraDeckSize;
	$_SESSION['current_list'] = $_POST['deckList'];
	$_SESSION['current_type_list'] = $_POST['deckTypeList'];
	$_SESSION['current_qty_list'] = $_POST['deckQtyList'];
	
	if($deckId == "None"){
		$deckName = "";
		$deckDescription = "";
	}else{
		$query = "SELECT * FROM DECK where DECK_ID=".$deckId;

		$result = $card->getData($query);

		foreach($result as $row){
			$deckName = $row['DECK_NAME'];
			$deckDescription = $row['DECK_DESCRIPTION'];
		}
	}

	$response = "<form name='form1' id='form1' action='saveAction.php' method='post'>";
	$response .= "<table border='0'>";
	$response .= "<tr>";
	$response .= "<td>Deck Name</td>";
	$response .=  "<td><input type = 'text' name='deckName' value='".$deckName."'></td>";
	$response .= "</tr>";
	$response .= "<tr>";
	$response .= "<td>Deck Description</td>";
	$response .= "<td><input type = 'text' name='deckDescription' value='".$deckDescription."'></td>";
	$response .= "</tr>";
	$response .= "<tr>";
	$response .= "<td>Total Deck Size</td>";
	$response .= "<td><input type = 'text' name='deckSize' value='$deckSize' readonly></td>";
	$response .= "</tr>";
	$response .= "<tr>";
	$response .= "<td><input type='hidden' name='deckId' value='$deckId'></td>";
	$response .= "<td><input type='submit' name='update' class = 'btn btn-primary' value = 'Save'></td>";
	$response .= "</tr>";
	$response .= "</table></form>";

	echo $response;
	exit;
?>