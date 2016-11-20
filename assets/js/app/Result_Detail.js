socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshResult'){
       loadresultdetail();
    }
});
$(document).ready(function() {
    loadresultdetail(); 
});

function loadresultdetail(){
    var country_url = getUrlParameter("country");
	var day = getUrlParameter("day");
    
    $.ajax({
            type:"POST",
            url: "../home_controller/loadresultdetail",
            dataType:"text",
            data: {
                    country: country_url,
                    day: day
                    },
            cache:false,
            success:function (data) {
                loadresultdetail_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function loadresultdetail_Complete(data){
    var sRes = JSON.parse(data);
    $("#tdraceresult").html(sRes.str_res);
}
function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}