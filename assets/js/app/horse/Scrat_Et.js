socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshScratEt'){
       load_scrat_et();
    }
});
$(document).ready(function() {
    load_scrat_et(); 
});

function load_scrat_et(){
    $.ajax({
            type:"POST",
            url: "../home_controller/load_scrat_et",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                load_scrat_et_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_scrat_et_Complete(data){
    var sRes = JSON.parse(data);
    $("#tbllistscrat_et").html(sRes.str_res);
}
