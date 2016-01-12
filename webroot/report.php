<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php');
$textFilter = new CTextFilter();


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "Redovisningar av kursmomenten";

$herbert['boxed'] = $textFilter->doFilter(<<<EOD
*Här kommer redovisningarna från de olika kursmomenten att presenteras.*


##Kmom01: Kom igång med JavaScript {#kmom01}

**Vilken utvecklingsmiljö använder du?**  
Jag har lagt upp en virtuell Ubuntu-server som jag kan ansluta genom hemma-nätverket. Användar blandat Win och Mac, beroende på humör ;) Kodar i Sublime Text och surfar (och därmed testar koden) med Chrome.

**Hur väl känner du till JavaScript?**  
Tja, jag har använt JavaScript (och JQuery) lite, men inte lärt mig det ordentligt. Löst problemen efter behov, helt enkelt...

**Vilken uppfattning har du av JavaScript så här långt?**  
Förr tänkte jag att det var inte att ha... Nu, kanon!! Att kunna hantera webbsidor dynamiskt på klient-nivå har sina fördelar. Därmed har jag nog ökat förväntningar på vad JavaScript och kursen.

**Berätta vilka exempelprogram du gjorde och länka till dem.**  
Jag gjorde de exempelprogram som fanns i övningarna och forsökte att sätta mig in i dem för att förstå hur de hängde ihop. I detta kursmoment känns det som jag fick koll på läget. Kul att göra något som är användarbaserat som att styra runt en baddie.  
Kom igång snabbt med JSFiddle också, inte använt det eller liknande tidigare. Hade lite problem med att få in LESS-koden för baddien som springer runt, så jag klippte in den kompilerade CSS'en istället. Men vid nästa övning, transforms och transitions, insåg jag att det saknades LESS-kod från base.less. Lurigt med många steg...  
[Lekplatsen](playground.php) |
[JSFiddle](http://jsfiddle.net/user/rcus/fiddles/)

**Beskriv hur du gjort din baddie och vilka konster den kan.**  
Nja, min baddie blev en klonad Mickey Mos. Jag prioriterade bort att skapa en egen sprite, så... Och konsterna blev baserade på exemplet.

**Gjorde du extrauppgiften och utbildade din baddie med något extra?**  
Japp! Men jag det var klurigt att få till två rörelser, så jag höll på att ge upp. Men till slut, genom att dela upp rotationen i två steg, så funkade det. Förflyttningen (transition) riktning baserades på rotationens vinkeln. Så om jag börjar med 90°, kan jag sedan förflytta den i sidled och fortsätta med att rotera ytterligare 630°. Svettigt.  
Men sen blev det inte mer av extra features.


##Kmom02: Programmera med JavaScript {#kmom02}

**Allmänt om kursmoment 2**  
Nu blev det mer allvar :) Det märktes att det blev mer utmanande än att "bara" skapa testfunktioner. Nu ska delarna funka tillsammans och spelen ska kunna fungera. Vilket också är kul, tycker jag. Uppgifterna har i stort funkat bra, men det har tagit längre tid för mig med vissa moment än vad jag har tänkt mig. Bland annat tidsfunktionerna i Roulette, det var svårt att få till koden så att den väntar ut ett resultat innan den går vidare. Lösningen blev att jag loopade runt funktionen med setTimeout. Väl igång hade jag en enkel if-sats som bestämde om det var dags att köra innehållet, eller om den bara skulle startas om med en ny setTimeout.

**Vilka funktioner har du lagt till i din variant av mos.js?**  
Min variant fick heta rcus.js. Den fick enbart en slumpfunktion, random(min, max), som returnerar ett heltal mellan min och max. Hade planer på att lägga en funktion som skrev ut innehåll till ett HTML-element, men la ner den idén då jag hade lite olika tweakningar på funktionen i de olika programmen jag gjorde.

**Gjorde du något extra arbete på spelplanen med Boulder Dash, eller gjorde du kanske en egen spelvariant?**  
Nä, precis som Mos version, så kan min baddie bara gå runt på banan utan att något händer. Däremot la jag ner lite möda på att få till positionen av baddien, så att den skulle vara rätt placerad om sidan laddades om när man hade scrollat ner eller om fönsterstorleken ändrades. Jag blev nämligen först lite ställd då min baddie försvann då jag laddade om sidan, men förstod sedan att den fanns "ovanför" sidan.

**Gjorde du något extra på Roulettespelet?**  
Inga extrafunktioner. Men jag försökte få till det så att jag kunde dela upp koden i flera funktioner. Vet dock inte om det enligt "best practice" med att lägga funktionerna som methods till ett objekt, som till exempel r.spin(). Men det blev min lösning, och jag tycker själv att jag fick bra översikt av koden.


##Kmom03: Grunderna i jQuery {#kmom03}

**Allmänt om kursmoment 3**  
Kul att få greje på allvar med jQuery, på en lagom nivå för mig. Jag vill nå ett gott resultat, så vissa delar har jag slipat lite extra på. Att få till de [nio små rätterna](http://www.student.bth.se/~matg12/javascript/webroot/lekplats/nine-jqueries/) var kul. Började väldigt lätt, men gick sedan vidare till mer avancerade oh användbara delar. Galleriet uppskattade jag. Jag försökte att få till det på ett bra sätt med att låta bilder vara både stående och liggande. Det ska även fungera för fler storleksförhållanden. Jag fick även till att den använder den synliga delen av webbsidan för hela boxen, man ska inte behöva skrolla för att se bilden eller småbilderna i underkanten.  
Däremot stötte jag på lite problem efter hand när det tillkom fler paket. Användningen av `this` blir ibland fel, beroende på vilka funktioner som har kallats på från de olika eventen med `.click()`. Så om jag t.ex. öppnar galleriet efter att jag har haft slideshown öppen, så beter den inte sig riktigt som jag har tänkt. (Bilderna tar inte hänsyn till sin plats, utan blir alltid 100% breda. Tydligt på stående bilder.) De värsta `this`-felen rättade jag till, men en del lät jag vara. Suck, orkade inte få till dem när jag tidigare var så nöjd med delresultaten.  
Slideshowen kämpade jag med en del med. Det där extra, så att den pausar vid `mouseenter` och startar om vid `mouseleave` OCH att det går att klicka sig fram ett steg. Det ställde till det för mig i början, då klicket både flyttade fram det ett steg, men också startade en ny animering. Insåg efter en stund att `.click()` på boxen fortfarande var aktiv, men det tog sin stund.  
BTW, jag blev nöjd med skroll-animeringen som flyttar innehållet till den nyligen öppnade/stängda boxen.

**Vad tycker du om jQuery, hur känns det?**  
Jag ser fler och fler fördelar med jQuery, det underlättare verkligen användningen av JavaScript. Många användbara funktioner är verkligen förenklade, och jag ser fram mot att få lära mig mer om detta. Väldigt smidigt att skapa plugin, vilket jag tycker visar på att det jQuery är och kommer vara användbart och utbyggbart ett bra tag framöver.

**Vilka är dina erfarenheter av jQuery inför detta kursmoment?**  
Tidigare har jag bara använt jQuery för att enkelt kunna hämta specifika element, id'n eller klasser med `$('#id')`. Det kändes som ett slöseri med att ladda hem ett helt bibliotek för att enbart använda det i stället för `document.getElementById()` )och liknande). Samt uppskattade jag `.hide()` och `.show()`. Men det var allt. Så onödiga resurser för litet användande. Men det var då, det...

**Berätta om din plugin.**  
Jag byggde [*jQuery Lightbox plugin*](http://www.student.bth.se/~matg12/javascript/webroot/lightbox.php) som fungerar som lightboxen från paket nummer 6. Tanken var att bygga vidare det till en kombination av galleriet, där övriga valda bilder skulle synas under den stora bilden i lightboxen, i ett lager över den vanliga webbsidan. Men insikten om att jag skulle vilja göra det så ordentligt att tiden skulle springa iväg kom till mig, så det får bli en annan gång. Men jag är väldigt nöjd över pluginet så som det blev.


##Kmom04: AJAX och JSON med jQuery {#kmom04}

**Allmänt om kursmoment 4**  
Okej, nu börjar det bli lite nytta på allvar med jQuery. Kul att få till "riktiga" funktioner. Jag tycker det är roligare när det finns ett konkret mål i sikte. Butikens innehåll och kundkorgen blev jag nöjd med. Fick med en funktion i kundkorgen där man kan öka eller minska antalet böcker.  
Dock blev det inte fullt ut med utceckningen, jag skippade en del validering av formuläret på serversidan. Det går att få till varje fält så att de kontrollerar innehållet med tanke på vad det ska innehålla. Min lösning blev en väldigt förenklad, jag kollade bara att fälten innehöll något tecken. Dock är nummer-fälten inställda att bara ta siffror, så lite begränsningar är det. Sedan valde jag att skicka formluläret med `.click()`-funktionen i jQuery, så HTML5-valideringen av fälten körs inte.

**Vad tycker du om Ajax, hur känns det att jobba med?**  
Känns hyfsat lätt att komma igång med och få en blick över hur det funkar. Smidigt att jobba med. Det har sina fördelar att jobba mot ett API, så att man kan hämta data dynamiskt. Det som jag skulle vilja sätta mig in i framöver är autentisiering vid hämtning av data från API'er, men det tar vi när det bli aktuellt... :)

**Vilka är dina erfarenheter av Ajax inför detta kursmoment?**  
Har använt Ajax lite tidigare, men använt färdig kod. Det som har ställt till det för mig innan är cross domain requests, där det ibland har blivit stopp för att hämta från olika domäner. Lösningarna har blivit indivduella, men sammanhanget har varit samma "dataägare" med olika domännamn. Nu efter kursmomentet har jag mer kött på benen och kan gå vidare lite bättre med detta framöver.

**Berätta om din webbshop på din me-sida, hur gjorde du?**  
Shoppen visar objekten i egna rutor, där man kan klicka på en köp-knapp. Vid köp skickas hela data-objekten för boken med till API'et `cart.php`. Det gick enkelt att göra med `.data()`, vilket var en ny funktion för min del. Smidig funktion, lätt att förstå.  
Kundvagnen fick även funktioner för att lägga till eller ta bort exemplar av valda böcker. Skulle man ta bort det sista exemplaret, så försvinner boken helt från kundvagnen.  
Däremot blev utceckningen något enklare än vad jag tänkte mig från början. Jag fick inte till mos CForm, vilket gjorde att jag kodade mina formulärfält direkt in i PHP-filen. Valideringen blev också i en enklare variant, precis som jag skrev tidigare.

**Lyckades du göra extra-uppgiften och paketera din kod?**  
Nope, inget försök där.


##Kmom05: HTML5 och Canvas {#kmom05}

**Allmänt om kursmoment 5**  
Att programmera spel är en bra utmaning. Det är många bitar att ta hänsyn till, det ska flyta på bra och vara smidigt för spelaren att förstå och fastna för. Men det faller mig inte riktigt i smaken då jag själv inte är en storspelare. Det går i vågor hur mycket jag spelar, men en i ganska liten omfattning. I detta moment kommer dock min ambition fram om att göra ett bra resultat, så jag ger mig inte!

**Vilka möjligheter ser du med HTML5 Canvas?**  
Det grafiska har jag inte använt mig av nämnvärt. Men det har verkligen sin poäng med att kunna koda fram grafik, för att kunna använda det i olika sammanhang där vanliga bild har sina begränsningar. Jag kan tänka mig att canvas har en fördel vid animeringar.  
Ett sidospår som skulle vara intressant, men jag antagligen inte kommer sätta mig in i inom den närmsta tiden, är vektorbaserad grafik med SVG. 

**Hur avancerat gjorde du din spelfysk (om du överhuvudtaget har någon i ditt spel)?**  
Eftersom det inte stod i uppgiften, så tänkte jag i första hand på att få spelet att fungera. Det hade varit en bit till att programmera, hade säkert funkat, men jag kommer just nu inte på vilken typ av spelfusk jag skulle lagt in.

**Beskriv och berätta om ditt spel. Förklara hur du använder objekt och prototyper.**  
Breakout blev det, en klon av orgrinalspelet från 1976. Med en boll ska man slå bort alla brickor i övre delen av skärmen. Bollen studsar fram på väggarna och i taket, men för att den inte ska åka ut i nederkanten kan man som spelare flytta en platta i sidled för att bollen ska studsa på den.  
Jag har skapat spelet med hjälp av flera objekt. Förutom `Vector` från genomgången, använder jag mig av objektet `Brick` för varje bricka, `Bricks` för uppställningen av alla brickor tillsammans, `Paddle` som styr plattan och `Ball` för bollen. Varje objekt har egna prototyper för att exempelvis rita upp grafiken på aktuell position. (Just prototypen `Bricks.draw` ritar inte upp någon egen grafik, men hänvisar vidare till alla enskilda `Brick`-objekt som är lagrade i en array.) En annan återkommande prototyp är `update` som updaterar alla värden innan det är dags att rita upp det grafiska. Sedan finns det även prototyper som är specfika för ett objekt, exempelvis `Ball.collide` som räknar ut om det sker en kollision mellan objektet `Ball` och ett angivet objekt. För att hålla koll på spelets status skapade jag objektet `Status`, som håller koll på poäng, liv och spelmoment i väntan på att starta igång bollen.  
Dock är det två saker som jag inte har riktigt fått kläm på, trots att spelet fungerar (nästan) som det ska. Det första är användningen av `lastGameTick` från genomgången. Jag vet inte riktigt hur jag skulle få in det i mitt spel. Jag kan tänka mig att det har att göra med säkerställningen av att bollens hastighet blir mer konstant, oavsett hårdvaruförutsättningar. Det är andra är att för varje gång spelaren startat ett nytt spel utan att ladda om sidan, alltså när liven är slut eller alla brickor är träffade, så har bollen fått en ökad hastighet. Jag tänker ju att jag skapar ett nytt objekt för den nya bollen med samma förutsättningar. Kanske är detta något som har med min första fundering (`lastGameTick`) att göra?? Någon som har en idé varför det blir så?

**Gjorde du något på extrauppgiften?**  
Nej. Min ambition att göra ett bra spel tog all min tid. Å andra sidan blev jag nöjd med det resultatet!


##Kmom06: HTML5 och Websockets {#kmom06}

**Allmänt om kursmoment 6**  
Det är roligt att kunna tillämpa sina kunskaper inom nya områden. JavaScript/jQuery hanterar jag bra nu, men Websockets och node.js är nytt för mig. Därför blev jag nöjd över hur väl jag fick det att fungera, när jag tidigare bara har sneglat på kommunikation med server-sidan från klienten. Det känns som att nya möjligheter till vad jag kan utveckla öppnar sig mer.

**Vilka möjligheter ser du med HTML5 Websockets?**  
Samtidigt som jag ser att jag kan göra mer när jag har en kommunikation med servern, har jag svårt att se något konkret. Men det innebär ju att två (eller flera) klienter kan kommunisera med hjälp av en chatt, eller liknande. Eller att göra något som är beroende av den andres respons. Eftersom förra momentet handlade om spel, så skulle man kunna utmana varandra i något spel (kanske lite svårt i mitt en-manna-spel Breakout...). Annars jobba på samma dokument eller samma kod. Känns som jag inte kan komma riktigt utanför boxen, utan bara kommer på sådant som redan finns, men det triggar lite ändå.

**Vad tycker du om Node.js och hur känns det att programmera i det?**  
Sjukt smidigt att det är JavaScript, så att man redan kan det. Samtidigt är det helt nytt, då det blir nya tillämpningar eftersom det är på server-sidan. Behöver utforska mer i dokumentation för att se om det är lätt att sätta sig in i. Bra med att det går att utöka med paket, som till exempel WebSocket-Node.  
Det är också lite nytt med hanteringen av tjänsterna. Att dra igång en http-server var inte så svårt. Men då den var i förgrunden, kändes det som att de inte är så stabila. Men jag fick igång webservern i bakgrunden, med loggningsfunktion (hittade en tråd i forumet), genom att ange `node webserver-echo > nodelog.log &`. `> nodelog.log` gör att utskriften sparas i den angivna filen, och `&` startar processen i bakgrunden. Dock har jag inte kommit på ett smidigt sätt att ta fram den i förgrunden igen, så att jag kan avsluta den. Men det är ett senare problem. Sedan går det säkert att köra igång den med skript automatiskt, men det lät jag bli nu.

**Beskriv hur du löste echo-servern och broadcast-servern.**  
Jag kikade mycket på Mikaels exempel, och jobbade vidare med dem. Inga större förändringar, men jag lade till en lista för att välja bland olika servrar. I listan finns dbwebb, båda nodejs-servrarna och min virtuella server hemma. Dessutom använde jag idéen med att låta broadcast-servern använda protokoll för både broadcast och echo, så det räcker med att starta det skriptet för att köra båda tjänsterna. Testa gärna med nodejs1-servern. Om tjänsten fortfarande är igång, vill säga...

Länkar: [Echo](http://www.student.bth.se/~matg12/javascript/webroot/lekplats/echo-server/) | [Broadcast](http://www.student.bth.se/~matg12/javascript/webroot/lekplats/broadcast-server/)

**Beskriv och berätta om din chatt. Förklara hur du byggde din chatt-server och förklara protokollet.**  
Nu spann jag vidare på tidigare protokoll. För det första lät jag kommunikationen med servern startas redan när sidan har laddats färdigt. På så sätt får användaren igång tjänsten från början, men kan dock inte börja chatta förrän man har angett chattnamn.  
Jag satsade på kommunikation mellan klient och server utöver meddelanden. Ja, inte många funktioner, men ändå skapa möjligheten. Efter anslutning behöver ju användaren skapa ett chattnamn. Detta är för att visas som online för övriga användare, och för att kunna ta emot meddelanden från de andra. Chattnamnet får inte vara detsamma som någon annans chattnamn. Det får heller inte innehålla otillåtna tecken. I mitt fall blev det bara |-tecknet som begränsades, eftersom jag använder det som separator för chattnamnen när de skickas ut.  
Meddelandet som skickas till eller från servern inleds med ett ord för funktionen, exempelvis `nick`, `text` eller `guests`. Mottagande sidan kan därmed läsa av vad Meddelandet innehåller och använda informationen rätt. Det kan vara `text:` för ett meddelanden, `nick:` för ange eller bekräfta chattnamnet, eller `guests:` för att skicka en lista med inloggade chattare.

Länk: [Chat](http://www.student.bth.se/~matg12/javascript/webroot/lekplats/chat/)

**Gjorde du något på extrauppgiften?**  
Jag är inte så IRC-van, så därför blev det inte några finesser från IRC. Däremot satsade jag extra på kommunikationen utöver själva meddelandena, så som jag beskrev ovan. Så en gästlista, vilket är kul för användaren, så att den vet vem man kan chatta med!


##Kmom07/10: Projekt och Examination {#kmom07}
Projekt: jQuery Gallerybox [rcus.github.io/jquery-gallerybox](https://rcus.github.io/jquery-gallerybox)

**Paketera, presentera och produktifiera**  
Jag har valt att utveckla en deluppgift från övningen med nio olika jquery-exempel (kmom03). Eller ja, snarare två uppgifter: lightboxen och galleriet. Pluginet fick heta jQuery Gallerybox, där funktionen är att öppna upp en vald bild i en lightbox och samtidigt visa upp övriga bilder i nederkanten. Tanken väcktes redan då vi gjorde övningarna, men jag la det till möjligt-att-göra-senare-listan.  
En tanke från början var att få det lättåtkomligt för andra utvecklare, därför passar det bra med att lägga källkoden på Github. Men jag ville göra det ännu smidigare, så jag packade ihop det och publicerade detta på [npmjs.com](https://www.npmjs.com/package/jquery-gallerybox). Nu går det att installera paketet med `npm install jquery-gallerybox`. Likaså ville jag ha en tydlig webbsida med exempel och som beskriver hur det används. Jag ville lyfta ur det från min me-sida i kursen. Samtidigt blev jag nyfiken på att få igång en sida på github.io, istället för att "bara" lägga upp webbsidan på studentservern. Gick smidigt att skapa en ny gren, `gh-pages`, som innehåller webbsidan. Med andra ord finns även webbsidans källkod på [Github](https://github.com/rcus/jquery-gallerybox/tree/gh-pages).

**Ha koll på konkurrenterna och lär av dem**  
Oj, här blev det svettigt. Första tanken var att detta borde ju inte vara så stort. Vid en första sökning på nätet, så fanns det inte många som stämde in på vad jag tänkte. Men med lite justerade söktermer hittade jag flera som gör det som jag tänkte att mitt plugin skulle göra. Fast bättre. Suck. Jag märkte att det har varit lång utveckligsprocess för flera, speciellt av de stora.  
Snabbt fick jag en massa idéer på vad jag kan göra, men satsade först på grundfunktionen. Sedan blir det fortsatt utveckling för att förbättra. Bland annat kontroll av bildbyten, responsivitet, alternativ för småbilderna i nederkanten och zoom-funktion för den stora bilden.

**Kvalitet och omfattning**  
Jag ville komma igång med en helhet som fungerar. Det går att köra pluginet som det är, men det finns också utrymmen för att vidareutveckla och förbättra en hel del. Förra stycket innehåller en hel del idéer på fortsatt arbete. Det var bara att ställa in mig på att få till grundfunktionen, tänka KISS.  
Inledningsvis använde jag mig av koden från tidigare övningar. Jag fortsatte med att ta reda på mer kring plugin-uppbyggnad, och kom fram till att jag behövde ändra lite i strukturen för att få ihop det lite bättre. Exempelvis innebar det i min första version att användaren skulle få lyssna på `click`-event som den skulle få koda ihop själv:
```
$('.gbox').click(function() {
  $('.gbox').gallerybox();
});
```
Så kunde jag inte ha det. Numera anropas Gallerybox med enbart en rad:
```
$('.gbox').gallerybox();
```
Dessutom har jag sett till att man kan lägga in lite olika inställningar. I samband med att man kör igång Gallerybox, så kan man ställa in bakgrundensfärg/-transparens och text för att avsluta Gallerybox (CLOSE). Och nu när strukturen finns där, går det smidigt att lägga till fler inställningar framöver. Exempel på kod blir då:
```
$('.gbox').gallerybox({
  bgColor: 'blue',
  bgOpacity: 0.5,
  closeText: 'EXIT'
});
```
När jag kodar vill jag få till en generell kod. Jag vill försöka låta bli att vara alltför specifik i mina funktioner, så att jag kan återanvända stora delar. Vissa delar kan man fortfarande klia sig på hakan för, som när de olika elementen skapas. Däremot är jag nöjd över funktioner som ska skrolla småbilderna, en funktion för båda hållen, som dessutom kollar av att den inte går för långt åt något håll.

**Valbara krav**  
I projektet har jag satsat lite extra på vissa bitar, som jag har nämnt i tidigare stycken. Bland annat är jag nöjd med paketeringen och publiceringen av pluginet, att det finns på npmjs.com och att det presenteras genom GitHub Pages. För egen del känns det inte bara som en bra produkt, utan som en bra produkt som är spridbar. Även om man kanske ska ta statistik med en viss nypa salt, så är det ändå roligt att se att pluginet har laddats ner mer än 100 gånger från npmjs.com den senaste veckan. :)  
Även strukturen för inställningar tycker jag är bra, då pluginet får förutsättningar för att kunna konfigureras av användarna, utan att de behöver skriva om koden.  
Annat som jag har gjort extra under kursens gång som jag vill lyfta upp är baddien i kursmoment 01 som lyckades göra en stående dubbel saltomortal framåt. :) Jag är också nöjd med [roulettespelets](lekplats/roulette/) upplägg med metoder i koden (se [källkoden](source.php?path=roulette/main.js)) och [chattens](lekplats/chat/) lista över inloggade användare.

**Allmänt om projektet**  
Projektets upplägg var väldigt öppet, vilket passade mig bra då jag redan under ett tidigare kursmoment fick en idé på vad som skulle vara kul att fortsätta med att utveckla. För min del flöt det på hyfsat smidigt, inga större problem på vägen. Jag fick lära mig en hel del från jQuerys API och sen att googla runt och hitta lösningar (där Stackoverflow fick stå för flera sökresultat). Enkelheten var i att det var relativt lätt att komma igång, men utmaningen blev istället att kunna anpassa till så som min tanke var. Och att hitta en lagom nivå på nya idéer som dök upp under tiden. Tidsmässigt har jag lagt ner en rimlig tid som motsvarar kursens upplägg. Däremot går det att fortsätta att utveckla mitt plugin, så sista timmen är nog inte gjord på detta ännu. Som sagt, projektet har passat mig bra, och jag tycker att det var ett mycket bra och rimligt projektupplägg.

**Tankar om kursen**  
Kursen i helhet tycker jag har varit bra och intressant, då den har belyst flera olika delar inom JavaScript. Inte bara jQuery och AJAX, utan även websocket och node.js. Bra! För min del har detta en stor relevans med det som jag vill jobba med framöver, vilket har gett mig ett stort engagemang. Dock, vilket är nackdel med ett brett innehåll, har det inte varit några djupdykningar inom någon specifik del. Klart, här har projektet kunnat användas, men då är det utan ett förberett undervisningsmaterial.  
Klart en rekommenderbar kurs! Betyg: 8 av 10

EOD
, 'markdown');

$herbert['sidebar'] = $textFilter->doFilter(<<<EOD
### Välj kursmoment:
+ [Kmom01](#kmom01)
+ [Kmom02](#kmom02)
+ [Kmom03](#kmom03)
+ [Kmom04](#kmom04)
+ [Kmom05](#kmom05)
+ [Kmom06](#kmom06)
+ [Kmom07/10](#kmom07)
EOD
, 'markdown');


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
