$(document).ready(function() {
    //alert("sdfdf");
    $('#btnlogin').bind("click",function(){
        $('#notifyerr').hide();
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
    var sRes = JSON.parse(data);
    if(sRes==1 || sRes== "1")
    {
        parent.location = "live_tote";
    }
    else
    {
        $('#notifyerr').show();
    }
}