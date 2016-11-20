socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshScratEt'){
       load_scrat_et_detail();
    }
});
$(document).ready(function() {
    load_scrat_et_detail(); 
});

function load_scrat_et_detail(){
    var country_url = getUrlParameter("country");
	var day = getUrlParameter("day");
    
    $.ajax({
            type:"POST",
            url: "../home_controller/load_scrat_et_detail",
            dataType:"text",
            data: {
                    country: country_url,
                    day: day
                    },
            cache:false,
            success:function (data) {
                load_scrat_et_detail_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_scrat_et_detail_Complete(data){
    var sRes = JSON.parse(data);
    $("#td_country_day").html(sRes.str_country_day);
    $("#tbodyscratet").html(sRes.str_res);
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