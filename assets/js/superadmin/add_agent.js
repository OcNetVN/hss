$(document).ready(function() {
    $("#txtverifycode").ForceNumericOnly();
    $("#txtphone").ForceNumericOnly();
    $("#txtfees").ForceNumericOnly();
    $("#contact").ForceNumericOnly();
    $("#txt_fees").ForceNumericOnly();
    $("#txtemei").ForceNumericOnly();
	$( "#btnsave" ).bind("click",function(){
        btnsave_addagent();
    });
    $( "#btncleartxduedate" ).bind("click",function(){
        $("#txtduedate").val("");
    });
    
});

function btnsave_addagent()
{
    //hide all notify
    $("#notifyfullname").hide();
    $("#notifyusername").hide();
    $("#notifypass").hide();
    $("#notifyrepass").hide();
    $("#notifyrepass2").hide();
    $("#notifyerr").hide();
    $("#notifysuccess").hide();
    
    //get value textbox
    var txtfullname = $("#txtfullname").val();
    var txtusername = $("#txtusername").val();
    var txtpass = $("#txtpass").val();
    var txtrepass = $("#txtrepass").val();
    var txtphone = $("#txtphone").val();
    var rastatus = $("input[name='rastatus']:checked").val();
    var rafees = $("input[name='rafees']:checked").val();
    var txtfees = $("#txtfees").val();
    var txtremark = $("#txtremark").val();
    
    //check value
    if(txtfullname == null || txtfullname =="")
    {
        $("#notifyfullname").show();
    }
    else
    {
        if(txtusername == null || txtusername =="")
        {
            $("#notifyusername").show();
        }
        else
        {
            if(txtpass == null || txtpass =="")
            {
                $("#notifypass").show();
            }
            else
            {
                if(txtrepass == null || txtrepass =="")
                {
                    $("#notifyrepass").show();
                }
                else
                {
                    if(txtrepass != txtpass)
                    {
                        $("#notifyrepass2").show();
                    }
                    else
                    {
                        check_isset_username(txtusername);
                    }
                }
            }
        }
    }
}
function btnsave_addagent2()
{
    var txtfullname = $("#txtfullname").val();
    var txtusername = $("#txtusername").val();
    var txtpass = $("#txtpass").val();
    var txtrepass = $("#txtrepass").val();
    var txtphone = $("#txtphone").val();
    var rastatus = $("input[name='rastatus']:checked").val();
    var rafees = $("input[name='rafees']:checked").val();
    var txtfees = $("#txtfees").val();
    var txtremark = $("#txtremark").val();
    
    $("body").addClass("loading");
    $.ajax({
        type:"POST",
        url:"home_controller/btnsave_addagent",
        dataType:"text",
        data: {
                txtfullname: txtfullname,
                txtusername: txtusername,  
                txtpass: txtpass,
                txtphone: txtphone, 
                rastatus: rastatus,
                rafees: rafees,
                txtfees: txtfees,
                txtremark: txtremark                           
                },
        cache:false,
        success:function (data) {
            btnsave_addagent_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function btnsave_addagent_Complete(data)
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

function SaveAddAgent(id){
   var agentname =  $("#agenname").val();
   var username  = $("#username").val();
   var contact   =  $("#contact").val();
   var txtpassnew   =  $("#txtpassnew").val();
    var status = $("input[name='radiostatus']:checked").val();
    var rafees = $("input[name='feesradio']:checked").val();
    var txtfees = $("#txt_fees").val();
    var txtremark = $("#txt_remark").val();
    var txtduedate   =  $("#txtduedate").val();
    var txtemei = $("#txtemei").val();
    var txtverifycode   =  $("#txtverifycode").val();
    var showpid = $("input[name='showparentradio']:checked").val();
    //check value
    if(agentname == null || agentname =="")
    {
        $("#notifyfullname").show();
    }
    else
    {
        /*if(username == null || username =="")
        {
            $("#notifyusername").show();
        }
        else
        {*/
            $("body").addClass("loading");
            $.ajax({
                type:"POST",
                url:"home_controller/updateagent",
                dataType:"text",
                data: {
                        rowid: id,
                        txtfullname: agentname,
                        txtusername: username,  
                        txtpassnew: txtpassnew,
                        txtphone: contact,
                        rastatus: status,
                        rafees: rafees,
                        txtfees: txtfees,
                        txtremark: txtremark,
                        txtduedate: txtduedate,
                        txtemei: txtemei,
                        txtverifycode: txtverifycode,
						showpid: showpid,
                        },
                cache:false,
                success:function (data) {
                    SaveAgent_Complete(data);
                },
                error: function () { alert("Error!"); $("body").removeClass("loading");}
            });
        //}
    }
    
}

function SaveAgent_Complete(data){
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

function DeleteAddAgent(id){
    var strconfirm = confirm("Do you want to delete?");
    if (strconfirm == true)
    {
         $("body").addClass("loading");
                $.ajax({
                    type:"POST",
                    url:"home_controller/deleteagent",
                    dataType:"text",
                    data: {rowid: id },
                    cache:false,
                    success:function (data) {
                        DeleteAddAgent_Complete(data);
                    },
                    error: function () { alert("Error!"); $("body").removeClass("loading");}
                });
    }
}

function DeleteAddAgent_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.stt == 0 || sRes.stt == "0")
    {
        $("#notifyerr").show();
    }
    else
    {
        if(sRes.stt == 1 || sRes.stt == "1")
        {
            document.location.href = "dashboard";
        }
    }
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
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function check_isset_username_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes==0) //not isset
    {
        btnsave_addagent2();
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