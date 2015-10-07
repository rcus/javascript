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
    toggleGift(this);
  });
  $('.minimize').click(function() {
    toggleGift(this);
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


  // Box 3 - Add an element and add handler to remove the element on click
  $('#box3 input[type="button"]').click(function() {
    $('<div></div>')
      .insertAfter('#palette')
      .css({
        float: 'left',
        margin: '5px',
        height: '68px',
        width: '69px',
        backgroundColor: $('#box3 input[type="text"]').val(),
        cursor: 'pointer'
      })
      .click(function() {
        $(this).remove();
      });
  });


  // Box 4
  var currentSize = function() {
    $('#box4 #width').text($('#box4 img').width() + ' px');
    $('#box4 #height').text($('#box4 img').height() + ' px');
  };
  $('#box4').parent().click(function() {
    $('#box4 img').width($('#box4 img').width());
    $('#box4 img').height($('#box4 img').height());
    currentSize();
  });
  $('#box4 input[type="button"]').click(function() {
    currentSize();
  });
  $('#box4 #addwidth').click(function() {
    $('#box4 img').width($('#box4 img').width() + 10);
  });
  $('#box4 #subwidth').click(function() {
    $('#box4 img').width($('#box4 img').width() - 10);
  });
  $('#box4 #addheight').click(function() {
    $('#box4 img').height($('#box4 img').height() + 10);
  });
  $('#box4 #subheight').click(function() {
    $('#box4 img').height($('#box4 img').height() - 10);
  });


  // Box 5
  $('#box5 #fade').click(function() {
    $('#box5 #fadingimage').fadeToggle();
  });
  $('#box5 #slide').click(function() {
    $('#box5 #slidingimage').slideToggle();
  });


  console.log("Dags för att öppna paket!");
});
