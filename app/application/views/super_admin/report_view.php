    <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              
              <!-- table start -->
              <div class="row">                  
                  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo $this->lang->line(LANG_REPORT);  ?>
                          </header>
                          <table class="table table-hover table-bordered">
                              
                              <tbody>
                              <tr>
                                  <td><?php echo $this->lang->line(LANG_TOTAL_ACTIVE_AGENT);  ?>:</td>
                                  <td><span id="ac_agent"></span></td>
                              </tr>
                              <tr>
                                  <td><?php echo $this->lang->line(LANG_TOTAL_INACTIVE_AGENT);  ?>:</td>
                                  <td><span id="inac_agent"></span></td>
                              </tr>
                              <tr>
                                  <td><?php echo $this->lang->line(LANG_TOTAL_ACTIVE_CUSTOMER);  ?>:</td>
                                  <td><span id="ac_cus"></span></td>
                              </tr>
                              <tr>
                                  <td><?php echo $this->lang->line(LANG_TOTAL_INACTIVE_CUSTOMER);  ?>:</td>
                                  <td><span id="inac_cus"></span></td>
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