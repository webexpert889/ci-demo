<section class="content m-t-54">
    <div class="block-header">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="h-left clearfix">
                    <h2 style="text-transform:uppercase;"><?php echo $this->lang->line('user_update_title'); ?></h2>
                    <small><?php echo $this->lang->line('welcome_title_admin_customer_update_page'); ?></small>
                    <ol class="breadcrumb breadcrumb-col-pink p-l-0">
                        <li>
							<a href="<?php echo base_url('dashboard'); ?>">
								<?php echo $this->lang->line('dashboard_menu'); ?>
							</a>
						</li>
                        <li class="active"><?php echo $this->lang->line('user_update_title'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
		<form action="<?php echo base_url('users/edit/'.$UserInfo['User_Id']); ?>" method="POST" autocomplete="off" id="form_validation" >
			<input type="hidden" name="User_Id" id="User_Id" value="<?php echo $UserInfo['User_Id']; ?>">
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="body">
							<label for="FirstName">
								<?php echo $this->lang->line('first_name_label'); ?><span style="color:red">*</span>
							</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="FirstName" id="FirstName" class="form-control" placeholder="<?php echo $this->lang->line('first_name_placeholder'); ?>" value="<?php echo $UserInfo['FirstName']; ?>" required>
								</div>
								<label id="FirstName-error" class="error" for="FirstName"><?php echo form_error('FirstName'); ?></label>
							</div>
							<label for="LastName"><?php echo $this->lang->line('last_name_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="LastName" id="LastName" class="form-control" placeholder="<?php echo $this->lang->line('last_name_placeholder'); ?>" value="<?php echo $UserInfo['LastName']; ?>" required>
								</div>
								<label id="LastName-error" class="error" for="LastName"><?php echo form_error('LastName'); ?></label>
							</div>
							<label for="Email"><?php echo $this->lang->line('email_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<input type="email" name="Email" id="Email" class="form-control" placeholder="<?php echo $this->lang->line('email_placeholder'); ?>" value="<?php echo $UserInfo['Email']; ?>" required >
								</div>
								<label id="Email-error" class="error" for="Email"><?php echo form_error('Email'); ?></label>
							</div>
							<label for="Phone"><?php echo $this->lang->line('phone_label'); ?></label>
							<div class="form-group">
								<div class="form-line">
									<input minlength="10" min="1" type="number" name="Phone" id="Phone" class="form-control" placeholder="<?php echo $this->lang->line('phone_placeholder'); ?>" value="<?php echo $UserInfo['Phone']; ?>">
								</div>
								<label id="Phone-error" class="error" for="Phone"><?php echo form_error('Phone'); ?></label>
							</div>
							<label for="CompanyName"><?php echo $this->lang->line('company_name_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="CompanyName" id="CompanyName" class="form-control" placeholder="<?php echo $this->lang->line('company_name_placeholder'); ?>" value="<?php echo $UserInfo['CompanyName']; ?>" required >
								</div>
								<label id="CompanyName-error" class="error" for="CompanyName"><?php echo form_error('CompanyName'); ?></label>
							</div>
							<label for="CompanyAddress"><?php echo $this->lang->line('company_address_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" name="CompanyAddress" id="CompanyAddress" class="form-control" placeholder="<?php echo $this->lang->line('company_address_placeholder'); ?>" value="<?php echo $UserInfo['CompanyAddress']; ?>" required >
								</div>
								<label id="CompanyAddress-error" class="error" for="CompanyAddress"><?php echo form_error('CompanyAddress'); ?></label>
							</div>

							<label for="Country_Id"><?php echo $this->lang->line('country_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<select data-live-search="true" data-size="10" name="Country_Id" class="form-control show-tick" required >
										<option value=""><?php echo $this->lang->line('select_country_title'); ?></option>
										<?php foreach($CountryInfo as $Country) { ?>
										<option value="<?php echo $Country['Country_Id']; ?>" <?php echo ($UserInfo['Country_Id']==$Country['Country_Id']?'selected':''); ?> ><?php echo $Country['CountryName']; ?></option>
										<?php } ?>
									</select>
								</div>
								<label id="Country_Id-error" class="error" for="Country_Id"><?php echo form_error('Country_Id'); ?></label>
							</div>

							<label for="AccountType"><?php echo $this->lang->line('account_type_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<select name="AccountType" class="form-control show-tick" required >
										<option value=""><?php echo $this->lang->line('select_account_type_title'); ?></option>
										<option value="0" <?php echo ($UserInfo['AccountType']=='0'?'selected':''); ?> >Admin</option>
										<option value="1" <?php echo ($UserInfo['AccountType']=='1'?'selected':''); ?> >abc Export</option>
										<option value="2" <?php echo ($UserInfo['AccountType']=='2'?'selected':''); ?> >abc France</option>
									</select>
								</div>
								<label id="AccountType-error" class="error" for="AccountType"><?php echo form_error('AccountType'); ?></label>
							</div>
							<label for="Currency"><?php echo $this->lang->line('currency_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<select name="Currency_Id" class="form-control show-tick" required >
										<option value=""><?php echo $this->lang->line('select_currency_title'); ?></option>
										<?php foreach($CurrencyInfo as $Currency) { ?>
										<option value="<?php echo $Currency['Currency_Id']; ?>" <?php echo ($UserInfo['Currency_Id']==$Currency['Currency_Id']?'selected':''); ?> ><?php echo $Currency['Name']; ?></option>
										<?php } ?>
									</select>
								</div>
								<label id="Currency_Id-error" class="error" for="Currency_Id"><?php echo form_error('Currency_Id'); ?></label>
							</div>
							<label for="Language"><?php echo $this->lang->line('language_label'); ?><span style="color:red">*</span></label>
							<div class="form-group">
								<div class="form-line">
									<select name="Language" class="form-control show-tick" required >
										<option value=""><?php echo $this->lang->line('select_language_title'); ?></option>
										<?php foreach($LanguageInfo as $Language) { ?>
										<option value="<?php echo $Language['Value']; ?>" <?php echo ($UserInfo['Language']==$Language['Value']?'selected':''); ?> ><?php echo $Language['Name']; ?></option>
										<?php } ?>
									</select>
								</div>
								<label id="Language-error" class="error" for="Language"><?php echo form_error('Language'); ?></label>
							</div>


							<label for="Language"><?php echo $this->lang->line('comment_label'); ?><span style="color:red">*</span></label>
                            <div class="form-group">
                                <div class="form-line">

                                <textarea  class="form-control" rows="4" cols="50" name="User_comment" value="set_value('User_comment'); ?>" >
                               <?php echo $UserInfo['User_comment']; ?>
                                </textarea>
                                   
                                </div>
                                <label id="User_comment-error" class="error" for="User_comment"><?php echo form_error('User_comment'); ?></label>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2><?php echo $this->lang->line('user_create_title1'); ?></h2>
						</div>
						<div class="body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th><?php echo $this->lang->line('brand_label'); ?></th>
										<th><?php echo $this->lang->line('pricetype_label'); ?></th>
										<th><?php echo $this->lang->line('coefficient_label'); ?></th>
										<th><?php echo $this->lang->line('visible_label'); ?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									    if(isset($CoeffeciantInfo) && !empty($CoeffeciantInfo)) {
									        $i=0;
									        foreach($CoeffeciantInfo as $Coeffeciant) {
									            ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="Brand_Id[]" value="<?php echo $Coeffeciant['Brand_Id']; ?>">
                                                        <?php echo $Coeffeciant['Name']; ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                    if($Coeffeciant['PriceType']==='Buying') {
                                                        echo $this->lang->line('pricetype_1');
                                                    }
                                                    else if($Coeffeciant['PriceType']==='Public') {
                                                        echo $this->lang->line('pricetype_2');
                                                    } 
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="Value_<?php echo $i;?>" style="text-align:right;font-size:14px;font-family: &quot;Work Sans&quot;,Arial,Tahoma,sans-serif; font-weight:400;" min="0" value="<?php echo $Coeffeciant['Value']; ?>" <?php echo ($Coeffeciant['Status']==='0')?'':'disabled'; ?> required>
                                                    </td>
                                                    <td>
                                                        <div class="switch">
                                                            <label>
                                                                <input class="value_checkbox" rel="<?php echo $i;?>" name="Status_<?php echo $i;?>" type="checkbox" <?php echo ($Coeffeciant['Status']==='0')?'checked':''; ?>>
                                                                <span class="lever"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $i++; 
                                            }
                                        }
                                    ?>
								</tbody>
							</table>
							<button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
								<?php echo $this->lang->line('update_button'); ?>
							</button>
							<button id="reset_password" type="button" class="btn btn-raised btn-primary m-t-15 waves-effect">
								<?php echo $this->lang->line('user_reset_button'); ?>
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>