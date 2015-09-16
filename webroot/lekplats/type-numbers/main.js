/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var num = '',
    tble = '',
    values = {
      'Eulers tal (e)': Math.E,
      'Pi': Math.PI,
      'Högsta möjliga värde': Number.MAX_VALUE,
      'Positiv oändlighet': Number.POSITIVE_INFINITY
    },
    funcValues = [42, 4.2, 12100, 0.0112, 16711935],
    funcMath = [
      {
        name: 'Exponentialform',
        func: function(a) {
          return a.toExponential();
        }
      },{
        name: 'Fixerad form, tre decimaler',
        func: function(a) {
          return a.toFixed(3);
        }
      },{
        name: 'Avrundat till närmsta heltal',
        func: function(a) {
          return Math.round(a);
        }
      },{
        name: 'Kvadratroten',
        func: function(a) {
          return Math.sqrt(a).toPrecision(5);
        }
      },{
        name: 'Sinusvärde',
        func: function(a) {
          return Math.sin(a).toPrecision(5);
        }
      }
    ],
    getTableRow = function(val) {
      var retval = '';
      for (var i = 0; i < val.length; i++) {
        retval += '<td>' + val[i] + '</td>';
      };
      return retval;
    },
    numbers = document.getElementById('numbers'),
    table = document.getElementById('table');

  // Print out some values
  for (var prop in values) {
    num += '<br>' + prop + ' = ' + values[prop];
  }
  numbers.innerHTML = num;

  // Print table for functions
  // Header
  tble += '<thead><td>Värde</td>';
  for (var i = 0; i < funcValues.length; i++) {
    tble += '<td>' + funcValues[i] + '</td>';
  };
  tble += '</thead>';

  // Body
  for (var i = 0; i < funcMath.length; i++) {
    tble += '<tr><td>' + funcMath[i].name + '</td>';
    for (var j = 0; j < funcValues.length; j++) {
      tble += '<td>' + funcMath[i].func(funcValues[j]) + '</td>';
    };
    tble += '</tr>';
  };
  table.innerHTML = tble;

  console.log('Klart!');
});
