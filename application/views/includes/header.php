<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title><?php echo $this->lang->line('website_title'); ?></title>

<link rel="icon" href="<?php echo base_url('assets/images/fav.ico'); ?>" type="image/x-icon">
<!-- Font Icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- JQuery DataTable Css -->
<link href="<?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />

<link href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/dropzone/dropzone.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet" />
<!-- Custom Css -->

<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/dropzone/dropzone.css'); ?>" rel="stylesheet">
<!-- themes Css -->
<link href="<?php echo base_url('assets/css/themes/all-themes.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/jquery-datatable/responsive.bootstrap.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/plugins/ladda-bootstrap/dist/ladda-themeless.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/print.css'); ?>" rel="stylesheet"  media="print" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
</head>
<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
	<!-- #Float icon -->
	<?php
	$controllerName = $this->router->fetch_class();
	$functionName = $this->router->fetch_method();
	?>
	
	<?php if( ($this->session->userdata('AccountType')=='0') && ($controllerName=='dashboard') || ($controllerName=='opportunities'))  { ?>
	<ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
		<li class="mfb-component__wrap"> <a href="javascript:void(0);" class="mfb-component__button--main"> <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i> <i class="mfb-component__main-icon--active zmdi zmdi-close"></i> </a>
			<ul class="mfb-component__list">
				
				<li> <a href="javascript:void(0);" data-toggle="modal" data-target="#bottomfordirect" rel-source="Direct"  data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_direct'); ?>" class="mfb-component__button--child bg-green"> <i class="zmdi zmdi-email zmdi-hc-fw mfb-component__child-icon"></i> </a> </li>

				<li> <a href="javascript:void(0);" data-toggle="modal" data-target="#bottomforphone" rel-source="Phone call"  data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_phone'); ?>" class="mfb-component__button--child bg-blue"> <i class="zmdi zmdi-phone zmdi-hc-fw mfb-component__child-icon"></i> </a> </li>
				
				<li> <a href="javascript:void(0);" data-toggle="modal" data-target="#bottomforZopim" rel-source="Zopim" data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_zopim'); ?>" class="mfb-component__button--child bg-orange"> <i class="zmdi zmdi-twitch zmdi-hc-fw mfb-component__child-icon"></i> </a> </li>
				
				<li> <a href="javascript:void(0);" data-toggle="modal" data-target="#bottomforfacebook" rel-source="Facebook" data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_facebook'); ?>" class="mfb-component__button--child bg-purple"> <i class="zmdi zmdi-facebook zmdi-hc-fw mfb-component__child-icon "></i> </a> </li>

				<!-- <li> <a href="javascript:void(0);" data-toggle="modal" data-target="#bottomforwhats_sms" rel-source="Whatsapp/SMS" data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_whatsapp_sms'); ?>" class="mfb-component__button--child bg-green"> <i class="zmdi zmdi-whatsapp zmdi-hc-fw mfb-component__child-icon "></i> </a> </li> -->

				<!-- Mail chimp start here -->
				<li> <a href="javascript:void(0);" data-toggle="modal" data-target="#bottomfor_mail_chimp" rel-source="Mail chimp" data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_mailchimp')?>" class="mfb-component__button--child bg-deep-orange"> <i class="zmdi zmdi-email-open zmdi-hc-fw mfb-component__child-icon "></i> </a> </li>
				<!-- Mail chimp end here -->


				<li> <a href="javascript:void(0);" data-toggle="modal" data-target="#Onsite" rel-source="on-site" data-mfb-label="<?php echo $this->lang->line('add_form_icon_label_onsite')?>" class="mfb-component__button--child bg-green"> <i class="zmdi zmdi-airplane  zmdi-hc-fw mfb-component__child-icon  "></i> </a> </li>

			</ul>
		</li>
	</ul>
	<?php } else if( $this->session->userdata('AccountType')!='0') { ?>
	<!-- #Float icon -->
    <ul id="f-menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
        <li class="mfb-component__wrap"> <a href="#" class="mfb-component__button--main"> <i class="mfb-component__main-icon--resting zmdi zmdi-plus"></i> <i class="mfb-component__main-icon--active zmdi zmdi-close"></i> </a>
            <ul class="mfb-component__list">
				<?php if($this->session->userdata('AccountType')==='3') { ?>
                <li>
                    <a href="<?php echo base_url('agent/orders/create');?>" data-mfb-label="<?php echo $this->lang->line('create_express_performa'); ?>" class="mfb-component__button--child bg-blue"> <i class="mfb-component__child-icon material-icons">create</i></a>
                </li>
                <?php } else { ?>
				<li>
                    <a href="<?php echo base_url('orders/create');?>" data-mfb-label="<?php echo $this->lang->line('create_rfq'); ?>" class="mfb-component__button--child bg-blue"> <i class="mfb-component__child-icon material-icons">create</i></a>
                </li>
                <li>
                    <a href="<?php echo base_url('service');?>" data-mfb-label="<?php echo $this->lang->line('service_request_submenu_1'); ?>" class="mfb-component__button--child bg-blue"><i class="mfb-component__child-icon material-icons">assignment_return</i></a>
                </li>
				<?php } ?>
            </ul>
        </li>
    </ul>
    <?php } ?>
    <!-- Search  -->
	<div class="search-bar">
		<div class="search-icon"> <i class="material-icons">search</i> </div>
		<form action="<?php echo base_url('orders/create'); ?>" method="GET" >
		<input type="text" name="search" placeholder="START TYPING...">
		</form>
		<div class="close-search"> <i class="material-icons">close</i> </div>
	</div>
	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header"> 
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> 
				<a href="javascript:void(0);" class="bars"></a> 
				<a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>"> <?php echo $this->lang->line('company_name'); ?> </a> 
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<?php if($this->session->userdata('AccountType')!=='0') { ?>
					<li>
						<a href="javascript:void(0);" class="js-search" data-close="true">
							<i class="zmdi zmdi-search"></i>
						</a>
					</li>
					<?php } ?>
					
					<!-- flag notify start here  -->
					<?php 
					if($this->session->userdata('AccountType')==='0') { 
						

					$Admin_id = $this->session->userdata('User_Id'); 
					$crm_assigned = assignedCrm($Admin_id);
							// echo '<pre>',print_r($crm_assigned),'</pre>';
							if(isset($crm_assigned) && !empty($crm_assigned)){
								$assigned_forms = count($crm_assigned);
								$all_dates = array();
								foreach($crm_assigned as $date){
									$all_dates[] = $date['Modified'];
								}
								$cureent_date =  date('Y-m-d H:i:s');
								$closest_date =  find_closest_date($all_dates, $cureent_date);
								$time_difference  =  time_difference($closest_date);
							}else{
								$assigned_forms="";
								$time_difference="";
							}	
					
						$forms_pending = pendingCrm();
						if(isset($forms_pending) && !empty($forms_pending)){
							$pending_forms = count(pendingCrm());
							
							$all_dates_pending = array();
								foreach($forms_pending as $date){
									$all_dates_pending[] = $date['Modified'];
								}
								$cureent_date =  date('Y-m-d H:i:s');
								$closest_date =  find_closest_date($all_dates_pending, $cureent_date);
								$time_difference_pending  =  time_difference($closest_date);

						}else{
							$pending_forms="";
							$time_difference_pending = "";
						}	
					?>

					<?php
					$Admin_id = $this->session->userdata('User_Id'); 
					$actionRequired = get_actioinRequired($Admin_id);
				
					?>
					<!-- bell icon notification start here -->
					<li class="dropdown"> 
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
						<?php /*	<i class="zmdi zmdi-notifications"></i>
                    		<div class="notify">
								<?php if( count($actionRequired) > 0){?>
									<!-- <span class="heartbit"></span><span class="point"></span> -->
								<?php }?>
								
							</div> */?>
                    </a>
						<ul class="dropdown-menu bell-dropdown">
							<li class="header"><?php echo $this->lang->line('crm_notification_bell_title'); ?></li>
							<li class="body">
								<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul class="menu" style="overflow: hidden; width: auto; height: 254px;">
									<li> <a href="<?php echo base_url('opportunities'); ?>" class=" waves-effect waves-block">
										<div class="icon-circle bg-orange"> <i class="material-icons">flash_on</i> </div>
										<div class="menu-info">
											<h4><?php echo count($actionRequired)." ".$this->lang->line('crm_admin_action_required');?> </h4>
											<!-- <p> <i class="material-icons">access_time</i> 14 mins ago </p> -->
										</div>
										</a>
									</li>
								</ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
							</li>
							<li class="footer"> <a href="<?php echo base_url('opportunities'); ?>" class=" waves-effect waves-block"><?php echo $this->lang->line('crm_view_all_notification_bell_title'); ?></a> </li>
						</ul>
               		</li>
					<!-- bell icon notification end here -->
					<!-- flag icon start -->
					<li class="dropdown"> 
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i>
						<div class="notify">
						<?php if( (isset($crm_assigned) && !empty($crm_assigned) ) ||  (isset($forms_pending) && !empty($forms_pending) && ($this->auth->has_admin_permission('manage-crm','View')) ) ){?>
							<span class="heartbit"></span><span class="point"></span>
						<?php } ?></div>
						</a>
                    	<ul class="dropdown-menu notification-dropdown">
                        	<li class="header"><?php echo $this->lang->line('crm_notification_flag_title'); ?></li>
							<li class="body">
								<ul class="menu menu-ul-side">
								
									<li> <a href="<?php echo base_url('opportunities'); ?>">
										<div class="icon-circle bg-light-blue"> <i class="material-icons">format_indent_increase</i> </div>
										<div class="menu-info">
											<h4><?php echo ($assigned_forms ) ? : $this->lang->line('admin_no_form_assigned'); ?> <?php echo $this->lang->line('admin_assigned_form_notify'); ?> </h4>
											<?php if($time_difference) {?>
											<p> <i class="material-icons">access_time</i> <?php echo ($time_difference)? $time_difference.' ago':"";  ?> </p>
											<?php }?>

											
										</div>
										</a>
									</li>
								
									<?php if($this->auth->has_admin_permission('manage-crm','View')) { ?>
									<li> <a href="<?php echo base_url('opportunities'); ?>">
										<div class="icon-circle bg-red"> <i class="material-icons">query_builder</i> </div>
										<div class="menu-info">
											<h4><?php  echo ($pending_forms) ? : $this->lang->line('admin_no_form_assigned'); ?> <?php echo $this->lang->line('admin_pending_form_notify'); ?> </h4>
											<?php if($time_difference_pending) {?>
											<p> <i class="material-icons">access_time</i> <?php echo ($time_difference_pending)? $time_difference_pending.' ago':"";  ?> </p>
											<?php }?>
										</div>
										</a>
									</li>
									<?php } ?>
									
								</ul>
							</li>
							<li class="footer"> <a href="<?php echo base_url('opportunities'); ?>"><?php echo $this->lang->line('crm_view_all_notification_flag_title'); ?></a> </li>
							
                   		 </ul>
					</li>
					<!-- flag notify end here  -->
					<?php } ?>
					<li>
						<a href="<?php echo base_url('login/logout'); ?>" class="mega-menu" data-close="true">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


<?php if( ($this->session->userdata('AccountType')=='0') && ($controllerName=='dashboard') || ($controllerName=='opportunities')  ) { ?>

<!-- icon form  for mailchimp start here -->
<div class="modal fade" id="bottomfor_mail_chimp" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_mail_chimp_title'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_mailchimp" class="modal_form">
								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="radio_mail_chimp_abc" value="26">
										<label for="radio_mail_chimp_abc"><?php echo $this->lang->line('crm_chimp_radio_button_title_26'); ?></label>

										<input name="Comming_From" type="radio" id="radio_chimp_enrv" class="with-gap" value="27">
										<label for="radio_chimp_enrv"><?php echo $this->lang->line('crm_chimp_radio_button_title_27'); ?></label>

										<input  name="Comming_From" type="radio" id="radio_chimp_export" class="with-gap" value="28">
										<label for="radio_chimp_export"><?php echo $this->lang->line('crm_chimp_radio_button_title_28'); ?></label>
									</div>
								</div>

									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" required>
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- icon form  for mailchimp end here -->

<!-- icon form  for whatss-app/sms start here -->
<div class="modal fade" id="bottomforwhats_sms" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_whatsapp_sms_title'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_whats_app_sms" class="modal_form">
								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="radio_whats_app_abc" value="23">
										<label for="radio_whats_app_abc"><?php echo $this->lang->line('crm_wahtsapp_radio_button_title_10'); ?></label>

										<input name="Comming_From" type="radio" id="radio_whats_app_enrv" class="with-gap" value="24">
										<label for="radio_whats_app_enrv"><?php echo $this->lang->line('crm_wahtsapp_radio_button_title_11'); ?></label>

										<input  name="Comming_From" type="radio" id="radio_whats_app_export" class="with-gap" value="25">
										<label for="radio_whats_app_export"><?php echo $this->lang->line('crm_wahtsapp_radio_button_title_12'); ?></label>
									</div>
								</div>

									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" >
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- icon form  for whatss-app/sms end here -->


<!-- icon form  for facebook start here -->
<div class="modal fade" id="bottomforfacebook" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_facebook_title'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_facebook" class="modal_form">
								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="radio_fb_abc" value="7">
										<label for="radio_fb_abc"><?php echo $this->lang->line('crm_facebook_radio_button_title_7'); ?></label>
										<input name="Comming_From" type="radio" id="radio_fb_enrv" class="with-gap" value="8">
										<label for="radio_fb_enrv"><?php echo $this->lang->line('crm_facebook_radio_button_title_8'); ?></label>
										<input  name="Comming_From" type="radio" id="radio_fb_export" class="with-gap" value="9">
										<label for="radio_fb_export"><?php echo $this->lang->line('crm_facebook_radio_button_title_9'); ?></label>
									</div>
								
									<div class="demo-radio-button">
										<input  name="Comming_From" type="radio" class="with-gap" id="radio_fb_abc1" value="29">
								         <label for="radio_fb_abc1">
						                  <?php echo $this->lang->line('crm_facebook_radio_button_title_29'); ?></label>
										<input name="Comming_From" type="radio" id="radio_fb_enrv12" class="with-gap" value="29">
										<label for="radio_fb_enrv12"><?php echo $this->lang->line('crm_facebook_radio_button_title_30'); ?></label>
										<input  name="Comming_From" type="radio" id="radio_fb_export1" class="with-gap" value="30">
										<label for="radio_fb_export1"><?php echo $this->lang->line('crm_facebook_radio_button_title_31'); ?></label>
									</div>
								</div>



									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" required>
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- icon form  for facebook end here -->



<!-- icon form  for Zopim start here -->
<div class="modal fade" id="bottomforZopim" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_zopim_title'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_zopim" class="modal_form">
								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="radio_zopim_abc" value="10">
										<label for="radio_zopim_abc"><?php echo $this->lang->line('crm_zopim_radio_button_title_10'); ?></label>
										<input name="Comming_From" type="radio" id="radio_zopim_enrv" class="with-gap" value="11">
										<label for="radio_zopim_enrv"><?php echo $this->lang->line('crm_zopim_radio_button_title_11'); ?></label>
										<input  name="Comming_From" type="radio" id="radio_zopim_export" class="with-gap" value="12">
										<label for="radio_zopim_export"><?php echo $this->lang->line('crm_zopim_radio_button_title_12'); ?></label>
									</div>
								</div>

									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" required>
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- icon form  for Zopim end here -->

<!-- icon form  for phone start here -->
<div class="modal fade" id="bottomforphone" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_Phone_title'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_phone" class="modal_form">

								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="radio_phone_abc" value="13">
										<label for="radio_phone_abc"><?php echo $this->lang->line('crm_phone_radio_button_title_13'); ?></label>
										<input name="Comming_From" type="radio" id="radio_phone_enrv" class="with-gap" value="14">
										<label for="radio_phone_enrv"><?php echo $this->lang->line('crm_phone_radio_button_title_14'); ?></label>
										<input  name="Comming_From" type="radio" id="radio_phone_export" class="with-gap" value="15">
										<label for="radio_phone_export"><?php echo $this->lang->line('crm_phone_radio_button_title_15'); ?></label>

									</div>


							 
									<div class="demo-radio-button">
										<input  name="Comming_From" type="radio" class="with-gap" id="radio_whats_app_abc2" value="23">
										<label for="radio_whats_app_abc2"><?php echo $this->lang->line('crm_wahtsapp_radio_button_title_10'); ?></label>

										<input  name="Comming_From" type="radio" id="radio_whats_app_export2" class="with-gap" value="25">
										<label for="radio_whats_app_export2"><?php echo $this->lang->line('crm_wahtsapp_radio_button_title_12'); ?></label>

										<input name="Comming_From" type="radio" id="radio_whats_app_enrv2" class="with-gap" value="24">
										<label for="radio_whats_app_enrv2"><?php echo $this->lang->line('crm_wahtsapp_radio_button_title_11'); ?></label>

									</div>
								</div>

								<!--  -->


									
									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" required>
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- icon form  for phone end here -->

<!-- icon form  for direct start here -->
<div class="modal fade" id="bottomfordirect" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_direct_title'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_direct" class="modal_form">

								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="direct_abc" value="17">
										<label for="direct_abc"><?php echo $this->lang->line('crm_direct_radio_button_title_17'); ?></label>

										<input name="Comming_From" type="radio" id="direct_enrv" class="with-gap" value="18">
										<label for="direct_enrv"><?php echo $this->lang->line('crm_direct_radio_button_title_18'); ?></label>
										
										<input  name="Comming_From" type="radio" id="direct_export" class="with-gap" value="19">
										<label for="direct_export"><?php echo $this->lang->line('crm_direct_radio_button_title_19'); ?></label>
									</div>
								</div>	
									
									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" required>
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- icon form  for direct end here -->

<!-- on site model -->
<div class="modal fade" id="Onsite" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?php echo $this->lang->line('crm_custom_contact_direct_title_Visit'); ?>
								</h2>
							</div>
							<div class="body xs-buttons">
								<form action="<?php echo base_url('opportunities/customAdd'); ?>" method="POST" autocomplete="off" id="form_validation_icon_form_direct" class="modal_form">

								<div class="form-group">
									<div class="demo-radio-button">
										<input checked="checked" name="Comming_From" type="radio" class="with-gap" id="direct_abc_32" value="32">
										<label for="direct_abc_32"><?php echo $this->lang->line('On_siteradio_button_title_32'); ?></label>

										<input name="Comming_From" type="radio" id="direct_enrv_33" class="with-gap" value="33">
										<label for="direct_enrv_33"><?php echo $this->lang->line('On_siteradio_button_title_33'); ?></label>
										
										<input  name="Comming_From" type="radio" id="direct_export_34" class="with-gap" value="34">
										<label for="direct_export_34"><?php echo $this->lang->line('On_siteradio_button_title_34'); ?></label>
									</div>
								</div>	
									
									<div class="form-group">
										<div class="form-line">
											<input type="email" name="Customer_Email" id="Customer_Email" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_email_placeholder'); ?>" required>
										</div>
										<label id="Customer_Email-error" class="error" for="Customer_Email"><?php echo form_error('Customer_Email'); ?></label>
									</div>

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Name" id="Customer_Name" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_name_placeholder'); ?>" required>
										</div>
										<label id="Customer_Name-error" class="error" for="Customer_Name"><?php echo form_error('Customer_Name'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Country" id="Customer_Country" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_country_placeholder'); ?>" >
										</div>
										<label id="Customer_Country-error" class="error" for="Customer_Country"><?php echo form_error('Customer_Country'); ?></label>
									</div>
									

									
									<div class="form-group">
										<div class="form-line">
											<input type="text" name="Customer_Mobile" id="Customer_Mobile" class="form-control digits" placeholder="<?php echo $this->lang->line('crm_custom_phone_placeholder'); ?>">
										</div>
										<label id="Customer_Mobile-error" class="error" for="Customer_Mobile"><?php echo form_error('Customer_Mobile'); ?></label>
									</div>

									
									<label for="Customer_Message">
										<?php echo $this->lang->line('crm_custom_content_field_title'); ?>
									</label>
									<div class="form-group">
										<div class="form-line">
											<textarea required name="Customer_Message" id="Customer_Message" class="form-control" placeholder="<?php echo $this->lang->line('crm_custom_content_placeholder'); ?>"></textarea>
										</div>
										<label id="Customer_Message-error" class="error" for="Customer_Message"><?php echo form_error('Customer_Message'); ?></label>
									</div>
									<button type="button" class="btn btn-raised btn-grey m-t-15 waves-effect" data-dismiss="modal">
										<?php echo $this->lang->line('crm_assign_cancel_button'); ?>
									</button>
									<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
										<?php echo $this->lang->line('crm_custom_submit_button'); ?>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!--  -->

<?php } ?>

