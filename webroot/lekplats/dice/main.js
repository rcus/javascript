/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var str, random, mean, rollDice, out,
    elem = document.getElementById('flash');

  random = function(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  mean = function(arr) {
    return (arr.reduce(function(a,b){return a+b;}, 0)/arr.length).toFixed(1);
  }

  rollDice = function(times) {
    var serie = [], str;
    times = times || 1;
    for (var i = 0; i < times; i++) {
      serie.push(random(1,6));
    };
    str = '<b>Tärningen kastas ' + serie.length + ' gånger.</b><br>';
    str += 'Medelvärde: ' + mean(serie) + '<br>';
    str += 'Serie: ' + serie.join(', ');
    return str;
  }

  out = function (e, s) {
    e.innerHTML += '<p>' + s + '</p>';
  }

  out(elem, rollDice(6));
  out(elem, rollDice(10));
  out(elem, rollDice(100));

  console.log('Tärningen är kastad.');  
  
});
