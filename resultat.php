<?php
    error_reporting(E_ALL);

	$powerup = $_POST['powerup'];
	$navn = $_POST['navn'];
	$email = $_POST['email'];
	$instrukser = $_POST['instrukser'];
	$image = $_POST['image']
	$_FILES["file"]["name"]
	$_FILES["file"]["type"] 
	$_FILES["file"]["size"]
	$_FILES["file"]["tmp_name"]
	$_FILES["file"]["error"]

?>

<?php
	if ($_FILES["file"]["error"] > 0)
	  {
	  echo "Error: " . $_FILES["file"]["error"] . "<br>";
	  }
	else
	  {
	  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	  echo "Type: " . $_FILES["file"]["type"] . "<br>";
	  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	  echo "Stored in: " . $_FILES["file"]["tmp_name"];
	  }
?>

<?php
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file"]["error"] > 0)
	    {
	    echo "Error: " . $_FILES["file"]["error"] . "<br>";
	    }
	  else
	    {
	    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    echo "Stored in: " . $_FILES["file"]["tmp_name"];
	    }
	  }
	else
	  {
	  echo "Invalid file";
	  }
?>

<?php
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 20000)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file"]["error"] > 0)
	    {
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	    }
	  else
	    {
	    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

	    if (file_exists("upload/" . $_FILES["file"]["name"]))
	      {
	      echo $_FILES["file"]["name"] . " already exists. ";
	      }
	    else
	      {
	      move_uploaded_file($_FILES["file"]["tmp_name"],
	      "upload/" . $_FILES["file"]["name"]);
	      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	      }
	    }
	  }
	else
	  {
	  echo "Invalid file";
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

	<section id="banner">
       <img src="photo/banner_konkurrence2.png" alt="Konkurrence">
    </section>

	<h1>Hej <?php echo $navn; ?> </h1>
	<p>Tak for deltagelse i konkurrencen.<br>
	   Vinderen får besked fra os senest den 28. februar.</p>

	<section class="competition">
  
    <form class="contact" method="post" action="index.php">

      <div id="competimage">
      	<form action="resultat.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file"><br>
			<input type="submit" name="submit" value="Submit">
		</form>
      </div>

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