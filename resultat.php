<?php
    error_reporting(E_ALL);

	$powerup = $_POST['powerup'];
	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$instrukser = $_POST['instrukser'];
	$image = $_POST['']

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
	<p>Tak for deltagelse i konkurrencen.<br>
	   Vinderen får besked fra os senest den 28. februar.</p>

	<section class="competition">
  
    <form class="contact" method="post" action="index.php">

      <span id="competimage">
      	<img src="">
        <input type="file">
      </span>

      <span id="compeform">
        <label for="powerup">PowerUp:<br></label>
        <input class="contact-field" type="text" id="powerup" name="powerup" /><br>

        <label for="name">Navn:<br></label>
        <input class="contact-field" type="text" id="name" name="navn" /><br>

        <label for="email">Email:<br></label>
        <input class="contact-field" type="text" id="email" name="email" /><br>

        <label for="message">Instrukser:<br></label>
        <textarea class="contact-field" id="instrukser" name="instrukser" rows="20"></textarea><br>

        <input type="submit" class="myButton" name="submit" value="Deltag" />
        <span class="clearfix"></span>
      </span>
    </form>
  </section>

  
</body>
</html>
</body>
</html>