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

function ConvertFT()
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

    str = str   + '<table width="100%" cellspacing="0" cellpadding="0" border="1" style="border-style:solid; border-width:1px;font-weight:bold;padding-top:30px;">';
    str = str   + '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
    str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
    for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
    {
        var cur_body  = $(list_tbody[i_tbody]);
        var list_td   = cur_body.children("tr").eq(0).children("td");
        var list_td_2 = cur_body.children("tr").eq(1).children("td");
        var list_dem  = cur_body.children("tr");
        var n_td      = list_dem.length;
        if(n_td==1)
        {
            _dataevent = $(list_td[0]).children("span").children("span").text();
            str = str + '<tr  style="background-color:#222222;height:28px;">';
            str = str + '<td colspan="8" style="color:#FFF"><span class="span_event"><b>';
            str = str + _dataevent;
            str = str + '</b></span></td>';
            str = str + '</tr>';
            list1 = [];i1=0;
        }
        else if(n_td==2)
        {
            _time = $(list_td[0]).children("div").children("div").last().html();
            if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
            {
                var _TeamA    = $(list_td[1]).children("span").eq(0).text();
                var _TeamB    = $(list_td[1]).children("span").eq(1).text();

                str = str + '<tr bgcolor=\"#AAAAAA\" >';
                str = str + '<td ><b style=\"color:back;\"><span id="span_time">';
                str = str + _time + '</span>';
                str = str + '</td>';
                str = str + '<td colspan="7">';
                str = str + '<span style="color:red" ><b>' + _TeamA + '</b></span></br>'; 
                str = str + '<span style="color:blue" ><b>' +_TeamB  +'</b></span>';
                str = str + '</td>';
                str = str + '</tr>';

                var col_1_0     = $(list_td[2]).children("span").children("span").children("span").text();
                var col_2_0     = $(list_td[3]).children("span").children("span").children("span").text();
                var col_2_1     = $(list_td[4]).children("span").children("span").children("span").text();
                var col_3_0     = $(list_td[5]).children("span").children("span").children("span").text();
                var col_3_1     = $(list_td[6]).children("span").children("span").children("span").text();
                var col_3_2     = $(list_td[7]).children("span").children("span").children("span").text();
                var col_4_0     = $(list_td[8]).children("span").children("span").children("span").text();
                var col_4_1     = $(list_td[9]).children("span").children("span").children("span").text();
                var col_4_2     = $(list_td[10]).children("span").children("span").children("span").text();
                var col_4_3     = $(list_td[11]).children("span").children("span").children("span").text();
                var col_0_0     = $(list_td[12]).children("span").children("span").children("span").text();
                var col_1_1     = $(list_td[13]).children("span").children("span").children("span").text();
                var col_2_2     = $(list_td[14]).children("span").children("span").children("span").text();
                var col_3_3     = $(list_td[15]).children("span").children("span").children("span").text();
                var col_4_4     = $(list_td[16]).children("span").children("span").children("span").text();
                var col_AOS     = $(list_td[17]).children("span").children("span").children("span").text();
                var col2_1_1     = $(list_td_2[0]).children("span").children("span").children("span").text();
                var col2_2_1     = $(list_td_2[1]).children("span").children("span").children("span").text();
                var col2_3_1     = $(list_td_2[2]).children("span").children("span").children("span").text();
                var col2_4_1     = $(list_td_2[3]).children("span").children("span").children("span").text();
                var col2_5_1     = $(list_td_2[4]).children("span").children("span").children("span").text();
                var col2_6_1     = $(list_td_2[5]).children("span").children("span").children("span").text();
                var col2_7_1     = $(list_td_2[6]).children("span").children("span").children("span").text();
                var col2_8_1     = $(list_td_2[7]).children("span").children("span").children("span").text();
                var col2_9_1     = $(list_td_2[8]).children("span").children("span").children("span").text();
                var col2_10_1    = $(list_td_2[9]).children("span").children("span").children("span").text();

                str += '<tr style="background-color:#4c69b8;color: #fff"><td>1:0</td><td>2:0</td><td>2:1</td><td>3:0</td><td>3:1</td><td>3:2</td><td>4:0</td><td>4:1</td></tr>'; 
                str += '<tr style="background-color:#F0E68C;color:red;"><td>'+col_1_0+'</td><td>'+col_2_0+'</td><td>'+col_2_1+'</td><td>'+col_3_0+'</td><td>'+col_3_1+'</td><td>'+col_3_2+'</td><td>'+col_4_0+'</td><td>'+col_4_1+'</td></tr>';
                str += '<tr style="background-color:#F0E68C;"><td>'+col2_1_1+'</td><td>'+col2_2_1+'</td><td>'+col2_3_1+'</td><td>'+col2_4_1+'</td><td>'+col2_5_1+'</td><td>'+col2_6_1+'</td><td>'+col2_7_1+'</td><td>'+col2_8_1+'</td></tr>';
                str += '<tr style="background-color:#4c69b8;color: #fff"><td>4:2</td><td>4:3</td><td>0:0</td><td>1:1</td><td>2:2</td><td>3:3</td><td>4:4</td><td>AOS</td></tr>'; 
                str += '<tr style="background-color:#F0E68C;" ><td style="color:red;">'+col_4_2+'</td><td style="color:red;">'+col_4_3+'</td><td rowspan="2" style="color:#228B22;">'+col_0_0+'</td><td rowspan="2" style="color:#228B22;">'+col_1_1+'</td><td rowspan="2" style="color:#228B22;">'+col_2_2+'</td><td rowspan="2" style="color:#228B22;">'+col_3_3+'</td><td rowspan="2" style="color:#228B22;">'+col_4_4+'</td><td rowspan="2" style="color:#228B22;">'+col_AOS+'</td></tr>';
                str += '<tr style="background-color:#F0E68C;" ><td >'+col2_9_1+'</td><td>'+col2_10_1+'</td></tr>'; 
            }   
        }
    }
    str = str +'</table>';
    str +='</td>';
    str +='</tr>';
    str = str +'</table>';
    $("#divshowdata").html(str); 
    $.ajax({
             type : "POST",
             url  : "../home_controller/SaveFileHtmlResult",
             data : {
                       save_today:str,
                       lang:"EN"
                    },
             dataType: "html",
             success: function(data)
             { 
                var trans       = {};
                    trans._type = "Correct Score";
                    trans._lang = 1;
                    trans.send  = str;
                socket.emit('SoccerTODAY',trans); 
             }
           });
}

function ConvertFTCN()
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
    var outdate = "更新 "+ hours+":"+minute + " " + day + "/" + month + " " + weeken;
    str = str   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;"><tr><td>';
    str = str   + outdate;
    str = str   + '</td></tr></table>';

    str = str   + '<table width="100%" cellspacing="0" cellpadding="0" border="1" style="border-style:solid; border-width:1px;font-weight:bold;padding-top:30px;">';
    str = str   + '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
    str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
    for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
    {
        var cur_body  = $(list_tbody[i_tbody]);
        var list_td   = cur_body.children("tr").eq(0).children("td");
        var list_td_2 = cur_body.children("tr").eq(1).children("td");
        var list_dem  = cur_body.children("tr");
        var n_td      = list_dem.length;
        if(n_td==1)
        {
            _dataevent = $(list_td[0]).children("span").children("span").text();
            str = str + '<tr  style="background-color:#222222;height:28px;">';
            str = str + '<td colspan="8" style="color:#FFF"><span class="span_event"><b>';
            str = str + _dataevent;
            str = str + '</b></span></td>';
            str = str + '</tr>';
            list1 = [];i1=0;
        }
        else if(n_td==2)
        {
            _time = $(list_td[0]).children("div").children("div").last().html();
            if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
            {
                var _TeamA    = $(list_td[1]).children("span").eq(0).text();
                var _TeamB    = $(list_td[1]).children("span").eq(1).text();

                str = str + '<tr bgcolor=\"#AAAAAA\" >';
                str = str + '<td ><b style=\"color:back;\"><span id="span_time">';
                str = str + _time + '</span>';
                str = str + '</td>';
                str = str + '<td colspan="7">';
                str = str + '<span style="color:red" ><b>' + _TeamA + '</b></span></br>'; 
                str = str + '<span style="color:blue" ><b>' +_TeamB  +'</b></span>';
                str = str + '</td>';
                str = str + '</tr>';

                var col_1_0     = $(list_td[2]).children("span").children("span").children("span").text();
                var col_2_0     = $(list_td[3]).children("span").children("span").children("span").text();
                var col_2_1     = $(list_td[4]).children("span").children("span").children("span").text();
                var col_3_0     = $(list_td[5]).children("span").children("span").children("span").text();
                var col_3_1     = $(list_td[6]).children("span").children("span").children("span").text();
                var col_3_2     = $(list_td[7]).children("span").children("span").children("span").text();
                var col_4_0     = $(list_td[8]).children("span").children("span").children("span").text();
                var col_4_1     = $(list_td[9]).children("span").children("span").children("span").text();
                var col_4_2     = $(list_td[10]).children("span").children("span").children("span").text();
                var col_4_3     = $(list_td[11]).children("span").children("span").children("span").text();
                var col_0_0     = $(list_td[12]).children("span").children("span").children("span").text();
                var col_1_1     = $(list_td[13]).children("span").children("span").children("span").text();
                var col_2_2     = $(list_td[14]).children("span").children("span").children("span").text();
                var col_3_3     = $(list_td[15]).children("span").children("span").children("span").text();
                var col_4_4     = $(list_td[16]).children("span").children("span").children("span").text();
                var col_AOS     = $(list_td[17]).children("span").children("span").children("span").text();
                var col2_1_1     = $(list_td_2[0]).children("span").children("span").children("span").text();
                var col2_2_1     = $(list_td_2[1]).children("span").children("span").children("span").text();
                var col2_3_1     = $(list_td_2[2]).children("span").children("span").children("span").text();
                var col2_4_1     = $(list_td_2[3]).children("span").children("span").children("span").text();
                var col2_5_1     = $(list_td_2[4]).children("span").children("span").children("span").text();
                var col2_6_1     = $(list_td_2[5]).children("span").children("span").children("span").text();
                var col2_7_1     = $(list_td_2[6]).children("span").children("span").children("span").text();
                var col2_8_1     = $(list_td_2[7]).children("span").children("span").children("span").text();
                var col2_9_1     = $(list_td_2[8]).children("span").children("span").children("span").text();
                var col2_10_1    = $(list_td_2[9]).children("span").children("span").children("span").text();

                str += '<tr style="background-color:#4c69b8;color: #fff"><td>1:0</td><td>2:0</td><td>2:1</td><td>3:0</td><td>3:1</td><td>3:2</td><td>4:0</td><td>4:1</td></tr>'; 
                str += '<tr style="background-color:#F0E68C;color:red;"><td>'+col_1_0+'</td><td>'+col_2_0+'</td><td>'+col_2_1+'</td><td>'+col_3_0+'</td><td>'+col_3_1+'</td><td>'+col_3_2+'</td><td>'+col_4_0+'</td><td>'+col_4_1+'</td></tr>';
                str += '<tr style="background-color:#F0E68C;"><td>'+col2_1_1+'</td><td>'+col2_2_1+'</td><td>'+col2_3_1+'</td><td>'+col2_4_1+'</td><td>'+col2_5_1+'</td><td>'+col2_6_1+'</td><td>'+col2_7_1+'</td><td>'+col2_8_1+'</td></tr>';
                str += '<tr style="background-color:#4c69b8;color: #fff"><td>4:2</td><td>4:3</td><td>0:0</td><td>1:1</td><td>2:2</td><td>3:3</td><td>4:4</td><td>AOS</td></tr>'; 
                str += '<tr style="background-color:#F0E68C;" ><td style="color:red;">'+col_4_2+'</td><td style="color:red;">'+col_4_3+'</td><td rowspan="2" style="color:#228B22;">'+col_0_0+'</td><td rowspan="2" style="color:#228B22;">'+col_1_1+'</td><td rowspan="2" style="color:#228B22;">'+col_2_2+'</td><td rowspan="2" style="color:#228B22;">'+col_3_3+'</td><td rowspan="2" style="color:#228B22;">'+col_4_4+'</td><td rowspan="2" style="color:#228B22;">'+col_AOS+'</td></tr>';
                str += '<tr style="background-color:#F0E68C;" ><td >'+col2_9_1+'</td><td>'+col2_10_1+'</td></tr>'; 
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
             url  : "../home_controller/SaveFileHtmlResult",
             data : {
                       save_today:str,
                       lang:"CN"
                    },
             dataType: "html",
             success: function(data)
             { 
                var trans       = {};
                    trans._type = "Correct Score";
                    trans._lang = 2;
                    trans.send  = str;
                socket.emit('SoccerTODAY',trans); 
             }
           });
}

function ClearConvert()
{
    $("#ContentConvert").val(" ");
}