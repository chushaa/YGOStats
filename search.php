<?php
include_once("classes/Card.php");

$card = new Card();

	$name = $card->escape_string($_POST['name']);
	$type = $card->escape_string($_POST['type']);
	$effect = $card->escape_string($_POST['effect']);

	if($type == "Type")
	{
		$type = "";
	}

	$query = "";

	if($name != "")
	{
		if($type != "")
		{
			if($effect != "")
			{
				$query = "SELECT * FROM CARD WHERE CARD_NAME LIKE '%$name%' AND CARD_TYPE LIKE '%$type%' AND CARD_EFFECT LIKE '%$effect%' ORDER BY CARD_NAME ASC";
				$result = $card->execute($query);
			}else{
				$query = "SELECT * FROM CARD 
								WHERE CARD_NAME LIKE '%$name%' AND 
									  CARD_TYPE LIKE '%$type%' 
								ORDER BY CARD_NAME ASC";
				$result = $card->execute($query);
			}
		}elseif($effect != ""){
			$query = "SELECT * FROM CARD 
								WHERE CARD_NAME LIKE '%$name%' AND 
									  CARD_EFFECT LIKE '%$effect%' 
								ORDER BY CARD_NAME ASC";
			$result = $card->execute($query);
		}else{
			$query = "SELECT * FROM CARD 
								WHERE CARD_NAME LIKE '%$name%' 
								ORDER BY CARD_NAME ASC";
			$result = $card->execute($query);
		}
	}elseif($type != ""){
		if($effect != "")
		{
			$query = "SELECT * FROM CARD 
								WHERE CARD_TYPE LIKE '%$type%' AND 
									  CARD_EFFECT LIKE '%$effect%' 
								ORDER BY CARD_NAME ASC";
			$result = $card->execute($query);
		}else{
			$query = "SELECT * FROM CARD 
								WHERE CARD_TYPE LIKE '%$type%' 
								ORDER BY CARD_NAME ASC";
			$result = $card->execute($query);
		}
	}elseif($effect != ""){
		$query = "SELECT * FROM CARD WHERE CARD_EFFECT LIKE '%$effect%' 
								ORDER BY CARD_NAME ASC";
		$result = $card->execute($query);
	}else{
		$query = "SELECT * FROM CARD 
								ORDER BY CARD_NAME ASC";
	}
	
	if($query != "")
	{
		$checkCount = count($card->getData($query));

		if($checkCount == 0)
		{
			$response = "";
		}else{
			$response = $card->getData($query);
		}
	}
	
	echo json_encode($response);
	exit;
?>