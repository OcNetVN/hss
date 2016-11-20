socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    var detail   = PageRefresh.detail;
    var header   = PageRefresh.header;
    var RaceID   = PageRefresh.raceID;
    var raceid = getUrlParameter("raceid");
    if(message == 'RefreshRaceCard')
    {
       if(RaceID == raceid)
       load_node_horseinfo(list,detail,header);
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

function loadhorseinfo_Complete(data)
{
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

function load_node_horseinfo(list,detail,header)
{
    var str_res="";
    $("#tbl_listhorse").html("");
    
    if(list.length > 0)
    {
        str_res += '<tr style="font-size:13px;">';
        str_res += '<td width="3%"  align="center"><strong>'+header["horNo"]+'</strong></td>';
        str_res += '<td width="8%"  align="center"><strong>'+header["horcl"]+'</strong></td>';
        str_res += '<td width="8%"  align="center"><strong>'+header["horlfr"]+'</strong></td>';
        str_res += '<td width="12%" align="center"><strong>'+header["horHna"]+'</strong></td>';
        str_res += '<td width="12%" align="center"><strong>'+header["horjk"]+'</strong></td>';
        str_res += '<td width="3%"  align="center"><strong>'+header["horbr"]+'</strong></td>';
        str_res += '<td width="3%"  align="center"><strong>'+header["horrtg"]+'</strong></td>';
        str_res += '<td width="3%"  align="center"><strong>'+header["horwt"]+'</strong></td>';
        str_res += '<td width="3%"  align="center"><strong>'+header["horhcp"]+'</strong></td>';
        str_res += '<td width="15%" align="center"><strong>'+header["hortrain"]+'</strong></td></tr>'; 
        str_res += '<tr bgcolor="#FFF" style="font-size:16px;color:black;font-weight:bold;">';
        str_res +='<td colspan="10" align="center">'+detail+'</td>';
        str_res += '</tr>';              
        for(var i=0;i<list.length;i++)
        {
            if(list[i]["horseNo"] != "" )
            {
                var color = "";
                if(list[i]["color"] != "" || list[i]["color"] != "SCR")
                    color = '<img width=\'100%\' src="'+list[i]["color"]+'">';
                str_res += '<tr style="font-size:10px;">';
                str_res +=  '<td width="5%" align="center">'+list[i]["horseNo"]+'</td>';
                str_res += '<td width="8%" align="center">'+color+'</td>';
                str_res += '<td width="8%" align="center">'+list[i]["past"]+'</td>';
                str_res += '<td width="12%" align="center" style="font-size:11px;">'+list[i]["horseName"]+'</td>';
                str_res += '<td width="12%" align="center" style="font-size:11px;">'+list[i]["jocket"]+'</td>';
                str_res +=  '<td width="3%" align="center">'+list[i]['br']+'</td>';
                str_res += '<td width="3%" align="center">'+list[i]['rtg']+'</td>';
                str_res += '<td width="3%" align="center">'+list[i]['wt']+'</td>';
                str_res += '<td width="3%" align="center">'+list[i]['hcp']+'</td>';
                str_res += '<td width="15%" align="center" style="font-size:11px;">'+list[i]['traniner']+'</td></tr>';
            }
        }
    }

    $("#tbl_listhorse").html(str_res);
}