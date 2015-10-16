/*!
 * jQuery Lightbox
 * http://www.student.bth.se/~matg12/javascript/webroot/lightbox.php
 *
 * Released under the MIT license:
 *
 * Copyright (c) 2015 Marcus Törnroth (m@rcus.se)
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

(function ($) {
  $.fn.lightbox = function(options) {
    var settings = $.extend({
      backgroundColor: '#000'
    }, options );

    // Create #overlay element
    $('<div id="overlay"></div>')
      .css({
        position: 'fixed',
        left: 0,
        top: 0,
        width: '100%',
        height: '100%',
        backgroundColor: settings.backgroundColor,
        opacity: 0
      })
      .animate({'opacity' : '0.8'}, 'slow')
      .appendTo('body');

    // Create #lightbox element
    $('<div id="lightbox"></div>')
      .hide()
      .css({
        position: 'fixed'
      })
      .appendTo('body');

    // Create image element
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

    // Remove lightbox on click
    $('#overlay, #lightbox').click(function() {
      $('#overlay, #lightbox').fadeOut('slow', function() {
        $(this).remove();
      });
    });

  };
}(jQuery));

$('img.lightbox').click(function() {
  $(this).lightbox();
});
