socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'LotBigsweep'){
       //load_bigsweep();
    }
});

$(document).ready(function() {
    $( "#divshowdata" ).hide();
    $( "#btnsaveall" ).hide();
    
    $( "#btnconvertall" ).bind("click",function(){
        btnconvertall_bigsweep();
    });
    $( "#btnsaveall" ).bind("click",function(){
        btnsaveall_bigsweep();
    });
    
    //editable
    $.fn.editable.defaults.mode = 'popup'; 
    
});
function hidenotify()
{
    $( "#notifyerr" ).hide();
    $( "#notifysuccess" ).hide();
    $( "#notifycontent" ).hide();
}

/* set url default mặc định */
function getURL()
{
    //http://localhost/racing/Source/admin/login
    //http://localhost/nhaplieuspa/login
    //http://www.test.com:8082/index.php#tab2?foo=123
    // window.location.host                   www.test.com:8082
    //window.location.hostname               www.test.com
    //window.location.port                   8082
    //window.location.protocol               http
    //window.location.pathname               index.php
    //window.location.href                   http://www.test.com:8082/index.php#tab2
    //window.location.hash                   #tab2
    //window.location.search                 ?foo=123

    var str= window.location.href.toString() ;
    var host = window.location.host.toString() ;
    str = str.toLowerCase();
    var res = "";
    if(str.indexOf("localhost") >=0 || str.indexOf("127.0.0.1")>=0)
    {
        res= "http://" + host + "/racing/Source/";        
        //return res;    
    }
    else
    {
       res = "http://" + host + "/";   
       //alert("str : "+str);
       
    }
    return res;
}
/*
|----------------------------------------------------------------
| function convert all
|----------------------------------------------------------------
*/
function btnconvertall_bigsweep()
{
    hidenotify();
    
    var ContentConvert = $( "#ContentConvert" ).val();
    if(ContentConvert == null || ContentConvert == "")
    {
        $( "#notifycontent" ).show();
    }
    else
    {
        $.ajax({
                type:"POST",
                url: getURL() + "admin/homelt_controller/btnconvertall_bigsweep",
                dataType:"text",
                data: {ContentConvert: ContentConvert},
                cache:false,
                success:function (data) {
                    btnconvertall_bigsweep_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}

function btnconvertall_bigsweep_Complete(data){
    var sRes    = JSON.parse(data);
    $("#span_date").html(sRes.showdate);
    $("#spandrawno").html(sRes.drawno);
    $("#spanjp1").html(sRes.str_jp1);
    $("#spanjp2").html(sRes.str_jp2);
    
    $("#spanno1").html(sRes.arr_res_mainprize[0][0]);
    $("#span1st").html(sRes.arr_res_mainprize[0][1]);
    $("#spanjp1prize").html(sRes.arr_res_mainprize[0][2]);
    
    $("#spanno2").html(sRes.arr_res_mainprize[1][0]);
    $("#span2nd").html(sRes.arr_res_mainprize[1][1]);
    $("#spanjp2prize").html(sRes.arr_res_mainprize[1][2]);
    
    $("#spanno3").html(sRes.arr_res_mainprize[2][0]);
    $("#span3rd").html(sRes.arr_res_mainprize[2][1]);
    $("#spanjp3prize").html(sRes.arr_res_mainprize[2][2]);
    
    $("#spanno4").html(sRes.arr_res_mainprize[3][0]);
    $("#span4th").html(sRes.arr_res_mainprize[3][1]);
    $("#spanjp4prize").html(sRes.arr_res_mainprize[3][2]);
    
    $("#spanno5").html(sRes.arr_res_mainprize[4][0]);
    $("#span5th").html(sRes.arr_res_mainprize[4][1]);
    $("#spanjp5prize").html(sRes.arr_res_mainprize[4][2]);
    
    $("#spanno6").html(sRes.arr_res_mainprize[5][0]);
    $("#span6th").html(sRes.arr_res_mainprize[5][1]);
    $("#spanjp6prize").html(sRes.arr_res_mainprize[5][2]);
    
    var str_start        = "";
    for(var i = 0; i <10; i ++)
    {
        if((i+1)%4 == 1)
            str_start    += "<tr>";
        str_start    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanstart_"+ i +"\">" + sRes.arr_startprize[i] + "</span></strong></td>";
        if((i+1)%4 == 0)
            str_start    += "</tr>";
    }
    str_start    += "</tr>";
    $("#tbodystart").html(str_start);
    
    var str_specical        = "";
    for(var i = 0; i <45; i ++)
    {
        if((i+1)%4 == 1)
            str_specical    += "<tr>";
        str_specical    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + sRes.arr_specialprize[i] + "</span></strong></td>";
        if((i+1)%4 == 0)
            str_specical    += "</tr>";
    }
    str_specical    += "</tr>";
    $("#tbodyspecial").html(str_specical);
    
    var str_consolation        = "";
    for(var i = 0; i <90; i ++)
    {
        if((i+1)%4 == 1)
            str_consolation    += "<tr>";
        str_consolation    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + sRes.arr_consolationprize[i] + "</span></strong></td>";
        if((i+1)%4 == 0)
            str_consolation    += "</tr>";
    }
    str_consolation    += "</tr>";
    $("#tbodyconsolation").html(str_consolation);
    
    var str_18prize        = "";
    for(var i = 0; i <3; i ++)
    {
        if((i+1)%4 == 1)
            str_18prize    += "<tr>";
        str_18prize    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanprize18_"+ i +"\">" + sRes.arr_prize18[i] + "</span></strong></td>";
        if((i+1)%4 == 0)
            str_18prize    += "</tr>";
    }
    str_18prize    += "</tr>";
    $("#tbody18prize").html(str_18prize);
    
    var str_189prize        = "";
    for(var i = 0; i <3; i ++)
    {
        if((i+1)%4 == 1)
            str_189prize    += "<tr>";
        str_189prize    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanprize189_"+ i +"\">" + sRes.arr_prize189[i] + "</span></strong></td>";
        if((i+1)%4 == 0)
            str_189prize    += "</tr>";
    }
    str_189prize    += "</tr>";
    $("#tbody189prize").html(str_189prize);
    
    var str_1890prize        = "";
    for(var i = 0; i <3; i ++)
    {
        if((i+1)%4 == 1)
            str_1890prize    += "<tr>";
        str_1890prize    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanprize1890_"+ i +"\">" + sRes.arr_prize1890[i] + "</span></strong></td>";
        if((i+1)%4 == 0)
            str_1890prize    += "</tr>";
    }
    str_1890prize    += "</tr>";
    $("#tbody1890prize").html(str_1890prize);
    
    $("#span6300prize").html(sRes.str_prize6300);
    
    
    $('#span_date').editable();
    $('#spandrawno').editable();
    $('#spanjp1').editable();
    $('#spanjp2').editable();
    
    $('#spanjp1prize').editable();
    $('#spanno1').editable();
    $('#span1st').editable();
    
    $('#spanjp2prize').editable();
    $('#spanno2').editable();
    $('#span2nd').editable();
    
    $('#spanjp3prize').editable();
    $('#spanno3').editable();
    $('#span3rd').editable();
    
    $('#spanjp4prize').editable();
    $('#spanno4').editable();
    $('#span4th').editable();
    
    $('#spanjp5prize').editable();
    $('#spanno5').editable();
    $('#span5th').editable();
    
    $('#spanjp6prize').editable();
    $('#spanno6').editable();
    $('#span6th').editable();
    $( "span[id*='spanstart_']" ).editable();
    $( "span[id*='spanspecial_']" ).editable();
    $( "span[id*='spanconsolation_']" ).editable();
    $( "span[id*='spanprize18_']" ).editable();
    $( "span[id*='spanprize189_']" ).editable();
    $( "span[id*='spanprize1890_']" ).editable();
    $('#span6300prize').editable();
    
    $( "#btnsaveall" ).show();
    $( "#divshowdata" ).show();
}
/*
|----------------------------------------------------------------
| function save all after convert and edit infomation
|----------------------------------------------------------------
*/
function btnsaveall_bigsweep()
{
    var span_date                   =   $( "#span_date" ).html();
    var spandrawno                  =   $( "#spandrawno" ).html();
    var spanjp1                     =   $( "#spanjp1" ).html();
    var spanjp2                     =   $( "#spanjp2" ).html();
    
    var spanno1                     =   $( "#spanno1" ).html();
    var span1st                     =   $( "#span1st" ).html();
    var spanjp1prize                =   $( "#spanjp1prize" ).html();
    
    var spanno2                     =   $( "#spanno2" ).html();
    var span2nd                     =   $( "#span2nd" ).html();
    var spanjp2prize                =   $( "#spanjp2prize" ).html();
    
    var spanno3                     =   $( "#spanno3" ).html();
    var span3rd                     =   $( "#span3rd" ).html();
    var spanjp3prize                =   $( "#spanjp3prize" ).html();
    
    var spanno4                     =   $( "#spanno4" ).html();
    var span4th                     =   $( "#span4th" ).html();
    var spanjp4prize                =   $( "#spanjp4prize" ).html();
    
    var spanno5                     =   $( "#spanno5" ).html();
    var span5th                     =   $( "#span5th" ).html();
    var spanjp5prize                =   $( "#spanjp5prize" ).html();
    
    var spanno6                     =   $( "#spanno6" ).html();
    var span6th                     =   $( "#span6th" ).html();
    var spanjp6prize                =   $( "#spanjp6prize" ).html();
    
    var arr_start                   = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementstart            =   $( "#spanstart_" + i ).html();
        arr_start.push(elementstart);
    }
    
    var arr_special                 = [];
    for(var i   = 0; i  < 45; i ++)
    {
        var elementspecial          =   $( "#spanspecial_" + i ).html();
        arr_special.push(elementspecial);
    }
    
    var arr_consolation             = [];
    for(var i   = 0; i  < 90; i ++)
    {
        var elementconsolation      =   $( "#spanconsolation_" + i ).html();
        arr_consolation.push(elementconsolation);
    }
    
    var arr_prize18                 = [];
    for(var i   = 0; i  < 3; i ++)
    {
        var elementprize18          =   $( "#spanprize18_" + i ).html();
        arr_prize18.push(elementprize18);
    }
    
    var arr_prize189                = [];
    for(var i   = 0; i  < 3; i ++)
    {
        var elementprize189         =   $( "#spanprize189_" + i ).html();
        arr_prize189.push(elementprize189);
    }
    
    var arr_prize1890               = [];
    for(var i   = 0; i  < 3; i ++)
    {
        var elementprize1890        =   $( "#spanprize1890_" + i ).html();
        arr_prize1890.push(elementprize1890);
    }
    
    var span6300prize               =   $( "#span6300prize" ).html();
    
    
    $.ajax({
            type:"POST",
            url: getURL() + "admin/homelt_controller/btnsaveall_bigsweep",
            dataType:"text",
            data: {     span_date               :   span_date,
                        spandrawno              :   spandrawno,
                        spanjp1                 :   spanjp1,
                        spanjp2                 :   spanjp2,
                        
                        spanno1                 :   spanno1,
                        span1st                 :   span1st,
                        spanjp1prize            :   spanjp1prize,
                        
                        spanno2                 :   spanno2,
                        span2nd                 :   span2nd,
                        spanjp2prize            :   spanjp2prize,
                        
                        spanno3                 :   spanno3,
                        span3rd                 :   span3rd,
                        spanjp3prize            :   spanjp3prize,
                        
                        spanno4                 :   spanno4,
                        span4th                 :   span4th,
                        spanjp4prize            :   spanjp4prize,
                        
                        spanno5                 :   spanno5,
                        span5th                 :   span5th,
                        spanjp5prize            :   spanjp5prize,
                        
                        spanno6                 :   spanno6,
                        span6th                 :   span6th,
                        spanjp6prize            :   spanjp6prize,
                        
                        arr_start               :   arr_start,
                        arr_special             :   arr_special,
                        arr_consolation         :   arr_consolation,
                        arr_prize18             :   arr_prize18,
                        arr_prize189            :   arr_prize189,
                        arr_prize1890           :   arr_prize1890,
                        span6300prize           :   span6300prize
                    },
            cache:false,
            success:function (data) {
                btnsaveall_bigsweep_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}
function btnsaveall_bigsweep_Complete(data)
{
    var sRes    = JSON.parse(data);
    if(sRes     == 1)
    {
        var res = 'LotBigsweep';
        socket.emit('PageRefresh', res);
	       console.log(res);
        $( "#notifysuccess" ).show();
    }
    else
    {
        $( "#notifyerr" ).show();
    }
}