socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshResult'){
       loadresult();
    }
});
$(document).ready(function() {
    loadresult(); 
});

function loadresult(){
    $.ajax({
            type:"POST",
            url: "../home_controller/loadresult",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                loadresult_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function loadresult_Complete(data){
    var sRes = JSON.parse(data);
    $("#tbllistresult").html(sRes.str_res);
}
