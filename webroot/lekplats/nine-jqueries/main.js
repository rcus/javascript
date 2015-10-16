/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var toggleGift = function(elem) {
    $(elem).parent().toggleClass('boxed unboxed');
    $(elem).parent().children('div').toggleClass('hidden');
  };

  var scrollToBox = function(elem) {
    $('html, body').animate({
        scrollTop: $(elem).parent().offset().top
    }, 1000);
  };

  // Gift-box
  $('.giftbox').click(function() {
    var t = this;
    $(t).parent().fadeOut(function() {
      toggleGift(t);
      $(t).parent().slideDown(function() {
        scrollToBox(t);
      });
    });
  });
  $('.minimize').click(function() {
    var t = this;
    $(t).parent().slideUp(function() {
      toggleGift(t);
      $(t).parent().fadeIn(function() {
        scrollToBox(t);
      });
    });
  });


  // Box 1 - Class toggle
  $('#box1 h1, #box1 p, #box1 img').click(function() {
    $(this).toggleClass('dark');
  });


  // Box 2 - Stop propagation
  $('#box2 img').click(function(event) {
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


  // Box 4 - Resize
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


  // Box 5 - Fade n' slide
  $('#box5 #fade').click(function() {
    $('#box5 #fadingimage').fadeToggle();
  });
  $('#box5 #slide').click(function() {
    $('#box5 #slidingimage').slideToggle();
  });


  // Box 6 - Lightbox
  $('#box6 img').click(function() {
    $('<div id="overlay"></div>')
      .css('opacity', '0')
      .animate({'opacity' : '0.8'}, 'slow')
      .appendTo('body');
    $('<div id="lightbox"></div>')
      .hide()
      .appendTo('body');
    $('<img>')
      .attr('src', $(this).attr('src'))
      .css({
        'max-height': $(window).height() * 0.9, 
        'max-width': $(window).width() * 0.9
      })
      .load(function() {
        $('#lightbox')
          .css({
            'top': ($(window).height() - $('#lightbox').height()) / 2,
            'left': ($(window).width() - $('#lightbox').width()) / 2
          })
          .delay('fast')
          .fadeIn();
      })
      .appendTo('#lightbox');

      $('#overlay, #lightbox').click(function() {
        $('#overlay, #lightbox').fadeOut('slow', function() {
          $(this).remove();
        });
      });
  });


  // Box 7 - Gallery
  $('#box7').parent().click(function() {
    $('#box7 #thumbnails img').load(function() {
      // Get elements heights
      var wh = $(window).height(),
        hph = $('#box7 h1').outerHeight(true) + $('#box7 p').outerHeight(true),
        gh = wh-hph-16*2,
        th = $('#thumbnails').outerHeight(true),
        bigimgh = gh-th-16*2;
      $('#box7').height(wh);
      $('#box7 #gallery').outerHeight(gh);
      $('#box7 #bigimage').css({
        height: bigimgh + 'px',
        lineHeight: bigimgh + 'px'
      });
    });
  });
  $('#box7 #thumbnails img').click(function() {
    var imgsrc = $(this).attr('src');
    $('#box7 #bigimage img').fadeOut(function() {
      $(this).attr('src', imgsrc).fadeIn();
    });
  });


  // Box 8 - Slideshow
  $('#box8').parent().click(function() {
    var images = $('#box8 #slideshow img'),
      i = images.length;

    var fadeImage = function() {
      images.each(function() {
        $(this).css('z-index', parseInt($(this).css('z-index'))+1);
        if ($(this).css('z-index') > images.length) {
          $(this).fadeOut(function() {
            $(this).css('z-index', $(this).css('z-index')-images.length).show();
          });
        }
      });
    };
    
    // Set z-index
    images.each(function() {
      $(this).css('z-index', i);
      i--;
    });

    var slideInterval = window.setInterval(fadeImage, 3000);

    $('#box8 #slideshow')
      .mouseenter(function() {
        window.clearInterval(slideInterval);
        console.log('mouseenter');
      })
      .mouseleave(function() {
        slideInterval = window.setInterval(fadeImage, 3000);
        console.log('mouseleave');
      });

    $('#box8 #slideshow').click(function(event) {
      event.stopPropagation();
      console.log('click');
      fadeImage();
    });

    $('#box8').siblings('.minimize').click(function(event) {
      event.stopPropagation();
      window.clearInterval(slideInterval);
    });

  });


  // Box 9 - Create plugin
  (function ($) {
    $.fn.transformText = function(options) {
      // This is the easiest way to have default options.
      var settings = $.extend({
        // These are the defaults.
        textTransform: ['capitalize', 'uppercase', 'lowercase', 'none']
      }, options );

      // Save current setting
      $.fn.transformText.current = isNaN($.fn.transformText.current) ? 0 : ($.fn.transformText.current + 1) % settings.textTransform.length;

      // Transform text
      return this.each(function() {
        $(this).css('text-transform', settings.textTransform[$.fn.transformText.current]);
      });
    };
  }(jQuery));

  $('#box9 h1, #box9 p').click(function() {
    $('#box9 h1, #box9 p').transformText();
  });

  (function ($) {
    $.fn.rotateElem = function(options) {
      // This is the easiest way to have default options.
      var settings = $.extend({
        // These are the defaults.
        rotate: '720deg',
        duration: '1s'
      }, options );

      // Rotate to 0?
      $.fn.rotateElem.rotateTo = $.fn.rotateElem.rotateTo === settings.rotate ? '0deg' : settings.rotate;

      // Rotate element
      return this.css({
        transform: 'rotate('+$.fn.rotateElem.rotateTo+')',
        transitionDuration: settings.duration
      });
    };
  }(jQuery));

  $('#box9 img').click(function() {
    $(this).rotateElem({rotate: '1440deg', duration: '0.5s'});
  });


  console.log("Dags för att öppna paket!");
});
