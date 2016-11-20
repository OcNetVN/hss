$(document).ready(function() {
    //editable
    $.fn.editable.defaults.mode = 'popup';
});
function isWeekend(date)
{
    var day = new Date(date);
        showday = day.getDay();
    var l_Wek = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
    return  l_Wek[showday];   
}

function isWeekendCn(date)
{
    var day         = new Date(date);
        showday     = day.getDay();
    var l_Wek = ["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
    return  l_Wek[showday];
}

function ConvertDC()
{
    var list_result = [];
    var i = 0;
    var n_tbody = 0;
    var list1 = [];
    var list2 = [];
    var i1    = 0;
    var i2    = 0;
    var j = 0;
    var content = $("#ContentConvert").val();
    var TableObject = $($.parseHTML(content));
    var total_tbody =TableObject.children("tbody").length;
    var list_tbody= TableObject.children("tbody");
    var str= "";
    var d = new Date();
    var month  = d.getMonth()+1;
        month  = (month<10?'0':'')+month;
    var day    = d.getDate();
        day    = (day<10?'0':'') + day;
    var hours  = d.getHours();
    var minute = d.getMinutes();
        minute = (minute<10?'0':'') + minute;
    var arr_date = d.getFullYear() + "-" + month + "-" + day;
    var weeken   = isWeekend(arr_date);
    var outdate = "Update "+ hours+":"+minute + " " + day + "/" + month + " " + weeken;
    str = str   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;"><tr><td>';
    str = str   + outdate;
    str = str   + '</td></tr></table>';

    str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
    str = str   + '<tr><td style="padding-bottom:80px;padding-top:30px;overflow-y: scroll;">';
    str = str   + '<table width="100%" cellspacing="0" cellpadding="0" border="1" style="border-style:solid; border-width:1px;">';
    str = str   + '<tr style="background-color:#4c69b8;border-width:1px;color:#ffffff;border-style:solid;padding-top:40px;font-wegiht:bold;">';
    str = str   + '<td align=\"center\" >Time</td><td colspan="4" align=\"center\">Full Time</td><td colspan="3" align=\"center\">First Half</td></tr>';
    for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
    {
        var cur_body  = $(list_tbody[i_tbody]);
        var list_td   = cur_body.children("tr").eq(0).children("td");
        var n_td      = list_td.length;
        if(n_td==1)
        {
            _dataevent = $(list_td[0]).children("span").children("span").text();
            str = str + '<tr  style="background-color:#222222;height:28px;">';
            str += '<td align=\"center\"></td>';
            str = str + '<td colspan="7" style="color:#FFF"><span class="span_event"><b>';
            str = str + _dataevent;
            str = str + '</b></span></td>';
            str = str + '</tr>';
            list1 = [];i1=0;
        }
        else if(n_td==12)
        {
            _time = $(list_td[0]).children("div").children("div").last().html();
            if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
            {
                var _TeamA    = $(list_td[1]).children("span").eq(0).text();
                //var _colTeamA = $(list_td[1]).children("span").eq(0).attr('class');
                var _TeamB    = $(list_td[1]).children("span").eq(1).text();
                //var _colTeamB = $(list_td[1]).children("span").eq(1).attr('class');

                if(j%2 == 0)
                {
                    str = str + '<tr bgcolor=\"#abc4f5\"  style=\"font-weight:bold;\">';
                }
                else
                {
                    str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold\">';
                }
                
                str = str + '<td colspan="1" align=\"center\"><b style=\"color:back;\"><span id="span_time">';
                str = str + _time + '</span>';
                str = str + '</td>';
                str = str + '<td colspan="7" >';
                str = str + '<span style="color:red" class="span_teamA"><b>' + _TeamA + '</b></span></br>'; 
                str = str + '<span style="color:blue" class="span_teamB"><b>' +_TeamB  +'</b></span>';
                
                
                str = str + '</td>';
                str += '</tr>';
                str += '<tr style="background-color:#e3e3e3;color:#7e4f34">';
                str += '<td align=\"center\"></td>';
                str += '<td align=\"center\">Home</td><td align=\"center\">Draw</td><td align=\"center\">Away</td><td align=\"center\"></td><td align=\"center\">Home</td><td align=\"center\">Draw</td><td align=\"center\">Away</td></tr>';
                str += '<tr>';
                var fullHome      = $(list_td[2]).children("div").children("span").children("span").children("span").text();
                var fullDraw      = $(list_td[3]).children("div").children("span").children("span").children("span").text();
                var fullAway      = $(list_td[4]).children("div").children("span").children("span").children("span").text();
                var firstHome     = $(list_td[5]).children("div").children("span").children("span").children("span").text();
                var firstDraw     = $(list_td[6]).children("div").children("span").children("span").children("span").text();
                var firstAway     = $(list_td[7]).children("div").children("span").children("span").children("span").text();
                
                str = str + '<td align=\"center\"></td>';
                str = str + '<td align=\"center\">'+fullHome+'</td>';
                str = str + '<td align=\"center\" >'+fullDraw+'</td>';
                str = str + '<td align=\"center\">'+fullAway+'</td>';
                str = str + '<td align=\"center\"></td>';
                str = str + '<td align=\"center\" >'+firstHome+'</td>';
                str = str + '<td align=\"center\" >'+firstDraw+'</td>';
                str = str + '<td align=\"center\" >'+firstAway+'</td>';
                str = str + '</tr>';
                j++;
               
            }
            
        }
    }
    str = str +'</table>';
    str = str + '</td>';
    str = str + '</tr>';
    str = str + '</table>';
    //socket.emit('SoccerTODAY',str);
    $("#divshowdata").html(str); 
    
    $.ajax({
             type : "POST",
             url  : "../home_controller/SaveLadbrokeFileHtml",
             data : {
                       save_today:str,
                       lang:"EN"
                    },
             dataType: "html",
             success: function(data)
             { 
                var trans       = {};
                    trans._type = "ladbrokes";
                    trans._lang = 1;
                    trans.send  = str;
                socket.emit('SoccerTODAY',trans);
                $("#div_show_Result").html(str); 
             }
           });
}

function ConvertDCCN()
{
    var list_result = [];
    var i = 0;
    var n_tbody = 0;
    var list1 = [];
    var list2 = [];
    var i1    = 0;
    var i2    = 0;
    var j = 0;
    var content = $("#ContentConvert").val();
    var TableObject = $($.parseHTML(content));
    var total_tbody =TableObject.children("tbody").length;
    var list_tbody= TableObject.children("tbody");
    var str= "";
    var d = new Date();
    var month  = d.getMonth()+1;
        month  = (month<10?'0':'')+month;
    var day    = d.getDate();
        day    = (day<10?'0':'') + day;
    var hours  = d.getHours();
    var minute = d.getMinutes();
        minute = (minute<10?'0':'') + minute;
    var arr_date = d.getFullYear() + "-" + month + "-" + day;
    var weeken   = isWeekendCn(arr_date);
    var outdate = "更新 "+ hours+":"+minute + " " + day + "/" + month + " " + weeken;
    str = str   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;"><tr><td>';
    str = str   + outdate;
    str = str   + '</td></tr></table>';
    str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
    str = str   + '<tr><td></td></td></tr>';
    str = str   + '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
    str = str   + '<table width="100%" border="1" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
    str = str   + '<tr style="background-color:#4c69b8;border-width:1px;color:#ffffff;border-style:solid;padding-top:40px;font-wegiht:bold;">';
    str = str   + '<td align=\"center\" >时间</td><td colspan="4" align=\"center\">全场</td><td colspan="3" align=\"center\">上半场</td></tr>';
    for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
    {
        var cur_body  = $(list_tbody[i_tbody]);
        var list_td   = cur_body.children("tr").eq(0).children("td");
        var n_td      = list_td.length;
        if(n_td==1)
        {
            _dataevent = $(list_td[0]).children("span").children("span").text();
            str = str + '<tr  style="background-color:#222222;height:28px;">';
            str = str + '<td align=\"center\"></td>';
            str = str + '<td colspan="7" style="color:#FFF"><span class="span_event"><b>';
            str = str + _dataevent;
            str = str + '</b></span></td>';
            str = str + '</tr>';
            list1 = [];i1=0;
            

        }
        else if(n_td==12)
        {
            _time = $(list_td[0]).children("div").children("div").last().html();
            if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
            {
                var _TeamA    = $(list_td[1]).children("span").eq(0).text();
                //var _colTeamA = $(list_td[1]).children("span").eq(0).attr('class');
                var _TeamB    = $(list_td[1]).children("span").eq(1).text();
                //var _colTeamB = $(list_td[1]).children("span").eq(1).attr('class');

                if(j%2 == 0)
                {
                    str = str + '<tr bgcolor=\"#abc4f5\"  style=\"font-weight:bold;\">';
                }
                else
                {
                    str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold\">';
                }
                
                str = str + '<td colspan="1" ><b style=\"color:back;\"><span id="span_time">';
                str = str + _time + '</span>';
                str = str + '</td>';
                str = str + '<td colspan="7">';
                str = str + '<span style="color:red" class="span_teamA"><b>' + _TeamA + '</b></span></br>'; 
                str = str + '<span style="color:blue" class="span_teamB"><b>' +_TeamB  +'</b></span>';
                str = str + '</td>';
                str += '</tr>';
                str += '<tr style="background-color:#e3e3e3;color:#7e4f34">';
                str += '<td align=\"center\"></td>';
                str += '<td align=\"center\">主场</td><td align=\"center\">和</td><td align=\"center\">客场</td><td align=\"center\"></td><td align=\"center\">主场</td><td align=\"center\">和</td><td align=\"center\">主场</td></tr>';
                str += '<tr>';
                var fullHome      = $(list_td[2]).children("div").children("span").children("span").children("span").text();
                var fullDraw      = $(list_td[3]).children("div").children("span").children("span").children("span").text();
                var fullAway      = $(list_td[4]).children("div").children("span").children("span").children("span").text();
                var firstHome     = $(list_td[5]).children("div").children("span").children("span").children("span").text();
                var firstDraw     = $(list_td[6]).children("div").children("span").children("span").children("span").text();
                var firstAway     = $(list_td[7]).children("div").children("span").children("span").children("span").text();
                
                str = str + '<td align=\"center\"></td>';
                str = str + '<td align=\"center\">'+fullHome+'</td>';
                str = str + '<td align=\"center\" >'+fullDraw+'</td>';
                str = str + '<td align=\"center\">'+fullAway+'</td>';
                str = str + '<td align=\"center\"></td>';
                str = str + '<td align=\"center\" >'+firstHome+'</td>';
                str = str + '<td align=\"center\" >'+firstDraw+'</td>';
                str = str + '<td align=\"center\" >'+firstAway+'</td>';
                str = str + '</tr>';
                j++;
               
            }
            
        }
    }
    str = str +'</table>';
    str = str + '</td>';
    str = str + '</tr>';
    str = str + '</table>';
    $("#divshowdata").html(str); 
    
    $.ajax({
             type : "POST",
             url  : "../home_controller/SaveLadbrokeFileHtml",
             data : {
                       save_today:str,
                       lang:"CN"
                    },
             dataType: "html",
             success: function(data)
             { 
                var trans       = {};
                    trans._type = "ladbrokes";
                    trans._lang = 2;
                    trans.send  = str;
                socket.emit('SoccerTODAY',trans);
                $("#div_show_Result").html(str); 
             }
           });
}

function ClearConvert()
{
    $("#ContentConvert").val(" ");
}