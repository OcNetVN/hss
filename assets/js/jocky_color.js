$(document).ready(function() {

 loadJockyColor();

 $('#ChooseCountry').change(function(){   
        LoadListRaceCardIDChange();
        $("#ChooseHorse option").remove();
        //loadListHorseNoChange();    
     }).trigger('change');

 $('#ChooseRace').change(function(){   
        loadListHorseNoChange();   
     }).trigger('change');
  
});

function RemoveJockColor(id)
{
  $.ajax({
            type:"POST",
            url:"home_controller/removejockcolor",
            dataType:"text",
            data: {
                    id:id
                  },
            cache:false,
            success:function (data) {
                RemoveColor_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function RemoveColor_Complete(data)
{
  var sRes = JSON.parse(data);
  if(sRes.req == 1 || sRes.req == "1")
  {
     $("#listJockyColor").html(" ");
      loadJockyColor();
      $("#spSaveSucess").html("Remove Success");
      $("#dvJocky").html(" ");
  }
}

function AddColor()
{
    var id        = $("#ChooseHorse").val();
    var linkImage = $("#spaimage").text();
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

    str = str + "<img src=" + linkImage + " >";
    //$("#imageColor").html(str);
    $("#imageColor").append(str);
}

function SaveJockyColorData()
{
    var urlimage = $("#addjocky").val();
    $.ajax({
            type:"POST",
            url:"home_controller/uploadImage",
            dataType:"text",
            data: {
                    urlImage:urlimage
                  },
            cache:false,
            success:function (data) {
                JockyColor_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });

}

function JockyColor_Complete(data)
{
    console.log(data);
    var sRes = JSON.parse(data);
    if(sRes.req == 1 || sRes.req == "1")
    {
      $("#listJockyColor").html(" ");
      //loadJockyColor();
      //$("#spantb").html("Save Success");
      $("#addjocky").val(" ");
      alert("Save Success");
      document.location.href = "../admin/joccolor";
    }
}

function AddColor_Complete(data)
{
   var sRes = JSON.parse(data);
   if(sRes.rkq == 1 || sRes.rkq == "1")
   {
      $("#spSaveSucess").text("Success");
   }
}

function UpdateJockyColor(imageID)
{
  $.ajax({
            type:"POST",
            url:"home_controller/loadJockyDetail",
            dataType:"text",
            data: {
                    id:imageID
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
   if(sRes.rkq == 1 || sRes.rkq == "1")
   {
        No    = sRes.idjock;
        image = sRes.image;
        //image = "../" + image;
         str = str + "<img src=" + image + " >";
         $("#dvJocky").html(str);
         $("#spaimage").text(image);
         $("#btnRemoveJockycolor").attr("onclick","RemoveJockColor("+No+")");
   }
}

function loadJockyColor(){
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
        $("#listJockyColor").append(str);
    }
}

function LoadListRaceCardIDChange(){
  var contry = $("#ChooseCountry").val();
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

function loadRaceCard_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.RCID != null || sRes.RCID != "" ){
        var listRCID =  sRes.RCID;
        var str = "";
        for(var i = 0;i < listRCID.length ; i++){
            str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID +"</option>";      
        } 
        $("#ChooseRace").html(str);
     }

     if(sRes.RCID == null || sRes.RCID == "")
     {
       $("#ChooseRace").val("");
     }
}

function loadListHorseNoChange()
{
   var RaceID = $("#ChooseRace").val();
   $.ajax({
            type:"POST",
            url:"home_controller/LoadListHorse",
            dataType:"text",
            data: {RaceID: RaceID},
            cache:false,
            success:function (data) {
                loadListHorse_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function loadListHorse_Complete(data)
{
    var sRes = JSON.parse(data);
     if(sRes.ListHorseInfo != null || sRes.ListHorseInfo != "" )
     {
        var listHInfo =  sRes.ListHorseInfo;
        var str = "";
        for(var i = 0;i < listHInfo.length ; i++){
            str = str + "<option value="+ listHInfo[i].rowid +">"+ listHInfo[i].HorseNoS +"</option>";      
        } 
        $("#ChooseHorse").html(str);
     }
}





