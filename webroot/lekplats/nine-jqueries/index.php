<?php $title='Nio små jQuery-rätter'; include(__DIR__ . '/../mall/header.php'); ?>

<h1>
  Nio små jQuery-rätter
</h1>

<div class='giftwrapper'>

  <div class='gift boxed'>
    <div class='giftbox'>1</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box1' class='thegift hidden'>
      <!-- <img src='https://unsplash.it/300/200/?random=1' class='right' alt='' /> -->
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
      <img src='https://unsplash.it/300/200/?random=2' class='right' alt='' />
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
      <!-- <img src='https://unsplash.it/300/200/?random=3' class='right' alt='' /> -->
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
      <img src='https://unsplash.it/300/200/?random=4' class='right' alt='' />
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
      <img id='fadingimage' src='https://unsplash.it/150/200/?random=5a' class='right' alt='' />
      <img id='slidingimage' src='https://unsplash.it/150/200/?random=5b' class='right' alt='' />
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


  <div class='gift boxed'>
    <div class='giftbox'>6</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box6' class='thegift hidden'>
      <img src='https://unsplash.it/1200/800/?random=6' class='right' alt='' />
      <h1>Lightbox</h1>
      <p>
        Tänk utanför boxen... Nu ska vi visa bilden i hela fönstret, i ett lager över själva sidan. Poängen är att man inte ska behöva ladda om sidan eller bilden. Vilket var viktigt för mig, eftersom bilden slumpas fram varje gång sidan laddas om. Testa, bara att klicka på bilden. Cool!
      </p>
    </div>
  </div>


  <div class='gift boxed'>
    <div class='giftbox'>7</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box7' class='thegift hidden'>
      <h1>Ett galleri utan galler i</h1>
      <p>
        Från smått till stort. Nu vill vi visa flera små bilder där man sedan smidigt kan förstora varje bild till en stor. Resultatet blev ett galleri. Cool!
      </p>
      <div id="gallery" class="dark">
        <div id="bigimage">
          <img src='https://unsplash.it/1200/800/?random=7a' alt='' />
        </div>
        <div id="thumbnails">
          <img src='https://unsplash.it/1200/800/?random=7a' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7b' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7c' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7d' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7e' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7f' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7g' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7h' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7i' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7j' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7k' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7l' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7m' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7n' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7o' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7p' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7q' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7r' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7s' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7t' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7u' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7v' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7w' alt='' />
          <img src='https://unsplash.it/800/1200/?random=7x' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7y' alt='' />
          <img src='https://unsplash.it/1200/800/?random=7z' alt='' />
        </div>
      </div>
    </div>
  </div>


  <div class='gift boxed'>
    <div class='giftbox'>8</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box8' class='thegift hidden'>
      <h1>En slideshow</h1>
      <p>
        En slideshow är vanligt förekommande på webbplatser. Här har jag skapat en enkel variant med fyra bilder. Bildspelet pausar när markören är över bildspelen, men skiftar bild om man klickar. Cool!
      </p>
      <div id="slideshow">
        <img src='https://unsplash.it/1200/400/?random=8a' alt='' />
        <img src='https://unsplash.it/1200/400/?random=8b' alt='' />
        <img src='https://unsplash.it/1200/400/?random=8c' alt='' />
        <img src='https://unsplash.it/1200/400/?random=8d' alt='' />
      </div>
    </div>
  </div>


  <div class='gift boxed'>
    <div class='giftbox'>9</div>
    <div class='minimize hidden' title='Stäng'>&times;</div>

    <div id='box9' class='thegift hidden'>
      <img src='https://unsplash.it/300/200/?random=9' class='right' alt='' />
      <h1>jQuery-plugin</h1>
      <p>
        Nu är det dags att skapa plugins. Det första jag gjorde ändrar textens bokstäver (text-transform) när den anropas. Testa själv att klicka på ett text-element.
      </p>
      <p>
        Det andra sätter snurr på bilden. Klicka på bilden och kolla själv. Cool!
      </p>
    </div>
  </div>


</div>

<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>