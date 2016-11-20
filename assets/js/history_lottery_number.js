function ConvertAll()
{
	var content = $("#ContentConvert").val();
	var str;
	$("#load_listtable").html("");
	$("#sp_tbl").text("");
	if(content != "")
	{
		lines  	    = content.split('\n');
		//console.log(lines);
		var soDong  = lines.length;
		if(soDong > 0)
		{
			for(var i=0; i<soDong; i++)
			{
				var dong = lines[i];
				var cols = dong.split('\t');
				if(cols.length > 0)
				{
					str = str + "<tr>";
					str = str + "<td>"+cols[0]+"</td>";
					str = str + "<td>"+cols[1]+"</td>";
					str = str + "<td>"+cols[2]+"</td>";
					str = str + "<td>"+cols[3]+"</td>";
					str = str + "<td>"+cols[4]+"</td>";
					str = str + "</tr>";
					//console.log(str);
				}
			}

			$("#load_listtable").append(str);
			$("#sp_tbl").text("Convert Success");
		}
	}
	else{
		 $("#sp_tbl").text("Not Content");
	}
}

function SaveAll()
{
	var typelottery = $("#cmblottery").val();
	var number      = $("#txtNoHistory").val();
	var listable 	= $('#load_listtable tr').length;
	if(listable > 0)
	{
		var list = [];
		var i = 0;
		while(i < listable)
		{
			var history = {};
			history.hNumber 	= $("#load_listtable tbody tr:eq("+i+") td:eq(0)").html();
			history.typechon 	= $("#load_listtable tbody tr:eq("+i+") td:eq(1)").html();
			history.DrawNo 		= $("#load_listtable tbody tr:eq("+i+") td:eq(2)").html();
			history.txday 		= $("#load_listtable tbody tr:eq("+i+") td:eq(3)").html();
			list[i] = history;
			i = i+1;
		}

		$.ajax({
				url: "home_controller/savehistorylottery",
				type: "POST",
				data: {  historylottery: JSON.stringify(list),
						 type:typelottery,
						 _Number: number
					 },
				dataType:"text",
				cache:false,
				success:function(data){
					SaveAll_Complete(data);
				},
		});
	}

	console.log(list);
}

function  SaveAll_Complete(data)
{
	var sRes = JSON.parse(data);
	var tb = sRes.str_tb;
	$("#sp_tbl").text("");
	if(tb != "" || tb != " ")
	{
		$("#sp_tbl").text(tb);
	}

}

function ClearAll()
{
	$("#txtNoHistory").val("");
	$("#load_listtable").html("");
	$("#ContentConvert").val("");

}