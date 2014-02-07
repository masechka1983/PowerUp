<?php
    error_reporting(E_ALL);

	$powerup = $_POST['powerup'];
	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$instrukser = $_POST['instrukser'];

//Opretter DB-forbindelse
	$dblink = mysqli_connect("localhost","mod7af1489","2faumoj9","mod7af1489") or die ("Fejl: Kan ikke etablere forbindelse til databasen");
	mysqli_set_charset($dblink, "utf8");

//Først SQL-forespørslen- hent alt fra din tabel
	$query = "INSERT INTO goodvertizingkonkurrencedeltagere VALUES ('', '', '$powerup', '$navn', '$email', '$instrukser')"; 

//Udfør dernæst overstående SQL-sætning
	$result = mysqli_query($dblink, $query) or die ("Førespørgslen kunne ikke udføres: " . mysqli_error($dblink));

	if($result){
		echo "<script>top.location.href='https://www.facebook.com/pages/Power-Up/460877770705249'</script>";
	}else{
		echo "Uuups- det er fejl i mekanismen. Prøv igen!";
	}
	
?>

