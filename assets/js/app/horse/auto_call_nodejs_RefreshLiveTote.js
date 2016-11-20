$(document).ready(function() {
    nodejs_auto_call(); 
});

function nodejs_auto_call(){
    var country         =   getUrlParameter("country");
    var str_flag        =   getUrlParameter("flag");
    //var str_flag        =   "MY__SG__HK";
    if(str_flag == "" || str_flag == null)
    {
        var listflag    =   [];
    }
    else
    {
        var listflag    =   add_arr_flag(str_flag);//return;
    }
    var Rel             =   country + "|" + listflag;
    socket.emit('RefreshLiveTote', Rel);
    //alert(Rel);return;
}
function add_arr_flag(str_flag)
{
    var list         =   str_flag.split('__');
    /*for(var i = 0; i < list.length; i++)
    {
        alert(list[i]);
    }*/
    return list;
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