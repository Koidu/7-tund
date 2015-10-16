<?php

	require_once("../configglobal.php");
	$database = "if15_koidkan";


	// kõik mis on seotud muutmisega
	function getSingleCarData($edit_id){
		
		// echo "id on".$edit_id;
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"],  $GLOBALS["server_password"],  $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT number_plate, color FROM car_plates WHERE id=? AND deleted IS NULL");
		$stmt->bind_param("i", $edit_id);
		$stmt->bind_result($number_plate ,$color);
		$stmt->execute();
		
		$car= new Stdclass();
		
		if($stmt->fetch()){
			// saan siin alles kasutada neid bind_result muutujaid
			$car->number_plate = $number_plate;
			$car->color = $color;
			
		}else{
			// ei saanud rida andmeid kätte kui sellist id-d ei ole olemas
			// see rida on kustutatud
			header("location: table.php");
			
			
		}
		return $car;
		
		$stmt->close();
		$mysqli->close();
	}

?>