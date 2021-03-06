var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotSabah')
    {
       var date = list.lotto_date;
       if(date != "" || date != " ")
       {
           var days = date.split("-");
           console.log(days);
           var arr_day = days[0]+"-"+ConverMonth(days[1])+"-"+days[2];
           console.log(arr_day);
           if(arr_day == output)
              load_node_sabah(list);
      }
    }
});
$(document).ready(function() 
{
    getAllMonth();
    load_sabah(); 
    $( "#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_sabah();
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
function load_sabah(){
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
            url: "../home_controller/load_sabah",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_sabah_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_sabah_Complete(data)
{
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
        str_st = sRes.str_1st;
        str_st = str_st.split("|");
        str_1st = str_st[0];
        str_2st = str_st[1];
        $("#span_1st").html(str_1st);
        $("#span_1st1").html(str_2st);
        str_nd  = sRes.str_2nd;
        str_nd = str_nd.split("|");
        str_1nd = str_nd[0];
        str_2nd = str_nd[1];
        $("#span_2nd").html(str_1nd);
        $("#span_2nd1").html(str_2nd);
        str_rd = sRes.str_3rd;
        str_rd = str_rd.split("|");
        str_1rd = str_rd[0];
        str_2rd = str_rd[1];
        $("#span_3rd").html(str_1rd);
        $("#span_3rd1").html(str_2rd);

        $("#tbody_special").html(sRes.str_spacial_res);
        $("#tbody_consolation").html(sRes.str_Consolation_res);
        $("#spPrize1st").text(sRes.str_Lotto_1st);
        $("#spPrize2nd").text(sRes.str_Lotto_2nd);
        var loto = sRes.str_loto;
        loto = loto.split('|');
        if(loto.length > 0)
        {
            for(var i =0 ;i < loto.length-1;i++)
            {
                $("#tbToto tbody tr td:eq("+i+") strong").html(loto[i]);
            }

            $("#tbToto tbody tr td:eq(6) strong").html("+ " + loto[loto.length-1]);
            $("#tdlotoday").html(sRes.str_lotoDay);
            $("#tdlotodraw").html(sRes.str_lotoDraw);
        }    
    }
    else
    {
        $("#tbToto tbody tr td strong").html(" ");
        $("#tdlotoday").html(" ");
        $("#tdlotodraw").html(" ");
        $("#spPrize1st").text(" ");
        $("#spPrize2nd").text(" ");
        $("#span_1st1").text(" ");
        $("#span_2nd1").text(" ");
        $("#span_3rd1").text(" ");
    }
    //$("#seday").html(sRes.str_date);
}

function load_node_sabah(list)
{
    $("#span_date").html(output);
    $("#spandrawno").html(list.lotton_draw);
    str_st = list.pos1;
    str_st = str_st.split("|");
    str_1st = str_st[0];
    str_2st = str_st[1];
    $("#span_1st").html(str_1st);
    $("#span_1st1").html(str_2st);
    str_nd  = list.pos2;
    str_nd = str_nd.split("|");
    str_1nd = str_nd[0];
    str_2nd = str_nd[1];
    $("#span_2nd").html(str_1nd);
    $("#span_2nd1").html(str_2nd);
    str_rd = list.pos3;
    str_rd = str_rd.split("|");
    str_1rd = str_rd[0];
    str_2rd = str_rd[1];
    $("#span_3rd").html(str_1rd);
    $("#span_3rd1").html(str_2rd);
    $("#tbody_special").html("");
    $("#tbody_consolation").html("");
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

    $("#spPrize1st").text(list.prizes1st);
    $("#spPrize2nd").text(list.prizes2nd);
    var loto = list.lotto;
    loto = loto.split('|');
    if(loto.length > 0)
    {
        for(var i =0 ;i < loto.length-1;i++)
        {
            $("#tbToto tbody tr td:eq("+i+") strong").html(loto[i]);
        }

        $("#tbToto tbody tr td:eq(6) strong").html("+ " + loto[loto.length-1]);
        $("#tdlotoday").html(output);
        $("#tdlotodraw").html(list.lotton_draw);
    }    
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

