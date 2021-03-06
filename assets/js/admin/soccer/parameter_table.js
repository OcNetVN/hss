$(document).ready(function() { 
    //LoadCategory();
    LoadAllTables();

    // change Race Card ID
    $('#lstCategory').change(function(){  
       //LoadCountry();
       LoadLeagueTable();
       //var cate = $("#lstCategory").val();
       //var cate_value = $('select[name=lstCategory] option:selected').text();
       //$("#txtCategory").val(cate_value); 
   }).trigger('change');
   //lstItems
    $('#lstItems').change(function(){  
        //LoadItemsSubCategory();
        LoadInforLeague();
   }).trigger('change');
    
});

function SaveCountry(){
    var cate    = $("#lstCategory").val();
    var name    = $("#txtCategory").val();
    var name_cn = $("#txtCategory_cn").val();
    var check = true;
    var str = "";
    if(name == "")
    {
      check = false;
      str   = "Please input Name Country";
    }
    if($("#file").val() == "")
    {
      check = false;
      str   = "Please select  flag for country";
    }
      
    
    if(check ==  true)
    {
        var formData = new FormData();
        formData.append('file',$('#file').prop('files')[0]);
        formData.append('Cate',cate);
        formData.append('Name',name);
        formData.append('Name_cn',name_cn);
        $.ajax({
                type:"POST",
                url: "../admin/home_controller/SaveCountry",
                dataType:"text",
                // data: {Cate: cate,
                //        Name: name,
                //        image:formData
                //      },
                data:formData,
                //enctype: 'multipart/form-data',
                cache:false,
                processData: false,
                contentType: false,
                success:function (data) {
                        SaveCountry_Complete(data);
                }
       }); 
    }
    else
    {
        $("#sptb").text(str);
    }
    
}


function SaveCountry_Complete(data)
{
    var sRes = JSON.parse(data);
    var keq = sRes.result;
    var noti = sRes.str;
    if(keq == 1 || keq == "1")
    {
       socket.emit('PageAllTables', 'RefreshAllTables');
       $("#sptb").text("Save successful ");
       LoadAllTables();
    }
    if(keq == 0 || keq == "0")
      $("#sptb").text(noti);
}
function AddLeagueTable()
{
    var cate       = $("#lstCategory").val();
    var subcate    = $("#lstItems").val();
    var league     = $("#txtLeague").val();
    var league_cn  = $("#txtLeague_cn").val();
    //var venue      = $("#txtVenue").val();
    //var season     = $("#txtSeason").val();
    $.ajax({
            type:"POST",
            url: "../admin/home_controller/addLeagueTable",
            dataType:"text",
            data: {
                   idparent:cate,
                   subcate: subcate,
                   league: league,
                   league_cn: league_cn
                   //venue:venue,
                   //season:season
                 },
            cache:false,
            success:function (data) {
                    AddLeagueTable_Complete(data);
            }
   });
}
function AddLeagueTable_Complete(data){
    //LoadSubCategory();
    var sRes = JSON.parse(data);
    var kq = sRes.result
    if(kq == 1 || kq == "1")
    {
       socket.emit('PageLeagueTable','RefreshLeague');
       LoadLeagueTable();
    }   
}

//LoadSubCategory
function LoadLeagueTable(){ 
   var Category = $("#lstCategory").val();
   $.ajax({
            type:"POST",
            url:"../admin/home_controller/loadLeagueTable",
            dataType:"text",
            data: {Category: Category},
            cache:false,
            success:function (data) {
                LoadLeagueTable_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   }); 
}

function LoadLeagueTable_Complete(data)
{
     var sRes = JSON.parse(data);
     if(sRes.SubCate != null || sRes.SubCate != "" )
     {
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++)
        {
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].League +"</option>";      
        } 
        $("#lstItems").html(str);
        //$("#txtLeague").val("");
        //$("#txtVenue").val("");
        //$("#txtSeason").val("");
     }

     if(sRes.Country != null || sRes.Country != "")
     {
        var listCountry = sRes.Country;
        if(listCountry.length > 0)
        {
           $("#txtCategory").val(listCountry[0].CountryName);
           $("#txtCategory_cn").val(listCountry[0].CountryName_CN);
        }
     }
}

// load data item for paramete
function LoadInforLeague()
{
    var Item = $("#lstItems").val();
   $.ajax({
            type:"POST",
            url:"../admin/home_controller/LoadInforLeague",
            dataType:"text",
            data: {Item: Item},
            cache:false,
            success:function (data) {
                LoadInforLeague_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}
// end load data item for paramete
function LoadInforLeague_Complete(data)
{
   var sRes = JSON.parse(data);
   var league = "";
   var venue = "";
   var season = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      if(ItemDetail.length > 0)
      {
           league   = ItemDetail[0].League;
           league_cn = ItemDetail[0].League_cn
           venue   = ItemDetail[0].Venue;
           season  = ItemDetail[0].Season;
           $("#txtLeague").val(league);
           $("#txtLeague_cn").val(league_cn);
           $("#txtVenue").val(venue);
           $("#txtSeason").val(season);
      }
   }

}
// load List Race Card ID
function LoadAllTables(){ 
   $.ajax({
            type:"POST",
            url:"../admin/home_controller/loadAllTables",
            dataType:"text",
            //data: {contry: contry},
            cache:false,
            success:function (data) {
                LoadAllTables_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   }); 
}

function LoadAllTables_Complete(data){
     var sRes = JSON.parse(data);
     $("#lstCategory").html("");
     if(sRes.Category != null || sRes.Category != "" ){
        var listCate =  sRes.Category;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].CountryName +"</option>";      
        } 
        $("#lstCategory").html(str);
     }
}


function DeleteLeagueTable(){
    var subCate = $("#lstItems").val();
    $.ajax({
            type:"POST",
            url:"../admin/home_controller/deleteLeagueTable",
            dataType:"text",
            data: {subCate: subCate},
            cache:false,
            success:function (data) {
                deleteLeagueTable_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   }); 
    
}

function deleteLeagueTable_Complete(data){
    $("#sptbdelete").text("Delete League successful");
    //LoadSubCategory();
    LoadLeagueTable();
}

