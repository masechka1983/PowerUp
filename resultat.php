<?php
    error_reporting(E_ALL);

	$powerup = $_POST['powerup'];
	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$instrukser = $_POST['instrukser'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Konkurrence formular</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<section id="banner">
       <img src="photo/banner_konkurrence2.png" alt="Konkurrence">
    </section>

	<h1>Hej <?php echo $navn; ?> </h1>
	<p>Tak for sending os Jeres PowerUp øvelse.<br>
	   Vil du deltage i konkurrencen, tryk på Bekræft.<br> 	
	   Vinderen får besked fra os senest den 28. februar.</p>

	<section class="competition">
  
    <form class="contact" method="post" action="confirm.php">
      <div id="compeform">
        <input type="submit" class="myButton" name="submit" value="Bekræft" />
        <span class="clearfix"></span>
      </div>
    </form>
  </section>

  

</body>
</html>