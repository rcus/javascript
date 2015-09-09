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
  <h2 id="mall"><a href="lekplats/mall/">Mall</a></h2>
  <p>Första skriptet. Mest gjort för att skapa en struktur för fortsatt lek ;)</p>
</div>
<div class="sidebar">
  <h3>Användbart:</h3>
  <ul>
    <li><a href="source.php">Visa källkod</a></li>
  </ul>
</div>
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
