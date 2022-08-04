<style>
    .dataTables_info{
        width:50% !important;
        float:left;
    }
    .dataTables_paginate{
        width:50% !important;
        float:right;
    }
    .pagination{
        display: flex !important;
        float:right;
    }
    td {
        white-space: inherit !important;
    }
</style>
<?php $UserInfo = GetUserInfo($this->uri->segment(3)); ?>
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="h-left clearfix">
                    <h2 style="text-transform:uppercase;"><?php echo $this->lang->line('order_create_title'); ?></h2>
                    <small><?php echo $this->lang->line('welcome_title'); ?></small>
                    <ol class="breadcrumb breadcrumb-col-pink p-l-0">
						<li>
							<a href="<?php echo base_url('dashboard'); ?>">
								<?php echo $this->lang->line('dashboard_menu'); ?>
							</a>
						</li>
                        <li class="active"><?php echo $this->lang->line('order_create_title'); ?></li>
                    </ol>
                </div>
            </div>
		</div>
    </div>
    <div class="container-fluid">
        <!-- Basic Example | Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
						<div id="wizard_horizontal" role="application" class="wizard clearfix">
							<div class="steps clearfix">
								<ul class="setup-panel">
									<li data-step="1" onclick="wizard_steps(this)" class="current step_links">
										<a href="javascript:void(0);" >
											<span class="number">1.</span> <?php echo $this->lang->line('step_1_title'); ?>
										</a>
									</li>
									<li id="step2" data-step="2" onclick="wizard_steps(this)" class="disabled step_links">
										<a href="javascript:void(0);">
											<span class="number">2.</span> <?php echo $this->lang->line('step_2_title'); ?>
										</a>
									</li>
									<li data-step="3" onclick="wizard_steps(this)" class="disabled step_links" aria-disabled="true">
										<a href="javascript:void(0);">
											<span class="number">3.</span> <?php echo $this->lang->line('step_3_title'); ?>
										</a>
									</li>
									<li data-step="4" onclick="wizard_steps(this)" class="disabled step_links" >
										<a href="javascript:void(0);">
											<span class="number">4.</span> <?php echo $this->lang->line('step_4_title'); ?>
										</a>
									</li>
								</ul>
							</div>
							<div class="content clearfix">
								<form id="create_form" method="POST" action="<?php echo base_url('users/create_order/'.$this->uri->segment(3)); ?>" >
									<div class="setup-content" id="step-1">
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<p><?php echo $this->lang->line('step_1_desc'); ?></p>
													</div>
												</div> 
											</div>
										</div>
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<h2><?php echo $this->lang->line('advance_select_title'); ?></h2>
													</div>
													<div class="body">
														<div class="col-sm-4">
															<label><?php echo $this->lang->line('category_label'); ?></label>
															<select class="form-control show-tick" multiple="" title="Select Category" data-live-search="true" data-selected-text-format="count > 1" name="Category[]" id="Category">
																<?php 
																foreach($CategoryInfo as $Category) { 
																?>
																<option value="<?php echo $Category['Category_Id']; ?>" selected ><?php echo $Category['Name']; ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-sm-4">
															<label><?php echo $this->lang->line('brand_label'); ?></label>
															<select class="form-control show-tick" multiple="" title="Select Brand" data-live-search="true" data-selected-text-format="count > 1" name="Brand[]" id="Brand">
																<?php foreach($BrandInfo as $Brand) { 
																?>
																 <option value="<?php echo $Brand['Brand_Id']; ?>" selected ><?php echo $Brand['Name']; ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-sm-2">
															<label><?php echo $this->lang->line('new_product_only_label'); ?></label>
															<div class="switch" style="margin-top:15px;">
															<label>
																<input type="checkbox" value="yes" name="new_products" id="new_products">
																<span class="lever switch-col-cyan"></span></label>
															</div>
														</div>
														<div class="col-sm-2">
															<button style="margin-top: 30px;" class="btn btn-raised btn-primary waves-effect ladda-button" data-style="slide-left" type="button" onclick="filter_datatable()">
																<span class="ladda-label">
																	<?php echo $this->lang->line('search_button_title'); ?>
																</span>
															</button>
														</div>
														<!-- </form> -->
													</div>
												</div>
											</div>
										</div>
										
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<h2> <?php echo $this->lang->line('product_index_title1'); ?> </h2>
													</div>
													<div class="body">
														<table class="table table-bordered table-striped table-hover datatables_table_atep123" id="datatables_table">
															<thead>
															   <tr>
																	<th><i class="fa fa-file-pdf-o active_pdf" aria-hidden="true"></i></th>
																	<th><?php echo $this->lang->line('brand_label'); ?></th>
																	<th><?php echo $this->lang->line('product_code_label'); ?></th>
																	
																	<th><?php echo $this->lang->line('description_label'); ?></th>
																	<th><?php echo $this->lang->line('weight_label')." (Kg)"; ?></th>
																	<th><?php echo $this->lang->line('price_label')." (".$UserInfo['Symbol'].")"; ?></th>
																	<th><?php echo $this->lang->line('quantity_label'); ?></th>
																</tr>
															</thead>
															<tbody id="product_table">
															
															</tbody>
														</table>
													</div>
													<div class="pull-right col-md-12 col-sm-12" style="margin:15px;padding: 0 0 10px 0;position:relative;box-shadow:none;margin-bottom: 0;border-radius: 0;">
														<button type="button" onclick="next_step(this,1,'<?php echo $UserInfo['Symbol']; ?>','<?php echo $this->uri->segment(3); ?>','normal')" class="btn btn-raised btn-primary pull-right"><?php echo $this->lang->line('next_button_title'); ?></button>

														<!-- clear cart button start here -->
														<a href="javascript:void(0);" onclick="clear_cart_value(<?php echo $this->uri->segment(3); ?>)" style="float: left" class="btn btn-raised bg-red pull-right">
														<?php echo $this->lang->line('order_clear_cart'); ?>
														</a>
														<!-- clear cart button end here -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="setup-content hidden" id="step-2">
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<p><?php echo $this->lang->line('step_2_desc'); ?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<h2> 
															<?php echo $this->lang->line('select_product_title'); ?>
														</h2>
													</div>
													<div class="body">
														<table class="table table-bordered table-striped table-hover" id="datatables_table">
															<thead>
																<tr>
																	<th style="width:5%">#</th>
																	<th style="width:15%"><?php echo $this->lang->line('brand_label'); ?></th>
																	<th style="width:40%"><?php echo $this->lang->line('description_label'); ?></th>
																	<th style="width:10%"><?php echo $this->lang->line('quantity_label'); ?></th>
																	<th style="width:15%"><?php echo $this->lang->line('price_per_quantity_label')." (".$UserInfo['Symbol'].")"; ?></th>
																	<th style="width:15%"><?php echo $this->lang->line('price_total_label')." (".$UserInfo['Symbol'].")"; ?></th>
																</tr>
															</thead>
															<tbody id="append_here_product">
																
															</tbody>
														</table>
													</div>
													<div class="text-right" style="margin:15px;padding: 0 0 10px 0;position:relative;box-shadow:none;margin-bottom: 0;border-radius: 0;">
														<button type="button" onclick="back_step(this)" class="btn btn-raised bg-grey">
															<?php echo $this->lang->line('back_button_title'); ?>
														</button>
														<button type="button" onclick="next_step(this,2,'<?php echo $UserInfo['Symbol']; ?>','<?php echo $this->uri->segment(3); ?>','normal')" class="btn btn-raised bg-teal text-right">
															<?php echo $this->lang->line('next_button_title'); ?>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>	
									<div class="setup-content hidden" id="step-3">
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<p><?php echo $this->lang->line('step_3_desc'); ?></p>
													</div>
												</div>
											</div>
										</div>
										
										<div class="row clearfix">
											<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<h2>
															<?php echo $this->lang->line('delivery_address_label_1'); ?>
														</h2>
													</div>
													<div class="body">
														<div style="position:relative;">
															<textarea id="DeliveryAddress" name="DeliveryAddress" rows="10" class="form-control no-resize import_products" style="padding:10px 15px;border: 1px solid rgba(0, 0, 0, 0.13); position:relative;z-index: 2;" required></textarea>
															<div class="textarea_placeholder" style="color:#C1C1C1;position:absolute;top:10px;left:15px;z-index:0;">
																<?php echo $this->lang->line('delivery_address_placeholder_1'); ?>
															</div>
														</div>
													</div>
												</div>
												<div class="card">
													<div class="body">
														<div style="position:relative;">
															<textarea id="SpecialInstruction" name="SpecialInstruction" rows="10" class="form-control no-resize import_products" style="padding:10px 15px;border: 1px solid rgba(0, 0, 0, 0.13); position:relative;z-index: 2;" required></textarea>
															<div class="textarea_placeholder" style="color:#C1C1C1;position:absolute;top:10px;left:15px;z-index:0;">
																<?php echo $this->lang->line('special_instruction_placeholder'); ?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
												<div class="card">
													<div class="header">
														<h2>
															<?php echo $this->lang->line('order_by_label'); ?>
														</h2>
													</div>
													<div class="body">
														<p class="margin-0">
															<b><?php echo $UserInfo['FirstName']." ".$UserInfo['LastName']; ?></b></br>
															<?php echo $UserInfo['CompanyName']."<br />".$UserInfo['CompanyAddress']; ?>
														</p>
													</div>
												</div>
												<div class="card">
													<div class="header">
														<h2><?php echo $this->lang->line('delivery_option_label'); ?><span style="color:red">*</span></h2>
													</div>
													<div class="body">
														<div class="demo-radio-button">
															<input name="DeliveryOption" type="radio" id="radio_2" class="with-gap" value="Air Freight" rel="<?php echo $this->lang->line('delivery_option_title_1'); ?>" checked />
															<label for="radio_2"><?php echo $this->lang->line('delivery_option_title_1'); ?></label>
															<input name="DeliveryOption" type="radio" class="with-gap" id="radio_1" value="Express Air Freight" rel="<?php echo $this->lang->line('delivery_option_title_2'); ?>" />
															<label for="radio_1"><?php echo $this->lang->line('delivery_option_title_2'); ?></label>
															<input name="DeliveryOption" type="radio" id="radio_3" class="with-gap" value="Sea Shipment" rel="<?php echo $this->lang->line('delivery_option_title_3'); ?>" />
															<label for="radio_3"><?php echo $this->lang->line('delivery_option_title_3'); ?></label>
														</div>
														<label style="display:none;" id="DeliveryOption-error" class="error" for="DeliveryOption"></label>
													</div>
												</div>
												<div class="card">
													<div class="header">
														<h2><?php echo $this->lang->line('voucher_label'); ?></h2>
													</div>
													<div class="body">
														<div class="form-group">
															<div class="form-line">
																<input type="hidden" name="Voucher_Id" id="Voucher_Id" >
																<input type="text" name="Code" id="Code" class="form-control" placeholder="<?php echo $this->lang->line('voucher_placeholder'); ?>" >
															</div>
															<label style="display:none;" id="Code-error" class="error" for="Code"></label>
														</div>
													</div>
													<div class="text-right" style="margin:15px;padding: 0 0 10px 0;position:relative;box-shadow:none;margin-bottom: 0;border-radius: 0;">
														<button type="button" onclick="back_step(this)" class="btn btn-raised bg-grey">
															<?php echo $this->lang->line('back_button_title'); ?>
														</button>
														<button type="button" onclick="next_step(this,3,'<?php echo $UserInfo['Symbol']; ?>','<?php echo $this->uri->segment(3); ?>','normal')" class="btn btn-raised bg-teal text-right"><?php echo $this->lang->line('next_button_title'); ?></button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="setup-content hidden" id="step-4">
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card descinfo">
													<div class="header">
														<p><?php echo $this->lang->line('step_4_desc'); ?></p>
													</div>
												</div>
												<div class="body">
													<div id="print-div">
														<div class="clearfix">
															<div class="pull-left">
																<h4 class="text-right">
																	<?php 
																	if($UserInfo['AccountType']==='1') { 
																		$image = "export_logo_1.png";
																	}
																	else if($UserInfo['AccountType']==='2') { 
																		$image = "france_logo_1.png";
																	}
																	?>
																	<img src="<?php echo base_url('assets/images/logo/'.$image); ?>" style="max-width:100%;" alt="logo">
																</h4>
															</div>
															<div class="pull-right">
																<h4> 
																	<?php echo strtoupper(order_status(0)); ?>
																</h4>
															</div>
														</div>
														<hr>
														
														<div class="row" style="border-radius: 0px;">
															<div class="col-md-12">
																<div class="col-md-9">
																	<p>
																		<b>
																		    <?php echo $this->lang->line('delivery_information_label');?>
																	    </b>
                                                                    </p>
																	<p id="final_delivery_address">
																		
																	</p>
																	<p>
																		<b>
																		    <?php echo $this->lang->line('special_instruction_label');?>
																	    </b>
                                                                    </p>
																	<p id="final_instrution">
																		
																	</p>
																</div>
																<div class="col-md-3">
																	<p class="text-right" id="sub_total"></p>
																	<p class="text-right" id="discount_amount"></p>
																	<hr>
																	<h3 class="text-right" id="final_amount"></h3>
																	<input type="hidden" id="TotalAmount" name="TotalAmount">
																	<input type="hidden" id="VoucherAmount" name="VoucherAmount" value="0.00">
																</div>
															</div>
														</div>
														<hr>
													</div>	
													<div class="hidden-print">
														<div class="pull-right">
															<a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
															<button type="button"  onclick="back_step(this)" class="btn btn-raised bg-grey">
																<?php echo $this->lang->line('back_button_title'); ?>
															</button>
															<button type="button" onclick="$('#create_form').submit();" class="btn btn-raised bg-teal text-right">
																<?php echo $this->lang->line('submit_button_title'); ?>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

<?php
	$buttons = $this->config->item('buttons_'.$this->session->userdata('site_lang'));
	array_splice($buttons,0,1);
	foreach($buttons as $key => $button)
	{
		$buttons[$key]['exportOptions'] = array('columns'=>array('1','2','3','4','5'));
		$buttons[$key]['filename'] = 'abcpro_export';
	}
?>

<script type="text/javascript">
	var exports_buttons = '<?php echo json_encode($buttons); ?>';
	var Products_datatable;
	window.onload= function()
    {
		Products_datatable = $('#datatables_table').DataTable(
		{
			dom: 'lBfrtip',
			buttons:JSON.parse(exports_buttons),
			dom: 'lBfrtip',
			"scrollX": true,
			"autoWidth": false,
			"serverSide": true,
			"bPaginate": true,
			"info":     true,
			"order": [],
			"language": {
	            "url": ajax_url+"assets/plugins/jquery-datatable/language/<?php echo $this->session->userdata('site_lang'); ?>.json"
	        },
			"ajax":
			{
				url: "<?php echo base_url('users/filter_products/'.$this->uri->segment(3)); ?>",
				type: "POST",
				dataType: 'json',
				data: function ( d ) {
				  d.Brand = $('#Brand').val(),
				  d.Category = $('#Category').val(),
				  d.new_products = new_products()
				}
			},
		});
    }
	
    function new_products()
    {
        if($('#new_products').is(':checked'))
        {
            return $('#new_products').val();
        }
        else
        {
            return 'no';
        }
    }
    function filter_datatable()
    {
        Products_datatable.ajax.reload(); 
    }
</script>
