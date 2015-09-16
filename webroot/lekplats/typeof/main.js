/**
 * Print literals with their type.
 */
$(document).ready(function(){
  'use strict';
  var rows = '',
    list = document.getElementById('list'),
    literals = [42, 4.2, "hello world", 'hej', true, false, null, undefined, /javascript/, {x:1,y:2}, [1,2,3,4,5],
      ['array-item', 'array-item'], function(){}],
    prnt = function (a) {
      // quotes if it is a string
      if (typeof a === 'string') {
        return '"' + a + '"';
      }

      // brackets if it is an array
      if (Object.prototype.toString.apply(a) === '[object Array]') {
        return '[' + a.join(', ') + ']';
      }

      // braces if it is an object
      if (Object.prototype.toString.apply(a) === '[object Object]') {
        var obj = '';
        for (var prop in a) {
          obj += prop + ': ' + a[prop] + '; ';
        }
        return '{' + obj.slice(0,obj.length-2) + '}';
      }

      // or return as it is
      return a;
    }

  for (var i=0; i<literals.length; i++) {
    var str = 
    rows += '<li>' + prnt(literals[i]) + ": " + typeof(literals[i]) + '</li>';
  };

  list.innerHTML = rows;

  console.log('Färdig :)');  
});
