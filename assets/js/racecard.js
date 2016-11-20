$(document).ready(function(){
  // input horse No vao race card
  $("#txt_Horse").focusout(function() 
  {
         UpdateHorseNoOfRaceCard();
  });
	
  // load choose Race 
  $("#chooseRaceNo").change(function()
  {
         var RaceID = $("#RaceCard_ID").text();
         RaceID = RaceID.substring(0,8);
         var RaceNo     = $("#chooseRaceNo").val();
         var RaceID  = RaceID + RaceNo;
         LoadDetailHorseInfo(RaceID,RaceNo);
  });
  // end load choose Race
	//event defined in file evnt.calendar.init.js
	//click button addnew
  $('#btnclear').bind("click",function(){
            $("input[id*='etic_1_']").val("");
            $("input[id*='scr_1_']").val("");
     });

  $('#btnaddnew').bind("click",function(){
      var day = $('#active').html(); 
			if(day == "" || day == null)
			{
				var d = new Date();
				day = d.getDate();
			}
			
      if(day < 10)
        day = '0' + day; 
			var stryear = $('.month').html();
            //alert(stryear);		
			var year = stryear.split('</span>')[1];
			year = year.substring(1);
			var month = stryear.split('</span>')[0];
			month = month.substring(6);
			//alert(month);
			var arr_month = { January : "01", February : "02", March : "03", April : "04", May : "05", June : "06", July : "07", August :"08", September : "09", October : "10", November : "11", December : "12" };
			
			var date = day + "-" + arr_month[month] + "-" + year;
			//var date = day + "-" + arr_month[month] + "-" + year;
			//alert(date);
			$('#dateadd').val(date);
			$('#panel1').hide();
			$('#panel2').show();
            
     });
	 //end click button addnew
	 $('#btnsaveadd').bind("click",function(){
  		$('#section1').hide();
  		$('#section2').show(500);
        SaveInfoRaceCard();
	 });
	 $("#senumberrace").change(function () {
        var numberrace = parseFloat($(this).val());
		//alert(numberrace);
		for (var i = 0; i < numberrace; i++) {
		}
     }); 	
	//click racenumber
	$("#tbodyraceno tr td").bind("click",function(){
		var idraceno = $(this).html();
		//alert(idraceno);
		$("#section1").hide();
		$("#section2").show(500);
	});
	//end click racenumber
});


function SaveInfoRace(){
    var Country  = $("#ChooseCountry").val();
    $.ajax({
            type:"POST",
            url:"home_controller/SaveRaceCardInfo",
            dataType:"text",
            data: {
                   Country:Country
            },
            cache:false,
            success:function (data) {
                SaveRaceCard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });  
}

function SaveInfoRaceCard(){
    var Country        = $("#ChooseCountry").val();
    var date           = $("#dateadd").val();
    var title          = $("#txt_Title").val();
    var Chinese        = $("#_txtChinese").val();
    var status         = $("#spStatus").text();
    var RaceOfNo         = $("#senumberrace").val();
    $.ajax({
            type:"POST",
            url:"home_controller/SaveRaceCard",
            dataType:"text",
            data: {
                   Country:Country,
                   Date:date,
                   Title:title,
                   Chinese:Chinese,
                   Status:status,
                   RaceNo:RaceOfNo
            },
            cache:false,
            success:function (data) {
                SaveRaceCard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });  
}

function SaveRaceCard_Complete(data)
{
   var sRes = JSON.parse(data);
   var country;
   if(sRes.req == 1 || sRes.req == "1")
   {
        var list  = sRes.l_race;
        var trans = {};
            trans.message = 'RefreshRaceCard';
            trans.list    = list;
        //console.log(list[0]["day_race"]);
        socket.emit('PageRefresh', trans); 
        $('#section2').hide();
        $("#section1").show(500);
        country = sRes.country;
        $('#ChooseCountry option[value='+country+']').attr('selected','selected');
        loadRaceBoardDetailDate(country);
   }
   
   //document.location.href = "race_card";
}

function loadRaceBoardDetailDate(coutry)
{
    $.ajax({
            type:"POST",
            url: "home_controller/loadRace_Date",
            dataType:"text",
            data: { Country: coutry},
            cache:false,
            success:function (data) {     
                RaceDateBoard_Complete(data);
            }
       });
}

function RaceDateBoard_Complete(data)
{
      var sRes = JSON.parse(data);
      $("#tblrace").hide();
      if(sRes.RaceDate_U != null || sRes.RaceDate_U !="")
      {
          var info_date = sRes.RaceDate_U;
          var strday = "";
          var strmonty = "";
          var stryear  = "";
          var date_com = "";
          $('.day-contents').attr({style: ""});
          if(info_date.length > 0)
          {
              for(var i=0;i<info_date.length;i++)
              {
                 var RaceDate = info_date[i].RaceDay;
                  stryear      =  RaceDate.substring(0,4);
                  strmonty     =  RaceDate.substring(4,6);
                  strday       =  RaceDate.substring(6);
                  date_com     =  stryear + '-' + strmonty + '-' + strday;
                  //alert(date_com);
                  $('.calendar-day-'+ date_com + ' .day-contents').attr({
                        style: "background: #CCC; color:#FFF; text-decoration:underline;",
                        id: "dayevent_" + date_com
                  }); 
              }
          }
          else
          {
             $('.day-contents').attr({style: ""});
          }
      }

      
}



function SaveHorseInfo(){
    var HorseName        = $("#txt_HorseName").val();
    var Jockey           = $("#txt_jockey").val();
    var Trainer          = $("#txt_trainer").val();
    var Item             = $("#txt_Item").val();
    var Item1            = $("#txt_Item1").val();
    var Item2            = $("#txt_Item3").val();
    var past             = $("#txt_past_45").val();
    var Hcp              = $("#txt_Hcp").val();
    var weight           = $("#txt_Weight").val();
    var tg               = $("#txt_rtg").val();
    var br               = $("#txt_br").val();
    var handicap         = $("#txt_Handicap_H").val();
    //var RaceNo           = $("#spanRaceNo").text();
    var RaceNo           = $("#chooseRaceNo").val();
    var HorseNo          = $("#txt_HorseNoDetail").val();
    var RaceID           = $("#RaceCard_ID").text();
    var ID               = $("#txtID").text();
    $.ajax({
            type:"POST",
            url:"home_controller/SaveHorseInfo",
            dataType:"text",
            data: {
                   HorseName:HorseName,
                   Jockey:Jockey,
                   Trainer:Trainer,
                   Item:Item,
                   Item1:Item1,
                   Item2:Item2,
                   past:past,
                   Hcp:Hcp,
                   Weight:weight,
                   Tg:tg,
                   Br:br,
                   Handicap:handicap,
                   RaceNo: RaceNo,
                   HorseNo:HorseNo,
                   RaceID:RaceID,
                   ID:ID 
            },
            cache:false,
            success:function (data) {
                SaveHorseInfo_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });  
}

function SaveHorseInfo_Complete(data)
{
    var sRes = JSON.parse(data);
    var id;
    if(sRes.req == 1 || sRes.req == "1")
    {
        var trans = {};
          trans.message = 'RefreshRaceCard';
          trans.list    = sRes.l_horeinfo;
          trans.detail  = sRes.detail;
          trans.header  = sRes.l_header;
          trans.raceID  = sRes.RaceID;
        socket.emit('PageRefresh',trans);
        id = sRes.HorseID;
        LoadOnlyHorse(id);
    }
}

function LoadOnlyHorse(id){
  $.ajax({
            type:"POST",
            url:"home_controller/EditHorseInfo",
            dataType:"text",
            data: {id:id},
            cache:false,
            success:function (data) {
                LoadOnlyHorse_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function LoadOnlyHorse_Complete(data){
  var sRes = JSON.parse(data);
  var Info;
  var HorseName;
  var Jockey;
  var Trainer;
  var cn1;
  var cn2;
  var cn3;
  var past;
  var hcp;
  var weight;
  var rtg;
  var br;
  var hdp;
  var rowid;
  var HorseNo;
  var str;
  if(sRes.DetailHI != null || sRes.DetailHI != ""){
      Info = sRes.DetailHI;
      if(Info.length > 0){
        HorseName = Info[0].HorseName;
        HorseNoDetail = Info[0].HorseNoS;
        Jocket    = Info[0].Jocket;
        past      = Info[0].Past;
        br        = Info[0].Br;
        // if(br == -1 || br == "-1")
        //    br = "SCR";
        HorseNo   = parseInt(Info[0].HorseNo);
        color     = Info[0].Color;
        if(color != ""){
          str = "<img src=" + color + " >";
          $('#color' + HorseNo).html(str);
        }
        else{
            $('#color' + HorseNo).val("");
        }
        if(color == "SCR")
          color = "SCR"; 
        rtg       = Info[0].Rtg;
        // if(rtg == -1 || rtg == "-1")
        //   rtg = "SCR";
        wt        = Info[0].Wt;
        // wt        = wt.replace(".00","");
        // if(wt == -1 || wt == "-1")
        //   wt      = "SCR";
        Trainer   = Info[0].Trainer;
        cn1       = Info[0].itemcn;
        cn2       = Info[0].itemmy;
        cn3       = Info[0].itemhk;
        hcp       = Info[0].Hcp;
        weight    = Info[0].Wgt;
        hdp       = Info[0].Hdp;
        rowid     = Info[0].rowid;
        
       $('#HorseNo' + HorseNo).text(HorseNoDetail);
       $('#past'  + HorseNo).text(past);
       $('#color' + HorseNo).text(color);
       $("#horsename" + HorseNo).text(HorseName);
       $("#br" + HorseNo).text(br);
       $("#jock" + HorseNo).text(Jocket);
       $("#Rtg" + HorseNo).text(rtg);
       $("#wt" +  HorseNo).text(wt);
       $("#hcp" + HorseNo).text(hcp);
       $("#train" + HorseNo).text(Trainer);
       $("#horsecn2" + HorseNo).text(cn2);
       $("#horsecn1" + HorseNo).text(cn1);
       $("#spItemcn" + HorseNo).text(cn3);
       
      }

  }
}

function ClearHorseInfo(){
    $("#txt_HorseName").val(" ");
    $("#txt_jockey").val(" ");
    $("#txt_trainer").val(" ");
    $("#txt_Item").val(" ");
    $("#txt_Item1").val(" ");
    $("#txt_Item3").val(" ");
    $("#txt_past").val(" ");
    $("#txt_Hcp").val(" ");
    $("#txt_Weight").val(" ");
    $("#txt_rtg").val(" ");
    $("#txt_br").val(" ");
    $("#txt_Handicap").val(" ");
    $("#txt_past_45").val(" ");
    $("#txt_Handicap_H").val(" ");
}

function ClearCardDetail(){
    $("#txt_RaceTitle").val(" ");
    $("#txt_RaceDetail").val(" ");
    $("#txt_RaceCN").val(" ");
    $("#txt_RaceCN1").val(" ");
    $("#txt_Horse").val(" ");
}

function Scratch(SCR){
    var result = confirm("Want to Scratch Horse ");
    if(result){
        // $('.SCR' + SCR).text("SCR");
        //  if(SCR < 10)
        //  SCR = '0' + SCR;
         var RaceCardID = $("#RaceCard_ID").val();
         var RaceNo     = $("#chooseRaceNo").val();//chooseRaceNo
        $.ajax({
                type:"POST",
                url:"home_controller/SaveListHorse",
                dataType:"text",
                data: {
                       RaceCardID:RaceCardID,
                       id: SCR,
                       RaceNo:RaceNo
                },
                cache:false,
                success:function (data) {
                    SaveHorseInfo_Complete(data);
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       });  
    }
    
}

function LoadJockyColor_Complete(data){
    //var sRes = data;  
    var sRes = JSON.parse(data);
    if (sRes != null) {
        var str = "<div style=\"float: left;\">";
        for (i = 0; i < sRes.length; i++) {
            str = str + "<div id=\"divLinks" + sRes[i].id + "\" style=\"padding: 2px; float: left\">";
            str = str + "<a href=\"javascript:void(0);\" onclick=\"UpdateJockyColor('" + sRes[i].id + "');\">";
            str = str + "<img src=" + sRes[i].imgeSmall + " >";
            str = str + "</a>";
            str = str + "</div>";
        }
        str = str + "</div>";
        //$("#divXemLaiHinhDaUp").html("");
        $("#listJockyColor").html("");
        $("#listJockyColor").append(str);
    }
}

function UploadFile(){
    var fileName = "";
    var files = document.getElementById('myfile').files;  
    for (i=0;i<files.length;i++) {
        fileName = files[i].name; //Tên file
        if(i==0)
        {
            if(fileName.indexOf(" ")>0 || fileName.indexOf("@")>0)
            {
                alert("Ten file không được có ký tự đặc biệt hoặc khoảng trắng ! Tên file đang ko hợp lệ : " + fileName);   
                fileName = "";             
            }            
        }
        else
        {
            break;
        }
    }
    if(fileName!="")
    {
        var info = $("#info").val();
        var lang = $("#langue").val();
       
        var message = "";
        var vali=true;
        //var arr_name = files.split('.');
        if(vali == false){
            alert(message);
            return;
        }
        else{
            var http = new XMLHttpRequest();
            //http_arr.push(http);
            
            var url = "home_controller/uploadfile";
            var data = new FormData();
            data.append('filename', files[0].name);
            data.append('myfile', files[0]);
            data.append('info', info);
            data.append('lang', lang);
            http.open('POST', url, true); ///
            http.send(data);
            
            //Nhận dữ liệu trả về
            http.onreadystatechange = function(event) {
                //Kiểm tra điều kiện
                if (http.readyState == 4 && http.status == 200) {
                    //ProgressBar.style.background = ''; //Bỏ hình ảnh xử lý
                    try { //Bẫy lỗi JSON
                        var server = JSON.parse(http.responseText);
                        if (server.status) {
                             $(".ThemThanhCong").show(500);        
                        } else {
                            $(".ThemThatBai").hide(0);
                        }
                    } catch (e) {
                    }
                }
                //http.removeEventListener('progress'); //Bỏ bắt sự kiện
                
                 $(".ThemThanhCong").show(500);
            }
         
      }
  
    }
}

function UploadFile_Complete(data) {
    if($.isEmptyObject(data))
    {
        
    }
    else
    {
        var res = data;
        if (res == "1" || res == 1) {
            $(".ThemThanhCong").show(500);
            $(".ThemThatBai").hide(0);
           
        }
        else {
            alert(res);
            $(".ThemThanhCong").hide(500);
            $(".ThemThatBai").show(500);
            
        }
    } 
}

function ConvertHK(){
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertHK_Chrome();
    }
    else
    {
        ConvertHK_FireFox();
    }
    //ConvertMal_FireFox();
}

function ConvertHK_Chrome(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    var str = "";
    var list = [];
    for(var i=0; i<soDong ; i ++)
    {
       var HorseInfo = {};
       var dong = lines[i];
       var cols = dong.split('\t');
       console.log(cols);
       HorseInfo.HorseNo   = cols[0];
       HorseInfo.HorseName = cols[3];
       HorseInfo.Weight    = cols[4];
       HorseInfo.Br        = cols[6];
       HorseInfo.Trainer   = cols[7];
       HorseInfo.jockey    = cols[5];
       HorseInfo.Rtg       = cols[8];
       HorseInfo.Past      = cols[1];
       HorseInfo.Declaration = cols[10];
       HorseInfo.Priority    = cols[11];
       HorseInfo.Gear        = cols[12];
       list[i] = HorseInfo;
       
    }
    //$("#tblracedetail tbody").html(str);
    SaveHorseInfoDetail(list);
    $('#ContentConvert').val("");
   
}

function ConvertHK_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    var str = "";
    var list = [];
    for(var i=0; i<soDong ; i ++)
    {
       var HorseInfo = {};
       var dong = lines[i];
       var cols = dong.split('\t');
       HorseInfo.HorseNo   = cols[5];
       HorseInfo.HorseName = cols[2];
       HorseInfo.Weight    = cols[3];
       HorseInfo.Br        = cols[4];
       HorseInfo.Trainer   = cols[6];
       HorseInfo.jockey    = cols[7];
       HorseInfo.Rtg       = cols[8];
       HorseInfo.Past       = cols[0];
       HorseInfo.Declaration = cols[10];
       HorseInfo.Priority    = cols[11];
       HorseInfo.Gear        = cols[12];
       list[i] = HorseInfo; 
      
    }

    // test ham function 
    SaveHorseInfoDetail(list);
    $('#ContentConvert').val("");
    // end test ham function
}

function ConvertMalSin()
{
  if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertMalSin_Chrome();
    }
    else
    {
        ConvertMalSin_FireFox();
    }
}

function ConvertMalSin_Chrome()
{
  var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    //var str = "";
    var list = [];
    var dong;
    var cols;
    for(var i=0; i<soDong ; i+=2)
    {
       var HorseInfo = {};
           dong = lines[i];
           cols = dong.split('\t');
       var HorseNo = cols[0];
       var HorseName = cols[2];
       var Past      = cols[1];
       var jockey    = cols[5];
           dong = lines[i+1];
           cols = dong.split('\t');
       var Br  = cols[1];
       var Rtg = cols[2];
       var Weight = cols[3];
       var Trainer = cols[0];
       //console.log(cols);
       HorseInfo.HorseNo   = HorseNo;
       HorseInfo.HorseName = HorseName;
       HorseInfo.Weight    = Weight;
       HorseInfo.Br        = Br;
       HorseInfo.Trainer   = Trainer;
       HorseInfo.jockey    = jockey;
       HorseInfo.Rtg       = Rtg;
       HorseInfo.Past      = Past;
       list[i/2] = HorseInfo;      
    }
     console.log(list);
    SaveHorseInfoDetail(list);
    $('#ContentConvert').val("");
}

function ConvertSinSin()
{
  if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertSinSin_Chrome();
    }
    else
    {
        ConvertSinSin_FireFox();
    }
}

function ConvertSinSin_Chrome()
{
  var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var HorseNo; 
    var HorseName;
    var Past;
    var jockey;
    var Br;
    var Rtg;
    var Weight;
    var Trainer;
    //var str = "";
    var list = [];
    var dong;
    var cols;
    for(var i=0; i<soDong ; i +=2)
    {
       var HorseInfo = {};
           dong = lines[i];
           cols = dong.split('\t'); 
           //console.log(cols.length);      
       HorseNo = cols[1];

       if($.isNumeric(HorseNo) && parseInt(HorseNo) <=20)
       {
           HorseName = cols[3];
           Past      = cols[2];
           jockey    = cols[6];
           dong = lines[i+1];
           cols = dong.split('\t');
           //console.log(cols.length);
           if(cols.length == 10)
           {
              Br  = cols[2];
              Rtg = cols[3];
              Weight = cols[4];
              Trainer = cols[1];
           }

           if(cols.length == 9)
           {
              Br  = cols[1];
              Rtg = cols[2];
              Weight = cols[3];
              Trainer = cols[0];
           }
           
           //console.log(cols);
           HorseInfo.HorseNo   = HorseNo;
           HorseInfo.HorseName = HorseName;
           HorseInfo.Weight    = Weight;
           HorseInfo.Br        = Br;
           HorseInfo.Trainer   = Trainer;
           HorseInfo.jockey    = jockey;
           HorseInfo.Rtg       = Rtg;
           HorseInfo.Past      = Past;
           list[i/2] = HorseInfo;      
       }
       else
       {   var Horse_No = cols[0];
           HorseName = cols[2];
           Past      = cols[1];
           jockey    = cols[5];
           dong = lines[i+1];
           cols = dong.split('\t');
           Br  = cols[1];
           Rtg = cols[2];
           Weight = cols[3];
           Trainer = cols[0];
           //console.log(cols);
           HorseInfo.HorseNo   = Horse_No;
           HorseInfo.HorseName = HorseName;
           HorseInfo.Weight    = Weight;
           HorseInfo.Br        = Br;
           HorseInfo.Trainer   = Trainer;
           HorseInfo.jockey    = jockey;
           HorseInfo.Rtg       = Rtg;
           HorseInfo.Past      = Past;
           list[i/2] = HorseInfo; 
       }

          
    }
     console.log(list);
    //$("#tblracedetail tbody").html(str);
    SaveHorseInfoDetail(list);
    $('#ContentConvert').val("");
}

function SaveHorseInfoDetail(list){
  var RaceCardID = $("#RaceCard_ID").text();
  //var RaceNo     = $("#spanRaceNo").text(); 
  var RaceNo     = $("#chooseRaceNo").val(); 
    $.ajax({
            type:"POST",
            url:"home_controller/SaveHorseInfoDetail",
            dataType:"text",
            data: {HorseInfo: JSON.stringify(list),
                   RaceCardID: RaceCardID,
                   RaceNo:RaceNo
                   },
            cache:false,
            success:function (data) {
                SaveHorseInfoDetail_Complete(data);
                //socket.emit('SaveToteSin', "RefreshSin" );
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });
}

function SaveHorseInfoDetail_Complete(data){
    
    var sRes = JSON.parse(data);
    var RaceID;
    var RaceNo;
    if(sRes.RaceID != null || sRes.RaceID != ""){
        RaceID = sRes.RaceID;
    }
    if(sRes.RaceNo != null || sRes.RaceNo != ""){
        RaceNo = sRes.RaceNo;
    }
    if(sRes.Rel == 1 || sRes.Rel == "1")
    {
      var trans = {};
          trans.message = 'RefreshRaceCard';
          trans.list    = sRes.l_horeinfo;
          trans.detail  = sRes.detail;
          trans.header  = sRes.l_header;
          trans.raceID  = sRes.RaceID;
      socket.emit('PageRefresh',trans);
      LoadDetailHorseInfo(RaceID,RaceNo);
    }    
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

function ConvertSin(){
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    var j ;
    var count = 0;
    var list = [];
    var dong;
    var cols;
    var HorseNo;
    var HorseName;
    var Weight;
    var jockey;
    var Rtg;
    var Triner;
    var Br;
    for(var i=0; i<soDong ; i++)
    {
        //j=i+1;
        var HorseInfo = {};
        dong      = lines[i];
        cols      = dong.split('\t');
        //console.log(cols);
        //dong1     = lines[i+1];
        //cols1     = dong1.split('\t');
        HorseNo   = cols[0];
        HorseName = cols[1];
        jockey    = cols[2];
        Weight    = cols[5];
        Triner    = cols[3];
        Br        = cols[4];
        Rtg       = "";
        HorseInfo.HorseNo   = HorseNo;
        HorseInfo.HorseName = HorseName;
        HorseInfo.jockey    = jockey;
        HorseInfo.Trainer   = Triner;
        HorseInfo.Weight    = Weight;
        HorseInfo.Br        = Br;
        HorseInfo.Rtg       = Rtg;   
        //list[i/2] = HorseInfo;
        list[i] = HorseInfo;
       
    }
    console.log(list);
    SaveHorseInfoDetail(list);
    $("#ContentConvert").val("");
}


// thêm mới nút conver file excel 25/03/2015
function ConvertExecl(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var age;
    var hwt;
    var hdle;
    for(var i=0; i<soDong ; i++)
    {
        var HorseInfo = {};
        var dong = lines[i];
        var cols = dong.split('\t');
        //console.log(cols);
        var Br              = cols[4];
            Br              = Br.replace("]", "");
        var rtg             = cols[5];
        HorseInfo.HorseNo   = cols[0];
        HorseInfo.Past      = cols[1];
        HorseInfo.HorseName = cols[2];
        HorseInfo.jockey    = cols[3];
        HorseInfo.Br        = Br;
        HorseInfo.Rtg       =  rtg;
        HorseInfo.Weight    = cols[6];
        HorseInfo.hcp       = cols[7];
        HorseInfo.Trainer   = cols[8];
        list[i] = HorseInfo;   
    }

    SaveHorseInfoDetail(list);
    $("#ContentConvert").val("");

}
// end thêm mới nút convert file excel

// nut convert chinese convert
function  ConvertCN()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var age;
    var hwt;
    var hdle;
    for(var i=0; i<soDong ; i++)
    {
        var HorseInfo = {};
        var dong = lines[i];
        var cols = dong.split('\t');
        console.log(cols);
       
        HorseInfo.HorseNo     = cols[0];
        HorseInfo.HorseNamecn = cols[1];
        HorseInfo.jockeycn    = cols[2];
        HorseInfo.Trainercn   = cols[3];
        list[i] = HorseInfo;   
    }

    UpdateHorseInfoChenese(list);
    $("#ContentConvert").val("");
}
// end nut convert chinese convert


function ConvertWin(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var age;
    var hwt;
    var hdle;
    var Br;
    var rtg;
    var horseno;
    var HorseName;
    var Weight;
    var Trainer;
    var jockey;
    var Past;
    var hcp;
    var dem="";
    var dong;
    var cols;
    for(var i=0; i<soDong ; i++)
    {
        var HorseInfo       = {};
        dong            = lines[i];
        cols            = dong.split('\t');
        console.log(cols);
        horseno         = cols[0];
        if($.isNumeric(horseno) && parseInt(horseno) <=20)
        {
           Br              = cols[7];
           Br              = Br.replace("]", "");
           rtg             = cols[10];
           horseno         = cols[0];
           HorseName       = cols[2];
           Weight          = cols[14];
           Trainer         = cols[20];
           jockey          = cols[9];
           Past            = cols[1];
           hcp            = cols[19];

          HorseInfo.HorseNo   = horseno;
          HorseInfo.HorseName = HorseName;
          HorseInfo.Weight    = Weight;
          HorseInfo.Br        = Br;
          HorseInfo.Trainer   = Trainer;
          HorseInfo.jockey    = jockey;
          HorseInfo.Rtg       =  rtg;
          HorseInfo.Past      = Past;
          HorseInfo.hcp       = hcp;
          list[i] = HorseInfo;  
        }
        else
        {
          if($.isNumeric(horseno) ) // truong hop ko fai so con ngua, tuc la >20
          {
              Br              = cols[5];
           Br              = Br.replace("]", "");
           rtg             = cols[8];
           horseno         = "";
           HorseName       = cols[1];
           Weight          = cols[12];
           Trainer         = cols[18];
           jockey          = cols[7];
           Past            = cols[0];
           hcp            = cols[15];

            HorseInfo.HorseNo   = horseno;
            HorseInfo.HorseName = HorseName;
            HorseInfo.Weight    = Weight;
            HorseInfo.Br        = Br;
            HorseInfo.Trainer   = Trainer;
            HorseInfo.jockey    = jockey;
            HorseInfo.Rtg       =  rtg;
            HorseInfo.Past      = Past;
            HorseInfo.hcp       = hcp;
            list[i] = HorseInfo; 
          }
          else // no la chu , bao gom EA, NA....
          {
             if(horseno == "EA")
             {
                Br              = "";
               Br              = "";
               rtg             = "";
               //horseno         = "";
               HorseName       = "";
               Weight          = "";
               Trainer         = "";
               jockey          = "";
               Past            = "";
               hcp            = "";

                HorseInfo.HorseNo   = horseno;
                HorseInfo.HorseName = HorseName;
                HorseInfo.Weight    = Weight;
                HorseInfo.Br        = Br;
                HorseInfo.Trainer   = Trainer;
                HorseInfo.jockey    = jockey;
                HorseInfo.Rtg       =  rtg;
                HorseInfo.Past      = Past;
                HorseInfo.hcp       = hcp;
                list[i] = HorseInfo; 
             }
             else
             {
                 Br              = cols[7];
                 Br              = Br.replace("]", "");
                 rtg             = cols[10];
                 horseno         = cols[0];
                 HorseName       = cols[2];
                 Weight          = cols[14];
                 Trainer         = cols[20];
                 jockey          = cols[9];
                 Past            = cols[1];
                 hcp            = cols[19];

                HorseInfo.HorseNo   = horseno;
                HorseInfo.HorseName = HorseName;
                HorseInfo.Weight    = Weight;
                HorseInfo.Br        = Br;
                HorseInfo.Trainer   = Trainer;
                HorseInfo.jockey    = jockey;
                HorseInfo.Rtg       =  rtg;
                HorseInfo.Past      = Past;
                HorseInfo.hcp       = hcp;
                list[i] = HorseInfo;  
             }
             
          }
        }
              
    }
   
    console.log(list);

    SaveHorseInfoDetail(list);
    $("#ContentConvert").val("");
}

function ConvertMC(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var dong;
    var cols;
    var HorseNo;
    var HorseName;
    var Weight;
    var jockey;
    var Rtg;
    var Trainer;
    var Br;
    var age;
    var coulor;
    var country;
    var sex;
    var sireDam;
    var sire1;
    var sire2;
    var Owner;
    for(var i=0; i < soDong ; i+=3)
    {
         var HorseInfo = {};
         dong = lines[i];
         cols = dong.split('\t');
         HorseNo  = cols[0];
         dong = lines[i+1];
         cols = dong.split('\t');
         console.log(cols);
         HorseName = cols[1];
         age       = cols[2];
         coulor     = cols[3];
         country   = cols[4];
         sex       = cols[5];
         Br        = cols[6];
         Trainer   = cols[7];
         Weight    = cols[8];
         jockey    = cols[9];
         sire1     = cols[10];
         dong      = lines[i+2];
         cols      = dong.split('\t');
         sire2     = cols[0];
         Owner     = cols[1];
         sireDam = sire1 + sire2;
         HorseInfo.HorseNo = HorseNo;
         HorseInfo.HorseName = HorseName;
         HorseInfo.age     = age;
         HorseInfo.coulor  = coulor;
         HorseInfo.Br      = Br;
         HorseInfo.sex     = sex;
         HorseInfo.Trainer  = Trainer;
         HorseInfo.Weight  = Weight;
         HorseInfo.jockey  = jockey;
         HorseInfo.country = country;
         HorseInfo.Owner   = Owner;
         HorseInfo.sireDam = sireDam;
         list[i/3] = HorseInfo;
    }

    SaveHorseInfoDetail(list);
    $("#ContentConvert").val("");
}

function ClearAllHorseInfo(){
    var RaceCardID     = $("#RaceCard_ID").text();
    //var RaceNo         = $("#spanRaceNo").text();
    var RaceNo         = $("#chooseRaceNo").val();
    $.ajax({
            type:"POST",
            url:"home_controller/ClearHorseInfo",
            dataType:"text",
            data: {RaceCardID: RaceCardID,
                    RaceNo:RaceNo
                    },
            cache:false,
            success:function (data) {
                SaveHorseInfoDetail_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

// update Horse No
function UpdateHorseNoOfRaceCard()
{
    var RaceCardID     = $("#RaceCard_ID").text();
    //var RaceNo         = $("#spanRaceNo").text();
    var RaceNo         = $("#chooseRaceNo").val();
    var HorseNo        = $("#txt_Horse").val();
    
    $.ajax({
            type:"POST",
            url:"home_controller/UpdateHorseNoOfRaceCard",
            dataType:"text",
            data: {RaceCardID: RaceCardID,
                    RaceNo:RaceNo,
                    HorseNo:HorseNo 
                    },
            cache:false,
            success:function (data) {
                UpdateHorseNoOfRace_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}
// end Horse No
// update HorseNoOfRace
function UpdateHorseNoOfRace_Complete(data)
{

}
// end HorseNo Of Race
function UpdateRaceDetail()
{
    var RaceCardID     = $("#RaceCard_ID").text();
    //var RaceNo         = $("#spanRaceNo").text();
    var RaceNo         = $("#chooseRaceNo").val();
    var Title          = $("#txt_RaceTitle").val();
    var Chinese        = $("#txt_RaceCN").val();
    var ChineseMy      = $("#txt_RaceCN1").val();
    var Details        = $("#txt_RaceDetail").val();
    var Meter        = $("#txt_Meter").val();
    $.ajax({
            type:"POST",
            url:"home_controller/UpdateRaceCardDeatil",
            dataType:"text",
            data: {RaceCardID: RaceCardID,
                    RaceNo:RaceNo,
                    Title:Title,
                    Chinese:Chinese,
                    ChineseMy:ChineseMy,
                    Details:Details ,
                    Meter:Meter
                    },
            cache:false,
            success:function (data) {
                UpdateRaceCardDeatil_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function UpdateRaceCardDeatil_Complete(data)
{
   var sRes = JSON.parse(data);
   var country = "";
   if(sRes.rel == 1  || sRes.rel == "1")
   {
      country = sRes.country;
      //loadRaceBoardDetailDate(country);
      $("#tbSaveRaceDailDetail").html("Save success");
      var trans = {};
          trans.message = 'RefreshRaceCard';
          trans.list    = sRes.l_horeinfo;
          trans.detail  = sRes.detail;
          trans.header  = sRes.l_header;
          trans.raceID  = sRes.RaceID;
        socket.emit('PageRefresh', trans);
      //socket.emit('PageRefresh','RefreshRaceCard');
   }  
}

function UpdateRaceCardCo()
{
    var country     = $("#ChooseCountry").val();
    var RaceDate    = $("#spRaceDate_get").text();
    var Title       = $("#txtUpTitle").val();
    var Chinese     = $("#txtUpChine").val();
    var Status      = $("#cmb_Status").val();
    $.ajax({
            type:"POST",
            url:"home_controller/UpdateCountryStatus",
            dataType:"text",
            data: { country: country,
                    RaceDate:RaceDate,
                    Title:Title,
                    Chinese:Chinese,
                    Status:Status
                    },
            cache:false,
            success:function (data) {
                UpdateCountryStatus_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function UpdateCountryStatus_Complete(data)
{
    var sRes = JSON.parse(data);
    var country;
    var racedate;
    if(sRes.req == 1 || sRes.req == "1")
    {
        var list = sRes.l_race;
        var trans = {};
            trans.message = 'RefreshRaceCard';
            trans.list    = list;
        socket.emit('PageRefresh', trans); 
        //socket.emit('PageRefresh', 'RefreshRaceCard');
        $("#tblrace").hide();
        country = sRes.country;
        $('#ChooseCountry option[value='+country+']').attr('selected','selected');
        loadRaceBoardDetailDate(country);
        $("#tbMessage").text("Updated successful");
    }
    else{

        $("#tbMessage").text("Updated not successful");
    }
    
}

function EditHorseInfo(id){
  $.ajax({
            type:"POST",
            url:"home_controller/EditHorseInfo",
            dataType:"text",
            data: {id:id},
            cache:false,
            success:function (data) {
                EditHorseInfo_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function EditHorseInfo_Complete(data){
    var sRes = JSON.parse(data);
    var Info;
    var HorseName;
    var HorseNo;
    var Jockey;
    var Trainer;
    var cn1;
    var cn2;
    var cn3;
    var past;
    var hcp;
    var weight;
    var rtg;
    var br;
    var hdp;
    var rowid;
    if(sRes.DetailHI != null || sRes.DetailHI != ""){
          Info = sRes.DetailHI;
          if(Info.length > 0){
              HorseName = Info[0].HorseName;
              Jocket    = Info[0].Jocket;
              past      = Info[0].Past;
              br        = Info[0].Br;
              HorseNo   = Info[0].HorseNoS;
              //color     = Info[0].Color;
              //if(color !="SCR")
                //color = "";
              rtg       = Info[0].Rtg;
              wt        = Info[0].Wt;
              Trainer   = Info[0].Trainer;
              cn1       = Info[0].itemcn;
              cn2       = Info[0].itemmy;
              cn3       = Info[0].itemhk;
              hcp       = Info[0].Hcp;
              weight    = Info[0].Wgt;
              hdp       = Info[0].Hdp;
              rowid     = Info[0].rowid;
              $("#txtID").text(rowid); 
              $("#txt_HorseNoDetail").val(HorseNo);
              $("#txt_HorseName").val(HorseName);
              $("#txt_jockey").val(Jocket);
              $("#txt_trainer").val(Trainer);
              $("#txt_Item").val(cn1);
              $("#txt_Item1").val(cn2);
              $("#txt_Item3").val(cn3);
              $("#txt_past_45").val(past);
              $("#txt_Hcp").val(hcp);
              $("#txt_Weight").val(wt);
              $("#txt_rtg").val(rtg);
              $("#txt_br").val(br);
              $("#txt_Handicap").val(hdp);
          }

    }
}


function AddJockyColor(HorseNo)
{
   $("#myfile").val("");
   $("#imageColor").html("");
   loadJockyColor();
   $("#idHorseNo").text(HorseNo);
   $("#popupJockeyShow").dialog
                ({
                    height: 400,
                    width:  600
                });
    
}

function AddColor()
{
    var id = $("#idHorseNo").text();
    var linkImage = $("#myfile").val();
    var str = "";
    $.ajax({
            type:"POST",
            url:"home_controller/EditAddColor",
            dataType:"text",
            data: {
                    id:id,
                    linkImage:linkImage
                  },
            cache:false,
            success:function (data) {
                AddColor_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });

    // str = str + "<img src=" + linkImage + " >";
    // //$("#imageColor").html(str);
    // $("#imageColor").append(str);
}

function AddColor_Complete(data)
{
   var sRes = JSON.parse(data);
   if(sRes.rkq == 1 || sRes.rkq == "1")
   {
      str = str + "<img src=" + image + " >";
      $("#color" + No).html(str);
      loadJockyColor();
      $("#spSaveSucess").text("Success");
   }
}

function UpdateJockyColor(imageID)
{
  var id = $("#idHorseNo").text();
  $.ajax({
            type:"POST",
            url:"home_controller/updatehorsejocky",
            dataType:"text",
            data: {
                    id:id,
                    linkImage:imageID
                  },
            cache:false,
            success:function (data) {
                EditAddColor_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function EditAddColor_Complete(data){
   var sRes = JSON.parse(data);
   var No;
   var str="";
   var image="";
   if(sRes.rkq == 1 || sRes.rkq == "1"){
        No = parseInt(sRes.horseNo);
        image = sRes.image;
         str = str + "<img src=" + image + " >";
         $("#color" + No).html(str);
   }
}

function loadJockyColor(){
    //var ProID = $("#txtProductIDTab2").val();    
    //$("#divXemLaiHinhDaUp").show(500);
    $.ajax({
        url:  "home_controller/get_jockycolor",
        type: "POST",
        //data: { ProductID: ProID },
        cache: false,
        dataType: "text",
        //contentType: "application/json; charset=utf-8",
        success:
                function (data) {
                    LoadJockyColor_Complete(data);
                },
        error: function () {
        }
    });
}

function GotoET(racedate,racecountry){
  $.ajax({
        url:  "home_controller/gotoSCR",
        type: "POST",
        data: { country: racecountry,
                RaceDate: racedate
             },
        cache: false,
        dataType: "text",
        //contentType: "application/json; charset=utf-8",
        success:
                function (data) {
                    LoadScratchingEarly1_Complete(data);
                },
        error: function () {
        }
    });
}

function LoadScratchingEarly1_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.list_SE != null || sRes.list_SE != "" ){
        var listSE =  sRes.list_SE;
        if(listSE.length > 0){
            for(var i = 0;i < listSE.length ; i++){
              var RaceNo        = listSE[i].RaceNo;
              RaceNo            = parseInt(RaceNo);       
              var earlyTicket   = listSE[i].EarlyTicket;         
              var Scratching    = listSE[i].Scratching;
              var stt           = RaceNo + 1;
              $("#tbGetSE tbody tr:eq("+ stt +") td:eq(1) input").val(earlyTicket); 
              $("#tbGetSE tbody tr:eq("+ stt +") td:eq(2) input").val(Scratching); 
            }
        }

        var racedate;
        var racecountry;
        var stryear;
        var strmonty;
        var strday;
        var date_com;
        var strspane;
        if(sRes.racedate != null || sRes.racedate != ""){
            racedate = sRes.racedate;
            stryear      =   racedate.substring(0,4);
            strmonty     =   racedate.substring(4,6);
            strday       =   racedate.substring(6);
            date_com     =  strday + '/' + strmonty + '/' + stryear;
        }
        
        if(sRes.racecountry != null || sRes.racecountry != ""){
           racecountry = sRes.racecountry;
        }

        $("#stCountrydate").html(racecountry + " " + date_com);
        $("#btnSaveEDetail").attr('onclick','SaveEarlyDetail("'+racecountry+'","'+racedate+'")');
        //SaveEarlyDetail(racecountry,racedate);

     }

    $("#section1").hide();
    $("#section2").hide();
    $("#section3").show(500);
}

function SaveEarlyDetail(racecountry,racedate){
        //var chooseCountry = $("#ChooseCountry").val();
        var sumSE = $('table#tbGetSE tbody tr:last').index()-1;
        alert(sumSE);
        if (sumSE > 0) {
            var list = [];
            for(var i = 0 ;i < sumSE ;i++)
            {  
                var SE = {};
                    SE.Early          = $("#tbGetSE tbody tr:eq(" + (i+2) + ") td:eq(1)").find("input").val();
                    SE.Scarching      = $("#tbGetSE tbody tr:eq(" + (i+2) + ") td:eq(2)").find("input").val();
                    list[i] = SE;    
            }   
    }

    $.ajax({
            type:"POST",
            url:"home_controller/SaveSEDetail",
            dataType:"json",
            data: {SE: JSON.stringify(list),
                   Country: racecountry,
                   RaceDate:racedate 
                  },
            cache:false,
            success:function (data) {
                SaveSE_Complete(data);
                //socket.emit('SaveToteSin', "RefreshSin" );
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       });
}

function SaveSE_Complete(data){
    socket.emit('PageRefresh', 'RefreshScratEt'); 
    $("#spantb").text("Save successful");
}

function SaveExample()
{
   var result = confirm("You want to save all ?");
    if(result)
    {
        $('#section2').hide();
        $("#section1").show(500);
        var country = $("#RaceCard_ID").text();
        var RaceDay = $("#RaceDate").text();
            RaceDay = RaceDay.split("/");
        var getdate = RaceDay[2] + RaceDay[1] + RaceDay[0];
        //console.log(country);
        country = country.substring(0,2);
        //console.log(country);
        $('#ChooseCountry option[value='+country+']').attr('selected','selected');
        loadRaceBoardDetailDate(country);
        loadListRaceCardShow(getdate,country);
    }
}

function loadListRaceCardShow(getdate,country)
{
   $.ajax({
            type:"POST",
            url: "home_controller/loadlistRaceDate",
            dataType:"text",
            data: { getdate: getdate,
                    country:country
                  },
            cache:false,
            success:function (data) {
              RaceCardDate_Complete(data);     
            }
        });
}

function CancelRaceCarDetail()
{
    $('#section2').hide();
    $("#section1").show(500);
    var country = $("#RaceCard_ID").text();
    console.log(country);
    country = country.substring(0,2);
    $('#ChooseCountry option[value='+country+']').attr('selected','selected');
    loadRaceBoardDetailDate(country);
}

function ClearConvert()
{
  $("#ContentConvert").val(" ");
}

function UpdateHorseInfoChenese(list)
{

  var RaceCardID = $("#RaceCard_ID").text();
  //var RaceNo     = $("#spanRaceNo").text(); 
  var RaceNo     = $("#chooseRaceNo").val();
    $.ajax({
            type:"POST",
            url:"home_controller/UpdateHorseInfoChenese",
            dataType:"text",
            data: {HorseInfo: JSON.stringify(list),
                   RaceCardID: RaceCardID,
                   RaceNo:RaceNo
                   },
            cache:false,
            success:function (data) {
                SaveHorseInfoDetail_Complete(data);
                //socket.emit('SaveToteSin', "RefreshSin" );
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   });
  
}