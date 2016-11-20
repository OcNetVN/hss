function ClearAll () {
	$("#txtEnglish").val("");
	$("#txtChinese").val("");
}

function SaveFeedback()
{
	var conEnglish = $("#txtEnglish").val();
	var conChinese = $("#txtChinese").val();
	$.ajax({
            type:"POST",
            url: "../home_controller/SaveFeedback",
            dataType:"text",
            data: {
                    conEnglish:conEnglish,
                    conChinese:conChinese
                   },
            cache:false,
            success:function (data) {
                SaveFeedback_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function SaveFeedback_Complete(data)
{
	var sRes = JSON.parse(data);
	if(sRes.req == 1 || sRes.req == "1")
	{
		alert('Feedback success');
	}
}