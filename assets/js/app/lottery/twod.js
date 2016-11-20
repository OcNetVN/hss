var d = new Date();
var month = d.getMonth()+1;
var day = d.getDate();
var output = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
var outday = ((''+day).length<2 ? '0' : '') + day + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + d.getFullYear();
socket.on('PageRefresh', function(PageRefresh)
{
   var message = PageRefresh.message;
    var list    = PageRefresh.list;
    if(message == 'LotTwod')
    {
       var date = list.txtdate;
       if(date != "" || date != " ")
       {
           if(date == output)
              load_node_2d(list);
      }
    }
});

$(document).ready(function() {
    getAllMonth();
    load_twod(); 
    $( "#seday" ).bind("change",function()
    {   
        output = $("#seday").val();
        getAllMonth();
        load_twod();
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
| function load twod
|----------------------------------------------------------------
*/
function load_twod(){
    $("#span_txdayday").html("");
    $("#span_txdaynight").html("");
    $("#spannumday").html("");
    $("#spannumnight").html("");
    
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_twod",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_twod_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_twod_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#spannumday").html(sRes.str_day);
        $("#spannumnight").html(sRes.str_night);
    }
    //$("#seday").html(sRes.str_date);
    var seday = $( "#seday" ).val();
    $("#span_txdayday").html(seday);
    $("#span_txdaynight").html(seday);
}

function load_node_2d(list)
{
   $("#spannumday").html(list.numday);
   $("#spannumnight").html(list.numnight);
   $("#span_txdayday").html(output);
   $("#span_txdaynight").html(output);
}

