// Set some variables
var port = 8180;
var clients = [];

 
// Require the modules we need
var http = require('http');
var WebSocketServer = require('websocket').server;


// Create a http server with a callback handling all requests
var httpServer = http.createServer(function(request, response) {
  response.writeHead(200, {'Content-type': 'text/plain'});
  response.end('Hello world, says matg12\n');
  outputLog('Received request for ' + request.url);
}).listen(port, function() {
  outputLog('HTTP server is listening on port ' + port);
});


// Create an object for the websocket
// https://github.com/Worlize/WebSocket-Node/wiki/Documentation
wsServer = new WebSocketServer({
  httpServer: httpServer
});


// Create a callback to handle each connection request
wsServer.on('request', function(request) {

  // Make sure we only accept requests from an allowed origin
  if (!originIsAllowed(request.origin)) {
    request.reject();
    outputLog('Rejected: ' + request.origin);
    return;
  }

  // Accept connection under the chat-protocol
  var connection = request.accept('chat-protocol', request.origin);
  connection.id = clients.push(connection) - 1;
  outputLog('Connection accepted from ' + request.origin + ', id = ' + connection.id);

  // Callback to handle each message from the client
  connection.on('message', function(message) {
    outputLog('Recived from id ' + connection.id + ': ' + message.utf8Data);
    var d = message.utf8Data.match(/([^:]*)\:(.*)/),
      action = d[1],
      msg = d[2];

    switch (action) {
      case 'nick':
        var nick = htmlEntities(msg);
        if (restrictedChars(nick)) {
          send(connection, 'nickError:Chattnamnet innehåller otillåtna tecken.');
        }
        else if (nickExists(nick)) {
          send(connection, 'nickError:Chattnamnet är upptaget.');
        }
        else {
          setNick(connection, nick);
        }
        break;
      case 'text':
        broadcast(connection, htmlEntities(msg));
        break;
      default:
    }
  });
  
  // Callback when client closes the connection
  connection.on('close', function(reasonCode, description) {
    clients[connection.id] = null;
    broadcastGuests();
    outputLog('Peer ' + connection.remoteAddress + ' disconnected, id = ' + connection.id);
  });

});


// Broadcast message
function broadcast(sender, msg) {
  var counter = 0;
  for(var i=0; i<clients.length; i++) {
    if(clients[i] && clients[i].hasOwnProperty('nick')) {
      counter++;
      send(clients[i], 'text:' + sender.nick + ': ' + msg, false);
    }
  }
  outputLog('Broadcasted from id ' + sender.id + ' to ' + counter + ' clients: ' + msg);
}


// Broadcast guests
function broadcastGuests() {
  var guests = [],
    counter = 0;
  for(var i=0; i<clients.length; i++) {
    if(clients[i] && clients[i].hasOwnProperty('nick')) {
      guests.push(clients[i].nick);
    }
  }
  for(var i=0; i<clients.length; i++) {
    if(clients[i] && clients[i].hasOwnProperty('nick')) {
      counter++;
      send(clients[i], 'guests:' + guests.join('|'), false);
    }
  }
  outputLog('Broadcasted guestnicks to ' + counter + ' clients');
}


// Send to client
function send(client, msg, log) {
  client.sendUTF(msg);
  if (!(log === false)) {
    outputLog('Sent to id ' + client.id + ': ' + msg);
  }
}


// Always check and explicitly allow the origin
function originIsAllowed(origin) {
  if(origin === 'http://www.student.bth.se' || origin === 'http://javascript.bth.web') {
    return true;    
  }
  return false;
}


// Avoid injections
function htmlEntities(str) {
  return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&apos;');
}


// Check if string contains restricted chars
function restrictedChars(str) {
  return /[|]/.test(str);
}


// Check if nick exists
function nickExists(nick) {
  for (var i = 0; i < clients.length; i++) {
    if (clients[i] && clients[i].hasOwnProperty('nick') && clients[i].nick === nick) {
      return true;
    }
  }
  return false;
}


// Set nickname
function setNick(client, nick) {
  client.nick = nick;
  send(client, 'nick:' + nick);
  broadcastGuests();
}


// Add the message to the log
function outputLog(msg) {
  console.log((new Date()).toLocaleString() + ' ' + msg);
}

