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
    <input type="text" name="name">
  </p>

  <p>
    <label for="address">Adress:</label>
    <input type="text" name="address">
  </p>

  <p>
    <label for="zip">Postnummer:</label>
    <input type="number" name="zip">
  </p>

  <p>
    <label for="city">Ort:</label>
    <input type="text" name="city">
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

$cc_exp_month = '';
$months = array('01' => 'Januari', '02' => 'Februari', '03' => 'Mars', '04' => 'April', '05' => 'Maj', '06' => 'Juni', '07' => 'Juli', '08' => 'Augusti', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'December');
foreach ($months as $value => $name) {
  $cc_exp_month .= '<option value="'.$value.'">'.$name.'</option>';
}

$current_year = date('Y');
$cc_exp_year = '';
while ($current_year <= date('Y', strtotime('+5 year'))) {
  $cc_exp_year .= '<option value="'.$current_year.'">'.$current_year.'</option>';
  $current_year++;
}

$creditcardform = <<<EOD
<fieldset>
  <legend>Kortuppgifter</legend>
  <p>
    <label for="cc_type">Kort:</label>
    <select name="cc_type">
      <option value="vi" selected>VISA</option>
      <option value="mc">MasterCard</option>
      <option value="ec">EuroCard</option>
      <option value="ae">American Express</option>
    </select>
  </p>

  <p>
    <label for="cc_number">Kortnummer:</label>
    <input type="number" name="cc_number">
  </p>

  <p>
    <label for="cc_exp_month">Giltigt till:</label>
    <select name="cc_exp_month">
      $cc_exp_month
    </select><select name="cc_exp_year">
      $cc_exp_year
    </select>
  </p>

  <p>
    <label for="cc_cvc">Kontrollnummer:</label>
    <input type="number" name="cc_cvc">
  </p>

</fieldset>
EOD;


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "jQuery Book Shop - Kassa";

$herbert['boxed'] = <<<EOD
<div id="checkout">
  <div id="output"></div>
  <form method="post">
    $addressform
    $creditcardform
    <fieldset>
      <legend>Bekräfta beställning</legend>
      <div id="confirm"></div>
      <div class='orderwrapper'>
        <input type='button' name='order' id='orderbtn' class='button' value='Skicka beställning'>
      </div>
    </fieldset>
  </form>
</div>
EOD;

$herbert['sidebar'] = <<<EOD
<div id="shoppingcart">
  <div><img src="http://dbwebb.se/img/cart.png" alt="">Din kundvagn</div>
  <div id="content"></div>
</div>
EOD;


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
