//event write in evnt.calendar.init.js

$(document).ready(function() {
    $( "#txtmoney" ).ForceNumericOnly();
    $( "#txtmoneyrefund" ).ForceNumericOnly();
    
    getcurrentdate();
    //event write in evnt.calendar.init.js
    $( "#prestatement" ).bind("click",function(){
        var currentDate = $( "#selecteddate" ).html();
        var dd = currentDate.split('/')[0];
        
        var mm = parseFloat(currentDate.split('/')[1])-1;
        var yyyy = currentDate.split('/')[2];
        
        var actualDate = new Date(yyyy, mm, dd); // convert to actual date
        var yesterday = new Date(actualDate);
        yesterday.setDate(actualDate.getDate()-1);
        
        var twoDigitMonth = ((yesterday.getMonth().length+1) === 1)? (yesterday.getMonth()+1) : '0' + (yesterday.getMonth()+1);
        if(parseFloat(twoDigitMonth)<10)
            twoDigitMonth = "0"+parseFloat(twoDigitMonth);
        else
            twoDigitMonth = parseFloat(twoDigitMonth);
        var a = yesterday.getDate().toString();
        
        var day = ((a.length) == 1)? '0' + (a): (a);
        
        if(dd != "01")
        {
            var classclick = "calendar-day-" + yesterday.getFullYear() + "-" + twoDigitMonth + "-" + day;
            //alert(classclick);return;
            $( "." + classclick + " .day-contents" ).trigger( "click" );
        }
        else
        {
            var classclick = "calendar-day-" + yesterday.getFullYear() + "-" + twoDigitMonth + "-" + day;
            $( ".clndr-previous-button" ).trigger( "click" );
            $( "." + classclick + " .day-contents" ).trigger( "click" );
        }
        
        getselecteddate(day);
    });
    $( "#btnsave" ).bind("click",function(){
        btnsavepayorder();
    });
    $( "#btnsaverefund" ).bind("click",function(){
        btnsaverefund();
    });
    
});
function getcurrentdate()
{
    var fullDate = new Date();
    //convert month to 2 digits
    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
    if(parseFloat(twoDigitMonth)<10)
        twoDigitMonth = "0"+parseFloat(twoDigitMonth);
    else
        twoDigitMonth = parseFloat(twoDigitMonth);
    var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
    $("#selecteddate").html(currentDate);
    getselecteddate(fullDate.getDate());
}

function getselecteddate(day)
{
    if(day == "" || day == null)
	{
		var d = new Date();
		day = d.getDate();
	}
	else
	{
		var day = ((day.length) === 1)? '0' + (day): (day);
	}
	var stryear = $('.month').html();			
	var year = stryear.split('</span>')[1];
	year = year.substring(1);
	var month = stryear.split('</span>')[0];
	month = month.substring(6);
    
	var arr_month = { January : "01", February : "02", March : "03", April : "04", May : "05", June : "06", July : "07", August :"08", September : "09", October : "10", November : "11", December : "12" };
	
	var date = day + "/" + arr_month[month] + "/" + year;
	$('#selecteddate').html(date);
    get_agent_statement(1,date);
}
function get_agent_statement(page,date)
{
    $("body").addClass("loading");
    
    $.ajax({
        type:"POST",
        url:"home_controller/get_agent_statement",
        dataType:"text",
        data: {
                page: page,
                date: date                              
                },
        cache:false,
        success:function (data) {
            get_agent_statement_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function get_agent_statement_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.totalrow > 0)
    {
        $("#divlistresult").html(sRes.str_list);
        $("#divpagination").html(sRes.str_numpage);
    }
    else
    {
        $("#divlistresult").html(sRes.notfound);
        $("#divpagination").html("");        
    }
    $("body").removeClass("loading");
}
/*
|----------------------------------------
|function click button pay all 
|----------------------------------------
*/
function payall(agentid,yyyy_mm_dd)
{
    var strconfirm = confirm("Do you want continue?");
    if (strconfirm == true)
    {
        $("body").addClass("loading");
        $.ajax({
            type:"POST",
            url:"home_controller/btnpayall",
            dataType:"text",
            data: {
                    agentid:        agentid,
                    yyyy_mm_dd:     yyyy_mm_dd                              
                    },
            cache:false,
            success:function (data) {
                btnpayall_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
        });
    }
}
function btnpayall_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.flag  == 1)
        alert("Successful");
    else
        alert("Error");
    //get_agent_statement(1,sRes.date);
    $("#active").trigger( "click" );
    $("body").removeClass("loading");
}
/*
|----------------------------------------
|function click button load modal pay order 
|----------------------------------------
*/
function refund(agentid,yyyy_mm_dd)
{
    $("#notifyerraddrefund").hide();
    $("#notifysuccessaddrefund").hide();
    
    $("#hiddenagentidrefund").val(agentid);
    $("#hiddendaterefund").val(yyyy_mm_dd);
}
/*
|----------------------------------------
|function click button load modal pay order 
|----------------------------------------
*/
function payorder(agentid,yyyy_mm_dd)
{
    $("#notifyerradd").hide();
    $("#notifysuccessadd").hide();
    
    $("#hiddenagentid").val(agentid);
    $("#hiddendate").val(yyyy_mm_dd);
}
/*
|----------------------------------------
|function click button show log of agent
|----------------------------------------
*/
function showlogagent(agentid,yyyy_mm_dd)
{
    $.ajax({
        type:"POST",
        url:"home_controller/showlogagent",
        dataType:"text",
        data: {
                agentid:        agentid,  
                yyyy_mm_dd:     yyyy_mm_dd,                      
                },
        cache:false,
        success:function (data) {
            showlogagent_Complete(data);
        },
        error: function () { alert("Error!");}
    });
}
function showlogagent_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.stt == 0)   //not found
        $("#divusertran").html(sRes.notify);
    else
        $("#divusertran").html(sRes.str_res);
}
/*
|----------------------------------------
|function click button refund
|----------------------------------------
*/
function btnsaverefund()
{
    $("#notifyerraddrefund").hide();
    $("#notifysuccessaddrefund").hide();
    $("#notifymoneyrefund").hide();
    
    var agentid         = $("#hiddenagentidrefund").val();
    var yyyy_mm_dd      = $("#hiddendaterefund").val();
    var money           = $("#txtmoneyrefund").val();
    
    if(money != "" && money != null)
    {
        var strconfirm      = confirm("Do you want continue?");
        if (strconfirm      == true)
        {
            $.ajax({
                type:"POST",
                url:"home_controller/btnsaverefund",
                dataType:"text",
                data: {
                        agentid:        agentid,
                        yyyy_mm_dd:     yyyy_mm_dd,
                        money:          money                              
                        },
                cache:false,
                success:function (data) {
                    btnsaverefund_Complete(data);
                },
                error: function () { alert("Error!");}
            });
        }
    }
    else
    {
        $("#notifymoneyrefund").show();
    }
    
}
function btnsaverefund_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.flag  == 1)
    {
        $("#notifyerraddrefund").hide();
        $("#notifysuccessaddrefund").show();
    }
    else
    {
        $("#notifyerraddrefund").show();
        $("#notifysuccessaddrefund").hide();
    }
    setTimeout(function(){
        $("#btncloserefund").trigger( "click" );
        $("#active").trigger( "click" );
        //get_agent_statement(1,sRes.date);
    }, 1000);
}
/*
|----------------------------------------
|function click button save pay order 
|----------------------------------------
*/
function btnsavepayorder()
{
    $("#notifyerradd").hide();
    $("#notifysuccessadd").hide();
    $("#notifymoney").hide();
    
    var agentid         = $("#hiddenagentid").val();
    var yyyy_mm_dd      = $("#hiddendate").val();
    var money           = $("#txtmoney").val();
    
    if(money != "" && money != null)
    {
        var strconfirm      = confirm("Do you want continue?");
        if (strconfirm      == true)
        {
            $.ajax({
                type:"POST",
                url:"home_controller/btnpayorder",
                dataType:"text",
                data: {
                        agentid:        agentid,
                        yyyy_mm_dd:     yyyy_mm_dd,
                        money:          money                              
                        },
                cache:false,
                success:function (data) {
                    btnpayorder_Complete(data);
                },
                error: function () { alert("Error!");}
            });
        }
    }
    else
    {
        $("#notifymoney").show();
    }
    
}
function btnpayorder_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.flag  == 1)
    {
        $("#notifyerradd").hide();
        $("#notifysuccessadd").show();
    }
    else
    {
        $("#notifyerradd").show();
        $("#notifysuccessadd").hide();
    }
    setTimeout(function(){
        $("#btnclose").trigger( "click" );
        $("#active").trigger( "click" );
        //get_agent_statement(1,sRes.date);
    }, 1000);
}
//only press number
jQuery.fn.ForceNumericOnly =
function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.charCode || e.keyCode || 0;
            return (
                key == 8 ||
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
//end only press number