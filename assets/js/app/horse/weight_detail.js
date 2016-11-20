socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var RaceID  = PageRefresh.RaceID;
    var l_weight = PageRefresh.l_weight;
    var RaceIDcurrent = getUrlParameter("racecardid");
    if(message == 'RefreshWeight')
    {
       if(RaceID == RaceIDcurrent)
         load_nodejs_detailweight(l_weight,RaceID);
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
     //$("#spanraceno").html(sRes.raceno);
     //$("#spancountry").html(sRes.country);
     $("#ShowHeader").html(sRes.country + " Horse weight");
     //$("#spandate").html(sRes.dd_mm_yyyy);
     //$("#spandayofweek").html(sRes.dayofweek);
     //$("#tbody_res").html(sRes.str_res);
     $("#tbody_res").html("");
     var arr_weight = sRes.arr_weight;
     var str = "";
     if(arr_weight.length > 0)
     {
        for(var i=0; i < arr_weight.length;i++)
        {
             str += "<tr>";
             str += "<td width=\"30%\" align=\"center\" bgcolor=\"#00a2e8\" style=\"color:white;\">"+(i+1)+"</td>";
             str += "<td width=\"35%\" align=\"center\">" + arr_weight[i]["Wgt"]+"</td>";
             str += "<td width=\"35%\" align=\"center\">" + arr_weight[i]["Hdp"]+"</td>";
             str +="</tr>";
        }
     }
     $("#tbody_res").html(str); 
}

function load_nodejs_detailweight(list,RaceID)
{
    $("#tbody_res").html("");
    $("#ShowHeader").html("");
    var l_weight = JSON.parse(list);
    var s_RaceID = RaceID;
    s_RaceID = s_RaceID.substring(0,2);
    $("#ShowHeader").html(s_RaceID + " Horse weight");
    console.log(l_weight);
    var dem = 1;
    var str = "";
    if(l_weight != null)
    {
        for(var i=0;i < 20 ;i++)
        {
            var _weight = l_weight[0][i];
            var _hcp    = l_weight[1][i];
            console.log(_weight);
            if(_weight == _hcp && _weight != " " || _weight != " " || _hcp != " ")
            {
                 str += "<tr>";
                 str += "<td width=\"30%\" align=\"center\" bgcolor=\"#00a2e8\" style=\"color:white;\">"+dem+"</td>";
                 str += "<td width=\"35%\" align=\"center\">" + _weight+"</td>";
                 str += "<td width=\"35%\" align=\"center\">" + _hcp+"</td>";
                 str +="</tr>";
                 dem++;
            }
        }
    }
    $("#tbody_res").html(str); 
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