<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php');

$herbert['javascript_include'][] = 'js/checkout.js';
$herbert['stylesheets'][] = 'css/shop.css';


// Create form
$addressform = <<<EOD
<fieldset>
  <legend>Adressuppgifter</legend>
  <p>
    <label for="name">Namn:</label>
    <input type="text" name="name" required>
  </p>

  <p>
    <label for="address">Adress:</label>
    <input type="text" name="address" required>
  </p>

  <p>
    <label for="zip">Postnummer:</label>
    <input type="text" name="zip" required>
  </p>

  <p>
    <label for="city">Ort:</label>
    <input type="text" name="city" required>
  </p>

  <p>
    <label for="country">Land:</label>
    <select name="country">
      <option value="Sverige" selected>Sverige</option>
      <option value="Norge">Norge</option>
    </select>
  </p>
</fieldset>
EOD;


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "jQuery Book Shop - Kassa";

$herbert['boxed'] = <<<EOD
<div id="checkout">
  $addressform
</div>
EOD;

$herbert['sidebar'] = <<<EOD
<div id="shoppingcart">
  <div><img src="http://dbwebb.se/img/cart.png" alt=""> Din kundvagn</div>
  <div id="content"></div>
</div>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
