var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotSinpools')
    {
       var date = list.txday;
       if(date != "" || date != " ")
       {
           var days = date.split(" ");
           console.log(days);
           var arr_day = days[1] + "-" + ConverMonth(days[2])+"-"+days[3];
           console.log(arr_day);
           if(arr_day == output)
              load_node_sinpools(list);
      }
    }
});

$(document).ready(function() 
{
    getAllMonth();
    load_sinpools(); 
    $( "#seday" ).bind("change",function(){
        output = $("#seday").val();
        getAllMonth();
        load_sinpools();
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
| function load sandakan
|----------------------------------------------------------------
*/
function load_node_sinpools(list)
{
    $("#span_date").html(output);
    $("#spandrawno").html(list.draw_no);
    $("#span_1st").html(list.st1);
    $("#span_2nd").html(list.nd2);
    $("#span_3rd").html(list.rd3);
    var special = list.special;
    var consolation = list.consolation;
    $("#tbody_special").html("");
    $("#tbody_consolation").html("");
    var str_specail = "";
    var str_cosolation = "";
    var i = 1;
    if(special != "")
    {
        special = special.split("|");
        for(var j=0;j<special.length;j++)
        {
              if(i%5 == 1)
                  str_specail += "<tr>";
                      str_specail += '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'+special[j]+'</td>';
              if(i%5 == 0)
                  str_specail += "</tr>";
              i++;
              if(i > 10)
                  break;
        }
    }
    i = 1;
    if(consolation != "")
    {
        consolation = consolation.split("|");
        for(j=0;j<consolation.length;j++)
        {
             if(i%5 == 1)
                    str_cosolation        += "<tr>";
                        str_cosolation   += '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'+ consolation[j] +'</td>';
                if(i%5 == 0)
                    str_cosolation        += "</tr>";
                i++;
                if(i > 10)
                    break;
        }
    }
    $("#tbody_special").html(str_specail);
    $("#tbody_consolation").html(str_cosolation);
}

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

function load_sinpools(){
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
            url: "../home_controller/load_sinpools",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_sandakan_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_sandakan_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $("#spandrawno").html(sRes.str_Draw_No);
        $("#span_1st").html(sRes.str_1st);
        $("#span_2nd").html(sRes.str_2nd);
        $("#span_3rd").html(sRes.str_3rd);
        $("#tbody_special").html(sRes.str_spacial_res);
        $("#tbody_consolation").html(sRes.str_Consolation_res);
    }
    //$("#seday").html(sRes.str_date);
}

