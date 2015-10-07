<?php $title='Nio små jQuery-rätter'; include(__DIR__ . '/../mall/header.php'); ?>

<h1>
  Nio små jQuery-rätter
</h1>

<div class='giftwrapper'>

  <div class='gift boxed'>
    <div class='giftbox'>1</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box1' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=1' alt='' />
      <h1>Ändra bakgrundsfärg på ett element</h1>
      <p>
        Nu kommer den första boxen. Klicka på ett element, så ska du se att bakgrundsfärgen ändras. Cool!
      </p>
    </div>
  </div>

  <div class='gift boxed'>
    <div class='giftbox'>2</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box2' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=2' alt='' />
      <h1>Förhindra klick-effekt</h1>
      <p>
        I första boxen klickade vi på ett element för att något skulle ske. Denna gång kan du klicka på hela boxen för att ändra bakgrundsfärg. Eller klicka på bilden för att ändra storleken på den.
      </p>
      <p>
        Problemet är att bilden är i boxen, vilket betyder att när du klicka på bilden så aktiveras även boxens funktion. Men det går att stoppa detta. Eller som det heter, stoppa propageringen. Cool!
      </p>
    </div>
  </div>

  <div class='gift boxed'>
    <div class='giftbox'>3</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box3' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=3' alt='' />
      <h1>Lägg till och ta bort element</h1>
      <p>
        Vi har ändrat på element, men nu ska vi lägga till och ta bort. Lägg till en färgruta genom att ange en färgkod. Klicka på den för att ta bort den. Cool!
      </p>
      <p id='palette'>
        <label for='color'>Färgkod (hex):</label>
        <input type='text' name='color' id='color' placeholder='#ccc eller #91a040' />
        <input type='button' id='colorbutton' value='Lägg till färg' />
      </p>
    </div>
  </div>

  <div class='gift boxed'>
    <div class='giftbox'>4</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box4' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=4' alt='' />
      <h1>Ändra storlek</h1>
      <p>
        Bredd: <span id='width'></span> <input type='button' id='addwidth' value='+'> <input type='button' id='subwidth' value='-'><br />
        Höjd: <span id='height'></span> <input type='button' id='addheight' value='+'> <input type='button' id='subheight' value='-'>
      </p>
      <p>
        Nu så, nu kör vi en storleksändring på bilden. Visst är den fin? Tja, jag har ingen aning eftersom det är slumpad bild. Bildens storlek är angiven. Tryck på + och - så ändrar du på bredden eller höjden. Cool!
      </p>
    </div>
  </div>

  <div class='gift boxed'>
    <div class='giftbox'>5</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box5' class='thegift hidden'>
      <img id='fadingimage' src='https://unsplash.it/150/200/?random=5a' alt='' />
      <img id='slidingimage' src='https://unsplash.it/150/200/?random=5b' alt='' />
      <h1>Animeringar</h1>
      <p>
        Nu ska vi låta bilderna komma till liv. Eller ja, nästan. Vi ska animera dem. Med hjälp av toggleSliding och toggleFading kommer bilderna döljas och visas på ett lite mer levande sätt. Cool!
      </p>
      <p class='center'>
        <input type='button' id='slide' value='Slide. Baby, slide.'>
        <input type='button' id='fade' value='Fade in. Fade out.'>
      </p>
    </div>
  </div>

</div>

<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>