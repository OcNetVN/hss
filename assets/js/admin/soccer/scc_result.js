var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
$(document).ready(function(){
	getAllMonth();
    load_result_view();
    $("#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_result_view();
    });
});

socket.on('SoccerTODAY',function(res)
{
    var type = res._type;
	var lang = res._lang;
	var data = res.send;
	var _lang = "";
    _lang = getUrlParameter("lang");
    if(_lang == "" || _lang == null)
        _lang = 1;
	if(type == "result")
	{
		if(_lang ==  lang)
		{
			$("#ShowListResult").html(" ");
	        $("#ShowListResult").html(data); 
	    }
	}
});

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

function  getAllMonth()
{
    var value = $("#seday").val();
    var str = "";
    var d_select = new Date();
    console.log(value);
    if(value == null)
    {
        var newdate = new Date();
        newdate.setDate(new Date().getDate() - 10);
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        var someFormattedDate = mm + '/' + dd + '/' + y;
        console.log("Ngay hien tại" + outday);
        
        for(var i=0;i< 20 ;i++)
        {
            var stardate = new Date(someFormattedDate);
            stardate.setDate(stardate.getDate()+i);
            var get_date       = (stardate.getDate() < 10 ?'0':'') + stardate.getDate() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + stardate.getFullYear();
            var arr_wendkend   = stardate.getFullYear() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + (stardate.getDate() < 10 ?'0':'') + stardate.getDate();
            var someWeekend    = isWeekend(arr_wendkend);
            if(someWeekend != 'Wed' && someWeekend !=  'Tue' && someWeekend != 'Sat' && someWeekend != 'Sun')
                someWeekend = '';
            if(get_date == outday)
              str = str + '<option value='+get_date+' " selected="selected">'+get_date +' '+someWeekend+'</option>';
            else
               str = str + '<option value='+get_date+'>'+get_date+' '+ someWeekend +'</option>'; 
        }

        $("#seday").html(str);
    }
    else
    {
         var day_choose     = value.split('-');
         var arr_datechoose = day_choose[1] + '/' + day_choose[0] + '/' + day_choose[2];
         var newdate = new Date(arr_datechoose);
         newdate.setDate(newdate.getDate()-10);
         var dd = newdate.getDate();
         var mm = newdate.getMonth() + 1;
         var y = newdate.getFullYear();
         var someFormattedDate = mm + '/' + dd + '/' + y;
         for(var i=0;i< 20 ;i++)
         {
            var stardate = new Date(someFormattedDate);
            stardate.setDate(stardate.getDate()+i);
            var get_date       = (stardate.getDate() < 10 ?'0':'') + stardate.getDate() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + stardate.getFullYear();
            //console.log(get_date);
            var arr_wendkend   = stardate.getFullYear() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + (stardate.getDate() < 10 ?'0':'') + stardate.getDate();
            var someWeekend    = isWeekend(arr_wendkend);
            if(someWeekend != 'Wed' && someWeekend !=  'Tue' && someWeekend != 'Sat' && someWeekend != 'Sun')
                someWeekend = '';
            if(get_date == output)
              str = str + '<option value='+get_date+' " selected="selected">'+get_date +' '+someWeekend+'</option>';
            else
               str = str + '<option value='+get_date+'>'+get_date+' '+ someWeekend +'</option>'; 
        }
        $("#seday").html("");
        $("#seday").html(str);
    }   
} 

function isWeekend(date)
{
    var day = new Date(date);
        showday = day.getDay();
    var l_Wek = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
    return  l_Wek[showday];   
}

function  load_result_view()
{
    var seday = $("#seday").val();
    $.ajax({
            type:"POST",
            url: "../home_controller/loadSoccerResult",
            dataType:"json",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_result_view_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_result_view_Complete(data)
{
    var lst = data.l_result;
    console.log(lst);
    var str = "";
    if(lst.length > 0)
    {
        str = str  + '<table width="100%" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse;font: 700 11px Tahoma;margin: 1px; text-align: center;">';
        str = str  + '<tr style="background-color:#4c69b8;color: #fff"><th style="line-height: 16px;4c69b8;border: 1px solid #fff;line-height: 16px;">Date & Time</th>';
        str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Event</th>';
        str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">First Half Score</th>';
        str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Full Time Score</th></tr>';
        for(var i=0;i<lst.length;i++)
        {
          str+='<tr >';
           str+='<td colspan="4" style="background-color: #2d4694;border-bottom: 1px solid #fff !important;color: #fff;height: 20px;line-height: 20px;padding-left: 154px;vertical-align: middle;">';
           str+= lst[i]['_event'];
           str+='</td></tr>';
           var match = lst[i]['_match'];
           if(match.length > 0)
           {
              for(var j=0;j<match.length;j++)
              {
                 str+= '<tr style="background-color: #cdf;">';
                 str+= '<td style="border: 1px solid #fff;">'+match[j]['_time']+'</td>';
                 str+= '<td style="margin: 0 3px 0 0;padding: 0;border: 1px solid #fff;color:blue;text-align:left"><span>'+match[j]['_teamA']+'</span>';
                 str+= '<br><span>'+match[j]['_teamB']+'</span>';
                 str+= '</td>';
                 str+= '<td style="border: 1px solid #fff;"><span id=HalfFirst_'+j+'>'+match[j]['_firsthalf']+'</span></td>';
                 str+= '<td style="border: 1px solid #fff;"><span id=FullScore_'+j+'>'+match[j]['_fulltime']+'</span></td>';
                 str+= '</tr>';
              }
           }
        }
        str+= "</table>";
    }
    $("#ShowListResult").html(" ");
    $("#ShowListResult").html(str);
}