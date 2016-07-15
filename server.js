//var app = require('express')();
var server = 'http://athleteec.razdragor.fr';
var io = require('socket.io')(server);
var redis = require('redis');
 
server.listen(8890);
io.on('connection', function (socket) {
 
  console.log("new client connected");
  var redisClient = redis.createClient();
  redisClient.subscribe('message');
  redisClient.subscribe('change_name');
  redisClient.subscribe('add_user');
 
  redisClient.on("message", function(channel, message) {
    console.log("mew message in queue "+ message + "channel");
    socket.emit(channel, message);
  });
  
  redisClient.on("change_name", function(channel, message) {
    console.log("New conv name in queue "+ message + "channel");
    socket.emit(channel, message);
  });
  
  redisClient.on("add_user", function(channel, message) {
    console.log("New user in queue"+ message + "channel");
    socket.emit(channel, message);
  });
 
  socket.on('disconnect', function() {
    redisClient.quit();
  });
 
});