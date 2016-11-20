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

function ConvertSoccerLive()
{
	var list_result = [];
	var i = 0;
	var n_tbody = 0;
	var list1 = [];
	var list2 = [];
	var i1    = 0;
	var i2    = 0;
    var j = 0;
	var content       = $("#ContentConvert").val();
	var TableObject   = $($.parseHTML(content));
    var total_tbody   = TableObject.children("tbody").length;
	var list_tbody    = TableObject.children("tbody");
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
		str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  >';
		str = str 	+ '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
		str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  >';
		for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
		{
			var cur_body  = $(list_tbody[i_tbody]);
			var list_td   = cur_body.children("tr").eq(0).children("td");
			var n_td 	  = list_td.length;
			if(n_td==1)
			{
				_dataevent = $(list_td[0]).children("span").children("span").eq(1).text();
				str = str + '<tr  style="background-color:#222222;height:28px;">';
				str = str + '<td colspan="6" style="color:#FFF"><b>';
				str = str + _dataevent;
				str = str + '</b></td>';
				str = str + '</tr>';
				list1 = [];i1=0;
				list2 = [];i2=0;
				

			}
			else if(n_td==16)
			{
				_time = $(list_td[0]).children("div").children("div").last().children("span").eq(0).text();
				if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
				{
					i1 = 0;
					i2 = 0;
					list1 = [];
					list2 = [];
					var time_1 = _time.substring(5);
					var time_2 = $(list_td[0]).children("div").children("div").last().children("span").eq(1).text();
					//var poRedCard = 0;
					//var poClassB  = 0;
					str = str + '<tr bgcolor=\"#AAAAAA\" style="height:25px;">';
					str = str + '<td colspan="1" ><b style="color:black;">';
					str = str + time_1;
					str = str + '</b><br><b style="color:red;">'+ time_2 +   '</b></td>';
					str = str + '<td colspan="5" >';

					var team_cout = $(list_td[2]).children("span").length;
					var tem_show  = $(list_td[2]).html();
					str +=tem_show;
					// for(var i=0; i < team_cout;i++)
					// {
					// 	var _TeamA   = $(list_td[2]).children("span").eq(0).text();
					// 	var _colTeamA    = $(list_td[2]).children("span").eq(0).attr('class');
					// 	if(_colTeamA == "Blue")
					// 		str = str + '<span style="color:blue;"><b>' + _TeamA + '</b></span>';
					// 	else
					// 		str = str + '<span style="color:red;"><b>' + _TeamA + '</b></span>';
					// 	var findReadCard = $(list_td[2]).children("span").eq(i+1).attr('class');
					// 	if(findReadCard == "red-c ard")
					// 	{
					// 			poRedCard++;
					// 			console.log('Dem RedCard' + poRedCard);
					// 	}
					// 	var findClassB   = $(list_td[2]).children("span").eq(i+1).attr('class');
					// 	if(findClassB == "Blue" || findClassB == "Red")
					// 	{
					// 		poClassB++;
					// 		console.log('Dem Class' + poClassB);
					// 		// var _TeamB 		 = $(list_td[2]).children("span").eq(i+1).text();
					// 		// if(findClassB == "Blue")
					//   //  			str = str + '<br><span style="color:blue"><b>' +_TeamB  +'</b></span>';
					// 		// else
					// 		// 	str = str + '<br><span style="color:red;"><b>' + _TeamB + '</b></span>';
					// 	}
					// }
					
					// if(dem_last > 0)
					// {
					// 	for(var j=0; j <dem_last;j++)
					// 	{
					// 		str = str + '<span class="redcard"><img src="/assets/img/app/redcard.gif"></span>';
					// 	}
					// }
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</td>';
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
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
	                    str= str +'<td  align="center" >FG.G</th>';
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
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.goal+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.over + '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.under +'</b></td>';
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><b>'+ json1.goal+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
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
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\" >';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><b>'+ json1.goal+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
	                  		str = str + '</tr>';
	                  	}
					}
				}
			}
		}
		str = str +'</table>';
		str = str + '</td></tr>';
		str = str + '</table>';
    }
    else
    {
    	str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  >';
    	str = str   + '<tr><td align="center" style="padding-bottom:40px;padding-top:100px;">';
    	str = str   + '<strong style="padding:10px; border:2px #F30 solid; width: 200px; text-align:center; background:#CCC;">No message</strong></td></tr>';
    	str = str   + '</table>';
    }
		//socket.emit('SoccerTODAY',str);
		$("#divshowdata").html(str);
		$.ajax({
	             type : "POST",
	             url  : "../admin/home_controller/SaveFileHtmlLvie",
	             data : {
	             			save_today:str,
	             			lang:"EN"
	                    },
	             dataType: "html",
	             success: function(data)
	             { 
	             	var trans       = {};
	             	    trans._type = "live";
	             	    trans._lang = 1;
	             	    trans.send  = str;
	             	socket.emit('SoccerTODAY',trans);
					$("#div_show_Result").html(str); 
	             }
	           });
}

function ConvertSoccerLiveCN()
{

	var list_result = [];
	var i = 0;
	var n_tbody = 0;
	var list1 = [];
	var list2 = [];
	var i1    = 0;
	var i2    = 0;
    var j = 0;
	var content       = $("#ContentConvert").val();
	var TableObject   = $($.parseHTML(content));
    var total_tbody   = TableObject.children("tbody").length;
	var list_tbody    = TableObject.children("tbody");
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
				str = str + '<td colspan="6" style="color:#FFF"><b>';
				str = str + _dataevent;
				str = str + '</b></td>';
				str = str + '</tr>';
				list1 = [];i1=0;
				list2 = [];i2=0;
			}
			else if(n_td==16)
			{
				_time = $(list_td[0]).children("div").children("div").last().children("span").eq(0).text();
				if(_time.trim()!= null && _time.trim() != "" && typeof(_time)!= undefined)
				{
					i1 = 0;
					i2 = 0;
					list1 = [];
					list2 = [];
					// var dem = 0;
	    //             var dem_last = 0;
					// var _TeamA   	 = $(list_td[2]).children("span").eq(0).text();
					// var _colTeamA    = $(list_td[2]).children("span").eq(0).attr('class');
					// for(var i = 1; i<5;i++)
					// {
					// 	var red_card = $(list_td[2]).children("span").eq(i).attr('class');
					// 	if(red_card == 'red-card')
					// 	{
					// 		dem++;
					// 	}
					// }
					// var _TeamB 	  = $(list_td[2]).children("span").eq(dem+1).text();
	    //             var _col TeamB = $(list_td[2]).children("span").eq(dem+1).attr('class');
					var time_1 = _time.substring(5);
					var time_2 = $(list_td[0]).children("div").children("div").last().children("span").eq(1).text();
					//var poRedCard = 0;
					//var poClassB  = 0;
					str = str + '<tr bgcolor=\"#AAAAAA\" style="height:25px;">';
					str = str + '<td colspan="1" ><b style="color:black;">';
					str = str + time_1;
					str = str + '</b><br><b style="color:red;">'+ time_2 +   '</b></td>';
					str = str + '<td colspan="5" >';
					var tem_show  = $(list_td[2]).html();
					str +=tem_show;
					// if(_colTeamA == "Blue")
					// 	str = str + '<span style="color:blue;"><b>' + _TeamA + '</b></span>';
					// else
					// 	str = str + '<span style="color:red;"><b>' + _TeamA + '</b></span>';
					
					//  // set red card for team A
					// if(dem > 0)
					// {
					// 	for(var j=0; j <dem;j++)
					// 	{
					// 		str = str + '<span class="redcard"><img src="/assets/img/app/redcard.gif"></span>';
					// 	}
					// }

					// if(_colTeamB == "Blue")
					//    str = str + '<br><span style="color:blue"><b>' +_TeamB  +'</b></span>';
					// else
					// 	str = str + '<br><span style="color:red;"><b>' + _TeamB + '</b></span>';

					// // set red card for team B
					// if(dem == 0)
					// {
					//     for(var i = 2 ; i<6;i++)
					//     {
					//     	var red_card = $(list_td[2]).children("span").eq(i).attr('class');
					// 		if(red_card == 'red-card')
					// 		{
					// 			dem_last++;
					// 		}
					//     }
					// }
					// else
					// {
					// 	for(var i = dem+2; i < dem+7;i++)
					// 	{
					// 		var red_card = $(list_td[2]).children("span").eq(i).attr('class');
					// 		if(red_card == 'red-card')
					// 		{
					// 			dem_last++;
					// 		}
					// 	}
					// }

					// if(dem_last > 0)
					// {
					// 	for(var j=0; j <dem_last;j++)
					// 	{
					// 		str = str + '<span class="redcard"><img src="/assets/img/app/redcard.gif"></span>';
					// 	}
					// }

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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</td>';
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
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
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.goal+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.over + '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.under +'</b></td>';
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
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
									str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\">';
								}
								else
								{
									str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
								}
		                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
								str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><b>'+ json1.goal+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
								str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
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
								str = str + '<tr bgcolor=\"#abc4f5\" style=\"font-weight:bold;\" >';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\">';
							}
	                  		str = str + '<td align=\"center\" bgcolor=\"#FFFFF\"><b>'+ json1.hdp+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.home+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.away+ '</b></td>';
							str = str + '<td align=\"center\" bgcolor=\"#FFFFF\" ><b>'+ json1.goal+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.over+ '</b></td>';
							str = str + '<td align=\"center\"><b>'+ json1.under+ '</b></td>';
	                  		str = str + '</tr>';
	                  	}
					}
				}
			}
		}
	}
	else
    {
    	str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  >';
    	str = str   + '<tr><td align="center" style="padding-bottom:40px;padding-top:100px;">';
    	str = str   + '<strong style="padding:10px; border:2px #F30 solid; width: 200px; text-align:center; background:#CCC;">无消息</strong></td></tr>';
    	str = str   + '</table>';
    }
	str = str +'</table>';
	str = str 	+ '</td></tr>';
	str = str +'</table>';

	//socket.emit('SoccerTODAY',str);
	$("#divshowdata").html(str);
	$.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtmlLvie",
             data : {
             	       save_today:str,
             	       lang: "CN"
             	   },
             dataType: "html",
             success: function(data)
             { 
             	 var trans       = {};
             	    trans._type = "live";
             	    trans._lang = 2;
             	    trans.send  = str; 
             	socket.emit('SoccerTODAY',trans);
             }
           });
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
             url  : "../admin/home_controller/SaveFileHtmlLvieBoth",
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
             		$("#divshowdata").html(str_en);
             	}
             	else
             	{
             		s_lang = 2; 
             		$("#divshowdata").html(str_cn);
             	}

             	var trans       = {};
             	    trans._type = "live";
             	    trans._lang = s_lang;
             	    trans.send  = str_show; 
             	socket.emit('SoccerTODAY',trans);
				
             }
           });
}

function ClearAll()
{
	$("#ContentConvert").val("");
}