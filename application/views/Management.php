<div class="container-fluid">
<div class="row">

    <div class="col-md-3" style="height:100%;">
    	
        
        <ul class="rdo_nav" style="">
        
            <h4 style="color:#666; padding-bottom:20%;">
            <i class="fa fa-user prefix" ></i> Welcome, <?php echo $this->session->userdata('LoginData')['Fullname']; ?> 
            </h4>
            
            <div class="md-form">
                <i class="fa fa-search prefix" style="font-size:100%; padding-top:10%;"></i>
                <input type="text" name="rdo_search" id="rdo_search" class="form-control">
                <label for="form2">Search...</label>
            </div>
            
            <hr/>
        
        	<li>
                <div class="btn-group" style="width:100%;">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background-color:#cc0000">Research Category</button>
                    <div class="dropdown-menu rdo-drop category-filter-panel">
                    </div>
                </div>
            </li>
            
            <li>
                <div class="btn-group" style="width:100%;">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background-color:#cc0000"">Sort By Department</button>
                    <div class="dropdown-menu department-filter-panel">
                    </div>
                </div>
            </li>

            <li>
                <div class="btn-group" style="width:100%;">
                    <button type="button" id="unpublished" value="0" class="btn btn-primary waves-effect waves-light" style="width:100%; background-color:#cc0000" "=""><i class="fa fa-lock" aria-hidden="true"></i> Unpublished</button>   
                </div>
            </li>
                        
            <li>
                <div class="btn-group" style="width:100%;">
                </div>
            </li>
            
            <li>
                <div class="btn-group" style="width:100%;">
                </div>
            </li>
            
            <li style="text-align:center">
                <button class="btn btn-rdo AccountSettings">
                    Account Settings
                </button>
            </li>

            <li style="text-align:center">
                <a href="<?php echo base_url(); ?>index.php/Login/Logout">
                    <button class="btn btn-rdo">Logout</button>
                </a>
            </li>
            
        </ul>
        
    </div>

    <div class="col-md-9">

        <!-- Nav tabs -->
        <?php $usertype = $this->session->userdata('LoginData')['Usertype']; ?>
        <?php if($usertype == $this->usertypes['teacher'] || $usertype == $this->usertypes['student']): ?>
            <ul class="nav nav-tabs nav-justified" role="tablist" id="rdo_tab" style="">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Files</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel8" role="tab" style=""><i class="fa fa-list-ul" aria-hidden="true"></i> Manage Categories</a>
                </li>


                <?php if($usertype != $this->usertypes['external']): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user"></i> Manage Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel9" role="tab"><i class="fa fa-plus"></i> Add Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel11" role="tab"><i class="fa fa-user"></i> Manage External Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel10" role="tab"><i class="fa fa-plus"></i> Add External Peer</a>
                    </li>
                <?php endIf; ?>    

            </ul>
        <?php endIf; ?>

        <!-- Tab panels -->
        <div class="tab-content" id="rdo_content" style="margin-top:10%; margin-bottom:10%;">

            <!--File Panel-->
            <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
                <div class="container">
                    <h3>Filters:  <span id="filter_message" style="color:Green; Display:None"></span></h3>
                        <div class="active-filters">
                        </div>
                    <hr>
                    <div class="row rdo-files-panel" style="height:100%; overflow:auto; padding-bottom: 10%;">
                        <!-- Where files will be displayed -->
                    </div>
                </div>
            </div>
            <!--/.File Panel-->
            
            <!--File Uploader-->
            <div class="tab-pane fade" id="panel6" role="tabpanel">
            
                <form action="<?php echo base_url(); ?>index.php/Main/AjaxNewFile" method="post" id="New_File" class="rdo_upload" enctype="multipart/form-data">

                    <h5 id="newfile_message"></h5>

                    <!--File Name-->
                    <div class="md-form form-sm">
                        <input name="filename_new" type="text" id="filename_new" class="form-control" data-error="#filename_new">
                        <label for="filename_new" class="active">File Name</label>
                    </div>
                    <!--File Name-->

                    <!--Author(s)-->
                        <div class="md-form form-sm">
                        <input name="author_new" type="text" id="author_new" class="form-control" data-error="#author_new">
                        <label for="author_new" class="active">Author(s)</label>
                    </div>
                    <!--Author(s)-->

                    <!--Full name-->
                    <div class="form-group">
                        <label for="abstract_new">Description / Abstract</label>
                        <textarea class="form-control rounded-0" id="abstract_new" name="abstract_new" rows="10"></textarea>
                    </div>
                    <!--Full name-->

                    <br>
                    <!-- Category / Department Dropdown -->
                    <div class="row" style="width:100%">

                        <div class="col-md-12">
                            <select class="browser-default custom-select custom-select-lg mb-3 modal-category-select-new" name="file_category_new" style="width:100%">
                                <option value="0" selected>Uncategorized</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <select class="browser-default custom-select  modal-department-select-new" name="file_department_new" style="width:100%">
                                <option value="0" selected>Uncategorized</option>
                            </select>
                        </div>

                    </div>
                    <!-- Category / Department Dropdown -->

                    <br>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <label for="new_pdf_upload" class="custom-file-upload btn btn-info">
                                Upload PDF
                            </label>
                            <input type="file" id="new_pdf_upload" style="display:none" name="PDF_New_File">
                        </div>

                        <div class="col-md-12">
                            <h6 class="new_pdf_filename" style="position: relative">
                                NO FILE SELECTED
                            </h6>
                        </div>

                    </div>

                    <hr>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary center-block">Submit</button>
                    </div>

                </form>
                    
            </div>
            <!--/.File Uploader-->
            
            <!--Account Manager-->
            <div class="tab-pane fade" id="panel7" role="tabpanel">

                <h4>Manage Account</h4>
                    <br>
                <!--Category Search-->
                <div class="md-form form-sm">
                    <input name="account_search" type="text" id="account_search" class="form-control" data-error="#account_search">
                    <label for="account_search" class="active">Search Account (Press Enter to Search)</label>
                </div>
                <!--Category Search-->

                <br>
                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="account_manage_list">

                    </tbody>
                </table>
            
            </div>
            <!--/.Account Manager-->

            <!-- External Account Manager-->
            <div class="tab-pane fade" id="panel11" role="tabpanel">

                <h4>Manage External Account</h4>
                    <br>
                <!--Category Search-->
                <div class="md-form form-sm">
                    <input name="external_account_search" type="text" id="external_account_search" class="form-control" data-error="#external_account_search">
                    <label for="external_account_search" class="active">Search External Account (Press Enter to Search)</label>
                </div>
                <!--Category Search-->

                <br>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="external_account_list">

                    </tbody>
                </table>

            </div>
            <!--/.External Account Manager-->
            
            <!--Category Manager / Add-->
            <div class="tab-pane fade" id="panel8" role="tabpanel" style="">
            	<br />
                    
                    <h2 id="category_message"></h2>

                    <!--Category list-->

                    <!--Category Search-->
                    <div class="md-form form-sm">
                        <input name="category_search" type="text" id="category_search" class="form-control" data-error="#category_search">
                        <label for="category_search" class="active">Search Category (Press Enter to Search)</label>
                    </div>
                    <!--Category Search-->


                    <!--Category add-->
                    <button type="button" class="btn btn-lg btn-rdo" data-toggle="modal" data-target="#newCategory">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Add Category 
                    </button>
                    <!--Category add-->

                    <br><br><br>
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="category_manage_list">
                            
                        </tbody>
                    </table>

            </div>
            <!--/.Category Manager / Add-->
            
            <!--Add account Panel-->
            <div class="tab-pane fade" id="panel9" role="tabpanel" style="">
                
                <h4>Add Account</h4>

                <hr>

                <h5 id="addAccount_message" style="color:#666"></h5>
                <br>

            	<form action="<?php echo base_url(); ?>index.php/Main/AjaxAddAdmin" method="post" id="addAdmin_form">

                	<!--Username-->
                    <div class="md-form form-sm">
                        <input name="add_rdo_admin_username" type="text" id="add_rdo_admin_username" class="form-control" data-error="#add_rdo_admin_username">
                        <label for="add_rdo_admin_username" class="">Username</label>
                    </div>
                    <!--Username-->
                    
                    <!--Full name-->
                    <div class="md-form form-sm">
                        <input name="add_rdo_admin_name" type="text" id="add_rdo_admin_name" class="form-control" data-error="#add_rdo_admin_name">
                        <label for="add_rdo_admin_name" class="">Full name</label>
                    </div>
                    <!--Full name-->
                    
                    <!--Password-->
                    <div class="md-form form-sm">
                        <input name="add_rdo_admin_pass1" type="password" id="add_rdo_admin_pass1" class="form-control" data-error="#add_rdo_admin_pass1_error">
                        <label for="add_rdo_admin_pass1" class="">Password</label>
                    </div>
                    <!--Password-->
                    
                    <!--Retype Password-->
                    <div class="md-form form-sm">
                        <input name="add_rdo_admin_pass2" type="password" id="add_rdo_admin_pass2" class="form-control" data-error="#add_rdo_admin_pass2">
                        <label for="add_rdo_admin_pass2" class="">Retype Password</label>
                    </div>
                    <!--Retype Password-->
                    
                    <button type="button" class="btn btn-lg btn-rdo addAccount_Button">
                        Submit
                    </button>

                </form>

            </div>
            <!--/.Add account Panel-->

            <!--External Peer-->
            <div class="tab-pane fade" id="panel10" role="tabpanel" style="">

                <h4>Add External Peer</h4>

                <br>

                <h5 class="peer_message" style="color:green"></h5>

                <hr>

                <form action="<?php echo base_url(); ?>index.php/Main/AjaxAddPeer" method="post" id="AddPeerForm">

                    <!--Username-->
                    <div class="md-form form-sm">
                        <input name="PeerUsername" type="text" class="form-control" required>
                        <label for="PeerFullname" class="">Username</label>
                    </div>
                    <!--Username-->
                    
                    <!--Full name-->
                    <div class="md-form form-sm">
                        <input name="PeerFullname" type="text" class="form-control" required>
                        <label for="PeerFullname" class="">Full name</label>
                    </div>
                    <!--Full name-->
                    
                    <!--Password-->
                    <div class="md-form form-sm">
                        <input name="PeerPassword" type="password" class="form-control" required>
                        <label for="PeerPassword" class="">Password</label>
                    </div>
                    <!--Password-->
                    
                    <!--Retype Password-->
                    <div class="md-form form-sm">
                        <input name="PeerPassword_Retype" type="password" class="form-control" required>
                        <label for="PeerPassword_Retype" class="">Retype Password</label>
                    </div>
                    <!--Retype Password-->
                    
                    <button type="submit" class="btn btn-lg btn-rdo" data-toggle="modal">
                        Submit
                    </button>

                </form>

            </div>
            <!--/.External Peer-->

            
        </div>
    	<!-- /Nav tabs -->
        
       <br><br>
    </div>


</div>
</div>

<?php if($usertype == $this->usertypes['teacher'] || $usertype == $this->usertypes['student']): ?>

    <div class="modal fade" id="FileEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-fileid="">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Edit File: <br><b id="editTitle"></b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                        <br>
                        <form action="<?php echo base_url(); ?>index.php/Main/AjaxUpdateFile" method="post" id="File_Edit_Upload" class="rdo_upload" enctype="multipart/form-data">


                            <input type="hidden" id="FileID" name="FileID" value="">
        
                            <!--File Name-->
                            <div class="md-form form-sm">
                                <input name="filename_edit" type="text" id="filename_edit" class="form-control" data-error="#filename_edit">
                                <label for="filename_edit" class="active">File Name</label>
                            </div>
                            <!--File Name-->

                            <!--Author(s)-->
                                <div class="md-form form-sm">
                                <input name="author_edit" type="text" id="author_edit" class="form-control" data-error="#filename_edit">
                                <label for="author_edit" class="active">Author(s)</label>
                            </div>
                            <!--Author(s)-->
                            
                            <!--Full name-->
                            <div class="form-group">
                                <label for="abstract_edit">Description / Abstract</label>
                                <textarea class="form-control rounded-0" id="abstract_edit" name="abstract_edit" rows="10"></textarea>
                            </div>
                            <!--Full name-->
                            
                            <br>
                            <!-- Category / Department Dropdown -->
                            <div class="row" style="width:100%">

                                <div class="col-md-12">
                                    <select class="browser-default custom-select custom-select-lg mb-3 modal-category-select" name="file_category_edit" style="width:100%">

                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <select class="browser-default custom-select  modal-department-select" name="file_department_edit" style="width:100%">

                                    </select>
                                </div>

                            </div>
                            <!-- Category / Department Dropdown -->

                            <br>
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <label for="pdf_upload" class="custom-file-upload btn btn-info">
                                        Upload PDF
                                    </label>
                                    <input type="file" id="pdf_upload" style="display:none" name="PDF_Edit_File">
                                </div>

                                <div class="col-md-6">
                                    <h6 class="pdf_filename" style="position: relative">
                                        NO FILE SELECTED
                                    </h6>
                                </div>

                            </div>

                        </form>

                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <h5 id="updatemessage" style="text-align:left"></h5>
                    <button type="button" class="btn btn-rdo" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" id="ViewFile"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                    <button type="button" class="btn btn-danger" id="DeleteEntry"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    <button type="button" class="btn btn-primary" id="updateFile">Save changes</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

<?php endIf; ?>

<div class="modal fade" id="ModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-fileid="">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-body" style="text-align:center; padding:20px">

                <h4 id="ModalMessageText"></h4>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<!-- New Category -->
<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                
                <form id="category_form_new" method="post" action="<?php echo base_url(); ?>index.php/Main/AjaxNewCategory" >
                        
                    <!--Category Name-->
                    <div class="md-form form-sm">
                        <input type="text" id="CategoryName" name="CategoryName" class="form-control" data-error="#CategoryName" required="required">
                        <label for="CategoryName" class="">Category Name</label>
                    </div>
                    <!--Category Name-->

                </form>

            </div>
            <!--Footer-->
            <div class="modal-footer">

                <h4 id="new_category_error" style="text-align:left"></h4>

                <button type="button" class="btn btn-rdo" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-rdo newCategoryButton">Save changes</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- New Category -->

<!-- Update Category -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Update Category: <span id="category_update_label"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <!--Category Name-->
                <div class="md-form form-sm">
                    <input type="hidden" id="categoryEditID">
                    <input type="text" id="cat_name_edit" name="cat_name_edit" class="form-control" data-error="#cat_name_edit" required="required">
                    <label for="cat_name_edit" class="">Category Name *</label>
                </div>
                <!--Category Name-->
            </div>
            <!--Footer-->
            <div class="modal-footer">

                <h4 id="category_update_message" style="text-align:left"></h4>

                <button type="button" class="btn btn-rdo" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-rdo categoryEditSubmit" data-categoryid="">Save changes</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Update Category -->

<!-- Update Account -->
<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Update Account: <span id="account_update_label"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                
                <form action="<?php echo base_url(); ?>index.php/Main/AjaxUpdateAdmin" method="post" id="editAdmin_form">

                    <!--Username-->
                    <div class="md-form form-sm">
                        <input name="edit_current_admin_username" type="hidden" id="edit_current_admin_username" class="form-control">
                        <input name="edit_rdo_admin_username" type="text" id="edit_rdo_admin_username" class="form-control">
                        <label for="edit_rdo_admin_username" class="">Username</label>
                    </div>
                    <!--Username-->

                    <!--Full name-->
                    <div class="md-form form-sm">
                        <input name="edit_rdo_admin_name" type="text" id="edit_rdo_admin_name" class="form-control">
                        <label for="edit_rdo_admin_name" class="">Full name</label>
                    </div>
                    <!--Full name-->

                    <!--Password-->
                    <div class="md-form form-sm">
                        <input name="edit_rdo_admin_pass1" type="password" id="edit_rdo_admin_pass1" class="form-control">
                        <label for="edit_rdo_admin_pass1" class="">Password</label>
                    </div>
                    <!--Password-->

                    <!--Retype Password-->
                    <div class="md-form form-sm">
                        <input name="edit_rdo_admin_pass2" type="password" id="edit_rdo_admin_pass2" class="form-control">
                        <label for="edit_rdo_admin_pass2" class="">Retype Password</label>
                    </div>
                    <!--Retype Password-->

                    <!--Admin ID-->
                    <input type="hidden" id="edit_admin_ID" value="" name="edit_admin_ID">
                    <!--Admin ID-->

                </form>

            </div>
            <!--Footer-->
            <div class="modal-footer">

                <h4 id="admin_update_message" style="text-align:left"></h4>

                <button type="button" class="btn btn-rdo" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-rdo accountEditSubmit" data-categoryid="">Save changes</button>
                
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Update Account -->

<!-- Update External Account -->
<div class="modal fade" id="editExternalAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Update External Account: <span id="external_account_update_label"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                
                <form action="<?php echo base_url(); ?>index.php/Main/AjaxUpdateExternal" method="post" id="editExternal_form">

                    <!--Username-->
                    <div class="md-form form-sm">
                        <input name="edit_current_external_username" type="hidden" id="edit_current_external_username" class="form-control">
                        <input name="edit_rdo_external_username" type="text" id="edit_rdo_external_username" class="form-control">
                        <label for="edit_rdo_external_username" class="">Username</label>
                    </div>
                    <!--Username-->

                    <!--Full name-->
                    <div class="md-form form-sm">
                        <input name="edit_rdo_external_name" type="text" id="edit_rdo_external_name" class="form-control">
                        <label for="edit_rdo_external_name" class="">Full name</label>
                    </div>
                    <!--Full name-->

                    <!--Password-->
                    <div class="md-form form-sm">
                        <input name="edit_rdo_external_pass1" type="password" id="edit_rdo_external_pass1" class="form-control">
                        <label for="edit_rdo_external_pass1" class="">Password</label>
                    </div>
                    <!--Password-->

                    <!--Retype Password-->
                    <div class="md-form form-sm">
                        <input name="edit_rdo_external_pass2" type="password" id="edit_rdo_external_pass2" class="form-control">
                        <label for="edit_rdo_external_pass2" class="">Retype Password</label>
                    </div>
                    <!--Retype Password-->

                    <!--Admin ID-->
                    <input type="hidden" id="edit_external_ID" value="" name="edit_external_ID">
                    <!--Admin ID-->

                </form>

            </div>
            <!--Footer-->
            <div class="modal-footer">

                <h4 id="external_update_message" style="text-align:left"></h4>

                <button type="button" class="btn btn-rdo" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-rdo externalAccountEditSubmit" data-categoryid="">Save changes</button>
                
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Update External Account -->

<!-- Account Settings -->
<div class="modal fade" id="AccountSettingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Account Settings: <span id="account_update_label"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                
                <form action="<?php echo base_url(); ?>index.php/Main/AjaxUpdateAdmin" method="post" id="accountSettings_form">

                    <!--Username-->
                    <div class="md-form form-sm">
                        <input name="current_username" type="hidden" id="current_username" class="form-control">
                        <input name="update_username" type="text" id="update_username" class="form-control">
                        <label for="update_username" class="">Username</label>
                    </div>
                    <!--Username-->

                    <!--Full name-->
                    <div class="md-form form-sm">
                        <input name="update_name" type="text" id="update_name" class="form-control">
                        <label for="update_name" class="">Full name</label>
                    </div>
                    <!--Full name-->

                    <!--Password-->
                    <div class="md-form form-sm">
                        <input name="update_password" type="password" id="update_password" class="form-control">
                        <label for="update_password" class="">Password</label>
                    </div>
                    <!--Password-->

                    <!--Retype Password-->
                    <div class="md-form form-sm">
                        <input name="update_password_retype" type="password" id="update_password_retype" class="form-control">
                        <label for="update_password_retype" class="">Retype Password</label>
                    </div>
                    <!--Retype Password-->

                </form>

            </div>
            <!--Footer-->
            <div class="modal-footer">

                <h4 id="setting_message" style="text-align:left"></h4>
                <button type="button" class="btn btn-rdo" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-rdo settingSubmit" data-categoryid="">Save changes</button>
                
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Account Settings -->
   