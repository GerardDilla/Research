<?php //echo 'student: '.$this->session->userdata('StudentTab'); ?>
<?php //echo 'instructor: '.$this->session->userdata('TeacherTab'); ?>
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
                        <ul class="nav nav-tabs tabs-2" role="tablist" style="background-color:#cc0000">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel1" role="tab">Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Faculty / External Peer</a>
                            </li>
                        </ul>
                        <!-- Tab panels -->
                        <div class="tab-content card">
                            <!--Panel 1-->
                            <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                                <!--Form-->
                                <div clyss="card">
                                    <div class="card-block">
                                        <!--Header-->
                                        <div class="text-center">
                                            <h3> Student Portal account</h3>
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
                                        
                                        <form class="errorTxt" id="rdo_user_login" action="<?php echo base_url(); ?>index.php/Login/Init_StudentLogin" method="post">
                                        <span id="student_error_err"></span>
                                        <?php echo form_error('student_number'); ?>
                                        <br>
                                        <div class="md-form">
                                            <i style="font-size:20px" class="fa fa-user prefix"></i>
                                            <input type="text" name="student_number" id="student_number" class="form-control" data-error="#student_error_err">
                                            <label for="form3">Student Number</label>
                                        </div>
                                        
                                        <span id="student_pass_err"></span>
                                        <?php echo form_error('student_password'); ?>
                                        <br>
                                        <div class="md-form">
                                            <i style="font-size:20px" class="fa fa-lock prefix"></i>
                                            <input type="password" name="s_password" id="student_password" class="form-control" data-error="#student_pass_err">
                                            <label for="form2">Password</label>
                                        </div>
                                        
                                        
                                        <div class="text-center">
                                            <button style="background-color:#cc0000" name="loginstart" value="1" class="btn btn-primary btn-lg" type="submit">
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
                            <!--Panel 2-->
                            <div class="tab-pane fade" id="panel2" role="tabpanel">
                                <!--Form-->
                                <div clyss="card">
                                    <div class="card-block">
                                        <!--Header-->
                                        <div class="text-center">
                                            <h3> Teacher / External Peer account</h3>
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
                                        
                                        <form class="errorTxt" id="rdo_user_login" action="<?php echo base_url(); ?>index.php/Login/Init_TeacherLogin" method="post">
                                        <span id="student_error_err"></span>
                                        <?php echo form_error('student_number'); ?>
                                        <br>
                                        <div class="md-form">
                                            <i style="font-size:20px" class="fa fa-user prefix"></i>
                                            <input type="text" name="username" id="username" class="form-control" data-error="#student_error_err">
                                            <label for="form3">Username</label>
                                        </div>
                                        
                                        <span id="student_pass_err"></span>
                                        <?php echo form_error('student_password'); ?>
                                        <br>
                                        <div class="md-form">
                                            <i style="font-size:20px" class="fa fa-lock prefix"></i>
                                            <input type="password" name="t_password" id="student_password" class="form-control" data-error="#student_pass_err">
                                            <label for="form2">Password</label>
                                        </div>
                                        
                                        
                                        <div class="text-center">
                                            <button style="background-color:#cc0000" name="loginstart" value="1" class="btn btn-primary btn-lg" type="submit">
                                            Login
                                            </button>
                                            <hr>
                                        </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <!--/.Form-->
                            </div>  
                            <!--/.Panel 2-->
                            
                        </div>  
                      
                       
                    </div>
                    <!--/Second column-->
                </div>
            </div>
        </div>
    </div>
    <!--/.Mask-->
    

            
            


          