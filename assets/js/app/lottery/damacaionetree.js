var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotDamacai')
    {
       var date = list.txtdate;
       if(date != "" || date != " ")
       {
           var days = date.split("/");
           console.log(days);
           var arr_day = days[0]+"-" + days[1] + "-" + days[2];
           console.log(arr_day);
           if(arr_day == output)
              load_node_damacai(list);
      }
    }
    
});
$(document).ready(function() 
{
    getAllMonth();
    load_damacai(); 
    $( "#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        load_damacai();
    });
});

/*
|----------------------------------------------------------------
| function load damacai
|----------------------------------------------------------------
*/
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

function load_damacai(){
    $("#span_date").html("");
    $("#spandrawno").html("");
    $("#span_1st_1_3d").html("");
    $("#span_2nd_1_3d").html("");
    $("#span_3rd_1_3d").html("");
    $("#span_1st_3d").html("");
    $("#span_2nd_3d").html("");
    $("#span_3rd_3d").html("");
    $("#tbody_special").html("");
    $("#tbody_consolation").html("");
    $("#span_rm_13djp1").html("");
    $("#span_rm_13djp2").html("");
    $("#span_rm_3djp").html("");
    $("#span_rm_dmcjp1").html("");
    $("#span_rm_dmcjp2").html("");
    $("#tbody_jackpotonethreed").html("");
    $("#tbody_jackpotthreed").html("");
    $("#tbody_dmcjpone").html("");
    $("#tbody_dmcjptwo").html("");
    $("#tbody_jackpottwoonethreed").html("");
    
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_damacai",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_damacai_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_damacai_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $("#spandrawno").html(sRes.str_Draw_No);
        $("#span_1st_1_3d").html(sRes.str_1_3D_1st_Price);
        $("#span_2nd_1_3d").html(sRes.str_1_3D_2nd_Price);
        $("#span_3rd_1_3d").html(sRes.str_1_3D_3rd_Price);
        $("#span_1st_3d").html(sRes.str_3D_1st_Price);
        $("#span_2nd_3d").html(sRes.str_3D_2nd_Price);
        $("#span_3rd_3d").html(sRes.str_3D_3rd_Price);
        $("#tbody_special").html(sRes.str_spacial_res);
        $("#tbody_consolation").html(sRes.str_Consolation_res);
        $("#span_rm_13djp1").html(sRes.str_1_3DJp1_RM);
        $("#span_rm_13djp2").html(sRes.str_1_3DJp2_RM);
        $("#span_rm_3djp").html(sRes.str_3D_Jp_RM);
        $("#span_rm_dmcjp1").html(sRes.str_DMC_Jp1_RM);
        $("#span_rm_dmcjp2").html(sRes.str_DMC_Jp2_RM);
        $("#tbody_jackpotonethreed").html(sRes.str_1_3DJp1_res);
        $("#tbody_jackpotthreed").html(sRes.str_3DJp_res);
        $("#tbody_dmcjpone").html(sRes.str_DMC_Jp1_res);
        $("#tbody_dmcjptwo").html(sRes.str_DMC_Jp2_res);
        $("#tbody_jackpottwoonethreed").html(sRes.str_1_3DJp2_res);
    }
    //$("#seday").html(sRes.str_date);
}

function load_node_damacai(list)
{
        $("#span_date" ).html(output);
        $("#spandrawno" ).html(list.drawno);
        
        $( "#span_1st_1_3d" ).html(list._1st);
        $( "#span_2nd_1_3d" ).html(list._2nd);
        $( "#span_3rd_1_3d" ).html(list._3rd);
        
        var str_specical        = "";
        var arr_sp              =   list.special;
        $("#tbody_special").html("");
        if(arr_sp != " " && arr_sp !="")
        {
            for(var i = 0; i < 10; i ++)
            {
                if((i+1)%5 == 1)
                    str_specical    += "<tr>";
                    if(arr_sp[i] != null)
                        str_specical    += "<td style=\"border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;\" width=\"20%\" height=\"36\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\"><span id=\"spanspecial_"+ i +"\">" + arr_sp[i] + "</span></td>";
                if((i+1)%5 == 0)
                    str_specical    += "</tr>";
            }
            str_specical    += "</tr>";
            $("#tbody_special").html(str_specical);
        }
        
        var str_consolation         = "";
        var arr_con                 =   list.consolation;
        $("#tbody_consolation").html("");
        if(arr_con != "" && arr_con != " ")
        {
            for(var i = 0; i < 10; i ++)
            {
                if((i+1)%5 == 1)
                    str_consolation    += "<tr>";
                       if(arr_con[i] != null)
                        str_consolation    += "<td style=\"border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;\" width=\"20%\" height=\"36\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\"><span id=\"spanconsolation_"+ i +"\">" + arr_con[i] + "</span></td>";
                if((i+1)%5 == 0)
                    str_consolation    += "</tr>";
            }
            str_consolation    += "</tr>";
            $("#tbody_consolation").html(str_consolation);
        }
        
        $("#span_1st_3d").html(list._1st_3d);
        $("#span_2nd_3d").html(list._2nd_3d);
        $("#span_3rd_3d").html(list._3rd_3d);
        
        $("#span_rm_13djp1").html(list._rm_13djp1);
        $("#span_rm_13djp2").html(list._rm_13djp2);
        $("#span_rm_3djp").html(list._rm_3djp);
        
        $("#span_rm_dmcjp1").html(list.dmcjp1);
        $("#span_rm_dmcjp2").html(list._rm_dmcjp2);
        
        var str_jp1_13          = "";
        var arr_1_3djp1          =   list._jp1_13;
        if(arr_1_3djp1 != "" && arr_1_3djp1 != " ")
        {
            for(var i = 0; i < 6; i ++)
            {
                if((i+1)%2 == 1)
                    str_jp1_13    += "<tr>";
                    if(arr_1_3djp1[i] != null)
                        str_jp1_13    += "<td style=\"border-left: 1px black solid;border-bottom: 1px black solid;border-top: 1px black solid;\" width=\"50%\" height=\"30\" align=\"center\"><span id=\"spanjp1_13_"+ i +"\">" + arr_1_3djp1[i] + "</span></td>";
                if((i+1)%2 == 0)
                    str_jp1_13    += "</tr>";
            }
            str_jp1_13    += "</tr>";
            $( "#tbody_jackpotonethreed" ).html(str_jp1_13);
        }
        
        var str_jp1_23        = "";
        var arr_1_3djp2         =   list._jp1_23;
        if(arr_1_3djp2 != "" && arr_1_3djp2 != " ")
        {
            for(var i = 0; i < 60; i ++)
            {
                if((i+1)%2 == 1)
                    str_jp1_23    += "<tr>";
                       if(arr_1_3djp2[i] != null)
                        str_jp1_23    += "<td style=\"border-left: 1px black solid;border-bottom: 1px black solid;border-top: 1px black solid;\" width=\"50%\" height=\"30\" align=\"center\"><span id=\"spanjp1_23_"+ i +"\">" + arr_1_3djp2[i] + "</span></td>";
                if((i+1)%2 == 0)
                    str_jp1_23    += "</tr>";
            }
            str_jp1_23    += "</tr>";
            $( "#tbody_jackpottwoonethreed" ).html(str_jp1_23);
        }
        
        var str_res = "";
        str_res += "<tr>";
            str_res += '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" height="30" align="center"><span id="dmcjp1">' + list.dmcjp1 + '</span></td>';
        str_res += "</tr>";
        $( "#tbody_dmcjpone" ).html(str_res);
        
        var str_jp1_23        = "";
        $("#tbody_dmcjptwo" ).html("");
        var arr_DMC_Jp2         =   list._dmcjp2;
        if(arr_DMC_Jp2 != "" && arr_DMC_Jp2 != " ")
        {
            for(var i = 0; i < 5; i ++)
            {
                if(arr_DMC_Jp2[i] != null)
                    str_jp1_23    += "<tr><td style=\"border-left: 1px black solid;border-bottom: 1px black solid;border-top: 1px black solid;\" width=\"100%\" height=\"30\" align=\"center\"><span id=\"dmcjp2_"+ i +"\">" + arr_DMC_Jp2[i] + "</span></td></tr>";
            }
            $("#tbody_dmcjptwo" ).html(str_jp1_23);
        }

        $("#tbody_jackpotthreed" ).html("");
        var str_3DJp_res = "";
        var _3djp = list._3djp;
        var j=1;
        for(var i = 0; i < _3djp.length; i ++)
        {
           if(j%3 == 1)
                    str_3DJp_res += "<tr>";
                      if(_3djp[i] != null)
                        str_3DJp_res += '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="33%" height="30" align="center">'+_3djp[i]+'</td>';
            if(j%3 == 0)
                    str_3DJp_res += "</tr>";
                j++;
            if(j > 6)
                    break;
        }
        $("#tbody_jackpotthreed" ).html(str_3DJp_res);
}

