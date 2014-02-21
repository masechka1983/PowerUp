<?php 
  $aar = date('Y');
  $maaned = date('m');
  $dag = date('d');

  $slutaar = '2014';
  $slutmaaned = '02';
  $slutdag = '28';

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

  <script>     
    window.fbAsyncInit = function() {     
      FB.init({         
        appId      : '805803386103615', // App ID         
        status     : true, // check login status         
        cookie     : true, // enable cookies 
        xfbml      : true  // parse XFBML     
      });   
    };  // end fbAsyncInit  
  // Load the SDK Asynchronously 
  (function(d){   
    var js, id = 'facebook-jssdk'; if (d.getElementById(id)) 
  {return;}   
    js = d.createElement('script'); js.id = id; js.async = true;   
    js.src = "//connect.facebook.net/en_US/all.js";   d.getElementsByTagName('head')[0].appendChild(js); 
  }(document));
  </script>

  <section id="banner">
    <img src="photo/banner_konkurrence2.png" alt="Konkurrence">
  </section>

  <?php 
   if($konkurrencestatus){
    ?>
    <section class="competition">
      <h1 class="title">Opskriv dit øvelse<br>
                        og hjælp andre med at finde den nemme og hurtige måde<br>
                        at genoptage energi og føle frisk og fuld af power</h1>

      <form class="contact" method="post" action="confirm.php" enctype="multipart/form-data">

        <div id="competimage">
          <input type="file" name="billedfil" id="billedfil">
        </div>

        <div id="compeform">
          <button class="fbbutton" type="button" onclick="hentnavn()" >
            Hent deltageroplysninger fra facebook</button><br>

          <label for="powerup">PowerUp:<br></label>
          <input class="contact-field" type="text" id="powerup" name="powerup" /><br>

          <label for="name">Navn:<br></label>
          <input class="contact-field" type="text" id="name" name="navn" /><br>

          <label for="email">Email:<br></label>
          <input class="contact-field" type="text" id="email" name="email" /><br>

          <label for="message">Instrukser:<br></label>
          <textarea class="contact-field" id="instrukser" name="instrukser" rows="20"></textarea><br>

          <input class="myButton" type="submit" name="submit" value="Send" />
          <span class="clearfix"></span>
        </div>
      </form>
    </section>

    <a href="confirm.php">Direkte til PowerUps</a>
  
    <?php
    }      
     else{
      echo "<h1>Konkurrencen er slut!</h1>";

      echo "<h2>De heldige vindere er:</h2>";

      //Opretter DB-forbindelse
        $dblink = mysqli_connect("localhost","mod7af1489","2faumoj9","mod7af1489") or die ("Fejl: Kan ikke etablere forbindelse til databasen");
        //$dblink = mysqli_connect("myhost", "myuser", "mypassw", "mydb") or die ("Error" . mysqli_error($link));
        mysqli_set_charset($dblink, "utf8");

      //Først SQL-forespørgslen- hent alt fra din tabel
      $query = "SELECT * FROM goodvertizingkonkurrencedeltagere WHERE id in (1, 2, 3, 4, 5)"; 
      //Har ændret i $query de sidste 4 ord!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!  

      $result = mysqli_query($dblink, $query) or die ("Førespørgslen kunne ikke udføres: " . mysqli_error($dblink));
      //Ny veriabel, $result = er der et resultatsæt i forbindelse til forespørgslen? $result er en "pointer" til "ja, der er et resultatsæt her"

      echo "<section>";
      while($row = mysqli_fetch_assoc($result)){
        echo "<article>";
        echo "<hr>";
        echo "<p>{$row['brugersnavn']}</p>"; 
        echo "</article>";
      }
      echo "</section>";

      echo "<p>Vi kontakter Jer via email";
     }
  
    ?>

  <script>
    function hentnavn(){      
      FB.getLoginStatus(function(response) {    
        if (response.status === 'connected') {      
          FB.api('/me', function(response) {      
            document.getElementById('name').value = response.name;    
            document.getElementById('email').value = response.email;  
          });     
        } else if (response.status === 'not_authorized') {      
          FB.login(function(response) {         
            if (response.authResponse) {          
              FB.api('/me', function(response) {          
                document.getElementById('name').value = response.name;  
                document.getElementById('email').value = response.email;  
              });             
            } else {          
              console.log('User cancelled login or did not authorize.');  
            }       
          }, {scope: 'email'});     
        }   
      })  // end getLoginStatus 
    } // end hentnavn      
</script>


  
  
</body>
</html>