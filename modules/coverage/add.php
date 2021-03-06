<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_SESSION["coverage_manage"]["add"])){
	extract($_SESSION["coverage_manage"]["add"]);
}
else{
	$campaign_id=isset($_SESSION["coverage_manage"]["campaign_id"])?$_SESSION["coverage_manage"]["campaign_id"]:"";
	$uc_id=$_SESSION["logged_in_admin"]["admin_type_id"]==1?"":$ucid["id"];
	$day_number="";
	$total_vaccinated="";
}
//echo $uc_id;
?>
<div class="page-header">
	<h1 class="title">Add New Coverage</h1>
  	<ol class="breadcrumb">
    	<li class="active">Manage Coverage</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> <a href="coverage_manage.php" class="btn btn-light editproject">Back to List</a> </div>
  	</div>
</div>
<form action="coverage_manage.php?tab=add" method="post" enctype="multipart/form-data" name="frmAdd"  onSubmit="return checkFields();" class="form-horizontal form-horizontal-left">
	<?php if(!empty($uc_id)){?>
    <input type="hidden" name="uc_id" value="<?php echo $uc_id?>" />
    <?php }?>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-2 control-label">
                <label class="form-label" for="campaign_id">Campaign <span class="red">*</span></label>
            </div>
            <div class="col-sm-10">
                <select name="campaign_id" id="campaign_id" onchange="totalDays()" title="Choose Option" class="select_multiple">
                    <option value="0">Select Campaign</option>
                    <?php
                    $res=doquery("Select * from campaign order by start_date desc",$dblink);
                    if(numrows($res)>0){
                        while($rec=dofetch($res)){
                            ?>
                            <option value="<?php echo $rec["id"]?>"  data-id="<?php echo $rec["total_days"]?>" <?php echo($campaign_id==$rec["id"])?"selected":"";?>><?php echo date_convert($rec["start_date"]); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <?php if($_SESSION["logged_in_admin"]["admin_type_id"]==1){?>
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
    <?php }?>
	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label class="form-label" for="day_number">Day Number</label>
            </div>
            <div class="col-sm-10">
				<select name="day_number" title="Choose Option">
					<option value="1"<?php echo ($day_number=="1")? " selected":"";?>>Day 1</option>
                    <option value="2"<?php echo ($day_number=="2")? " selected":"";?>>Day 2</option>
					<option value="3"<?php echo ($day_number=="3")? " selected":"";?>>Day 3</option>
					<option value="4"<?php echo ($day_number=="4")? " selected":"";?>>Day 4</option>
					<option value="5"<?php echo ($day_number=="5")? " selected":"";?>>Day 5</option>
					<option value="0"<?php echo ($day_number=="0")? " selected":"";?>>Extended Coverage Day</option>
                </select>
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
                <input type="submit" value="SUBMIT" class="btn btn-default btn-l" name="coverage_add" title="Submit Record" />
            </div>
        </div>
  	</div>
</form>