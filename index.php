<?php 
  $aar = date['Y'];
  $maaned = date['m'];
  $dag = date['d'];

  $slutaar = '2014';
  $slutmaaned = '02';
  $slutdag = '7';

  $konkurrencestatus = true;

  if($aar >= $slutaar && $maaned >= $slutmaaned && $dag >= $slutdag){
    $konkurrencestatus = false;
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

  <?php 
   if($konkurrencestatus = true){
    ?>
    <section class="competition">
      <h1 class="title">Opskriv dit øvelse</h1>

      <form class="contact" method="post" action="resultat.php">

        <div id="competimage">
          <input type="file">
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

          <input type="submit" class="myButton" name="submit" value="Send" />
          <span class="clearfix"></span>
        </div>
      </form>
    </section>
  
    <?php
    }      
     else{
      echo "<h1>Konkurrencen er slut!</h1>";
     }
  
  

  
  
</body>
</html>