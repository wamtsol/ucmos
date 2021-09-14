<?php
if(!defined("APP_START")) die("No Direct Access");
?>
<div class="page-header">
	<h1 class="title">Edit Coverage</h1>
  	<ol class="breadcrumb">
    	<li class="active">Manage Coverage</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> <a href="coverage_manage.php" class="btn btn-light editproject">Back to List</a> </div>
  	</div>
</div>
<form action="coverage_manage.php?tab=edit" method="post" enctype="multipart/form-data" name="frmAdd"  class="form-horizontal form-horizontal-left">
	<input type="hidden" name="id" value="<?php echo $id;?>">

	<div class="form-group">
        <div class="row">
            <div class="col-sm-2 control-label">
                <label class="form-label" for="campaign_id">Campaign <span class="red">*</span></label>
            </div>
            <div class="col-sm-10">
                <select name="campaign_id" title="Choose Option" class="select_multiple">
                    <option value="0">Select Campaign</option>
                    <?php
                    $res=doquery("Select * from campaign order by start_date desc",$dblink);
                    if(numrows($res)>0){
                        while($rec=dofetch($res)){
                            ?>
                            <option value="<?php echo $rec["id"]?>"<?php echo($campaign_id==$rec["id"])?"selected":"";?>><?php echo date_convert($rec["start_date"]); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
	<div class="form-group">
        <div class="row">
            <div class="col-sm-2 control-label">
                <label class="form-label" for="uc_id">UC </label>
            </div>
            <div class="col-sm-10">
                <select name="uc_id" title="Choose Option" class="select_multiple">
                    <option value="0">Select UC</option>
                    <?php
                    $res=doquery("Select * from uc where status = 1 order by name",$dblink);
                    if(numrows($res)>0){
                        while($rec=dofetch($res)){
                            ?>
                            <option value="<?php echo $rec["id"]?>"<?php echo($uc_id==$rec["id"])?"selected":"";?>><?php echo unslash($rec["name"]); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label class="form-label" for="day_number">Day Number</label>
            </div>
            <div class="col-sm-10">
                <input type="text" title="Enter Day Number" value="<?php echo $day_number; ?>" name="day_number" id="day_number" class="form-control" >
            </div>
        </div>
  	</div>
	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label class="form-label" for="total_vaccinated">Total Vaccinated</label>
            </div>
            <div class="col-sm-10">
                <input type="text" title="Enter Total Vaccinated" value="<?php echo $total_vaccinated; ?>" name="total_vaccinated" id="total_vaccinated" class="form-control" >
            </div>
        </div>
  	</div>
  	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label for="company" class="form-label"></label>
            </div>
            <div class="col-sm-10">
                <input type="submit" value="UPDATE" class="btn btn-default btn-l" name="coverage_edit" title="Update Record" />
            </div>
        </div>
  	</div>
</form>