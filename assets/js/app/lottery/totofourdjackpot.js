var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh){
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotTotofourd')
    {
       var date = list.txtday;
       if(date != "" || date != " ")
       {
           var days = date.split("/");
           console.log(days);
           var arr_day = days[0]+"-" + days[1] + "-" + days[2];
           console.log(arr_day);
           if(arr_day == output)
              load_node_toto(list);
      }
    }
    if(PageRefresh == 'LotTotofourd'){
       load_totofourd();
    }
});
$(document).ready(function() 
{
    getAllMonth();
    load_totofourd(); 
    $( "#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_totofourd();
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
| function load totofourd
|----------------------------------------------------------------
*/
function load_totofourd(){
    $("#span_date").html("");
    $("#spandrawno").html("");
    $("#span_1st").html("");
    $("#span_2nd").html("");
    $("#span_3rd").html("");
    $("#tbody_special").html("<tr><td width=\"20%\" height=\"35\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\">&nbsp;</td></tr>");
    $("#tbody_consolation").html("<tr><td width=\"20%\" height=\"35\" align=\"center\" valign=\"middle\" bgcolor=\"#666666\">&nbsp;</td></tr>");
    
    $("#span5d1").html("");
    $("#span5d2").html("");   
    $("#span5d3").html("");   
    $("#span5d4").html("");   
    $("#span5d5").html("");   
    $("#span5d6").html("");  
    
    $("#span6d1").html("");
    $("#span6d2").html("");   
    $("#span6d22").html("");   
    $("#span6d3").html("");   
    $("#span6d33").html("");   
    $("#span6d4").html("");   
    $("#span6d44").html("");   
    $("#span6d5").html("");   
    $("#span6d55").html("");
    
    $("#spangrand1").html("");  
    $("#spangrand2").html("");    
    $("#spangrand3").html("");    
    $("#spangrand4").html("");    
    $("#spangrand5").html("");  
    $("#spangrand6").html(""); 
    $("#spangrandrm").html("");
     
    $("#spanpower1").html("");  
    $("#spanpower2").html("");    
    $("#spanpower3").html("");    
    $("#spanpower4").html("");    
    $("#spanpower5").html("");  
    $("#spanpower6").html("");  
    $("#spanpowerrm").html("");
    
    $("#spansupreme1").html("");  
    $("#spansupreme2").html("");    
    $("#spansupreme3").html("");    
    $("#spansupreme4").html("");    
    $("#spansupreme5").html("");  
    $("#spansupreme6").html("");
    $("#spansupremerm").html("");
         
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_totofourd",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_totofourd_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_totofourd_Complete(data){
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
        
        $("#spanrmjp1").html(sRes.str_TJ4D_jp1);
        $("#spanrmjp2").html(sRes.str_TJ4D_jp2);
        var str_toto4d_jackpot   = "";
        var arr_jackpot  = "";
        arr_jackpot    = sRes.str_TJ4D_resul;
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
        $("#span5d1").html(sRes.str_TJ5D_1st);
        $("#span5d2").html(sRes.str_TJ5D_2nd);
        $("#span5d3").html(sRes.str_TJ5D_3rd);
        $("#span5d4").html(sRes.str_TJ5D_4th);
        $("#span5d5").html(sRes.str_TJ5D_5th);
        $("#span5d6").html(sRes.str_TJ5D_6th);
        
        $("#span6d1").html(sRes.str_TJ6D_1st);
        $("#span6d2").html(sRes.arr_TJ6D_2nd[0]);
        $("#span6d22").html(sRes.arr_TJ6D_2nd[1]);
        $("#span6d3").html(sRes.arr_TJ6D_3rd[0]);
        $("#span6d33").html(sRes.arr_TJ6D_3rd[1]);
        $("#span6d4").html(sRes.arr_TJ6D_4th[0]);
        $("#span6d44").html(sRes.arr_TJ6D_4th[1]);
        $("#span6d5").html(sRes.arr_TJ6D_5th[0]);
        $("#span6d55").html(sRes.arr_TJ6D_5th[1]);
        
        $("#spangrand1").html(sRes.arr_Mega[0]);  
        $("#spangrand2").html(sRes.arr_Mega[1]);    
        $("#spangrand3").html(sRes.arr_Mega[2]);    
        $("#spangrand4").html(sRes.arr_Mega[3]);    
        $("#spangrand5").html(sRes.arr_Mega[4]);  
        $("#spangrand6").html(sRes.arr_Mega[5]); 
        $("#spangrandrm").html(sRes.str_Mega_jp1);
        
        $("#spanpower1").html(sRes.arr_Power[0]);  
        $("#spanpower2").html(sRes.arr_Power[1]);    
        $("#spanpower3").html(sRes.arr_Power[2]);    
        $("#spanpower4").html(sRes.arr_Power[3]);    
        $("#spanpower5").html(sRes.arr_Power[4]);  
        $("#spanpower6").html(sRes.arr_Power[5]);  
        $("#spanpowerrm").html(sRes.str_Power_jp);
        
        $("#spansupreme1").html(sRes.arr_Super[0]);  
        $("#spansupreme2").html(sRes.arr_Super[1]);    
        $("#spansupreme3").html(sRes.arr_Super[2]);    
        $("#spansupreme4").html(sRes.arr_Super[3]);    
        $("#spansupreme5").html(sRes.arr_Super[4]);  
        $("#spansupreme6").html(sRes.arr_Super[5]);
        $("#spansupremerm").html(sRes.str_Super_jp);
        
    }
    //$("#seday").html(sRes.str_date);
}

function load_node_toto(list)
{

    $("#span_date").html(output);
    $("#spandrawno").html(list.drawno);
    $("#span_1st").html(list._1st);
    $("#span_2nd").html(list._2nd);
    $("#span_3rd").html(list._3rd);
    //$("#tbody_special").html(list.drawno);
    //$("#tbody_consolation").html(list.drawno);
    
    $("#spanrmjp1").html(list.rmjp1);
    $("#spanrmjp2").html(list.rmjp2);
    var str_toto4d_jackpot   = "";
    var arr_jackpot  = "";
    arr_jackpot    = list.jackpottoto;
    if(typeof arr_jackpot != "undefined" && arr_jackpot != null && arr_jackpot.length > 0)
    {
        //arr_jackpot = arr_jackpot.split("|");
        var j=0;
        for(var i=0;i<arr_jackpot.length;i+=2)
        {
                j++;           
                $("#Jack_4D_1_" + j).html(arr_jackpot[i]);
                $("#Jack_4D_2_" + j).html(arr_jackpot[i+1]);             
        }
    }

    var l_5d = list._5d;
    for(var i=0;i<l_5d.length;i++)
    {
        $("#span5d"+(i+1)).html(l_5d[i]);
    }
    
    var l_6d = list._6d;
    if(l_6d.length > 0)
    {
        $("#span6d1").html(l_6d[0]);
        var l_6d1 = l_6d[1];
        l_6d1 = l_6d1.split("or");
        $("#span6d2").html(l_6d1[0]);
        $("#span6d22").html(l_6d1[1])
        var l_6d2 = l_6d[2];
        l_6d2 = l_6d2.split("or");
        $("#span6d3").html(l_6d2[0]);
        $("#span6d33").html(l_6d2[1]);
        var l_6d3 = l_6d[3];
        l_6d3 = l_6d3.split("or");
        $("#span6d4").html(l_6d3[0]);
        $("#span6d44").html(l_6d3[1]);
        var l_6d4 = l_6d[4];
        l_6d4 = l_6d4.split("or");
        $("#span6d5").html(l_6d4[0]);
        $("#span6d55").html(l_6d4[1])

    }

    var specail     = list.special;
    var str_specical        = "";
    for(var i = 0; i <10; i ++)
    {
        if((i+1)%4 == 1)
            str_specical    += "<tr>";
        if((i+1)    == 9)
        {
            str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";
            str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + specail[i] + "</span></strong></td>";   
        }
        else
        {
            if((i+1)    == 10)
            {
                str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + specail[i] + "</span></strong></td>";
                str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";   
            }
            else    
                str_specical    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanspecial_"+ i +"\">" + specail[i] + "</span></strong></td>";
        }
        if((i+1)%4 == 0)
            str_specical    += "</tr>";
    }
    str_specical    += "</tr>";
    $("#tbody_special").html(str_specical);
    
    var consolation = list.consolation;
    var str_consolation        = "";
    for(var i = 0; i <10; i ++)
    {
        if((i+1)%4 == 1)
            str_consolation    += "<tr>";
        if((i+1)    == 9)
        {
            str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";
            str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + consolation[i] + "</span></strong></td>";   
        }
        else
        {
            if((i+1)    == 10)
            {
                str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + consolation[i] + "</span></strong></td>";
                str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span>&nbsp;</span></strong></td>";   
            }
            else    
                str_consolation    += "<td height=\"30\" width=\"25%\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanconsolation_"+ i +"\">" + consolation[i] + "</span></strong></td>";
        }
        if((i+1)%4 == 0)
            str_consolation    += "</tr>";
    }
    str_consolation    += "</tr>";
    $("#tbody_consolation").html(str_consolation);
    var grand = list._grand;
    for(i=0;i<grand.length;i++)
    {
        $("#spangrand" + (i+1)).html(grand[i]);
    }
    $("#spangrandrm").html(list.grandrm);
    
    var power =  list._power;
    for(i=0;i<power.length;i++)
    {
        $("#spanpower" + (i+1)).html(power[i]);  
    } 
    $("#spanpowerrm").html(list.powerrm);
    
    var supreme = list._supreme;
    for(i=0 ; i < supreme.length; i++)
    {
        $("#spansupreme" +(i+1)).html(supreme[i]); 
    }
    $("#spansupremerm").html(list.supremerm);
}

