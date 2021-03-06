$(document).ready(function(){
    SaveTickNotification();
    loadTickNotification();
});

$("input[id*='check_']").click(function () 
{     
     var sound          = "";
     var vibration      = "";
  
       if($('#check_sound').is(':checked'))
           sound = 1;
       else
           sound = 0;

       if($('#check_vibration').is(':checked'))
           vibration = 1;
       else
           vibration = 0;

       ReceivedNotification(sound,vibration);

});


function toggleState(item)
{
   if(item.className == "on") 
   {
      item.className="off";
      $("#btn_setpasscode").val("off");

   } 
   else 
   {
      item.className="on"; 
      $("#btn_setpasscode").val("on");
      document.location.href =  "../setting/setpasscode?getpcode=specailcode";
   }
}

function SaveTickNotification()
{
   $.ajax({
            type:"POST",
            url:"../home_controller/SaveTickNotification",
            dataType:"text",
            //data: {},
            cache:false,
            success:function (data) {
                SaveTickNotification_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function SaveTickNotification_Complete(data)
{
  
}

function loadTickNotification()
{
   $.ajax({
            type:"POST",
            url:"../home_controller/loadTickNotification",
            dataType:"text",
            //data: {},
            cache:false,
            success:function (data) {
                TickNotification_Complete(data);
                //alert(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function TickNotification_Complete(data)
{
    var sRes = JSON.parse(data);
    var l_noti = sRes.l_Notification;
    var sound;
    var vibration;
    if(l_noti.length > 0)
    {
      sound     = l_noti[0]['Sound'];
      vibration = l_noti[0]['Vibration'];
      if(sound == "1" || sound == 1)
      {
         $("#check_sound").prop("checked",true);
      }
      else
      {
        $('#check_sound').prop("checked",false);
      }

      if(vibration == "1" || vibration == 1)
      {
        $("#check_vibration").prop("checked",true);
      }
      else
      {
        $("#check_vibration").prop("checked",false);
      }
    }
}