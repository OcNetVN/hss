// Setup basic express server
// npm install socket.io
// npm install express
var express_push = require('express');
var app_push = express_push();
var server_push = require('http').createServer(app_push);
var io_push = require('socket.io')(server_push);
var port_push = process.env.PORT || 1337;

server_push.listen(port_push, function () {
  console.log('Server listening at port %d', port_push);
});
// Routing
app_push.use(express_push.static(__dirname + '/public'));

io_push.on('connection', function (socket_push) {
	
  socket_push.on('RefreshNotification', function (data) {
    io_push.emit('RefreshNotification',data);
	console.log("Data "+data);
  });
  // when the user disconnects.. perform this
  socket_push.on('disconnect', function () {});
});