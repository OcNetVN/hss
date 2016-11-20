$(document).ready(function() {
    nodejs_auto_call_f5(); 
});

function nodejs_auto_call_f5(){
    socket.emit('RefreshF5', "F5");
    //alert("dffsdf");return;
}