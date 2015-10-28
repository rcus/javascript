<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php');

$herbert['javascript_include'][] = 'js/shop.js';
$herbert['stylesheets'][] = 'css/shop.css';


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "jQuery Book Shop";

$herbert['boxed'] = <<<EOD
<div id="booklist"></div>
EOD;

$herbert['sidebar'] = <<<EOD
<div id="shoppingcart">
  <div><img src="http://dbwebb.se/img/cart.png" alt=""> Din kundvagn</div>
  <div id="content"></div>
</div>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
