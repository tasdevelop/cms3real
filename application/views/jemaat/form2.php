<script type="text/javascript">
function readurl(input) {
    var x = $("#photofile").val();
    var ext = x.split('.').pop();
    switch(ext){
        case 'jpg':
        case 'JPG':
	        var reader = new FileReader();
	        reader.onload = function (e){
	            $('#blah')
	            .attr('src', e.target.result)
	            .width(200);
	        };
	        reader.readAsDataURL(input.files[0]);
	        $("#extphotofile").val(ext);
        break;
        default:
	        $("#extphotofile").val("");
            alert('extensi harus jpg');
            this.value='';
    }
}

$(document).ready(function(){
	$('input[type=text]').focusout(function() {
		$(this).val($(this).val().toUpperCase());
	});

	$("#btn_clear_photo").click(function(){
		$("#blah").attr("src", "<?php echo base_url();?>uploads/medium_nofoto.jpg");
		$("#editphotofile").val("clearfoto");
	});

    $('input[type=email]').focusout(function() {
        $(this).val($(this).val().toLowerCase());
    });

    $('textarea').focusout(function() {
        $(this).val($(this).val().toUpperCase());
    });

});
</script>
<?php

	@$query=("SELECT *, DATE_FORMAT(dob,'%d-%m-%Y') dob,
		DATE_FORMAT(tglbesuk,'%d-%m-%Y') tglbesuk,
		DATE_FORMAT(baptismdate,'%d-%m-%Y') baptismdate,
		DATE_FORMAT(modifiedon,'%d-%m-%Y %T') modifiedon FROM tblmember WHERE member_key=".$member_key." LIMIT 0,1");
    // echo $query;
    @$datarow=queryCustom($query);
    @$exp1 = explode('-',$datarow->dob);
    @$dob = $exp1[1]."/".$exp1[0]."/".$exp1[2];
    @$dob = @$dob == "00/00/0000"?"":@$dob;
    @$exp2 = explode('-',$datarow->baptismdate);
    @$baptismdate = $exp2[1]."/".$exp2[0]."/".$exp2[2];
    @$baptismdate= @$baptismdate == "00/00/0000"?"":@$baptismdate;
?>
  <h3 class="noMargin">Jemaat Informasi</h3>
    <div class="row">
        <div class="col-md-7 borderForm">
            <input type="hidden" name="member_key" value="<?= @$datarow->member_key  ?>">
            <div style="margin-bottom:10px">
                <label>GRP PI : </label>
                <input name="grp_pi" class="easyui-checkbox" required="" type="checkbox" <?= @$datarow->grp_pi==1 OR @$grp_pi=="pi"?"checked":"" ?>  value="1" label="grp_pi:">
            </div>
            <div style="margin-bottom:10px">
                <input name="relationno"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"   value="<?= @$datarow->relationno ?>" label="relationno:">
            </div>
            <div style="margin-bottom:10px">
                <input name="memberno"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"   value="<?= @$datarow->memberno ?>" label="memberno:">
            </div>
            <div style="margin-bottom:10px">
                <input name="membername"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->membername ?>" label="membername:">
            </div>
            <div style="margin-bottom:10px">
                <input name="chinesename"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->chinesename ?>" label="chinesename:">
            </div>
            <div style="margin-bottom:10px">
                <input name="phoneticname"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->phoneticname ?>" label="phoneticname:">
            </div>
            <div style="margin-bottom:10px">
                <input name="aliasname"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->aliasname ?>" label="aliasname:">
            </div>
            <div style="margin-bottom:10px">
                <input name="tel_h"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->tel_h ?>" label="tel_h:">
            </div>
            <div style="margin-bottom:10px">
                <input name="tel_o"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->tel_o ?>" label="tel_o:">
            </div>
            <div style="margin-bottom:10px">
                <input name="handphone"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->handphone ?>" label="handphone:">
            </div>
            <div style="margin-bottom:10px">
                <input name="address"  labelPosition="top" class="easyui-textbox" required="" style="width:100%;height:100px"  multiline="true"    value="<?= @$datarow->address ?>" label="address:">
            </div>
            <div style="margin-bottom:10px">
               <input name="add2"  labelPosition="top" class="easyui-textbox" required="" style="width:100%;height:100px"  multiline="true"    value="<?= @$datarow->add2 ?>" label="add2:">
            </div>
            <div style="margin-bottom:10px">
                <input name="city"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->city ?>" label="city:">
            </div>
            <div style="margin-bottom:10px">
                <select name="genderid"  labelPosition="top" class="easyui-combobox" label="GenderId:" style="width:100%;">
                <option value=""></option>
                <?php
                    foreach ($sqlgender as $rowform) {

                        ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                    }
                ?>
            </select>
            </div>
            <div style="margin-bottom:10px">
               <select id="pstatusid" name="pstatusid"  labelPosition="top" class="easyui-combobox" label="pstatusid:" style="width:100%;">
                <option value=""></option>
                <?php
                    foreach ($sqlpstatus as $rowform) {

                        ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                    }
                ?>
            </select>
            </div>
            <div style="margin-bottom:10px">
                <input name="pob"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->pob ?>" label="pob:">
            </div>
            <div style="margin-bottom:10px">
                <input name="dob"  labelPosition="top" class="easyui-datebox" required="" style="width:100%"    value="<?= @$dob ?>" label="dob:">
            </div>
            <div style="margin-bottom:10px">
               <select id="bloodid" name="bloodid"  labelPosition="top" class="easyui-combobox" label="bloodid:" style="width:100%;">
                <option value=""></option>
                <?php
                    foreach ($sqlblood as $rowform) {
                        ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                    }

                ?>
            </select>
            </div>
            <div style="margin-bottom:10px">
                <select id="kebaktianid" name="kebaktianid"  labelPosition="top" class="easyui-combobox" label="kebaktianid:" style="width:100%;">
                <option value=""></option>
                <?php
                    foreach ($sqlkebaktian as $rowform) {
                        ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                    }

                ?>
            </select>
            </div>
            <div style="margin-bottom:10px">
                <select id="persekutuanid" name="persekutuanid"  labelPosition="top" class="easyui-combobox" label="persekutuanid:" style="width:100%;">
                <option value=""></option>
                <?php
                    foreach ($sqlpersekutuan as $rowform) {
                        ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                    }

                ?>
            </select>
            </div>
            <div style="margin-bottom:10px">
                <select id="rayonid" name="rayonid" class="easyui-combobox" labelPosition="top" label="persekutuanid:" style="width:100%;">
                <option value=""></option>
                <?php
                    foreach ($sqlrayon as $rowform) {
                        ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                    }
                ?>
            </select>
            </div>
            <div style="margin-bottom:10px">
                <select id="statusid" name="statusid"  labelPosition="top" class="easyui-combobox" label="persekutuanid:" style="width:100%;">
                    <option value=""></option>
                    <?php
                        foreach ($sqlstatusid as $rowform) {
                           ?>
                            <option <?php if(@$datarow->parameter_key==$rowform->parameter_key){echo "selected";} ?> value="<?php echo $rowform->parameter_key ?>"><?php echo $rowform->parametertext ?></option>
                        <?php
                        }

                    ?>
                </select>
            </div>
             <div style="margin-bottom:10px">
                <link href="<?php echo base_url()?>libraries/select2-3.4.6/select2.css" rel="stylesheet"/>
                <script src="<?php echo base_url()?>libraries/select2-3.4.6/select2.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#servingid").select2({
                            placeholder: "Select a State"
                        });
                    });
                </script>
                <label>Serving</label><br>
                <select id="servingid" name="servingid[]" multiple="multiple" style="width:204px; font-size:10px;">
                <option value=""></option>
                <?php
                    foreach ($sqlserving as $rowform) {
                        $serving = @$datarow->parametertext;
                        $findme = $rowform->parameter_key;
                        $pos = strpos($serving, $findme);
                        ?>
                            <option <?php if($pos!==false){echo"selected";} ?>  value="<?php echo $rowform->parameter_key ?>"><span style="color:rgb(255,0,0);"><?php echo $rowform->parametertext ?></span></option>
                        <?php
                    }
                ?>
            </select>
            </div>
             <div style="margin-bottom:10px">
                <input name="fax"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->fax ?>" label="fax:">
            </div>
             <div style="margin-bottom:10px">
                <input name="email"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->email ?>" label="email:">
            </div>
             <div style="margin-bottom:10px">
                <input name="website"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->website ?>" label="website:">
            </div>
             <div style="margin-bottom:10px">
                <input name="baptismdocno"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->baptismdocno ?>" label="baptismdocno:">
            </div>
            <div style="margin-bottom:10px">
               <label>baptis</label><br>
                <input type="checkbox" value="1" id="baptis" name="baptis" <?php if(@$datarow->baptis==1){echo "checked";} ?>></td>
            </div>
              <div style="margin-bottom:10px">
                <input name="baptismdate"  labelPosition="top" class="easyui-datebox" required="" style="width:100%"    value="<?= @$baptismdate ?>" label="baptismdate:">
            </div>
             <div style="margin-bottom:10px">
                <input name="remark"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->remark ?>" label="remark:">
            </div>
             <div style="margin-bottom:10px">
                <input name="relation"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->relation ?>" label="relation:">
            </div>
              <div style="margin-bottom:10px">
                <input name="oldgrp"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->oldgrp ?>" label="oldgrp:">
            </div>
            <div style="margin-bottom:10px">
                <input name="kebaktian"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->kebaktian ?>" label="kebaktian:">
            </div>
        <?php
        $pembesukdari="";
        $remark="";
        $besukdate="";
        $q = ("SELECT * FROM tblbesuk WHERE member_key='$member_key' ORDER BY besukdate DESC");
        $dta=queryCustom($q);
        //$q = mysql_query("SELECT *, DATE_FORMAT(besukdate,'%Y-%m-%d') AS besukdate FROM tblbesuk WHERE recno='$recno' ORDER BY besukdate DESC");
        if(!empty($dta)){
            $pembesukdari=@$dta->pembesukdari;

            $remark=@$dta->remark;
            $besukdate=@$dta->besukdate;

            $d=strtotime($besukdate);
            $besukdate = date("Y-m-d", $d);
        }
    ?>
           <div style="margin-bottom:10px">
                <input name="besukdate"  labelPosition="top" class="easyui-textbox" readonly="" style="width:100%"   value="<?= @$besukdate ?>" label="besukdate:">
            </div>
             <div style="margin-bottom:10px">
                <input name="pembesukdari"  labelPosition="top" class="easyui-textbox" readonly="" style="width:100%"    value="<?= @$pembesukdari ?>" label="pembesukdari:">
            </div>
            <div style="margin-bottom:10px">
                <input name="remark"  labelPosition="top" class="easyui-textbox" readonly="" style="width:100%"    value="<?= @$remark ?>" label="remark:">
            </div>

            <div style="margin-bottom:10px">
                <input name="teambesuk"  labelPosition="top" class="easyui-textbox" required="" style="width:100%"    value="<?= @$datarow->teambesuk ?>" label="teambesuk:">
            </div>

            <div style="margin-bottom:10px">
                <input name="description"  labelPosition="top" class="easyui-textbox" required=""  style="width:100%"    value="<?= @$datarow->description ?>" label="description:">
            </div>


        </div>
        <div class="col-md-5">
            <?php
                $url = @$datarow->photofile!=""?"medium_".@$datarow->photofile:"medium_nofoto.jpg";
            ?>
            <img width="200" class="mediumpic" id="blah" src="<?= base_url() ?>uploads/<?= $url ?>">
            <p>
                <div class="easyui-linkbutton upload"  iconCls="icon-upload">
                    Ganti Foto
                    <input type="file" name="photofile" id="photofile" onchange="readurl(this)">
                </div>
            </p>
            <p style="width: 100px;">
                 <a href="<?= base_url() ?>jemaat/download/<?= $url ?>" class="easyui-linkbutton" iconCls="icon-save"></a>
                  <a href="#" id="btn_clear_photo" class="easyui-linkbutton" iconCls="icon-cancel"></a>
            </p>
            <input type="hidden" name="editphotofile" id="editphotofile" value="<?= @$datarow->photofile ?>">
            <input type="hidden" name="extphotofile" id="extphotofile">
            <div id="loading"></div>
        </div>
    </div>