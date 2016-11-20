$(document).ready(function(){
	loadSoccerToday();
});

socket.on('SoccerTODAY',function(res)
{
	var type = res._type;
	var lang = res._lang;
	var data = res.send;
    //console.log(data) ;   
	var _lang = "";
    _lang = getUrlParameter("lang");    
    if(_lang == "" || _lang == null)
        _lang = 1;
	if(type == "today")
	{
		if(_lang ==  lang)
		{
			$("#showInfoEarly").html(" ");
	        $("#showInfoEarly").html(data); 
	    }
	}
    
    //loadSoccerToday();

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

function loadSoccerToday()
{
	$.ajax({
			url:"../home_controller/loadSoccerToday",
			type:"POST",
			//data:{},
			dataType:"text",
			success:function(data){
				loadSoccerToday_Complete(data);
			},
			error:function(){

			},
	});
}

function loadSoccerToday_Complete(data)
{
	var sRes = JSON.parse(data);
	var l_today = sRes.l_today;
	var str="";
	//$("#td_loadToday").html("");
	//$("td_loadToday tr:last").html("");
	if(l_today.length >0)
	{
		for(var i =0;i<l_today.length;i++)
		{
			var Hdp   = l_today[i]['Hdp'];
				Hdp   = Hdp.split("|");
			var Away  = l_today[i]['Away'];
				Away  = Away.split("|");
			var Home  = l_today[i]['Home'];
				Home  = Home.split("|");
			var Goal  = l_today[i]['Goal'];
			    Goal  = Goal.split("|");
			var Under = l_today[i]['Under'];
				Under = Under.split("|");
			var Over  = l_today[i]['Over'];
				Over  = Over.split("|");

			var FH_Hdp = l_today[i]['FH_Hdp'];
			    FH_Hdp = FH_Hdp.split("|");
			var FH_Home = l_today[i]['FH_Home'];
				FH_Home = FH_Home.split("|");
			var FH_Away = l_today[i]['FH_Away'];
			    FH_Away = FH_Away.split("|");
			var FH_G    = l_today[i]['FH_G'];
			    FH_G    = FH_G.split("|"); 
			var FH_Over = l_today[i]['FH_Over'];
			    FH_Over = FH_Over.split("|");
			var FH_Under = l_today[i]['FH_Under'];
			    FH_Under = FH_Under.split("|");


			 //str = str +"<table style=\"border-style:solid;border-width:1px;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">";
			str = str +"<tr bgcolor=\"#000000\">";
			str = str + "<td colspan=\"5\"><b style=\"color:red;\">"+l_today[i]['TeamA']+"</b>";
			str = str + "<b style=\"color:#249e48;\">" +l_today[i]['Time']+"</b>";
			str = str + "<b style=\"color:#f9bd1a\">"+l_today[i]['TeamB']+"</b>";
			str = str + "</td>";
			str = str +"<td>";
			str = str +"<span style=\"width:20px;height:22px;background-color:#00a2e9;\"><a href='numberdetail?todayID="+l_today[i]['id']+"&type=today'>"+l_today[i]['Number']+"</a></span>";
			str = str +"</td>";
			str = str +"</tr>";
			for(var j=0; j < Hdp.length;j++)
			{
				str = str + "<tr>";
				str = str + "<td align=\"center\" bgcolor=\"#FFFFF\">"+Hdp[j]+"</td>";
				str = str + "<td align=\"center\">"+Home[j]+"</td>";
				str = str + "<td align=\"center\">"+Away[j]+"</td>";
				str = str + "<td align=\"center\" bgcolor=\"#FFFFF\">"+Goal[j]+"</td>";
				str = str + "<td align=\"center\">"+Over[j]+"</td>";
				str = str + "<td align=\"center\">"+Under[j]+"</td>";
				str = str + "</tr>";
			}

			str = str + "<tr>";
			str = str + "<td align=\"center\" >FH.HDP</td>";
			str = str + "<td align=\"center\">HOME</td>";
			str = str + "<td align=\"center\">AWAY</td>";
			str = str + "<td align=\"center\" >FH.G</td>";
			str = str + "<td align=\"center\">OVER</td>";
			str = str + "<td align=\"center\">UNDER</td>";
			str = str + "</tr>";

			for(var j=0; j < Hdp.length;j++)
			{
				str = str + "<tr>";
				str = str + "<td align=\"center\" bgcolor=\"#FFFFF\">"+FH_Hdp[j]+"</td>";
				str = str + "<td align=\"center\">"+FH_Home[j]+"</td>";
				str = str + "<td align=\"center\">"+FH_Away[j]+"</td>";
				str = str + "<td align=\"center\" bgcolor=\"#FFFFF\">"+FH_G[j]+"</td>";
				str = str + "<td align=\"center\">"+FH_Over[j]+"</td>";
				str = str + "<td align=\"center\">"+FH_Under[j]+"</td>";
				str = str + "</tr>";
			}

            //str = str + "</table>";
		}

		//$("#td_loadToday").append(str);
		$("#td_loadToday tr:last").after(str);
	}
}