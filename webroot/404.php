<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "404";
$herbert['main'] = <<<EOD
<h1>Sidan finns inte (404)</h1>
<p>Sidan du letade efter finns inte här...</p>
EOD;

// Send the 404 header 
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
