 <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <!-- form add new username start -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Agent page
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-lg-12"><h3><a href="<?php echo base_url("admin/gen_statement"); ?>">Statement</a></h3></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Customer name:</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Username:</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Password:</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Confirm password:</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Contact:</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Agent:</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Status:</label>
                                        <div class="col-lg-10">
                                            <input name="sample-radio" id="radio-02" value="1" type="radio" checked> active
                                            <br />
                                            <input name="sample-radio" id="radio-03" value="0" type="radio"> inactive

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Fees:</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <input name="sample-radio" id="radio-02" value="1" type="radio" checked> RM
                                                    <br />
                                                    <input name="sample-radio" id="radio-03" value="0" type="radio"> $
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-lg-2 col-sm-2 control-label">Start with years viewMode</label>
                                      <div class="col-lg-3">

                                          <div data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                              <input type="text" value="12-02-2012" readonly size="16" class="form-control">
                                                  <span class="input-group-btn add-on">
                                                    <button class="btn btn-danger" type="button"><i class="icon-calendar"></i></button>
                                                  </span>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-sm-2 control-label">Remark:</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-danger">Save</button>
                                            <button type="submit" class="btn btn-defualt">Delete customer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- form add new username end -->
                <!-- table start -->
                  <div class="row">                  
                      <div class="col-sm-12">
                          <section class="panel">
                              <header class="panel-heading">
                                  Total customer:
                              </header>
                              <table class="table table-hover table-bordered">
                                  <thead>
                                  <tr>
                                      <th>Active</th>
                                      <th>Inactive</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">wong</a></td>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">wong1</a></td>
                                  </tr>
                                  <tr>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">feilong</a></td>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">feilong1</a></td>
                                  </tr>
                                  <tr>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">tan</a></td>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">tan1</a></td>
                                  </tr>
                                  <tr>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">chan</a></td>
                                      <td><a href="<?php echo base_url('admin/agent_page'); ?>">chan1</a></td>
                                  </tr>
                                  </tbody>
                              </table>                              
                              
                          </section>
                      </div>
                  </div>
                  <!-- table end -->
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->