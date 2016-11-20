var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();

socket.on('PageRefresh', function(PageRefresh)
{
    var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotBigsweep')
    {
       var date = list.txtday;
       if(date != "" || date != " ")
       {
           if(date == output)
              load_node_bigsweep(list);
      }
    }
});

$(document).ready(function() 
{
    getAllMonth();
    load_bigsweep(); 
    $("#seday" ).bind("change",function()
    {
        output = $("#seday").val();
        getAllMonth();
        load_bigsweep();
    });
});

function getAllMonth()
{
    var value = $("#seday").val();
    var str = "";
    var d_select = new Date();
    console.log(value);
    if(value == null)
    {
        var newdate = new Date();
        newdate.setDate(new Date().getDate() - 10);
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        var someFormattedDate = mm + '/' + dd + '/' + y;
        console.log("Ngay hien tại" + outday);
        
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
| function load bigsweep
|----------------------------------------------------------------
*/
function load_bigsweep(){
    $( "span[id*='span']" ).html("");
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_bigsweep",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_bigsweep_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_bigsweep_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $( "#spandrawno" ).html(sRes.arr_res["Draw_No"]);
        $( "#spanjegit" ).html(sRes.arr_res["jpnumber"]);
        $( "#spanjp" ).html(sRes.arr_res["jprm"]);
        
        $( "#spanno1" ).html(sRes.arr_res["major_1"]);
        $( "#spanrm1" ).html(sRes.arr_res["majorrm_1"]);
        $( "#spanno2" ).html(sRes.arr_res["major_2"]);
        $( "#spanrm2" ).html(sRes.arr_res["majorrm_2"]);
        $( "#spanno3" ).html(sRes.arr_res["major_3"]);
        $( "#spanrm3" ).html(sRes.arr_res["majorrm_3"]);
        
        var str_bliss               = "";
        var arr_bliss               =   sRes.arr_res["bliss"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_bliss    += "<tr>";
            str_bliss    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbliss_"+ i +"\">" + arr_bliss[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_bliss    += "</tr>";
        }
        $("#tbodybliss").html(str_bliss);
        
        var str_sweet        = "";
        var arr_sweet               =   sRes.arr_res["sweet"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_sweet    += "<tr>";
            str_sweet    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spansweet_"+ i +"\">" + arr_sweet[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_sweet    += "</tr>";
        }
        str_sweet    += "</tr>";
        $("#tbodysweep").html(str_sweet);
        
        var str_glee        = "";
        var arr_glee        =   sRes.arr_res["glee"].split("|");
        for(var i = 0; i <30; i ++)
        {
            if((i+1)%4 == 1)
                str_glee    += "<tr>";
            str_glee    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanglee_"+ i +"\">" + arr_glee[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_glee    += "</tr>";
        }
        str_glee    += "</tr>";
        $("#tbodyglee").html(str_glee);
        
        var str_happy           = "";
        var arr_happy            =   sRes.arr_res["happy"].split("|");
        for(var i = 0; i <3; i ++)
        {
            if((i+1)%4 == 1)
                str_happy    += "<tr>";
            str_happy    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanhappy_"+ i +"\">" + arr_happy[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_happy    += "</tr>";
        }
        str_happy    += "</tr>";
        $("#tbodyhappy").html(str_happy);
        
        var str_lucky           = "";
        var arr_lucky           =   sRes.arr_res["lucky"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_lucky    += "<tr>";
            str_lucky    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanlucky_"+ i +"\">" + arr_lucky[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_lucky    += "</tr>";
        }
        str_lucky    += "</tr>";
        $("#tbodylucky").html(str_lucky);
        
        var str_bonus        = "";
        var arr_bonus           =   sRes.arr_res["bonus"].split("|");
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_bonus    += "<tr>";
            str_bonus    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbonus_"+ i +"\">" + arr_bonus[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_bonus    += "</tr>";
        }
        str_bonus    += "</tr>";
        $("#tbodybonus").html(str_bonus);
    }
    else
    {
        $( "tbody[id*='tbody']" ).html('<td width="20%" height="35" align="center" valign="middle">&nbsp;</td>');
    }
    //$("#seday").html(sRes.str_date);
}

function load_node_bigsweep(list)
{

        $("#span_date").html(output);
        $("#spandrawno" ).html(list.drawno);
        $("#spanjegit" ).html(list.jegit);
        $("#spanjp" ).html(list.jp);
        
        $("#spanno1" ).html(list.No1);
        $("#spanrm1" ).html(list.rm1);
        $("#spanno2" ).html(list.No2);
        $("#spanrm2" ).html(list.rm2);
        $("#spanno3" ).html(list.No3);
        $("#spanrm3" ).html(list.rm3);
        
        var str_bliss               = "";
        var arr_bliss               =   list.bliss;
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_bliss    += "<tr>";
            str_bliss    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbliss_"+ i +"\">" + arr_bliss[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_bliss    += "</tr>";
        }
        $("#tbodybliss").html(str_bliss);
        
        var str_sweet        = "";
        var arr_sweet               =   list.sweet;
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_sweet    += "<tr>";
            str_sweet    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spansweet_"+ i +"\">" + arr_sweet[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_sweet    += "</tr>";
        }
        str_sweet    += "</tr>";
        $("#tbodysweep").html(str_sweet);
        
        var str_glee        = "";
        var arr_glee        =   list.glee;
        for(var i = 0; i <30; i ++)
        {
            if((i+1)%4 == 1)
                str_glee    += "<tr>";
            str_glee    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanglee_"+ i +"\">" + arr_glee[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_glee    += "</tr>";
        }
        str_glee    += "</tr>";
        $("#tbodyglee").html(str_glee);
        
        var str_happy           = "";
        var arr_happy            =   list.happy;
        for(var i = 0; i <3; i ++)
        {
            if((i+1)%4 == 1)
                str_happy    += "<tr>";
            str_happy    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanhappy_"+ i +"\">" + arr_happy[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_happy    += "</tr>";
        }
        str_happy    += "</tr>";
        $("#tbodyhappy").html(str_happy);
        
        var str_lucky           = "";
        var arr_lucky           =   list.lucky;
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_lucky    += "<tr>";
            str_lucky    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanlucky_"+ i +"\">" + arr_lucky[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_lucky    += "</tr>";
        }
        str_lucky    += "</tr>";
        $("#tbodylucky").html(str_lucky);
        
        var str_bonus        = "";
        var arr_bonus           =   list.bonus;
        for(var i = 0; i <10; i ++)
        {
            if((i+1)%4 == 1)
                str_bonus    += "<tr>";
            str_bonus    += "<td height=\"30\" align=\"center\" style=\"border:1px solid #903;\"><strong><span id=\"spanbonus_"+ i +"\">" + arr_bonus[i] + "</span></strong></td>";
            if((i+1)%4 == 0)
                str_bonus    += "</tr>";
        }
        str_bonus    += "</tr>";
        $("#tbodybonus").html(str_bonus);
}

