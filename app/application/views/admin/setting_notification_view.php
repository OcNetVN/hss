<!--main content start-->
  <section id="main-content">
      <section class="wrapper site-min-height" id="SecRaceInfo">
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
		                    	<div class="col-md-6">
		                    		<div class="col-md-4">
		                    			<label>Note Type</label>
		                    			<select name="cmbTypeNotifi" class="form-control" id="cmbTypeNotifi">
		                    				<option value="01">Horse Notifications</option>
		                    				<!-- <option value="02">Lottery Notifications</option> -->
		                    				<option value="03">Soccer Notifications</option>		                    				
		                    			</select>
		                    		</div>
		                    	</div>
		                    	<div class="col-md-4">
		                    			<a class="btn btn-danger" href="javascript:void(0)" type="button" onclick="DeleteHistoryNotification();">Clear History Notification</a>
		                    	</div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-12">
			                    	<div class="col-md-4">
			                    		<label>Type</label>
			                    		<select name="cmbTypeCon" class="form-control" id="cmbTypeCon">
			                    			<option value="0101">Racing Day</option>
			                    			<option value="0102">Tips</option>
			                    			<!-- option value="0201">West Malaysia</option>
			                    			<option value="0202">Singapore</option>
			                    			<option value="0203">East Malaysia</option> -->
			                    			<option value="0301">Tips</option>
			                    			<option value="0302">Goal</option>
			                    		</select>
			                    	</div>
			                    	
			                    </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-12">
		                    		<div class="col-md-4" id="div_TypeLottery" style="display:none;">
		                    			<label>Type Lottery</label>
		                    			<select id="cmbTypeLottery" class="form-control"></select>
		                    		</div>

		                    	</div>
		                    </div>
		                    <div class="row">
		                       <div class="col-md-12">
		                       		<div class="col-md-4">
		                                <label>List Customer</label>
		                                <select name="cmblist_custom" id="cml_custom" class="form-control" multiple="multiple">
		                                </select>
		                            </div> 
		                            <div class="col-md-6">
		                            	<br>
		                            	<label>All</label>
		                            	<input type="checkbox" value="ALL" id="SerialAll">
		                            </div>  
		                       </div>
		                    </div>
		                    <div class="row">
		                       <div class="col-md-12">
		                          <div class="col-md-5">
		                          	<label>Content</label>
		                          	<textarea rows="6" class="form-control" id="ContentConvert"></textarea>
		                          </div>
		                       </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-12">
			                       <div class="col-md-5">
			                       	    <label>Links</label>
			                       		<input type="text" id="txtUpChine" class="form-control" placeholder="" id="txtUpChine">
			                       </div>
			                    </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-12">
		                    		<div class="col-md-5">
		                    			<span id="spantb" style="color:red"></span>
		                    		</div>
		                    	</div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-12">
			                       <div class="col-md-5">
			                       		<a class="btn btn-primary" href="javascript:void(0)" type="button" onclick="SendNotification();">Send</a>
										<a class="btn btn-primary" href="javascript:void(0)" type="button" id="gotoearly">Clear</a>
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