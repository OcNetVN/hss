socket.on('PageAllTables', function(PageRefresh){
    if(PageRefresh == 'RefreshAllTables'){
       load_list_all_table();
    }
});

$(document).ready(function(){
	load_list_all_table();
});

function load_list_all_table()
{
	$.ajax({
			url:"../home_controller/load_list_all_table",
			type:"POST",
			data:{},
			dataType:"text",
			success:function(data){
			  load_list_all_table_Complete(data);
			},
	});
}

function load_list_all_table_Complete(data)
{
	 var sRes = JSON.parse(data);
	 var l_all_table = sRes.l_all_tables;
	 var str="";
	 $("#tb_load_all").html("");
	 if(l_all_table.length >0)
	 {
	 	for(var i=0; i<l_all_table.length;i++)
	 	{
	 		str = str + "<tr style=\"border-style:solid; border-color:#F60; border-width:1px;\">";

	 		str = str + "<td width=\"20%\" style=\"padding: 10px;\" align=\"left\">";
	 		str = str + "<input  src='"+ GetBaseUrl() +"assets/img/app/flags/"+l_all_table[i]['Flag']+"' type=\"image\" style=\"height:50px;width:100%;\">";
	 		str = str + "</td>";

	 		str = str + "<td width=\"50%\" style=\"padding: 10px;\" align=\"center\">"+l_all_table[i]['CountryName']+" ("+l_all_table[i]['tong']+")</td>";

	 		str = str + "<td width=\"10%\" style=\"padding: 10px;\" align=\"right\">";
	 		str = str + "<a href='leaguetable?leagueID="+l_all_table[i]['id']+"' style=\"text-decoration: none;\">";
	 		str = str + "<input  title=\"Next\" src='"+ GetBaseUrl() +"assets/img/app/btn-next.png' type=\"image\" >";
	 		str = str + "</a></td>";

	 		str = str + "</tr>";
	 	}
	 	$("#tb_load_all").append(str);
	 	//console.log(str);
	 }
}

function GetBaseUrl() 
{
   var link = '';
   var l    = window.location;
   var url  = l.protocol + "//" + l.host + "/";
   return url  
}