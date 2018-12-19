<!DOCTYPE html>
<?php
	session_start();
	/*$_SESSION['sess_user_id'] = "";
	$_SESSION['sess_username'] = "";
	$_SESSION['sess_userrole'] = "";*/
	
	$userId = $_SESSION['sess_user_id'];
	$userName = $_SESSION['sess_username'];
	$userType = $_SESSION['sess_userrole'];
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>YGO Stats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="margin: 15px 15px 0px 15px;margin-top: 5px;margin-left: 15px;min-height: 570px;height: 70.6vh;margin-bottom: 0;">
    <nav class="navbar navbar-light navbar-expand-md" style="height: 9.4vh;max-height: 156px;">
        <div class="container-fluid">
			<a class="navbar-brand float-left" href="index.php" style="width: 50%;height: 9.4vh;">
				<img class="img-fluid" src="assets/img/Final%20Project%20Logo.png" style="max-width: 201px;width: 100%;height: 8.4vh;">
			</a>
            <div class="collapse navbar-collapse float-right" id="navcol-1" style="width: 50%;">
				<?php
				if($userType == "Admin"){
					echo "<button class='btn btn-primary text-center d-block float-right ml-auto' type='button' onClick='return newTable()' style='height: 45px;width: 15.2%;padding-right: 12px;margin-right: 12px;margin-bottom: 25px;'>New</button>
					<button class='btn btn-primary text-center d-block float-right openButton' type='button' data-target='#openModal' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Open</button>	
					<button class='btn btn-primary text-center d-block float-right saveButton' type='button' data-target='#saveModal' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Save</button>
                	<button class='btn btn-primary text-center d-block float-right deleteButton' type='button' data-target='#deleteModal' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Delete</button>
					<button class='btn btn-primary active text-center d-block float-right' data-target='#AdminModal' data-toggle='modal' type='button' style='width: 15.2%;height: 45px;margin-bottom: 25px;'>$userName</button>";
				}elseif($userType == "Basic"){
					echo "<button class='btn btn-primary text-center d-block float-right ml-auto' type='button' onClick='return newTable()' style='height: 45px;width: 15.2%;padding-right: 12px;margin-right: 12px;margin-bottom: 25px;'>New</button>
					<button class='btn btn-primary text-center d-block float-right openButton' type='button' data-target='#openModal' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Open</button>	
					<button class='btn btn-primary text-center d-block float-right saveButton' type='button' data-target='#saveModal' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Save</button>
                	<button class='btn btn-primary text-center d-block float-right deleteButton' type='button' data-target='#deleteModal' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Delete</button>
					<button class='btn btn-primary active text-center d-block float-right' data-target='#logOutModal' data-toggle='modal' type='button' style='width: 15.2%;height: 45px;margin-bottom: 25px;'>$userName</button>";
				}else{
					echo "<button class='btn btn-primary text-center d-block float-right ml-auto' type='button' onClick='return newTable()' style='height: 45px;width: 15.2%;padding-right: 12px;margin-right: 12px;margin-bottom: 25px;'>New</button>
					<button class='btn btn-primary text-center d-block float-right' type='button' disabled='disabled' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Open</button>	
					<button class='btn btn-primary text-center d-block float-right' type='button' disabled='disabled' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Save</button>
                	<button class='btn btn-primary text-center d-block float-right' type='button' disabled='disabled' style='width: 15.2%;height: 45px;margin-bottom: 25px;margin-right: 12px;'>Delete</button>
					<button class='btn btn-primary active text-center d-block float-right' data-target='#logInModal' data-toggle='modal' type='button' style='width: 15.2%;height: 45px;margin-bottom: 25px;'>Log In</button>";
				}
				?>
			</div>
        </div>
    </nav>
    <div class="table-responsive d-table" style="width: 100%;height: 70.6vh;">
        <table class="table">
            <thead style="width: 100%;height: 0;">
                <tr></tr>
            </thead>
            <tbody style="width: 100%;height: 70.6vh;">
                <tr class="d-table-row" style="width: 100%;height: 70.6vh;">
                    <td class="border rounded border-dark d-table-cell" style="width: 13%;">
                        <div class="table-responsive d-table" style="height: 70.6vh;">
                            <table class="table">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    <tr class="d-table-row" style="height: 30vh;">
                                        <td class="d-table-cell" colspan="2"><img src="images/BlankCard.jpg" id="showCard" style="height: 30vh;width: 100%;"></td>
                                    </tr>
                                    <tr class="d-table-row">
                                        <td class="text-center d-table-cell" colspan="2" id="showName">Name</td>
                                    </tr>
                                    <tr class="d-table-row">
                                        <td class="text-center d-table-cell" colspan="2" id="showType">Card Type</td>
                                    </tr>
                                    <tr class="d-table-row">
                                        <td class="text-center d-table-cell" id="showAtk">Atk</td>
                                        <td class="text-center d-table-cell" id="showDef">Def</td>
                                    </tr>
                                    <tr class="d-table-row">
                                        <td class="text-center d-table-cell" colspan="2" id="showSpecial">Link/Scale</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 37vh;">
                                        <td class="text-center d-table-cell" colspan="2" id="showEffect">Effect</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td class="d-table-cell" style="width: 1%;"></td>
                    <td class="border rounded border-dark d-table-cell" style="width: 60%;padding: 0;">
                        <div class="table-responsive d-table">
                            <table class="table">
                                <thead style="height: 0;">
                                    <tr class="d-table-row"></tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center d-table-row" style="height: 3vh;font-weight: bold;">
                                        <td class="text-center bg-primary border rounded-0 border-dark d-table-cell" colspan="15" style="padding: 2px;">Main Deck</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
                                        <td class="text-center d-table-cell" style="padding: 2px;font-weight: bold;text-align: center">Monster Count</td>
                                        <td class="text-center d-table-cell" rowspan="6" colspan="2" style="padding: 2px;"></td>
										<?php
											tableCellMaker(1,10);
										?>
                                        <td class="text-center d-table-cell" colspan="2" style="padding: 2px;font-size: 24px;font-weight: bold;">Percentage of Seeing on Turn 1</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
										<td class="text-center d-table-cell" style="padding: 2px;font-size: 42px;font-weight: bold;text-align: center">
											<p id="monsterCount">0</p>
										</td>
                                        <?php
											tableCellMaker(2,10);
										?>
										<td class="text-center d-table-cell" colspan="2" style="padding: 2px;font-size: 42px;font-weight: bold;">
											<p id="percentage"></p>
										</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
                                        <td class="text-center d-table-cell" style="padding: 2px;font-weight: bold;text-align: center">Spell Count</td>
                                        <?php
											tableCellMaker(3,10);
										?>
										<td class="text-center d-table-cell" colspan="2" style="padding: 2px;font-size: 24px;font-weight: bold;">Total Deck Size</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
										<td class="text-center d-table-cell" style="padding: 2px;font-weight: bold;font-size: 42px;text-align: center">
											<p id="spellCount">0</p>
										</td>
                                        <?php
											tableCellMaker(4,10);
										?>
										<td class="text-center d-table-cell" colspan="2" style="padding: 2px;font-size: 42px;font-weight: bold;">
											<p id="totalDeck">0</p>
										</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
                                        <td class="text-center d-table-cell" style="padding: 2px;font-weight: bold;text-align: center">Trap Count</td>
                                        <?php
											tableCellMaker(5,10);
										?>
										<td class="text-center d-table-cell" colspan="2" style="padding: 2px;font-size: 24px;font-weight: bold;">
											<input type="hidden" id="deckId" value="None">
										</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
										<td class="text-center d-table-cell" style="padding: 2px;font-weight: bold;font-size: 42px;text-align: center">
											<p id="trapCount">0</p>
										</td>
                                        <?php
											tableCellMaker(6,10);
										?>
										<td class="text-center d-table-cell" colspan="2" style="padding: 2px;font-size: 24px;font-weight: bold;"></td>
                                    </tr>
                                    <tr class="text-center d-table-row" style="height: 3vh;font-weight: bold;">
                                        <td class="text-center bg-secondary border rounded-0 border-dark d-table-cell" colspan="15" style="padding: 2px;">Extra Deck</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
                                        <?php
											tableCellMaker(7,15);
										?>
                                    </tr>
                                    <!--<tr class="text-center d-table-row" style="height: 3vh;font-weight: bold;">
                                        <td class="text-center bg-warning border rounded-0 border-dark d-table-cell" colspan="15" style="padding: 2px;">Side Deck</td>
                                    </tr>
                                    <tr class="d-table-row" style="height: 9.8vh;">
                                        <?php
											//tableCellMaker(8,15);
										?>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td class="d-table-cell" style="width: 1%;"></td>
                    <td class="border rounded border-dark d-table-cell" style="width: 13%;">
							<table border="0" style="height: 30.5vh;">
								<tr>
									<td colspan="2" >
										<input type="text" name="name" id='searchName' placeholder="Card Name">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<select name="generalType" id="gType">
											<option value="">Type</option>
											<option value="Monster">Monster</option>
											<option value="Spell">Spell</option>
											<option value="Trap">Trap</option>
										</select>
										<select name="specificType" id="sType" disabled>
											<option value=""></option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2" ><input type="text" id='searchEffect' name="effect" placeholder="Enter Card Effect"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" name="search" class="btn btn-primary searchButton" value="Search"></td>
								</tr>
							</table>
                        <div class="table-responsive d-table" style="height: 65.2vh;">
                            <table class="table">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
									<?php
										for($w = 0; $w < 4; $w++){
											$rowCount = $w + 1;
											echo "<tr class='d-table-row'>
                                        			<td class='border rounded-0 border-dark d-table-cell' style='width: 3.25%;height: 9.4vh;' id='search.row$rowCount.column1'><input type='image' src='images/BlankCardTable.png' name = 'button.img.row$rowCount.column1' id='search.img.row$rowCount.column1' value = '' class='' onClick='return addCard($rowCount, 1)' style='width: 100%;height: 9.8vh;'></td>
                                        			<td class='border rounded-0 border-dark d-table-cell' style='width: 3.25%;height: 9.4vh;' id='search.row$rowCount.column2'><input type='image' src='images/BlankCardTable.png' name = 'button.img.row$rowCount.column2' id='search.img.row$rowCount.column2' value = '' class='' onClick='return addCard($rowCount, 2)' style='width: 100%;height: 9.8vh;'></td>
                                        			<td class='border rounded-0 border-dark d-table-cell' style='width: 3.25%;height: 9.4vh;' id='search.row$rowCount.column3'><input type='image' src='images/BlankCardTable.png' name = 'button.img.row$rowCount.column3' id='search.img.row$rowCount.column3' value = '' class='' onClick='return addCard($rowCount, 3)' style='width: 100%;height: 9.8vh;'></td>
                                        			<td class='border rounded-0 border-dark d-table-cell' style='width: 3.25%;height: 9.4vh;' id='search.row$rowCount.column4'><input type='image' src='images/BlankCardTable.png' name = 'button.img.row$rowCount.column4' id='search.img.row$rowCount.column4' value = '' class='' onClick='return addCard($rowCount, 4)' style='width: 100%;height: 9.8vh;'></td>
												</tr>";
										}
									?>
                                </tbody>
                            </table>
							<input type="hidden" value="0" id ="pageCount">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
	
	<div id = "logInModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Log In</h4>
				</div>
				<div class="modal-body" style="align-items: center;">
					<?php
					$errors = array( 1 => "Invalid user name or password, Try again",
						2 => "Please login to access this area" );
					if(isset($_GET['err'])){
						$error_id = $_GET['err'];	
					}else{
						$error_id = 0;
					}
					if ( $error_id == 1 ) {
						echo '<p class="text-danger">' . $errors[ $error_id ] . '</p>';
					} elseif ( $error_id == 2 ) {
						echo '<p class="text-danger">' . $errors[ $error_id ] . '</p>';
					}
					?>
					<form action="authenticate.php" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">
						<table class="table-responsive" style="align-items: center;">
							<tr>
								<td colspan="2">
									<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="password" name="password" class="form-control" placeholder="Password" required>	
								</td>
							</tr>
							<tr>
								<td>
									<button class="btn btn-primary btn-block" type="submit">Log In</button>
								</td>
								<td>
									<button class="btn btn-primary btn-block" type="submit" formaction="signup.php">Sign up</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div id = "logOutModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">User Panel</h4>
				</div>
				<div class="modal-body" style="align-items: center;">
					<form action="signout.php" method="POST" class="form-signin col-md-8 col-md-offset-2" role="form">
						<button class="btn btn-primary btn-block" type="submit">Sign Out</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php
	if($userType == "Basic" || $userType == "Admin"){
		echo "<div id = 'openModal' class='modal fade' role='dialog'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Open</h4>
					</div>
					<div class='modal-body openModalBody' style='align-items: center;'>
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
					</div>
				</div>
			</div>
		</div>";

		echo "<div id = 'saveModal' class='modal fade' role='dialog'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Save</h4>
					</div>
					<div class='modal-body saveModalBody' style='align-items: center;'>
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
					</div>
				</div>
			</div>
		</div>";
		
		echo "<div id = 'deleteModal' class='modal fade' role='dialog'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Delete</h4>
					</div>
					<div class='modal-body deleteModalBody' style='align-items: center;'>
						<form action = 'delete.php' method='POST' class='form-signin col-md-8 col-md-offset-2' role='form'>
							<label>Are you sure you want to delete this deck?</label>
							<button class='btn btn-danger btn-block' type='submit'>Delete</button>
							<input type='hidden' id='deckDeleteId' value=''>
						</form>
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
					</div>
				</div>
			</div>
		</div>";
	}
	if($userType == "Admin"){
		echo "<div id = 'AdminModal' class='modal fade' role='dialog'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h4 class='modal-title'>Admin Panel</h4>
				</div>
				<div class='modal-body' style='align-items: center;'>
					<form action='signout.php' method='POST' class='form-signin col-md-8 col-md-offset-2' role='form'>
						<button class='btn btn-primary btn-block' formaction='update.php' type='submit'>Update Database</button>
						<button class='btn btn-primary btn-block' type='submit'>Sign Out</button>
					</form>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
		</div>
	</div>";
	}
	?>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	<script>
		var mainCurrentCellIds = [];
		var mainCurrentCellType = [];
		var mainCurrentCellQty = [];
		var extraCurrentCellIds = [];
		var extraCurrentCellType = [];
		var extraCurrentCellQty = [];
		var currentCellCol = 1;
		var currentCellRow = 1;
		var currentExtraCellCol = 1;
		var totalMonster = 0;
		var totalSpell = 0;
		var totalTrap = 0;
		var totalDeck = 0;
		var totalExtra = 0;
		
		function updateTotals(){
			if(totalMonster < 0){
				totalMonster = 0;
			}
			if(totalSpell < 0){
				totalSpell = 0;
			}
			if(totalTrap < 0){
				totalTrap = 0;
			}
			if(totalDeck < 0){
				totalDeck = 0;
			}
			document.getElementById("monsterCount").innerHTML = totalMonster;
			document.getElementById("spellCount").innerHTML = totalSpell;
			document.getElementById("trapCount").innerHTML = totalTrap;
			document.getElementById("totalDeck").innerHTML = totalDeck;
		}
		
		function clearTable(){
			for(var a = 1; a <= 10; a++){
				for(var b = 1; b <= 6; b++){
					$("#img.row" + b + ".column" + a).removeClass();
					document.getElementById("img.row" + b + ".column" + a).value = '';
					document.getElementById("img.row" + b + ".column" + a).src = 'images/BlankCardTable.png';
				}	
			}
			for(var c = 1; c <= 15; c++){
					$("#img.row7.column" + c).removeClass();
					document.getElementById("img.row7.column" + c).value = '';
					document.getElementById("img.row7.column" + c).src = 'images/BlankCardTable.png';
				}
		}
		
		function updateTable(){
			clearTable();
			var tempCellCol = 1;
			var tempCellRow = 1;
			var tempExtraCellCol = 1;
			var uniqueIds = mainCurrentCellIds.length;
			var extraUniqueIds = extraCurrentCellIds.length;
			for(var i = 0; i < uniqueIds; i++){
				var qty = mainCurrentCellQty[i];
				for(var j = 0; j < qty; j++){
					document.getElementById("img.row" + tempCellRow + ".column" + tempCellCol).value = mainCurrentCellIds[i];
					document.getElementById("img.row" + tempCellRow + ".column" + tempCellCol).classList.add(mainCurrentCellType[i]);
					document.getElementById("img.row" + tempCellRow + ".column" + tempCellCol).src = "images/" + mainCurrentCellIds[i] + ".jpg";
					if(tempCellCol == 10){
						tempCellCol = 1;
						if (tempCellRow < 6){
						tempCellRow++;
						}
					}else{
						tempCellCol++;
					}
				}
			}
			for(var k = 0; k < extraUniqueIds; k++){
				var extraQty = extraCurrentCellQty[k];
				for(var l = 0; l < extraQty; l++){
					document.getElementById("img.row7.column" + tempExtraCellCol).value = extraCurrentCellIds[k];
					document.getElementById("img.row7.column" + tempExtraCellCol).src = "images/" + extraCurrentCellIds[k] + ".jpg";
					
					if(tempExtraCellCol < 15){
						tempExtraCellCol++;
					}
				}
			}
			currentCellCol = tempCellCol;
			currentCellRow = tempCellRow;
			currentExtraCellCol = tempExtraCellCol;
		}
		
		function newTable(){
			mainCurrentCellIds = [];
			mainCurrentCellType = [];
			mainCurrentCellQty = [];
			extraCurrentCellIds = [];
			extraCurrentCellType = [];
			extraCurrentCellQty = [];
			currentCellCol = 1;
			currentCellRow = 1;
			currentExtraCellCol = 1;
			totalMonster = 0;
			totalSpell = 0;
			totalTrap = 0;
			totalDeck = 0;
			totalExtra = 0;
			clearTable();
			updateTotals();
			}
		
		function addCard(row, column){
			var currentCell = document.getElementById("search.img.row" + row +".column" + column);
			var currentId = currentCell.value;
			var currentImg = currentCell.src;
			var currentType = currentCell.classList.item(1);
			
			if(currentType.indexOf("Extra") === -1){
				if(totalDeck < 60){
					if(mainCurrentCellIds.indexOf(currentId) == -1){
						mainCurrentCellIds.push(currentId);
						mainCurrentCellQty.push(1);
						
						var mainCell = document.getElementById("img.row" + currentCellRow + ".column" + currentCellCol);
						mainCell.value = currentId;
						mainCell.src = currentImg;

						if(currentType.indexOf("Monster") !== -1){
							mainCurrentCellType.push("Monster");
							totalMonster++;
						}else if (currentType.indexOf("Spell") !== -1){
							mainCurrentCellType.push("Spell");
							totalSpell++;
						}else{
							mainCurrentCellType.push("Trap");
							totalTrap++;
						}

						if(currentCellCol == 10){
							currentCellCol = 1;
							if (currentCellRow < 6){
							currentCellRow++;
							}
						}else{
							currentCellCol++;
						}

						totalDeck++;
						updateTotals();
						updateTable();
					}else if(mainCurrentCellQty[mainCurrentCellIds.indexOf(currentId)] < 3){
						mainCurrentCellQty[mainCurrentCellIds.indexOf(currentId)] += 1;
						
						var mainCell = document.getElementById("img.row" + currentCellRow + ".column" + currentCellCol);
						mainCell.value = currentId;
						mainCell.src = currentImg;

						if(currentType.indexOf("Monster") !== -1){
							mainCell.classList.add("Monster");
							totalMonster++;
						}else if (currentType.indexOf("Spell") !== -1){
							mainCell.classList.add("Spell");
							totalSpell++;
						}else{
							mainCell.classList.add("Trap");
							totalTrap++;
						}

						if(currentCellCol == 10){
							currentCellCol = 1;
							if (currentCellRow < 6){
							currentCellRow++;
							}
						}else{
							currentCellCol++;
						}

						totalDeck++;
						updateTotals();
						updateTable();
					}
				}
			}else{
				if(totalExtra < 15){
					if(extraCurrentCellIds.indexOf(currentId) == -1){
						extraCurrentCellIds.push(currentId);
						extraCurrentCellQty.push(1);
						
						var extraCell = document.getElementById("img.row7.column" + currentExtraCellCol);
						extraCell.value = currentId;
						extraCell.src = currentImg;

						if(currentExtraCellCol < 15){
							currentExtraCellCol++;
						}

						totalExtra++;
						updateTable();
					}else if(extraCurrentCellQty[extraCurrentCellIds.indexOf(currentId)] < 3){
						extraCurrentCellQty[extraCurrentCellIds.indexOf(currentId)] += 1;
					
						var extraCell = document.getElementById("img.row7.column" + currentExtraCellCol);
						extraCell.value = currentId;
						extraCell.src = currentImg;

						if(currentExtraCellCol < 15){
							currentExtraCellCol++;
						}
						
						totalExtra++;
						updateTable();
					}
				}
			}
		}
		
		function removeCard(row, column){
			var deleteCell = document.getElementById("img.row" + row +".column" + column);
			var deleteType = deleteCell.classList.item(0);
			if (row == 7){
				var arrayIndex = extraCurrentCellIds.indexOf(deleteCell.value);
				if(extraCurrentCellQty[arrayIndex] == 1){
					extraCurrentCellIds.splice(arrayIndex,1);
					extraCurrentCellQty.splice(arrayIndex,1);
				}else{
					extraCurrentCellQty[arrayIndex] -= 1;
				}
				
				totalExtra -= 1;
			}else{
				var arrayIndex = mainCurrentCellIds.indexOf(deleteCell.value);
				if(mainCurrentCellQty[arrayIndex] == 1){
					mainCurrentCellIds.splice(arrayIndex,1);
					mainCurrentCellQty.splice(arrayIndex,1);
				}else{
					mainCurrentCellQty[arrayIndex] -= 1;
				}
				
				if(deleteType == "Monster"){
					totalMonster -= 1;
				}else if(deleteType == "Spell"){
					totalSpell -= 1;
				}else{
					totalTrap -= 1;
				}
				
				totalDeck -= 1;
				updateTotals();
			}
			updateTable();
		}
		
		$(function(){
			var optionsList = {
					Type: {
						text: [''],
						value: ['']
					},
					Monster: {
						text: ['', 'Normal', 'Effect', 'Flip', 'Gemini', 'Tuner', 'Ritual', 'Union', 'Spirit', 'Pendulum', 'Toon', 'Fusion', 'Synchro', 'XYZ', 'Link'],
						value: ['', 'Normal', 'Effect', 'Flip', 'Gemini', 'Tuner', 'Ritual', 'Union', 'Spirit', 'Pendulum', 'Toon', 'Fusion', 'Synchro', 'XYZ', 'Link']
					},
					Spell: {
						text: ['', 'Normal', 'Field', 'Equip', 'Continuous', 'Quick-Play', 'Ritual'],
						value: ['', 'Normal', 'Field', 'Equip', 'Continuous', 'Quick-Play', 'Ritual']
					},
					Trap: {
						text: ['', 'Normal', 'Coninuous', 'Counter'],
						value: ['', 'Normal', 'Coninuous', 'Counter']
					}
				};
			
			$('select[name="generalType"]').change(function(){
				document.getElementById("sType").disabled = false;
				var options = '';
				$.each(optionsList[$(this).val()]['text'] || [], function(i, v) {
					options += '<option value=' + v + '>' + v + '</option>';
				});
				$('select[name="specificType"]').html(options);
			});
		});
		
		$(document).ready(function(){
			$('.searchButton').click(function(){
				for(var row = 0; row < 4; row++){
					for(var cell = 0; cell < 4; cell++){
						var actualRow = row + 1;
						var actualCell = cell + 1;
						var currentCell = "search.img.row" + actualRow + ".column" + actualCell;
									
						document.getElementById(currentCell).value = "";
						document.getElementById(currentCell).src = "images/BlankCardTable.png";
						document.getElementById(currentCell).className = "addCard";
					}
				}
				
				var name = document.getElementById("searchName").value;
				var type = document.getElementById("sType").value + " " + document.getElementById("gType").value;
				var effect = document.getElementById("searchEffect").value;
				var response = new Array();
				
				$.ajax({
					url: 'search.php',
					type: 'post',
					data: {name:name, type:type, effect:effect},
					success: function(msg){
						if(msg == "")
						{
							alert("No Results Found");	
						}else{
							response = JSON.parse(msg);
							var totalResults = response.length;
							if(totalResults % 16 > 0)
							{
								var numOfPages = parseInt(response.length / 16);
								numOfPages += 1;
							}else{
								var numOfPages = response.length / 16;
							}
							
							//To Be Used for Paging Later
							var pageCount = 0;
							
							var currentResult = 0;
							var monsterCheck = "Monster";
							var spellCheck = "Spell";
							var trapCheck = "Trap";
							var listOfExtraDeckTypes = ["Fusion", "Synchro", "XYZ", "Link"];
							var checkExtra = 0;
							
							for(var row = 0; row < 4; row++){
								for(var cell = 0; cell < 4; cell++){
									var actualRow = row + 1;
									var actualCell = cell + 1;
									var currentCell = "search.img.row" + actualRow + ".column" + actualCell;
									var currentId = response[currentResult].CARD_ID;
									var currentImage = response[currentResult].CARD_IMAGE_LOCATION;
									var deckSlot = response[currentResult].CARD_TYPE;
									var actualSlot = "";
									
									if(deckSlot.indexOf(monsterCheck) !== -1){
										for(var i = 0; i < listOfExtraDeckTypes.length; i++){
											if(deckSlot.indexOf(listOfExtraDeckTypes[i]) !== -1){
												actualSlot = "ExtraDeck";
												checkExtra++;
											}
										}
										if(checkExtra == 0){
											actualSlot = "MainDeckMonster";
										}
									}else if (deckSlot.indexOf(spellCheck) !== -1){
										actualSlot = "MainDeckSpell";
									}else{
										actualSlot = "MainDeckTrap";
									}

									document.getElementById(currentCell).value = currentId;
									document.getElementById(currentCell).src = currentImage;
									document.getElementById(currentCell).classList.add(actualSlot);
									currentResult++;
								}
							}
						}
					}
				});
			});
		});
		
		$(document).ready(function(){
			$('.saveButton').click(function(){
				var deckId = document.getElementById('deckId').value;
				var mainDeckSize = totalDeck;
				var extraDeckSize = totalExtra;
				var deckList = mainCurrentCellIds;
				var deckTypeList = mainCurrentCellType;
				var deckQtyList = mainCurrentCellQty;
				$.ajax({
				url: 'save.php',
				type: 'post',
				data: {deckId: deckId, mainDeckSize: mainDeckSize, extraDeckSize: extraDeckSize, deckList: deckList, deckTypeList: deckTypeList, deckQtyList, deckQtyList},
				success: function(response){
					$('.saveModalBody').html(response);
					$('#saveModal').modal('show');
					}
				});
			});
		});
		
		$(document).ready(function(){
			$('.openButton').click(function(){
				$.ajax({
				url: 'open.php',
				type: 'post',
				success: function(response){
					$('.openModalBody').html(response);
					$('#openModal').modal('show');
					}
				});
			});
		});
		
		function openAction(){
			var deckChoice = document.getElementById("deckName").value;
			var tempArray = new Array();
			var tempId = new Array();
			var tempType = new Array();
			var tempQty = new Array();
			$.ajax({
			url: 'openAction.php',
			type: 'post',
			data: {deckChoice: deckChoice},
			success: function(response){
				tempArray = JSON.parse(response);
				newTable();
				for(var i = 0; i < tempArray.length; i++){
					mainCurrentCellIds.push(tempArray[i].CARD_ID);
					mainCurrentCellType.push(tempArray[i].TYPE);
					mainCurrentCellQty.push(tempArray[i].QUANTITY);
				}
				updateTable();
				document.getElementById("deckId").value = deckChoice;
			}
			});
		}
		
		$(document).ready(function(){
			$('.deleteButton').click(function(){
				if(document.getElementById("deckId").value != "None"){
					document.getElementById("deckDeleteId").value = document.getElementById("deckId").value;
					$('#deleteModal').modal('show');
				}
			});
		});
	</script>
	<?php
	function tableCellMaker($rowNumber, $columnsNeeded){
		for($i = 0; $i < $columnsNeeded; $i++){
				$columnCount = $i + 1;
				echo "<td class='text-center border rounded-0 border-dark d-table-cell' style='padding: 2px;width: 1.974%;' id='row$rowNumber.column$columnCount'><input type='image' src='images/BlankCardTable.png' name = 'button.main.img.row$rowNumber.column$columnCount' id='img.row$rowNumber.column$columnCount' value = '' class='' onClick='return removeCard($rowNumber, $columnCount)' style='width: 80%;height: 9.8vh;'></td>";
			}
		}
	?>
</html>