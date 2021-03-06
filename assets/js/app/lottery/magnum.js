var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotMagnum')
    {
       var date = list.txtdate;
       if(date != "" || date != " ")
       {
           var days = date.split("/");
           console.log(days);
           var arr_day = days[0]+"-"+days[1]+"-"+days[2];
           console.log(arr_day);
           if(arr_day == output)
              load_node_magnum(list);
      }
    }
});
$(document).ready(function() 
{
    getAllMonth();
    load_magnum(); 
    $( "#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_magnum();
    });
});

function getAllMonth()
{
    var value = $("#seday").val();
    var str = "";
    var d_select = new Date();
    //console.log(value);
    if(value == null)
    {
        var newdate = new Date();
        newdate.setDate(new Date().getDate() - 10);
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        var someFormattedDate = mm + '/' + dd + '/' + y;
        
        for(var i=0;i< 20 ;i++)
        {
            var stardate = new Date(someFormattedDate);
            stardate.setDate(stardate.getDate()+i);
            var get_date       = (stardate.getDate() < 10 ?'0':'') + stardate.getDate() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + stardate.getFullYear();
            var arr_wendkend   = stardate.getFullYear() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + (stardate.getDate() < 10 ?'0':'') + stardate.getDate();
            var someWeekend    = isWeekend(arr_wendkend);
            if(someWeekend != 'Wed' && someWeekend !=  'Tue' && someWeekend != 'Sat' && someWeekend != 'Sun')
                someWeekend = '';
            if(get_date == outday)
              str = str + '<option value='+get_date+' " selected="selected">'+get_date +' '+someWeekend+'</option>';
            else
               str = str + '<option value='+get_date+'>'+get_date+' '+ someWeekend +'</option>'; 
        }

        $("#seday").html(str);
    }
    else
    {
         var day_choose     = value.split('-');
         var arr_datechoose = day_choose[1] + '/' + day_choose[0] + '/' + day_choose[2];
         var newdate = new Date(arr_datechoose);
         newdate.setDate(newdate.getDate()-10);
         var dd = newdate.getDate();
         var mm = newdate.getMonth() + 1;
         var y = newdate.getFullYear();
         var someFormattedDate = mm + '/' + dd + '/' + y;
         for(var i=0;i< 20 ;i++)
         {
            var stardate = new Date(someFormattedDate);
            stardate.setDate(stardate.getDate()+i);
            var get_date       = (stardate.getDate() < 10 ?'0':'') + stardate.getDate() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + stardate.getFullYear();
            //console.log(get_date);
            var arr_wendkend   = stardate.getFullYear() + "-" + ((stardate.getMonth()+1) < 10?'0':'') + (stardate.getMonth()+1) + "-" + (stardate.getDate() < 10 ?'0':'') + stardate.getDate();
            var someWeekend    = isWeekend(arr_wendkend);
            if(someWeekend != 'Wed' && someWeekend !=  'Tue' && someWeekend != 'Sat' && someWeekend != 'Sun')
                someWeekend = '';
            if(get_date == output)
              str = str + '<option value='+get_date+' " selected="selected">'+get_date +' '+someWeekend+'</option>';
            else
               str = str + '<option value='+get_date+'>'+get_date+' '+ someWeekend +'</option>'; 
        }
        $("#seday").html("");
        $("#seday").html(str);
    }   
}

function isWeekend(date)
{
    var day = new Date(date);
        showday = day.getDay();
    var l_Wek = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
    return  l_Wek[showday];   
}

/*
|----------------------------------------------------------------
| function load magnum
|----------------------------------------------------------------
*/
function load_magnum(){
    $("#span_date").html("");
    $("#spandrawno").html("");
    $("#span_1st").html("");
    $("#span_2nd").html("");
    $("#span_3rd").html("");
    $("#tbody_special").html("");
    $("#tbody_consolation").html("");
    
    $("#span_jp1prize").html("");
    $("#td_jp1").html("");
    $("#span_jp2prize").html("");
    $("#tbody_jp2").html("");
    
    $("#span_rm_dmcjp2").html("");
    $("#tbody_jackpotonethreed").html("");
    $("#tbody_jackpotthreed").html("");
    $("#tbody_dmcjpone").html("");
    $("#tbody_dmcjptwo").html("");
    $("#tbody_jackpottwoonethreed").html("");
    
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_magnum",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_magnum_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_magnum_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $("#spandrawno").html(sRes.str_Draw_No);
        $("#span_1st").html(sRes.str_1st_Price);
        $("#span_2nd").html(sRes.str_2nd_Price);
        $("#span_3rd").html(sRes.str_3rd_Price);
        $("#tbody_special").html(sRes.str_spacial_res);
        $("#tbody_consolation").html(sRes.str_Consolation_res);
        
        $("#span_jp1prize").html(sRes.str_jp1_prize);
        $("#td_jp1").html(sRes.str_jp1_res);
        $("#span_jp2prize").html(sRes.str_jp2_prize);
        $("#tbody_jp2").html(sRes.str_jp2_res);
        
        $("#td_jp1_gold").html(sRes.jp1_gold_res);
        $("#td_jp2_gold").html(sRes.jp2_gold_res);
        $("#td_jp3_gold").html(sRes.jp3_gold_res);
        $("#td_jp4_gold").html(sRes.jp4_gold_res);
        $("#td_jp5_gold").html(sRes.jp5_gold_res);
        $("#td_jp6_gold").html(sRes.jp6_gold_res);
        $("#td_jp7_1_gold").html(sRes.jp7_1_gold_res);
        $("#td_jp7_2_gold").html(sRes.jp7_2_gold_res);
        
        $("#span_jp1_prize").html(sRes.jp1_gold_prize);
        $("#span_jp2_prize").html(sRes.jp2_gold_prize);
    }
    else
    {
        $("#tbody_special").html('<td width="20%" height="35" align="center" valign="middle" bgcolor="#666666">&nbsp;</td>');
        $("#tbody_consolation").html('<td width="20%" height="35" align="center" valign="middle" bgcolor="#666666">&nbsp;</td>');
    }
    //$("#seday").html(sRes.str_date);
}

function load_node_magnum(list)
{
        $( "#span_date" ).html(output);
        $( "#spandrawno" ).html(list.drawno);
        
        $( "#span_1st" ).html(list.span_1st);
        $( "#span_2nd" ).html(list.span_2nd);
        $( "#span_3rd" ).html(list.span_3rd);
        
        var str_specical        = "";
        var arr_sp              =   list.arr_special;
        if(arr_sp != null)
        {
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
        var arr_con                 =   list.arr_consolation;
        if(arr_con != null)
        {
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
        
        $("#span_jp1prize").html(list.span_jp1prize);
        $("#span_jp2prize").html(list.span_jp2prize);
        
        $("#span_jp1_prize").html(list.span_jp1_prize);
        $("#span_jp2_prize").html(list.span_jp2_prize);
        
        var str_jp1        = "";
        var arr_4D_jp1         =   list.arr_jp1;
        if(arr_4D_jp1 != null)
        {
            for(var i = 0; i < 6; i ++)
            {
                str_jp1    += "<span id=\"spanjp1_"+ i +"\">" + arr_4D_jp1[i] + "</span><br />";
            }
        }
        $("#td_jp1").html(str_jp1);
        
        var str_jp2        = "";
        var arr_4D_jp2         =  list.arr_jp2;
        if(arr_4D_jp2 != null)
        {
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
        
        
        
        var jp1        = "";
        var arr_4D_gold_jp1     =   list.arr_gold1;
        if(arr_4D_gold_jp1 != null)
        {
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
        var arr_4D_gold_jp2     =   list.arr_gold2;
        if(arr_4D_gold_jp2 != null)
        {
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
        var arr_4D_gold_jp3     =   list.arr_gold3;
        if(arr_4D_gold_jp3 != null)
        {
       
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
        var arr_4D_gold_jp4     =   list.arr_gold4;
        if(arr_4D_gold_jp4 != null)
        {
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
        var arr_4D_gold_jp5     =   list.arr_gold5;
        if(arr_4D_gold_jp5 != null)
        {
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
        var arr_4D_gold_jp6     =   list.arr_gold6;
        if(arr_4D_gold_jp6 != null)
        {
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
        var arr_4D_gold_jp7_1   =   list.arr_gold71;
        if(arr_4D_gold_jp7_1 != null)
        {
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
        var arr_4D_gold_jp7_2   =   list.arr_gold72;
        if(arr_4D_gold_jp7_2 != null)
        {
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
}

