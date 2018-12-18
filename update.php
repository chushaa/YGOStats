<?php
	//if(isset($_POST['updatebtn']))
	//{
		include('classes/Card.php');
		$url = "https://db.ygoprodeck.com/api/v2/cardinfo.php";
		$jsondata = file_get_contents($url);
		$obj = json_decode($jsondata,true);
		
		$card = new Card();	
		
		for($i = 0; $i < sizeof($obj[0]); $i++){
			$id = $obj[0][$i]['id'];

			$checkQuery = "SELECT CARD_ID FROM CARD WHERE CARD_ID = $id";

			$checkCount = count($card->getData($checkQuery));

			if($checkCount == 0)
			{
				$cardId = (int)$id;
				$cardName = $card->escape_string($obj[0][$i]['name']);
				$cardType = $card->escape_string($obj[0][$i]['type']);
				$cardImageLocation = $card->escape_string("images/$id.jpg");
				$cardEffect = $card->escape_string($obj[0][$i]['desc']);
				$cardBanTcg = $card->escape_string($obj[0][$i]['ban_tcg']);

				$updateStmtGeneral = "INSERT INTO CARD(CARD_ID, CARD_NAME, CARD_TYPE, CARD_IMAGE_LOCATION, CARD_EFFECT, CARD_BAN_TCG) VALUES ($cardId, '$cardName', '$cardType', '$cardImageLocation', '$cardEffect', '$cardBanTcg')";
				
				$executeStatment = $card->execute($updateStmtGeneral);
				
				if(strpos($cardType, 'Monster') == true)
				{
					$monsterAttribute = $card->escape_string($obj[0][$i]['attribute']);
					$monsterLevel = (int)$obj[0][$i]['level'];
					$monsterType = $card->escape_string($obj[0][$i]['race']);
					$monsterAttack = (int)$obj[0][$i]['atk'];
					$monsterDefense = (int)$obj[0][$i]['def'];
					$monsterScale = (int)$obj[0][$i]['scale'];
					$monsterLinkValue = (int)$obj[0][$i]['linkval'];
					$monsterLinkMarkers = $card->escape_string($obj[0][$i]['linkmarkers']);
					
					$updateStmtMonsterSpecific ="INSERT INTO CARD_MONSTER(CARD_MONSTER_ID, ATTRIBUTE, LEVEL, MONSTER_TYPE, MONSTER_CATEGORY, ATTACK, DEFENSE, SCALE, LINK_VALUE, LINK_MARKERS) VALUES ($cardId, '$monsterAttribute', $monsterLevel, '$monsterType', '$cardType', $monsterAttack, $monsterDefense, $monsterScale, $monsterLinkValue, '$monsterLinkMarkers')";
					
					$executeStatment = $card->execute($updateStmtMonsterSpecific);
				}else{
					$spellTrapType = $card->escape_string($obj[0][$i]['race']." ".$cardType);
					$updateStmtSpellTrapSpecific = "INSERT INTO CARD_SPELL_TRAP(CARD_SPELL_TRAP_ID, SPELL_TRAP_TYPE) VALUES ($cardId, '$spellTrapType')";
					$executeStatment = $card->execute($updateStmtSpellTrapSpecific);
				}
			$picURL = "https://ygoprodeck.com/pics/".$cardId.".jpg";
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $picURL);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			$fileName = "images/$id.jpg";
			$file = fopen($fileName, 'c') or die("Error: Write Error");
			fwrite($file, $response);
			fclose($file);
			
			usleep(75000);
			}
		}
		echo "Complete Update";
	//}
?>