

<?php
    error_reporting(E_ALL);
    
    $image = $_FILES['billedfil'];
	$powerup = $_POST['powerup'];
	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$instrukser = $_POST['instrukser'];

//Opretter DB-forbindelse
	$dblink = mysqli_connect("localhost","mod7af1489","2faumoj9","mod7af1489") or die ("Fejl: Kan ikke etablere forbindelse til databasen");
	mysqli_set_charset($dblink, "utf8");

//Herefter håndteres uploadet til konkurrencen
//vi har ikke uploadet fil endnu - så resultatet er false	
	$uploaded = false;

//checker den modtagne fils type - hvis jpeg elle png- fortsæt
	if($image['type']=='image/jpeg' or $image['type']=='image/png'){
		//variable til midlertidigt navn, fået ved upload
		$tmp_navn = $image['tmp_name'];

		//variable til filnavnet - det eksisterende navn på filen
		$filnavn = $image['name'];
		//echo "$filnavn " + $filnavn;
		//Tilføj sti og tidspunkt på filnavnet
		$imageurl = 'uploads/' . time() . $filnavn;

		//Og ryk filen frem til tmp_mappen til uploads mappen
		$klar_til_indsaet = move_uploaded_file($tmp_navn, $imageurl);

		if($klar_til_indsaet){
			//Først SQL-forespørslen- hent alt fra din tabel 
			$insertexercisequery = "INSERT INTO goodvertizingkonkurrencedeltagere VALUES ('', '$imageurl', '$powerup', '$navn', '$email', '$instrukser')";
//Udfør dernæst overstående SQL-sætning
			$result = mysqli_query($dblink, $insertexercisequery) or die ("Førespørgslen kunne ikke udføres: " . mysqli_error($dblink));
			if($result) { 

				$uploaded = true;
				//echo "<meta HTTP-EQUIV="REFRESH" content='0; url=http://mod7af1489.keaweb.dk/goodvertizingpowerup/saveexercise.php'>";
				echo "<a href='saveexercise.php'>God dag</a>" ;

				 }
		}
	}		
			
?>
