<!--main content start-->
  <section id="main-content">
      <section class="wrapper site-min-height">
          <div class="row">                  
              <div class="col-lg-12">
                <form class="form-horizontal" role="form">
                  <div class="panel">
                    <div class="panel-body">
                      <div class="form-group">
                      <div class="panel">
                      <div class="row">
                       <div class="col-md-12">
                            <div class="col-md-1"><label>Country</label></div>
                            <div class="col-md-4">
                                <select size="4" class="form-control" name="lstCategory" id="lstCategory" style="height:300px;width:200px;">
                                </select> 
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12"><label>Rename Country:</label></div>
                                <div class="col-md-12">
                                  English:<input name="txtCategory" class="form-control" type="text" id="txtCategory" style="width:210px;">
                                  Chiness:<input name="txtCategory" class="form-control" type="text" id="txtCategory_cn" style="width:210px;">
                                </div>
                                <br/>
                                <div class="col-md-12">
                                  <input type="file" name="file" required  id="file"/>
                                </div>
                                </br>
                                <div class="col-md-12">  
                                  <input type="button" class="btn"  name="btnEditCat" value="Save Name" id="btnEditCat" style="width:20%;" onclick="SaveCountry()">
                                </div>
                            </div>
                            <div class="col-md-2"><span id="sptb" style="color: red;"></span></div>
                         <br />   
                       </div>
                    </div>
                    <br/>
                    <div class="row">
                       <div class="col-md-12">

                          <div class="col-md-1"> <label>League</label></div>
                          <div class="col-md-4">
                               <select size="4" class="form-control" name="lstItems" id="lstItems" style="height:300px;width:250px;">       
                               </select>  
                          </div>
                          <div class="col-md-7">
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="col-md-6">
                                      <input type="button" name="btnDeleteItem" class="btn" value="Delete Item" id="btnDeleteItem" style="color:White;background-color:#FF3300;width:100px;" onclick="DeleteLeagueTable();">
                                    </div>
                                    <div class="col-md-6">
                                      <span id="sptbdelete" style="color: red;"></span>
                                    </div>
                                  </div>
                              </div>
                              <br>
                              <div class="row">
                                 <div class="col-md-12">
                                    <label>League Name:</label>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="col-md-3"><label>English:</label></div>
                                    <div class="col-md-6"><input name="txtItem" type="text"  id="txtLeague" class="form-control" ></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="col-md-3"><label>Chiness:</label></div>
                                    <div class="col-md-6"><input name="txtItem" type="text"  id="txtLeague_cn" class="form-control" ></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="col-md-4">
                                      <input type="button" class="btn" name="btnAddItem" value="Add Item" id="btnAddItem" style="color:White;background-color:#003300;width:100px;" onclick="AddLeagueTable();">
                                    </div>
                                    <div class="col-md-4">
                                      <input type="button" class="btn" name="btnEditItem" value="Save Name" id="btnEditItem" style="width:100px;" onclick="AddLeagueTable();">
                                    </div>
                                 </div>
                              </div>   
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
  <!--main content end