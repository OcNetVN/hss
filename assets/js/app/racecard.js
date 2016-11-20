socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshRaceCard'){
       loadracecard();
    }
});
$(document).ready(function() {
    loadracecard(); 
});

function loadracecard(){
    $.ajax({
            type:"POST",
            url: "../home_controller/loadracecard",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                loadracecard_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}

function loadracecard_Complete(data){
    var sRes = JSON.parse(data);
    $("#tbllistracecard").html(sRes.str_res);
}
