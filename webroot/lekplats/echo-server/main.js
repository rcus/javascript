/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  var url = 'ws://dbwebb.se:1337/',
    urls = ['ws://dbwebb.se:1337/', 'ws://nodejs1.student.bth.se:8179/', 'ws://nodejs2.student.bth.se:8179/', 'ws://userv:8179/'],
    websocket,
    form = $('#echo-form'),
    output = $('#output');

  // Display the url in form field for the user to change
  $('#connect_url').val(url);
  $.getScript('//code.jquery.com/ui/1.11.4/jquery-ui.js', function() {
    $('#connect_url').autocomplete({ source: urls });
  });

  // Event handler to create the websocket connection
  $('#connect').on('click', function(event) {
    url = $('#connect_url').val();
    console.log('Ansluter till: ' + url);
    websocket = new WebSocket(url, 'echo-protocol');

    websocket.onopen = function() {
      console.log('Websocket är nu igång.');
      console.log(websocket);
      outputLog('Websocket är nu igång.');
    }

    websocket.onmessage = function(event) {
      console.log('Tagit emot meddelande: ' + event.data);
      console.log(event);
      console.log(websocket);
      outputLog('Servern: ' + event.data);
    }

    websocket.onclose = function() {
      console.log('Websocket är nu avslutad.');
      console.log(websocket);
      outputLog('Websocket är nu avslutad.');
    }
  });


  // Add the message to the log
  function outputLog(message) {
    var now = new Date();
    $(output).append(now.toLocaleTimeString() + ' ' + message + '<br/>').scrollTop(output[0].scrollHeight);
  }


  // Send a message to the server
  $('#send_message').on('click', function(event) {
    var msg = $('#message').val();

    if(!websocket || websocket.readyState === 3) {
      console.log('Websocket är inte ansluten till servern.');
    } else {
      websocket.send(msg);      
      outputLog('Du: ' + msg);
    }
  });


  // Close the connection to the server
  $('#close').on('click', function() {
    console.log('Stänger websocket');
    websocket.send('Client closing connection by intention.');
    websocket.close();
    console.log(websocket);
  });

  console.log('Jasså, säger du?');  
});
