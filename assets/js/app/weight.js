socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshWeight'){
       loadweight();
    }
});
$(document).ready(function() {
    loadweight(); 
});

function loadweight(){
    $.ajax({
            type:"POST",
            url: "../home_controller/loadweight",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                loadweight_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function loadweight_Complete(data){
    var sRes = JSON.parse(data);
    $("#tbllistweight").html(sRes.str_res);
}
