<?php
	require_once("edit_functions.php");
	
	
	if(!isset($_GET["edit"])){
		
		header("location: tabel.php");
		
		
	}else{
		// küsime andmebaasisit andmed id-levenshtein
		$car_object = getSingleCarData($_GET["edit"]);
		var_dump($car_object);
	}
	
	
	
	
	// trükib välja id, mida muudame
	echo $_GET["edit"];

	// oleks vaja saada kätte kõige uuemad andmed selle id kohta: nr märk ja värv
	

?>
<h2>Muuda autot</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<label for="number_plate" >auto nr</label><br>
	<input id="number_plate" name="number_plate" type="text" value="<?=$car_object->number_plate?>"> <br><br>
  	<label for="color"> värv</label><br>
	<input id="color" name="color" type="text" value="<?=$car_object->color?>"> <br><br>
  	<input type="submit" name="update" value="Salvesta">
  </form>
