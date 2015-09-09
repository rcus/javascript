<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Redovisningar";

$herbert['main'] = <<<EOD
<h1>Redovisningar av kursmomenten</h1>
<div class="boxed">
  <p><em>Här kommer redovisningarna från de olika kursmomenten att presenteras.</em></p>
  <h2 id="kmom01">Kmom01: Kom igång med JavaScript</h2>
  <p>...</p>
</div>
<div class="sidebar">
  <h3>Välj kursmoment:</h3>
  <ul>
    <li><a href="#kmom01">Kmom01</a></li>
  </ul>
</div>
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
