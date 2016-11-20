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

function ConvertResult_1()
{
	var list_result = [];
	var i = 0;
	var n_tbody = 0;
	var list1 = [];
	var list2 = [];
	var i1    = 0;
	var i2    = 0;
    var j = 0;
	var content     = $("#ContentConvert").val();
	var TableObject = $($.parseHTML(content));
	var json_match = null;
	var json_match_old = null;
    var total_tr = TableObject.children("tbody").children("tr").length;
	var list_tr  = TableObject.children("tbody").children("tr");
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
    var arr_result = [];
    var event_name;
    var teamA;
    var teamB;
    var teamTime;
    var teamFistScore;
    var teamFulltimeScore;
    var str = "";
    var dem_fist;
    var dem_last;
    str = '<table width="100%" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse;font: 700 11px Tahoma;margin: 1px; text-align: center;">';
    str = str + '<tr  style="background-color:#FFF;height:30px;color:black;"><td colspan="4">'+ outdate +'</td></tr>';
    str = str  + '<tr style="background-color:#4c69b8;color: #fff"><th style="line-height: 16px;4c69b8;border: 1px solid #fff;line-height: 16px;">Date & Time</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Event</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">First Half Score</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Full Time Score</th></tr>';
    for(var i_tr = 0; i_tr < list_tr.length;i_tr++)
    {
    	var cur_tr  = $(list_tr[i_tr]);
    	var list_td = cur_tr.children("td");
    	var n_td    = list_td.length;
    	if(n_td == 1)
    	{
           event_name = $(list_td[0]).children("span").eq(0).text();
           str+='<tr >';
           str+='<td colspan="4" style="background-color: #2d4694;border-bottom: 1px solid #fff !important;color: #fff;height: 20px;line-height: 20px;padding-left: 154px;vertical-align: middle;">';
           str+= event_name;
           str+='</td></tr>'

    	}
    	else if(n_td==5)
    	{
            j++;
    		dem_fist = 0;
    		dem_last = 0;
    		teamTime      		= $(list_td[0]).html();
    		teamA         		= $(list_td[1]).children("span").eq(0).text();
    		var check_first     = $(list_td[1]).children("span").eq(1).attr('class');
    		var check_last      = $(list_td[1]).children("span").eq(2).attr('class');
    		teamFistScore       = $(list_td[2]).html();
    		teamFulltimeScore 	= $(list_td[3]).html();
    		if(check_first == 'LastGoal' || check_first == 'FirstGoal')
    		{
    			dem_fist = dem_fist + 1;
    		}

    		if(check_last  == 'LastGoal' || check_last == 'FirstGoal')
    		{
    			dem_last = dem_last + 1;
    		}

    		str+= '<tr style="background-color: #cdf;">';
    		str+= '<td style="border: 1px solid #fff;">'+teamTime+'</td>';
    		str+= '<td style="margin: 0 3px 0 0;padding: 0;border: 1px solid #fff;color:blue;text-align:left"><span>'+teamA+'</span>';
    		if(dem_fist == 0 && dem_last == 0)
    		{
    		   teamB  = $(list_td[1]).children("span").eq(1).text();
    		   str+= '<br><span>'+teamB+'</span>';
    		}
    		else if(dem_fist != 0 && dem_last != 0) 
    		{
    		   var position = dem_fist+dem_last+1;
    		   teamB  = $(list_td[1]).children("span").eq(position).text();
    		   if(check_first == 'FirstGoal')
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   else
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
    		   if(dem_last == 'FirstGoal')
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
    		   else
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';

    		   str+= '<span>'+teamB+'</span>';
    		   var check_firstB =  $(list_td[1]).children("span").eq(4).attr('class');
    		   var check_lastB =  $(list_td[1]).children("span").eq(5).attr('class');
    		    if(typeof  check_firstB != 'undefined')
    		    {
    		    	if(check_firstB == 'FirstGoal')
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   		else
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
    		    }    		    
    		    if(typeof check_lastB != 'undefined')
    		    {
    		    	if(check_lastB == 'FirstGoal')
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   		else
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
    		    }
    		}
    		else if(dem_fist == 0 && dem_last !=0)
    		{
    			teamB  = $(list_td[1]).children("span").eq(1).text();
    			str+= '<br><span>'+teamB+'</span>';
    			if(dem_last == 'FirstGoal')
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   else
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';

    		    var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
    		    if(typeof check_firstB != 'undefined')
    		    {
    		    	if(check_firstB == 'FirstGoal')
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   		else
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
    		    }
    		}
    		else
    		{
    			teamB  = $(list_td[1]).children("span").eq(2).text();
    			if(check_first == 'FirstGoal')
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
    		   else
    		      str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';
    		    str+= '<span>'+teamB+'</span>';
    		    var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
    		    var check_lastB  =  $(list_td[1]).children("span").eq(4).attr('class');
    		    if(typeof  check_firstB != 'undefined')
    		    {
    		    	if(check_firstB == 'FirstGoal')
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   		else
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
    		    }    		    
    		    if(typeof check_lastB != 'undefined')
    		    {
    		    	if(check_lastB == 'FirstGoal')
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
    		   		else
    		      		str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
    		    }
    		}
    		
    		str+= '</td>';
    		str+= '<td style="border: 1px solid #fff;"><span id=HalfFirst_'+j+'>'+teamFistScore+'</span></td>';
    		str+= '<td style="border: 1px solid #fff;"><span id=FullScore_'+j+'>'+teamFulltimeScore+'</span></td>';
    		str+= '</tr>';
    	}
    }
    str+= "</table>";

	$("#divshowdata").html(str); 
    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtmlResult",
             data : {
                      save_today:str,
                      lang: "EN"
                    },
             dataType: "html",
             success: function(data)
             { 
                var trans       = {};
                    trans._type = "result";
                    trans._lang = 1;
                    trans.send  = str;
             	socket.emit('SoccerTODAY',trans);
				//$("#divshowdata").html(str); 
             }
           });
    
    $("#sp_test").editable();
    $("[id*=HalfFirst_]" ).editable();
    $("[id*=FullScore_]" ).editable();
}

function ConvertResult()
{
    var list_result = [];
    var i = 0;
    var n_tbody = 0;
    var list1 = [];
    var list2 = [];
    var i1    = 0;
    var i2    = 0;
    var j = 0;
    var content     = $("#ContentConvert").val();
    var TableObject = $($.parseHTML(content));
    var total_tr =TableObject.children("tbody").children("tr").length;
    var list_tr= TableObject.children("tbody").children("tr");
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
    var arr_result = [];
    var event_name;
    var teamA;
    var teamB;
    var teamTime;
    var tamp_event = "";
    var dem = 0;
    var teamFistScore;
    var teamFulltimeScore;
    var str = "";
    var dem_fist;
    var dem_last;
    str = '<table width="100%" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse;font: 700 11px Tahoma;margin: 1px; text-align: center;">';
    str = str + '<tr  style="background-color:#FFF;height:30px;color:black;"><td colspan="4">'+ outdate +'</td></tr>';
    str = str  + '<tr style="background-color:#4c69b8;color: #fff"><th style="line-height: 16px;4c69b8;border: 1px solid #fff;line-height: 16px;">Date & Time</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Event</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">First Half Score</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Full Time Score</th></tr>';
    for(var i_tr = 0; i_tr < list_tr.length;i_tr++)
    {
        var cur_tr  = $(list_tr[i_tr]);
        var list_td = cur_tr.children("td");
        var n_td    = list_td.length;
        if(n_td == 1)
        {
           event_name = $(list_td[0]).children("span").eq(0).text();
           str+='<tr >';
           str+='<td colspan="4" style="background-color: #2d4694;border-bottom: 1px solid #fff !important;color: #fff;height: 20px;line-height: 20px;padding-left: 154px;vertical-align: middle;">';
           str+= event_name;
           str+='</td></tr>';
           i++;
           if(event_name != tamp_event)
           {
               list1 = [];
               j = 0;
               tamp_event = event_name;
               console.log(tamp_event);
           }
        }
        else if(n_td==5)
        {
            console.log(j);
            var json_match = {};
            var json_team = {};
            dem_fist = 0;
            dem_last = 0;
            teamTime            = $(list_td[0]).html();
            teamA               = $(list_td[1]).children("span").eq(0).text();
            var check_first     = $(list_td[1]).children("span").eq(1).attr('class');
            var check_last      = $(list_td[1]).children("span").eq(2).attr('class');
            teamFistScore       = $(list_td[2]).html();
            teamFulltimeScore   = $(list_td[3]).html();
            if(check_first == 'LastGoal' || check_first == 'FirstGoal')
            {
                dem_fist = dem_fist + 1;
            }

            if(check_last  == 'LastGoal' || check_last == 'FirstGoal')
            {
                dem_last = dem_last + 1;
            }

            str+= '<tr style="background-color: #cdf;">';
            str+= '<td style="border: 1px solid #fff;">'+teamTime+'</td>';
            str+= '<td style="margin: 0 3px 0 0;padding: 0;border: 1px solid #fff;color:blue;text-align:left"><span>'+teamA+'</span>';
            if(dem_fist == 0 && dem_last == 0)
            {
               teamB  = $(list_td[1]).children("span").eq(1).text();
               str+= '<br><span>'+teamB+'</span>';
            }
            else if(dem_fist != 0 && dem_last != 0) 
            {
               var position = dem_fist+dem_last+1;
               teamB  = $(list_td[1]).children("span").eq(position).text();
               if(check_first == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
               if(dem_last == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';

               str+= '<span>'+teamB+'</span>';
               var check_firstB =  $(list_td[1]).children("span").eq(4).attr('class');
               var check_lastB =  $(list_td[1]).children("span").eq(5).attr('class');
                if(typeof  check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }               
                if(typeof check_lastB != 'undefined')
                {
                    if(check_lastB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            else if(dem_fist == 0 && dem_last !=0)
            {
                teamB  = $(list_td[1]).children("span").eq(1).text();
                str+= '<br><span>'+teamB+'</span>';
                if(dem_last == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';

                var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
                if(typeof check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            else
            {
                teamB  = $(list_td[1]).children("span").eq(2).text();
                if(check_first == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';
                str+= '<span>'+teamB+'</span>';
                var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
                var check_lastB  =  $(list_td[1]).children("span").eq(4).attr('class');
                if(typeof  check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }               
                if(typeof check_lastB != 'undefined')
                {
                    if(check_lastB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            
            str+= '</td>';
            str+= '<td style="border: 1px solid #fff;"><span id=HalfFirst_'+j+'>'+teamFistScore+'</span></td>';
            str+= '<td style="border: 1px solid #fff;"><span id=FullScore_'+j+'>'+teamFulltimeScore+'</span></td>';
            str+= '</tr>';
            json_team.teamA          = teamA;
            json_team.teamB          = teamB;
            json_team.teamTime       = teamTime;
            json_team.FirstHalf      = teamFistScore;
            json_team.Fulltime       = teamFulltimeScore;
            list1[j] = json_team;
            json_match._event = event_name;
            json_match.listeam = list1;
            list_result[i] = json_match;
            j++;
        }
    }

    console.log(list_result);
    str+= "</table>";
    var txtday = $("#txtdate").val();

    $("#divshowdata").html(str); 
    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveResultScore",
             data : {
                      l_result:list_result,
                      lang:    "EN",
                      txtday:  txtday,
                    },
             dataType: "json",
             success: function(data)
             { 
                // var trans       = {};
                //     trans._type = "result";
                //     trans._lang = 1;
                //     trans.send  = str;
                // socket.emit('SoccerTODAY',trans);
             }
           });
    
    $("#sp_test").editable();
    $("[id*=HalfFirst_]" ).editable();
    $("[id*=FullScore_]" ).editable();
}

function SaveEnglishResult()
{
    var txtday       = $("#txtdate").val();
    var tong         = $('table#ShowResult tbody tr:last').index() + 1;
    var list_result = [];
    var j=0;
    for(var i=0;i<tong;i++)
    {
        var curr_td = $("#ShowResult tbody tr:eq(" + i + ")").children("td").length;
        if(curr_td == 4)
        {
            var ID_Result = $("#ShowResult tbody tr:eq(" + i + ")").children("td").children("span").eq(1).text();
            //console.log(ID_Result);
            var json_obj   = {};
            json_obj.ID    = ID_Result;
            json_obj.first = $("#HalfFirst_" + ID_Result).text();
            json_obj.full  = $("#FullScore_" + ID_Result).text();
            list_result[j] = json_obj;
            j++;
        }
    }
    console.log(list_result);

    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveResulTeam",
             data : {
                      l_result:list_result,
                      lang:    "EN",
                      txtday:  txtday,
                    },
             dataType: "json",
             success: function(data)
             { 
                SaveEnglishResult_Complete(data);
             }
           });
}

function SaveEnglishResult_Complete(data)
{
    var sRes = data.Result;
    if(sRes == 1 || sRes == "1")
    {
        $("#notifysuccess").css("display","");
        $("#notifyerr").css("display","none");
    }
    else
    {
        $("#notifysuccess").css("display","none");
        $("#notifyerr").css("display","");
    }
}

function SaveChineseResult()
{
    var txtday       = $("#txtdate").val();
    var tong         = $('table#ShowResult tbody tr:last').index() + 1;
    var list_result = [];
    var j=0;
    for(var i=0;i<tong;i++)
    {
        var curr_td = $("#ShowResult tbody tr:eq(" + i + ")").children("td").length;
        if(curr_td == 4)
        {
            var ID_Result = $("#ShowResult tbody tr:eq(" + i + ")").children("td").children("span").eq(1).text();
            //console.log(ID_Result);
            var json_obj   = {};
            json_obj.ID    = ID_Result;
            json_obj.first = $("#HalfFirst_" + ID_Result).text();
            json_obj.full  = $("#FullScore_" + ID_Result).text();
            list_result[j] = json_obj;
            j++;
        }
    }
    console.log(list_result);

    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveResulTeam",
             data : {
                      l_result:list_result,
                      lang:    "CN",
                      txtday:  txtday,
                    },
             dataType: "json",
             success: function(data)
             { 
                SaveEnglishResult_Complete(data);
             }
           });
}

function ConvertResultCN_1()
{
    var list_result = [];
    var i = 0;
    var n_tbody = 0;
    var list1 = [];
    var list2 = [];
    var i1    = 0;
    var i2    = 0;
    var j = 0;
    var content     = $("#ContentConvert").val();
    var TableObject = $($.parseHTML(content));
    var json_match = null;
    var json_match_old = null;
    var total_tr =TableObject.children("tbody").children("tr").length;
    var list_tr= TableObject.children("tbody").children("tr");
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
    var arr_result = [];
    var event_name;
    var teamA;
    var teamB;
    var teamTime;
    var teamFistScore;
    var teamFulltimeScore;
    var str = "";
    var dem_fist;
    var dem_last;
    str = '<table width="100%" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse;font: 700 11px Tahoma;margin: 1px; text-align: center;">';
    str = str + '<tr  style="background-color:#FFF;height:30px;color:black;"><td colspan="4">'+ outdate +'</td></tr>';
    str = str  + '<tr style="background-color:#4c69b8;color: #fff"><th style="line-height: 16px;4c69b8;border: 1px solid #fff;line-height: 16px;">日期时间</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">赛事</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">上半场赛果</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">完场赛果</th></tr>';
    for(var i_tr = 0; i_tr < list_tr.length;i_tr++)
    {
        var cur_tr  = $(list_tr[i_tr]);
        var list_td = cur_tr.children("td");
        var n_td    = list_td.length;
        if(n_td == 1)
        {
           event_name = $(list_td[0]).children("span").eq(0).text();
           str+='<tr >';
           str+='<td colspan="4" style="background-color: #2d4694;border-bottom: 1px solid #fff !important;color: #fff;height: 20px;line-height: 20px;padding-left: 154px;vertical-align: middle;">';
           str+= event_name;
           str+='</td></tr>'

        }
        else if(n_td==5)
        {
            j++;
            dem_fist = 0;
            dem_last = 0;
            teamTime            = $(list_td[0]).html();
            teamA               = $(list_td[1]).children("span").eq(0).text();
            var check_first     = $(list_td[1]).children("span").eq(1).attr('class');
            var check_last      = $(list_td[1]).children("span").eq(2).attr('class');
            teamFistScore       = $(list_td[2]).html();
            teamFulltimeScore   = $(list_td[3]).html();
            if(check_first == 'LastGoal' || check_first == 'FirstGoal')
            {
                dem_fist = dem_fist + 1;
            }

            if(check_last  == 'LastGoal' || check_last == 'FirstGoal')
            {
                dem_last = dem_last + 1;
            }

            str+= '<tr style="background-color: #cdf;">';
            str+= '<td style="border: 1px solid #fff;">'+teamTime+'</td>';
            str+= '<td style="margin: 0 3px 0 0;padding: 0;border: 1px solid #fff;color:blue;text-align:left"><span>'+teamA+'</span>';
            if(dem_fist == 0 && dem_last == 0)
            {
               teamB  = $(list_td[1]).children("span").eq(1).text();
               str+= '<br><span>'+teamB+'</span>';
            }
            else if(dem_fist != 0 && dem_last != 0) 
            {
               var position = dem_fist+dem_last+1;
               teamB  = $(list_td[1]).children("span").eq(position).text();
               if(check_first == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
               if(dem_last == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';

               str+= '<span>'+teamB+'</span>';
               var check_firstB =  $(list_td[1]).children("span").eq(4).attr('class');
               var check_lastB =  $(list_td[1]).children("span").eq(5).attr('class');
                if(typeof  check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }               
                if(typeof check_lastB != 'undefined')
                {
                    if(check_lastB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            else if(dem_fist == 0 && dem_last !=0)
            {
                teamB  = $(list_td[1]).children("span").eq(1).text();
                str+= '<br><span>'+teamB+'</span>';
                if(dem_last == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';

                var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
                if(typeof check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            else
            {
                teamB  = $(list_td[1]).children("span").eq(2).text();
                if(check_first == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';
                str+= '<span>'+teamB+'</span>';
                var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
                var check_lastB  =  $(list_td[1]).children("span").eq(4).attr('class');
                if(typeof  check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }               
                if(typeof check_lastB != 'undefined')
                {
                    if(check_lastB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            
            str+= '</td>';
            str+= '<td style="border: 1px solid #fff;"><span id=HalfFistcn_'+j+'>'+teamFistScore+'</span></td>';
            str+= '<td style="border: 1px solid #fff;"><span id=FullScorecn_'+j+'>'+teamFulltimeScore+'</span></td>';
            str+= '</tr>';
        }
    }
    str+= "</table>";
    $("#divshowdata").html(str); 

    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtmlResult",
             data : {
                      save_today:str,
                      lang: "CN"
                    },
             dataType: "html",
             success: function(data)
             { 
                var trans       = {};
                    trans._type = "result";
                    trans._lang = 2;
                    trans.send  = str;
                socket.emit('SoccerTODAY',trans);
                //$("#divshowdata").html(str); 
             }
           });
    
    $("[id*=HalfFistcn_]" ).editable();
    $("[id*=FullScorecn_]" ).editable();
}

function ConvertResultCN()
{
    var list_result = [];
    var i = 0;
    var n_tbody = 0;
    var list1 = [];
    var list2 = [];
    var i1    = 0;
    var i2    = 0;
    var j = 0;
    var content     = $("#ContentConvert").val();
    var TableObject = $($.parseHTML(content));
    var total_tr =TableObject.children("tbody").children("tr").length;
    var list_tr= TableObject.children("tbody").children("tr");
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
    var arr_result = [];
    var event_name;
    var teamA;
    var teamB;
    var teamTime;
    var tamp_event = "";
    var dem = 0;
    var teamFistScore;
    var teamFulltimeScore;
    var str = "";
    var dem_fist;
    var dem_last;
    str = str +'<table width="100%" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse;font: 700 11px Tahoma;margin: 1px; text-align: center;">';
    str = str + '<tr  style="background-color:#FFF;height:30px;color:black;"><td colspan="4">'+ outdate +'</td></tr>';
    str = str  + '<tr style="background-color:#4c69b8;color: #fff"><th style="line-height: 16px;4c69b8;border: 1px solid #fff;line-height: 16px;">日期时间</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">赛事</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">上半场赛果</th>';
    str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">完场赛果</th></tr>';
    for(var i_tr = 0; i_tr < list_tr.length;i_tr++)
    {
        var cur_tr  = $(list_tr[i_tr]);
        var list_td = cur_tr.children("td");
        var n_td    = list_td.length;
        if(n_td == 1)
        {
           event_name = $(list_td[0]).children("span").eq(0).text();
           str+='<tr >';
           str+='<td colspan="4" style="background-color: #2d4694;border-bottom: 1px solid #fff !important;color: #fff;height: 20px;line-height: 20px;padding-left: 154px;vertical-align: middle;">';
           str+= event_name;
           str+='</td></tr>';
           i++;
           if(event_name != tamp_event)
           {
               list1 = [];
               j = 0;
               tamp_event = event_name;
               console.log(tamp_event);
           }
        }
        else if(n_td==5)
        {
            console.log(j);
            var json_match = {};
            var json_team = {};
            dem_fist = 0;
            dem_last = 0;
            teamTime            = $(list_td[0]).html();
            teamA               = $(list_td[1]).children("span").eq(0).text();
            var check_first     = $(list_td[1]).children("span").eq(1).attr('class');
            var check_last      = $(list_td[1]).children("span").eq(2).attr('class');
            teamFistScore       = $(list_td[2]).html();
            teamFulltimeScore   = $(list_td[3]).html();
            if(check_first == 'LastGoal' || check_first == 'FirstGoal')
            {
                dem_fist = dem_fist + 1;
            }

            if(check_last  == 'LastGoal' || check_last == 'FirstGoal')
            {
                dem_last = dem_last + 1;
            }

            str+= '<tr style="background-color: #cdf;">';
            str+= '<td style="border: 1px solid #fff;">'+teamTime+'</td>';
            str+= '<td style="margin: 0 3px 0 0;padding: 0;border: 1px solid #fff;color:blue;text-align:left"><span>'+teamA+'</span>';
            if(dem_fist == 0 && dem_last == 0)
            {
               teamB  = $(list_td[1]).children("span").eq(1).text();
               str+= '<br><span>'+teamB+'</span>';
            }
            else if(dem_fist != 0 && dem_last != 0) 
            {
               var position = dem_fist+dem_last+1;
               teamB  = $(list_td[1]).children("span").eq(position).text();
               if(check_first == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
               if(dem_last == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';

               str+= '<span>'+teamB+'</span>';
               var check_firstB =  $(list_td[1]).children("span").eq(4).attr('class');
               var check_lastB =  $(list_td[1]).children("span").eq(5).attr('class');
                if(typeof  check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }               
                if(typeof check_lastB != 'undefined')
                {
                    if(check_lastB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            else if(dem_fist == 0 && dem_last !=0)
            {
                teamB  = $(list_td[1]).children("span").eq(1).text();
                str+= '<br><span>'+teamB+'</span>';
                if(dem_last == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';

                var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
                if(typeof check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            else
            {
                teamB  = $(list_td[1]).children("span").eq(2).text();
                if(check_first == 'FirstGoal')
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span><br>';
               else
                  str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span><br>';
                str+= '<span>'+teamB+'</span>';
                var check_firstB =  $(list_td[1]).children("span").eq(3).attr('class');
                var check_lastB  =  $(list_td[1]).children("span").eq(4).attr('class');
                if(typeof  check_firstB != 'undefined')
                {
                    if(check_firstB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }               
                if(typeof check_lastB != 'undefined')
                {
                    if(check_lastB == 'FirstGoal')
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultf.gif"></span>';
                    else
                        str+='<span class="FirstGoal"><img src="/assets/img/app/resultl.gif"></span>';
                }
            }
            
            str+= '</td>';
            str+= '<td style="border: 1px solid #fff;"><span id=HalfFirst_'+j+'>'+teamFistScore+'</span></td>';
            str+= '<td style="border: 1px solid #fff;"><span id=FullScore_'+j+'>'+teamFulltimeScore+'</span></td>';
            str+= '</tr>';
            json_team.teamA          = teamA;
            json_team.teamB          = teamB;
            json_team.teamTime       = teamTime;
            json_team.FirstHalf      = teamFistScore;
            json_team.Fulltime       = teamFulltimeScore;
            list1[j] = json_team;
            json_match._event = event_name;
            json_match.listeam = list1;
            list_result[i] = json_match;
            j++;
        }
    }

    console.log(list_result);
    str+= "</table>";
    var txtday = $("#txtdate").val();

    $("#divshowdata").html(str); 
    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveResultScore",
             data : {
                      l_result:list_result,
                      lang:    "CN",
                      txtday:  txtday,
                    },
             dataType: "json",
             success: function(data)
             { 
                // var trans       = {};
                //     trans._type = "result";
                //     trans._lang = 1;
                //     trans.send  = str;
                // socket.emit('SoccerTODAY',trans);
             }
           });
    
    $("#sp_test").editable();
    $("[id*=HalfFirst_]" ).editable();
    $("[id*=FullScore_]" ).editable();
}

$("#btnclearall" ).bind("click",function(){
        btnclearall();
});

function btnclearall()
{
    $("#ContentConvert").val("");
}