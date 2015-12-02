<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Lekplats";

$herbert['main'] = <<<EOD
<h1>Lekplats för JavaScript</h1>
<div class="boxed playground">
  <p><em>Här kommer lite blandat material upp som man kan leka med.</em></p>

  <h2 id="broadcast-server">Broadcast-server
    <ul>
      <li><a href="lekplats/broadcast-server/">Lek nu!</a></li>
      <li><a href="source.php?path=broadcast-server/index.php">Visa källkoden</a></li>
    </ul>
  </h2>
  <p>Den tidigare websocket-servern returnerade det meddelande du skickade till den. Men denna servern skickar vidare meddelandet till alla som lyssnar. Testa själv genom att öppna flera klienter.</p>

  <h2 id="echo-server">Echo-server
    <ul>
      <li><a href="lekplats/echo-server/">Lek nu!</a></li>
      <li><a href="source.php?path=echo-server/index.php">Visa källkoden</a></li>
    </ul>
  </h2>
  <p>Med hjälp av node på server-sidan visar denna enkla klient på kommunikation via websocket.</p>

  <h2 id="breakout">Breakout
    <ul>
      <li><a href="lekplats/breakout/">Lek nu!</a></li>
      <li><a href="source.php?path=breakout/index.php">Visa källkoden</a></li>
    </ul>
  </h2>
  <p>År 1976 släptes arkadspelet Breakout av Atari, Inc. Det har sedan gjorts flera varianter. Och nu kommer min!</p>

  <h2 id="canvas-game">Ett canvas-spel
    <ul>
      <li><a href="lekplats/canvas-game/">Lek nu!</a></li>
      <li><a href="source.php?path=canvas-game/index.php">Visa källkoden</a></li>
    </ul>
  </h2>
  <p>En första användning av canvas för min del. Detta kommer från genomgången på dbwebb.</p>

  <h2 id="nine-jqueries">Nio små jQuery-rätter
    <ul>
      <li><a href="lekplats/nine-jqueries/">Lek nu!</a></li>
      <li><a href="source.php?path=nine-jqueries/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/12gr1yzd/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Blanda och ge! Här är nio olika jQuery-snippets samlade på en och samma sida. De har till uppgift att visa vad jQuery går för, hur de kan ändra html-innehåll och stilmallar.</p>
  <p>I sista paketet finns även ett par jQuery-plugins som visar på möjligheten att göra ordentliga tillägg som lätt kan användas i flera sammanhang.</p>

  <h2 id="roulette">Roulette
    <ul>
      <li><a href="lekplats/roulette/">Lek nu!</a></li>
      <li><a href="source.php?path=roulette/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/axrheog8/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Okey, då satsar vi... Här ska vi spela roulette enligt spelsystemet Martingale. Det betyder att man satsar 1 spelmarker (10 kr i mitt fall). Vid förlust, så dubblas insatsen och man satsar på samma färg igen. När man vinner börjar man om från början, men byter färg.</p>
  <p>Det luriga i denna uppgift var att få till tidsförskjutningen. Min lösning blev att jag loopar om samma funktion för omgången, men har satt en variabel till <code>false</code> tills omgången är färdigspelad (dvs, kulan har landat i ett av hjulets alla nummer).</p>

  <h2 id="boulder-dash">Boulder Dash
    <ul>
      <li><a href="lekplats/boulder-dash/">Lek nu!</a></li>
      <li><a href="source.php?path=boulder-dash/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/gbnkcmy1/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Här har vi en spelplan :)</p>
  <p>Kul uppgift som fick ge lite utmaningar. Jag har försökt att få till det så att det blir lättöverskådligt. Mina förflyttningar baseras på att ändra positionen för min baddie. Sedan hämtas positionen för den ruta (tile) som den ska hamna på och får samma värden. Sedan är det bara att rita om figuren på rätt position.</p>
  <p>Det som ställde till det för mig var att positionen ändras när sidan scrollas. Inte alls bra. Lösningen var att ange positionerna med <code>getBoundingClientRect()</code> (vilket jag hittade i förra uppgiften) och lägga till <code>window.scrollX</code>/<code>window.scrollY</code>. Då funkade det som det skulle!</p>

  <h2 id="push-the-ball">Flytta på bollen
    <ul>
      <li><a href="lekplats/push-the-ball/">Lek nu!</a></li>
      <li><a href="source.php?path=push-the-ball/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/93ee4ume/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Peta på bollen, så flyttar den på sig!</p>

  <h2 id="dice">Kasta tärning - funktioner i JavaScript
    <ul>
      <li><a href="lekplats/dice/">Lek nu!</a></li>
      <li><a href="source.php?path=dice/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/jjedeqpu/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>En tärning kastas genom att kalla på en funktion. Antalet tärningskast bestäms av parametern som skickas med funktionen. Tärningskastens värden sparas i en array. Fördelen med att spara dem så är flera. Jag kan använda värdena efter serien är färdigkastad och skapa min utskrift smidigt med <code>join()</code>. Antalet kast kan jag också kolla lätt med <code>length</code>.</p>
  <p>Två funktioner används i varje omgång, <code>random(min, max)</code> som returnerar ett slumpat värde och <code>mean(arr)</code> som returnerar medelvärdet av värdena i array'en avrundat till en decimal.</p>

  <h2 id="type-strings">Strings - datatyper och värden
    <ul>
      <li><a href="lekplats/type-strings/">Lek nu!</a></li>
      <li><a href="source.php?path=type-strings/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/712uh1nq/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Nu hanterar vi strängar på olika sätt. Bland annat lite konkatenering ;)</p>
  <p>
    I uppgiften skulle vi använda oss av substrängar för att ta bort XXX. Jag använde mig av en variabel för det som skulle tas bort (<code>rem = 'XXX '</code>). Min kod blev
    <code class="block">str = str.substr(0, str.search(rem)) + str.substr(str.search(rem) + rem.length);</code>
    Annars skulle jag hellre kört
    <code class="block">str = str.replace(rem, '');</code>
  </p>

  <h2 id="type-numbers">Numbers - datatyper och värden
    <ul>
      <li><a href="lekplats/type-numbers/">Lek nu!</a></li>
      <li><a href="source.php?path=type-numbers/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/rnyeczoy/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Med hjälp av olika matematiska och numeriska funktioner kan man bearbeta olika siffervärden.</p>

  <h2 id="typeof">Literaler och typer
    <ul>
      <li><a href="lekplats/typeof/">Lek nu!</a></li>
      <li><a href="source.php?path=typeof/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/w5pkm1sj/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Visa olika literaler och deras typer.</p>

  <h2 id="transforms-and-transitions">Transforms och transitions
    <ul>
      <li><a href="lekplats/transforms-and-transitions/">Lek nu!</a></li>
      <li><a href="source.php?path=transforms-and-transitions/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/y0t4goes/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Med hjälp av CSS3 går det att forma och flytta element på olika sätt. Här visas lite olika förslag.</p>

  <h2 id="css-sprite-w-css3-transitions">Baddie som springer runt
    <ul>
      <li><a href="lekplats/css-sprite-w-css3-transitions/">Lek nu!</a></li>
      <li><a href="source.php?path=css-sprite-w-css3-transitions/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/spvnwz5s/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>En liten figur som springer omkring med hjälp av knapparna på tangentbordet. Skriptet lyssnar efter vissa knapptryckningar. Är det rätt knapp kommer css'en uppdateras och därmed figuren flytta på sig. Figuren kommer kommer från en CSS-sprite som jag har "lånat" från mos.</p>
  <img src="./img/sprite_mickey_mos.png" alt="">

  <h2 id="resize-element">Ändra elementets storlek
    <ul>
      <li><a href="lekplats/resize-element/">Lek nu!</a></li>
      <li><a href="source.php?path=resize-element/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/08d7dmLy/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Här justeras ett elements storlek till de värden som har angetts i formuläret. Elementets värden hämtas med <code>offsetWidth</code>/<code>offsetHeight</code> och skrivs in i fälten. När formuläret skickas sätts värdena till elementets <code>style</code>-attribut.</p>
  <p>Det finns en "bugg" i skriptet. Eller ja, den fungerar korrekt, men inte som en användaren kanske förväntar sig. När sidan laddas fylls värdena i (940px/194px). Trycker man på knappen, kommer rutans storlek att ändras. Alltså har den hämtat "fel" värde... Eller? Njae, <code>offsetWidth</code>/<code>offsetHeight</code> motsvarar värdet på elementet (906px/160px), plus 2 &times; padding (16px) och 2 &times; border (1px). Men när man ändrar blir de nya värdena 940px/194px för elementet, plus padding och border som är som tidigare.</p>

  <h2 id="mall">Mall - Hello World!
    <ul>
      <li><a href="lekplats/mall/">Lek nu!</a></li>
      <li><a href="source.php?path=mall/index.php">Visa källkoden</a></li>
      <li><a href="http://jsfiddle.net/rcus/60mj43hv/">JSFiddle</a></li>
    </ul>
  </h2>
  <p>Första skriptet. Mest gjort för att skapa en struktur för fortsatt lek ;)</p>
  <p>Även skapat mappen <a href="lekplats/sample/">sample</a> för att snabbt komma igång med ny programmering.</p>

</div>
<div class="sidebar">
  <h3>Användbart:</h3>
  <ul>
    <li><a href="source.php">Visa källkod</a></li>
    <li><a href="http://jsfiddle.net/user/rcus/">JSFiddle</a></li>
  </ul>
</div>
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
