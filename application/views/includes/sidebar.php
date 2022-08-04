<!-- begin #sidebar -->
<?php
$ControllerName = $this->router->fetch_class();
$FunctionName   = $this->router->fetch_method();
?>
<!--Left & Right bar menu -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="image"> <img src="<?php echo base_url('assets/dummy/no-user.png'); ?>" width="48" height="48" alt="User" /> </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown"><?php echo @$this->session->userdata('FirstName')." ".@$this->session->Userdata('LastName'); ?></div>
                <div class="email"><?php echo @$this->session->userdata('Email'); ?></div>
                <div class="btn-group user-helper-dropdown"> <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url('profile'); ?>">
								<i class="material-icons">person</i><?php echo $this->lang->line('profile_label'); ?>
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php echo base_url('login/logout'); ?>">
								<i class="material-icons">input</i><?php echo $this->lang->line('singout_label'); ?>
							</a>
						</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header"><?php echo $this->lang->line('main_navigation'); ?></li>
                <li class="<?php if($ControllerName=='dashboard'){ echo 'active'; }?>"> 
					<a href="<?php echo base_url('dashboard'); ?>">
						<i class="zmdi zmdi-home"></i>
						<span><?php echo $this->lang->line('dashboard_menu'); ?></span> 
					</a> 
				</li>
				
				<?php if($this->session->userdata('AccountType')==='0') { ?>
					<!--#2 crm -->
					<?php if($this->auth->has_admin_permission('manage-crm','View'))  { ?>
					<li class="<?php if($ControllerName=='opportunities'){ echo 'active'; }?>">
						<a href="<?php echo base_url('opportunities'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">assignment_return</i>
							<span><?php echo $this->lang->line('crm_menu'); ?></span> 
						</a>  
					</li>
					<?php  } ?>
					<!--#2 crm end -->

					<!--#3 project manage -->
					<?php if($this->auth->has_admin_permission('manage-project','View'))  { ?>
					<li class="<?php if($ControllerName=='projects'){ echo 'active'; }?>">
						<a href="<?php echo base_url('projects'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">library_books</i>
							<span><?php echo $this->lang->line('left_project_menu'); ?></span> 
						</a>  
					</li>
					<?php  } ?>
					<!--#3 project manage end -->

					<!--#4 company manage -->
					<?php if($this->auth->has_admin_permission('manage-companies','View'))  { ?>
					<li class="<?php if($ControllerName=='companies'){ echo 'active'; }?>">
						<a href="<?php echo base_url('companies'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">domain</i>
							<span><?php echo $this->lang->line('left_company_menu'); ?></span> 
						</a>  
					</li>
					<?php  } ?>
					<!--#4 company manage end -->

					<!--#5 suppliers manage -->
					<?php if($this->auth->has_admin_permission('suppliers-management','View'))  { ?>
					<li class="<?php if($ControllerName=='suppliers'){ echo 'active'; }?>">
						<a href="<?php echo base_url('suppliers'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">card_travel</i>
							<span><?php echo $this->lang->line('left_suppliers_menu'); ?></span> 
						</a>  
					</li>
					<?php  } ?>
					<!--#5 suppliers manage end -->

					<!--#6 express -->
					<li class="<?php if($ControllerName=='standard_accounts'){ echo 'active'; }?>"> 
						<a href="<?php echo base_url('standard_accounts'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">fast_forward</i>
							<span><?php echo $this->lang->line('express_proforma_menu'); ?></span> 
						</a> 
					</li>	
					<!--#6 end -->

					<!--#7 performas -->
					<?php if($this->auth->has_admin_permission('manage-orders','View'))  { ?>
					<li class="<?php if($this->uri->segment(1)!='agent' && $ControllerName=='orders'){ echo 'active'; }?>"> 
						<a href="<?php echo base_url('orders'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">done</i>
							<span><?php echo $this->lang->line('order_menu'); ?></span> 
						</a> 
					</li>
					<?php } ?>
					<!--#7 performas end-->

					<!--#8 tracking mail -->
					<?php if($this->auth->has_admin_permission('tracking_email','View'))  { ?>
					<li class="<?php if($ControllerName=='tracking_email'){ echo 'active'; }?>">
						<a href="<?php echo base_url('tracking_email'); ?>">
							<i style="margin-top:0px;font-size:18px" class="material-icons">cloud_download</i>
							<span><?php echo $this->lang->line('tracking_email_menu'); ?></span> 
						</a>  
					</li>
					<?php } ?>
					<!--#8 tracking mail end -->
		
					<!--#9 tracked emails -->
					<?php if($this->auth->has_admin_permission('email_logs','View'))  { ?>
						<li class="<?php if(($ControllerName=='email_logs') || ($ControllerName=='send_email')){ echo 'active'; }?>">
						<a href="<?php echo base_url('email_logs'); ?>">
							<i style="margin-top:0px;font-size:18px" class="material-icons">list</i>
							<span><?php echo $this->lang->line('left_treacked_email_menu'); ?></span> 
						</a>  
						</li>
					<?php } ?>
					<!--#9 tracked emails end-->
				
					<!--#10 Customer Service -->
					<?php if($this->auth->has_admin_permission('manage-service','View'))  { ?>
					<li class="<?php if($ControllerName=='service'){ echo 'active'; }?>">
						<a href="<?php echo base_url('service/lists'); ?>">
							<i style="margin-top:0px;font-size: 18px;" class="material-icons">assignment_return</i>
							<span><?php echo $this->lang->line('service_request_menu'); ?></span> 
						</a>  
					</li>
					<?php } ?>
					<!--#10 Customer Service end-->
				<?php } ?>
			</ul>
        </div>
    </aside>
</section>