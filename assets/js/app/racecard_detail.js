socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshRaceCard'){
       loadhorseinfo();
    }
});
$(document).ready(function() {
    loadhorseinfo(); 
});

function loadhorseinfo(){
    var raceid = getUrlParameter("raceid");
    
    $.ajax({
            type:"POST",
            url: "../home_controller/loadhorseinfo",
            dataType:"text",
            data: {
                    raceid: raceid
                    },
            cache:false,
            success:function (data) {
                loadhorseinfo_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}

function loadhorseinfo_Complete(data){
    var sRes = JSON.parse(data);
    $("#tbl_listhorse").html(sRes.str_res);
}
function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}