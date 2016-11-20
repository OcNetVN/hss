$(document).ready(function() {
    /*get value date for textbox*/
    get_value_date();
    
    var txtdate	=	$("#txtdate").val();
	get_data_by_txtdate(txtdate);
    
    $( "#btnclearall" ).bind("click",function(){
        btnclearall();
    });
    
    $( "#btnsaveall" ).bind("click",function(){
        btnsaveall_2d();
    });
    
    //editable
    $.fn.editable.defaults.mode = 'popup'; 
});
/*
|----------------------------------------------------------------
|function get value date for textbox
|----------------------------------------------------------------
*/
function get_value_date()
{
    var d       = new Date();
    var month   = d.getMonth()+1;
    var day     = d.getDate();
    var strdate = (day<10 ? '0' : '') + day + '-' + (month<10 ? '0' : '') + month + '-' + d.getFullYear();
    
    $("#txtdate").val(strdate);
}
function get_data_by_txtdate(txtdate)
{
    var url             = window.location.href;     // Returns full URL
    var arr_url         =   url.split("/");
    var para_url        =   arr_url[(arr_url.length-1)];
    
    if(para_url         ==  "D2")
    {
        $.ajax({
                type:"POST",
                url: "../admin/homelt_controller/get_data_by_txtdate_2d",
                dataType:"text",
                data: {
                        txtdate         :   txtdate
                },
                cache:false,
                success:function (data) {
                    get_data_by_txtdate_2d_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}

function get_data_by_txtdate_2d_Complete(data)
{
    var sRes        = JSON.parse(data);
    if(sRes.flag    == 1)
    {
        var txtdate	=	$("#txtdate").val();
        $( "#span_txdaynight" ).html(txtdate);
        $( "#span_txdayday" ).html(txtdate);
        
        if(sRes.arr_res.day     == "")
            $( "#spannumday" ).html("");
        else
            $( "#spannumday" ).html(sRes.arr_res.day);
        if(sRes.arr_res.night   == "")
            $( "#spannumnight" ).html("");
        else
            $( "#spannumnight" ).html(sRes.arr_res.night);
    }
    else
    {
        // not data but show date 21/04/2015
        var txtdate =   $("#txtdate").val();
        $( "#span_txdaynight" ).html(txtdate);
        $( "#span_txdayday" ).html(txtdate);
        // end show date  
        $( "#spannumday" ).html("E");
        $( "#spannumnight" ).html("E");
    }
    
    //editable
    $( "#spannumday" ).editable();
    $( "#spannumnight" ).editable();
}

/*
|----------------------------------------------------------------
| function clear all
|----------------------------------------------------------------
*/
function btnclearall()
{
    $( "span[id*='span']" ).html("");
}

function hidenotify()
{
    $( "#notifyerr" ).hide();
    $( "#notifysuccess" ).hide();
    $( "#notifycontent" ).hide();
}
/*
|----------------------------------------------------------------
| function save all after convert and edit infomation
|----------------------------------------------------------------
*/
function btnsaveall_2d()
{
    var txtdate	                        =	$("#txtdate").val();
    var spannumday                      =   $( "#spannumday" ).html();
    var spannumnight                    =   $( "#spannumnight" ).html();
    var _2d = {};
        _2d.txtdate  = txtdate;
        _2d.numday   = spannumday;
        _2d.numnight = spannumnight;
    $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/btnsaveall_2d",
            dataType:"text",
            data: {     span_date                   :   txtdate,
                        spannumday                  :   spannumday,
                        spannumnight                :   spannumnight
                    },
            cache:false,
            success:function (data) {
                btnsaveall_2d_Complete(data,_2d);
            },
            error: function () { alert("Error!");}
   });
}
function btnsaveall_2d_Complete(data,_2d)
{
    var sRes    = JSON.parse(data);
    if(sRes     == 1)
    {
        var res = 'LotTwod';
        var trans = {};
            trans.message = 'LotTwod';
            trans.list    = _2d;
        socket.emit('PageRefresh', trans);
	       console.log(res);
        $( "#notifysuccess" ).show();
    }
    else
    {
        $( "#notifyerr" ).show();
    }
}
