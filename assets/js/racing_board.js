var CounterHandle_timer;
var CounterHandle_MY;
var CounterHandle_SG;
var CounterHandle_HK;
var CounterHandle_MC;
var CounterHandle_SA;
var CounterHandle_AU;
var CounterHandle_EU;
var Set_Interval_MY;
var Set_Interval_SG;
var Set_Interval_HK;
var Set_Interval_MC;
var Set_Interval_SA;
var Set_Interval_AU;
var Set_Interval_EU;
var datahaverace_MY = 0;
var datahaverace_SG = 0;
var datahaverace_HK = 0;
var datahaverace_MC = 0;
var datahaverace_SA = 0;
var datahaverace_AU = 0;
var datahaverace_EU = 0;
var run_time = 0;
var _country = "";
$(document).ready(function() 
{
   //console.log($.cookie("_country"));
    $("#txtHeader2").change(function(){    
            var text =  $("#txtHeader2").val();
            text = text.replace("Net Tic","网出票").replace("Et","早票 ")
            $("#txtHeader2Man").val(text);
        });
       $("#txtHeader2Man").change(function(){    
            var text =  $("#txtHeader2Man").val();
            text = text.replace("网出票","Net Tic").replace("早票 ","Et")
            $("#txtHeader2").val(text);
        });
   if(typeof $.cookie("_country") != undefined || $.cookie("_country") != "")
   { 
      $('#cmbRace option[value='+ $.cookie("_country") +']').attr('selected','selected');
   }
   
   // load category
    LoadCategory();
   // end load category
   // change commbox all going, internet pice , 
    $('#cmbCat1').change(function()
    {
       var cat = $(this).val();  
       LoadSub(cat);
   }).trigger('change');

    $('#cmbCat2').change(function()
    { 
       var cat1 = $(this).val(); 
       //LoadSubCategory1();
       LoadSub1(cat1);
    }).trigger('change');

    $('#cmbCat3').change(function(){  
      var cat2 = $(this).val();
       //LoadSubCategory2();
       LoadSub2(cat2);
   }).trigger('change');

    $('#cmbCat4').change(function(){ 
      var cat3 = $(this).val(); 
      LoadSub3(cat3);
       //LoadSubCategory3();
   }).trigger('change');
   // end change combox all going, internet pirce , where to , time 00

   $('#btnCancel').bind("click",function()
   {
      document.location.href = "race_result";
   });

   // btnClear
   //btnClearRR
   $('#btnClear_Hearder').bind("click",function(){
        $("#txtHeader1").val("");
        $("#txtHeader2").val("");
        $("#txtHeader3").val("");
        $("#txtHeader4").val("");
        $("#txtHeader1Man").val("");
        $("#txtHeader2Man").val("");
        $("#txtHeader3Man").val("");
        $("#txtHeader4Man").val("");

   });
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
  $('#cmbRace').change(function()
  {
        var cmbRace = $("#cmbRace").val();
        $.cookie("_country",cmbRace);

        if(cmbRace == "MY" ){
            $("#txtCountry").val("MALAYSIA");
        }
        if(cmbRace == "SG" ){
            $("#txtCountry").val("SINGAPORE");
        }
        if(cmbRace == "HK" ){
            $("#txtCountry").val("HONG KONG");
        }
        if(cmbRace == "MC" ){
           $("#txtCountry").val("Ma Cau"); 
        }
        
        if(cmbRace == "SA" ){
            $("#txtCountry").val("S Afica");
        } 
        if(cmbRace == "AU" ){
            $("#txtCountry").val("Australia");
        } 
        
        if(cmbRace == "EU" ){
            $("#txtCountry").val("Europe");
        } 
        
        LoadListRaceCardIDChange();
        //LoadListRaceInfoChange();   
     }).trigger('change');
     
     
    $('#cmbRaceCardID').change(function(){  
       LoadListRaceInfoChange();
       // kiem soat so con ngua ở race card 
       EnalButtonWinner();

   }).trigger('change');
    //loadRaceCard();
    
     $("#txtHeader1").keypress(function (event) {
          if (event.which == 13) {
              SaveDetail1234();  
          }
     });
     
     $("#txtHeader2").keypress(function (event) {
          if (event.which == 13) {
              SaveDetail1234();  
          }
     });
     $("#txtHeader3").keypress(function (event) {
          if (event.which == 13) {
              SaveDetail1234();  
          }
     });
     $("#txtHeader4").keypress(function (event) {
          if (event.which == 13) {
              SaveDetail1234();  
          }
     });
     // auto highlight
      
     
      $('#txtHeader1').click(function() 
      {
          $(this).addClass('borderrace');
          $('#txtHeader2').removeClass('borderrace');
          $('#txtHeader3').removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');
      });


      $('#txtHeader2').click(function() 
      {
          $(this).addClass('borderrace');
          $('#txtHeader1').removeClass('borderrace');
          $('#txtHeader3').removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');

      });

      $('#txtHeader3').click(function() {
          $(this).addClass('borderrace');
          $("#txtHeader1").removeClass('borderrace');
          $('#txtHeader2').removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');
      });

      $('#txtHeader4').click(function() {
          $(this).addClass('borderrace');
          $("#txtHeader3").removeClass('borderrace');
          $("#txtHeader1").removeClass('borderrace');
          $('#txtHeader2').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');

      });
      $('#txtHeader1Man').click(function() {
          $(this).addClass('borderrace');
          $("#txtHeader1").removeClass('borderrace'); 
          $('#txtHeader2').removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader3").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');
        });
      $('#txtHeader2Man').click(function() 
      {
          $(this).addClass('borderrace');
          $("#txtHeader1").removeClass('borderrace'); 
          $('#txtHeader2').removeClass('borderrace');
          $("#txtHeader3").removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');
      });

      $('#txtHeader3Man').click(function() 
      {
          $(this).addClass('borderrace');
          $("#txtHeader1").removeClass('borderrace'); 
          $('#txtHeader2').removeClass('borderrace');
          $("#txtHeader3").removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader4Man").removeClass('borderrace');
      });
      $('#txtHeader4Man').click(function() {
          $(this).addClass('borderrace');  
          $("#txtHeader1").removeClass('borderrace'); 
          $('#txtHeader2').removeClass('borderrace');
          $("#txtHeader3").removeClass('borderrace');
          $('#txtHeader4').removeClass('borderrace');
          $("#txtHeader1Man").removeClass('borderrace');
          $("#txtHeader2Man").removeClass('borderrace');
          $("#txtHeader3Man").removeClass('borderrace');
      });
      
     $("#txtWinNo").keypress(function (event) {
          if (event.which == 13) {
               RacingSave();  
          }
     });

     $("#txtWinNo2").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     }); 

     $("#txtWinNo3").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     });

     $("#txtWinNo4").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     }); 
     //txtWinBy1 ,  txtWinBy2 , txtWinBy3 , txtWinBy4

     $("#txtWinBy1").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     }); 

     $("#txtWinBy2").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     }); 

     $("#txtWinBy3").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     });


     $("#txtWinBy4").keypress(function (event) {
          if (event.which == 13) {
              RacingSave();  
          }
     });
});

 

function LoadItem()
{
  if($('#c_header1').is(':checked'))
  {

  }
  else
  {
      var txt_yellow_cn = $("#lstItem").val();
      $.ajax({
              type:"POST",
              url:"home_controller/loadsubItem",
              dataType:"text",
              data: {Item: txt_yellow_cn},
              cache:false,
              success:function (data) {
                  LoadsubItem_Complete(data);
              },
              error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
     });
   }  
}

function LoadsubItem_Complete(data)
{
   var sRes = JSON.parse(data);
   var enCont = "";
   var cnCont = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      if(ItemDetail.length > 0)
      {
           enCont = ItemDetail[0].enCont;
           cnCont = ItemDetail[0].cnCont;
           $("#txtHeader1").val(enCont);
           $("#txtHeader1Man").val(cnCont);
      }
   }
}

function LoadItem3()
{
   var txt_purple_cn = $("#lstItem3").val();
   $.ajax({
            type:"POST",
            url:"home_controller/loadsubItem",
            dataType:"text",
            data: {Item: txt_purple_cn},
            cache:false,
            success:function (data) {
                LoadsubItem_Complete3(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });  
}

function LoadsubItem_Complete3(data)
{
   var sRes = JSON.parse(data);
   var enCont = "";
   var cnCont = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      if(ItemDetail.length > 0)
      {
           enCont = ItemDetail[0].enCont;
           cnCont = ItemDetail[0].cnCont;
           $("#txtHeader3").val(enCont);
           $("#txtHeader3Man").val(cnCont);
      }
   }
}

function LoadItem2()
{
  if($('#c_header2').is(':checked'))
  {}
  else
  {
     var txt_green_cn = $("#lstItem2").val();
     $.ajax({
              type:"POST",
              url:"home_controller/loadsubItem",
              dataType:"text",
              data: {Item: txt_green_cn},
              cache:false,
              success:function (data) {
                  LoadsubItem_Complete2(data);
              },
              error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
     }); 
  }   
}

function LoadsubItem_Complete2(data)
{
   var sRes = JSON.parse(data);
   var enCont = "";
   var cnCont = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      if(ItemDetail.length > 0)
      {
           enCont = ItemDetail[0].enCont;
           cnCont = ItemDetail[0].cnCont;
           $("#txtHeader2").val(enCont);
           $("#txtHeader2Man").val(cnCont);
      }
   }
}

function LoadItem4()
{
   //var txt_green_en = $('select[name=ItemName4] option:selected').text();
   var txt_green_cn = $("#lstItem4").val();
   //$("#txtHeader4").val(txt_green_en);
   //$("#txtHeader4Man").val(txt_green_cn); 
   $.ajax({
            type:"POST",
            url:"home_controller/loadsubItem",
            dataType:"text",
            data: {Item: txt_green_cn},
            cache:false,
            success:function (data) {
                LoadsubItem_Complete4(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });  
}

function LoadsubItem_Complete4(data)
{
   var sRes = JSON.parse(data);
   var enCont = "";
   var cnCont = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      if(ItemDetail.length > 0)
      {
           enCont = ItemDetail[0].enCont;
           cnCont = ItemDetail[0].cnCont;
           $("#txtHeader4").val(enCont);
           $("#txtHeader4Man").val(cnCont);
      }
   }
}

function Refresh()
{
   console.log($.cookie("_country"));
   document.location.href = "race_info";
}

function ClickAdd()
{
    var yellow = $('select[name=ItemName] option:selected').text();
    var yellow_cn = $('#lstItem').val();
    var gree   = $('select[name=ItemName2] option:selected').text();
    var green_cn = $("#lstItem2").val();
     $.ajax({
            type:"POST",
            url:"home_controller/loadBothsubItem",
            dataType:"text",
            data: {Item: yellow_cn,
                   Item1: green_cn },
            cache:false,
            success:function (data) {
                LoadBothsubItem_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });  
    // var value = yellow + " " + gree;
    // var value_cn  = yellow_cn + " " + green_cn;
    // $('#txtHeader4').val(value);
    // $('#txtHeader4Man').val(value_cn);
}

function LoadBothsubItem_Complete(data)
{
   var sRes = JSON.parse(data);
   var enCont = "";
   var cnCont = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      var ItemDetail1 = sRes.ItemDetail1;
      if(ItemDetail.length > 0 && ItemDetail1.length >0)
      {
           enCont = ItemDetail[0].enCont;
           cnCont = ItemDetail[0].cnCont;
           enCont1 = ItemDetail1[0].enCont;
           cnCont1 = ItemDetail1[0].cnCont;
           var value = enCont + " " + enCont1;
           var value_cn  = cnCont + " " + cnCont1;
           $("#txtHeader4").val(value);
           $("#txtHeader4Man").val(value_cn);
      }
   }
}


function RacingSave(){
   var WinNo1 = $("#txtWinNo").val();
   var WinNo2 = $("#txtWinNo2").val();
   var WinNo3 = $("#txtWinNo3").val();
   var WinNo4 = $("#txtWinNo4").val();
   var valueheader2 = "";
   var valueheader3 = "";
   if(WinNo1 != ""){
       valueheader2 = "RM-";
       valueheader3 = "$-";
   }
   if(WinNo2 != ""){
         WinNo2 = "-" + WinNo2;
         valueheader2 = "RM--";
         valueheader3 = "$--";
   }
   if(WinNo3 != ""){
        WinNo3 = "-" + WinNo3;
        valueheader2 = "RM--";
        valueheader3 = "$--";
   }
   if(WinNo4 != ""){
        WinNo4 = "-" + WinNo4;
        valueheader2 = "RM--";
        valueheader3 = "$--";
   }
        
   var value =  "Winner No: " + WinNo1  + WinNo2  + WinNo3  + WinNo4;
   
   $('#txtHeader1').val(value);
   $('#txtHeader1Man').val(value);
   $('#txtHeader2').val(valueheader2);
   $('#txtHeader3').val(valueheader3);
   $('#txtHeader2Man').val(valueheader2);
   $('#txtHeader3Man').val(valueheader3);
   
   var WinBy1 = $("#txtWinBy1").val();
   var WinBy2 = $("#txtWinBy2").val();
   var WinBy3 = $("#txtWinBy3").val();
   var WinBy4 = $("#txtWinBy4").val();
   
   // chinese
   var Unit1_cn  = $("#cmbUnit1").val();
   var Unit2_cn  = $("#cmbUnit2").val();
   var Unit3_cn  = $("#cmbUnit3").val();
   var Unit4_cn  = $("#cmbUnit4").val();
   
   // english
   var Unit1     = $('select[name=cmbUnit1] option:selected').text();
   var Unit2     = $('select[name=cmbUnit2] option:selected').text();
   var Unit3     = $('select[name=cmbUnit3] option:selected').text();
   var Unit4     = $('select[name=cmbUnit4] option:selected').text();

   // chinese
   var winby_unit_1 = "";
   var winby_unit_2 = "";
   var  winby_unit_3 = "";
   var winby_unit_4  = "";
   // english
   var winby_unit_1_en = "";
   var winby_unit_2_en = "";
   var  winby_unit_3_en = "";
   var winby_unit_4_en  = "";

   if(WinBy1 != "" && Unit1_cn != ""){
      winby_unit_1    = WinBy1 + " " + Unit1_cn + "**";
      winby_unit_1_en = WinBy1 + " " + Unit1 + "**";
   }
       
   if(WinBy1 == "" && Unit1_cn  != ""){
      winby_unit_1    =   Unit1_cn + "**" ;
      winby_unit_1_en =   Unit1 + "**" ;
   }
      
   if(WinBy1 != "" && Unit1_cn == ""){
      winby_unit_1    = WinBy1 + "**" ;
      winby_unit_1_en = WinBy1  + "**";
   }
      
   if(WinBy2 != "" && Unit2_cn != ""){
      winby_unit_2    =   WinBy2 + " " + Unit2_cn + "**";
      winby_unit_2_en =   WinBy2 + " " + Unit2  + "**";
   }
        

    if(WinBy2 != "" && Unit2_cn == ""){
        winby_unit_2    =   WinBy2 + "**" ;
        winby_unit_2_en =   WinBy2 + "**" ;
    }
        

    if(WinBy2 == "" && Unit2_cn != ""){
        winby_unit_2    =   Unit2_cn  + "**";
        winby_unit_2_en =  Unit2  + "**";
    }
        

   if(WinBy3 != "" && Unit3_cn != ""){
      winby_unit_3    =   WinBy3 + " " + Unit3_cn + "**";
      winby_unit_3_en =   WinBy3 + " " + Unit3  + "**";
   }
        
    if(WinBy3 != "" && Unit3_cn == ""){
        winby_unit_3 =   WinBy3 + "**";
        winby_unit_3_en =  WinBy3 + "**";
    }
        
    if(WinBy3 == "" && Unit3_cn != ""){
      winby_unit_3    =   Unit3_cn + "**";
      winby_unit_3_en =   Unit3 + "**";
    }
        

    if(WinBy4 != "" && Unit4_cn != ""){
      winby_unit_4 =   WinBy4 + " " + Unit4_cn ;
      winby_unit_4_en =  WinBy4 + " " + Unit4 ;
    }
        
    if(WinBy4 != "" && Unit4_cn == ""){
      winby_unit_4    =   WinBy4  ;
      winby_unit_4_en =   WinBy4 ;
    }
        
    if(WinBy4 == "" && Unit4_cn != ""){
        winby_unit_4 =    Unit4_cn ;
        winby_unit_4_en = Unit4 ;
    }
        
   
   var vauleWinBy = winby_unit_1 +  winby_unit_2  + winby_unit_3  + winby_unit_4;
   var vauleWinBy_en  = winby_unit_1_en  + winby_unit_2_en  + winby_unit_3_en  + winby_unit_4_en;
   $('#txtHeader4').val(vauleWinBy_en);
   $('#txtHeader4Man').val(vauleWinBy);
   saveRaceInfo1(); 
   
}



function ClearRacing()
{
     var country    = $("#cmbRace").val();
     var RaceCardID = $("#cmbRaceCardID").val();
     var WinNo1 =  $("#txtWinNo").val("");
     var WinNo2 =  $("#txtWinNo2").val("");
     var WinNo3 =  $("#txtWinNo3").val("");
     var WinNo4 =  $("#txtWinNo4").val("");
     var WinBy1 =  $("#txtWinBy1").val("");
     var WinBy2 =  $("#txtWinBy2").val("");
     var WinBy3 =  $("#txtWinBy3").val("");
     var WinBy4 =  $("#txtWinBy4").val("");
     var Unit1  =  $("#cmbUnit1").val("");
     var Unit2  =  $("#cmbUnit2").val("");
     var Unit3  =  $("#cmbUnit3").val("");
     var Unit4  =  $("#cmbUnit4").val("");
     $("#cmbUnit1").find('option:selected').removeAttr("selected");
     $("#cmbUnit2").find('option:selected').removeAttr("selected");
     $("#cmbUnit3").find('option:selected').removeAttr("selected");
     $("#cmbUnit4").find('option:selected').removeAttr("selected");

     $.ajax({
            type:"POST",
            url:"home_controller/UpdateHorseInfoRuning1234",
            dataType:"text",
            data: {
                country: country,
                RaceCardID:RaceCardID
            },
            cache:false,
            success:function (data) {
                //loadRaceCard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}


function LoadListRaceCardIDChange(){
  var contry = $("#cmbRace").val();
  //var RaceCardID = $("#cmbRaceCardID").val();
   $.ajax({
            type:"POST",
            url:"home_controller/loadRCID",
            dataType:"text",
            data: {contry: contry},
            cache:false,
            success:function (data) {
                loadRaceCard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function LoadListRaceInfoChange(){
    var contry = $("#cmbRace").val();
    var RaceCardID = $("#cmbRaceCardID").val();
   $.ajax({
            type:"POST",
            url:"home_controller/loadRaceInfo",
            dataType:"text",
            data: {
                    contry: contry,
                    RaceCardID:RaceCardID
                  },
            cache:false,
            success:function (data) {
                loadRaceInfo_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });
}


function loadRaceInfo_Complete(data){
    var sRes = JSON.parse(data);
     if(sRes.RaceInfo != null || sRes.RaceInfo !=""){
         var info = sRes.RaceInfo;
         if(info.length > 0){
             $("#txtHeader1").val(info[0].items1en);
             $("#txtHeader2").val(info[0].items2en);
             if(info[0].items3en != "RM  () () ()")
            {
                $("#txtHeader3").val(info[0].items3en);  
                $("#txtHeader3Man").val(info[0].items3cn);
            }
            else
            {
                $("#txtHeader3").val("");  
                $("#txtHeader3Man").val("");
            }              
            if(info[0].items4en != "$  () () ()")
            {
                $("#txtHeader4").val(info[0].items4en);
                $("#txtHeader4Man").val(info[0].items4cn);
            }
            else
            {
                $("#txtHeader4").val(""); 
                $("#txtHeader4Man").val("");
            }
             $("#txtHeader1Man").val(info[0].items1cn);
             $("#txtHeader2Man").val(info[0].items2cn);            
             
             // internet ticket price
             $("#txtIT").val(info[0].ITPH2); 
             $("#txtET").val(info[0].ITPET);            
             var itph3 = info[0].ITPH3;              
             if(itph3 != null && itph3 != "")
             {                      
                 var  itph3_edit = itph3.split('|');
                 
                 $("#txtIT1").val(itph3_edit[0]);
                 $("#txtITP1").val(itph3_edit[1]);
             } 
             
             var itph5 = info[0].ITPH5;
             if(itph5 !== null && itph5 != ""){
                 itph5    = itph5.split('|');
                 $("#txtIT2").val(itph5[0]);
                 $("#txtITP2").val(itph5[1]);
             }
              
             
             var  itph4 = info[0].ITPH4;
             if(itph4 !== null && itph4 != "")
             {
                 itph4  = itph4.split('|');
                 $("#txtIT3").val(itph4[0]);
                 $("#txtITP3").val(itph4[1]);
             }
            
             var  itph6 = info[0].ITPH6;
             if(itph6 !== null && itph6 !="")
             {
                 itph6  = itph6.split('|');
                 $("#txtIT4").val(itph6[0]);
                 $("#txtITP4").val(itph6[1]); 
             }  

             // winner horser
             var WinNo1     = info[0].win1A;
             var WinNo_1P   = info[0].win1P;
             var WinNo2     = info[0].win2A;
             var WinNo_2P   = info[0].win2P;
             var WinNo3     = info[0].win3A;
             var WinNo_3P   = info[0].win3P;
             var WinNo4     = info[0].win4A;
             var WinNo_4P   = info[0].win4P;
             
             if(WinNo1 != null && WinNo1 != ""){
                 WinNo1 = WinNo1.split("|");
                 $("#txtWinNo").val(WinNo1[0]);
                 $("#txtWinBy1").val(WinNo1[1]);
             } 
             
             if(WinNo2 != null && WinNo2 !=""){
                 WinNo2 = WinNo2.split("|");
                 $("#txtWinNo2").val(WinNo2[0]);
                 $("#txtWinBy2").val(WinNo2[1]);
             }
             
             if(WinNo3 != null && WinNo3 !=""){
                 WinNo3 = WinNo3.split("|");
                 $("#txtWinNo3").val(WinNo3[0]);
                 $("#txtWinBy3").val(WinNo3[1]);
             }
             
             if(WinNo4 != null && WinNo4 != ""){
                 WinNo4 = WinNo4.split("|");
                 $("#txtWinNo4").val(WinNo4[0]);
                 $("#txtWinBy4").val(WinNo4[1]);
             }
             
             
             $("#cmbUnit1 option[value='"+WinNo_1P+"']").attr("selected", "selected");
             $("#cmbUnit2 option[value='"+WinNo_2P+"']").attr("selected", "selected");
             $("#cmbUnit3 option[value='"+WinNo_3P+"']").attr("selected", "selected");
             $("#cmbUnit4 option[value='"+WinNo_4P+"']").attr("selected", "selected");
             //$("#txtHeader1").val(" ");
         }
     }
     if(sRes.RaceInfo == null || sRes.RaceInfo == ""){
         $("#txtWinNo").val("");
         $("#txtWinNo2").val("");
         $("#txtWinNo3").val("");
         $("#txtWinNo4").val("");
         $("#txtWinBy1").val("");
         $("#txtWinBy2").val("");
         $("#txtWinBy3").val("");
         $("#txtWinBy4").val("");
         $("#cmbUnit1").find('option:selected').removeAttr("selected");
         $("#cmbUnit2").find('option:selected').removeAttr("selected");
         $("#cmbUnit3").find('option:selected').removeAttr("selected");
         $("#cmbUnit4").find('option:selected').removeAttr("selected"); 
         
         $("#txtHeader1").val(" ");
         $("#txtHeader2").val(" ");
         $("#txtHeader3").val(" ");
         $("#txtHeader4").val(" ");
         $("#txtHeader1Man").val(" ");
         $("#txtHeader2Man").val(" ");
         $("#txtHeader3Man").val(" ");
         $("#txtHeader4Man").val(" ");
     }
}


//function loadRaceCard(){
    //var RaceCountry = $("#ChooseCountry").val();
//    $.ajax({
//            type:"POST",
//            url:"home_controller/loadlistRaceCard",
//            dataType:"text",
            //data: {},
//            cache:false,
//            success:function (data) {
//                loadRaceCard_Complete(data);
//            },
//            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
//   });   
//}

function loadRaceCard_Complete(data)
{
     var sRes = JSON.parse(data);
     if(sRes.RCID != null || sRes.RCID != "" )
     {
        var listRCID =  sRes.RCID;         
      
        var str = "";
        for(var i = 0;i < listRCID.length ; i++){
             if(listRCID[i].Meter != null && listRCID[i].Meter != ""){  
                str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID+"M"+listRCID[i].Meter +"</option>"; 
            }
            else {
              str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID +"</option>";   
            } 
           // str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID +"</option>";      
        } 
        $("#cmbRaceCardID").html(str);
        LoadListRaceInfoChange();
     }
}

// button Save header 1,2,3,4
function SaveDetail1234(){
  // phan header 
    var items1en = $("#txtHeader1").val();
    var items1cn = $("#txtHeader1Man").val();
    var items2en = $("#txtHeader2").val();
    var items2cn = $("#txtHeader2Man").val();
    var items3en = $("#txtHeader3").val();
    var items3cn = $("#txtHeader3Man").val();
    var items4en = $("#txtHeader4").val();
    var items4cn = $("#txtHeader4Man").val();
    var Race     = $("#cmbRace").val();
    var Country  = $("#txtCountry").val();
    var RaceID   = $("#cmbRaceCardID").val();
    var list_1234 = [];
    if(RaceID != "")
    {
        var item = {
                      header1:items1en,
                      header2:items2en,
                      header3:items3en,
                      header4:items4en,
                      headercn1:items1cn,
                      headercn2:items2cn,
                      headercn3:items3cn,
                      headercn4:items4cn
                   };
        list_1234[0] = item;        
        $.ajax({
                type:"POST",
                url:"home_controller/saveRaceInfo2",
                dataType:"text",
                data: {
                       Race:Race,
                       Country:Country,
                       RaceID:RaceID,
                       items1en:items1en,
                       items1cn:items1cn,
                       items2en:items2en,
                       items2cn:items2cn,
                       items3en:items3en,
                       items3cn:items3cn,
                       items4en:items4en,
                       items4cn:items4cn

                },
                cache:false,
                success:function (data) {
                    saveRaceInfo2_Complete(data,JSON.stringify(list_1234));
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       }); 
    }
    else
    {
        alert("Race Card ID haven't. Please choose or creaded Race Card");
    }
}

function saveRaceInfo2_Complete(data,list_info)
{
   LoadListRaceInfoChange();
   var country = $("#cmbRace").val();
   var sRes = JSON.parse(data);
   if(sRes.result == 1 || sRes.result == "1")
   {
       var items1en = sRes.header1;
       var items2en = sRes.header2;
       var items3en = sRes.header3;
       var items4en = sRes.header4;
       var items1cn = sRes.header1_cn;
       var items2cn = sRes.header2_cn;
       var items3cn = sRes.header3_cn;
       var items4cn = sRes.header4_cn;
       var trans = {};
          trans.header1 = items1en;
          trans.header2 = items2en;
          trans.header3 = items3en;
          trans.header4 = items4en;
          trans.header1_cn = items1cn;
          trans.header2_cn = items2cn;
          trans.header3_cn = items3cn;
          trans.header4_cn = items4cn;
     console.log(trans);
     var Rel = country + "|" + JSON.stringify(trans); 
     socket_race.emit('RefreshRaceInfo_1234', Rel);
   }
}
// end button Save header 1,2,3,4

// button Save for winner no 1,2,3,4
function saveRaceInfo1()
{
  // phan header 
    var items1en = $("#txtHeader1").val();
    var items1cn = $("#txtHeader1Man").val();
    var items2en = $("#txtHeader2").val();
    var items2cn = $("#txtHeader2Man").val();
    var items3en = $("#txtHeader3").val();
    var items3cn = $("#txtHeader3Man").val();
    var items4en = $("#txtHeader4").val();
    var items4cn = $("#txtHeader4Man").val();
    var Race     = $("#cmbRace").val();
    var Country  = $("#txtCountry").val();
    var RaceID   = $("#cmbRaceCardID").val();

  // winner no 1,2,3,4 
     var winNo1     = $("#txtWinNo").val();
      console.log(winNo1);
     var winText1   =  $("#txtWinBy1").val();
     console.log(winText1);
     var Win_No1 = winNo1 + "|" + winText1;
     console.log(Win_No1);
     var Unit1      = $("#cmbUnit1").val();
     
     var winNo2     = $("#txtWinNo2").val();
     console.log(winNo2);
     var winText2   = $("#txtWinBy2").val();
     console.log(winText2);
     var Win_No2    = winNo2 + "|" + winText2;
     console.log(Win_No2);
     var Unit2      = $("#cmbUnit2").val();
     
     var winNo3     =   $("#txtWinNo3").val();
     var wintText3  =   $("#txtWinBy3").val();
     var Win_No3    =   winNo3 + "|" + wintText3;
     var Unit3      =   $("#cmbUnit3").val();
     
     var winNo4    = $("#txtWinNo4").val();
     var winText4  = $("#txtWinBy4").val();
     var Win_No4   = winNo4 + "|" + winText4;
     var Unit4     = $("#cmbUnit4").val();

     if(RaceID != "")
     {
         $.ajax({
                type:"POST",
                url:"home_controller/saveRaceInfo1",
                dataType:"text",
                data: {
                       Race:Race,
                       Country:Country,
                       RaceID:RaceID,
                       items1en:items1en,
                       items1cn:items1cn,
                       items2en:items2en,
                       items2cn:items2cn,
                       items3en:items3en,
                       items3cn:items3cn,
                       items4en:items4en,
                       items4cn:items4cn,
                       Win_No1:Win_No1,
                       Unit1:Unit1,
                       Win_No2:Win_No2,
                       Unit2:Unit2,
                       Win_No3:Win_No3,
                       Unit3:Unit3,
                       Win_No4:Win_No4,
                       Unit4:Unit4,
                       winNo1:winNo1,
                       winNo2:winNo2,
                       winNo3:winNo3,
                       winNo4:winNo4
                },
                cache:false,
                success:function (data) {
                    saveRaceInfo1_Complete(data);
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       });
    }
    else
    {

    } 

}
function saveRaceInfo1_Complete(data)
{
  LoadListRaceInfoChange();
  var country = $("#cmbRace").val();
  var sRes = JSON.parse(data);
  var result = sRes.result;

  //var list_info = [];
  if(result == 1 || result == "1")
  {
     var items1en = sRes.header1;
     var items2en = sRes.header2;
     var items3en = sRes.header3;
     var items4en = sRes.header4;
     var items1cn = sRes.header1_cn;
     var items2cn = sRes.header2_cn;
     var items3cn = sRes.header3_cn;
     var items4cn = sRes.header4_cn;
     var trans = {};
          trans.header1 = items1en;
          trans.header2 = items2en;
          trans.header3 = items3en;
          trans.header4 = items4en;
          trans.header1_cn = items1cn;
          trans.header2_cn = items2cn;
          trans.header3_cn = items3cn;
          trans.header4_cn = items4cn;
    var Rel = country + "|" +  JSON.stringify(trans);
    console.log(trans);
    socket_race.emit('RefreshRaceInfo_1234', Rel);
  }
}
// end button Save for winner no 1,2,3,4
function saveRaceInfo3(list_info){
    // phan header 
    var items1en;
    var items1cn;
    if($("#ch_header1").is(":checked"))
    {
        items1en = "";
        items1cn = "";
    }
    else
    {
        items1en = $("#txtHeader1").val();
        items1cn = $("#txtHeader1Man").val();
    }
    var items2en = $("#txtHeader2").val();
    var items2cn = $("#txtHeader2Man").val();
    var items3en = $("#txtHeader3").val();
    var items3cn = $("#txtHeader3Man").val();
    var items4en = $("#txtHeader4").val();
    var items4cn = $("#txtHeader4Man").val();
    var Race     = $("#cmbRace").val();
    var Country  = $("#txtCountry").val();
    var RaceID   = $("#cmbRaceCardID").val();
    var list_info3 = [];
    var item = {
                      header1:items1en,
                      header2:items2en,
                      header3:items3en,
                      header4:items4en,
                      headercn1:items1cn,
                      headercn2:items2cn,
                      headercn3:items3cn,
                      headercn4:items4cn
                   };
    list_info3[0] = item;

    // internet Ticket Price
     var itemIT_2 = $("#txtIT").val();
     var itemET_2 = $("#txtET").val();
     var itemIT_3_1 = $("#txtIT1").val();
     var itemIT_3_2 = $("#txtITP1").val(); 
     var itemET_3_1 = $("#txtIT2").val();
     var itemET_3_2 = $("#txtITP2").val();
     var itemIT_4_1 = $("#txtIT3").val();
     var itemIT_4_2 = $("#txtITP3").val();
     var itemET_4_1 = $("#txtIT4").val();
     var itemET_4_2 = $("#txtITP4").val();
     var ITPH3      = itemIT_3_1 + "|" + itemIT_3_2;
     var ITPH4      = itemIT_4_1 + "|" + itemIT_4_2;
     var ITPH5      = itemET_3_1 + "|" + itemET_3_2;
     var ITPH6      = itemET_4_1 + "|"  + itemET_4_2;

     if(RaceID != "")
     {
           $.ajax({
                  type:"POST",
                  url:"home_controller/saveRaceInfo3",
                  dataType:"text",
                  data: {
                         Race:Race,
                         Country:Country,
                         RaceID:RaceID,
                         items1en:items1en,
                         items1cn:items1cn,
                         items2en:items2en,
                         items2cn:items2cn,
                         items3en:items3en,
                         items3cn:items3cn,
                         items4en:items4en,
                         items4cn:items4cn,
                         itemIT_2:itemIT_2,
                         itemET_2:itemET_2,
                         ITPH3:ITPH3,
                         ITPH4:ITPH4,
                         ITPH5:ITPH5,
                         ITPH6:ITPH6

                  },
                  cache:false,
                  success:function (data) {
                      saveRaceInfo3_Complete(data,JSON.stringify(list_info3));
                  },
                  error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
          });
      }
      else
      {

      } 
}

function saveRaceInfo3_Complete(data,list_info)
{
  LoadListRaceInfoChange();
  var country = $("#cmbRace").val();
  var sRes = JSON.parse(data);
  var result = sRes.result;
  if(result == 1 || result == "1")
  {
       var items1en = sRes.header1;
       var items2en = sRes.header2;
       var items3en = sRes.header3;
       var items4en = sRes.header4;
       var items1cn = sRes.header1_cn;
       var items2cn = sRes.header2_cn;
       var items3cn = sRes.header3_cn;
       var items4cn = sRes.header4_cn;
       var trans = {};
          trans.header1 = items1en;
          trans.header2 = items2en;
          trans.header3 = items3en;
          trans.header4 = items4en;
          trans.header1_cn = items1cn;
          trans.header2_cn = items2cn;
          trans.header3_cn = items3cn;
          trans.header4_cn = items4cn;
          console.log(trans);
      var Rel  = country + "|" + JSON.stringify(trans);
      socket_race.emit('RefreshRaceInfo_1234', Rel);
  }
  
}
// end update inter 
function SaveRaceInfo()
{
    
    // phan header 
    var items1en = $("#txtHeader1").val();
    var items1cn = $("#txtHeader1Man").val();
    var items2en = $("#txtHeader2").val();
    var items2cn = $("#txtHeader2Man").val();
    var items3en = $("#txtHeader3").val();
    var items3cn = $("#txtHeader3Man").val();
    var items4en = $("#txtHeader4").val();
    var items4cn = $("#txtHeader4Man").val();
    var Race     = $("#cmbRace").val();
    var Country  = $("#txtCountry").val();
    var RaceID   = $("#cmbRaceCardID").val();
    
    // phần win 
     var winNo1     = $("#txtWinNo").val();
      console.log(winNo1);
     var winText1   =  $("#txtWinBy1").val();
     console.log(winText1);
     var Win_No1 = winNo1 + "|" + winText1;
     console.log(Win_No1);
     var Unit1      = $("#cmbUnit1").val();
     
     var winNo2     = $("#txtWinNo2").val();
     console.log(winNo2);
     var winText2   = $("#txtWinBy2").val();
     console.log(winText2);
     var Win_No2    = winNo2 + "|" + winText2;
     console.log(Win_No2);
     var Unit2      = $("#cmbUnit2").val();
     
     var winNo3     =   $("#txtWinNo3").val();
     var wintText3  =   $("#txtWinBy3").val();
     var Win_No3    =   winNo3 + "|" + wintText3;
     var Unit3      =   $("#cmbUnit3").val();
     
     var winNo4    = $("#txtWinNo4").val();
     var winText4  = $("#txtWinBy4").val();
     var Win_No4   = winNo4 + "|" + winText4;
     var Unit4     = $("#cmbUnit4").val();
     
     // internet Ticket Price
     var itemIT_2 = $("#txtIT").val();
     var itemET_2 = $("#txtET").val();
     var itemIT_3_1 = $("#txtIT1").val();
     var itemIT_3_2 = $("#txtITP1").val(); 
     var itemET_3_1 = $("#txtIT2").val();
     var itemET_3_2 = $("#txtITP2").val();
     var itemIT_4_1 = $("#txtIT3").val();
     var itemIT_4_2 = $("#txtITP3").val();
     var itemET_4_1 = $("#txtIT4").val();
     var itemET_4_2 = $("#txtITP4").val();
     var ITPH3      = itemIT_3_1 + "|" + itemIT_3_2;
     var ITPH4      = itemIT_4_1 + "|" + itemIT_4_2;
     var ITPH5      = itemET_3_1 + "|" + itemET_3_2;
     var ITPH6      = itemET_4_1 + "|"  + itemET_4_2; 
  
  if(RaceID != "")
  {  
        $.ajax({
                type:"POST",
                url:"home_controller/saveRaceInfo",
                dataType:"text",
                data: {
                       Race:Race,
                       Country:Country,
                       RaceID:RaceID,
                       items1en:items1en,
                       items1cn:items1cn,
                       items2en:items2en,
                       items2cn:items2cn,
                       items3en:items3en,
                       items3cn:items3cn,
                       items4en:items4en,
                       items4cn:items4cn,
                       Win_No1:Win_No1,
                       Unit1:Unit1,
                       Win_No2:Win_No2,
                       Unit2:Unit2,
                       Win_No3:Win_No3,
                       Unit3:Unit3,
                       Win_No4:Win_No4,
                       Unit4:Unit4,
                       itemIT_2:itemIT_2,
                       itemET_2:itemET_2,
                       ITPH3:ITPH3,
                       ITPH4:ITPH4,
                       ITPH5:ITPH5,
                       ITPH6:ITPH6,
                       winNo1:winNo1,
                       winNo2:winNo2,
                       winNo3:winNo3,
                       winNo4:winNo4

                },
                cache:false,
                success:function (data) {
                    saveRaceInfo_Complete(data);
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       }); 
  }
  else
  {

  } 
}

function saveRaceInfo_Complete(data)
{
    var country = $("#cmbRace").val();
    var sRes  = JSON.parse(data);
    var result = sRes.result;
    if(result == 1 || result == "1")
    {
        var items1en = sRes.header1;
       var items2en = sRes.header2;
       var items3en = sRes.header3;
       var items4en = sRes.header4;
       var items1cn = sRes.header1_cn;
       var items2cn = sRes.header2_cn;
       var items3cn = sRes.header3_cn;
       var items4cn = sRes.header4_cn;
       var trans = {};
          trans.header1 = items1en;
          trans.header2 = items2en;
          trans.header3 = items3en;
          trans.header4 = items4en;
          trans.header1_cn = items1cn;
          trans.header2_cn = items2cn;
          trans.header3_cn = items3cn;
          trans.header4_cn = items4cn;
            console.log(trans);
        var rel = country + "|" + JSON.stringify(trans);
        socket_race.emit('RefreshRaceInfo_1234', trans);
    }
}

function StartTime()
{
    var starttime = $("#txtMin").val();
    var Race     = $("#cmbRace").val();
    var value     = Race + "|" + starttime;
    socket_race.emit('StartTime', value); 
    var timer = parseFloat(starttime*60); 
}

function saveTimeCountry_Complete(data)
{
    if(data == 1)
    {
       socket_race.emit('ReloadPage','ReloadPage');
    }
}
//

function StopTime(){
    var Race     = $("#cmbRace").val();
    var value  = Race + "|stoptime";
    switch(Race)
    {
          case "MY": clearInterval(Set_Interval_MY);
          case "SG": clearInterval(Set_Interval_SG);
          case "HK": clearInterval(Set_Interval_HK);
          case "MC": clearInterval(Set_Interval_MC);
          case "SA": clearInterval(Set_Interval_SA);
          case "EU": clearInterval(Set_Interval_EU);
          case "AU": clearInterval(Set_Interval_AU);
    }
    // $.ajax({
    //         type:"POST",
    //         url:"home_controller/StopTimeCountry",
    //         dataType:"text",
    //         data: {
    //                   country : Race,
    //               },
    //         cache:false,
    //         success:function (data) {
    //             //StopTimeCountry_Complete(data);
    //         },
    //         error: function () { alert("Error!"); $("body").removeClass("loading");}
    //       });
       
    socket_race.emit('StopTime', value);
}


// load content combox
function InputAllSet() {
    document.getElementById("txtHeader1").value = "All set standby for racing";
    document.getElementById("txtHeader1Man").value = "马已入完闸准备开跑";
    SaveDetail1234();

}

function InputNoPhoto() {
    document.getElementById("txtHeader4").value = "Photo No";
    document.getElementById("txtHeader4Man").value = "拍照No";
    SaveDetail1234();
}

function InputDislodge() {
    document.getElementById("txtHeader4").value = "Dislodge jockey No";
    document.getElementById("txtHeader4Man").value = "骑師墮马No ";
    SaveDetail1234();
}

function InputRacing() {
    if($("#cmbRace").val()=="MY")
    {
        document.getElementById("txtHeader1").value = "Mal Horse racing";
        document.getElementById("txtHeader1Man").value = "马来西亚,跑马";
    }
    if($("#cmbRace").val()=="SG")
    {
        document.getElementById("txtHeader1").value = "Sin Horse racing";
        document.getElementById("txtHeader1Man").value = "新加坡,跑马";
    }
    if($("#cmbRace").val()=="HK")
    {
        document.getElementById("txtHeader1").value = "HK  Horse racing";
        document.getElementById("txtHeader1Man").value = "香港,跑马";
    }
    if($("#cmbRace").val()=="MC")
    {
        document.getElementById("txtHeader1").value = "Macau   Horse racing";
        document.getElementById("txtHeader1Man").value = "澳门,跑马";
    }    
    SaveDetail1234();
}
function InputStartUp() {
    if($("#cmbRace").val()=="MY")
    {
        document.getElementById("txtHeader1").value = "Mal Starters Up";
        document.getElementById("txtHeader1Man").value = "马来西亚, 马入闸";
    }
    if($("#cmbRace").val()=="SG")
    {
        document.getElementById("txtHeader1").value = "Sin Starters Up";
        document.getElementById("txtHeader1Man").value = "新加坡, 马入闸";
    }
    if($("#cmbRace").val()=="HK")
    {
        document.getElementById("txtHeader1").value = "HK Starters Up";
        document.getElementById("txtHeader1Man").value = "香港, 马入闸";
    }
    if($("#cmbRace").val()=="MC")
    {
        document.getElementById("txtHeader1").value = "Macau Starters Up";
        document.getElementById("txtHeader1Man").value = "澳门, 马入闸" ;
    }    
    SaveDetail1234();
}

function Input2400() {
    document.getElementById("txtHeader1").value = "2400";
    document.getElementById("txtHeader1Man").value = "2400";
    SaveDetail1234();
}
function Input2200() {
    document.getElementById("txtHeader1").value = "2200";
    document.getElementById("txtHeader1Man").value = "2200";
    SaveDetail1234();
}
function Input2000() {
    document.getElementById("txtHeader1").value = "2000";
    document.getElementById("txtHeader1Man").value = "2000";
    SaveDetail1234();
}
function Input1800() {
    document.getElementById("txtHeader1").value = "1800";
    document.getElementById("txtHeader1Man").value = "1800";
    SaveDetail1234();
}
function Input1600() {
    document.getElementById("txtHeader1").value = "1600";
    document.getElementById("txtHeader1Man").value = "1600";
    SaveDetail1234();
}
function Input1400() {
    document.getElementById("txtHeader1").value = "1400";
    document.getElementById("txtHeader1Man").value = "1400";
    SaveDetail1234();
}
function Input1200() {
    document.getElementById("txtHeader1").value = "1200";
    document.getElementById("txtHeader1Man").value = "1200";
    SaveDetail1234();
}
function Input1000() {
    document.getElementById("txtHeader1").value = "1000";
    document.getElementById("txtHeader1Man").value = "1000";
    SaveDetail1234();
}
function Input800() {
    document.getElementById("txtHeader1").value = "800";
    document.getElementById("txtHeader1Man").value = "800";
    SaveDetail1234();
}
function Input600() {
    document.getElementById("txtHeader1").value = "600";
    document.getElementById("txtHeader1Man").value = "600";
    SaveDetail1234();
}
function Input400() {
    document.getElementById("txtHeader1").value = "400";
    document.getElementById("txtHeader1Man").value = "400";
    SaveDetail1234();
}
function Input200() {
    document.getElementById("txtHeader1").value = "200";
    document.getElementById("txtHeader1Man").value = "200";
    SaveDetail1234();
}
function Input100() {
    document.getElementById("txtHeader1").value = "100";
    document.getElementById("txtHeader1Man").value = "100";
    SaveDetail1234();
}
function Input50() {
    document.getElementById("txtHeader1").value = "50";
    document.getElementById("txtHeader1Man").value = "50";
    SaveDetail1234();
}
function Input1() {
    document.getElementById("txtHeader1").value +=  "-1";
    document.getElementById("txtHeader1Man").value +=  "-1";
     //SaveDetail1234();
     // thêm phần hỗ trợ
     SaveSupportWinnerNo(01);
     // end phần hỗ trợ
}
function Input2() 
{
    document.getElementById("txtHeader1").value += "-2";
    document.getElementById("txtHeader1Man").value +=  "-2";
    SaveSupportWinnerNo(02);
    //SaveDetail1234();
}
function Input3() {
    document.getElementById("txtHeader1").value += "-3";
    document.getElementById("txtHeader1Man").value +=  "-3";
    SaveSupportWinnerNo(03);
    //SaveDetail1234();
}
function Input4() {
    document.getElementById("txtHeader1").value += "-4";
    document.getElementById("txtHeader1Man").value +=  "-4";
    SaveSupportWinnerNo(04);
    //SaveDetail1234();
}
function Input5() {
    document.getElementById("txtHeader1").value += "-5";
    document.getElementById("txtHeader1Man").value +=  "-5";
    //SaveDetail1234();
    SaveSupportWinnerNo(05);
}
function Input6() {
    document.getElementById("txtHeader1").value += "-6";
    document.getElementById("txtHeader1Man").value +=  "-6";
    SaveSupportWinnerNo(06);
    //SaveDetail1234();
}
function Input7() {
    document.getElementById("txtHeader1").value += "-7";
    document.getElementById("txtHeader1Man").value +=  "-7";
    SaveSupportWinnerNo(07);
    //SaveDetail1234();
}
function Input8() {
    document.getElementById("txtHeader1").value += "-8";
    document.getElementById("txtHeader1Man").value +=  "-8";
    SaveSupportWinnerNo(08);
    //SaveDetail1234();
}
function Input9() {
    document.getElementById("txtHeader1").value += "-9";
    document.getElementById("txtHeader1Man").value +=  "-9";
    SaveSupportWinnerNo(09);
    //SaveDetail1234();
}
function Input10() {
    document.getElementById("txtHeader1").value += "-10";
    document.getElementById("txtHeader1Man").value +=  "-10";
    //SaveDetail1234();
    SaveSupportWinnerNo(10);
}
function Input11() {
    document.getElementById("txtHeader1").value += "-11";
    document.getElementById("txtHeader1Man").value +=  "-11";
    //SaveDetail1234();
    SaveSupportWinnerNo(11);
}
function Input12() {
    document.getElementById("txtHeader1").value += "-12";
    document.getElementById("txtHeader1Man").value +=  "-12";
    SaveSupportWinnerNo(12);
    //SaveDetail1234();
}
function Input13() {
    document.getElementById("txtHeader1").value += "-13";
    document.getElementById("txtHeader1Man").value +=  "-13";
    //SaveDetail1234();
    SaveSupportWinnerNo(13);
}
function Input14() {
    document.getElementById("txtHeader1").value += "-14";
    document.getElementById("txtHeader1Man").value +=  "-14";
    //SaveDetail1234();
    SaveSupportWinnerNo(14);
}
function Input15() {
    document.getElementById("txtHeader1").value += "-15";
    document.getElementById("txtHeader1Man").value +=  "-15";
    //SaveDetail1234();
    SaveSupportWinnerNo(15);
}
function Input16() {
    document.getElementById("txtHeader1").value += "-16";
    document.getElementById("txtHeader1Man").value +=  "-16";
    //SaveDetail1234();
    SaveSupportWinnerNo(16);
}
function Input17() {
    document.getElementById("txtHeader1").value += "-17";
    document.getElementById("txtHeader1Man").value +=  "-17";
    SaveSupportWinnerNo(17);
    //SaveDetail1234();
}
function Input18() {
    document.getElementById("txtHeader1").value += "-18";
    document.getElementById("txtHeader1Man").value +=  "-18";
    SaveSupportWinnerNo(18);
    //SaveDetail1234();
}
function Input19() {
    document.getElementById("txtHeader1").value += "-19";
    document.getElementById("txtHeader1Man").value +=  "-19";
    //SaveDetail1234();
    SaveSupportWinnerNo(19);
}

function Input20() {
    document.getElementById("txtHeader1").value += "-20";
    document.getElementById("txtHeader1Man").value +=  "-20";
    SaveSupportWinnerNo(20);
    //SaveDetail1234();
}

// for winner no : 1, winner no : 2 , winner no: 3, winner no: 4, winner no: 5, winner no: 6
function InputWinNo1() 
{
    document.getElementById("txtHeader1").value = "Winner No: 1";
    document.getElementById("txtHeader1Man").value =  "1号马胜出";
    SaveWinNo(01);
    // insert into 1st and 2nd and 3
    //SaveDetail1234();
}

function InputWinNo2()
{
  document.getElementById("txtHeader1").value = "Winner No: 2";
  document.getElementById("txtHeader1Man").value =  "2号马胜出";
  SaveWinNo(02);
}

function InputWinNo3()
{
  document.getElementById("txtHeader1").value = "Winner No: 3";
  document.getElementById("txtHeader1Man").value =  "3号马胜出";
  SaveWinNo(03);
}

function InputWinNo4()
{
  document.getElementById("txtHeader1").value = "Winner No: 4";
  document.getElementById("txtHeader1Man").value =  "4号马胜出";
  SaveWinNo(04);
}

function InputWinNo5()
{
  document.getElementById("txtHeader1").value = "Winner No: 5";
  document.getElementById("txtHeader1Man").value =  "5号马胜出";
  SaveWinNo(05);
}

function InputWinNo6()
{
  document.getElementById("txtHeader1").value = "Winner No: 6";
  document.getElementById("txtHeader1Man").value =  "6号马胜出";
  SaveWinNo(06);
}

function InputWinNo7()
{
  document.getElementById("txtHeader1").value = "Winner No: 7";
  document.getElementById("txtHeader1Man").value =  "7号马胜出";
  SaveWinNo(07);
}

function InputWinNo8()
{
  document.getElementById("txtHeader1").value = "Winner No: 8";
  document.getElementById("txtHeader1Man").value =  "8号马胜出";
  SaveWinNo(08);
}



function InputWinNo9()
{
  document.getElementById("txtHeader1").value = "Winner No: 9";
  document.getElementById("txtHeader1Man").value =  "9号马胜出";
  SaveWinNo(09);
}

function InputWinNo10()
{
  document.getElementById("txtHeader1").value = "Winner No: 10";
  document.getElementById("txtHeader1Man").value =  "10号马胜出";
  SaveWinNo(10);
}

function InputWinNo11()
{
  document.getElementById("txtHeader1").value = "Winner No: 11";
  document.getElementById("txtHeader1Man").value =  "11号马胜出";
  SaveWinNo(11);
}

function InputWinNo12()
{
  document.getElementById("txtHeader1").value = "Winner No: 12";
  document.getElementById("txtHeader1Man").value =  "12号马胜出";
  SaveWinNo(12);
}

function InputWinNo13()
{
  document.getElementById("txtHeader1").value = "Winner No: 13";
  document.getElementById("txtHeader1Man").value =  "13号马胜出";
  SaveWinNo(13);
}

function InputWinNo14()
{
  document.getElementById("txtHeader1").value = "Winner No: 14";
  document.getElementById("txtHeader1Man").value =  "14号马胜出";
  SaveWinNo(14);
}

function InputWinNo15()
{
  document.getElementById("txtHeader1").value = "Winner No: 15";
  document.getElementById("txtHeader1Man").value =  "15号马胜出";
  SaveWinNo(15);
}

function InputWinNo16()
{
  document.getElementById("txtHeader1").value = "Winner No: 16";
  document.getElementById("txtHeader1Man").value =  "16号马胜出";
  SaveWinNo(16);
}

function InputWinNo17()
{
  document.getElementById("txtHeader1").value = "Winner No: 17";
  document.getElementById("txtHeader1Man").value =  "17号马胜出";
  SaveWinNo(17);
}

function InputWinNo18()
{
  document.getElementById("txtHeader1").value = "Winner No: 18";
  document.getElementById("txtHeader1Man").value =  "18号马胜出";
  SaveWinNo(18);
}

function InputWinNo19()
{
  document.getElementById("txtHeader1").value = "Winner No: 19";
  document.getElementById("txtHeader1Man").value =  "19号马胜出";
  SaveWinNo(19);
}

function InputWinNo20()
{
  document.getElementById("txtHeader1").value = "Winner No: 20";
  document.getElementById("txtHeader1Man").value =  "20号马胜出";
  SaveWinNo(20);
}


// find man hinh Race Card
function GotoRaceCard(){
   var RaceCardID = $("#cmbRaceCardID").val();
   if(RaceCardID != "")
   {
       $.ajax({
                type:"POST",
                url: "home_controller/GotoRaceCard",
                dataType:"json",
                data: {RaceCardID: RaceCardID},
                cache:false,
                success:function (data) {
                        GotoRaceCard_Complete(data);
                }
       });
    } 
}

function ConfirmResult()
{
    var RaceCardId = $("#cmbRaceCardID").val();
    var Country    = $("#cmbRace").val();
    var WinNo1 = $("#txtWinNo").val();
    var WinNo2 = $("#txtWinNo2").val();
    var WinNo3 = $("#txtWinNo3").val();
    var WinNo4 = $("#txtWinNo4").val();
   
    var WinBy1 = $("#txtWinBy1").val();
    var WinBy2 = $("#txtWinBy2").val();
    var WinBy3 = $("#txtWinBy3").val();
    var WinBy4 = $("#txtWinBy4").val();
   
    var Unit1  = $('select[name=cmbUnit1] option:selected').text();
    var Unit1_cn = $("#cmbUnit1").val();
    var Unit2  = $('select[name=cmbUnit2] option:selected').text();
    var Unit2_cn = $("#cmbUnit2").val();
    var Unit3  = $('select[name=cmbUnit3] option:selected').text();
    var Unit3_cn  = $("#cmbUnit3").val();
    var Unit4  = $('select[name=cmbUnit4] option:selected').text();
    var Unit4_cn = $("#cmbUnit4").val();
    
    if(RaceCardId != "")
    {
        $.ajax({
                type:"POST",
                url: "home_controller/SaveRaceResult",
                dataType:"json",
                data: {RaceCardID: RaceCardId,
                        Country: Country,
                        WinNo1:WinNo1,
                        WinNo2:WinNo2,
                        WinNo3:WinNo3,
                        WinNo4:WinNo4,
                        WinBy1:WinBy1,
                        WinBy2:WinBy2,
                        WinBy3:WinBy3,
                        WinBy4:WinBy4,
                        Unit1:Unit1,
                        Unit1_cn:Unit1_cn,
                        Unit2:Unit2,
                        Unit2_cn:Unit2_cn,
                        Unit3:Unit3,
                        Unit3_cn:Unit3_cn,
                        Unit4:Unit4,
                        Unit4_cn:Unit4_cn  
                    },
                cache:false,
                success:function (data) {
                        SaveRaceResult_Complete(data);
                }
       });
    } 
}

function SaveRaceResult_Complete(data)
{
    
    LoadListRaceResult();
}

function LoadListRaceResult(){
    var RaceCardID = $("#cmbRaceCardID").val();
      $.ajax({
              type:"POST",
              url: "home_controller/LoadListRaceResult",
              dataType:"text",
              data: {RaceCardID: RaceCardID},
              cache:false,
              success:function (data) {
                      LoadListRaceResult_Complete(data);
              }
     }); 
}  

function LoadListRaceResult_Complete(data){
    var sRes = JSON.parse(data);
     if(sRes.RaceResult != null || sRes.RaceResult != "" ){
         var RaceResult = sRes.RaceResult;
         if(RaceResult.length > 0){
             var RaceCardID = RaceResult[0].RaceCardId;
             var FirstHorse = RaceResult[0].FirstHorse;
             var FirstLength = RaceResult[0].FirstLength;
             var SecondHorse = RaceResult[0].SecondHorse;
             var SecondLength = RaceResult[0].SecondLength;
             var ThirdHorse = RaceResult[0].ThirdHorse;
             var Thirdlength = RaceResult[0].Thirdlength;
             var FourthHorse = RaceResult[0].FourthHorse;
             var FourthLength = RaceResult[0].FourthLength;
             // mal
             var FirstWin    = RaceResult[0].FirstWin;
                 FirstWin    = FirstWin.replace(".00","");
             if(FirstWin == -1 || FirstWin == "-1")
                FirstWin = "SCR";
            if(FirstWin == 0 || FirstWin == "0"){
                FirstWin = "";
            } 
             var FirstPlace  = RaceResult[0].FirstPlace;
                  FirstPlace = FirstPlace.replace(".00","");
            if(FirstPlace == -1 || FirstPlace == "-1")
                FirstPlace = "SCR";
            if(FirstPlace == 0 || FirstPlace == "0"){
                FirstPlace = "";
            }      
             var SecondWin   = RaceResult[0].SecondWin;
             SecondWin = SecondWin.replace(".00","");
            if(SecondWin == -1 || SecondWin == "-1")
                SecondWin = "SCR";
            if(SecondWin == 0 || SecondWin == "0"){
                SecondWin = "";
            }      
             var SecondPlace   = RaceResult[0].SecondPlace;
             SecondPlace = SecondPlace.replace(".00","");
            if(SecondPlace == -1 || SecondPlace == "-1")
                SecondPlace = "SCR";
            if(SecondPlace == 0 || SecondPlace == "0"){
                SecondPlace = "";
            }    
             var ThirdWin   = RaceResult[0].ThirdWin;
             ThirdWin = ThirdWin.replace(".00","");
            if(ThirdWin == -1 || ThirdWin == "-1")
                ThirdWin = "SCR";
            if(ThirdWin == 0 || ThirdWin == "0"){
                ThirdWin = "";
            }    
             var ThirdPlace   = RaceResult[0].ThirdPlace;
             ThirdPlace = ThirdPlace.replace(".00","");
            if(ThirdPlace == -1 || ThirdPlace == "-1")
                ThirdPlace = "SCR";
            if(ThirdPlace == 0 || ThirdPlace == "0"){
                ThirdPlace = "";
            }    
             var FourthWin   = RaceResult[0].FourthWin;
             FourthWin = FourthWin.replace(".00","");
            if(FourthWin == -1 || FourthWin == "-1")
                FourthWin = "SCR";
            if(FourthWin == 0 || FourthWin == "0"){
                FourthWin = "";
            }    
            var FourthPlace   = RaceResult[0].FourthPlace;
             FourthPlace = FourthPlace.replace(".00","");
            if(FourthPlace == -1 || FourthPlace == "-1")
                FourthPlace = "SCR";
            if(FourthPlace == 0 || FourthPlace == "0"){
                FourthPlace = "";
            }
            
            var Forecast2_mal     = RaceResult[0].Forecast2;
            var QPS12_mal         = RaceResult[0].QPS12;
            var QPS22_mal         = RaceResult[0].QPS22;
            var QPS32_mal         = RaceResult[0].QPS32;
            var Tiere_mal         = RaceResult[0].Tierce2;
            var Trio1_mal         = RaceResult[0].Trio2;
            var Quartet2_mal       = RaceResult[0].Quartet2;
            var Quadro2_mal        = RaceResult[0].Quadro2;
            var Quadro            = RaceResult[0].Quadro1;
            var Quarte            = RaceResult[0].Quartet1;
            var Forcecaset1       = RaceResult[0].Forecast1;
            var showQPS1          = RaceResult[0].QPS11;
            var showQPS21          = RaceResult[0].QPS21;
            var showQPS31          = RaceResult[0].QPS31;
            var showTierce1        = RaceResult[0].Tierce1;
            var showTrio1          = RaceResult[0].Trio1;

            // phần chung cho race sesult
            $("#txtForeCase").val(Forcecaset1);
            $("#txtQPS").val(showQPS1);
            $("#txtQPS3").val(showQPS21);
            $("#txtQPS6").val(showQPS31);
            $("#txtTiere").val(showTierce1);
            $("#txtTrio").val(showTrio1);
            $("#txtQuartet").val(Quarte);
            $("#txtQuadro").val(Quadro);
            //end 
            $("#txtForeCase1").val(Forecast2_mal);
            $("#txtQPS1").val(QPS12_mal);
            $("#txtQPS4").val(QPS22_mal);
            $("#txtQPS7").val(QPS32_mal);
            $("#txtTiere1").val(Tiere_mal);
            $("#txtTrio1").val(Trio1_mal);
            $("#txtQuartet1").val(Quartet2_mal);
            $("#txtQuadro1").val(Quadro2_mal);
            
             // sin
             var FirstWin_s    = RaceResult[1].FirstWin;
             FirstWin_s = FirstWin_s.replace(".00","");
            if(FirstWin_s == -1 || FirstWin_s == "-1")
                FirstWin_s = "SCR";
            if(FirstWin_s == 0 || FirstWin_s == "0"){
                FirstWin_s = "";
            }    
             var FirstPlace_s  = RaceResult[1].FirstPlace;
             FirstPlace_s = FirstPlace_s.replace(".00","");
            if(FirstPlace_s == -1 || FirstPlace_s == "-1")
                FirstPlace_s = "SCR";
            if(FirstPlace_s == 0 || FirstPlace_s == "0"){
                FirstPlace_s = "";
            }    
             var SecondWin_s   = RaceResult[1].SecondWin;
             SecondWin_s = SecondWin_s.replace(".00","");
            if(SecondWin_s == -1 || SecondWin_s == "-1")
                SecondWin_s = "SCR";
            if(SecondWin_s == 0 || SecondWin_s == "0"){
                SecondWin_s = "";
            }    
             var SecondPlace_s   = RaceResult[1].SecondPlace;
             SecondPlace_s = SecondPlace_s.replace(".00","");
            if(SecondPlace_s == -1 || SecondPlace_s == "-1")
                SecondPlace_s = "SCR";
            if(SecondPlace_s == 0 || SecondPlace_s == "0"){
                SecondPlace_s = "";
            }    
             var ThirdWin_s   = RaceResult[1].ThirdWin;
             ThirdWin_s = ThirdWin_s.replace(".00","");
            if(ThirdWin_s == -1 || ThirdWin_s == "-1")
                ThirdWin_s = "SCR";
            if(ThirdWin_s == 0 || ThirdWin_s == "0"){
                ThirdWin_s = "";
            }    
            var ThirdPlace_s   = RaceResult[1].ThirdPlace;
            ThirdPlace_s = ThirdPlace_s.replace(".00","");
            if(ThirdPlace_s == -1 || ThirdPlace_s == "-1")
                ThirdPlace_s = "SCR";
            if(ThirdPlace_s == 0 || ThirdPlace_s == "0"){
                ThirdPlace_s = "";
            }    
             var FourthWin_s   = RaceResult[1].FourthWin;
             FourthWin_s = FourthWin_s.replace(".00","");
            if(FourthWin_s == -1 || FourthWin_s == "-1")
                FourthWin_s = "SCR";
            if(FourthWin_s == 0 || FourthWin_s == "0"){
                FourthWin_s = "";
            }    
             var FourthPlace_s   = RaceResult[1].FourthPlace;
            FourthPlace_s = FourthPlace_s.replace(".00","");
            if(FourthPlace_s == -1 || FourthPlace_s == "-1")
                FourthPlace_s = "SCR";
            if(FourthPlace_s == 0 || FourthPlace_s == "0"){
                FourthPlace_s = "";
            }

            var Forecast2_sin     = RaceResult[1].Forecast2;
            var QPS12_sin         = RaceResult[1].QPS12;
            var QPS22_sin         = RaceResult[1].QPS22;
            var QPS32_sin         = RaceResult[1].QPS32;
            var Tiere_sin         = RaceResult[1].Tierce2;
            var Trio1_sin         = RaceResult[1].Trio2;
            var Quartet_sin       = RaceResult[1].Quartet2;
            var Quadro_sin        = RaceResult[1].Quadro2;
            $("#txtForeCase2").val(Forecast2_sin);
            $("#txtQPS2").val(QPS12_sin);
            $("#txtQPS5").val(QPS22_sin);
            $("#txtQPS8").val(QPS32_sin);
            $("#txtTiere2").val(Tiere_sin);
            $("#txtTrio2").val(Trio1_sin);
            $("#txtQuartet2").val(Quartet_sin);
            $("#txtQuadro2").val(Quadro_sin);

            
            $("#RaceCariD").text(RaceCardID);
            $("#txtNo1").val(FirstHorse);
            $("#txtLengh1").val(FirstLength);
            $("#txtWin1").val("RM " + FirstWin);
            $("#txtPlace1").val("RM " + FirstPlace);
            $("#txtWin1_s").val("$ " + FirstWin_s);
            $("#txtPlace1_s").val("$ " + FirstPlace_s);
            
            $("#txtNo2").val(SecondHorse);
            $("#txtLengh2").val(SecondLength);
            //$("#txtWin1").val("RM " + FirstWin);
            $("#txtPlace2").val("RM " + SecondPlace);
            //$("#txtWin2_s").val("$ " + SecondWin_s);
            $("#txtPlace2_s").val("$ " + SecondPlace_s);
            
            $("#txtNo3").val(ThirdHorse);
            $("#txtLengh3").val(Thirdlength);
            //$("#txtWin1").val("RM " + FirstWin);
            $("#txtPlace3").val("RM " + ThirdPlace);
            //$("#txtWin3_s").val("$ " + ThirdWin_s);
            $("#txtPlace3_s").val("$ " + ThirdPlace_s);
            
            $("#txtNo4").val(FourthHorse);
            $("#txtLengh4").val(FourthLength);
            //$("#txtWin1").val("RM " + FirstWin);
            $("#txtPlace4").val("RM " + FourthPlace);
            //$("#txtWin4_s").val("$ " + FourthWin_s);
            $("#txtPlace4_s").val("$ " + FourthPlace_s);
            
            
            // //nghia them
            // $("#txtForeCase").val("1-2");
            // $("#txtQPS").val("1-2");
            // $("#txtQPS3").val("1-3");
            // $("#txtQPS6").val("2-3");
            // $("#txtTiere").val("1-2-3");
            // $("#txtTrio").val("3-2-1");
            // //end nghia them
            
            $("#sectionres").show(500);
            $("#SecRaceInfo").hide();  
         }
     }
} 

function SaveRaceResultDetail()
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
    var WinMal2 = $("#txtWin2").val();
    var WinMal3 = $("#txtWin3").val();
    var WinMal4 = $("#txtWin4").val();
    var PlaceMal = $("#txtPlace1").val();
    var PlaceMal2 = $("#txtPlace2").val();
    var PlaceMal3 = $("#txtPlace3").val();
    var PlaceMal4 = $("#txtPlace4").val();
    var WinSin = $("#txtWin1_s").val();
    var WinSin2 = $("#txtWin2_s").val();
    var WinSin3 = $("#txtWin3_s").val();
    var WinSin4 = $("#txtWin4_s").val();
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
                    WinMal2:WinMal2,
                    WinMal3:WinMal3,
                    WinMal4:WinMal4,
                    PlaceMal:PlaceMal,
                    PlaceMal2:PlaceMal2,
                    PlaceMal3:PlaceMal3,
                    PlaceMal4:PlaceMal4,
                    WinSin:WinSin,
                    WinSin2:WinSin2,
                    WinSin3:WinSin3,
                    WinSin4:WinSin4,
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
                    SaveRaceResultDetail_Complete(data);
            }
   }); 
}

function SaveRaceResultDetail_Complete(data){
  var sRes = JSON.parse(data);
  if(sRes.result == 1 ||  sRes.result == "1")
  {
      //UpdateStatusRaceCardID(sRes.RaceCardId);
      socket.emit('PageRefresh', 'RefreshResult');
      document.location.href = "race_result";
  }
  // update status for race card id about close 
  //;
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

// load List Race Card ID
function LoadCategory(){ 
   $.ajax({
            type:"POST",
            url:"home_controller/loadcategory",
            dataType:"text",
            //data: {contry: contry},
            cache:false,
            success:function (data) {
                loadCategory_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function loadCategory_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.Category != null || sRes.Category != "" ){
        var listCate =  sRes.Category;
        var str = "";
        var str1 = "";
        var str2 = "";
        var str3 = "";
        for(var i = 0;i < listCate.length ; i++){
            if(i == 0){
              str = str + "<option value="+ listCate[i].id +" selected='selected'>"+ listCate[i].enCont +"</option>";
              LoadSub(listCate[i].id);
            }
            else{
              str = str + "<option value="+ listCate[i].id +" >"+ listCate[i].enCont +"</option>";
            }
        }
        for(var i=0;i < listCate.length;i++){
          if(i==1){
              str1 = str1 + "<option value="+ listCate[i].id +" selected='selected'>"+ listCate[i].enCont +"</option>";
              LoadSub1(listCate[i].id);
            }
            else{
               str1 = str1 + "<option value="+ listCate[i].id +" >"+ listCate[i].enCont +"</option>";   
            }
        }

        for(var i=0;i < listCate.length;i++){
          if(i==2){
              str2 = str2 + "<option value="+ listCate[i].id +" selected='selected'>"+ listCate[i].enCont +"</option>";
              LoadSub2(listCate[i].id);
            }
            else{
               str2 = str2 + "<option value="+ listCate[i].id +" >"+ listCate[i].enCont +"</option>";
            }
        }


        for(var i=0;i < listCate.length;i++)
        {     
            if(i==3){
              str3 = str3 + "<option value="+ listCate[i].id +" selected='selected'>"+ listCate[i].enCont +"</option>";
              LoadSub3(listCate[i].id);
            }
            else{
               str3 = str3 + "<option value="+ listCate[i].id +"  >"+ listCate[i].enCont +"</option>";
            }
         }   

        $("#cmbCat1").html(str);
        $("#cmbCat2").html(str1);
        $("#cmbCat3").html(str2);
        $("#cmbCat4").html(str3);
     }
}  

//LoadSubCategory

function LoadSub(i){
    $.ajax({
            type:"POST",
            url:"home_controller/loadsubcategory",
            dataType:"text",
            data: {Category: i},
            cache:false,
            success:function (data) {
                LoadSubCategory_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function LoadSub1(i){
    $.ajax({
            type:"POST",
            url:"home_controller/loadsubcategory",
            dataType:"text",
            data: {Category: i},
            cache:false,
            success:function (data) {
                LoadSubCategory_Complete1(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}



function LoadSub2(i){
    $.ajax({
            type:"POST",
            url:"home_controller/loadsubcategory",
            dataType:"text",
            data: {Category: i},
            cache:false,
            success:function (data) {
                LoadSubCategory_Complete2(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });
}



function LoadSub3(i){
    $.ajax({
            type:"POST",
            url:"home_controller/loadsubcategory",
            dataType:"text",
            data: {Category: i},
            cache:false,
            success:function (data) {
                LoadSubCategory_Complete3(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });
}


function LoadSubCategory_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.SubCate != null || sRes.SubCate != "" ){
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].enCont +"</option>";      
        } 
        $("#lstItem").html(str);
        
     }
}  

function LoadSubCategory_Complete1(data){
     var sRes = JSON.parse(data);
     if(sRes.SubCate != null || sRes.SubCate != "" ){
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].enCont +"</option>";      
        } 
       
        $("#lstItem2").html(str);
     }
}  

function LoadSubCategory_Complete2(data){
     var sRes = JSON.parse(data);
     if(sRes.SubCate != null || sRes.SubCate != "" ){
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++)
        {
           // console.log(listCate[i].cnCont);
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].enCont +"</option>";      
        } 
        $("#lstItem3").html(str);
     }
}  

function LoadSubCategory_Complete3(data){
     var sRes = JSON.parse(data);
     if(sRes.SubCate != null || sRes.SubCate != "" ){
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].enCont +"</option>";      
        } 
       
        $("#lstItem4").html(str);
     }
}

function GotoRaceCard(){
  var RaceID = $("#cmbRaceCardID").val();
  if(RaceID != "")
  {
    $.ajax({
              type:"POST",
              url:"home_controller/GotoDetailHorseInfo",
              dataType:"text",
              data: {
                     RaceCardID: RaceID
                     },
              cache:false,
              success:function (data) {
                  GotoRaceCardDetailInfo_Complete(data);
                  //socket.emit('SaveToteSin', "RefreshSin" );
              },
              error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
     });
  }
}
function GotoRaceCardDetailInfo_Complete(data)
{
  var sRes = JSON.parse(data);
  var horseInfo;
  var color;
  var past;
  var horsename;
  var br;
  var jock;
  var rtg;
  var wt;
  var hcp;
  var train;
  var id;
  var RaceInfo;
  var RaceDate;
  var year;
  var month;
  var day;
  var  time;
  var  RaceTitle;
  var  RaceDetail;
  var  RaceTitleCn;
  //var  RaceNo;
  //var  RaceCardId;
     if(sRes.horseInfo != null || sRes.horseInfo != "" )
     {
         var l_RaceNo = sRes.listRaceNo;
         var str = "";
         if(l_RaceNo.length > 0)
         {
            for(var i=0;i<l_RaceNo.length;i++)
            {
               str = str + "<option value="+l_RaceNo[i].RaceNo+">"+l_RaceNo[i].RaceNo+"</option>";
            }
            $("#chooseRaceNo").html(str);
         }
     }
     
     if(sRes.raceCard != null || sRes.raceCard != "")
     {
          RaceInfo = sRes.raceCard;
          if(RaceInfo.length > 0)
          {
              RaceDate = RaceInfo[0].RaceDay;
              year      = RaceDate.substring(0,4);
              month    = RaceDate.substring(4,6);
              day     = RaceDate.substring(6);
              time    = day + "/" + month + "/" + year;
              RaceTitle  = RaceInfo[0].itemsen;
              RaceDetail = RaceInfo[0].Details;
              RaceTitleCn = RaceInfo[0].itemscn;
              RaceNo      = RaceInfo[0].RaceNo;
              RaceCardId  = RaceInfo[0].RaceID;
             $("#RaceDate").text(time);
             $('#txt_RaceDetail').val(RaceDetail);
             $("#txt_RaceTitle").val(RaceTitle);
             $("#spanRaceNo").text(RaceNo);
             $("#RaceCard_ID").text(RaceCardId);
             $("#txt_RaceCN").val(RaceTitleCn);
             $("#txt_RaceCN1").val(RaceTitleCn);
          }
     }

     if(sRes.RaceID !="" && sRes.RaceNo != "")
     {
        var RaceCardId = sRes.RaceID;
        var RaceNo =  sRes.RaceNo;
        $('#chooseRaceNo option[value='+RaceNo+']').attr('selected','selected');
        LoadDetailHorseInfo(RaceCardId,RaceNo); 
     }
     
      $("#sectionres").hide();
      $("#SecRaceInfo").hide();
      $("#section2").show(500);

} 

function LoadDetailHorseInfo(RaceID,RaceNo)
{
  $.ajax({
            type:"POST",
            url:"home_controller/DetailHorseInfo",
            dataType:"text",
            data: {
                   RaceCardID: RaceID,
                   RaceNo:RaceNo
                   },
            cache:false,
            success:function (data) {
                DetailHorseInfo_Complete(data);
                //socket.emit('SaveToteSin', "RefreshSin" );
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });
}

function DetailHorseInfo_Complete(data){
  var sRes = JSON.parse(data);
  var horseInfo;
  var color;
  var past;
  var horsename;
  var br;
  var jock;
  var rtg;
  var wt;
  var hcp;
  var train;
  var id;
  var str ;
  var age;
  var last6Run;
  var sex;
  var siredam;
  var owner;
  var priority;
  var country;
  var gear;
  var hwt;
  var hdle;
  var decal;
  var str_cn1;
  var str_cn2;
  var str_cn3;
  var horseNo;
    $("[id*=color]").text("");
    $("[id*=HorseNo]").text("");
    $("[id*=past]").text("");
    $("[id*=lastRuns]").text("");
    $("[id*=Age]").text("");
    $("[id*=priority]").text("");
    $("[id*=gear]").text("");
    $("[id*=sire]").text("");
    $("[id*=owner]").text("");
    $("[id*=wt]").text("");
    $("[id*=hcp]").text("");
    $("[id*=train]").text("");

    $("[id*=horsename]").text("");
    $("[id*=br]").text("");
    $("[id*=jock]").text("");
    $("[id*=Rtg]").text("");
    
    $("[id*=horsecn1]").text("");
    $("[id*=horsecn2]").text("");
    $("[id*=spItemcn]").text("");
    $("[id*=EditHorse]").attr("onclick"," ");
    $("[id*=Scratch]").attr("onclick"," ");
    $("[id*=InsertColor]").attr("onclick"," ");
    
     if(sRes.horseInfo != null || sRes.horseInfo != "" )
     {
           horseInfo =  sRes.horseInfo;
        if(horseInfo.length > 0)
        {
            for(var i = 0;i < horseInfo.length ; i++)
            {
               br         = horseInfo[i].Br;
               if(br == 0)
                 br = "";

               horsename  = horseInfo[i].HorseName;
               jock       = horseInfo[i].Jocket;
               past       = horseInfo[i].Past;
               rtg        = horseInfo[i].Rtg;
               horseNo    = horseInfo[i].HorseNoS;
               if(rtg == 0)
                rtg = "";
               train      = horseInfo[i].Trainer;
               id         = horseInfo[i].rowid;
               color      = horseInfo[i].Color;
               wt         = horseInfo[i].Wt;
               wt         = wt.replace(".00","");
               if(wt == 0)
                wt = "";
               hcp        = horseInfo[i].Hcp;
               age        = horseInfo[i].Age;
               lastrun    = horseInfo[i].Last6Runs;
               sex        = horseInfo[i].Sex;
               siredam    = horseInfo[i].SireDam;
               owner      = horseInfo[i].Owner;
               hwt        = horseInfo[i].Hwt;
               hdle       = horseInfo[i].Hdle;
               decal      = horseInfo[i].Declaration;
               priority   = horseInfo[i].Priority;
               country    = horseInfo[i].Country;
               gear       = horseInfo[i].Gear;
               str_cn1    = horseInfo[i].itemcn;
               str_cn2    = horseInfo[i].itemmy;
               str_cn3    = horseInfo[i].itemhk;

               if(color != ""){
                  str = "<img src=" + color + " >";
                  $('#color' + (i+1)).html(str);
               }
               else{
                    $('#color' + (i+1)).text("");
               }

               if(color == "SCR"){
                 $('#color' + (i+1)).text("SCR");
               } 
               
               $('#HorseNo' + (i+1)).text(horseNo);
               $('#past'  + (i+1)).text(past);
               $('#lastRuns' + (i+1)).text(lastrun);
               $("#Age" + (i+1)).text(age);
               $("#priority" +(i+1)).text(priority);
               $("#gear" + (i+1)).text(gear);
               $("#sire" + (i+1)).text(siredam);
               $("#owner" +(i+1)).text(owner);
               $("#horsename" + (i+1)).text(horsename);
               $("#br" + (i+1)).text(br);
               $("#jock" + (i+1)).text(jock);
               $("#Rtg" + (i+1)).text(rtg);
               $("#wt" +  (i+1)).text(wt);
               $("#hcp" + (i+1)).text(hcp);
               $("#train" + (i+1)).text(train);
               $("#horsecn1" + (i+1)).text(str_cn1);
               $("#horsecn2" + (i+1)).text(str_cn2);
               $("#spItemcn" + (i+1)).text(str_cn3);
               $("#EditHorse" + (i+1)).attr("onclick","EditHorseInfo('"+ id +"')");
               $("#Scratch" + (i+1)).attr("onclick","Scratch('"+ id +"')");
               $("#InsertColor" + (i+1)).attr("onclick","AddJockyColor('"+id+"')"); 
            }
        }
        else
        {
           for(var i=0;i<20;i++)
            {
               $('#color' + (i+1)).text(" ");
               $('#HorseNo' + (i+1)).text(" ");
               $('#past'  + (i+1)).text(" ");
               $('#lastRuns' + (i+1)).text("");
               $("#Age" + (i+1)).text(" ");
               $("#priority" +(i+1)).text(" ");
               $("#gear" + (i+1)).text(" ");
               $("#sire" + (i+1)).text(" ");
               $("#owner" +(i+1)).text(" ");
               $("#horsename" + (i+1)).text(" ");
               $("#br" + (i+1)).text(" ");
               $("#jock" + (i+1)).text(" ");
               $("#Rtg" + (i+1)).text(" ");
               $("#wt" +  (i+1)).text(" ");
               $("#hcp" + (i+1)).text(" ");
               $("#train" + (i+1)).text(" ");
               $("#horsecn1" + (i+1)).text(" ");
               $("#horsecn2" + (i+1)).text(" ");
               $("#spItemcn" + (i+1)).text(" ");
               $("#EditHorse" + (i+1)).attr("onclick"," ");
               $("#Scratch" + (i+1)).attr("onclick"," ");
               $("#InsertColor" + (i+1)).attr("onclick"," ");
            }
        }
        
     }
     if(sRes.RaceCardID !=null || sRes.RaceID != "")
     {
        $("#RaceCard_ID").text(sRes.RaceCardID);
     }

     // show list noi dung của Race No đó 
     if(sRes.l_RaceCard != null || sRes.l_RaceCard !="")
     {
        var RaceCardInfo = sRes.l_RaceCard;
        if(RaceCardInfo.length > 0)
        {
           $("#txt_Horse").val(RaceCardInfo[0].HorseNo);
           $("#txt_RaceTitle").val(RaceCardInfo[0].itemsen);
           $("#txt_RaceCN").val(RaceCardInfo[0].itemscn);
           $("#txt_RaceCN1").val(RaceCardInfo[0].itemsmy);
           $("#txt_RaceDetail").val(RaceCardInfo[0].Details);
        }
     }
     // end show list nội dung của Race No 
} 

function EnalButtonWinner()
{
   var RaceID = $('#cmbRaceCardID').val();
   $.ajax({
            type:"POST",
            url:"home_controller/SelectRaceIdWinner",
            dataType:"text",
            data: {
                   RaceCardID: RaceID
                   },
            cache:false,
            success:function (data) {
                EnalButton_Complete(data);
                //socket.emit('SaveToteSin', "RefreshSin" );
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });

}

function EnalButton_Complete(data)
{
   var sRes = JSON.parse(data);
   
   if(sRes.stt != "" || sRes.stt != null)
   {
      var dem = sRes.stt;
      var rest;
      var i;
      if(dem != ""){
        rest = parseInt(dem) + 1;
        rest = parseInt(rest);
        for(var i= rest;i<=20;i++){
          $("#btnwin" + i).attr('disabled','disabled');
            
        }
      }
        
   }
   if(sRes.stt == "" || sRes.stt == null){
       //var rest = 0;
       for(var i=1;i<=20;i++){
        $("#btnwin" + i).removeAttr('disabled');
      }
   }
   if(sRes.req == 1 || sRes.req == "1")
   {
      var listjockcolor = sRes.jockcolor;
      if(listjockcolor.length > 0)
      {
          for(var i= 0;i < listjockcolor.length;i++)
          {
             if(listjockcolor[i].Color != "")
             {
                $("#btnwin" + (i+1)).html("<img src='"+listjockcolor[i].Color+"' alt=\"Submit\" height=\"30\" width=\"25\" >");
                //console.log("co hinh" + i);
             }
             else
             {
               //$("#btnwin" + (i+1)).html("-"+(i+1)+"");
               $("#btnwin" + (i+1)).html((i+1)+"");
               //console.log("khong co hinh" + i);
             }
          }
      }
   }
   if(sRes.req == "" || sRes.req == null)
   {
       for(var i=1;i<=20;i++){
        //$("#btnwin" + i).html("-"+ i +"");
        $("#btnwin" + i).html(i +"");
      }
   }
}


function SaveSupportWinnerNo(horseno)
{
    var country = $('#cmbRace').val();
    var RaceID  = $('#cmbRaceCardID').val(); 
    var header_1 = $("#txtHeader1").val();
    var chinese_1 = $("#txtHeader1Man").val();

    if(RaceID != "")
    {
        $.ajax({
                type:"POST",
                url:"home_controller/SaveSupportWinnerNo",
                dataType:"text",
                data: {
                       country: country,
                       RaceID:RaceID,
                       horseno:horseno,
                       header:header_1,
                       chinese:chinese_1
                       },
                cache:false,
                success:function (data) {
                    saveRaceInfo1_Complete(data);
                    //socket.emit('SaveToteSin', "RefreshSin" );
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       });
    }
}

function SaveWinNo(horseno)
{
  var country = $('#cmbRace').val();
  var RaceID  = $('#cmbRaceCardID').val();
  var header1 = $('#txtHeader1').val();
  if(RaceID != "")
  {
     $.ajax({
              type:"POST",
              url:"home_controller/SaveWinNo",
              dataType:"text",
              data: {
                     country: country,
                     RaceID:RaceID,
                     horseno:horseno,
                     header1:header1
                     },
              cache:false,
              success:function (data) {
                  saveRaceInfo1_Complete(data);
                  //socket.emit('SaveToteSin', "RefreshSin" );
              },
              error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
     });
  }
}



$.fn.selectRange = function(start, end) {
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};

