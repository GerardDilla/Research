
    <!--Mask-->
    <div class="view hm-black-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row" id="home">

                    <!--First column-->
                    <div class="col-lg-6">
                        <div class="description" style="text-align:center; line-height:300px;">
                           <img class="wow fadeInLeft" data-wow-delay="0.7s" src="<?php echo base_url(); ?>img/rdo logo.png" width="90%" height="auto" />
                            
                        </div>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-lg-6  wow fadeInRight" data-wow-delay="0.7s">
                      
                        <!-- Nav tabs -->
                        
                        <!-- Tab panels -->
                            <!--Panel 1-->
                            <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                               <!--Form-->
                                <div class="card">
                                    <div class="card-block">
                                        <!--Header-->
                                        <div class="text-center">
                                            <h3> Admin Account:</h3>
                                            <hr>
                                        </div>

                                        <?php if($this->session->flashdata('message')): ?>
                                            <h5 style="color:<?php echo $this->session->flashdata('color'); ?>">
                                                <?php if($this->session->flashdata('icon')): ?>
                                                    <i style="font-size:20px" class="fa <?php echo $this->session->flashdata('icon'); ?>"></i>
                                                <?php endIf; ?>
                                                <?php echo $this->session->flashdata('message'); ?>
                                            </h5>
                                        <?php endIf; ?>

                                        <!--Body-->
                                        <form class="errorTxt" action="<?php echo base_url(); ?>index.php/Login/Init_AdminLogin" method="post">
                                            <br>
                                            <div class="md-form">
                                                <i style="font-size:20px" class="fa fa-user prefix"></i>
                                                <input type="text" name="AdminUsername" id="admin_id" class="form-control" data-error="#mod_id_err" value="<?php echo set_value('admin_id'); ?>">
                                                <label for="form3">Username</label>
                                            </div>
                                            <br>
                                            <div class="md-form">
                                                <i style="font-size:20px" class="fa fa-lock prefix"></i>
                                                <input type="password" name="AdminPassword" id="admin_pass" class="form-control" data-error="#mod_pass_err">
                                                <label for="form2">Password</label>
                                            </div>
                                            <div class="text-center">          
                                                <button class="btn btn-primary btn-lg"  id="login_button" type="submit" style="background-color:#cc0000">
                                                Login
                                                </button>
                                                <hr>
                                            </div>
        								</form>
                                        
                                    </div>
                                </div>
                                <!--/.Form-->
                            </div>
                            <!--/.Panel 1-->
                           
                    </div>
                    <!--/Second column-->
                </div>
            </div>
        </div>
    </div>
    <!--/.Mask-->
            
            
            

          