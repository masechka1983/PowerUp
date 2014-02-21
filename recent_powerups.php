<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Recent PowerUp</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	//Opretter DB-forbindelse
	$dblink = mysqli_connect("localhost","mod7af1489","2faumoj9","mod7af1489") or die ("Fejl: Kan ikke etablere forbindelse til databasen");
	mysqli_set_charset($dblink, "utf8");

  	//Først SQL-forespørgslen- hent alt fra din tabel
  	$limit = 5;
  	$query = "SELECT * FROM goodvertizingkonkurrencedeltagere ORDER BY id DESC LIMIT $limit";  

  	$result = mysqli_query($dblink, $query) or die ("Førespørgslen kunne ikke udføres: " . mysqli_error($dblink));
  	
  	while($exercise = mysqli_fetch_assoc($result))
  		include '_exercise.php';
?>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=805803386103615";
	    fjs.parentNode.insertBefore(js, fjs);
  	}(document, 'script', 'facebook-jssdk'));
  </script>
</body>
</html>