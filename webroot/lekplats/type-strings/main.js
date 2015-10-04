/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';
  var str, out, rem,
    elem = document.getElementById('strings');

  out = function (e, s, p) {
    e.innerHTML += (e.innerHTML === '') ? '' : '<br>\n';
    e.innerHTML += s;
    e.innerHTML += (p === 'length') ? ' (' + s.length + ')' : '';
    e.innerHTML += (p === 'typeof') ? ' (typeof = ' + typeof s + ')' : '';
  }

  str = 'Copyright \u00A9 by XXX';
  out(elem, str);

  str += ' Marcus Törnroth ';
  out(elem, str);

  str += 1942;
  out(elem, str);

  str += '.';
  out(elem, str, 'length');

  rem = 'XXX ';
  str = str.substr(0, str.search(rem)) + str.substr(str.search(rem) + rem.length);
  // I uppgiften skulle vi använda substrängar, annars föredrar jag:
  // str = str.replace(rem, '');
  out(elem, str, 'length');

  str = '19' + '42';
  out(elem, str, 'typeof');

  str = '19' + 42;
  out(elem, str, 'typeof');

  str = 19 + 42;
  out(elem, str, 'typeof');

  str = 19 + '42';
  out(elem, str, 'typeof');


  console.log('Då ska allt vara utskrivet!');  
});
