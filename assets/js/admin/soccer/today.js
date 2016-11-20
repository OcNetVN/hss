var tampA;
var tampB;
$(document).ready(function(){
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
	var day 		= new Date(date);
	    showday 	= day.getDay();
	var l_Wek = ["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];
    return  l_Wek[showday];

}
function ConvertSave()
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
	var json_match = null;
	var json_match_old = null;
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

	if(content != "")
	{
		str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
		str = str 	+ '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
		str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
		for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
		{
			var cur_body  = $(list_tbody[i_tbody]);
			var list_td   = cur_body.children("tr").eq(0).children("td");
			var n_td 	  = list_td.length;
			if(n_td==1)
			{
				_dataevent = $(list_td[0]).children("span").children("span").eq(1).text();
				str = str + '<tr  style="background-color:#222222;height:28px;">';
				str = str + '<td colspan="6" style="color:#FFF"><span class="span_event"><b>';
				str = str + _dataevent;
				str = str + '</b></span></td>';
				str = str + '</tr>';
				list1 = [];i1=0;
				list2 = [];i2=0;

			}
			else if(n_td==16)
			{
				_time = $(list_td[0]).children("div").children("div").last().children("span").eq(0).text();
				if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
				{
					i1=0;
					i2=0;
					list1 = [];
					list2 = [];

					var _TeamA    = $(list_td[2]).children("span").eq(0).text();
					var _colTeamA = $(list_td[2]).children("span").eq(0).attr('class');
					var _TeamB 	  = $(list_td[2]).children("span").eq(1).text();
					var _colTeamB = $(list_td[2]).children("span").eq(1).attr('class');

					var _getTimecolor  = $(list_td[0]).children("div").children("div").last().children("span").eq(0).children("span").attr('class');
					str = str + '<tr bgcolor=\"#AAAAAA\" style="height:25px;">';
					str = str + '<td colspan="1" ><b style=\"color:back;\"><span id="span_time">';
					if(typeof _getTimecolor != "undefined")
					{
						var color_time;
						if(_getTimecolor == "Blue")
							color_time = '<span style="color:blue;">Live</span>';
						if(_getTimecolor == "Red")
							color_time = '<span style="color:red;">Live</span>';
						_time = _time.substring(0,5);
						str = str + _time + "</span><br>";
						str = str + color_time;
					}
					else
					{
						var time_case = $(list_td[0]).children("div").children("div").last().children("span").eq(0).html();
						str = str + time_case + "</span><br>";
					}
					str = str + '</td>';

					str = str + '<td colspan="5" >';
					if(_colTeamA == "Blue")
					 	str = str + '<span style="color:blue" class="span_teamA"><b>' + _TeamA + '</b></span></br>';
					else
						str = str + '<span style="color:red" class="span_teamA"><b>' + _TeamA + '</b></span></br>';	
					if(_colTeamB == "Blue")
						str = str + '<span style="color:blue" class="span_teamB"><b>' +_TeamB  +'</b></span>';
					else
						str = str + '<span style="color:red" class="span_teamB"><b>' +_TeamB  +'</b></span>';
					
					str = str + '</td>';
					str = str + '</tr>';

					var _hdp1 	= $(list_td[3]).children("span").first().text();
					var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
					var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
					var _goal1	= $(list_td[6]).children("span").first().text();
					var _Over1	= $(list_td[7]).children("a").children("span").children("span").text();
					var _under1	= $(list_td[8]).children("a").children("span").children("span").text();

					var json_1 ={};
					json_1.hdp = _hdp1;
					json_1.home = _home1;
					json_1.away = _away1;
					json_1.goal = _goal1;
					json_1.over = _Over1;
					json_1.under = _under1;
					list1[i1] = json_1;
					i1++;

					var _hdp2   = $(list_td[9]).children("span").first().text();
					var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
					var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
					var _goal2  = $(list_td[12]).children("span").first().text();
					var _Over2  = $(list_td[13]).children("a").children("span").children("span").text();
					var _under2 = $(list_td[14]).children("a").children("span").children("span").text();

					var json_2 ={};
					json_2.hdp = _hdp2;
					json_2.home = _home2;
					json_2.away = _away2;
					json_2.goal = _goal2;
					json_2.over = _Over2;
					json_2.under = _under2;
					list2[i2] = json_2;
					i2++;


					if(i_tbody < total_tbody -1 )
					{
						var next_body = $(list_tbody[i_tbody+1]);
						var list_td_next   = next_body.children("tr").first().children("td");
						var _time_next = $(list_td_next[0]).children("div").children("div").last().children("span").eq(0).text();
						var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(1).text();
						if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
						{
							str= str +'<tr style="height:20px; background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center" >HDP</th>';
		                    str= str +'<td  align="center">HOME</th>';
		                    str= str +'<td  align="center">AWAY</th>';
		                    str= str +'<td  align="center" >GOAL</th>';
		                    str= str +'<td  align="center">OVER</th>';
		                    str= str +'<td  align="center">UNDER</th>';
		                  	str= str +'</tr>';
		                  	for(var k=0; k<list1.length;k++)
		                  	{
		                  		var json1 = list1[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\"  style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
								str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
								str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></b></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
								str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
								str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
		                  		str = str + '</tr>';
		                  	}

							str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center" >FH.HDP</th>';
		                    str= str +'<td  align="center">HOME</th>';
		                    str= str +'<td  align="center">AWAY</th>';
		                    str= str +'<td  align="center" >FH.G</th>';
		                    str= str +'<td  align="center">OVER</th>';
		                    str= str +'<td  align="center">UNDER</th>';
		                  	str= str +'</tr>';
							for(var k=0; k<list2.length;k++)
		                  	{
		                  		var json1 = list2[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
								str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
								str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
								str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
								str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
		                  		str = str + '</tr>';
		                  	}

		                  	// đếm số chẵn lẽ
		                  	j++;
		                }					
					}
					else
					{
						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >HDP</th>';
	                    str= str +'<td  align="center">HOME</th>';
	                    str= str +'<td  align="center">AWAY</th>';
	                    str= str +'<td  align="center" >GOAL</th>';
	                    str= str +'<td  align="center">OVER</th>';
	                    str= str +'<td  align="center">UNDER</th>';
	                  	str= str +'</tr>';
	                  	for(var k=0; k<list1.length;k++)
	                  	{
	                  		var json1 = list1[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style="font-weight:bold;">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
							str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
							str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
							str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
							str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
	                  		str = str + '</tr>';
	                  	}

						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >FH.HDP</th>';
	                    str= str +'<td  align="center">HOME</th>';
	                    str= str +'<td  align="center">AWAY</th>';
	                    str= str +'<td  align="center" >FH.G</th>';
	                    str= str +'<td  align="center">OVER</th>';
	                    str= str +'<td  align="center">UNDER</th>';
	                  	str= str +'</tr>';
						for(var k=0; k<list2.length;k++)
	                  	{
	                  		var json1 = list2[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
							str = str + '<td align=\"center\"><b><span id="home_'+k+'">'+ json1.home+ '</span></td>';
							str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
							str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
							str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
	                  		str = str + '</tr>';
	                  	}
					}
				}
				else
				{
					if(i1>0)
					{
						/////
						var _hdp1 	= $(list_td[3]).children("span").first().text();
						var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
						var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
						var _goal1	= $(list_td[6]).children("span").first().text();
						var _Over1	= $(list_td[7]).children("a").children("span").children("span").text();
						var _under1	= $(list_td[8]).children("a").children("span").children("span").text();

						var json_1 ={};
						json_1.hdp = _hdp1;
						json_1.home = _home1;
						json_1.away = _away1;
						json_1.goal = _goal1;
						json_1.over = _Over1;
						json_1.under = _under1;
						list1[i1] = json_1;
						i1++;
						
					}

					if(i2>0)
					{
						var _hdp2   = $(list_td[9]).children("span").first().text();
						var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
						var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
						var _goal2  = $(list_td[12]).children("span").first().text();
						var _Over2  = $(list_td[13]).children("a").children("span").children("span").text();
						var _under2 = $(list_td[14]).children("a").children("span").children("span").text();

						var json_2 ={};
						json_2.hdp = _hdp2;
						json_2.home = _home2;
						json_2.away = _away2;
						json_2.goal = _goal2;
						json_2.over = _Over2;
						json_2.under = _under2;
						list2[i2] = json_2;
						i2++;
					}

					if(i_tbody < total_tbody -1 )
					{
						var next_body = $(list_tbody[i_tbody+1]);
						var list_td_next   = next_body.children("tr").first().children("td");
						var _time_next = $(list_td_next[0]).children("div").children("div").last().children("span").eq(0).text();
						var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(1).text();
						if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
						{
							str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center">HDP</th>';
		                    str= str +'<td  align="center">HOME</th>';
		                    str= str +'<td  align="center">AWAY</th>';
		                    str= str +'<td  align="center" >GOAL</th>';
		                    str= str +'<td  align="center">OVER</th>';
		                    str= str +'<td  align="center">UNDER</th>';
		                  	str= str +'</tr>';
		                  	for(var k=0; k<list1.length;k++)
		                  	{
		                  		var json1 = list1[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\" >';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.goal+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
		                  		str = str + '</tr>';
		                  	}

							str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center" >FH.HDP</th>';
		                    str= str +'<td  align="center">HOME</th>';
		                    str= str +'<td  align="center">AWAY</th>';
		                    str= str +'<td  align="center" >FH.G</th>';
		                    str= str +'<td  align="center">OVER</th>';
		                    str= str +'<td  align="center">UNDER</th>';
		                  	str= str +'</tr>';
							for(var k=0; k<list2.length;k++)
		                  	{
		                  		var json1 = list2[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\" style="font-weight:bold;">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style="font-weight:bold;">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
								str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
								str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
								str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
								str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
		                  		str = str + '</tr>';
		                  	}

		                  	// dếm chẵ lẽ 
		                  	j++;
		                }					
					}
					else
					{
						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >HDP</th>';
	                    str= str +'<td  align="center">HOME</th>';
	                    str= str +'<td  align="center">AWAY</th>';
	                    str= str +'<td  align="center" >GOAL</th>';
	                    str= str +'<td  align="center">OVER</th>';
	                    str= str +'<td  align="center">UNDER</th>';
	                  	str= str +'</tr>';
	                  	for(var k=0; k<list1.length;k++)
	                  	{
	                  		var json1 = list1[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.home + '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.goal+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
	                  		str = str + '</tr>';
	                  	}

						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >FH.HDP</th>';
	                    str= str +'<td  align="center">HOME</th>';
	                    str= str +'<td  align="center">AWAY</th>';
	                    str= str +'<td  align="center" >FH.G</th>';
	                    str= str +'<td  align="center">OVER</th>';
	                    str= str +'<td  align="center">UNDER</th>';
	                  	str= str +'</tr>';
						for(var k=0; k<list2.length;k++)
	                  	{
	                  		var json1 = list2[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
							str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
							str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
							str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
							str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
	                  		str = str + '</tr>';
	                  	}
					}
				}
			}
		}
		str = str +'</table>';
		str = str + '</td>';
		str = str + '</tr>';
		str = str + '</table>';
	}
	else
	{
		str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  >';
    	str = str   + '<tr><td align="center" style="padding-bottom:40px;padding-top:100px;">';
    	str = str   + '<strong style="padding:10px; border:2px #F30 solid; width: 200px; text-align:center; background:#CCC;">No message </strong></td></tr>';
    	str = str   + '</table>';
	}
	//socket.emit('SoccerTODAY',str);
	$("#div_show_Result").html(str); 
    
    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtml",
             data : {
             	       save_today:str,
             	       lang:"EN"
                    },
             dataType: "html",
             success: function(data)
             { 
             	var trans       = {};
             	    trans._type = "today";
             	    trans._lang = 1;
             	    trans.send  = str;
             	socket.emit('SoccerTODAY',trans);
				$("#div_show_Result").html(str); 
             }
           });
}

function getOutdate()
{
	var str_date = "";
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
    str_date = hours+":"+minute + " " + day + "/" + month + " " + weeken;
    return str_date;
}

function ConvertSaveToday()
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
	var json_match = null;
	var json_match_old = null;
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
    
    if(content != "")
    {
		str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
		str = str 	+ '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
		str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;">';
		for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
		{
			var cur_body  = $(list_tbody[i_tbody]);
			var list_td   = cur_body.children("tr").eq(0).children("td");
			var n_td 	  = list_td.length;
			if(n_td==1)
			{
				_dataevent = $(list_td[0]).children("span").children("span").eq(1).text();
				str = str + '<tr  style="background-color:#222222;height:28px;">';
				str = str + '<td colspan="6" style="color:#FFF"><span class="span_event"><b>';
				str = str + _dataevent;
				str = str + '</b></span></td>';
				str = str + '</tr>';
				list1 = [];i1=0;
				list2 = [];i2=0;

			}
			else if(n_td==16)
			{
				_time = $(list_td[0]).children("div").children("div").last().children("span").eq(0).text();
				if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
				{
					i1=0;
					i2=0;
					list1 = [];
					list2 = [];

					var _TeamA    = $(list_td[2]).children("span").eq(0).text();
					var _colTeamA = $(list_td[2]).children("span").eq(0).attr('class');
					var _TeamB 	  = $(list_td[2]).children("span").eq(1).text();
					var _colTeamB = $(list_td[2]).children("span").eq(1).attr('class');
					var _getTimecolor  = $(list_td[0]).children("div").children("div").last().children("span").eq(0).children("span").attr('class');
					str = str + '<tr bgcolor=\"#AAAAAA\" style="height:25px;">';
					str = str + '<td colspan="1" ><b style=\"color:back;\"><span id="span_time">';

					if(typeof _getTimecolor != "undefined")
					{
						var color_time;
						if(_getTimecolor == "Blue")
							color_time = '<span style="color:blue;">滚球</span>';
						if(_getTimecolor == "Red")
							color_time = '<span style="color:red;">滚球</span>';
						_time = _time.substring(0,5);
						str = str + _time + "</span><br>";
						str = str + color_time;
					}
					else
					{
						var time_case = $(list_td[0]).children("div").children("div").last().children("span").eq(0).html();
						str = str + time_case + "</span><br>";
					}

					str = str +'</td>';
					str = str + '<td colspan="5" >';
					if(_colTeamA == "Blue")
					 	str = str + '<span style="color:blue" class="span_teamA"><b>' + _TeamA + '</b></span></br>';
					else
						str = str + '<span style="color:red" class="span_teamA"><b>' + _TeamA + '</b></span></br>';	
					if(_colTeamB == "Blue")
						str = str + '<span style="color:blue" class="span_teamB"><b>' +_TeamB  +'</b></span>';
					else
						str = str + '<span style="color:red" class="span_teamB"><b>' +_TeamB  +'</b></span>';
					
					str = str + '</td>';
					str = str + '</tr>';

					var _hdp1 	= $(list_td[3]).children("span").first().text();
					var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
					var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
					var _goal1	= $(list_td[6]).children("span").first().text();
					var _Over1	= $(list_td[7]).children("a").children("span").children("span").text();
					var _under1	= $(list_td[8]).children("a").children("span").children("span").text();

					var json_1 ={};
					json_1.hdp = _hdp1;
					json_1.home = _home1;
					json_1.away = _away1;
					json_1.goal = _goal1;
					json_1.over = _Over1;
					json_1.under = _under1;
					list1[i1] = json_1;
					i1++;

					var _hdp2   = $(list_td[9]).children("span").first().text();
					var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
					var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
					var _goal2  = $(list_td[12]).children("span").first().text();
					var _Over2  = $(list_td[13]).children("a").children("span").children("span").text();
					var _under2 = $(list_td[14]).children("a").children("span").children("span").text();

					var json_2 ={};
					json_2.hdp = _hdp2;
					json_2.home = _home2;
					json_2.away = _away2;
					json_2.goal = _goal2;
					json_2.over = _Over2;
					json_2.under = _under2;
					list2[i2] = json_2;
					i2++;


					if(i_tbody < total_tbody -1 )
					{
						var next_body = $(list_tbody[i_tbody+1]);
						var list_td_next   = next_body.children("tr").first().children("td");
						var _time_next = $(list_td_next[0]).children("div").children("div").last().children("span").eq(0).text();
						var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(1).text();
						if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
						{
							str= str +'<tr style="height:20px; background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center" >亚洲盘</th>';
		                    str= str +'<td  align="center">主</th>';
		                    str= str +'<td  align="center">客</th>';
		                    str= str +'<td  align="center" >总进球</th>';
		                    str= str +'<td  align="center">大</th>';
		                    str= str +'<td  align="center">小</th>';
		                  	str= str +'</tr>';
		                  	for(var k=0; k<list1.length;k++)
		                  	{
		                  		var json1 = list1[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\"  style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
								str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
								str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></b></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
								str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
								str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
		                  		str = str + '</tr>';
		                  	}

							str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center" >上半场</th>';
		                    str= str +'<td  align="center">主</th>';
		                    str= str +'<td  align="center">客</th>';
		                    str= str +'<td  align="center" >总进球</th>';
		                    str= str +'<td  align="center">大</th>';
		                    str= str +'<td  align="center">小</th>';
		                  	str= str +'</tr>';
							for(var k=0; k<list2.length;k++)
		                  	{
		                  		var json1 = list2[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
								str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
								str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
								str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
								str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
		                  		str = str + '</tr>';
		                  	}

		                  	// đếm số chẵn lẽ
		                  	j++;
		                }					
					}
					else
					{
						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >亚洲盘</th>';
	                    str= str +'<td  align="center">主</th>';
	                    str= str +'<td  align="center">客</th>';
	                    str= str +'<td  align="center" >总进球</th>';
	                    str= str +'<td  align="center">大</th>';
	                    str= str +'<td  align="center">小</th>';
	                  	str= str +'</tr>';
	                  	for(var k=0; k<list1.length;k++)
	                  	{
	                  		var json1 = list1[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style="font-weight:bold;">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
							str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
							str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
							str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
							str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
	                  		str = str + '</tr>';
	                  	}

						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >上半场</th>';
	                    str= str +'<td  align="center">主</th>';
	                    str= str +'<td  align="center">客</th>';
	                    str= str +'<td  align="center" >总半场</th>';
	                    str= str +'<td  align="center">大</th>';
	                    str= str +'<td  align="center">小</th>';
	                  	str= str +'</tr>';
						for(var k=0; k<list2.length;k++)
	                  	{
	                  		var json1 = list2[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
							str = str + '<td align=\"center\"><b><span id="home_'+k+'">'+ json1.home+ '</span></td>';
							str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
							str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
							str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
	                  		str = str + '</tr>';
	                  	}
					}
				}
				else
				{
					if(i1>0)
					{
						/////
						var _hdp1 	= $(list_td[3]).children("span").first().text();
						var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
						var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
						var _goal1	= $(list_td[6]).children("span").first().text();
						var _Over1	= $(list_td[7]).children("a").children("span").children("span").text();
						var _under1	= $(list_td[8]).children("a").children("span").children("span").text();

						var json_1 ={};
						json_1.hdp = _hdp1;
						json_1.home = _home1;
						json_1.away = _away1;
						json_1.goal = _goal1;
						json_1.over = _Over1;
						json_1.under = _under1;
						list1[i1] = json_1;
						i1++;
						
					}

					if(i2>0)
					{
						var _hdp2   = $(list_td[9]).children("span").first().text();
						var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
						var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
						var _goal2  = $(list_td[12]).children("span").first().text();
						var _Over2  = $(list_td[13]).children("a").children("span").children("span").text();
						var _under2 = $(list_td[14]).children("a").children("span").children("span").text();

						var json_2 ={};
						json_2.hdp = _hdp2;
						json_2.home = _home2;
						json_2.away = _away2;
						json_2.goal = _goal2;
						json_2.over = _Over2;
						json_2.under = _under2;
						list2[i2] = json_2;
						i2++;
					}

					if(i_tbody < total_tbody -1 )
					{
						var next_body = $(list_tbody[i_tbody+1]);
						var list_td_next   = next_body.children("tr").first().children("td");
						var _time_next = $(list_td_next[0]).children("div").children("div").last().children("span").eq(0).text();
						var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(1).text();
						if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
						{
							str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center">亚洲盘</th>';
		                    str= str +'<td  align="center">主</th>';
		                    str= str +'<td  align="center">客</th>';
		                    str= str +'<td  align="center" >总进球</th>';
		                    str= str +'<td  align="center">大</th>';
		                    str= str +'<td  align="center">小</th>';
		                  	str= str +'</tr>';
		                  	for(var k=0; k<list1.length;k++)
		                  	{
		                  		var json1 = list1[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\" >';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.goal+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
		                  		str = str + '</tr>';
		                  	}

							str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
		                    str= str +'<td  align="center" >上半场</th>';
		                    str= str +'<td  align="center">主</th>';
		                    str= str +'<td  align="center">客</th>';
		                    str= str +'<td  align="center" >总半场</th>';
		                    str= str +'<td  align="center">大</th>';
		                    str= str +'<td  align="center">小</th>';
		                  	str= str +'</tr>';
							for(var k=0; k<list2.length;k++)
		                  	{
		                  		var json1 = list2[k];
		                  		if(j%2 == 0)
				                {
									str = str + '<tr bgcolor=\"#abc4f5\" style="font-weight:bold;">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style="font-weight:bold;">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
								str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
								str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
								str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
								str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
		                  		str = str + '</tr>';
		                  	}

		                  	// dếm chẵ lẽ 
		                  	j++;
		                }					
					}
					else
					{
						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >亚洲盘</th>';
	                    str= str +'<td  align="center">主</th>';
	                    str= str +'<td  align="center">客</th>';
	                    str= str +'<td  align="center" >总进球</th>';
	                    str= str +'<td  align="center">大</th>';
	                    str= str +'<td  align="center">小</th>';
	                  	str= str +'</tr>';
	                  	for(var k=0; k<list1.length;k++)
	                  	{
	                  		var json1 = list1[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.home + '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.goal+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
	                  		str = str + '</tr>';
	                  	}

						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >上半场</th>';
	                    str= str +'<td  align="center">主</th>';
	                    str= str +'<td  align="center">客</th>';
	                    str= str +'<td  align="center" >总半场</th>';
	                    str= str +'<td  align="center">大</th>';
	                    str= str +'<td  align="center">小</th>';
	                  	str= str +'</tr>';
						for(var k=0; k<list2.length;k++)
	                  	{
	                  		var json1 = list2[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><span id="hdp_'+k+'">'+ json1.hdp+ '</span></td>';
							str = str + '<td align=\"center\"><span id="home_'+k+'">'+ json1.home+ '</span></td>';
							str = str + '<td align=\"center\"><span id="away_'+k+'" >'+ json1.away+ '</span></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><span id="goal'+k+'">'+ json1.goal+ '</span></td>';
							str = str + '<td align=\"center\"><span id="over'+k+'">'+ json1.over+ '</span></td>';
							str = str + '<td align=\"center\"><span id="under'+k+'">'+ json1.under+ '</span></td>';
	                  		str = str + '</tr>';
	                  	}
					}
				}
			}
		}
		str = str +'</table>';
		str = str + '</td>';
		str = str + '</tr>';
		str = str + '</table>';
	}
	else
	{
		str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  >';
    	str = str   + '<tr><td align="center" style="padding-bottom:40px;padding-top:100px;">';
    	str = str   + '<strong style="padding:10px; border:2px #F30 solid; width: 200px; text-align:center; background:#CCC;">无消息</strong></td></tr>';
    	str = str   + '</table>';
	}

	$("#div_show_Result").html(str); 
    $.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtml",
             data : {
             			save_today:str,
             			lang:"CN"
             		},
             dataType: "html",
             success: function(data)
             { 
             	var trans       = {};
             	    trans._type = "today";
             	    trans._lang = 2;
             	    trans.send  = str;
             	socket.emit('SoccerTODAY',trans);
				$("#div_show_Result").html(str); 
             }
           });
}

function ClearAll()
{
	$("#ContentConvert").val("");
}

function SaveTodayNoSoccer()
{
    var str_en = "";
    var outdate    = "Update "  + getOutdate();
    var outdate_cn = "更新 "    + getOutdate();
    	str_en = str_en   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;"><tr><td>';
		str_en = str_en   + outdate;
		str_en = str_en   + '</td></tr></table>';
	    str_en = str_en   + '<table width="100%" cellspacing="0" cellpadding="0"  >';
    	str_en = str_en   + '<tr><td align="center" style="padding-bottom:40px;padding-top:100px;">';
    	str_en = str_en   + '<strong style="padding:10px; border:2px #F30 solid; width: 200px; text-align:center; background:#CCC;">Today No Soccer Match</strong></td></tr>';
    	str_en = str_en   + '</table>';
    var str_cn = "";
    	str_cn = str_cn   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;"><tr><td>';
		str_cn = str_cn   +  outdate_cn;
		str_cn = str_cn   + '</td></tr></table>';
        str_cn = str_cn   + '<table width="100%" cellspacing="0" cellpadding="0"  >';
    	str_cn = str_cn   + '<tr><td align="center" style="padding-bottom:40px;padding-top:100px;">';
    	str_cn = str_cn   + '<strong style="padding:10px; border:2px #F30 solid; width: 200px; text-align:center; background:#CCC;">今天没有足球赛事</strong></td></tr>';
    	str_cn = str_cn   + '</table>';
    
	$.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtmlTodayBoth",
             data : {
             	       str_en:str_en,
             	       str_cn: str_cn
             	   },
             dataType: "text",
             success: function(data)
             {
             	var test = JSON.parse(data);
             	var lang_show = test.lang;
             	var str_show  = test._string;
             	var s_lang = "";
             	if(lang_show == "EN")
             	{
             		s_lang = 1;
             		$("#div_show_Result").html(str_en);
             	}
             	else
             	{
             		s_lang = 2; 
             		$("#div_show_Result").html(str_cn);
             	}

             	var trans       = {};
             	    trans._type = "today";
             	    trans._lang = s_lang;
             	    trans.send  = str_show; 
             	socket.emit('SoccerTODAY',trans);
				
             }
           });
}

// function ConvertSave_new()
// {
// 	var list_result = [];
// 	var i =0;
// 	var n_tbody =0;

// 	var content = $("#ContentConvert").val();
// 	var TableObject = $($.parseHTML(content));
// 	var json_match = null;
// 	var json_match_old = null;
//     var total_tbody =TableObject.children("tbody").length;

// 	var tempA 		= "";
// 	var tempB 		= "";
// 	var TempTitle 	= "";

// 	var list1 =[];
// 	var list2 =[];
// 	var i1=0;
// 	var i2=0;
// 	var _dataevent ="";
// 	var _time ="";
// 	var _more = "";

// 	var j =0;

// 	TableObject.children("tbody").each(function()
// 	{
// 		n_tbody++;
// 		var n    = $(this).children("tr").first();
// 		var n_td = n.children("td").length;
		
// 		if(n_td == 1)
// 		{
// 			_dataevent     = n.children("td").children("span").children("span").eq(1).text();
// 			if(_dataevent!="" && typeof(_dataevent) != undefined)
// 			{
// 				TempTitle  = _dataevent;
// 				if(json_match!=null)
// 				{
// 					json_match.list1 = list1;
// 					json_match.list2 = list2;

// 					list_result [i] = json_match;
// 					i++;
// 					//console.log(json_match + " ||| Event");
// 				}
// 				list1 = [];i1=0;
// 				list2 = [];i2=0;
				
// 			}
// 		}
// 		else if(n_td == 16)
// 		{
// 			_time = n.children("td").eq(0).children("div").children("div").last().children("span").eq(0).text();
// 			if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
// 			{

// 				json_match = {};
// 				_more = n.children("td").eq(15).children("span").first().text();			
// 				json_match.more = _more;
// 				var _TeamA   = n.children("td").eq(2).children("span").eq(0).text();
// 				var _TeamB 	= n.children("td").eq(2).children("span").eq(1).text();
// 				console.log("Doi A:" + _TeamA + "Doi B:" + _TeamB);
// 				json_match.Time = _time;
// 				json_match.PlayerA =_TeamA;
// 				json_match.PlayerB =_TeamB;
// 				json_match.EventName = _dataevent;



				
// 				// if(tempA!=_TeamA && tempB!=_TeamB && j>=1)
// 				// {
// 				// 	//console.log("  j=" + j.toString());
					
// 				// 	json_match.Time = _time;
// 				// 	json_match.PlayerA =tempA;
// 				// 	json_match.PlayerB =tempB;
// 				// 	tempA = _TeamA;
// 				// 	tempB = _TeamB;
// 				// 	json_match.list1 = list1;
// 				// 	json_match.list2 = list2;
// 				// 	i1=0;
// 				// 	i2=0;
// 				// 	list1 =[];
// 				// 	list2 =[];
// 				// 	list_result[i] = json_match;
// 				// 	i++;
// 				// 	j=1;
// 				// 	// console.log("A: "  + _TeamA + " ||||  j=" + j.toString());
// 				// 	// console.log(json_match );
// 				// 	// console.log(" JJJ");
// 				// }

// 				// json_match.Time = _time;
// 				// json_match.PlayerA =_TeamA;
// 				// json_match.PlayerB =_TeamB;
				
// 				// json_match.EventName = _dataevent;
				 
// 				// json_match.more = _more;				

// 				var _hdp1 	= n.children("td").eq(3).children("span").first().text();
// 				var _home1	= n.children("td").eq(4).children("a").children("span").children("span").text();
// 				var _away1	= n.children("td").eq(5).children("a").children("span").children("span").text();
// 				var _goal1	= n.children("td").eq(6).children("span").first().text();
// 				var _Over1	= n.children("td").eq(7).children("a").children("span").children("span").text();
// 				var _under1	= n.children("td").eq(8).children("a").children("span").children("span").text();

// 				var json_1 ={};
// 				json_1.hdp = _hdp1;
// 				json_1.home = _home1;
// 				json_1.away = _away1;
// 				json_1.goal = _goal1;
// 				json_1.over = _Over1;
// 				json_1.under = _under1;
// 				list1[i1] = json_1;
// 				i1++;

// 				var _hdp2   = n.children("td").eq(9).children("span").first().text();
// 				var _home2  = n.children("td").eq(10).children("a").children("span").children("span").text();
// 				var _away2  = n.children("td").eq(11).children("a").children("span").children("span").text();
// 				var _goal2  = n.children("td").eq(12).children("span").first().text();
// 				var _Over2  = n.children("td").eq(13).children("a").children("span").children("span").text();
// 				var _under2 = n.children("td").eq(14).children("a").children("span").children("span").text();

// 				var json_2 ={};
// 				json_2.hdp = _hdp2;
// 				json_2.home = _home2;
// 				json_2.away = _away2;
// 				json_2.goal = _goal2;
// 				json_2.over = _Over2;
// 				json_2.under = _under2;
// 				list2[i2] = json_2;
// 				i2++;

// 				j=1;
// 			}
// 			else
// 			{
// 				j++;
// 				var _hdp1 	= n.children("td").eq(3).children("span").first().text();
// 				var _home1	= n.children("td").eq(4).children("a").children("span").children("span").text();
// 				var _away1	= n.children("td").eq(5).children("a").children("span").children("span").text();
// 				var _goal1	= n.children("td").eq(6).children("span").first().text();
// 				var _Over1	= n.children("td").eq(7).children("a").children("span").children("span").text();
// 				var _under1	= n.children("td").eq(8).children("a").children("span").children("span").text();

// 				var json_1 ={};
// 				json_1.hdp = _hdp1;
// 				json_1.home = _home1;
// 				json_1.away = _away1;
// 				json_1.goal = _goal1;
// 				json_1.over = _Over1;
// 				json_1.under = _under1;
// 				list1[i1] = json_1;
// 				i1++;

// 				var _hdp2   = n.children("td").eq(9).children("span").first().text();
// 				var _home2  = n.children("td").eq(10).children("a").children("span").children("span").text();
// 				var _away2  = n.children("td").eq(11).children("a").children("span").children("span").text();
// 				var _goal2  = n.children("td").eq(12).children("span").first().text();
// 				var _Over2  = n.children("td").eq(13).children("a").children("span").children("span").text();
// 				var _under2 = n.children("td").eq(14).children("a").children("span").children("span").text();

// 				var json_2 ={};
// 				json_2.hdp = _hdp2;
// 				json_2.home = _home2;
// 				json_2.away = _away2;
// 				json_2.goal = _goal2;
// 				json_2.over = _Over2;
// 				json_2.under = _under2;
// 				list2[i2] = json_2;
// 				i2++;
// 			}

// 			if(n_tbody===total_tbody)
// 			{
// 				json_match.list1 = list1;
// 				json_match.list2 = list2;
// 				list_result[i] = json_match;
// 				//console.log(json_match);
// 				//console.log(" ||| Last")
// 			}
// 		}
// 	});
   
//     //console.log(list_result);
// 	//console.log(list_result.length);
// }


String.prototype.insertAt=function(index, string) { 
  return this.substr(0, index) + string + this.substr(index);
}