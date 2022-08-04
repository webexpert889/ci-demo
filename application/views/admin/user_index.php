<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="h-left clearfix">
                    <h2><?php echo $this->lang->line('user_index_title'); ?></h2>
                    <small><?php echo $this->lang->line('welcome_title_admin_customer_list_page'); ?></small>
                    <ol class="breadcrumb breadcrumb-col-pink p-l-0">
                        <li>
							<a href="<?php echo base_url('dashboard'); ?>">
								<?php echo $this->lang->line('dashboard_menu'); ?>
							</a>
						</li>
                        <li class="active"><?php echo $this->lang->line('user_menu'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><?php echo $this->lang->line('user_index_title1'); ?></h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo base_url('users/create'); ?>"><?php echo $this->lang->line('add_user'); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <table id="user-listing" class="table table-bordered table-striped table-hover dataTable dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('company_name_label'); ?></th>
									<th><?php echo $this->lang->line('name_label'); ?></th>
									<th><?php echo $this->lang->line('login_date_label'); ?></th>
                                    <th><?php echo $this->lang->line('company_address_label'); ?></th>
                                    <th><?php echo $this->lang->line('password_label'); ?></th>
                                    <th><?php echo $this->lang->line('currency_label'); ?></th>
                                    <th><?php echo $this->lang->line('language_label'); ?></th>
                                    <th><?php echo $this->lang->line('action_label_edit_delete'); ?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
									<th><?php echo $this->lang->line('company_name_label'); ?></th>
                                    <th><?php echo $this->lang->line('name_label'); ?></th>
									<th><?php echo $this->lang->line('login_date_label'); ?></th>
                                    <th><?php echo $this->lang->line('company_address_label'); ?></th>
                                    <th><?php echo $this->lang->line('password_label'); ?></th>
                                    <th><?php echo $this->lang->line('currency_label'); ?></th>
                                    <th><?php echo $this->lang->line('language_label'); ?></th>
                                    <th><?php echo $this->lang->line('action_label_edit_delete'); ?></th>
                                </tr>
                            </tfoot>
                            <tbody>
								<?php 
								if(isset($UserInfo) && !empty($UserInfo)) {
								foreach($UserInfo as $User) { ?>
								<tr>
                                    <td>
										<?php echo $User['CompanyName']; ?>
									</td>
									<td>
										<?php echo $User['FirstName']." ".$User['LastName']; ?>
									</td>
                                    <td>
										<?php echo get_date_format($User['logindate']); ?>
									</td>
									<td>
                                        <?php echo $User['CompanyAddress']; ?>
                                    </td>
                                    <td>
										<?php echo base64_decode($User['ShowPassword']); ?>
									</td>
                                    <td>
										<?php echo $User['Name']; ?>
									</td>
                                    <td>
										<?php echo $User['Language']; ?>
									</td>
									<td style="text-align: right">
                                        <a onclick="view_customer_coefficient(<?php echo $User['User_Id']; ?>)" style="text-decoration:none;color:#337AB7;" href="javascript:void(0);" data-toggle="modal" data-target="#customercoefficientModal" >
											<i class="material-icons"> visibility </i>
										</a>
										<a style="text-decoration:none;color:initial;" href="<?php echo base_url('users/edit/'.$User['User_Id']); ?>">
											<i class="material-icons"> edit </i>
										</a>
										<a style="text-decoration:none;color:initial;" onclick="send_password(<?php echo $User['User_Id']; ?>,'users')" href="javascript:void(0);">
                                            <i class="material-icons">send</i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="showConfirmMessage('<?php echo $this->lang->line('user_delete_title'); ?>','<?php echo $this->lang->line('delete_button_text'); ?>','<?php echo $this->lang->line('cancel_button_text'); ?>','<?php echo $User['User_Id']; ?>','users','delete');">
											<i class="material-icons"> delete_forever </i>
										</a>
									</td>
                                </tr>
								<?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<div class="modal fade" id="customercoefficientModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
			
			</div>
            <div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
