<form id="fm2" method="post"  style="margin:0;padding:20px" action="<?php echo base_url()?>jemaat/crud" name="<?php echo $formname ?>" id="<?php echo $formname ?>" enctype="multipart/form-data">
	<input type="hidden" name="oper" value="edit">
	<?php $this->load->view("jemaat/form2") ?>
</form>