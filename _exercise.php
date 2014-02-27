<article class="exercise">
    <!-- html paragraf i hvilket der outputtes billedet-->
  <div class="image-wrapper">
    <img src=<?php echo $exercise['imageurl']; ?> alt="foto">
  </div>

  <div class="right-side">
    <!-- html span i hvilket der outputtes værdien fra feltet "powerupnavn"-->
    <p class="powerupname"><?php echo $exercise['powerupnavn']; ?></p>

    <!-- html span i hvilket der outputtes værdien fra feltet "navn"-->
    <p class="byline">Af <?php echo $exercise['brugersnavn']; ?></p>

    <!-- html paragraf i hvilket der outputtes instrukser-->
    <p class="description"><?php echo $exercise['instrukser']; ?></p>

    <div class="fb-like" 
         data-href="http://mod7af1489.keaweb.dk/goodvertizingpowerup/index.php?id=<?php echo $exercise['id']; ?>" 
         data-layout="standard" 
         data-action="like" 
         data-show-faces="true" 
         data-share="true">
    </div>
  </div>
</article>