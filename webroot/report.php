<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Redovisningar";

$herbert['main'] = <<<EOD
<h1>Redovisningar av kursmomenten</h1>
<div class="boxed">
  <p><em>Här kommer redovisningarna från de olika kursmomenten att presenteras.</em></p>
  <h2 id="kmom01">Kmom01: Kom igång med JavaScript</h2>
  <p><strong>Vilken utvecklingsmiljö använder du?</strong><br />
    Jag har lagt upp en virtuell Ubuntu-server som jag kan ansluta genom hemma-nätverket. Användar blandat Win och Mac, beroende på humör ;) Kodar i Sublime Text och surfar (och därmed testar koden) med Chrome.
  </p>
  <p><strong>Hur väl känner du till JavaScript?</strong><br />
    Tja, jag har använt JavaScript (och JQuery) lite, men inte lärt mig det ordentligt. Löst problemen efter behov, helt enkelt...
  </p>
  <p><strong>Vilken uppfattning har du av JavaScript så här långt?</strong><br />
    Förr tänkte jag att det var inte att ha... Nu, kanon!! Att kunna hantera webbsidor dynamiskt på klient-nivå har sina fördelar. Därmed har jag nog ökat förväntningar på vad JavaScript och kursen.
  </p>
  <p><strong>Berätta vilka exempelprogram du gjorde och länka till dem.</strong><br />
    Jag gjorde de exempelprogram som fanns i övningarna och forsökte att sätta mig in i dem för att förstå hur de hängde ihop. I detta kursmoment känns det som jag fick koll på läget. Kul att göra något som är användarbaserat som att styra runt en baddie.<br />
    Kom igång snabbt med JSFiddle också, inte använt det eller liknande tidigare. Hade lite problem med att få in LESS-koden för baddien som springer runt, så jag klippte in den kompilerade CSS'en istället. Men vid nästa övning, transforms och transitions, insåg jag att det saknades LESS-kod från base.less. Lurigt med många steg...<br />
    <a href="playground.php">Lekplatsen</a> | <a href="http://jsfiddle.net/user/rcus/fiddles/">JSFiddle</a>
  </p>
  <p><strong>Beskriv hur du gjort din baddie och vilka konster den kan.</strong><br />
    Nja, min baddie blev en klonad Mickey Mos. Jag prioriterade bort att skapa en egen sprite, så... Och konsterna blev baserade på exemplet.
  </p>
  <p><strong>Gjorde du extrauppgiften och utbildade din baddie med något extra?</strong><br />
    Japp! Men jag det var klurigt att få till två rörelser, så jag höll på att ge upp. Men till slut, genom att dela upp rotationen i två steg, så funkade det. Förflyttningen (transition) riktning baserades på rotationens vinkeln. Så om jag börjar med 90°, kan jag sedan förflytta den i sidled och fortsätta med att rotera ytterligare 630°. Svettigt.<br />
    Men sen blev det inte mer av extra features.
  </p>

  <h2 id="kmom02">Kmom02: Programmera med JavaScript</h2>
  <p><strong>Allmänt om kursmoment 2</strong><br />
    Nu blev det mer allvar :) Det märktes att det blev mer utmanande än att "bara" skapa testfunktioner. Nu ska delarna funka tillsammans och spelen ska kunna fungera. Vilket också är kul, tycker jag. Uppgifterna har i stort funkat bra, men det har tagit längre tid för mig med vissa moment än vad jag har tänkt mig. Bland annat tidsfunktionerna i Roulette, det var svårt att få till koden så att den väntar ut ett resultat innan den går vidare. Lösningen blev att jag loopade runt funktionen med setTimeout. Väl igång hade jag en enkel if-sats som bestämde om det var dags att köra innehållet, eller om den bara skulle startas om med en ny setTimeout.
  </p>
  <p><strong>Vilka funktioner har du lagt till i din variant av mos.js?</strong><br />
    Min variant fick heta rcus.js. Den fick enbart en slumpfunktion, random(min, max), som returnerar ett heltal mellan min och max. Hade planer på att lägga en funktion som skrev ut innehåll till ett HTML-element, men la ner den idén då jag hade lite olika tweakningar på funktionen i de olika programmen jag gjorde.
  </p>
  <p><strong>Gjorde du något extra arbete på spelplanen med Boulder Dash, eller gjorde du kanske en egen spelvariant?</strong><br />
    Nä, precis som Mos version, så kan min baddie bara gå runt på banan utan att något händer. Däremot la jag ner lite möda på att få till positionen av baddien, så att den skulle vara rätt placerad om sidan laddades om när man hade scrollat ner eller om fönsterstorleken ändrades. Jag blev nämligen först lite ställd då min baddie försvann då jag laddade om sidan, men förstod sedan att den fanns "ovanför" sidan.
  </p>
  <p><strong>Gjorde du något extra på Roulettespelet?</strong><br />
    Inga extrafunktioner. Men jag försökte få till det så att jag kunde dela upp koden i flera funktioner. Vet dock inte om det enligt "best practice" med att lägga funktionerna som methods till ett objekt, som till exempel r.spin(). Men det blev min lösning, och jag tycker själv att jag fick bra översikt av koden.
  </p>

</div>
<div class="sidebar">
  <h3>Välj kursmoment:</h3>
  <ul>
    <li><a href="#kmom01">Kmom01</a></li>
    <li><a href="#kmom02">Kmom02</a></li>
  </ul>
</div>
EOD;

// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
