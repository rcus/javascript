<?php $title='Nio små jQuery-rätter'; include(__DIR__ . '/../mall/header.php'); ?>

<h1>
  Nio små jQuery-rätter
</h1>

<div class='giftwrapper'>

  <div class='gift boxed'>
    <!-- Common giftbox-content -->
    <div class='giftbox'>1</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box1' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=1' alt='' />
      <h1>Första boxen</h1>
      <p>
        Nu kommer den första boxen. Klicka på ett element, så ska du se att bakgrundsfärgen ändras. Cool!
      </p>
    </div>
  </div>

  <div class='gift boxed'>
    <!-- Common giftbox-content -->
    <div class='giftbox'>2</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box2' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=2' alt='' />
      <h1>Andra boxen</h1>
      <p>
        I första boxen klickade vi på ett element för att något skulle ske. Denna gång kan du klicka på hela boxen för att ändra bakgrundsfärg. Eller klicka på bilden för att ändra storleken på den.
      </p>
      <p>
        Problemet är att bilden är i boxen, vilket betyder att när du klicka på bilden så aktiveras även boxens funktion. Men det går att stoppa detta. Eller som det heter, stoppa propageringen. Cool!
      </p>
    </div>
  </div>

</div>

<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>