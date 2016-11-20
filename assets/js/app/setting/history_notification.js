$(document).ready(function() {
	loadhistorynotification();
});

function loadhistorynotification()
{
	$.ajax({
		type:"POST",
		url: "../home_controller/loadHistoryNotification",
		dataType:"text",
		//data:{},
		case:false,
		success: function(data){
			loadHistoryNotification_Success(data);
		},
		error: function(){ alert("error");}


	});
}

function loadHistoryNotification_Success(data)
{
	var sRes = JSON.parse(data);
	var notification = sRes.l_Notification;
	var str;
	$("#tbHistoryNotifications").html("");
	if(notification.length > 0)
	{
		for(var i=0;i<notification.length;i++)
		{
		   if(notification[i]['Content'] != null && notification[i]['Content'] != "")
		   {
				//console.log(notification[i]['Content']);
	           str = str + "<tr style=\"border-style:solid; border-color:#F60; border-width:1px;\">";
	           str = str + "<td style=\"padding: 10px;\" width=\"100%\" align=\"left\">";
	           str = str + notification[i]['Content'];
	           str = str + "<br>";
	           str = str + notification[i]['CreatedDate'];
	           str = str + "</td>";
	           str = str + "</tr>";
       		}
		}
		//console.log(str);

		$("#tbHistoryNotifications").append(str);
	}
}