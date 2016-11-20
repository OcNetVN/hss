$(document).ready(function() {
    //$( "#btnsaveall" ).hide();
    
    var txtdate	=	$("#txtdate").val();
	get_data_by_txtdate(txtdate);
    
    /*get value date for textbox*/
    get_value_date();
    
    $( "#btnclearall" ).bind("click",function(){
        btnclearall();
    });
    
    $( "#btndrawdate" ).bind("click",function(){
        btndrawdate();
    });
    
    $( "#btnfourdgame" ).bind("click",function(){
        btnfourdgame_magnum();
    });
    $( "#btnfourdjp" ).bind("click",function(){
        btnfourdjp_magnum();
    });
    $( "#btnfourjpgold" ).bind("click",function(){
        btnfourjpgold_magnum();
    });
    
    $( "#btnsaveall" ).bind("click",function(){
        btnsaveall_magnum();
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
    
    if(para_url         ==  "wes_mn")
    {
        $.ajax({
                type:"POST",
                url: "../admin/homelt_controller/get_data_by_txtdate_magnum",
                dataType:"text",
                data: {
                        txtdate         :   txtdate
                },
                cache:false,
                success:function (data) {
                    get_data_by_txtdate_magnum_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}

function get_data_by_txtdate_magnum_Complete(data)
{
    var sRes        = JSON.parse(data);
    var l_date;
    if(sRes.flag    == 1)
    {
        var txtdate	=	$("#txtdate").val();
        txtdate    = txtdate.split("-");
        l_date     = txtdate[0] + "/" + txtdate[1] + "/" + txtdate[2];
        $( "#span_date" ).html(l_date);
        $( "#spandrawno" ).html(sRes.arr_res["Draw_No"]);
        
        $( "#span_1st" ).html(sRes.arr_res["4D_1st_Price"]);
        $( "#span_2nd" ).html(sRes.arr_res["4D_2nd_Price"]);
        $( "#span_3rd" ).html(sRes.arr_res["4D_3rd_Price"]);
        
        var str_specical        = "";
        var arr_sp              =   sRes.arr_res["Special"];
        if(arr_sp != null)
        {
            arr_sp  = arr_sp.split("|");
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
            arr_con     = arr_con.split("|");
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
        
        $("#span_jp1prize").html(sRes.arr_res["4D_jp1_prize"]);
        $("#span_jp2prize").html(sRes.arr_res["4D_jp2_prize"]);
        
        $("#span_jp1_prize").html(sRes.arr_res["4D_gold_jp1_prize"]);
        $("#span_jp2_prize").html(sRes.arr_res["4D_gold_jp2_prize"]);
        
        var str_jp1        = "";
        var arr_4D_jp1         =   sRes.arr_res["4D_jp1"];
        if(arr_4D_jp1 != null)
        {
            arr_4D_jp1 = arr_4D_jp1.split("|");
            for(var i = 0; i < 6; i ++)
            {
                str_jp1    += "<span id=\"spanjp1_"+ i +"\">" + arr_4D_jp1[i] + "</span><br />";
            }
        }
        $("#td_jp1").html(str_jp1);
        
        var str_jp2        = "";
        var arr_4D_jp2         =   sRes.arr_res["4D_jp2"];
        if(arr_4D_jp2 != null)
        {
            arr_4D_jp2         = arr_4D_jp2.split("|");
            for(var i = 0; i < 60; i ++)
            {
                if((i+1)%3 == 1)
                    str_jp2    += "<tr>";
                        str_jp2    += "<td width=\"33%\" height=\"32\" align=\"center\"><span id=\"spanjp2_"+ i +"\">" + arr_4D_jp2[i] + "</span></td>";
                if((i+1)%3 == 0)
                    str_jp2    += "</tr>";
            }
            str_jp2    += "</tr>";
        }
        $("#tbody_jp2").html(str_jp2);
        //editable
        $("#span_jp1prize").editable();
        $("#span_jp2prize").editable();
        $( "span[id*='spanjp1_']" ).editable();
        $( "span[id*='spanjp2_']" ).editable();
        
        
        var jp1        = "";
        var arr_4D_gold_jp1     =   sRes.arr_res["4D_gold_jp1"];
        if(arr_4D_gold_jp1 != null)
        {
            arr_4D_gold_jp1     = arr_4D_gold_jp1.split("|");
            for(var i = 0; i < arr_4D_gold_jp1.length; i ++)
            {
                jp1    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp1_"+ i +"\">";
                if(arr_4D_gold_jp1[i] == "+")    
                    jp1    += "&nbsp;" + arr_4D_gold_jp1[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp1[i].length == 1)
                        jp1    += "&nbsp;" + arr_4D_gold_jp1[0][i] + "&nbsp;"; 
                    else
                        jp1    += arr_4D_gold_jp1[i]; 
                } 
                jp1    += "</span>";
            }
        }
        $("#td_jp1_gold").html(jp1);
        
        var jp2        = "";
        var arr_4D_gold_jp2     =   sRes.arr_res["4D_gold_jp2"];
        if(arr_4D_gold_jp2 != null)
        {
            arr_4D_gold_jp2     =   arr_4D_gold_jp2.split("|");
            for(var i = 0; i < arr_4D_gold_jp2.length; i ++)
            {
                jp2    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp2_"+ i +"\">";
                if(arr_4D_gold_jp2[i] == "+")    
                    jp2    += "&nbsp;" + arr_4D_gold_jp2[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp2[i].length == 1)
                        jp2    += "&nbsp;" + arr_4D_gold_jp2[i] + "&nbsp;"; 
                    else
                        jp2    += arr_4D_gold_jp2[i]; 
                } 
                jp2    += "</span>";
            }
        }
        $("#td_jp2_gold").html(jp2);
        
        var jp3        = "";
        var arr_4D_gold_jp3     =   sRes.arr_res["4D_gold_jp3"];
        if(arr_4D_gold_jp3 != null)
        {
            arr_4D_gold_jp3     = arr_4D_gold_jp3.split("|");
       
            for(var i = 0; i < arr_4D_gold_jp3.length; i ++)
            {
                jp3    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp3_"+ i +"\">";
                if(arr_4D_gold_jp3[i] == "+")    
                    jp3    += "&nbsp;" + arr_4D_gold_jp3[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp3[i].length == 1)
                        jp3    += "&nbsp;" + arr_4D_gold_jp3[i] + "&nbsp;"; 
                    else
                        jp3    += arr_4D_gold_jp3[i]; 
                } 
                jp3    += "</span>";
            }
        }
        $("#td_jp3_gold").html(jp3);
        
        var jp4        = "";
        var arr_4D_gold_jp4     =   sRes.arr_res["4D_gold_jp4"];
        if(arr_4D_gold_jp4 != null)
        {
            arr_4D_gold_jp4     = arr_4D_gold_jp4.split("|");
            for(var i = 0; i < arr_4D_gold_jp4.length; i ++)
            {
                jp4    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp4_"+ i +"\">";
                if(arr_4D_gold_jp4[i] == "+")    
                    jp4    += "&nbsp;" + arr_4D_gold_jp4[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp4[i].length == 1)
                        jp4    += "&nbsp;" + arr_4D_gold_jp4[i] + "&nbsp;"; 
                    else
                        jp4    += arr_4D_gold_jp4[i]; 
                } 
                jp4    += "</span>";
            }
        }
        $("#td_jp4_gold").html(jp4);
        
        var jp5        = "";
        var arr_4D_gold_jp5     =   sRes.arr_res["4D_gold_jp5"];
        if(arr_4D_gold_jp5 != null)
        {
            arr_4D_gold_jp5     = arr_4D_gold_jp5.split("|");
            for(var i = 0; i < arr_4D_gold_jp5.length; i ++)
            {
                jp5    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp5_"+ i +"\">";
                if(arr_4D_gold_jp5[i] == "+")    
                    jp5    += "&nbsp;" + arr_4D_gold_jp5[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp5[i].length == 1)
                        jp5    += "&nbsp;" + arr_4D_gold_jp5[i] + "&nbsp;"; 
                    else
                        jp5    += arr_4D_gold_jp5[i]; 
                } 
                jp5    += "</span>";
            }
        }
        $("#td_jp5_gold").html(jp5);
        
        var jp6        = "";
        var arr_4D_gold_jp6     =   sRes.arr_res["4D_gold_jp6"];
        if(arr_4D_gold_jp6 != null)
        {
            arr_4D_gold_jp6   = arr_4D_gold_jp6.split("|");
            for(var i = 0; i < arr_4D_gold_jp6.length; i ++)
            {
                jp6    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp6_"+ i +"\">";
                if(arr_4D_gold_jp6[i] == "+")    
                    jp6    += "&nbsp;" + arr_4D_gold_jp6[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp6[i].length == 1)
                        jp6    += "&nbsp;" + arr_4D_gold_jp6[i] + "&nbsp;"; 
                    else
                        jp6    += arr_4D_gold_jp6[i]; 
                } 
                jp6    += "</span>";
            }
        }
        $("#td_jp6_gold").html(jp6);
        
        var jp71        = "";
        var arr_4D_gold_jp7_1   =   sRes.arr_res["4D_gold_jp7_1"];
        if(arr_4D_gold_jp7_1 != null)
        {
            arr_4D_gold_jp7_1       = arr_4D_gold_jp7_1.split("|");
            for(var i = 0; i < arr_4D_gold_jp7_1.length; i ++)
            {
                jp71    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp71_"+ i +"\">";
                if(arr_4D_gold_jp7_1[i] == "+")    
                    jp71    += "&nbsp;" + arr_4D_gold_jp7_1[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp7_1[i].length == 1)
                        jp71    += "&nbsp;" + arr_4D_gold_jp7_1[i] + "&nbsp;"; 
                    else
                        jp71    += arr_4D_gold_jp7_1[i]; 
                } 
                jp71    += "</span>";
            }
        }
        $("#td_jp7_1_gold").html(jp71);
        
        var jp72        = "";
        var arr_4D_gold_jp7_2   =   sRes.arr_res["4D_gold_jp7_2"];
        if(arr_4D_gold_jp7_2 != null)
        {
            arr_4D_gold_jp7_2   = arr_4D_gold_jp7_2.split("|");
            for(var i = 0; i < arr_4D_gold_jp7_2.length; i ++)
            {
                jp72    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp72_"+ i +"\">";
                if(arr_4D_gold_jp7_2[i] == "+")    
                    jp72    += "&nbsp;" + arr_4D_gold_jp7_2[i] + "&nbsp;";
                else
                {
                    if(arr_4D_gold_jp7_2[i].length == 1)
                        jp72    += "&nbsp;" + arr_4D_gold_jp7_2[i] + "&nbsp;"; 
                    else
                        jp72    += arr_4D_gold_jp7_2[i]; 
                } 
                jp72    += "</span>";
            }
        }
        $("#td_jp7_2_gold").html(jp72);
        
        //editable
        $("#span_jp1_prize").editable();
        $("#span_jp2_prize").editable();
        
        $( "span[id*='spangoldjp1_']" ).editable();
        $( "span[id*='spangoldjp2_']" ).editable();
        $( "span[id*='spangoldjp3_']" ).editable();
        $( "span[id*='spangoldjp4_']" ).editable();
        $( "span[id*='spangoldjp5_']" ).editable();
        $( "span[id*='spangoldjp6_']" ).editable();
        $( "span[id*='spangoldjp71_']" ).editable();
        $( "span[id*='spangoldjp72_']" ).editable();
        
        
    
        //editable
        $("#span_date").editable();
        $("#spandrawno").editable();
        $( "[id*=span_]" ).editable();
        $( "[id*=spanspecial_]" ).editable();
        $( "[id*=spanconsolation_]" ).editable();
        
        $( "#divshowdata" ).show();
        $( "#btnsaveall" ).show();
    }
    else
    {
        $( "#divshowdata" ).hide();
        //$( "#btnsaveall" ).hide();
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
| function convert drawdate magnum
|----------------------------------------------------------------
*/
function btndrawdate()
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
                url: "../admin/homelt_controller/btndrawdate_magnum",
                dataType:"text",
                data: {ContentConvert: ContentConvert},
                cache:false,
                success:function (data) {
                    btndrawdate_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function btndrawdate_Complete(data){
    var sRes    = JSON.parse(data);
    $( "#span_date" ).html(sRes.date);
    $( "#spandrawno" ).html(sRes.drawno);
    
    //editable
    $("#span_date").editable();
    $("#spandrawno").editable();
    
    $( "#divshowdata" ).show();
}

/*
|----------------------------------------------------------------
| function convert 4D jackpot magnum
|----------------------------------------------------------------
*/
function btnfourdgame_magnum()
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
                url: "../admin/homelt_controller/btnfourdgame_magnum",
                dataType:"text",
                data: {ContentConvert: ContentConvert},
                cache:false,
                success:function (data) {
                    btnfourdgame_magnum_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function btnfourdgame_magnum_Complete(data){
    var sRes    = JSON.parse(data);
    
    $( "#span_1st" ).html(sRes.Price_1st);
    $( "#span_2nd" ).html(sRes.Price_2nd);
    $( "#span_3rd" ).html(sRes.Price_3rd);
    
    var str_specical        = "";
    for(var i = 0; i < 10; i ++)
    {
        if((i+1)%5 == 1)
            str_specical    += "<tr>";
                str_specical    += "<td width=\"20%\" height=\"35\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\"><span id=\"spanspecial_"+ i +"\">" + sRes.arr_special[i] + "</span></td>";
        if((i+1)%5 == 0)
            str_specical    += "</tr>";
    }
    str_specical    += "</tr>";
    $("#tbody_special").html(str_specical);
    
    var str_consolation        = "";
    for(var i = 0; i < 10; i ++)
    {
        if((i+1)%5 == 1)
            str_consolation    += "<tr>";
                str_consolation    += "<td width=\"20%\" height=\"35\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\"><span id=\"spanconsolation_"+ i +"\">" + sRes.arr_consolation[i] + "</span></td>";
        if((i+1)%5 == 0)
            str_consolation    += "</tr>";
    }
    str_consolation    += "</tr>";
    $("#tbody_consolation").html(str_consolation);
    
    //editable
    $("#span_1st").editable();
    $("#span_2nd").editable();
    $("#span_3rd").editable();
    
    $( "span[id*='spanspecial_']" ).editable();
    $( "span[id*='spanconsolation_']" ).editable();
    
    $( "#divshowdata" ).show();
}
/*
|----------------------------------------------------------------
| function convert 4D jackpot
|----------------------------------------------------------------
*/
function btnfourdjp_magnum()
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
                url: "../admin/homelt_controller/btnfourdjp_magnum",
                dataType:"text",
                data: {ContentConvert: ContentConvert},
                cache:false,
                success:function (data) {
                    btnfourdjp_magnum_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function btnfourdjp_magnum_Complete(data){
    var sRes    = JSON.parse(data);
    
    $( "#span_jp1prize" ).html(sRes.Price_jp1_prize);
    $( "#span_jp2prize" ).html(sRes.Price_jp2_prize);
    
    var str_jp1        = "";
    for(var i = 0; i < 6; i ++)
    {
        str_jp1    += "<span id=\"spanjp1_"+ i +"\">" + sRes.arr_prize_jp1[i] + "</span><br />";
    }
    $("#td_jp1").html(str_jp1);
    
    var str_jp2        = "";
    for(var i = 0; i < 60; i ++)
    {
        if((i+1)%3 == 1)
            str_jp2    += "<tr>";
                str_jp2    += "<td width=\"33%\" height=\"32\" align=\"center\"><span id=\"spanjp2_"+ i +"\">" + sRes.arr_prize_jp2[i] + "</span></td>";
        if((i+1)%3 == 0)
            str_jp2    += "</tr>";
    }
    str_jp2    += "</tr>";
    $("#tbody_jp2").html(str_jp2);
    
    //editable
    $("#span_jp1prize").editable();
    $("#span_jp2prize").editable();
    
    $( "span[id*='spanjp1_']" ).editable();
    $( "span[id*='spanjp2_']" ).editable();
    
    $( "#divshowdata" ).show();
}



/*
|----------------------------------------------------------------
| function 4D jackpot gold convert
|----------------------------------------------------------------
*/
function btnfourjpgold_magnum(){    
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
                url: "../admin/homelt_controller/btnfourjpgold_magnum",
                dataType:"text",
                data: {ContentConvert: ContentConvert},
                cache:false,
                success:function (data) {
                    btnfourjpgold_magnum_Complete(data);
                },
                error: function () { alert("Error!");}
       });
    }
}
function btnfourjpgold_magnum_Complete(data){
    var sRes    = JSON.parse(data);
    
    $( "#span_jp1_prize" ).html(sRes.str_rmjp1);
    $( "#span_jp2_prize" ).html(sRes.str_rmjp2);
    
    var jp1        = "";
    for(var i = 0; i < sRes.arr_str[0].length; i ++)
    {
        jp1    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp1_"+ i +"\">";
        if(sRes.arr_str[0][i] == "+")    
            jp1    += "&nbsp;" + sRes.arr_str[0][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[0][i].length == 1)
                jp1    += "&nbsp;" + sRes.arr_str[0][i] + "&nbsp;"; 
            else
                jp1    += sRes.arr_str[0][i]; 
        } 
        jp1    += "</span>";
    }
    $("#td_jp1_gold").html(jp1);
    
    var jp2        = "";
    for(var i = 0; i < sRes.arr_str[1].length; i ++)
    {
        jp2    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp2_"+ i +"\">";
        if(sRes.arr_str[1][i] == "+")    
            jp2    += "&nbsp;" + sRes.arr_str[1][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[1][i].length == 1)
                jp2    += "&nbsp;" + sRes.arr_str[1][i] + "&nbsp;"; 
            else
                jp2    += sRes.arr_str[1][i]; 
        } 
        jp2    += "</span>";
    }
    $("#td_jp2_gold").html(jp2);
    
    var jp3        = "";
    for(var i = 0; i < sRes.arr_str[2].length; i ++)
    {
        jp3    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp3_"+ i +"\">";
        if(sRes.arr_str[2][i] == "+")    
            jp3    += "&nbsp;" + sRes.arr_str[2][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[2][i].length == 1)
                jp3    += "&nbsp;" + sRes.arr_str[2][i] + "&nbsp;"; 
            else
                jp3    += sRes.arr_str[2][i]; 
        } 
        jp3    += "</span>";
    }
    $("#td_jp3_gold").html(jp3);
    
    var jp4        = "";
    for(var i = 0; i < sRes.arr_str[3].length; i ++)
    {
        jp4    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp4_"+ i +"\">";
        if(sRes.arr_str[3][i] == "+")    
            jp4    += "&nbsp;" + sRes.arr_str[3][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[3][i].length == 1)
                jp4    += "&nbsp;" + sRes.arr_str[3][i] + "&nbsp;"; 
            else
                jp4    += sRes.arr_str[3][i]; 
        } 
        jp4    += "</span>";
    }
    $("#td_jp4_gold").html(jp4);
    
    var jp5        = "";
    for(var i = 0; i < sRes.arr_str[4].length; i ++)
    {
        jp5    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp5_"+ i +"\">";
        if(sRes.arr_str[4][i] == "+")    
            jp5    += "&nbsp;" + sRes.arr_str[4][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[4][i].length == 1)
                jp5    += "&nbsp;" + sRes.arr_str[4][i] + "&nbsp;"; 
            else
                jp5    += sRes.arr_str[4][i]; 
        } 
        jp5    += "</span>";
    }
    $("#td_jp5_gold").html(jp5);
    
    var jp6        = "";
    for(var i = 0; i < sRes.arr_str[5].length; i ++)
    {
        jp6    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp6_"+ i +"\">";
        if(sRes.arr_str[5][i] == "+")    
            jp6    += "&nbsp;" + sRes.arr_str[5][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[5][i].length == 1)
                jp6    += "&nbsp;" + sRes.arr_str[5][i] + "&nbsp;"; 
            else
                jp6    += sRes.arr_str[5][i]; 
        } 
        jp6    += "</span>";
    }
    $("#td_jp6_gold").html(jp6);
    
    var jp71        = "";
    for(var i = 0; i < sRes.arr_str[6].length; i ++)
    {
        jp71    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp71_"+ i +"\">";
        if(sRes.arr_str[6][i] == "+")    
            jp71    += "&nbsp;" + sRes.arr_str[6][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[6][i].length == 1)
                jp71    += "&nbsp;" + sRes.arr_str[6][i] + "&nbsp;"; 
            else
                jp71    += sRes.arr_str[6][i]; 
        } 
        jp71    += "</span>";
    }
    $("#td_jp7_1_gold").html(jp71);
    
    var jp72        = "";
    for(var i = 0; i < sRes.arr_str[7].length; i ++)
    {
        jp72    += "<span style=\"border:1px solid #333; width:20px;\" id=\"spangoldjp72_"+ i +"\">";
        if(sRes.arr_str[7][i] == "+")    
            jp72    += "&nbsp;" + sRes.arr_str[7][i] + "&nbsp;";
        else
        {
            if(sRes.arr_str[7][i].length == 1)
                jp72    += "&nbsp;" + sRes.arr_str[7][i] + "&nbsp;"; 
            else
                jp72    += sRes.arr_str[7][i]; 
        } 
        jp72    += "</span>";
    }
    $("#td_jp7_2_gold").html(jp72);
    
    //editable
    $("#span_jp1_prize").editable();
    $("#span_jp2_prize").editable();
    
    $( "span[id*='spangoldjp1_']" ).editable();
    $( "span[id*='spangoldjp2_']" ).editable();
    $( "span[id*='spangoldjp3_']" ).editable();
    $( "span[id*='spangoldjp4_']" ).editable();
    $( "span[id*='spangoldjp5_']" ).editable();
    $( "span[id*='spangoldjp6_']" ).editable();
    $( "span[id*='spangoldjp71_']" ).editable();
    $( "span[id*='spangoldjp72_']" ).editable();
    
    $( "#divshowdata" ).show();
    $( "#btnsaveall" ).show();
}
/*
|----------------------------------------------------------------
| function save all after convert and edit infomation
|----------------------------------------------------------------
*/
function btnsaveall_magnum()
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
    
    var span_jp1prize                   =   $( "#span_jp1prize" ).html();
    var span_jp2prize                   =   $( "#span_jp2prize" ).html();
    
    var arr_jp1                         = [];
    for(var i   = 0; i  < 6; i ++)
    {
        var elementjp1                  =   $( "#spanjp1_" + i ).html();
        arr_jp1.push(elementjp1);
    }
    
    var arr_jp2                         = [];
    for(var i   = 0; i  < 60; i ++)
    {
        var elementjp2                  =   $( "#spanjp2_" + i ).html();
        arr_jp2.push(elementjp2);
    }
    
    var arr_gold1               = [];
    var countelegold1           = $("span[id*='spangoldjp1_']").length;
    for(var i   = 0; i  < countelegold1; i ++)
    {
        var elementgold1        =   $( "#spangoldjp1_" + i ).html();
        arr_gold1.push(elementgold1);
    }
    
    var arr_gold2               = [];
    var countelegold2           = $("span[id*='spangoldjp2_']").length;
    for(var i   = 0; i  < countelegold2; i ++)
    {
        var elementgold2        =   $( "#spangoldjp2_" + i ).html();
        arr_gold2.push(elementgold2);
    }

    //console.log(arr_gold2);
    
    var arr_gold3               = [];
    var countelegold3           = $("span[id*='spangoldjp3_']").length;
    for(var i   = 0; i  < countelegold3; i ++)
    {
        var elementgold3        =   $( "#spangoldjp3_" + i ).html();
        arr_gold3.push(elementgold3);
    }
    
    var arr_gold4               = [];
    var countelegold4           = $("span[id*='spangoldjp4_']").length;
    for(var i   = 0; i  < countelegold4; i ++)
    {
        var elementgold4        =   $( "#spangoldjp4_" + i ).html();
        arr_gold4.push(elementgold4);
    }
    
    var arr_gold5               = [];
    var countelegold5           = $("span[id*='spangoldjp5_']").length;
    for(var i   = 0; i  < countelegold5; i ++)
    {
        var elementgold5        =   $( "#spangoldjp5_" + i ).html();
        arr_gold5.push(elementgold5);
    }
    
    var arr_gold6               = [];
    var countelegold6           = $("span[id*='spangoldjp6_']").length;
    for(var i   = 0; i  < countelegold6; i ++)
    {
        var elementgold6        =   $( "#spangoldjp6_" + i ).html();
        arr_gold6.push(elementgold6);
    }
    
    var arr_gold71               = [];
    var countelegold71           = $("span[id*='spangoldjp71_']").length;
    for(var i   = 0; i  < countelegold71; i ++)
    {
        var elementgold71        =   $( "#spangoldjp71_" + i ).html();
        arr_gold71.push(elementgold71);
    }
    
    var arr_gold72               = [];
    var countelegold72           = $("span[id*='spangoldjp72_']").length;
    for(var i   = 0; i  < countelegold72; i ++)
    {
        var elementgold72        =   $( "#spangoldjp72_" + i ).html();
        arr_gold72.push(elementgold72);
    }
    
    var span_jp1_prize          =   $( "#span_jp1_prize" ).html();
    var span_jp2_prize          =   $( "#span_jp2_prize" ).html();

    var magnum = {};
        magnum.txtdate = span_date;
        magnum.drawno  = spandrawno;
        magnum.span_1st = span_1st;
        magnum.span_2nd =span_2nd;
        magnum.span_3rd = span_3rd;
        magnum.arr_special = arr_special;
        magnum.arr_consolation = arr_consolation;
        magnum.span_jp1prize  = span_jp1prize;
        magnum.span_jp2prize  =span_jp2prize;
        magnum.arr_jp1   = arr_jp1;
        magnum.arr_jp2   = arr_jp2;
        magnum.arr_gold1 = arr_gold1;
        magnum.arr_gold2 = arr_gold2;
        magnum.arr_gold3 = arr_gold3;
        magnum.arr_gold4 = arr_gold4;
        magnum.arr_gold5 = arr_gold5;
        magnum.arr_gold6 = arr_gold6;
        magnum.arr_gold71 = arr_gold71;
        magnum.arr_gold72 = arr_gold72;
        magnum.span_jp1_prize = span_jp1_prize;
        magnum.span_jp2_prize = span_jp2_prize;
     
    $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/btnsaveall_magnum",
            dataType:"text",
            data: {     span_date                   :   span_date,
                        spandrawno                  :   spandrawno,
                        span_1st                    :   span_1st,
                        span_2nd                    :   span_2nd,
                        span_3rd                    :   span_3rd,
                        
                        arr_special                 :   arr_special,
                        arr_consolation             :   arr_consolation,
                        
                        span_jp1prize               :   span_jp1prize,
                        span_jp2prize               :   span_jp2prize,
                        
                        arr_jp1                     :   arr_jp1,
                        arr_jp2                     :   arr_jp2,
                        
                        arr_gold1                   :   arr_gold1,
                        arr_gold2                   :   arr_gold2,
                        arr_gold3                   :   arr_gold3,
                        arr_gold4                   :   arr_gold4,
                        arr_gold5                   :   arr_gold5,
                        arr_gold6                   :   arr_gold6,
                        arr_gold71                  :   arr_gold71,
                        arr_gold72                  :   arr_gold72,
                        span_jp1_prize              :   span_jp1_prize,
                        span_jp2_prize              :   span_jp2_prize,
                    },
            cache:false,
            success:function (data) {
                btnsaveall_magnum_Complete(data,magnum);
            },
            error: function () { alert("Error!");}
   });
}
function btnsaveall_magnum_Complete(data,magnum)
{
    var sRes    = JSON.parse(data);
    if(sRes     == 1)
    {
        var res = 'LotMagnum';
        var trans = {};
            trans.message = 'LotMagnum';
            trans.list    = magnum;
        socket.emit('PageRefresh',trans);
        $( "#notifysuccess" ).show();
    }
    else
    {
        $( "#notifyerr" ).show();
    }
}
