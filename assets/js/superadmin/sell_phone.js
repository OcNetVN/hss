$(document).ready(function() {
    $("#txtprice").ForceNumericOnly();
    $("#txtemei").ForceNumericOnly();
    //$("#phonemodel").ForceNumericOnly();
    get_option_list_agent();
    
	$( "#btnsave" ).bind("click",function(){
        btnsave_sellphone();
    });
    $( "#btnlistsellphone" ).bind("click",function(){
        get_list_sellphone(1);
        $( "#btnlistsellphone" ).hide();
        $( "#divadd" ).hide();
        $( "#btnaddsellphone" ).show();
        $( "#divlist" ).show();
    });
    $( "#btnaddsellphone" ).bind("click",function(){
        $( "#btnlistsellphone" ).show();
        $( "#divadd" ).show();
        $( "#btnaddsellphone" ).hide();
        $( "#divlist" ).hide();
    });
});
/*
|-------------------------------------------
| function get option list agent
|-------------------------------------------
*/
function get_option_list_agent()
{
    $("body").addClass("loading");
    $.ajax({
        type:"POST",
        url:"home_controller/get_option_list_agent",
        dataType:"text",
        cache:false,
        success:function (data) {
            get_option_list_agent_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function get_option_list_agent_Complete(data)
{
    var sRes = JSON.parse(data);
    $("#list_username_agent").html(sRes.str_res);
    $("body").removeClass("loading");
}

/*
|-------------------------------------------
| function button save selllphone
|-------------------------------------------
*/
function btnsave_sellphone()
{
    $("[id*='notify']").hide();
    var agenname                =   $("#agenname").val();
    if(agenname  == "")
        $("#notifyagentname").show();
    else
    {
        var raprice             =   $("input[name='raprice']:checked").val();
        var phonemodel          =   $("#phonemodel").val();
        var txtprice            =   $("#txtprice").val();
        var txtemei             =   $("#txtemei").val();
        var txtdatetaken        =   $("#txtdatetaken").val();
        var txt_remark          =   $("#txt_remark").val();
        var rastatus            =   $("input[name='rastatus']:checked").val();
        
        $("body").addClass("loading");
        $.ajax({
            type:"POST",
            url:"home_controller/btnsave_sellphone",
            dataType:"text",
            data: {
                    agenname        : agenname,
                    raprice         : raprice,  
                    phonemodel      : phonemodel,
                    txtprice        : txtprice, 
                    txtemei         : txtemei,
                    txtdatetaken    : txtdatetaken,
                    txt_remark      : txt_remark, 
                    rastatus        : rastatus,                   
                    },
            cache:false,
            success:function (data) {
                btnsave_sellphone_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
        });    
    }
}
function btnsave_sellphone_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.stt == 0 || sRes.stt == "0")
    {
        $("#notifyerr").show();
    }
    else
    {
        if(sRes.stt == 1 || sRes.stt == "1")
        {
            $("#notifysuccess").show();
        }
    }
    $("body").removeClass("loading");
}
/*
|-------------------------------------------
| function get list sellphone
|-------------------------------------------
*/
function get_list_sellphone(page)
{
    $("body").addClass("loading");
    //alert("dsfds");
    $.ajax({
        type:"POST",
        url:"home_controller/get_list_sellphone",
        dataType:"text",
        data: {
                page        :   page,                             
                },
        cache:false,
        success:function (data) {
            get_list_sellphone_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function get_list_sellphone_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.totalrow > 0)
    {
        $("#notifyres").hide();
        $("#tbodylistsellphone").html(sRes.str_list);
        $("#divpagination").html(sRes.str_numpage);
        $("#tbllistsellphone").show();
    }
    else
    {
        $("#tbllistsellphone").hide();
        $("#notifyres").html(sRes.notfound);
        $("#notifyres").show();
        $("#divpagination").html("");
    }
    $("body").removeClass("loading");
}


//only press number
jQuery.fn.ForceNumericOnly =
function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 ||
                key == 9 ||
				//key == 252 ||
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