function SaveAbouts() {
    var type_info  = $("#choose").val();
    //var Policy =  CKEDITOR.instances['txtPolicyTab2'].getData();
    //var ConEnglish = $("#ContentConvert").val();
    var ConEnglish = CKEDITOR.instances['ContentConvert'].getData();
    //var ConChinese = $("#ContentConvert_Chinese").val();
    var ConChinese = CKEDITOR.instances['ContentConvert_Chinese'].getData();
    $.ajax({
            type:"POST",
            url: "homelt_controller/SaveAbouts",
            dataType:"text",
            data: {
            	    type:type_info,
                    conEnglish:ConEnglish,
                    conChinese:ConChinese
                   },
            cache:false,
            success:function (data) {
                SaveAbouts_Complete(data);
            },
            error: function () { alert("Error!");}
   });
	
}

function SaveAbouts_Complete(data)
{
	var sRes = JSON.parse(data);
	if(sRes.req == 1 || sRes.req == "1")
	{
		alert("success");
	}

}

function ClearAbout()
{
	$("#ContentConvert").val("");
	$("#ContentConvert_Chinese").val("");
}