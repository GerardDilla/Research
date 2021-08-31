
<div class="container-fluid">
<div class="row">

    <div class="col-md-3" style="height:100%;">
    	
        
        <ul class="rdo_nav" >
        
            <h4 style="color:#666" style="font-size:100%;">
            <i class="fa fa-user prefix" ></i> Welcome, <?php echo $user_name; ?>! 
            </h4>
            <br />
            <br />
            <br />
            <div class="md-form">
            <form action="<?php echo base_url(); ?>index.php/Userpage/Main" method="get">
                <i class="fa fa-search prefix" style="font-size:100%; padding-top:10%;"></i>
                <input type="text" name="rdo_search" id="form2" class="form-control">
                <label for="form2">Search...</label>
            </form>
            </div>
            
            <hr />
        
        
        	<li>
            
             <div class="btn-group" style="width:100%;">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background-color:#cc0000">Research Category</button>
            
                <div class="dropdown-menu rdo-drop">
                <form action="<?php echo base_url(); ?>index.php/Userpage/Main" method="post" id="re">
                    
                    <?php 
					
					echo $category_dropdown;
					
					?>
                    
                </form>
                </div>
             </div>
             
            </li>
            
            <li>
            
             <div class="btn-group" style="width:100%;">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background-color:#cc0000"">Sort By Department</button>
            
                <div class="dropdown-menu">
                <form action="<?php echo base_url(); ?>index.php/Userpage/Main" method="post" id="re">
                    
                    <?php 
					
					echo $department_dropdown;
					
					?>
                    
                </form>
                </div>
             </div>
             
            </li>
            
            <li>
            
             <div class="btn-group" style="width:100%;">
             
                <a href="<?php echo base_url(); ?>index.php/Userpage/Main" class="btn" style="width:100%; background-color:#cc0000""><i class="fa fa-refresh"></i> Refresh</a>
             
             </div>
             
            </li>
            
            <li style="text-align:center">
             <a href="<?php echo base_url(); ?>index.php/Userpage/Logout">
             <button class="btn btn-rdo">Logout</button>
             </a>
            </li>
            
        </ul>
        
    </div>

    <div class="col-md-9">
    
        <div class="container">
        <div class="row" style="height:100%; overflow:auto; padding-bottom:10%;">
        	
        	<?php
			echo $pdf_list;
			?>
            
            
        </div>
        </div>
    
    
    	
    </div>


</div>
</div>