$(document).ready(function(){
    LoadAllTables();
    //LoadLeagueTable();
});

$('#lstCountry').change(function(){  
       //LoadSubCategory();
       LoadLeagueTable();
   }).trigger('change');

function LoadAllTables(){ 
   $.ajax({
            type:"POST",
            url:"../admin/home_controller/loadAllTables",
            dataType:"text",
            //data: {contry: contry},
            cache:false,
            success:function (data) {
                LoadAllTables_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   }); 
}

function LoadAllTables_Complete(data){
     var sRes = JSON.parse(data);
     $("#lstCountry").html("");
     if(sRes.Category != null || sRes.Category != "" ){
        var listCate =  sRes.Category;
        var str = "";
        //str = str + "<option value="">Please choose</option>";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].CountryName +"</option>";      
        } 
        $("#lstCountry").html(str);
        LoadLeagueTable();
     }
}

function LoadLeagueTable(){ 
   var Category = $("#lstCountry").val();
   $.ajax({
            type:"POST",
            url:"../admin/home_controller/loadLeagueTable",
            dataType:"text",
            data: {Category: Category},
            cache:false,
            success:function (data) {
                LoadLeagueTable_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   }); 
}

function LoadLeagueTable_Complete(data){
     var sRes = JSON.parse(data);
     $("#lstLeague").html("");
     if(sRes.SubCate != null || sRes.SubCate != "" )
     {
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].League +"</option>";      
        } 
        $("#lstLeague").html(str);
     }
}

function get_data_by_txtdate(txtdate)
{
    //var sechoose        =   $( "#sechoose" ).val();
   //  $.ajax({
   //          type:"POST",
   //          url: "../admin/homeld_controller/get_data_by_txtdate",
   //          dataType:"text",
   //          data: {
   //                  txtdate         :   txtdate,
   //                  //sechoose        :   sechoose
   //          },
   //          cache:false,
   //          success:function (data) {
   //              get_data_by_txtdate_Complete(data);
   //          },
   //          error: function () { alert("Error!");}
   // });
}

function ConvertAll()
{
    var content = $('#ContentConvert').val();
    var str = "";
    if(content != "")
    {
        var lines = content.split("\n");
        var sodong = lines.length;
        $("#load_listtable").html("");
        if(sodong > 0)
        {
            str =  str + "<tr>";
            str = str + "<td>Pos</td><td>Team</td><td>P</td><td>W</td><td>D</td><td>L</td><td>F</td><td>A</td><td>GD</td><td>Pts</td>";
            str = str + "<td>FI</td><td>Y</td><td>R</td><td>Sh</td><td>ShT</td>";
            str = str + "</tr>";
            for(var i=0;i<sodong;i+=15)
            {
               str = str + "<tr>";
               str =  str + "<td>"+lines[i]+"</td>";
               str =  str + "<td>"+lines[i+1]+"</td>";
               str =  str + "<td>"+lines[i+2]+"</td>";
               str =  str + "<td>"+lines[i+3]+"</td>";
               str =  str + "<td>"+lines[i+4]+"</td>";
               str =  str + "<td>"+lines[i+5]+"</td>";
               str =  str + "<td>"+lines[i+6]+"</td>";
               str =  str + "<td>"+lines[i+7]+"</td>";
               str =  str + "<td>"+lines[i+8]+"</td>";
               str =  str + "<td>"+lines[i+9]+"</td>";
               str =  str + "<td>"+lines[i+10]+"</td>";
               str =  str + "<td>"+lines[i+11]+"</td>";
               str =  str + "<td>"+lines[i+12]+"</td>";
               str =  str + "<td>"+lines[i+13]+"</td>";
               str =  str + "<td>"+lines[i+14]+"</td>";
               str = str + "</tr>";
            }

            $("#load_listtable").append(str);
            $("#sp_tbl").text("Convert Success");
        }
    }
    else
    {
        alert("Please input content");
    }
}

function SaveAll()
{
  var l_table = $("#load_listtable tr").length;
  var ch_league = $("#lstLeague").val();
  var ch_venue  = $("#lstVenue").val();
  var ch_season = $("#lstSeason").val();
  var txday     = $("#txtdate").val();
  if(l_table > 1)
  {
     var list = [];
     var i = 0;
     while(i < l_table-1)
     {
          var league  = {};
          league.Pos  = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(0)").html();
          league.Team = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(1)").html();
          league.P    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(2)").html();
          league.W    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(3)").html();
          league.D    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(4)").html();
          league.L    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(5)").html();
          league.F    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(6)").html();
          league.A    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(7)").html();
          league.GD   = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(8)").html();
          league.Pts  = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(9)").html();
          league.Fi   = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(10)").html();
          league.Y    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(11)").html();
          league.R    = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(12)").html();
          league.Sh   = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(13)").html();
          league.ShT = $("#load_listtable tbody tr:eq("+(i+1)+") td:eq(14)").html();
          list[i] = league;
          i = i+1;
     }

     $.ajax({
             url: "../admin/home_controller/savetabledetail",
             type: "POST",
             data:{ league: JSON.stringify(list),
                    cho_league: ch_league,
                    venue:ch_venue,
                    season:ch_season,
                    txday:txday
                    },
              dataType:"text",
              success:function(data){
                  SaveAll_Complete(data);
              },
              error:function(){alert("Error!")}

     });
  }
}

function SaveAll_Complete(data)
{
    var sRes = JSON.parse(data);
    var tb = sRes.result;
    $("#sp_tbl").text("");
    if(tb == 1 || tb == "1")
    {
      $("#sp_tbl").text("Save Success");
    }
}