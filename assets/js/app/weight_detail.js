socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshWeight'){
       load_weight_detail();
    }
});
$(document).ready(function() {
    load_weight_detail(); 
});
function load_weight_detail()
{
    var racecardid = getUrlParameter("racecardid");
    
    $.ajax({
            type:"POST",
            url: "../home_controller/load_weight_detail",
            dataType:"text",
            data: {
                    racecardid: racecardid
                    },
            cache:false,
            success:function (data) {
                load_weight_detail_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}
function load_weight_detail_Complete(data)
{
    var sRes = JSON.parse(data);
     $("#spanraceno").html(sRes.raceno);
     $("#spancountry").html(sRes.country);
     $("#spandate").html(sRes.dd_mm_yyyy);
     $("#spandayofweek").html(sRes.dayofweek);
     $("#tbody_res").html(sRes.str_res);
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