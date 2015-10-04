/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  // Set some variables
  var r = {},
    highlighted, winNumber,
    delay = 500,
    colors = ['green', 'black', 'red'],
    colors_sv = ['Grön', 'Svart', 'Röd'],
    table = [0,2,1,2,1,2,1,2,1,2,1,1,2,1,2,1,2,1,2,2,1,2,1,2,1,2,1,2,1,1,2,1,2,1,2,1,2],
    flash = document.getElementById('flash'),
    board = document.getElementById('board'),
    bankroll = document.getElementById('bankroll'),
    bet = document.getElementById('bet'),
    color = document.getElementById('color'),
    button = document.getElementById('button'),
    output = document.getElementById('output');


  // Init
  r.init = function() {
    r.drawBoard();
    button.onclick = r.martingale;
  };


  // Functions
  r.drawBoard = function() {
    for (var i = 0; i < table.length; i++) {
      var e = document.createElement('div');
      e.className = 'bg' + colors[table[i]];
      e.innerHTML = i;
      board.appendChild(e);
    };
    flash.style.height = (board.offsetHeight + 20) + 'px';
  };

  r.highlight = function(i, save) {
    if (highlighted) {
      board.children[highlighted].classList.remove('highlight');
      highlighted = false;
    }
    board.children[i].classList.add('highlight');
    if (save) {
      highlighted = i;
    }
    else {
      window.setTimeout(function() {
        board.children[i].classList.remove('highlight');
      }, Math.floor(0.8 * delay));
    }
    return i;
  };

  r.martingale = function() {
    var readyToSpin = true;

    var round = function() {
      if (readyToSpin) {
        r.spin();
        spinning(true);
      }
      if (typeof winNumber === 'number') {
        if (parseInt(color.value, 10) === table[winNumber]) {
          spinning(false);
          bankroll.value = parseInt(bankroll.value, 10) + parseInt(bet.value, 10);
          bet.value = 10;
          color.value = -1 * (color.value - 3);
          r.out('Du vann. Grattis!');
          return;
        }
        else {
          r.out('Du förlorade.');
          bankroll.value -= bet.value;
          if (parseInt(bankroll.value, 10) === 0) {
            r.out('Pengarna är slut, dags att gå hem...');
            return;
          }
          bet.value = bet.value*2;
          if (parseInt(bankroll.value, 10) < parseInt(bet.value, 10)) {
            r.out('Satsar rubbet.');
            bet.value = bankroll.value;
          }
          else {
            r.out('Ny insats: ' + bet.value);
          }
          r.spin();
        }
      }
      window.setTimeout(round, delay);
    };

    var spinning = function(bool) {
      readyToSpin = !bool;
      bet.readOnly = color.disabled = button.disabled = bool;
      if (bool) {
        winNumber = null;
      }
    };

    round();
  };

  r.out = function(s, p) {
    if (p) {
      output.insertBefore(document.createElement('p'), output.firstChild);
    }
    output.firstChild.innerHTML += s + ' ';
  };

  r.spin = function () {
    var number,
      step = 0,
      steps = Rcus.random(3, 8);

    var done = function() {
      winNumber = number;
      r.out('Stannar på <span class="' + colors[table[number]] + '"">' + colors_sv[table[number]] + ' ' + number + '</span>.');
    };

    var spin = function() {
      step += 1;
      number = r.highlight(Rcus.random(0, table.length-1), (step === steps));
      if (step === steps) {
        window.setTimeout(done, delay);
      }
      else {
        window.setTimeout(spin, delay);
      }
    };

    r.out('Kulan snurrar...', true);
    winNumber = null;
    spin();
  };


  // Here we go!
  r.init();


  // Done
  console.log('Okey, då satsar vi...');
});
