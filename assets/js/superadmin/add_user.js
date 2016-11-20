$(document).ready(function() {
    get_option_list_agent();
    $("#txtphone").ForceNumericOnly();
    $("#txtfees").ForceNumericOnly();
    $("#txtemei").ForceNumericOnly();
	$( "#btnsave" ).bind("click",function(){
        btnsave_adduser();
    });
});

function btnsave_adduser()
{
    //hide all notify
    $("#notifyimei").hide();
    $("#notifyerr").hide();
    $("#notifysuccess").hide();
    
    //get value textbox
    var txtfullname = $("#txtfullname").val();
    var txtusername = $("#txtusername").val();
    var txtpass = $("#txtpass").val();
    //var txtrepass = $("#txtrepass").val();
    var txtphone = $("#txtphone").val();
    var rastatus = $("input[name='rastatus']:checked").val();
    var rafees = $("input[name='rafees']:checked").val();
    var txtfees = $("#txtfees").val();
    var txtremark = $("#txtremark").val();
    var txtduedate   =  $("#txtduedate").val();
    var txtusernameagent   =  $("#txtusernameagent").val();
    var txtemei = $("#txtemei").val();
    var txtverifycode = $("#txtverifycode").val();
    
    
    if(txtemei == null || txtemei =="")
    {
        $("#notifyimei").show();
    }
    else
    {
        btnsave_adduser2();
    }
}
function btnsave_adduser2()
{
    var txtfullname = $("#txtfullname").val();
    var txtusername = $("#txtusername").val();
    var txtpass = $("#txtpass").val();
    //var txtrepass = $("#txtrepass").val();
    var txtphone = $("#txtphone").val();
    var rastatus = $("input[name='rastatus']:checked").val();
    var rafees = $("input[name='rafees']:checked").val();
    var txtfees = $("#txtfees").val();
    var txtremark = $("#txtremark").val();
    var txtduedate   =  $("#txtduedate").val();
    var txtusernameagent   =  $("#txtusernameagent").val();
    var txtemei = $("#txtemei").val();
    var txtverifycode = $("#txtverifycode").val();
    
    $("body").addClass("loading");
    $.ajax({
        type:"POST",
        url:"home_controller/btnsave_adduser",
        dataType:"text",
        data: {
                txtfullname: txtfullname,
                txtusername: txtusername,  
                txtpass: txtpass,
                txtphone: txtphone, 
                rastatus: rastatus,
                rafees: rafees,
                txtfees: txtfees,
                txtremark: txtremark,
                txtduedate: txtduedate,
                txtusernameagent:txtusernameagent,
                txtemei: txtemei,
                txtverifycode: txtverifycode
                },
        cache:false,
        success:function (data) {
            btnsave_adduser_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function btnsave_adduser_Complete(data)
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
function check_isset_username(username)
{
    $("#notifyusername2").hide();
    $("body").addClass("loading");
    $.ajax({
        type:"POST",
        url:"home_controller/check_isset_username",
        dataType:"text",
        data: {
            username:username
            },
        cache:false,
        success:function (data) {
            check_isset_username_Complete(data);
        },
        error: function () { alert("Error!");}
    });
}
function check_isset_username_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes==0) //not isset
    {
        btnsave_adduser2();
    }
    else
    {
        $("#notifyusername2").show();
        $("body").removeClass("loading");
    }
        
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