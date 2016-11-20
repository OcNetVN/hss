$(document).ready(function(){
});

socket.on('SoccerTODAY',function(res)
{
    var type = res._type;
	var lang = res._lang;
	var data = res.send;
	var _lang = "";
    _lang = getUrlParameter("lang");
    if(_lang == "" || _lang == null)
        _lang = 1;
	if(type == "live")
	{
		if(_lang ==  lang)
		{
			$("#showInfoEarly").html(" ");
            $("#showInfoEarly").html(data); 
	    }
	}

});

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