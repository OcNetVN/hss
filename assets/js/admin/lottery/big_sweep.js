socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'LotBigsweep'){
       //load_bigsweep();
    }
});

$(document).ready(function() {
    $( "#divshowdata" ).hide();
    $( "#btnsaveall" ).hide();
    
    var txtdate	=	$("#txtdate").val();
	get_data_by_txtdate(txtdate);
    
    /*get value date for textbox*/
    get_value_date();
    
    $( "#btnconvertall" ).bind("click",function(){
        btnconvertall_bigsweep();
    });
    $( "#btnsaveall" ).bind("click",function(){
        btnsaveall_bigsweep();
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

function get_data_by_txtdate(txtdate)
{
    $( "#divshowdata" ).hide();
    
    var url             = window.location.href;     // Returns full URL
    var arr_url         =   url.split("/");
    var para_url        =   arr_url[(arr_url.length-1)];
    
    if(para_url         ==  "wes_bg")
    {
        $.ajax({
                type:"POST",
                url: "../admin/homelt_controller/get_data_by_txtdate_bigsweep",
                dataType:"text",
                data: {
                        txtdate         :   txtdate
                },
                cache:false,
                success:function (data) {
                    get_data_by_txtdate_bigsweep_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function get_data_by_txtdate_bigsweep_Complete(data)
{
    var sRes        = JSON.parse(data);
    if(sRes.flag    == 1)
    {
        var txtdate	      =	$("#txtdate").val();
            txtdate       = txtdate.split("-");
        var sptxtdate     = txtdate[0]  + "-" + txtdate[1] + "-" + txtdate[2];
        $( "#span_date" ).html(sptxtdate);
        $( "#spandrawno" ).html(sRes.arr_res["Draw_No"]);
        $( "#spanjegit" ).html(sRes.arr_res["jpnumber"]);
        $( "#spanjp" ).html(sRes.arr_res["jprm"]);
        
        $( "#spanno1" ).html(sRes.arr_res["major_1"]);
        $( "#spanrm1" ).html(sRes.arr_res["majorrm_1"]);
        $( "#spanno2" ).html(sRes.arr_res["major_2"]);
        $( "#spanrm2" ).html(sRes.arr_res["majorrm_2"]);
        $( "#spanno3" ).html(sRes.arr_res["major_3"]);
        $( "#spanrm3" ).html(sRes.arr_res["majorrm_3"]);
        
        var str_bliss               = "";
        var arr_bliss               =   sRes.arr_res["bliss"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_bliss    += "<tr>";
            str_bliss    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbliss_"+ i +"\">" + arr_bliss[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_bliss    += "</tr>";
        }
        $("#tbodybliss").html(str_bliss);
        
        var str_sweet        = "";
        var arr_sweet               =   sRes.arr_res["sweet"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_sweet    += "<tr>";
            str_sweet    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spansweet_"+ i +"\">" + arr_sweet[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_sweet    += "</tr>";
        }
        str_sweet    += "</tr>";
        $("#tbodysweep").html(str_sweet);
        
        var str_glee        = "";
        var arr_glee        =   sRes.arr_res["glee"].split("|");
        for(var i = 0; i <30; i ++)
        {
            if((i+1)%4 == 1)
                str_glee    += "<tr>";
            str_glee    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanglee_"+ i +"\">" + arr_glee[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_glee    += "</tr>";
        }
        str_glee    += "</tr>";
        $("#tbodyglee").html(str_glee);
        
        var str_happy           = "";
        var arr_happy            =   sRes.arr_res["happy"].split("|");
        for(var i = 0; i <3; i ++)
        {
            if((i+1)%4 == 1)
                str_happy    += "<tr>";
            str_happy    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanhappy_"+ i +"\">" + arr_happy[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_happy    += "</tr>";
        }
        str_happy    += "</tr>";
        $("#tbodyhappy").html(str_happy);
        
        var str_lucky           = "";
        var arr_lucky           =   sRes.arr_res["lucky"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_lucky    += "<tr>";
            str_lucky    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanlucky_"+ i +"\">" + arr_lucky[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_lucky    += "</tr>";
        }
        str_lucky    += "</tr>";
        $("#tbodylucky").html(str_lucky);
        
        var str_bonus        = "";
        var arr_bonus           =   sRes.arr_res["bonus"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_bonus    += "<tr>";
            str_bonus    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbonus_"+ i +"\">" + arr_bonus[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_bonus    += "</tr>";
        }
        str_bonus    += "</tr>";
        $("#tbodybonus").html(str_bonus);
        
        $( "span[id*='span']" ).editable();
        
        $( "#divshowdata" ).show();
        $( "#btnsaveall" ).show();
    }
    else
    {
        $( "#divshowdata" ).hide();
        $( "#btnsaveall" ).hide();
    }
}
/*
|----------------------------------------------------------------
| function clear all
|----------------------------------------------------------------
*/
function btnclearall()
{
    $( "#ContentConvert" ).val("");
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
       //  $.ajax({
       //          type:"POST",
       //          url: "../admin/homelt_controller/btnconvertall_bigsweep",
       //          dataType:"text",
       //          data: {ContentConvert: ContentConvert},
       //          cache:false,
       //          success:function (data) {
       //              btnconvertall_bigsweep_Complete(data);
       //          },
       //          error: function () { alert("Error!");}
       // });
        btnconvertall_bigsweep_Complete(ContentConvert);
    }
}

function btnconvertall_bigsweep_Complete(data){
   
    var content = data.split("\n");
    if(content.length > 0)
    {
        var arrdate = content[1].split(" ");
        $("#span_date").html(arrdate[2]);
        var arrdrawNo  = content[2].split(" ");
        $("#spandrawno").html(arrdrawNo[2]);
        $("#spanjp").html(content[10]);
        $("#spanjegit").html(content[7]);
        $("#spanno1").html(content[14]);
        $("#spanrm1").html(content[15]);
        $("#spanno2").html(content[17]);
        $("#spanrm2").html(content[18]);
        $("#spanno3").html(content[21]);
        $("#spanrm3").html(content[22]);

    }
    
    
    var str_bliss        = "";
    var dem = 0;
    for(var i = 29; i < 39; i ++)
    {
        dem ++;
        if(dem%7 == 1)
            str_bliss    += "<tr>";
        str_bliss    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbliss_"+ (dem-1) +"\">" + $.trim(content[i]) + "</span></strong></td>";
        if(dem%7 == 0)
            str_bliss    += "</tr>";
    }
    //str_bliss    += "</tr>";
    $("#tbodybliss").html(str_bliss);
    
    var str_sweet        = "";
    dem = 0;
    for(var i = 42; i <52; i ++)
    {
        dem++;
        if(dem%7 == 1)
            str_sweet    += "<tr>";
        str_sweet    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spansweet_"+ (dem-1) +"\">" + $.trim(content[i]) + "</span></strong></td>";
        if(dem%7 == 0)
            str_sweet    += "</tr>";
    }
    //str_sweet    += "</tr>";
    $("#tbodysweep").html(str_sweet);
    
    var str_glee        = "";
    dem = 0;
    for(var i = 55; i <85; i ++)
    {
        dem++;
        if(dem%7 == 1)
            str_glee    += "<tr>";
        str_glee    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanglee_"+ (dem-1) +"\">" + $.trim(content[i]) + "</span></strong></td>";
        if(dem%7 == 0)
            str_glee    += "</tr>";
        //console.log("glee: " + content[i]);
    }
    //str_glee    += "</tr>";
    $("#tbodyglee").html(str_glee);
    
    var str_happy        = "";
    dem = 0;
    for(var i = 88; i <91; i ++)
    {
        dem++;
        if(dem%7 == 1)
            str_happy    += "<tr>";
        str_happy    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanhappy_"+ (dem-1) +"\">" + $.trim(content[i])  + "</span></strong></td>";
        if(dem%7 == 0)
            str_happy    += "</tr>";
    }
    $("#tbodyhappy").html(str_happy);
    
    var str_lucky        = "";
    dem = 0;
    for(var i = 94; i <104; i ++)
    {
        dem++;
        if(dem%7 == 1)
            str_lucky    += "<tr>";
        str_lucky    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanlucky_"+ (dem-1) +"\">" + $.trim(content[i])  + "</span></strong></td>";
        if(dem%7 == 0)
            str_lucky    += "</tr>";
    }
    //str_lucky    += "</tr>";
    $("#tbodylucky").html(str_lucky);
    
    var str_bonus        = "";
    dem = 0;
    for(var i = 107; i <117; i ++)
    {
        dem++;
        if(dem%7 == 1)
            str_bonus    += "<tr>";
        str_bonus    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbonus_"+ (dem-1) +"\">" + $.trim(content[i]) + "</span></strong></td>";
        if(dem%7 == 0)
            str_bonus    += "</tr>";
    }
    //str_bonus    += "</tr>";
    $("#tbodybonus").html(str_bonus);
    
    $( "span[id*='span']" ).editable();
    
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
    var spanjegit                     =   $( "#spanjegit" ).html();
    var spanjp                     =   $( "#spanjp" ).html();
    
    var spanno1                     =   $( "#spanno1" ).html();
    var spanrm1                     =   $( "#spanrm1" ).html();
    var spanno2                     =   $( "#spanno2" ).html();
    var spanrm2                     =   $( "#spanrm2" ).html();
    var spanno3                     =   $( "#spanno3" ).html();
    var spanrm3                     =   $( "#spanrm3" ).html();
    
    var arr_bliss                   = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementbliss            =   $( "#spanbliss_" + i ).html();
        arr_bliss.push(elementbliss);
    }
    
    var arr_sweet                   = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementsweet            =   $( "#spansweet_" + i ).html();
        arr_sweet.push(elementsweet);
    }
    
    var arr_glee                   = [];
    for(var i   = 0; i  < 30; i ++)
    {
        var elementglee            =   $( "#spanglee_" + i ).html();
        arr_glee.push(elementglee);
    }
    
    var arr_happy                   = [];
    for(var i   = 0; i  < 3; i ++)
    {
        var elementhappy            =   $( "#spanhappy_" + i ).html();
        arr_happy.push(elementhappy);
    }
    
    var arr_lucky                   = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementlucky            =   $( "#spanlucky_" + i ).html();
        arr_lucky.push(elementlucky);
    }
    
    var arr_bonus                   = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementbonus            =   $( "#spanbonus_" + i ).html();
        arr_bonus.push(elementbonus);
    }

    var big_sweep = {};
        big_sweep.txtday = span_date;
        big_sweep.drawno = spandrawno;
        big_sweep.jegit = spanjegit;
        big_sweep.jp    = spanjp;
        big_sweep.No1   = spanno1;
        big_sweep.rm1   = spanrm1;
        big_sweep.No2   = spanno2;
        big_sweep.rm2   = spanrm2;
        big_sweep.No3    = spanno3;
        big_sweep.rm3    = spanrm3;
        big_sweep.bliss = arr_bliss;
        big_sweep.sweet = arr_sweet;
        big_sweep.glee  = arr_glee;
        big_sweep.happy = arr_happy;
        big_sweep.lucky = arr_lucky;
        big_sweep.bonus = arr_bonus;
    
    $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/btnsaveall_bigsweep",
            dataType:"text",
            data: {     span_date               :   span_date,
                        spandrawno              :   spandrawno,
                        spanjegit                 :   spanjegit,
                        spanjp                 :   spanjp,
                        
                        spanno1                 :   spanno1,
                        spanrm1                 :   spanrm1,
                        spanno2                 :   spanno2,
                        spanrm2                 :   spanrm2,
                        spanno3                 :   spanno3,
                        spanrm3                 :   spanrm3,
                        
                        arr_bliss               :   arr_bliss,
                        arr_sweet               :   arr_sweet,
                        arr_glee                :   arr_glee,
                        arr_happy                :   arr_happy,
                        arr_lucky                :   arr_lucky,
                        arr_bonus                :   arr_bonus,
                    },
            cache:false,
            success:function (data) {
                btnsaveall_bigsweep_Complete(data,big_sweep);
            },
            error: function () { alert("Error!");}
   });
}
function btnsaveall_bigsweep_Complete(data,big_sweep)
{
    var sRes    = JSON.parse(data);
    if(sRes     == 1)
    {
        var trans = {};
            trans.message = 'LotBigsweep';
            trans.list    = big_sweep;
        //var res = 'LotBigsweep';
        socket.emit('PageRefresh',trans);
        $( "#notifysuccess" ).show();
    }
    else
    {
        $( "#notifyerr" ).show();
    }
}

function ClearTexbox()
{
    $("#ContentConvert").val("");
}