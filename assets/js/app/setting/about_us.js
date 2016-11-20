$(document).ready(function() {
	load_about_us();
});

function load_about_us()
{
	$.ajax({
            type:"POST",
            url: "../home_controller/load_about_us",
            dataType:"text",
            //data: {},
            cache:false,
            success:function (data) {
                load_about_us_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_about_us_Complete(data)
{
	var sRes = JSON.parse(data);
	$("#loadaboutus").html("");
	if(sRes.content != '' || sRes.content != '')
	{
		$("#loadaboutus").append(sRes.content);
	}
}