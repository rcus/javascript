<?php $title='Roulette'; include(__DIR__ . '/../mall/header.php'); ?>
 
<div id='flash'>
  <h1>Roulette</h1>
  <p>
    <form>
      <label for='bankroll'>
        Innehav:
      </label>
      <input type='number' name='bankroll' id='bankroll' value='500' readonly>
      <label for='bet'>
        Insats:
      </label>
      <input type='number' name='bet' id='bet' value='10'>
      <label for='color'>
        Färg:
      </label>
      <select name='color' id='color'>
        <option value='0'>Grön</option>
        <option value='1' selected>Svart</option>
        <option value='2'>Röd</option>
      </select>
      <input type='button' id='button' value='Spela'>
    </form>
  </p>

  <div id='board' class='boardbox'></div>  
  <div id='output'></div>
</div>
 
<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>