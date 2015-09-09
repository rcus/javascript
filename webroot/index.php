<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "JavaScript";

$herbert['main'] = <<<EOD
<h1>JavaScript för hela slanten</h1>
<div class="boxed">
  <p><em>Du har landat på min sida om JavaScript för kursen <a href="//dbwebb.se/javascript">dbwebb.se/javascript</a>.</em></p>
  <h2>Om mig</h2>
  <p>Jag heter <strong>Marcus Törnroth</strong>, bor i <strong>Småland</strong> och läser på distans vid <strong>Blekinge Tekniska Högskola</strong>. Nu är jag inne på min sista kurs, JavaScript, jQuery och AJAX med HTML5, PHP. Den har sin förnämliga plattform på <a href="//dbwebb.se">dbwebb.se</a>, där jag har hunnit avverka två kurser sedan tidigare.</p>
  <p>Studerandet gör jag vid sidan om. Jag är ursprungligen lärare och har jobbat på grundskolan. Men jag valde att rikta in mig mot mitt intresse - programmering. Numera arbetar jag med webb- och apputveckling, vilket är fantastiskt kul!</p>
  <p>Studierna har varit värdefulla för arbetet och jag stora förväntingen även på denna kurs.</p>
</div>
<div class="sidebar">
  <h3>Aktuellt just nu:</h3>
  <p>Har kommit igång med lekplatsen.</p>
</div>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
