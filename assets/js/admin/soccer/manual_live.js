$(document).ready(function() {

});

function SearchManual()
{
	var choo_team = $("#cmb_ChooTeam").val();
	var str = "";
	$('[id*=show_team_]').css("display","none");
	if(choo_team != 0)
	{
		for(var i=1;i <= choo_team;i++)
		{ 
			$("#show_team_" + i).css("display","");
		}
	}
}

function ClickDoiA_1()
{
	$("#txt_team1_1").val(Number($("#txt_team1_1").val())+1);
	var socreA      = $("#txt_team1_1").val();
	var soccerB 	= $("#txt_team2_1").val();
	var time    	= $("#txt_add_1").val();
	var nameA   	= $("#cmb_team_1_1 option:selected").text();
	var nameB   	= $("#cmb_team_2_1 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_1()
{
	$("#txt_team2_1").val(Number($("#txt_team2_1").val())+1);
	var socreA      = $("#txt_team1_1").val();
	var soccerB 	= $("#txt_team2_1").val();
	var time    	= $("#txt_add_1").val();
	var nameA   	= $("#cmb_team_1_1 option:selected").text();
	var nameB   	= $("#cmb_team_2_1 option:selected").text();
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_1()
{
	var socreA      = $("#txt_team1_1").val();
	var soccerB 	= $("#txt_team2_1").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_1 option:selected").text();
	var nameB   	= $("#cmb_team_2_1 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_2()
{
	$("#txt_team1_2").val(Number($("#txt_team1_2").val())+1);
	var socreA      = $("#txt_team1_2").val();
	var soccerB 	= $("#txt_team2_2").val();
	var time    	= $("#txt_add_2").val();
	var nameA   	= $("#cmb_team_1_2 option:selected").text();
	var nameB   	= $("#cmb_team_2_2 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_2()
{
	$("#txt_team2_2").val(Number($("#txt_team2_2").val())+1);
	var socreA      = $("#txt_team1_2").val();
	var soccerB 	= $("#txt_team2_2").val();
	var time    	= $("#txt_add_2").val();
	var nameA   	= $("#cmb_team_1_2 option:selected").text();
	var nameB   	= $("#cmb_team_2_2 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_2()
{
	var socreA      = $("#txt_team1_2").val();
	var soccerB 	= $("#txt_team2_2").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_2 option:selected").text();
	var nameB   	= $("#cmb_team_2_2 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_3()
{
	$("#txt_team1_3").val(Number($("#txt_team1_3").val())+1);
	var socreA      = $("#txt_team1_3").val();
	var soccerB 	= $("#txt_team2_3").val();
	var time    	= $("#txt_add_3").val();
	var nameA   	= $("#cmb_team_1_3 option:selected").text();
	var nameB   	= $("#cmb_team_2_3 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_3()
{
	$("#txt_team2_3").val(Number($("#txt_team2_3").val())+1);
	var socreA      = $("#txt_team1_3").val();
	var soccerB 	= $("#txt_team2_3").val();
	var time    	= $("#txt_add_3").val();
	var nameA   	= $("#cmb_team_1_3 option:selected").text();
	var nameB   	= $("#cmb_team_2_3 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_3()
{
	var socreA      = $("#txt_team1_3").val();
	var soccerB 	= $("#txt_team2_3").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_3 option:selected").text();
	var nameB   	= $("#cmb_team_2_3 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_4()
{
	$("#txt_team1_4").val(Number($("#txt_team1_4").val())+1);
	var socreA      = $("#txt_team1_4").val();
	var soccerB 	= $("#txt_team2_4").val();
	var time    	= $("#txt_add_4").val();
	var nameA   	= $("#cmb_team_1_4 option:selected").text();
	var nameB   	= $("#cmb_team_2_4 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_4()
{
	$("#txt_team2_4").val(Number($("#txt_team2_4").val())+1);
	var socreA      = $("#txt_team1_4").val();
	var soccerB 	= $("#txt_team2_4").val();
	var time    	= $("#txt_add_4").val();
	var nameA   	= $("#cmb_team_1_4 option:selected").text();
	var nameB   	= $("#cmb_team_2_4 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_4()
{
	var socreA      = $("#txt_team1_4").val();
	var soccerB 	= $("#txt_team2_4").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_4 option:selected").text();
	var nameB   	= $("#cmb_team_2_4 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_5()
{
	$("#txt_team1_5").val(Number($("#txt_team1_5").val())+1);
	var socreA      = $("#txt_team1_5").val();
	var soccerB 	= $("#txt_team2_5").val();
	var time    	= $("#txt_add_5").val();
	var nameA   	= $("#cmb_team_1_5 option:selected").text();
	var nameB   	= $("#cmb_team_2_5 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_5()
{
	$("#txt_team2_5").val(Number($("#txt_team2_5").val())+1);
	var socreA      = $("#txt_team1_5").val();
	var soccerB 	= $("#txt_team2_5").val();
	var time    	= $("#txt_add_5").val();
	var nameA   	= $("#cmb_team_1_5 option:selected").text();
	var nameB   	= $("#cmb_team_2_5 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_5()
{
	var socreA      = $("#txt_team1_5").val();
	var soccerB 	= $("#txt_team2_5").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_5 option:selected").text();
	var nameB   	= $("#cmb_team_2_5 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_6()
{
	$("#txt_team1_6").val(Number($("#txt_team1_6").val())+1);
	var socreA      = $("#txt_team1_6").val();
	var soccerB 	= $("#txt_team2_6").val();
	var time    	= $("#txt_add_6").val();
	var nameA   	= $("#cmb_team_1_6 option:selected").text();
	var nameB   	= $("#cmb_team_2_6 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_6()
{
	$("#txt_team2_6").val(Number($("#txt_team2_6").val())+1);
	var socreA      = $("#txt_team1_6").val();
	var soccerB 	= $("#txt_team2_6").val();
	var time    	= $("#txt_add_6").val();
	var nameA   	= $("#cmb_team_1_6 option:selected").text();
	var nameB   	= $("#cmb_team_2_6 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_6()
{
	var socreA      = $("#txt_team1_6").val();
	var soccerB 	= $("#txt_team2_6").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_6 option:selected").text();
	var nameB   	= $("#cmb_team_2_6 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_7()
{
	$("#txt_team1_7").val(Number($("#txt_team1_7").val())+1);
	var socreA      = $("#txt_team1_7").val();
	var soccerB 	= $("#txt_team2_7").val();
	var time    	= $("#txt_add_7").val();
	var nameA   	= $("#cmb_team_1_7 option:selected").text();
	var nameB   	= $("#cmb_team_2_7 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_7()
{
	$("#txt_team2_7").val(Number($("#txt_team2_7").val())+1);
	var socreA      = $("#txt_team1_7").val();
	var soccerB 	= $("#txt_team2_7").val();
	var time    	= $("#txt_add_7").val();
	var nameA   	= $("#cmb_team_1_7 option:selected").text();
	var nameB   	= $("#cmb_team_2_7 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_7()
{
	var socreA      = $("#txt_team1_7").val();
	var soccerB 	= $("#txt_team2_7").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_7 option:selected").text();
	var nameB   	= $("#cmb_team_2_7 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_8()
{
	$("#txt_team1_8").val(Number($("#txt_team1_8").val())+1);
	var socreA      = $("#txt_team1_8").val();
	var soccerB 	= $("#txt_team2_8").val();
	var time    	= $("#txt_add_8").val();
	var nameA   	= $("#cmb_team_1_8 option:selected").text();
	var nameB   	= $("#cmb_team_2_8 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_8()
{
	$("#txt_team2_8").val(Number($("#txt_team2_8").val())+1);
	var socreA      = $("#txt_team1_8").val();
	var soccerB 	= $("#txt_team2_8").val();
	var time    	= $("#txt_add_8").val();
	var nameA   	= $("#cmb_team_1_8 option:selected").text();
	var nameB   	= $("#cmb_team_2_8 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_8()
{
	var socreA      = $("#txt_team1_8").val();
	var soccerB 	= $("#txt_team2_8").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_8 option:selected").text();
	var nameB   	= $("#cmb_team_2_8 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_9()
{
	$("#txt_team1_9").val(Number($("#txt_team1_9").val())+1);
	var socreA      = $("#txt_team1_9").val();
	var soccerB 	= $("#txt_team2_9").val();
	var time    	= $("#txt_add_9").val();
	var nameA   	= $("#cmb_team_1_9 option:selected").text();
	var nameB   	= $("#cmb_team_2_9 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_9()
{
	$("#txt_team2_9").val(Number($("#txt_team2_9").val())+1);
	var socreA      = $("#txt_team1_9").val();
	var soccerB 	= $("#txt_team2_9").val();
	var time    	= $("#txt_add_9").val();
	var nameA   	= $("#cmb_team_1_9 option:selected").text();
	var nameB   	= $("#cmb_team_2_9 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_9()
{
	var socreA      = $("#txt_team1_9").val();
	var soccerB 	= $("#txt_team2_9").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_9 option:selected").text();
	var nameB   	= $("#cmb_team_2_9 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_10()
{
	$("#txt_team1_10").val(Number($("#txt_team1_10").val())+1);
	var socreA      = $("#txt_team1_10").val();
	var soccerB 	= $("#txt_team2_10").val();
	var time    	= $("#txt_add_10").val();
	var nameA   	= $("#cmb_team_1_10 option:selected").text();
	var nameB   	= $("#cmb_team_2_10 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_10()
{
	$("#txt_team2_10").val(Number($("#txt_team2_10").val())+1);
	var socreA      = $("#txt_team1_10").val();
	var soccerB 	= $("#txt_team2_10").val();
	var time    	= $("#txt_add_10").val();
	var nameA   	= $("#cmb_team_1_10 option:selected").text();
	var nameB   	= $("#cmb_team_2_10 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_10()
{
	var socreA      = $("#txt_team1_10").val();
	var soccerB 	= $("#txt_team2_10").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_10 option:selected").text();
	var nameB   	= $("#cmb_team_2_10 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_11()
{
	$("#txt_team1_11").val(Number($("#txt_team1_11").val())+1);
	var socreA      = $("#txt_team1_11").val();
	var soccerB 	= $("#txt_team2_11").val();
	var time    	= $("#txt_add_11").val();
	var nameA   	= $("#cmb_team_1_11 option:selected").text();
	var nameB   	= $("#cmb_team_2_11 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_11()
{
	$("#txt_team2_11").val(Number($("#txt_team2_11").val())+1);
	var socreA      = $("#txt_team1_11").val();
	var soccerB 	= $("#txt_team2_11").val();
	var time    	= $("#txt_add_11").val();
	var nameA   	= $("#cmb_team_1_11 option:selected").text();
	var nameB   	= $("#cmb_team_2_11 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_11()
{
	var socreA      = $("#txt_team1_11").val();
	var soccerB 	= $("#txt_team2_11").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_11 option:selected").text();
	var nameB   	= $("#cmb_team_2_11 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiA_12()
{
	$("#txt_team1_12").val(Number($("#txt_team1_12").val())+1);
	var socreA      = $("#txt_team1_12").val();
	var soccerB 	= $("#txt_team2_12").val();
	var time    	= $("#txt_add_12").val();
	var nameA   	= $("#cmb_team_1_12 option:selected").text();
	var nameB   	= $("#cmb_team_2_12 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickDoiB_12()
{
	$("#txt_team2_12").val(Number($("#txt_team2_12").val())+1);
	var socreA      = $("#txt_team1_12").val();
	var soccerB 	= $("#txt_team2_12").val();
	var time    	= $("#txt_add_12").val();
	var nameA   	= $("#cmb_team_1_12 option:selected").text();
	var nameB   	= $("#cmb_team_2_12 option:selected").text();
    var content     = "<span style='color:red;' >Goal!!!!!</span><br>" + " " + nameA + " " + socreA + "<br>" + nameB + " " + soccerB + "<br> " + time; 
	//var content 	= "Goal!!!!!" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function ClickFT_12()
{
	var socreA      = $("#txt_team1_12").val();
	var soccerB 	= $("#txt_team2_12").val();
	var time    	= getOutdate();
	var nameA   	= $("#cmb_team_1_12 option:selected").text();
	var nameB   	= $("#cmb_team_2_12 option:selected").text();
	var content 	= "Full Time Result" + " " + nameA + " " + socreA + ":" + soccerB + " " + nameB + " " + time; 
	$.ajax({
            type:"POST",
            url:"../homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: "03",
                    typeCon: "0302",
                    SerialNumber:"ALL",
                    content:content,
                    url:"" 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function getOutdate()
{
	var str_date = "";
	var d = new Date();
    var month  = d.getMonth()+1;
    	month  = (month<10?'0':'')+month;
    var day    = d.getDate();
    	day    = (day<10?'0':'') + day;
    var hours  = d.getHours();
    var minute = d.getMinutes();
        minute = (minute<10?'0':'') + minute;
    var year = d.getFullYear();
    str_date = hours+":"+minute + " " + day + "/" + month + "/" + year;
    return str_date;
}

function SendNotification_Complete(data)
{

}