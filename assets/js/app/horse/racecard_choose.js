socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshRaceCard'){
       loadracecard_by_country_day();
    }
});
$(document).ready(function() {
    loadracecard_by_country_day(); 
});

function loadracecard_by_country_day(){
    var country_url = getUrlParameter("country");
    if(country_url =="" || country_url==null)
        country_url = "MY";
	var day = getUrlParameter("day");
    
    $.ajax({
            type:"POST",
            url: "../home_controller/loadracecard_by_country_day",
            dataType:"text",
            data: {
                    country: country_url,
                    day: day
                    },
            cache:false,
            success:function (data) {
                loadracecard_by_country_day_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}

function loadracecard_by_country_day_Complete(data){
    var sRes = JSON.parse(data);
    $("#tdlistrace").html(sRes.str_res);
    $("#trcountrysee").html(sRes.str_countrysee);
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