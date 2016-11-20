socket.on('PageLeagueTable', function(PageRefresh){
    if(PageRefresh == 'RefreshLeague'){
       load_list_league_tables();
    }
});


$(document).ready(function(){
	load_list_league_tables();
});

function load_list_league_tables()
{
	var leagueID = getUrlParameter("leagueID");
	$.ajax({

			url:"../home_controller/load_list_league_tables",
			type:"POST",
			data:{ ID: leagueID},
			dataType:"text",
			success:function(data){
				load_list_league_tables_Compete(data);
			},

	});
}

function load_list_league_tables_Compete(data)
{
	var sRes 	  = JSON.parse(data);
	var league    = sRes.league_table;
	var str = "";
	$("#tb_load_league").html("");
	if(league.length >0)
	{
		for(var i=0; i<league.length;i++)
		{
			str = str +"<tr style=\"border-style:solid; border-color:#F60; border-width:1px;\">";
			str = str +"<td width=\"70%\" style=\"padding: 10px;\" align=\"left\">"+league[i]['League']+"</td>";
			str = str +"<td width=\"10%\" style=\"padding: 10px;\" align=\"right\">";
			str = str + "<a href='tabledeatil?getID="+league[i]['id']+"&getLeague="+league[i]['League']+"' style=\"text-decoration: none;\">";
	 		str = str + "<input  title=\"Next\" src='"+ GetBaseUrl() +"assets/img/app/btn-next.png' type=\"image\" >";
	 		str = str + "</a></td>";
	 		str = str +"</tr>";
		}

		$("#tb_load_league").append(str);
	}

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

function GetBaseUrl() 
{
   var link = '';
   var l    = window.location;
   var url  = l.protocol + "//" + l.host + "/" ;
   return url  
}