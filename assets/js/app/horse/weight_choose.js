socket.on('PageRefresh', function(PageRefresh){
    // if(PageRefresh == 'RefreshWeight'){
    //    loadweight_by_country_day();
    // }
});
$(document).ready(function() {
    loadweight_by_country_day(); 
});

function loadweight_by_country_day(){
    var country_url = getUrlParameter("country");
    if(country_url =="" || country_url==null)
        country_url = "MY";
	var day = getUrlParameter("day");
    
    $.ajax({
            type:"POST",
            url: "../home_controller/loadweight_by_country_day",
            dataType:"text",
            data: {
                    country: country_url,
                    day: day
                    },
            cache:false,
            success:function (data) {
                loadweight_by_country_day_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function loadweight_by_country_day_Complete(data){
    var sRes = JSON.parse(data);
    $("#tdlistrace").html("");
    $("#trcountrysee").html("");
    var str_race = "";
    var str = "";
    str_race += '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
    str_race += '<tr>';
    str_race += '<td width="5%" align="left">';
    str_race += '<input type="image" title="" src="'+ GetBaseUrl() +'assets/img/app/flag/'+ sRes.flag_country + '"></td>';
    str_race += '<td width="28%" align="left">'+ sRes.country + '</td>';
    str_race += '<td width="33%" align="center">'+ sRes.show_date +'</td>';
    str_race += '<td width="33%" align="right" style="padding-right: 15px;">'+ sRes.week + '</td>';
    str_race += '</tr>';
    str_race += '</table>';
    $("#trcountrysee").html(str_race);
    var arr_weight = sRes.arr_weight;
    str += "<center>";
    for(var i=0; i < arr_weight.length;i++)
    {
        str += '<a href="weight_detail?racecardid='+arr_weight[i]["RaceID"]+'">'+ arr_weight[i]["ShowRace"] +'</a><br />';
    }
    str += "</center>";

    $("#tdlistrace").html(str);
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

function GetBaseUrl() 
{
   var l    = window.location;
   var url  = l.protocol + "//" + l.host + "/" ;
   return url  
}