socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'RefreshWeight')
    {
       load_nodejs_weight(list);
    }
});

$(document).ready(function() 
{
    loadweight(); 
});

function loadweight(){
    $.ajax({
            type:"POST",
            url: "../home_controller/loadweight",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                loadweight_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function loadweight_Complete(data)
{
    var sRes = JSON.parse(data);
    var  list = sRes;
    $("#tbllistweight").html("");
    var str_res = "";
    for(var i = 0 ; i < list.length;i++)
    {
        str_res +='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: Large; vertical-align: middle;">';
        str_res += '<tr>';
        str_res += '<td>';
        str_res += '<div style="margin: 5px; border:1px solid #000; padding:0px 5px;">';
        str_res += '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        str_res += '<tr>';
        str_res += '<td width="5%"><input type="image" title="" src="'+ GetBaseUrl() +'assets/img/app/flag/'+ list[i]["flag"] + '"></td>';
        str_res += '<td width="45%">'+list[i]["country"]+'</td>';
        str_res += '<td width="35%" align="right">'+ list[i]["day_race"] +'</td>';
        str_res += '<td width="15%" align="right">';
        str_res += '<a href="weight_choose?country='+list[i]["racecountry"]+'&day='+list[i]["raceday"]+'" style="text-decoration: none;">';
        str_res += '<input type="image" name="" id="" title="Next" src="'+ GetBaseUrl() +'assets/img/app/btn-next.png">';
        str_res += '</a>';
        str_res += '</td>';
        str_res += '</tr>';
        str_res += '</table>';
        str_res += '</div>';
        str_res += '</td>';
        str_res += '</tr>';
        str_res += '</table>';
    }
    $("#tbllistweight").html(str_res);
}

function load_nodejs_weight(list)
{
    $("#tbllistweight").html("");
    var str_res = "";
    for(var i = 0 ; i < list.length;i++)
    {
        str_res +='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: Large; vertical-align: middle;">';
        str_res += '<tr>';
        str_res += '<td>';
        str_res += '<div style="margin: 5px; border:1px solid #000; padding:0px 5px;">';
        str_res += '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        str_res += '<tr>';
        str_res += '<td width="5%"><input type="image" title="" src="'+ GetBaseUrl() +'assets/img/app/flag/'+ list[i]["flag"] + '"></td>';
        str_res += '<td width="45%">'+list[i]["country"]+'</td>';
        str_res += '<td width="35%" align="right">'+ list[i]["day_race"] +'</td>';
        str_res += '<td width="15%" align="right">';
        str_res += '<a href="weight_choose?country='+list[i]["racecountry"]+'&day='+list[i]["raceday"]+'" style="text-decoration: none;">';
        str_res += '<input type="image" name="" id="" title="Next" src="'+ GetBaseUrl() +'assets/img/app/btn-next.png">';
        str_res += '</a>';
        str_res += '</td>';
        str_res += '</tr>';
        str_res += '</table>';
        str_res += '</div>';
        str_res += '</td>';
        str_res += '</tr>';
        str_res += '</table>';
    }
    $("#tbllistweight").html(str_res);
}

function GetBaseUrl() 
{
   var l    = window.location;
   var url  = l.protocol + "//" + l.host + "/" ;
   return url  
}
