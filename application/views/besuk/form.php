<script type="text/javascript">
	$(document).ready(function(){

		$('input[type=text]').focusout(function() {
			$(this).val($(this).val().toUpperCase());
		});

	    $('input[type=email]').keyup(function() {
	        $(this).val($(this).val().toLowerCase());
	    });

	    $('textarea').keyup(function() {
	        $(this).val($(this).val().toUpperCase());
	    });

	});
</script>
<?php
	$this->load->view('besuk/jemaat');
?>
<hr>
<?php
	@$query=("SELECT *, DATE_FORMAT(besukdate,'%d-%m-%Y') besukdate,
		DATE_FORMAT(modifiedon,'%d-%m-%Y %T') modifiedon FROM tblbesuk WHERE besukid=".$besukid." LIMIT 0,1");
	@$row=queryCustom($query);
?>
<input type="hidden" name="besukid" value="<?php echo @$row->besukid ?>">
	<div style="margin-bottom:10px">
        <input name="member_key" labelPosition="top" class="easyui-textbox"  value="<?= @$member_key ?>" readonly="" label="member_key:" style="width:100%">
    </div>
    <div style="margin-bottom:10px">
	        <input name="besukdate" labelPosition="top" class="easyui-datebox"  value="<?= @$row->besukdate ?>" label="besukdate:" style="width:100%">
	</div>
	<div style="margin-bottom:10px">
        <input name="pembesuk" labelPosition="top" class="easyui-textbox"  value="<?= @$row->pembesuk ?>" label="pembesuk:" style="width:100%">
	</div>
	<div style="margin-bottom:10px">
        <input name="pembesukdari" labelPosition="top" class="easyui-textbox"  value="<?= @$row->pembesukdari ?>" label="pembesukdari:" style="width:100%">
	</div>
	<div style="margin-bottom:10px">
        <input name="remark" labelPosition="top" class="easyui-textbox"  value="<?= @$row->remark ?>" label="remark:" style="width:100%">
	</div>
	<div style="margin-bottom:10px">
        <input name="besuklanjutan" labelPosition="top" class="easyui-textbox"  value="<?= @$row->besuklanjutan ?>" label="besuklanjutan:" style="width:100%">
	</div>