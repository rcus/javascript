/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  $('#box1 h1, #box1 p, #box1 img').click(function() {
    $(this).toggleClass('dark');
    console.log("toggle!");
  });


  console.log("Dags för att öppna paket!");
});
