<?php
    error_reporting(E_ALL);

	$powerup = $_POST['powerup'];
	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$instrukser = $_POST['instrukser'];
    $image = $_FILES['imgfile']['name'];
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

      <div id="competimage">
      	<!--?php
		if(isset($_REQUEST['submit']))
		{
		  $filename=  $_FILES["imgfile"]["name"];
		  if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < 200000))
		  {
		    if(file_exists($_FILES["imgfile"]["name"]))
		    {
		      echo "File name exists.";
		    }
		    else
		    {
		      move_uploaded_file($_FILES["imgfile"]["tmp_name"],"uploads/$filename");
		      echo "Upload Successful . <a href='uploads/$filename'>Click here</a> to view the uploaded image";
		    }
		  }
		  else
		  {
		    echo "invalid file.";
		  }
		}
		else
		{
		?-->
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="imgfile"><br>
			<input type="submit" name="submit" value="upload">
		</form>
		<!--?php
		}
		?--> 
      </div>

      <div id="compeform">
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
      </div>
    </form>
  </section>

  
</body>
</html>
</body>
</html>