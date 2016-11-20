//test node js
//$('#submit').bind("click",function(){
//	socket.emit('ControlRefresh', 'RefreshLiveTote');
//	return false;
//});
//end test node js

$(document).ready(function() 
{
	  loadHorseBoard();
    // $("#ContentConvert" ).keypress(function (event) 
    // {
    //     if (event.which == 13) { 
    //         SaveHorseInfo();
    //     }
    // });
});

function loadHorseBoard(){
    $.ajax({
            type:"POST",
            url:"home_controller/loadHorseBoard",
            dataType:"text",
            //data: {raceCountry: RaceCountry},
            cache:false,
            success:function (data) {
                loadHorseBoard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
    
}

function loadHorseBoard_Complete(data){
     var sRes = JSON.parse(data);
     var content;
      if(sRes.horseboard != "" || sRes.horseboard != null){
          var info = sRes.horseboard;
          if(info.length > 0){
              content = info[0].content;
              $("#ContentConvert").val(content);
          }
          else{
             $("#ContentConvert").val("");
          }
      }
}





function SaveHorseInfo(){
    var content = $("#ContentConvert").val();
    $.ajax({
              type:"POST",
              url:"home_controller/SaveHorseBoard",
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



