<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_SESSION["campaign_manage"]["add"])){
	extract($_SESSION["campaign_manage"]["add"]);
}
else{
	$start_date=date('d/m/Y');
	$total_days="";
}
?>
<div class="page-header">
	<h1 class="title">Add New Campaign</h1>
  	<ol class="breadcrumb">
    	<li class="active">Manage Campaign</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> <a href="campaign_manage.php" class="btn btn-light editproject">Back to List</a> </div>
  	</div>
</div>
<form action="campaign_manage.php?tab=add" method="post" enctype="multipart/form-data" name="frmAdd"  onSubmit="return checkFields();" class="form-horizontal form-horizontal-left">
	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label class="form-label" for="start_date">Start Date <span class="manadatory">*</span></label>
            </div>
            <div class="col-sm-10">
                <input type="text" title="Enter Start Date" value="<?php echo $start_date; ?>" name="start_date" id="start_date" class="form-control date-picker" >
            </div>
        </div>
  	</div>
	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label class="form-label" for="total_days">Total Days</label>
            </div>
            <div class="col-sm-10">
                <input type="text" title="Enter Total Days" value="<?php echo $total_days; ?>" name="total_days" id="total_days" class="form-control" >
            </div>
        </div>
  	</div>
  	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label for="company" class="form-label"></label>
            </div>
            <div class="col-sm-10">
                <input type="submit" value="SUBMIT" class="btn btn-default btn-l" name="campaign_add" title="Submit Record" />
            </div>
        </div>
  	</div>
</form>