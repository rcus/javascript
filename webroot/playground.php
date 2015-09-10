<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Lekplats";

$herbert['main'] = <<<EOD
<h1>Lekplats för JavaScript</h1>
<div class="boxed">
  <p><em>Här kommer lite blandat material upp som man kan leka med.</em></p>

  <h2 id="transforms-and-transitions">Transforms och transitions
    <ul>
      <li><a href="lekplats/transforms-and-transitions/">Lek nu!</a></li>
      <li><a href="source.php?path=transforms-and-transitions/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/y0t4goes/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Med hjälp av CSS3 går det att forma och flytta element på olika sätt. Här visas lite olika förslag.</p>

  <h2 id="css-sprite-w-css3-transitions">Baddie som springer runt
    <ul>
      <li><a href="lekplats/css-sprite-w-css3-transitions/">Lek nu!</a></li>
      <li><a href="source.php?path=css-sprite-w-css3-transitions/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/spvnwz5s/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>En liten figur som springer omkring med hjälp av knapparna på tangentbordet. Skriptet lyssnar efter vissa knapptryckningar. Är det rätt knapp kommer css'en uppdateras och därmed figuren flytta på sig. Figuren kommer kommer från en CSS-sprite som jag har "lånat" från mos.</p>
  <img src="/img/sprite_mickey_mos.png" alt="">

  <h2 id="resize-element">Ändra elementets storlek
    <ul>
      <li><a href="lekplats/resize-element/">Lek nu!</a></li>
      <li><a href="source.php?path=resize-element/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/08d7dmLy/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Här justeras ett elements storlek till de värden som har angetts i formuläret. Elementets värden hämtas med <code>offsetWidth</code>/<code>offsetHeight</code> och skrivs in i fälten. När formuläret skickas sätts värdena till elementets <code>style</code>-attribut.</p>
  <p>Det finns en "bugg" i skriptet. Eller ja, den fungerar korrekt, men inte som en användaren kanske förväntar sig. När sidan laddas fylls värdena i (940px/194px). Trycker man på knappen, kommer rutans storlek att ändras. Alltså har den hämtat "fel" värde... Eller? Njae, <code>offsetWidth</code>/<code>offsetHeight</code> motsvarar värdet på elementet (906px/160px), plus 2 &times; padding (16px) och 2 &times; border (1px). Men när man ändrar blir de nya värdena 940px/194px för elementet, plus padding och border som är som tidigare.</p>

  <h2 id="mall">Mall
    <ul>
      <li><a href="lekplats/mall/">Lek nu!</a></li>
      <li><a href="source.php?path=mall/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/60mj43hv/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Första skriptet. Mest gjort för att skapa en struktur för fortsatt lek ;)</p>
  <p>Även skapat mappen <a href="lekplats/sample/">sample</a> för att snabbt komma igång med ny programmering.</p>

</div>
<div class="sidebar">
  <h3>Användbart:</h3>
  <ul>
    <li><a href="source.php">Visa källkod</a></li>
    <li><a href="http://jsfiddle.net/user/rcus/">JSFiddle</a></li>
  </ul>
</div>
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
