$(document).ready(function(){
	load_list_table_detail();
});

function load_list_table_detail()
{
	var ID = getUrlParameter("getID");
	var LeagueName = getUrlParameter("getLeague");
	$.ajax({

			url:"../home_controller/load_list_table_detail",
			type:"POST",
			data:{ ID: ID},
			dataType:"text",
			success:function(data){
				load_list_table_detail_Compete(data,LeagueName);
			},

	});
}

function load_list_table_detail_Compete(data,LeagueName)
{
	var sRes 	  = JSON.parse(data);
	var l_table    = sRes.l_table;
	var str_league     = sRes.League;
	var str = "";
	var str_event = "";
	var day = "";
	var month = "";
	var year  = "";
	var str_date;
	$("#load_event").html("");
	$("#tb_detail").html("");
	if(l_table.length >0)
	{
		// load - event
		 var date =  l_table[0]['txtday'];
		 var txday = l_table[0]['txtday'];
		 day = txday.substring(6);
		 month = txday.substring(4,6);
		 year  = txday.substring(0,4);
         str_date = day + "/" + month + "/" + year;
		 str_event = str_event + "<tr bgcolor=\"#f9bd1a\">";
		 if(str_league.length > 0)
		 str_event = str_event + "<td>"+str_league[0]['League']+"</td>";
		else
		 str_event = str_event + "<td></td>";
		 	
	     str_event = str_event + "<td>"+str_date+"</td>";
		 str_event = str_event + "</tr>";

		 str = str + "<tr style=\"border-style:solid; border-color:#F60; border-width:1px;\">";
		 str = str +"<td>Team</td><td>P</td><td>W</td><td>D</td><td>Pos</td><td>L</td><td>F</td><td>A</td><td>GD</td><td>Pts</td>";
		 str = str + "</tr>";
		 
		for(var i=0; i<l_table.length;i++)
		{   
			 // load - chi tiet
			 str = str + "<tr style=\"border-style:solid; border-color:#F60; border-width:1px;\">";
			 str = str + "<td>"+l_table[i]['team']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_P']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_W']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_D']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_Pos']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_L']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_F']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_A']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_GD']+"</td>";
			 str = str + "<td>"+l_table[i]['tb_Pts']+"</td>";
			 str = str + "</tr>";			
		}

		$("#load_event").append(str_event);
		$("#tb_detail").append(str);
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
   var url  = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/";
   return url  
}