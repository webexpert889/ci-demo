<?php
	$controllerName = $this->router->fetch_class();
	$functionName = $this->router->fetch_method();
	$buttons = $this->config->item('buttons_'.$this->session->userdata('site_lang'));
	foreach($buttons as $key => $button)
	{
		if($functionName=="login_details") {
			$buttons[$key]['filename'] = 'login_details';	
		}
		else if($controllerName=="email_logs" && $functionName=="index") {
			$buttons[$key]['exportOptions'] = array('columns'=>array(':not(:last-child)'));
			$buttons[$key]['filename'] = 'email_log_history';	
		}
	}
	?>
	<script>
		var functionName = '<?php echo $this->router->fetch_method(); ?>';
		var langauage = '<?php echo $this->session->userdata('site_lang'); ?>';
		var ajax_url = '<?php echo base_url(); ?>';
		var buttons = '<?php echo json_encode($buttons); ?>';
		var subtotal_label = "<?php echo $this->lang->line('sub_total_label'); ?>";
		var discount_label = "<?php echo $this->lang->line('discount_label'); ?>";
		var freight_amount_label = "<?php echo $this->lang->line('freight_amount_label'); ?>";
		var default_vat = "<?php echo FRENCH_VAT; ?>";
		var vat_label = "<?php echo $this->lang->line('vat_label'); ?>";
		var cancelText = "<?php echo $this->lang->line('calender_cancel_label'); ?>";
		var okText = "<?php echo $this->lang->line('calender_ok_label'); ?>";
		var clearText = "<?php echo $this->lang->line('calender_clear_label'); ?>";
		var orderCreateError = "<?php echo $this->lang->line('order_create_error'); ?>";
		var orderCreateError1 = "<?php echo $this->lang->line('order_create_error_1'); ?>";
		var orderCreateError2 = "<?php echo $this->lang->line('order_create_error_3'); ?>";
		var goodjob = "<?php echo $this->lang->line('success_title_1'); ?>";
		var newPic_share = "<?php echo $this->lang->line('service_share_pic_text'); ?>";
		var newDoc_share = "<?php echo $this->lang->line('service_share_doc_text'); ?>";
		var UserType = "<?php echo $this->session->userdata('AccountType'); ?>";
		var no_orders = "<?php  echo $this->lang->line('no_order_currently'); ?>";
		// for delete service message
		var service_title          = "<?php  echo $this->lang->line('service_delete_confirmation_title');?>";
		var service_buttontext     = "<?php  echo $this->lang->line('service_delete_button_title');?>";
		var service_canceltext     = "<?php  echo $this->lang->line('service_cancel_button_title');?>";
		var service_controller     = 'service';
        var service_functionname   = 'delete_service_msg';
        
        // for remove one email from segment list
        var seg_tool_tip_title    = "<?php  echo $this->lang->line('segment_action_tooltip_remove');?>";
        var seg_remove_title      = "<?php  echo $this->lang->line('segment_email_remove_title');?>";
		var delete_buttontext     = "<?php  echo $this->lang->line('delete_button_text');?>";
		var cancel_buttontext     = "<?php  echo $this->lang->line('cancel_button_text');?>";
		var segment_controller    = 'segment';
        var segment_function      = 'remove_email';
		
		// sale agent messgae for not set value less than unit price
		var unit_value_not_correct  = "<?php  echo $this->lang->line('unit_price_error');?>";
		var loged_in_usertype = "<?php echo $this->session->userdata('AccountType'); ?>";
	</script>
	<script src="<?php echo base_url('assets/bundles/libscripts.bundle.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bundles/vendorscripts.bundle.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/dropzone/dropzone.js'); ?>"></script>
	<?php if ($this->session->userdata('site_lang') === 'french')
	{
	    ?>
	    <input type="hidden" id="language_type" value="fr">
		<script src="<?php echo base_url('assets/plugins/jquery-validation/localization/messages_fr.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap-select/js/i18n/defaults-fr_FR.js'); ?>"></script>
		<?php 
	}
	elseif ($this->session->userdata('site_lang') === 'spanish')
	{
	    ?>
	    <input type="hidden" id="language_type" value="es">
		<script src="<?php echo base_url('assets/plugins/jquery-validation/localization/messages_es.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap-select/js/i18n/defaults-es_ES.js'); ?>"></script>
		<?php 
	}
	else
	{
		?>
		<input type="hidden" id="language_type" value="en">
		<?php
	}

	?>
	<!-- <script src="<?php echo base_url('assets/plugins/aos-animation/aos.js'); ?>"></script> -->
	<script src="<?php echo base_url('assets/plugins/momentjs/moment.js'); ?>"></script> <!-- Moment Plugin Js -->
	<script src="<?php echo base_url('assets/plugins/momentjs/moment-with-locales.js'); ?>"></script> <!-- Moment Plugin Js -->
	<script src="<?php echo base_url('assets/plugins/chartjs/Chart.bundle.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/dataTables.responsive.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/jszip.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/dropzone/dropzone.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/pages/ui/dialogs.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/pages/ui/notifications.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/ladda-bootstrap/dist/spin.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/ladda-bootstrap/dist/ladda.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pages/ui/tooltips-popovers.js'); ?>"></script>
	
	<?php
        $notify = $this->session->flashdata('notification');
        if ($notify)
        {
            ?>
            <script>
                showNotification('<?php echo $notify["flash_color"]; ?>','<?php echo $notify['flash_message']; ?>','top','center','','');
            </script>
	        <?php 
        } 
    ?>
	<?php 
        if($controllerName == "tracking_email" || $controllerName == "send_email" || $controllerName == "email_templates" || $controllerName == "marketing_templates") {
            ?>
            <script src="<?php echo base_url('assets/plugins/tinymce/tinymce.min.js'); ?>"></script>
            <script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
            <script src="<?php echo base_url('assets/js/pages/forms/editors.js'); ?>"></script>
            <?php 
        } 
    ?>
    <script src="<?php echo base_url('assets/bundles/mainscripts.bundle.js'); ?>"></script>
    
    <script src="<?php echo base_url('assets/js/pages/forms/form-validation.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pages/tables/jquery-datatable.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pages/charts/chartjs.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pages/custom.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/wizard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js'); ?>"></script>
    

    <?php 
        if($this->session->userdata('AccountType')!=='0') {
            ?>
            <!--Start of Zendesk Chat Script-->
            <script type="text/javascript">
                window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
                _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
                $.src="https://v2.zopim.com/?zxfynIYQyhDANZlnphrHlEg76Kpuow7A";z.t=+new Date;$.
                type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
            </script>
            <script>
                $zopim(function() {
                $zopim.livechat.window.setPosition('bl');
                $zopim.livechat.button.setPosition('bl');

                $zopim.livechat.setLanguage('fr');
                $zopim.livechat.window.setTitle('Support Technique');
                $zopim.livechat.setLanguage('fr');
                $zopim.livechat.window.setColor('#F54466');
                $zopim.livechat.badge.setText('Pouvons-nous vous aider ?');
                $zopim.livechat.badge.setImage('https://www.abc-export.com/images/abc-Export-200x200.gif');
                $zopim.livechat.concierge.setTitle('Posez-nous toutes vos questions');
                $zopim.livechat.concierge.setName('Support Technique');
                $zopim.livechat.window.hide();
                $zopim.livechat.setGreetings({
                'online': 'Support Technique',
                'offline': 'Laissez-nous un message'
                });});
            </script>
	        <?php 
        }
    ?>

    <!-- faq List -->
	<script type="text/javascript">
		$(function () {
			var tags_id = "6";
			var checkes_id = [];
			checkes_id.push(tags_id);

			var datatables = $('#listing_res').DataTable({
				// Processing indicator
				"processing": true,
				// DataTables server-side processing mode
				"serverSide": true,
				// Initial no order.
				"order": [],
				// Load data from an Ajax source
				"ajax": {
				"url": "<?php echo base_url('faq/getLists/'); ?>",
				"type": "POST",
				data: function ( d ) {
						d.tag_id = checkes_id.join();
					}
				},
				//Set column definition initialisation properties
				"columnDefs": [{ 
				"targets": [0],
				"orderable": false
				}],
				"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) 
				{ 
					$(nRow).addClass('tagcolor_'+aData[3]);					
					$(nRow).find('td').addClass('tagcolor_'+aData[3]);					
				}
			});

		 	$(".tag_show").on("click", function(){
		 		var temp = [];
		 		$('.tag_show:checked').each(function(){
		 			temp.push($(this).val());

		 		})
           		checkes_id = temp;
           		datatables.ajax.reload();
		 	});
		 	// getpop value

		 	$(document).on('click', '.icon_dow', function(){
                var data_value =   $(this).attr("data-value");
				$("#resources_list").modal();

                var request = $.ajax({
                    url: "<?php echo base_url('Faq/Resource_list/'); ?>",
                    type: "POST",
                    data: {Resource_id : data_value},
                    dataType: "json",
                });

                request.done(function(respone) {
                    $("#Resource_name").html(respone.resource[0].Resource_name);
                    $("#Content").html(respone.resource[0].Content);
                    $("#Short_Description").html(respone.resource[0].Short_Description)

                    var images_name = $.trim(respone.resource[0].image_uploads);

                    if(images_name !=  ''){
                        $path = '<?php echo base_url();?>'+'assets/resoures_file/'+images_name ;
                        $images = '<a href='+$path+' download> <buttons type="button" class="btn btn_use" ><?php echo $this->lang->line('resource_pop_dow'); ?> </buttons> </a>';
                    }else{
                        $images = "";
                    }
                    $("#image_uploads").html($images);
                    /* $("#Short_Description").html(respone.resource[0].Short_Description)*/
                    $("#Resource_video").html(respone.resource[0].Resource_video)
                });

                request.fail(function(jqXHR, textStatus) {
                    
                });
		 	})
		});
	</script>
	</body>
</html>