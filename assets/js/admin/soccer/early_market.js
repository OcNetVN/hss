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

function ConvertEarlyMarket()
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

	str = str   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;z-index: 1;"><tr><td>';
	str = str   + outdate;
	str = str   + '</td></tr></table>';

	str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;z-index: 1;">';
	str = str 	+ '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
	str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;z-index: 1;">';
	for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
	{
		var cur_body  = $(list_tbody[i_tbody]);
		var list_td   = cur_body.children("tr").eq(0).children("td");
		var n_td 	  = list_td.length;
		if(n_td==1)
		{
			_dataevent = $(list_td[0]).children("span").children("span").eq(0).text();
			str = str + '<tr  style="background-color:#222222;height:35px;">';
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

				var _TeamA    = $(list_td[2]).children("span").eq(0).text();
				var _colTeamA = $(list_td[2]).children("span").eq(0).attr('class');
				var _TeamB 	  = $(list_td[2]).children("span").eq(1).text();
				var _colTeamB = $(list_td[2]).children("span").eq(1).attr('class');
				var time_1 = _time.substring(0,5);
				var time_2 = _time.substring(5);

				str = str + '<tr bgcolor=\"white\" style="height:25px;border-bottom:1pt solid black;border-top: 1pt solid black">';
				str = str + '<td colspan="1" style=\"color:back;\"><b>';
				str = str + time_1;
				str = str + '</b><br><b>'+ time_2 +'</b></td>';
				str = str + '<td colspan="5" >';
				if(_colTeamA == "Blue")
					str = str + '<span style="color:blue;"><b>' + _TeamA + '</b></span></br>';
				else
					str = str + '<span style="color:red;"><b>' + _TeamA + '</b></span></br>';
				if(_colTeamB == "Blue")
					str = str + '<span style="color:blue"><b>' +_TeamB  +'</b></span>';
				else
					str = str + '<span style="color:red;"><b>' + _TeamB + '</b></span></br>';
				str = str + '</td>';
				str = str + '</tr>';

				//var _hdp1 	= $(list_td[3]).children("span").first().text();
                var _hdp1   = (typeof(ChangeHDP($(list_td[3]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[3]).children("span").first().text()): "" ;
				var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
				var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
				var _goal1	= (typeof(ChangeHDP($(list_td[6]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[6]).children("span").first().text()): "" ; 
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

				//var _hdp2   = $(list_td[9]).children("span").first().text();
                var _hdp2   = (typeof(ChangeHDP($(list_td[9]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[9]).children("span").first().text()): "" ;
				var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
				var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
				var _goal2  = (typeof(ChangeHDP($(list_td[12]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[12]).children("span").first().text()): "" ; 
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
					var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(0).text();
					if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
					{
						str= str +'<tr style="height:20px; background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >HDP</td>';
	                    str= str +'<td  align="center">HOME</td>';
	                    str= str +'<td  align="center">AWAY</td>';
	                    str= str +'<td  align="center" >GOAL</td>';
	                    str= str +'<td  align="center">OVER</td>';
	                    str= str +'<td  align="center">UNDER</td>';
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
	                    str= str +'<td  align="center" >FH.HDP</td>';
	                    str= str +'<td  align="center">HOME</td>';
	                    str= str +'<td  align="center">AWAY</td>';
	                    str= str +'<td  align="center" >FH.G</td>';
	                    str= str +'<td  align="center">OVER</td>';
	                    str= str +'<td  align="center">UNDER</td>';
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
                    str= str +'<td  align="center" >HDP</td>';
                    str= str +'<td  align="center">HOME</td>';
                    str= str +'<td  align="center">AWAY</td>';
                    str= str +'<td  align="center" >GOAL</td>';
                    str= str +'<td  align="center">OVER</td>';
                    str= str +'<td  align="center">UNDER</td>';
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
							str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\" >';
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
                    str= str +'<td  align="center" >FH.HDP</td>';
                    str= str +'<td  align="center">HOME</td>';
                    str= str +'<td  align="center">AWAY</td>';
                    str= str +'<td  align="center" >FH.G</td>';
                    str= str +'<td  align="center">OVER</td>';
                    str= str +'<td  align="center">UNDER</td>';
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
					//var _hdp1 	= $(list_td[3]).children("span").first().text();
                    var _hdp1   = (typeof(ChangeHDP($(list_td[3]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[3]).children("span").first().text()): "" ;
					var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
					var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
					var _goal1	= (typeof(ChangeHDP($(list_td[6]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[6]).children("span").first().text()): "" ; 
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
					//var _hdp2   = $(list_td[9]).children("span").first().text();
                    var _hdp2   = (typeof(ChangeHDP($(list_td[9]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[9]).children("span").first().text()): "" ;
					var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
					var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
					var _goal2  = (typeof(ChangeHDP($(list_td[12]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[12]).children("span").first().text()): "" ; 
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
					var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(0).text();
					if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
					{
						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center">HDP</td>';
	                    str= str +'<td  align="center">HOME</td>';
	                    str= str +'<td  align="center">AWAY</td>';
	                    str= str +'<td  align="center" >GOAL</td>';
	                    str= str +'<td  align="center">OVER</td>';
	                    str= str +'<td  align="center">UNDER</td>';
	                  	str= str +'</tr>';
	                  	for(var k=0; k<list1.length;k++)
	                  	{
	                  		var json1 = list1[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" >';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\">';
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
	                    str= str +'<td  align="center" >FH.HDP</td>';
	                    str= str +'<td  align="center">HOME</td>';
	                    str= str +'<td  align="center">AWAY</td>';
	                    str= str +'<td  align="center" >FH.G</td>';
	                    str= str +'<td  align="center">OVER</td>';
	                    str= str +'<td  align="center">UNDER</td>';
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
                    str= str +'<td  align="center" >HDP</td>';
                    str= str +'<td  align="center">HOME</td>';
                    str= str +'<td  align="center">AWAY</td>';
                    str= str +'<td  align="center" >GOAL</td>';
                    str= str +'<td  align="center">OVER</td>';
                    str= str +'<td  align="center">UNDER</td>';
                  	str= str +'</tr>';
                  	for(var k=0; k<list1.length;k++)
                  	{
                  		var json1 = list1[k];
                  		if(j%2 == 0)
		                {
							str = str + '<tr bgcolor=\"#abc4f5\" >';
						}
						else
						{
							str = str + '<tr bgcolor=\"#a8d1d1\">';
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
                    str= str +'<td  align="center" >FH.HDP</td>';
                    str= str +'<td  align="center">HOME</td>';
                    str= str +'<td  align="center">AWAY</td>';
                    str= str +'<td  align="center" >FH.G</td>';
                    str= str +'<td  align="center">OVER</td>';
                    str= str +'<td  align="center">UNDER</td>';
                  	str= str +'</tr>';
					for(var k=0; k<list2.length;k++)
                  	{
                  		var json1 = list2[k];
                  		if(j%2 == 0)
		                {
							str = str + '<tr bgcolor=\"#abc4f5\"  style=\"font-weight:bold;\">';
						}
						else
						{
							str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\" >';
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
	//socket.emit('SoccerTODAY',str);
	$("#divshowdata").html(str);

	$.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtmlEarly",
             data : {
             			save_today:str,
             			lang: "EN"
             },
             dataType: "html",
             success: function(data)
             { 
             	var trans       = {};
             	    trans._type = "early_market";
             	    trans._lang = 1;
             	    trans.send  = str;
             	socket.emit('SoccerTODAY',trans);
				$("#div_show_Result").html(str); 
             }
           });
}

function ConvertEarlyMarketCN()
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
	str = str   + '<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #FFFFFF;position:fixed; top:30;height:35px;z-index: 1;"><tr><td>';
	str = str   + outdate;
	str = str   + '</td></tr></table>';

	str = str 	+ '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;z-index: 1;">';
	str = str 	+ '<tr><td style="padding-bottom:40px;padding-top:30px;overflow-y: scroll;">';
	str = str   + '<table width="100%" cellspacing="0" cellpadding="0"  style="border-style:solid; border-width:1px;z-index: 1;">';
	for(var i_tbody = 0; i_tbody < list_tbody.length; i_tbody ++)
	{
		var cur_body  = $(list_tbody[i_tbody]);
		var list_td   = cur_body.children("tr").eq(0).children("td");
		var n_td 	  = list_td.length;
		if(n_td==1)
		{
			_dataevent = $(list_td[0]).children("span").children("span").eq(0).text();
			str = str + '<tr  style="background-color:#222222;height:35px;">';
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

				var _TeamA    = $(list_td[2]).children("span").eq(0).text();
				var _colTeamA = $(list_td[2]).children("span").eq(0).attr('class');
				var _TeamB 	  = $(list_td[2]).children("span").eq(1).text();
				var _colTeamB = $(list_td[2]).children("span").eq(1).attr('class');
				var time_1 = _time.substring(0,5);
				var time_2 = _time.substring(5);

				str = str + '<tr bgcolor=\"white\" style="height:25px;border-bottom:1pt solid black;border-top: 1pt solid black">';
				str = str + '<td colspan="1" style=\"color:back;\"><b>';
				str = str + time_1;
				str = str + '</b><br><b>'+ time_2 +'</b></td>';
				str = str + '<td colspan="5" >';
				if(_colTeamA == "Blue")
					str = str + '<span style="color:blue;"><b>' + _TeamA + '</b></span></br>';
				else
					str = str + '<span style="color:red;"><b>' + _TeamA + '</b></span></br>';
				if(_colTeamB == "Blue")
					str = str + '<span style="color:blue"><b>' +_TeamB  +'</b></span>';
				else
					str = str + '<span style="color:red;"><b>' + _TeamB + '</b></span></br>';
				str = str + '</td>';
				str = str + '</tr>';

				//var _hdp1 	= $(list_td[3]).children("span").first().text();
                var _hdp1   = (typeof(ChangeHDP($(list_td[3]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[3]).children("span").first().text()): "" ;
				var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
				var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
				var _goal1	= (typeof(ChangeHDP($(list_td[6]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[6]).children("span").first().text()): "" ; 
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

				//var _hdp2   = $(list_td[9]).children("span").first().text();
                var _hdp2   = (typeof(ChangeHDP($(list_td[9]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[9]).children("span").first().text()): "" ;
				var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
				var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
				var _goal2  = (typeof(ChangeHDP($(list_td[12]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[12]).children("span").first().text()): "" ; 
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
					var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(0).text();
					if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
					{
						str= str +'<tr style="height:20px; background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center" >亚洲盘</td>';
	                    str= str +'<td  align="center">主</td>';
	                    str= str +'<td  align="center">客</td>';
	                    str= str +'<td  align="center" >总进球</td>';
	                    str= str +'<td  align="center">大</td>';
	                    str= str +'<td  align="center">小</td>';
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
	                    str= str +'<td  align="center" >上半场</td>';
	                    str= str +'<td  align="center">主</td>';
	                    str= str +'<td  align="center">客</td>';
	                    str= str +'<td  align="center" >总半场</td>';
	                    str= str +'<td  align="center">大</td>';
	                    str= str +'<td  align="center">小</td>';
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
                    str= str +'<td  align="center" >亚洲盘</td>';
                    str= str +'<td  align="center">主</td>';
                    str= str +'<td  align="center">客</td>';
                    str= str +'<td  align="center" >总进球</td>';
                    str= str +'<td  align="center">大</td>';
                    str= str +'<td  align="center">小</td>';
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
							str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\" >';
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
                    str= str +'<td  align="center" >上半场</td>';
                    str= str +'<td  align="center">主</td>';
                    str= str +'<td  align="center">客</td>';
                    str= str +'<td  align="center" >总半场</td>';
                    str= str +'<td  align="center">大</td>';
                    str= str +'<td  align="center">小</td>';
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
					//var _hdp1 	= $(list_td[3]).children("span").first().text();
                    var _hdp1   = (typeof(ChangeHDP($(list_td[3]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[3]).children("span").first().text()): "" ;
					var _home1	= $(list_td[4]).children("a").children("span").children("span").text();
					var _away1	= $(list_td[5]).children("a").children("span").children("span").text();
					var _goal1	= (typeof(ChangeHDP($(list_td[6]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[6]).children("span").first().text()): "" ; 
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
					//var _hdp2   = $(list_td[9]).children("span").first().text();
                    var _hdp2   = (typeof(ChangeHDP($(list_td[9]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[9]).children("span").first().text()): "" ;
					var _home2  = $(list_td[10]).children("a").children("span").children("span").text();
					var _away2  = $(list_td[11]).children("a").children("span").children("span").text();
					var _goal2  = (typeof(ChangeHDP($(list_td[12]).children("span").first().text())) != "undefined") ?  ChangeHDP($(list_td[12]).children("span").first().text()): "" ; 
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
					var _dataevent_next = $(list_td_next[0]).children("span").children("span").eq(0).text();
					if((_time_next.trim()!= null && _time_next.trim() != "" && typeof(_time_next)!= undefined)||((_dataevent_next.trim()!= null && _dataevent_next.trim() != "" && typeof(_dataevent_next)!= undefined)))
					{
						str= str +'<tr style="height:20px;background-color:#e3e3e3;color:#7e4f34">';
	                    str= str +'<td  align="center">亚洲盘</td>';
	                    str= str +'<td  align="center">主</td>';
	                    str= str +'<td  align="center">客</td>';
	                    str= str +'<td  align="center" >总进球</td>';
	                    str= str +'<td  align="center">大</td>';
	                    str= str +'<td  align="center">小</td>';
	                  	str= str +'</tr>';
	                  	for(var k=0; k<list1.length;k++)
	                  	{
	                  		var json1 = list1[k];
	                  		if(j%2 == 0)
			                {
								str = str + '<tr bgcolor=\"#abc4f5\" >';
							}
							else
							{
								str = str + '<tr bgcolor=\"#a8d1d1\">';
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
	                    str= str +'<td  align="center" >上半场</td>';
	                    str= str +'<td  align="center">主</td>';
	                    str= str +'<td  align="center">客</td>';
	                    str= str +'<td  align="center" >总半场</td>';
	                    str= str +'<td  align="center">大</td>';
	                    str= str +'<td  align="center">小</td>';
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
                    str= str +'<td  align="center" >亚洲盘</td>';
                    str= str +'<td  align="center">主</td>';
                    str= str +'<td  align="center">客</td>';
                    str= str +'<td  align="center" >总进球</td>';
                    str= str +'<td  align="center">大</td>';
                    str= str +'<td  align="center">小</td>';
                  	str= str +'</tr>';
                  	for(var k=0; k<list1.length;k++)
                  	{
                  		var json1 = list1[k];
                  		if(j%2 == 0)
		                {
							str = str + '<tr bgcolor=\"#abc4f5\" >';
						}
						else
						{
							str = str + '<tr bgcolor=\"#a8d1d1\">';
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
                    str= str +'<td  align="center" >上半场</td>';
                    str= str +'<td  align="center">主</td>';
                    str= str +'<td  align="center">客</td>';
                    str= str +'<td  align="center" >总半场</td>';
                    str= str +'<td  align="center">大</td>';
                    str= str +'<td  align="center">小</td>';
                  	str= str +'</tr>';
					for(var k=0; k<list2.length;k++)
                  	{
                  		var json1 = list2[k];
                  		if(j%2 == 0)
		                {
							str = str + '<tr bgcolor=\"#abc4f5\"  style=\"font-weight:bold;\">';
						}
						else
						{
							str = str + '<tr bgcolor=\"#a8d1d1\" style=\"font-weight:bold;\" >';
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
	//socket.emit('SoccerTODAY',str);
	$("#divshowdata").html(str);

	$.ajax({
             type : "POST",
             url  : "../admin/home_controller/SaveFileHtmlEarly",
             data : {
             	       save_today:str,
             	       lang: "CN"
                    },
             dataType: "html",
             success: function(data)
             {
                var trans       = {};
             	    trans._type = "early_market";
             	    trans._lang = 2;
             	    trans.send  = str; 
             	console.log(trans);
             	socket.emit('SoccerTODAY',trans);
				$("#div_show_Result").html(str); 
             }
           });
}

function ClearAll()
{
	$("#ContentConvert").val("");
}
function ChangeHDP(hdp)
{      
    var result ="";      
    if(hdp.indexOf("-") != -1)
    {
        var hdc = hdp.split("-");         
        return  result = changeOdd(hdc[0]) + "-" + changeOdd(hdc[1]);             
    }
    else
    {
        if(hdp == " "){
             return  "aa"
        }
        else {
           return  result = changeOdd(hdp);   
        }
        
    }
    
}
function changeOdd(Odd)
{
    if (Odd == " ")
        return    "" ;
    if (Odd == "0")
        return    "0" ;
    if (Odd == "0.0")
        return    "00" ;
    if (Odd == "0.5"|| Odd == "0.50")
        return    "<sup>1</sup>&frasl;<sub>2</sub>" ;
     if (Odd == "1.0" || Odd == "1")
        return  "1" ; 
     if (Odd == "1.5" || Odd == "1.50")
        return    "1<sup>1</sup>&frasl;<sub>2</sub>" ; 
     if (Odd == "2.0" || Odd == "2")
        return  "2" ;  
     if (Odd == "2.5" || Odd == "2.50")
        return    "2<sup>1</sup>&frasl;<sub>2</sub>" ; 
    if (Odd == "3.0" || Odd == "3")
        return    "3" ; 
    if (Odd == "3.5" || Odd == "3.50")
        return    "3<sup>1</sup>&frasl;<sub>2</sub>" ; 
    if (Odd == "4" || Odd == "4.0")
        return    "4" ;
     if (Odd == "4.5" || Odd == "4.50")
        return    "4<sup>1</sup>&frasl;<sub>2</sub>" ; 
    if (Odd == "5" || Odd == "5.0")
        return    "5" ;
     if (Odd == "5.5" || Odd == "5.50")
        return    "5<sup>1</sup>&frasl;<sub>2</sub>" ; 
     if (Odd == "6" || Odd == "6.0")
        return    "6" ;
     if (Odd == "6.5" || Odd == "6.50")
        return    "6<sup>1</sup>&frasl;<sub>2</sub>" ;
     if (Odd == "7" || Odd == "7.0")
        return    "7" ;
     if (Odd == "7.5" || Odd == "7.50")
        return    "7<sup>1</sup>&frasl;<sub>2</sub>" ; 
     if (Odd == "8" || Odd == "8.0")
        return    "8" ;
     if (Odd == "8.5" || Odd == "8.50")
        return    "8<sup>1</sup>&frasl;<sub>2</sub>" ;
     if (Odd == "9" || Odd == "9.0")
        return    "9" ;
     if (Odd == "9.5" || Odd == "9.50")
        return    "9<sup>1</sup>&frasl;<sub>2</sub>" ;
     if (Odd == "10" || Odd == "10.0")
        return    "10" ;
     if (Odd == "10.5" || Odd == "10.50")
        return    "10<sup>1</sup>&frasl;<sub>2</sub>" ;
}