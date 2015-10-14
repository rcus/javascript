<?php 
/**
 * This is a Herbert pagecontroller.
 *
 */

// Include the essential config-file which also creates the $herbert variable with its defaults.
include(__DIR__.'/config.php'); 
$textFilter = new CTextFilter();


// Do it and store it all in variables in the Herbert container.
$herbert['title'] = "jQuery Lightbox Gallery Plugin";

$herbert['boxed'] = $textFilter->doFilter(<<<EOD
Ett plugin till jQuery för att visa dina bilder i en Lightbox. Enkel att använda och lätt att implementera.

##Demo
Klicka på någon av bilderna för att öppna Lightboxen.

![](https://unsplash.it/1200/800/?random=b){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=a){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=c){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=d){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=e){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=f){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=g){.thumbnail .lightbox}
![](https://unsplash.it/1200/800/?random=h){.thumbnail .lightbox}

EOD
, 'markdown');

$herbert['sidebar'] = $textFilter->doFilter(<<<EOD
### Ladda ner
+ [jquery-lightbox.js](js/jquery-lightbox.js)
EOD
, 'markdown');


// Finally, leave it all to the rendering phase of Herbert.
include(HERBERT_THEME_PATH);
