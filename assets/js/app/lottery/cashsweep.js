var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotCashsweep')
    {
       var date = list.txtday;
       if(date != "" || date != " ")
       {
           var days = date.split("/");
           console.log(days);
           var arr_day = days[0]+"-" + days[1] + "-" + days[2];
           console.log(arr_day);
           if(arr_day == output)
              load_node_cashsweep(list);
      }
    }
});

$(document).ready(function() 
{
    getAllMonth();
    load_cashsweep(); 
    $( "#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_cashsweep();
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
| function load cashsweep
|----------------------------------------------------------------
*/
function load_cashsweep(){
    $("#span_date").html("");
    $("#spandrawno").html("");
    $("#span_1st_1").html("");
    $("#span_2nd_1").html("");
    $("#span_3rd_1").html("");
    $("#span_1st_2").html("");
    $("#span_2nd_2").html("");
    $("#span_3rd_2").html("");
    $("#tbody_special").html("");
    $("#tbody_consolation").html("");
    
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_cashsweep",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_cashsweep_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_cashsweep_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $("#spandrawno").html(sRes.str_Draw_No);
        $("#span_1st_1").html(sRes.str_1st_1);
        $("#span_2nd_1").html(sRes.str_2nd_1);

        $("#span_1st_2").html(sRes.str_1st_2);
        $("#span_2nd_2").html(sRes.str_2nd_2);
        
        $("#span_3rd_1").html(sRes.str_3rd_1);
        $("#span_3rd_2").html(sRes.str_3rd_2);
        $("#tbody_special").html(sRes.str_spacial_res);
        $("#tbody_consolation").html(sRes.str_Consolation_res);
    }
    //$("#seday").html(sRes.str_date);
}

function load_node_cashsweep(list)
{
    $("#span_date").html(output);
    $("#spandrawno").html(list.draw_no);
    var str_st1 = list.st1;
    var str_nd2 = list.nd2;
    var str_rd3 = list.rd3;
    if(str_st1 != "")
    {
       str_st1 = str_st1.split("|");
       if(str_st1.length > 0)
       {
            $("#span_1st_1").html(str_st1[0]);
            $("#span_1st_2").html(str_st1[1]);
       }
   }
   if(str_nd2 != "")
   {
       str_nd2 = str_nd2.split("|");
       if(str_nd2.length > 0)
       {
            $("#span_2nd_1").html(str_nd2[0]);
            $("#span_2nd_2").html(str_nd2[1]);
       }
   }

   if(str_rd3 != "")
   {
       str_rd3 = str_rd3.split("|");
       if(str_rd3.length > 0)
       {
            $("#span_3rd_1").html(str_rd3[0]);
            $("#span_3rd_2").html(str_rd3[1]);
       }
   }
    
    var consolation = list.consolation;
    var specail     = list.special;
    var str_consolation="";
    var str_specail = "";
    var i = 1;
    if(consolation != "")
    {
        consolation = consolation.split("|"); 
        if(consolation.length > 0)
        {
            for(var j= 0 ; j < consolation.length;j++)
            {
                if(i%5 == 1)
                    str_consolation += "<tr>";
                        str_consolation += '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'+consolation[j]+'</td>';
                if(i%5 == 0)
                    str_consolation += "</tr>";
                i++;
                if(i > 10)
                    break;
            }
            $("#tbody_consolation").html(str_consolation);
        }
    }

    var i = 1;
    if(specail != "")
    {
         specail = specail.split("|");
          for(var j=0;j<specail.length;j++)
          {
                if(i%5 == 1)
                    str_specail += "<tr>";
                        str_specail += '<td style="border-left: 1px black solid;border-bottom: 1px black solid;;border-top: 1px black solid;" width="20%" height="36" align="center" valign="middle" bgcolor="#666666">'+specail[j]+'</td>';
                if(i%5 == 0)
                    str_specail += "</tr>";
                i++;
                if(i > 10)
                    break;
          }
        $("#tbody_special").html(str_specail);
    }   
}

