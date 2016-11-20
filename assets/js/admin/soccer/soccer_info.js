$(document).ready(function() 
{
	  //loadHorseBoard();
});

function SaveSoccerInfo(){
    var content = $("#ContentConvert").val();
    $.ajax({
              type:"POST",
              url:"../home_controller/SaveSoccerInfo",
              dataType:"text",
              data: {content:content},
              cache:false,
              success:function (data) {
                  SaveHorseBoard_Complete(data);
                  //socket.emit('SaveToteMala', "RefreshMala" );
              },
              error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
     });
  
}

function SaveHorseBoard_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.req == 1 || sRes.req == "1"){
      socket.emit('PageRefresh', "RefreshHorseInfoBoard" );
      $("#tbSpan").text("Save success");
    }
    if(sRes.req == ""){
      $("#tbSpan").text("");
    }
}

function ClearInfo(){
  $("#ContentConvert").val("");
}



