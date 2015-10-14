<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 
$textFilter = new CTextFilter();


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "jQuery Lightbox plugin";

$herbert['boxed'] = $textFilter->doFilter(<<<EOD
jQuery Lightbox plugin är ett plugin för att visa dina bilder i en Lightbox. Enkel att använda och lätt att implementera. Eftersom det är ett plugin till [jQuery](http://jquery.com/), så är det ett krav att det finns i din miljö.

## Demo
Klicka på någon av bilderna för att öppna Lightboxen.

![](https://unsplash.it/1200/800/?random=b){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=a){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=c){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=d){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=e){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=f){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=g){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=h){.thumbnail .lightbox}

## Kom igång enkelt
Det är inte svårt att komma igång med jQuery Lightbox. [Ladda hem filen](js/jquery-lightbox.js) och länka till den i din HTML-kod:

    <script src='js/jquery-lightbox.js'></script>

Sedan är det bara att lägga till klassen `lightbox` i ditt bildelement.

    <img src='...' alt='' class='lightbox'>

## Anpassa
Det är förberett för att kunna använda klassen `lightbox`, men du har möjlighet att kalla på funktionen själv med `.lightbox()`.

    $('img').click(function() {
      $(this).lightbox();
    });

Du har möjlighet att ändra bakgrundsfärgen till eget önskemål.

    $('img').click(function() {
      $(this).lightbox({backgroundColor: '#000'});
    });

##Licens
Copyright (c) 2015 Marcus Törnroth (m@rcus.se)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
EOD
, 'markdown');

$herbert['sidebar'] = $textFilter->doFilter(<<<EOD
### Ladda ner
+ [jquery-lightbox.js](js/jquery-lightbox.js)
EOD
, 'markdown');


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
