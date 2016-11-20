$(document).ready(function() {
    //alert("sdf");return;
    $('#btnlogin').bind("click",function(){
        $('#notifyerr0').hide();
        $('#notifyerr2').hide();
        $('#notifyerr3').hide();
        $('#notifyerr4').hide();
        
        var txtusername = $('#txtusername').val();
        var txtpassword = $('#txtpassword').val();
        $.ajax({
            type:"POST",
            url:"login_controller/btnlogin",
            dataType:"text",
            data: {
                txtusername: txtusername,
                txtpassword: txtpassword                                
                },
            cache:false,
            success:function (data) {
                btnlogin_complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); }
        });
    });
});
function btnlogin_complete(data)
{
    /*
    |----------------------------------------
    | status = 1: right
    | status = 0: pass not correct
    | status = 2: not active
    | status = 3: username not correct
    | status = 4: not permit
    |----------------------------------------
    */
    var sRes = JSON.parse(data);
    if(sRes ==  1 || sRes == "1")
    {
        parent.location = "dashboard";
    }
    else
    {
        if(sRes ==  0 || sRes == "0")
        {
            $('#notifyerr0').show();
        }
        else
        {
            if(sRes ==  2 || sRes == "2")
            {
                $('#notifyerr2').show();
            }
            else
            {
                if(sRes ==  3 || sRes == "3")
                {
                    $('#notifyerr3').show();
                }
                else
                {
                    if(sRes ==  4 || sRes == "4")
                    {
                        $('#notifyerr4').show();
                    }
                }
            }
        }
    }
}