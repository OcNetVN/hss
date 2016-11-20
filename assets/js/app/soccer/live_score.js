socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshHorseInfoBoard'){
       loadSoccerinfo();
    }
});
$(document).ready(function() {
    loadSoccerinfo(); 
});

function loadSoccerinfo(){
    $.ajax({
            type:"POST",
            url: "../home_controller/loadSoccerinfo",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                loadSoccerinfo_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}

function loadSoccerinfo_Complete(data)
{
    var sRes = JSON.parse(data);
    var createday;
    var nodung;
    var name;
    var txtcontent;
    var dulieu;
    var str = "";
    if(sRes.req == 1 || sRes.req == "1")
    {
        var SoccerInfo = sRes.Soccerinfo;
        if(SoccerInfo.length > 0)
        {
            for(var i=0 ; i < SoccerInfo.length;i++)
            {
                createday = SoccerInfo[i].CreatedDate;
                nodung   = SoccerInfo[i].content;
                dulieu   = nodung.split("\n");
                name    = dulieu[0];
                if(typeof name == "undefined")
                    name = "";
                txtcontent =  dulieu[1];
                if(typeof txtcontent == "undefined")
                    txtcontent = "";
                if(typeof nodung == "undefined")
                    nodung = "";
                // str = str + "<tr><td>"+name+"</td>";
                // str = str + "<td>"+createday+"</td>"
                // str = str  + "</tr>";
                str = str + "<tr><td colspan=\"2\">"+nodung+ " " + createday +"</td></tr>";

            }
            $("#loadHorseInfo").html(str);
        }
    }
}
