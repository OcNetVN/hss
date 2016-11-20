$(document).ready( function() {
	LoadFeedBack();
});

function LoadFeedBack()
{
	$.ajax({
			type:"POST",
            url: "home_controller/load_list_feedback",
            dataType:"text",
            //data:{},
            case:false,
            success: function(data){
               LoadFeedBack_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}

	});
}

function LoadFeedBack_Complete(data)
{
	var sRes = JSON.parse(data);
	var feeback = sRes.l_feedback;
	var str;
	if(feeback.length > 0)
	{
		for(var i=0;i < feeback.length;i++)
		{
			str = str + "<tr>";
			str = str + "<td>"+feeback[i]['id']+"</td>";
			str = str + "<td>"+feeback[i]['SeriaNumber']+"</td>";
			str = str + "<td>"+feeback[i]['ConEnglish']+"</td>";
			str = str + "<td>"+feeback[i]['ConChinese']+"</td>";
			str = str + "<td>"+feeback[i]['CreatedDate']+"</td>";
			str = str + "</tr>";
		}

		$("#tbodylistagent").append(str);
	}
}