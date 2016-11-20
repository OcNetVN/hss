var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotSinSweep')
    {
       var date = list.txtday;
       if(date != "" || date != " ")
       {
           var days = date.split(" ");
           console.log(days);
           var arr_day = days[1]+"-"+ConverMonth(days[2])+"-"+days[3];
           console.log(arr_day);
           if(arr_day == output)
              load_node_sinsweep(list);
      }
    }
});
$(document).ready(function() 
{
    getAllMonth();
    load_sinsweep(); 
    $( "#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_sinsweep();
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
| function load sabah
|----------------------------------------------------------------
*/

function ConverMonth(month_arr)
{
      var month;
      switch (month_arr) {
            case 'Jan': month = "01";
              break;
            case 'Feb': month = "02";
              break;
            case 'Mar': month = "03";
              break;
            case 'Apr': month = "04";
              break;
            case 'May': month = "05";
              break;
            case 'Jun': month = "06";
              break;
            case 'Jul': month = "07";
              break;
            case 'Aug': month = "08";
              break;
            case 'Sep': month = "09";
              break;
            case 'Oct': month = "10";
              break;
            case 'Nov': month = "11";
              break;
            case 'Dec': month = "12";
              break;
            default:
              month = "";
              break;
          }

          return month;
}
function load_sinsweep()
{
    $("#span_date").html("");
    $("#spandrawno").html("");
    $("#span_1st").html("&nbsp;");
    $("#span_3rd").html("&nbsp;");
    $("#span_2nd").html("&nbsp;");
    $("#tbody_special").html("&nbsp;");
    $("#tbody_consolation").html("&nbsp;");
    
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_sinsweep",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_sinsweep_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_node_sinsweep(list)
{
    $("#span_date").html(output);
    $("#spandrawno").html(list.draw_no);
    $("#spanPrize11").text(list.stprize11);
    $("#spanPrize12").text(list.stprize12);
    $("#spanPrize21").text(list.stprize21);
    $("#spanPrize22").text(list.stprize22);
    $("#spanPrize31").text(list.stprize31);
    $("#spanPrize32").text(list.stprize32);
    
    var jackport = list.jopok;
    jackport = jackport.split('|');
    var count=0;
    if(jackport.length > 0)
    {
        for(var i =0 ;i < jackport.length;i++)
        {
            if(i < 5)
            {
                $("#tbJackpotPrize tbody tr:eq(1) td:eq("+i+") strong").html(jackport[i]);
            }
            else
            {
                count++;
                $("#tbJackpotPrize tbody tr:eq(2) td:eq("+(count-1)+") strong").html(jackport[i]);
            }
        }
    }

    var lucky = list.lucky;
    lucky     = lucky.split('|');
    count = 0;
    if(lucky.length > 0)
    {
        for(var i =0 ;i < lucky.length;i++)
        {
            if(i < 5)
            {
                $("#tbLuckyPrizes tbody tr:eq(1) td:eq("+i+") strong").html(lucky[i]);
            }
            else
            {
                count++;
                $("#tbLuckyPrizes tbody tr:eq(2) td:eq("+(count-1)+") strong").html(lucky[i]);
            }
        }
    }

    var gift = list.gift;
    gift =  gift.split('|');
    count = 0; 
    var count1 = 0;
    if(gift.length > 0)
    {
        for(var i=0;i < gift.length;i++)
        {
            if( i < 5)
            {
                var j = i + 5;
                var h = i + 10;
                var l = i + 15;
                var m = i + 20;
                var z = i + 25;
                var y = i + 30;
               $("#tb30GiftPrize tbody tr:eq(1) td:eq("+i+") strong").html(gift[i]);
               $("#tb30GiftPrize tbody tr:eq(2) td:eq("+i+") strong").html(gift[j]);
               $("#tb30GiftPrize tbody tr:eq(3) td:eq("+i+") strong").html(gift[h]);
               $("#tb30GiftPrize tbody tr:eq(4) td:eq("+i+") strong").html(gift[l]);
               $("#tb30GiftPrize tbody tr:eq(5) td:eq("+i+") strong").html(gift[m]);
               $("#tb30GiftPrize tbody tr:eq(6) td:eq("+i+") strong").html(gift[z]);
            }
        }
    }
    var consolation = list.consolation;
    consolation =  consolation.split('|');
    
    if(consolation.length > 0)
    {
        for(var i=0;i < consolation.length;i++)
        {
            if( i < 5)
            {
                var jj = i + 5;
                var hh = i + 10;
                var ll = i + 15;
                var mm = i + 20;
                var zz = i + 25;
               $("#tbConsolation tbody tr:eq(1) td:eq("+i+") strong").html(consolation[i]);
               $("#tbConsolation tbody tr:eq(2) td:eq("+i+") strong").html(consolation[jj]);
               $("#tbConsolation tbody tr:eq(3) td:eq("+i+") strong").html(consolation[hh]);
               $("#tbConsolation tbody tr:eq(4) td:eq("+i+") strong").html(consolation[ll]);
               $("#tbConsolation tbody tr:eq(5) td:eq("+i+") strong").html(consolation[mm]);
               $("#tbConsolation tbody tr:eq(6) td:eq("+i+") strong").html(consolation[zz]);
            }
        }
    }

    var paraticat = list.participation;
    paraticat =  paraticat.split('|');
    
    if(paraticat.length > 0)
    {
        for(var i=0;i < paraticat.length;i++)
        {
            if( i < 5)
            {
                var jj = i + 5;
                var hh = i + 10;
                var ll = i + 15;
                var mm = i + 20;
                var zz = i + 25;
                var yy = i + 30;
                var nn = i + 35;
                var aa = i + 40;
                var bb = i + 45;
               $("#tbParticipation tbody tr:eq(1) td:eq("+i+") strong").html(paraticat[i]);
               $("#tbParticipation tbody tr:eq(2) td:eq("+i+") strong").html(paraticat[jj]);
               $("#tbParticipation tbody tr:eq(3) td:eq("+i+") strong").html(paraticat[hh]);
               $("#tbParticipation tbody tr:eq(4) td:eq("+i+") strong").html(paraticat[ll]);
               $("#tbParticipation tbody tr:eq(5) td:eq("+i+") strong").html(paraticat[mm]);
               $("#tbParticipation tbody tr:eq(6) td:eq("+i+") strong").html(paraticat[zz]);
               $("#tbParticipation tbody tr:eq(7) td:eq("+i+") strong").html(paraticat[yy]);
               $("#tbParticipation tbody tr:eq(8) td:eq("+i+") strong").html(paraticat[nn]);
               $("#tbParticipation tbody tr:eq(9) td:eq("+i+") strong").html(paraticat[aa]);
               $("#tbParticipation tbody tr:eq(10) td:eq("+i+") strong").html(paraticat[bb]);
            }
        }
    }

    var ddegit = list.ddelight;
    ddegit     =  ddegit.split('|');
    if(ddegit.length > 0)
    {
        for(var i = 0;i< ddegit.length;i++)
        {
            $("#tbDelight tbody tr:eq(0) td:eq("+i+") strong").html(ddegit[i]);
        }
    }
}

function load_sinsweep_Complete(data){
    var sRes = JSON.parse(data);
    var str_st;
    var str_1st;
    var str_2st;
    var str_nd;
    var str_1nd;
    var str_2nd;
    var str_rd;
    var str_1rd;
    var str_2rd;
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $("#spandrawno").html(sRes.str_Draw_No);
        $("#spanPrize11").text(sRes.str_prize11);
        $("#spanPrize12").text(sRes.str_prize12);
        $("#spanPrize21").text(sRes.str_ndprize11);
        $("#spanPrize22").text(sRes.str_ndprize12);
        $("#spanPrize31").text(sRes.str_rdprize31);
        $("#spanPrize32").text(sRes.str_rdprize32);
        
        var jackport = sRes.str_jp10;
        jackport = jackport.split('|');
        var count=0;
        if(jackport.length > 0)
        {
            for(var i =0 ;i < jackport.length;i++)
            {
                if(i < 5)
                {
                    $("#tbJackpotPrize tbody tr:eq(1) td:eq("+i+") strong").html(jackport[i]);
                }
                else
                {
                    count++;
                    $("#tbJackpotPrize tbody tr:eq(2) td:eq("+(count-1)+") strong").html(jackport[i]);
                }
            }
        }

        var lucky = sRes.str_lucky10;
        lucky     = lucky.split('|');
        count = 0;
        if(lucky.length > 0)
        {
            for(var i =0 ;i < lucky.length;i++)
            {
                if(i < 5)
                {
                    $("#tbLuckyPrizes tbody tr:eq(1) td:eq("+i+") strong").html(lucky[i]);
                }
                else
                {
                    count++;
                    $("#tbLuckyPrizes tbody tr:eq(2) td:eq("+(count-1)+") strong").html(lucky[i]);
                }
            }
        }

        var gift = sRes.str_gift30;
        gift =  gift.split('|');
        count = 0; 
        var count1 = 0;
        if(gift.length > 0)
        {
            for(var i=0;i < gift.length;i++)
            {
                if( i < 5)
                {
                    var j = i + 5;
                    var h = i + 10;
                    var l = i + 15;
                    var m = i + 20;
                    var z = i + 25;
                    var y = i + 30;
                   $("#tb30GiftPrize tbody tr:eq(1) td:eq("+i+") strong").html(gift[i]);
                   $("#tb30GiftPrize tbody tr:eq(2) td:eq("+i+") strong").html(gift[j]);
                   $("#tb30GiftPrize tbody tr:eq(3) td:eq("+i+") strong").html(gift[h]);
                   $("#tb30GiftPrize tbody tr:eq(4) td:eq("+i+") strong").html(gift[l]);
                   $("#tb30GiftPrize tbody tr:eq(5) td:eq("+i+") strong").html(gift[m]);
                   $("#tb30GiftPrize tbody tr:eq(6) td:eq("+i+") strong").html(gift[z]);
                }
            }
        }
        var consolation = sRes.str_consolation30;
        consolation =  consolation.split('|');
        
        if(consolation.length > 0)
        {
            for(var i=0;i < consolation.length;i++)
            {
                if( i < 5)
                {
                    var jj = i + 5;
                    var hh = i + 10;
                    var ll = i + 15;
                    var mm = i + 20;
                    var zz = i + 25;
                   $("#tbConsolation tbody tr:eq(1) td:eq("+i+") strong").html(consolation[i]);
                   $("#tbConsolation tbody tr:eq(2) td:eq("+i+") strong").html(consolation[jj]);
                   $("#tbConsolation tbody tr:eq(3) td:eq("+i+") strong").html(consolation[hh]);
                   $("#tbConsolation tbody tr:eq(4) td:eq("+i+") strong").html(consolation[ll]);
                   $("#tbConsolation tbody tr:eq(5) td:eq("+i+") strong").html(consolation[mm]);
                   $("#tbConsolation tbody tr:eq(6) td:eq("+i+") strong").html(consolation[zz]);
                }
            }
        }

        var paraticat = sRes.str_paraticai50;
        paraticat =  paraticat.split('|');
        
        if(paraticat.length > 0)
        {
            for(var i=0;i < paraticat.length;i++)
            {
                if( i < 5)
                {
                    var jj = i + 5;
                    var hh = i + 10;
                    var ll = i + 15;
                    var mm = i + 20;
                    var zz = i + 25;
                    var yy = i + 30;
                    var nn = i + 35;
                    var aa = i + 40;
                    var bb = i + 45;
                   $("#tbParticipation tbody tr:eq(1) td:eq("+i+") strong").html(paraticat[i]);
                   $("#tbParticipation tbody tr:eq(2) td:eq("+i+") strong").html(paraticat[jj]);
                   $("#tbParticipation tbody tr:eq(3) td:eq("+i+") strong").html(paraticat[hh]);
                   $("#tbParticipation tbody tr:eq(4) td:eq("+i+") strong").html(paraticat[ll]);
                   $("#tbParticipation tbody tr:eq(5) td:eq("+i+") strong").html(paraticat[mm]);
                   $("#tbParticipation tbody tr:eq(6) td:eq("+i+") strong").html(paraticat[zz]);
                   $("#tbParticipation tbody tr:eq(7) td:eq("+i+") strong").html(paraticat[yy]);
                   $("#tbParticipation tbody tr:eq(8) td:eq("+i+") strong").html(paraticat[nn]);
                   $("#tbParticipation tbody tr:eq(9) td:eq("+i+") strong").html(paraticat[aa]);
                   $("#tbParticipation tbody tr:eq(10) td:eq("+i+") strong").html(paraticat[bb]);
                }
            }
        }

        var ddegit = sRes.str_ddelight;
        ddegit     =  ddegit.split('|');
        if(ddegit.length > 0)
        {
            for(var i = 0;i< ddegit.length;i++)
            {
                $("#tbDelight tbody tr:eq(0) td:eq("+i+") strong").html(ddegit[i]);
            }
        }
        
    }
    else
    {
        $("#spanPrize11").text(" ");
        $("#spanPrize21").text(" ");
        $("#spanPrize31").text(" ");
        $("#spanPrize12").text(" ");
        $("#spanPrize22").text(" ");
        $("#spanPrize32").text(" ");
        $("#tbJackpotPrize tbody tr td strong").html(" ");
        $("#tbLuckyPrizes tbody tr td  strong").html(" ");
        $("#tb30GiftPrize tbody tr td  strong").html(" ");
        $("#tbConsolation tbody tr td  strong").html(" ");
        //tbParticipation
        $("#tbParticipation tbody tr td strong").html(" ");
        // tbDelight
        $("#tbDelight tbody tr td strong").html(" ");
    }
    //$("#seday").html(sRes.str_date);
}

