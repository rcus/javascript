/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var toggleGift = function(elem) {
    $(elem).parent().toggleClass('boxed unboxed');
    $(elem).parent().children('div').toggleClass('hidden');
  };

  // Gift-box
  $('.gift div:first-child').click(function() {
    console.log("clicked on gift");
    toggleGift(this);
    // $(this).parent().toggleClass('boxed unboxed');
    // $(this).parent().children('div').toggleClass('hidden');
  });

  $('.minimize').click(function() {
    toggleGift(this);
    // $(this).parent().toggleClass('boxed unboxed');
    // $(this).parent().children('div').toggleClass('hidden');
  });


  // Box 1
  $('#box1 h1, #box1 p, #box1 img').click(function() {
    $(this).toggleClass('dark');
  });


  // Box 2
  $('#box2 img').click(function( event ) {
    event.stopPropagation();
    $(this).toggleClass('thumbnail');
  });

  $('#box2').click(function() {
    $(this).parent().toggleClass('yellowed');
  });




  console.log("Dags för att öppna paket!");
});
