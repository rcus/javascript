/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var url = 'ws://userv:8180/',
    websocket, nick;


  // Connect to websocket-server
  console.log('Ansluter till: ' + url);
  if(websocket) {
    websocket.close();
    websocket = null;
  }
  websocket = new WebSocket(url, 'chat-protocol');


  // On error
  websocket.onerror = function() {
    outputLog('Ajdå, tekniska problem. Försök igen senare. :(');
  }


  // On connection
  websocket.onopen = function() {
    outputLog('Du är nu ansluten till servern. Ange ditt chattnamn.');
    setNick();
  }


  // On message from server
  websocket.onmessage = function(event) {
    console.log('Från servern: ' + event.data);
    var d = (event.data).match(/([^:]*)\:(.*)/),
      action = d[1],
      msg = d[2];

    switch (action) {
      case 'nick':
        nick = msg;
        outputLog('Hej <strong>' + msg + '</strong>! Nu är det bara att chatta!');
        enableWriting();
        break;
      case 'nickError':
        outputLog('Oj, det blev fel. ' + msg + ' Försök igen.');
        setNick();
        break;
      case 'guests':
        updateGuests(msg);
        break;
      case 'text':
        outputLog(msg);
        break;
      default:
        console.log('Förstår inte kommandot "' + action + '" med texten "' + msg + '"');
    }
  }


  // Websocket closes
  websocket.onclose = function() {
    disableWriting();
    console.log('Websocket är nu avslutad.');
    console.log(websocket);
    outputLog('Kontakten med servern avslutades. Välkommen åter!');
  }


  // Send to websocket
  function wsSend(msg) {
    if(!websocket || websocket.readyState === 3) {
      console.log('Websocket är inte ansluten till servern.');
    } else {
      console.log('Till servern: ' + msg);
      websocket.send(msg);
    }
  }


  // Asks user for a nickname
  function setNick() {
    $('#txt')
      .prop('disabled', '')
      .attr('placeholder', 'Ange chattnamn...')
      .focus()
      .keyup(function(event){
        var txt = $('#txt').val();
        if(event.keyCode === 13 && txt !== ''){
          wsSend('nick:' + txt);
          disableWriting();
        }
      });
  }


  // Update guestlist
  function updateGuests(str) {
    $('#guests').html('<p><strong>Anslutna gäster:</strong></p>');
    $.each(str.split('|'), function(i, nick) {
      $('#guests').append('<p>' + nick + '</p>');
    });
  } 


  // Enable input to send some data
  function enableWriting() {
    $('#txt')
      .prop('disabled', '')
      .attr('placeholder', 'Skriv här...')
      .focus()
      .keyup(function(event){
        var txt = $('#txt').val();
        if(event.keyCode === 13 && txt !== ''){
          wsSend('text:' + txt);
          $('#txt').val('');
        }
      });
  }


  // Disable input
  function disableWriting() {
    $('#txt')
      .off('keyup')
      .prop('disabled', 'true')
      .attr('placeholder', '')
      .val('');
  }


  // Add the message to the log
  function outputLog(msg) {
    $('#output').append('<p>' + (new Date()).toLocaleTimeString() + ' ' + msg + '</p>').scrollTop($('#output')[0].scrollHeight);
  }

});
