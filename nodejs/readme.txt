http://socket.io/get-started/chat/

connect: 
	example:
	
		<script src="http://localhost:3000/socket.io/socket.io.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
		<script>
			   var socket = io.connect('http://localhost:3000');
			  $('form').submit(function(){
				socket.emit('chat message', $('#m').val());
				$('#m').val('');
				return false;
			  });
			  socket.on('chat message', function(msg){
				$('#messages').append($('<li>').text(msg));
			  });
		</script>
		
start: in folder have folder hae nodejs by commandline, after press node index.js(index.js is server of nodejs)
	- console log show: listening on *:3000 (3000 is port socket io)
	- when one page load, console log show: user connected

disconnect server: Ctrl + C

