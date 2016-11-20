$(document).ready(function() {
	$('#sectionres').hide();
	$('#btnClearRR').bind("click",function(){
        $("#txtNo1").val("");
        $("#txtNo2").val("");
        $("#txtNo3").val("");
        $("#txtNo4").val("");
        $("#txtLengh1").val("");
        $("#txtLengh2").val("");
        $("#txtLengh3").val("");
        $("#txtLength4").val(""); 
        $("#txtWin1").val("");
        $("#txtPlace1").val("");
        $("#txtPlace2").val("");
        $("#txtPlace3").val("");
        $("#txtPlace4").val("");
        $("#txtWin1_s").val("");
        $("#txtPlace1_s").val("");
        $("#txtPlace2_s").val("");
        $("#txtPlace3_s").val("");
        $("#txtPlace4_s").val("");
        $("#txtTiming").val("");
        $("#txtForeCase").val("");
        $("#txtForeCase1").val("");
        $("#txtForeCase2").val("");
        $("#txtQPS").val("");
        $("#txtQPS1").val("");
        $("#txtQPS2").val("");
        $("#txtQPS3").val("");
        $("#txtQPS4").val("");
        $("#txtQPS5").val("");
        $("#txtQPS6").val("");
        $("#txtQPS7").val("");
        $("#txtQPS8").val("");
        $("#txtTiere").val("");
        $("#txtTiere1").val("");
       $("#txtTiere2").val("");
       $("#txtTrio").val("");
       $("#txtTrio1").val("");
       $("#txtTrio2").val("");
       $("#txtQuartet").val("");
       $("#txtQuartet1").val("");
       $("#txtQuartet2").val("");
       $("#txtQuadro").val("");
       $("#txtQuadro1").val("");
       $("#txtQuadro2").val("");
   }); 

 $('#btnResult_Cancel').bind("click",function(){
      //document.location.href = "race_result";
      $('#showlistRaceResult').hide();
      $("#sectionres").hide();
   });
	
});



function SaveResult_detail()
{
    var RaceCardId = $("#RaceCariD").text();
   
    var WinNo1 = $("#txtNo1").val();
    var WinNo2 = $("#txtNo2").val();
    var WinNo3 = $("#txtNo3").val();
    var WinNo4 = $("#txtNo4").val();
   
    var WinBy1 = $("#txtLengh1").val();
    var WinBy2 = $("#txtLengh2").val();
    var WinBy3 = $("#txtLengh3").val();
    var WinBy4 = $("#txtLength4").val();
    
    var WinMal = $("#txtWin1").val();
    var PlaceMal = $("#txtPlace1").val();
    var PlaceMal2 = $("#txtPlace2").val();
    var PlaceMal3 = $("#txtPlace3").val();
    var PlaceMal4 = $("#txtPlace4").val();
    var WinSin = $("#txtWin1_s").val();
    var PlaceSin = $("#txtPlace1_s").val();
    var PlaceSin2 = $("#txtPlace2_s").val();
    var PlaceSin3 = $("#txtPlace3_s").val();
    var PlaceSin4 = $("#txtPlace4_s").val();
    
    var Timing   = $("#txtTiming").val();
    var ForeCase = $("#txtForeCase").val();
    var ForeCase1 = $("#txtForeCase1").val();
    var ForeCase2 = $("#txtForeCase2").val();
    var QPS     = $("#txtQPS").val();
    var QPS1   = $("#txtQPS1").val();
    var QPS2  = $("#txtQPS2").val();
    var QPS3 = $("#txtQPS3").val();
    var QPS4 = $("#txtQPS4").val();
    var QPS5 = $("#txtQPS5").val();
    var QPS6 = $("#txtQPS6").val();
    var QPS7 = $("#txtQPS7").val();
    var QPS8 = $("#txtQPS8").val();
    var Tiere = $("#txtTiere").val();
    var Tiere1 =  $("#txtTiere1").val();
    var Tiere2 = $("#txtTiere2").val();
    var Trio = $("#txtTrio").val();
    var Trio1 = $("#txtTrio1").val();
    var Trio2 = $("#txtTrio2").val();
    var Quartet = $("#txtQuartet").val();
    var Quartet1 = $("#txtQuartet1").val();
    var Quartet2 = $("#txtQuartet2").val();
    var Quadro  = $("#txtQuadro").val();
    var Quadro1 = $("#txtQuadro1").val();
    var Quadro2 = $("#txtQuadro2").val();
   
    $.ajax({
            type:"POST",
            url: "home_controller/SaveRaceResultDetail",
            dataType:"text",
            data: {RaceCardID: RaceCardId,
                    //Country: Country,
                    WinNo1:WinNo1,
                    WinNo2:WinNo2,
                    WinNo3:WinNo3,
                    WinNo4:WinNo4,
                    WinBy1:WinBy1,
                    WinBy2:WinBy2,
                    WinBy3:WinBy3,
                    WinBy4:WinBy4,
                    WinMal:WinMal,
                    PlaceMal:PlaceMal,
                    PlaceMal2:PlaceMal2,
                    PlaceMal3:PlaceMal3,
                    PlaceMal4:PlaceMal4,
                    WinSin:WinSin,
                    PlaceSin:PlaceSin,
                    PlaceSin2:PlaceSin2,
                    PlaceSin3:PlaceSin3,
                    PlaceSin4:PlaceSin4,
                    Timing:Timing,
                    ForeCase:ForeCase,
                    ForeCase1:ForeCase1,
                    ForeCase2:ForeCase2,
                    QPS:QPS,
                    QPS1:QPS1,
                    QPS2:QPS2,
                    QPS3:QPS3,
                    QPS4:QPS4,
                    QPS5:QPS5,
                    QPS6:QPS6,
                    QPS7:QPS7,
                    QPS8:QPS8,
                    Tiere:Tiere,
                    Tiere1:Tiere1,
                    Tiere2:Tiere2,
                    Trio:Trio,
                    Trio1:Trio1,
                    Trio2:Trio2,
                    Quartet:Quartet,
                    Quartet1:Quartet1,
                    Quartet2:Quartet2,
                    Quadro:Quadro,
                    Quadro1:Quadro1,
                    Quadro2:Quadro2
                    
                },
            cache:false,
            success:function (data) {
                    SaveResult_detail_Complete(data);
            }
   }); 
}

function SaveResult_detail_Complete(data)
{
  var sRes = JSON.parse(data);
  if(sRes.result == 1 ||  sRes.result == "1")
  {
      //UpdateStatusRaceCardID(sRes.RaceCardId);
      socket.emit('PageRefresh', 'RefreshResult');
      $('#showlistRaceResult').hide();
      $("#sectionres").hide();
      
  }
  // update status for race card id about close 
  //document.location.href = "race_result";
}

function  UpdateStatusRaceCardID(RaceID)
{
    $.ajax({
            type:"POST",
            url:"home_controller/updateStatusRaceCard",
            dataType:"text",
            data: {RaceID: RaceID},
            cache:false,
            success:function (data) {
                UpdateStauts_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function UpdateStauts_Complete(data)
{
  var sRes = JSON.parse(data);
  if(sRes.rkq == 1 || sRes.rkq == "1")
  {
      document.location.href = "race_result";
  }
}

