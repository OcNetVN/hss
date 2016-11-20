$(document).ready(function() { 
    LoadCategory();

    // change Race Card ID
    $('#lstCategory').change(function(){  
       LoadSubCategory();
       var cate = $("#lstCategory").val();
       var cate_value = $('select[name=lstCategory] option:selected').text();
       $("#txtCategory").val(cate_value); 
   }).trigger('change');
   //lstItems
    $('#lstItems').change(function(){  
        LoadItemsSubCategory();
       // var subcate = $("#lstItems").val();
       // var subcate_value = $('select[name=lstItems] option:selected').text();
       // $("#txtItem").val(subcate_value); 
   }).trigger('change');
    
});

function SaveCategory(){
    var cate = $("#lstCategory").val();
    var name = $("#txtCategory").val();
    $.ajax({
            type:"POST",
            url: "home_controller/SaveCategory",
            dataType:"json",
            data: {Cate: cate,
                   Name: name},
            cache:false,
            success:function (data) {
                    SaveCategory_Complete(data);
            }
   }); 
}


function SaveCategory_Complete(data){
    $("#sptb").text("Save successful ");
     LoadCategory();
}
function AddItem(){
    var cate = $("#lstCategory").val();
    var subcate = $("#lstItems").val();
    var ItemName = $("#txtItem").val();
    var ItemNameMn = $("#txtItemMan").val();
    $.ajax({
            type:"POST",
            url: "home_controller/AddItem",
            dataType:"json",
            data: {Cate: cate,
                   ItemName: ItemName,
                   ItemNameMn:ItemNameMn,
                   Subcate:subcate},
            cache:false,
            success:function (data) {
                    AddItem_Complete(data);
            }
   });
}
function AddItem_Complete(){
    LoadSubCategory();
}

//LoadSubCategory
function LoadSubCategory(){ 
   var Category = $("#lstCategory").val();
   $.ajax({
            type:"POST",
            url:"home_controller/loadsubcategory",
            dataType:"text",
            data: {Category: Category},
            cache:false,
            success:function (data) {
                LoadSubCategory_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function LoadSubCategory_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.SubCate != null || sRes.SubCate != "" ){
        var listCate =  sRes.SubCate;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].enCont +"</option>";      
        } 
        $("#lstItems").html(str);
     }
}

// load data item for paramete
function LoadItemsSubCategory(data)
{
    var Item = $("#lstItems").val();
   $.ajax({
            type:"POST",
            url:"home_controller/loadsubItem",
            dataType:"text",
            data: {Item: Item},
            cache:false,
            success:function (data) {
                LoadsubItem_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}
// end load data item for paramete
function LoadsubItem_Complete(data)
{
   var sRes = JSON.parse(data);
   var enCont = "";
   var cnCont = "";
   if(sRes.Result == 1 || sRes.Result == "1")
   {
      var ItemDetail = sRes.ItemDetail;
      if(ItemDetail.length > 0)
      {
           enCont = ItemDetail[0].enCont;
           cnCont = ItemDetail[0].cnCont;
           $("#txtItem").val(enCont);
           $("#txtItemMan").val(cnCont);
      }
   }

}
// load List Race Card ID
function LoadCategory(){ 
   $.ajax({
            type:"POST",
            url:"home_controller/loadcategory",
            dataType:"text",
            //data: {contry: contry},
            cache:false,
            success:function (data) {
                loadCategory_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
}

function loadCategory_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.Category != null || sRes.Category != "" ){
        var listCate =  sRes.Category;
        var str = "";
        for(var i = 0;i < listCate.length ; i++){
            str = str + "<option value="+ listCate[i].id +">"+ listCate[i].enCont +"</option>";      
        } 
        $("#lstCategory").html(str);
     }
}


function DeleteItem(){
    var subCate = $("#lstItems").val();
    $.ajax({
            type:"POST",
            url:"home_controller/deleteItem",
            dataType:"text",
            data: {subCate: subCate},
            cache:false,
            success:function (data) {
                deleteItem_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }); 
    
}

function deleteItem_Complete(data){
    $("#sptbdelete").text("Delete Item successful");
    LoadSubCategory();
}

