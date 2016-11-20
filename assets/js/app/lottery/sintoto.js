var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
$(document).ready(function() 
{
    getAllMonth();
    load_sintoto(); 
    $("#seday" ).bind("change",function()
    { 
        output = $("#seday").val();
        getAllMonth();
        load_sintoto();
    });
});
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotSintoto')
    {
       var date = list.txtday;
       if(date != "" || date != " ")
       {
           var days = date.split(" ");
           console.log(days);
           var arr_day = days[1]+"-"+ConverMonth(days[2])+"-"+days[3];
           console.log(arr_day);
           if(arr_day == output)
              load_node_sintoto(list);
      }
    }
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
function load_node_sintoto(list)
{
    // if(sRes.flag != 0)
    // {
        var st_Draw_No = list.draw_no;
        $("#span_date").html(list.txtday);
        if(st_Draw_No != null)
         $("#spandrawno").html(" " + st_Draw_No);
        group11 = list.group1;
        if(group11 != null)
        {
            group1 = group11.split("|");
            $("#tdGroup1").html(" " + group1[0]);
            $("#tdWinner1").html(group1[1] + " " );
        }
        group21  = list.group2;
        if(group21 != null)
        {
            group2 = group21.split("|");
            $("#tdGroup2").html(" " + group2[0]);
            $("#tdWinner2").html(group2[1] + " ");
        }
    
        group31 = list.group3;
        if(group31 != null)
        {
            group3 = group31.split("|");
            $("#tdGroup3").html(" " + group3[0]);
            $("#tdWinner3").html(group3[1] + " ");
        }
        
        group41 = list.group4;
        if(group41 != null)
        {
            group4 = group41.split("|");
            $("#tdGroup4").html(" "+ group4[0]);
            $("#tdWinner4").html(group4[1] + " ");
        }

        group51 = list.group5;
        if(group51 != null)
        {
            group5 = group51.split("|");
            $("#tdGroup5").html(" " + group5[0]);
            $("#tdWinner5").html(group5[1] + " ");
        }
        group61 = list.group6;
        if(group61 != null)
        {
            group6 = group61.split("|");
            $("#tdGroup6").html(" " + group6[0]);
            $("#tdWinner6").html(group6[1] + " ");
        }
        group71 = list.group7;
        if(group71 != null)
        {
            group7 = group71.split("|");
            $("#tdGroup7").html(" " + group7[0]);
            $("#tdWinner7").html(group7[1] + " ");
        }
        var wino = list.winner;
        if(wino != null)
        {
            wino = wino.split('|');
            if(wino.length > 0)
            {
                for(var i =0 ;i < wino.length-1;i++)
                {
                    $("#tbWinNo tbody tr:eq(1) td:eq("+i+") strong").html(wino[i]);
                }
            }
        }
        $("#s_addNumber").html(list.addnumber);
        $("#s_Amount").html(list.amountprice);
        
    //}
}

function load_sintoto()
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
            url: "../home_controller/load_sintoto",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_sintoto_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_sintoto_Complete(data){
    var sRes = JSON.parse(data);
    var group1;
    var group2;
    var group3;
    var group4;
    var group5;
    var group6;
    var group7;

    var group11;
    var group12;
    var group21;
    var group22;
    var group31;
    var group41;
    var group51;
    var group61;
    var group71;
    var amount_price;

    if(sRes.flag != 0)
    {
        var st_Draw_No = sRes.str_Draw_No;
        $("#span_date").html(sRes.span_date);
        if(st_Draw_No != null)
         $("#spandrawno").html(" " + st_Draw_No);
        group11 = sRes.str_group1;
        if(group11 != null)
        {
            group1 = group11.split("|");
            $("#tdGroup1").html(" " + group1[0]);
            $("#tdWinner1").html(group1[1] + " " );
        }
        group21  = sRes.str_group2;
        if(group21 != null)
        {
            group2 = group21.split("|");
            $("#tdGroup2").html(" " + group2[0]);
            $("#tdWinner2").html(group2[1] + " ");
        }
    
        group31 = sRes.str_group3;
        console.log(group31);
        if(group31 != null)
        {
            group3 = group31.split("|");
            $("#tdGroup3").html(" " + group3[0]);
            $("#tdWinner3").html(group3[1] + " ");
            console.log(group3[0]);
        }
        
        group41 = sRes.str_group4;
        if(group41 != null)
        {
            group4 = group41.split("|");
            $("#tdGroup4").html(" "+ group4[0]);
            $("#tdWinner4").html(group4[1] + " ");
        }

        group41 = sRes.str_group4;
        if(group41 != null)
        {
            group4 = group41.split("|");
            $("#tdGroup4").html(" " + group4[0]);
            $("#tdWinner4").html(group4[1] + " ");
        }
        group51 = sRes.str_group5;
        if(group51 != null)
        {
            group5 = group51.split("|");
            $("#tdGroup5").html(" " + group5[0]);
            $("#tdWinner5").html(group5[1] + " ");
        }
        group61 = sRes.str_group6;
        if(group61 != null)
        {
            group6 = group61.split("|");
            $("#tdGroup6").html(" " + group6[0]);
            $("#tdWinner6").html(group6[1] + " ");
        }
        group71 = sRes.str_group7;
        if(group71 != null)
        {
            group7 = group71.split("|");
            $("#tdGroup7").html(" " + group7[0]);
            $("#tdWinner7").html(group7[1] + " ");
        }
        var wino = sRes.str_winNo;
        if(wino != null)
        {
            wino = wino.split('|');
            if(wino.length > 0)
            {
                for(var i =0 ;i < wino.length-1;i++)
                {
                    $("#tbWinNo tbody tr:eq(1) td:eq("+i+") strong").html(wino[i]);
                }
            }
        }
        $("#s_addNumber").html(sRes.str_addnumber);
        $("#s_Amount").html(sRes.str_amountprice);
        
    }
    else
    {
        $("#tbWinNo tbody tr td strong").html(" ");
        $("#s_addNumber").html("");
        $("#tdGroup1").html(" ");
        $("#tdWinner1").html(" ");
        $("#tdGroup2").html(" ");
        $("#tdWinner2").html(" ");
        $("#tdGroup3").html(" ");
        $("#tdWinner3").html(" ");
        $("#tdGroup4").html(" ");
        $("#tdWinner4").html(" ");
        $("#tdGroup5").html(" ");
        $("#tdWinner5").html(" ");
        $("#tdGroup6").html(" ");
        $("#tdWinner6").html(" ");
        $("#tdGroup7").html(" ");
        $("#tdWinner7").html(" ");
    }
    //$("#seday").html(sRes.str_date);
}

