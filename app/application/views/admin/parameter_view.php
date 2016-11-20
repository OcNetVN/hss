<!--main content start-->
  <section id="main-content">
      <section class="wrapper site-min-height">
          <!-- page start-->
          
          <!-- table start -->
          <div class="row">                  
              <div class="col-lg-12">
                <form class="form-horizontal" role="form">
                  <div class="panel">
                    <div class="panel-body">
                      <div class="form-group">
                      <div class="panel">
                      <div class="row">
                       <div class="col-md-12">
                            <div class="col-md-1"><label>Category</label></div>
                            <div class="col-md-3">
                                <select size="4" name="lstCategory" id="lstCategory" style="background-color:#FFFF99;height:300px;width:200px;">
                                    <!--<option selected="selected" value="testin">testin</option>
                                    <option value="chg jocky">chg jocky</option>
                                    <option value="horse">horse</option>
                                    <option value="my horse">my horse</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>-->
                                </select> 
                            </div>
                
                            <div class="col-md-5">
                                  <label>Rename Category:</label>
                                  <input name="txtCategory" type="text" id="txtCategory" style="width:210px;">
                                  <input type="button" class="btn" name="btnEditCat" value="Save Name" id="btnEditCat" style="width:20%;" onclick="SaveCategory()">
                            </div>
                            <div class="col-md-2"><span id="sptb" style="color: red;"></span></div>
                         <br />   
                       </div>
                    </div>
                    <br/>
                    <div class="row">
                       <div class="col-md-12">
                          <div class="col-md-1"> <label>Sub Category</label></div>
                          <div class="col-md-4">
                               <select size="4" name="lstItems" id="lstItems" style="background-color:#FFFF99;height:300px;width:250px;">
                                    <option value="">goal</option>
                                    <option value="网出 10=4.20">Net Price 10=4.20</option>
                               </select>  
                          </div>
                          <div class="col-md-7">
                               <input type="button" name="btnDeleteItem" class="btn" value="Delete Item" id="btnDeleteItem" style="color:White;background-color:#FF3300;width:100px;" onclick="DeleteItem();">
                               <span id="sptbdelete" style="color: red;"></span>
                                <br><br>
                                <b>English :</b>
                                <input name="txtItem" type="text"  id="txtItem" class="form-control" >
                                <br><br>
                                <b>Chinese :</b>
                                <input name="txtItemMan" type="text"  id="txtItemMan" class="form-control" >
                                <br><br>
                                <input type="button" class="btn" name="btnAddItem" value="Add Item" id="btnAddItem" style="color:White;background-color:#003300;width:100px;" onclick="AddItem();">
                                &nbsp;
                                <input type="button" class="btn" name="btnEditItem" value="Save Name" id="btnEditItem" style="width:100px;" onclick="AddItem();">
                          </div>
                          
                               
                                        
                          </div> 
                        </div> 
                     </div>
                       
                      </div>
                    </div>  
                    </div>
            </form>
                </div>
          </div>
          <!-- table end -->
        
          <!-- page end-->
      </section>
  </section>
  <!--main content end-->