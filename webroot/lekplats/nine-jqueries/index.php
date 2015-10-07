<?php $title='Nio små jQuery-rätter'; include(__DIR__ . '/../mall/header.php'); ?>

<div id='flash'>
  <p id='text' class='red'>Denna text ska ersättas när sidan och DOM är laddade.</p>
</div>

<div id='box1' class='box'>
  <img src='https://unsplash.it/200/300/?random' alt='' />
  <h1>Första boxen</h1>
  <p>Nu kommer den första boxen. Klicka på ett element, så ska du se att bakgrundsfärgen ändras. Cool!</p>
</div>

<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>