$(document).ready(function() {
    $( "#divshowdata" ).hide();
    $( "#btnsaveall" ).hide();
    
    var txtdate	=	$("#txtdate").val();
	get_data_by_txtdate(txtdate);
    
    /*get value date for textbox*/
    get_value_date();
    
    $( "#btnclearall" ).bind("click",function(){
        btnclearall();
    });
    
    $( "#btnconvertall" ).bind("click",function(){
        btnconvertall_totofourd();
    });
    
    $( "#btnsaveall" ).bind("click",function(){
        btnsaveall_totofourd();
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
    $( "#divshowdata" ).hide();
    
    var url             = window.location.href;     // Returns full URL
    var arr_url         =   url.split("/");
    var para_url        =   arr_url[(arr_url.length-1)];
    
    if(para_url         ==  "tt")
    {
        $.ajax({
                type:"POST",
                url: "../admin/homelt_controller/get_data_by_txtdate_totofourd",
                dataType:"text",
                data: {
                        txtdate         :   txtdate
                },
                cache:false,
                success:function (data) {
                    get_data_by_txtdate_totofourd_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function get_data_by_txtdate_totofourd_Complete(data)
{
    var sRes        = JSON.parse(data);
    if(sRes.flag    == 1)
    {
        var txtdate	=	$("#txtdate").val();
            txtdate = txtdate.split("-");
        var day   = txtdate[0];
        var month = txtdate[1];
        var year  = txtdate[2];
        var date  = day + "/" + month + "/" + year; 
        $("#span_date" ).html(date);
        $( "#spandrawno" ).html(sRes.arr_res["Draw_No"]);
        
        $( "#span_1st" ).html(sRes.arr_res["ST_1st_Price"]);
        $( "#span_2nd" ).html(sRes.arr_res["ST_2nd_Price"]);
        $( "#span_3rd" ).html(sRes.arr_res["ST_3rd_Price"]);
        
        var str_specical        = "";
        var arr_sp              =   sRes.arr_res["Special"];
        if(arr_sp != null)
        {
            arr_sp = arr_sp.split("|");
            for(var i = 0; i < 10; i ++)
            {
                if((i+1)%5 == 1)
                    str_specical    += "<tr>";
                        str_specical    += "<td style=\"border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;\" width=\"20%\" height=\"36\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\"><span id=\"spanspecial_"+ i +"\">" + arr_sp[i] + "</span></td>";
                if((i+1)%5 == 0)
                    str_specical    += "</tr>";
            }
            str_specical    += "</tr>";
        }
        $("#tbody_special").html(str_specical);
        
        var str_consolation         = "";
        var arr_con                 =   sRes.arr_res["Consolation"];
        if(arr_con != null)
        {
            arr_con  = arr_con.split("|");
            for(var i = 0; i < 10; i ++)
            {
                if((i+1)%5 == 1)
                    str_consolation    += "<tr>";
                        str_consolation    += "<td style=\"border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;\" width=\"20%\" height=\"36\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\"><span id=\"spanconsolation_"+ i +"\">" + arr_con[i] + "</span></td>";
                if((i+1)%5 == 0)
                    str_consolation    += "</tr>";
            }
            str_consolation    += "</tr>";
        }
        $("#tbody_consolation").html(str_consolation);
        
        var str_toto4d_jackpot   = "";
        var arr_jackpot  = "";
        arr_jackpot    = sRes.arr_res["TJ4D_Result"];
        if(typeof arr_jackpot != "undefined" && arr_jackpot != null && arr_jackpot.length > 0)
        {
            arr_jackpot = arr_jackpot.split("|");
            var j=0;
            for(var i=0;i<arr_jackpot.length;i+=2)
            {
                    j++;           
                    $("#Jack_4D_1_" + j).html(arr_jackpot[i]);
                    $("#Jack_4D_2_" + j).html(arr_jackpot[i+1]);
                          
            }
        }
        
        
        $( "#spanrmjp1" ).html(sRes.arr_res["TJ4D_jp1"]);
        $( "#spanrmjp2" ).html(sRes.arr_res["TJ4D_jp1"]);
        
        $( "#spangrandrm" ).html(sRes.arr_res["Mega_jp1"]);
        $( "#spanpowerrm" ).html(sRes.arr_res["Power_jp"]);
        $( "#spansupremerm" ).html(sRes.arr_res["Super_jp"]);
        
        
        $("#span5d1").html(sRes.arr_res["TJ5D_1st"]);
        $("#span5d2").html(sRes.arr_res["TJ5D_2nd"]);
        $("#span5d3").html(sRes.arr_res["TJ5D_3rd"]);
        $("#span5d4").html(sRes.arr_res["TJ5D_4th"]);
        $("#span5d5").html(sRes.arr_res["TJ5D_5th"]);
        $("#span5d6").html(sRes.arr_res["TJ5D_6th"]);
        
        var arr_TJ6D_2nd        =   sRes.arr_res["TJ6D_2nd"];
        if(arr_TJ6D_2nd != null)
        {
            arr_TJ6D_2nd  = arr_TJ6D_2nd.split("or");
            $("#span6d2").html(arr_TJ6D_2nd[0]);
            $("#span6d22").html(arr_TJ6D_2nd[1]);
        }
        var arr_TJ6D_3rd        =   sRes.arr_res["TJ6D_3rd"];
        if(arr_TJ6D_3rd != null)
        {
            arr_TJ6D_3rd = arr_TJ6D_3rd.split("or");
            $("#span6d3").html(arr_TJ6D_3rd[0]);
            $("#span6d33").html(arr_TJ6D_3rd[1]);
        }
        var arr_TJ6D_4th        =   sRes.arr_res["TJ6D_4th"];
        if(arr_TJ6D_4th != null)
        {
            arr_TJ6D_4th = arr_TJ6D_4th.split("or");
            $("#span6d4").html(arr_TJ6D_4th[0]);
            $("#span6d44").html(arr_TJ6D_4th[1]);
        }
        var arr_TJ6D_5th        =   sRes.arr_res["TJ6D_5th"];
        if(arr_TJ6D_5th != null)
        {
            arr_TJ6D_5th = arr_TJ6D_5th.split("or");
            $("#span6d5").html(arr_TJ6D_5th[0]);
            $("#span6d55").html(arr_TJ6D_5th[1]);
        }
        var arr_TJ6D_1st = sRes.arr_res["TJ6D_1st"];
        if(arr_TJ6D_1st != null) 
            $("#span6d1").html(sRes.arr_res["TJ6D_1st"]);
        
        
        var arr_Mega            =   sRes.arr_res["Mega"];
        if(arr_Mega != null)
        {
            arr_Mega = arr_Mega.split("|");
            $("#spangrand1").html(arr_Mega[0]);
            $("#spangrand2").html(arr_Mega[1]);
            $("#spangrand3").html(arr_Mega[2]);
            $("#spangrand4").html(arr_Mega[3]);
            $("#spangrand5").html(arr_Mega[4]);
            $("#spangrand6").html(arr_Mega[5]);
        }
        
        var arr_Power           =   sRes.arr_res["Power"];
        if(arr_Power != null)
        {
            arr_Power = arr_Power.split("|");
            $("#spansupreme1").html(arr_Power[0]);
            $("#spansupreme2").html(arr_Power[1]);
            $("#spansupreme3").html(arr_Power[2]);
            $("#spansupreme4").html(arr_Power[3]);
            $("#spansupreme5").html(arr_Power[4]);
            $("#spansupreme6").html(arr_Power[5]);
        }
        
        var arr_Super           =   sRes.arr_res["Super"];
        if(arr_Super != null)
        {
            arr_Super = arr_Super.split("|");
            $("#spanpower1").html(arr_Super[0]);
            $("#spanpower2").html(arr_Super[1]);
            $("#spanpower3").html(arr_Super[2]);
            $("#spanpower4").html(arr_Super[3]);
            $("#spanpower5").html(arr_Super[4]);
            $("#spanpower6").html(arr_Super[5]);
        }
    
        //editable
        $("#span_date").editable();
        $("#spandrawno").editable();
        $( "[id*=span_]" ).editable();
        $( "[id*=spanspecial_]" ).editable();
        $( "[id*=spanconsolation_]" ).editable();
        $("[id*=spanrm]").editable();
        $("span[id*='span5d']" ).editable();
        $("span[id*='span6d']" ).editable();
        $("span[id*='spangrand']" ).editable();
        $("span[id*='spanpower']" ).editable();
        $("span[id*='spansupreme']" ).editable();
        $("[id*='Jack_4D_']" ).editable();
        $( "#divshowdata" ).show();
        $("#btnsaveall" ).show();
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
    //$( "span[id*='span']" ).html("");
    //$( "span[id*='dmcjp']" ).html("");
    $( "#ContentConvert" ).val("");
    //$( "span[id*='span']" ).editable();
}

function hidenotify()
{
    $( "#notifyerr" ).hide();
    $( "#notifysuccess" ).hide();
    $( "#notifycontent" ).hide();
}
/*
|----------------------------------------------------------------
| function convert all
|----------------------------------------------------------------
*/
function btnconvertall_totofourd()
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
                url: "../admin/homelt_controller/btnconvertall_totofourd",
                dataType:"text",
                data: {ContentConvert: ContentConvert},
                cache:false,
                success:function (data) {
                    btnconvertall_totofourd_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function btnconvertall_totofourd_Complete(data){
    var sRes    = JSON.parse(data);
    $("#span_date").html(sRes.showdate);
    $("#spandrawno").html(sRes.drawno);
    $("#span_1st").html(sRes.prize_1st);
    $("#span_2nd").html(sRes.prize_2nd);
    $("#span_3rd").html(sRes.prize_3rd);
    
    var str_specical        = "";
    for(var i = 0; i <10; i ++)
    {

        console.log(sRes.arr_res_special[i]);
        if((i+1)%4 == 1)
            str_specical    += "<tr>";
        if((i+1)    == 9)
        {

            str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";
            str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + sRes.arr_res_special[i] + "</span></strong></td>";   
        }
        else
        {
            if((i+1)    == 10)
            {
                str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + sRes.arr_res_special[i] + "</span></strong></td>";
                str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";   
            }
            else    
                str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + sRes.arr_res_special[i] + "</span></strong></td>";
        }
        if((i+1)%4 == 0)
            str_specical    += "</tr>";
    }
    str_specical    += "</tr>";
    $("#tbody_special").html(str_specical);
    
    var str_consolation        = "";
    for(var i = 0; i <10; i ++)
    {
        if((i+1)%4 == 1)
            str_consolation    += "<tr>";
        if((i+1)    == 9)
        {
            str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";
            str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + sRes.arr_res_consolation[i] + "</span></strong></td>";   
        }
        else
        {
            if((i+1)    == 10)
            {
                str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + sRes.arr_res_consolation[i] + "</span></strong></td>";
                str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";   
            }
            else    
                str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + sRes.arr_res_consolation[i] + "</span></strong></td>";
        }
        if((i+1)%4 == 0)
            str_consolation    += "</tr>";
    }
    str_consolation    += "</tr>";
    $("#tbody_consolation").html(str_consolation);
    
    
    $("#spanrmjp1").html(sRes.str_4djp_rm1);
    $("#spanrmjp2").html(sRes.str_4djp_rm2);

     var resultjack4D = sRes.str_4djp_result1;
     if(resultjack4D.length > 0)
     {
        $("#Jack_4D_1_1").html(resultjack4D[0]);
        $("#Jack_4D_1_2").html(resultjack4D[1]);
        $("#Jack_4D_1_3").html(resultjack4D[2]);
     }

     var resultjack4D1 = sRes.str_4djp_result2;
     if(resultjack4D1.length >0)
     {
        $("#Jack_4D_2_1").html(resultjack4D1[0]);
        $("#Jack_4D_2_2").html(resultjack4D1[1]);
        $("#Jack_4D_2_3").html(resultjack4D1[2]);
     }
    //     resultjack4D = resultjack4D.split("|");
    // for(var i=0;i<3;i++)
    // {
    //     $("#Jack_4D_1_" + (i+1)).html(resultjack4D[i]);
    // }
    
    $("#span5d1").html(sRes.toto_5d_1st);
    $("#span5d2").html(sRes.toto_5d_2nd);
    $("#span5d3").html(sRes.toto_5d_3rd);
    $("#span5d4").html(sRes.toto_5d_4th);
    $("#span5d5").html(sRes.toto_5d_5th);
    $("#span5d6").html(sRes.toto_5d_6th);
    
    $("#span6d1").html(sRes.toto_6d_1st);
    $("#span6d2").html(sRes.toto_6d_2nd[0]);
    $("#span6d22").html(sRes.toto_6d_2nd[1]);
    $("#span6d3").html(sRes.toto_6d_3rd[0]);
    $("#span6d33").html(sRes.toto_6d_3rd[1]);
    $("#span6d4").html(sRes.toto_6d_4th[0]);
    $("#span6d44").html(sRes.toto_6d_4th[1]);
    $("#span6d5").html(sRes.toto_6d_5th[0]);
    $("#span6d55").html(sRes.toto_6d_5th[1]);
    
    $("#spangrand1").html(sRes.arr_grand[0]);
    $("#spangrand2").html(sRes.arr_grand[1]);
    $("#spangrand3").html(sRes.arr_grand[2]);
    $("#spangrand4").html(sRes.arr_grand[3]);
    $("#spangrand5").html(sRes.arr_grand[4]);
    $("#spangrand6").html(sRes.arr_grand[5]);
    $("#spangrandrm").html(sRes.str_grand_jp);
    
    $("#spansupreme1").html(sRes.arr_power[0]);
    $("#spansupreme2").html(sRes.arr_power[1]);
    $("#spansupreme3").html(sRes.arr_power[2]);
    $("#spansupreme4").html(sRes.arr_power[3]);
    $("#spansupreme5").html(sRes.arr_power[4]);
    $("#spansupreme6").html(sRes.arr_power[5]);
    $("#spansupremerm").html(sRes.str_power_jp);
    
    $("#spanpower1").html(sRes.arr_supreme[0]);
    $("#spanpower2").html(sRes.arr_supreme[1]);
    $("#spanpower3").html(sRes.arr_supreme[2]);
    $("#spanpower4").html(sRes.arr_supreme[3]);
    $("#spanpower5").html(sRes.arr_supreme[4]);
    $("#spanpower6").html(sRes.arr_supreme[5]);
    $("#spanpowerrm").html(sRes.str_supreme_jp);
    
    //editable
    $("#span_date").editable();
    $("#spandrawno").editable();
    $("#span_1st").editable();
    $("#span_2nd").editable();
    $("#span_3rd").editable();
    
    $( "span[id*='spanspecial_']" ).editable();
    $( "span[id*='spanconsolation_']" ).editable();
    
    $( "span[id*='spanrmjp']" ).editable();
    $( "span[id*='span5d']" ).editable();
    $( "span[id*='span6d']" ).editable();
    $( "span[id*='spangrand']" ).editable();
    $( "span[id*='spangrand']" ).editable();
    $( "span[id*='spansupreme']" ).editable();
    $("span[id*='spanpower']" ).editable();
    $("[id*='Jack_4D_']").editable();
    
    
    $( "#divshowdata" ).show();
    $( "#btnsaveall" ).show();
    
}

/*
|----------------------------------------------------------------
| function save all after convert and edit infomation
|----------------------------------------------------------------
*/
function btnsaveall_totofourd()
{
    var span_date                       =   $( "#span_date" ).html();
    var spandrawno                      =   $( "#spandrawno" ).html();
    var span_1st                        =   $( "#span_1st" ).html();
    var span_2nd                        =   $( "#span_2nd" ).html();
    var span_3rd                        =   $( "#span_3rd" ).html();
    
    var arr_special                     = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementspecial              =   $( "#spanspecial_" + i ).html();
        arr_special.push(elementspecial);
    }
    
    var arr_consolation                 = [];
    for(var i   = 0; i  < 10; i ++)
    {
        var elementconsolation          =   $( "#spanconsolation_" + i ).html();
        arr_consolation.push(elementconsolation);
    }
    
    var spanrmjp1               =   $("#spanrmjp1" ).html();
    var spanrmjp2               =   $("#spanrmjp2" ).html();
    var arr_toto4djackpot         = [];
    for(var i=0;i<3;i++)
    {
        var elementresult4Djackpot = $("#Jack_4D_1_"+(i+1)).html();
        arr_toto4djackpot.push(elementresult4Djackpot);
        var elementJackport1       = $("#Jack_4D_2_"+(i+1)).html();
        arr_toto4djackpot.push(elementJackport1);
    }
    
    var arr_5d                  = [];
    for(var i   = 1; i  <= 6; i ++)
    {
        var element5d           =   $( "#span5d" + i ).html();
        arr_5d.push(element5d);
    }
    
    var arr_6d                  = [];
    for(var i   = 1; i  <= 5; i ++)
    {
        if(i != 1)
            var element6d       =   $( "#span6d" + i ).html() + "or" + $( "#span6d" + i + i ).html();
        else
            var element6d       =   $( "#span6d" + i ).html();
        arr_6d.push(element6d);
    }
    
    var arr_grand               = [];
    for(var i   = 1; i  <= 6; i ++)
    {
        var elementgrand        =   $( "#spangrand" + i ).html();
        arr_grand.push(elementgrand);
    }
    var spangrandrm             = $( "#spangrandrm").html();
    
    var arr_power               = [];
    for(var i   = 1; i  <= 6; i ++)
    {
        var elementpower        =   $( "#spanpower" + i ).html();
        arr_power.push(elementpower);
    }
    var spanpowerrm             = $( "#spanpowerrm").html();
    
    var arr_supreme             = [];
    for(var i   = 1; i  <= 6; i ++)
    {
        var elementsupreme      =   $( "#spansupreme" + i ).html();
        arr_supreme.push(elementsupreme);
    }
    var spansupremerm           = $( "#spansupremerm").html();
    
    var sport_toto = {};
        sport_toto.txtday    = span_date;
        sport_toto.drawno       = spandrawno;
        sport_toto._1st         = span_1st;
        sport_toto._2nd         = span_2nd;
        sport_toto._3rd         = span_3rd;
        sport_toto.special      = arr_special;
        sport_toto.consolation  = arr_consolation;
        sport_toto.rmjp1        = spanrmjp1;
        sport_toto.rmjp2        = spanrmjp2;
        sport_toto.jackpottoto  = arr_toto4djackpot;
        sport_toto._5d          = arr_5d;
        sport_toto._6d          = arr_6d;
        sport_toto._grand       = arr_grand;
        sport_toto.grandrm      = spangrandrm;
        sport_toto._power       = arr_power;
        sport_toto.powerrm      = spanpowerrm;
        sport_toto._supreme     = arr_supreme;
        sport_toto.supremerm    = spansupremerm;
    $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/btnsaveall_totofourd",
            dataType:"text",
            data: {     span_date                   :   span_date,
                        spandrawno                  :   spandrawno,
                        span_1st                    :   span_1st,
                        span_2nd                    :   span_2nd,
                        span_3rd                    :   span_3rd,
                        
                        arr_special                 :   arr_special,
                        arr_consolation             :   arr_consolation,
                        
                        spanrmjp1                   :   spanrmjp1,
                        spanrmjp2                   :   spanrmjp2,
                        arr_jackpottoto             : arr_toto4djackpot,
                        
                        arr_5d                      :   arr_5d,
                        arr_6d                      :   arr_6d,
                        
                        arr_grand                   :   arr_grand,
                        spangrandrm                 :   spangrandrm,
                        
                        arr_power                   :   arr_power,
                        spanpowerrm                 :   spanpowerrm,
                        
                        arr_supreme                 :   arr_supreme,
                        spansupremerm               :   spansupremerm
                    },
            cache:false,
            success:function (data) {
                btnsaveall_totofourd_Complete(data,sport_toto);
            },
            error: function () { alert("Error!");}
   });
}
function btnsaveall_totofourd_Complete(data,sport_toto)
{
    var sRes    = JSON.parse(data);
    if(sRes     == 1)
    {
        var trans = {};
            trans.message = 'LotTotofourd';
            trans.list    = sport_toto;
        socket.emit('PageRefresh',trans);
        $("#notifysuccess" ).show();
    }
    else
    {
        $( "#notifyerr" ).show();
    }
}

