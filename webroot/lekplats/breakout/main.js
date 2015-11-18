/**
 * Place your JS-code here.
 */

// requestAnimationFrame/cancelAnimationFrame fallback
// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          window.oRequestAnimationFrame      ||
          window.msRequestAnimationFrame     ||
          function(callback){
            window.setTimeout(callback, 1000 / 60);
          };
})();
window.cancelRequestAnimFrame = (function(){
  return  window.cancelRequestAnimationFrame       ||
          window.webkitCancelRequestAnimationFrame ||
          window.mozCancelRequestAnimationFrame    ||
          window.oCancelRequestAnimationFrame      ||
          window.msCancelRequestAnimationFrame     ||
          window.clearTimeout;
})();


// Trace the keys pressed
// http://nokarma.org/2011/02/27/javascript-game-development-keyboard-input/index.html
window.Key = {
  pressed: {},

  LEFT:   37,
  RIGHT:  39,
  SPACE:  32,
  
  isDown: function(keyCode) {
    return this.pressed[keyCode];
  },

  onKeydown: function(event) {
    this.pressed[event.keyCode] = true;
  },

  onKeyup: function(event) {
    delete this.pressed[event.keyCode];
  }
}
window.addEventListener('keyup', function(event) {
  Key.onKeyup(event);
});
window.addEventListener('keydown', function(event) {
  if (event.keyCode == Key.SPACE && event.target == document.body) {
    event.preventDefault();
  }
  Key.onKeydown(event);
});


// Vectors as objects
function Vector(x, y) {
  this.x = x || 0;
  this.y = y || 0;
}

Vector.prototype = {
  muls: function (scalar) {
    return new Vector(this.x * scalar, this.y * scalar);
  },

  imuls: function (scalar) {
    this.x *= scalar;
    this.y *= scalar;
    return this;
  },

  adds: function (scalar) {
    return new Vector(this.x + scalar, this.y + scalar);
  },

  iadd: function (vector) {
    this.x += vector.x;
    this.y += vector.y;
    return this;
  }
}


// A brick as an object
function Brick(size, position, color, points) {
  this.size = size;
  this.position = position;
  this.color = color;
  this.points = points;
}

Brick.prototype = {
  draw: function(ct) {
    ct.save();
    ct.translate(this.position.x, this.position.y);
    ct.beginPath();
    ct.fillStyle = this.color;
    ct.fillRect(0, 0, this.size.x, this.size.y);
    ct.stroke();
    ct.lineWidth = '1';
    ct.strokeStyle = 'black';
    ct.rect(0, 0, this.size.x, this.size.y);
    ct.stroke();
    ct.restore();
  }
}


// Set of bricks as an object
function Bricks(gamearea, bricks, colors) {
  this.gamearea = gamearea;
  this.bricks = bricks;
  this.colors = colors;
  this.size = new Vector(this.gamearea.x / this.bricks, 20);
  this.brickBottom = this.gamearea.y / 3;
  this.init();
}

Bricks.prototype = {
  init: function() {
    this.lineUp = [];
    for (var i = 0; i < this.colors.length; i++) {
      for (var j = 0; j < this.bricks; j++) {
        this.lineUp.push(new Brick(this.size, this.calcPosition(i, j), this.colors[i], this.calcPoints(i)));
      };
    };
  },

  calcPoints: function(i) {
    return 2 * i + 1;
  },

  calcPosition: function(i, j) {
    return new Vector(this.size.x * j, this.brickBottom - (this.size.y * i))
  },

  draw: function(ct) {
    for (var i = 0; i < this.lineUp.length; i++) {
      this.lineUp[i].draw(ct);
    };
  },

  hit: function(idx, status) {
    var points = this.lineUp[idx].points;
    this.lineUp.splice(idx, 1);
    status.hitsBrick(points, this.lineUp.length);
  }
}


// The paddle as an object
function Paddle(gamearea, size) {
  this.gamearea = gamearea;
  this.size = size;
  this.step = 10;
  this.reset();
}

Paddle.prototype = {
  draw: function(ct) {
    ct.save();
    ct.translate(this.position.x, this.position.y);
    ct.beginPath();
    ct.fillStyle = 'red';
    ct.fillRect(0, 0, this.size.x, this.size.y);
    ct.stroke();
    ct.restore();
  },

  reset: function() {
    this.position = new Vector((this.gamearea.x - this.size.x) / 2, this.gamearea.y - this.size.y);
  },

  update: function() {
    if (Key.isDown(Key.LEFT) && (this.position.x >= this.step)) {
      this.position.x -= this.step;
    }
    else if (Key.isDown(Key.RIGHT) && (this.position.x <= this.gamearea.x - this.size.x - this.step)) {
      this.position.x += this.step;
    }
  },

  ballBounce: function(ballX) {
    var diff = ballX - (this.position.x + this.size.x / 2),
      fifth = (this.size.x / 5) / 2;

    if (diff <= -fifth) {
      return -1;
    }
    if (diff >= fifth) {
      return 1;
    }
    return 0;
  }

}


// The ball as an object
function Ball(gamearea, velocity) {
  this.gamearea = gamearea;
  this.velocity = velocity;
  this.radius = 5;
  this.reset();
}

Ball.prototype = {
  draw: function(ct) {
    ct.save();
    ct.translate(this.position.x, this.position.y);
    ct.beginPath();
    ct.fillStyle = 'white';
    ct.arc(0, 0, this.radius, 0, 2 * Math.PI);
    ct.closePath();
    ct.fill();    
    ct.restore();
  },

  reset: function() {
    this.position = new Vector(this.gamearea.x / 2, this.gamearea.y - 30);
  },

  collide: function (rect) {
    var xy = function(x) {
      return x ? 'x' : 'y';
    };
    var yx = function(y) {
      return y ? 'y' : 'x';
    };

    obj = new Vector(rect.position.x + (this.velocity.x < 0 ? rect.size.x : 0), rect.position.y + (this.velocity.y < 0 ? rect.size.y : 0));

    for (var i = 0; i <= 1; i++) {
      if (this.position[xy(i)] > rect.position[xy(i)] && this.position[xy(i)] < rect.position[xy(i)] + rect.size[xy(i)] && 
          Math.abs(this.position[yx(i)] - obj[yx(i)]) <= this.radius) {
        this.velocity[yx(i)] *= -1;
        return true;
      }
    }
    return false;
  },

  update: function(paddle, bricks, status) {
    // Check if ball..
    // .. hits wall on left or right side
    if (this.position.x + this.velocity.x < this.radius || this.position.x + this.velocity.x + this.radius  > this.gamearea.x) {
      this.velocity.x *= -1;
    }
    // .. hits wall on the top
    if (this.position.y + this.velocity.y < this.radius) {
      this.velocity.y *= -1;
    }
    // .. goes out at bottom
    if (this.position.y + this.velocity.y + this.radius > this.gamearea.y) {
      this.velocity.y *= -1;
      status.ballOut();
      this.reset();
      paddle.reset();
    }

    // .. hits paddle, but only at bottom of canvas
    if (this.position.y > (this.gamearea.y - paddle.size.y * 2)) {
      if (this.collide(paddle)) {
        this.velocity.x = Rcus.random(1, 5) * paddle.ballBounce(this.position.x);
      }
    }

    // .. hits a brick, but only at upper third of canvas
    if (this.position.y < (bricks.brickBottom + bricks.size.y)) {
      for (var i = 0; i < bricks.lineUp.length; i++) {
        if (this.collide(bricks.lineUp[i])) {
          // status.hitsBrick(bricks.lineUp.length, bricks.lineUp[i].points);
          bricks.hit(i, status);
          break;
        }
      }
    }
    this.position.iadd(this.velocity);
  }
}


// Even the status of the game as an object
function Status(gamearea, lifes) {
  this.gamearea = gamearea;
  this.lifes = lifes;
  this.score = 0;
  this.alive = false;
  this.gameover = false;
  this.msg = 'Press SPACE';
  this.update();
}

Status.prototype = {
  draw: function(ct) {
    ct.save();
    ct.fillStyle = 'white';
    ct.font = '14px monospace';
    ct.textAlign = 'left';
    ct.fillText(this.info, 10, 20); 

    if (this.msg) {
      ct.font = '36px monospace';
      ct.textAlign = 'center';
      ct.fillText(this.msg, this.gamearea.x / 2, this.gamearea.y / 2); 
    }
    ct.restore();
  },

  update: function() {
    this.info = '❤ ' + this.lifes + '  ' + this.score;
  },

  waiting: function() {
    if (Key.isDown(Key.SPACE)) {
      if (this.gameover) {
        Breakout.init();
      }
      this.alive = true;
      this.msg = null;
    }
  },

  hitsBrick: function(points, rem) {
    this.score += points;
    this.update();
    if (!rem) {
      this.alive = false;
      this.gameover = true;
      this.msg = 'YOU WON - Press SPACE';
    }
  },

  ballOut: function(action) {
    this.alive = false;
    if (this.lifes) {
      this.lifes -= 1;
      this.msg = 'Press SPACE';
      this.update();
    }
    else {
      this.gameover = true;
      this.msg = 'GAME OVER - Press SPACE';
    }
  }
}

// The Breakout game
window.Breakout = (function(){
  var canvas,
    ct,
    gamearea,
    bricks,
    paddle,
    ball,
    status,
    lastGameTick;

  var init = function() {
    canvas = document.getElementById('breakout');
    canvas.border = 10;
    ct = canvas.getContext('2d');
    ct.lineWidth = 1;
    gamearea = new Vector(canvas.width - (2 * canvas.border), canvas.height - canvas.border);
    bricks = new Bricks(gamearea, 11, ['blue', 'limegreen', 'gold', 'goldenrod', 'orange', 'orangered']);
    paddle = new Paddle(gamearea, new Vector(120, 20));
    ball = new Ball(gamearea, new Vector(0, 5));
    status = new Status(gamearea, 3);
    render();
    gameLoop();
  };

  var update = function(td) {
    paddle.update();
    ball.update(paddle, bricks, status);
  };

  var render = function() {
    ct.fillStyle = 'red';
    ct.fillRect(0, 0, canvas.width, canvas.height);
    ct.translate(canvas.border, canvas.border);
    ct.fillStyle = 'black';
    ct.fillRect(-1, -1, canvas.width - ((canvas.border - 1) * 2), canvas.height - (canvas.border - 1));
    ct.stroke();
    paddle.draw(ct);
    bricks.draw(ct);
    ball.draw(ct);
    status.draw(ct);
    ct.translate(-canvas.border, -canvas.border);
  };

  var gameLoop = function() {
    var now = Date.now();
    td = (now - (lastGameTick || now)) / 1000;
    lastGameTick = now;
    requestAnimFrame(gameLoop);
    if (status.alive) {
      update(td);
      render();
    }
    else {
      status.waiting();
    }
  };

  return {
    'init': init
  }
})();



// Start the game when start button is clicked
$(function () {
  'use strict';

  Breakout.init();
  
  console.log('Time to Breakout!');
}); 
