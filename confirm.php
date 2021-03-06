

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
				//echo "<a href='saveexercise.php'>God dag</a>" ;

				 }
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Konkurrence formular</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=805803386103615";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>

    <section class="main">
      <h1 class="subtitle">Nyeste PowerUps øvelser</h1>
      <div class="centered">
        <h2>Hej <?php echo $navn; ?> </h2>
    	    <p>
          Tak for deltagelse i konkurrencen
          og sending os Jeres PowerUp øvelse.<br>
          Vinderen får besked fra os senest den 28. februar.
        </p>
      </div>

    <?php
    //Opretter DB-forbindelse
        $dblink = mysqli_connect("localhost","mod7af1489","2faumoj9","mod7af1489") or die ("Fejl: Kan ikke etablere forbindelse til databasen");
        //$dblink = mysqli_connect("myhost", "myuser", "mypassw", "mydb") or die ("Error" . mysqli_error($link));
        mysqli_set_charset($dblink, "utf8");

      //Først SQL-forespørgslen- hent alt fra din tabel
      $query = "SELECT * FROM goodvertizingkonkurrencedeltagere ORDER BY id DESC";

      $result = mysqli_query($dblink, $query) or die ("Førespørgslen kunne ikke udføres: " . mysqli_error($dblink));
      //Ny veriabel, $result = er der et resultatsæt i forbindelse til forespørgslen? $result er en "pointer" til "ja, der er et resultatsæt her"

      echo "<section>";
      while($exercise = mysqli_fetch_assoc($result)){
        //While løkke - så længe der er en række (row)- opbyg array
        include '_exercise.php';

       };//slutter While løkke
       mysqli_close($dblink);
    ?>

    </section>

</body>
</html>
