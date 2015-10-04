/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var myBall = {
    image: 'http://dbwebb.se/img/black_ball_64_64.png',
    dim: {w: 64, h: 64 },
    pos: {},
    elem: document.getElementById('ball')
  },
    flash = document.getElementById('flash').getBoundingClientRect();

  // Init
  myBall.init = function() {
    this.elem.style.backgroundImage = 'url(' + this.image + ')';
    this.elem.style.width = this.dim.w + 'px';
    this.elem.style.height = this.dim.h + 'px';
    this.pos.x = Math.round(flash.left + flash.width/2 - this.dim.w/2);
    this.pos.y = Math.round(flash.top + flash.height/2 - this.dim.h/2);
    myBall.draw();
  };

  // getters
  myBall.getCenter = function() {
    return {
      x: this.pos.x + Math.round(this.dim.w/2),
      y: this.pos.y + Math.round(this.dim.h/2)
    };
  };

  // other functions
  myBall.draw = function() {
    this.pos.x = this.keepWithinRange(this.pos.x, flash.left, flash.right-this.dim.w);
    this.pos.y = this.keepWithinRange(this.pos.y, flash.top, flash.bottom-this.dim.h);
    this.elem.style.left = this.pos.x + 'px';
    this.elem.style.top = this.pos.y + 'px';
    console.log('Bollen är ritad vid: ' + this.pos.x + ' \u00D7 ' + this.pos.y);
  };

  myBall.keepWithinRange = function(val, min, max) {
    return Math.round(val <= min ? min : (val >= max ? max : val));
  };

  myBall.move = function(x, y) {
    this.pos.x += x;
    this.pos.y += y;
    console.log('Förflyttning: ' + x + ' \u00D7 ' + y);
    console.log('Ny position: ' + this.pos.x + ' \u00D7 ' + this.pos.y);
    myBall.draw();    
  }

  myBall.pushFrom = function(x, y) {
    var factor = 5,
      center = this.getCenter(),
      diff = {
        x: center.x - x,
        y: center.y - y
      };
      myBall.move(diff.x * factor, diff.y * factor);
  }


  // add event listener
  myBall.elem.addEventListener('click', function (event) {
    console.log('Klick: ' + event.pageX + ' \u00D7 ' + event.pageY);
    console.log('Center: ' + myBall.getCenter().x + ' \u00D7 ' + myBall.getCenter().y);
    myBall.pushFrom(event.pageX, event.pageY);
    // myBall.move(Rcus.random(-100, 100), Rcus.random(-100, 100));
  });


  // here we go!
  myBall.init();

  console.log('Bollen är i rullning. Eller?');  
  
});
