<?php
if(!defined("APP_START")) die("No Direct Access");
?>
<div class="page-header">
	<h1 class="title">Edit UC</h1>
  	<ol class="breadcrumb">
    	<li class="active">Manage UC</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> <a href="uc_manage.php" class="btn btn-light editproject">Back to List</a> </div>
  	</div>
</div>
<form action="uc_manage.php?tab=edit" method="post" enctype="multipart/form-data" name="frmAdd"  class="form-horizontal form-horizontal-left">
	<input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-2 control-label">
                <label class="form-label" for="tehseel_id">Tehseel<span class="red">*</span></label>
            </div>
            <div class="col-sm-10">
                <select name="tehseel_id" title="Choose Option">
                    <option value="0">Select Tehseel</option>
                    <?php
                    $res=doquery("Select * from tehseel order by name",$dblink);
                    if(numrows($res)>0){
                        while($rec=dofetch($res)){
                            ?>
                            <option value="<?php echo $rec["id"]?>"<?php echo($tehseel_id==$rec["id"])?"selected":"";?>><?php echo unslash($rec["name"]); ?></option>
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
            	<label class="form-label" for="name">Name <span class="manadatory">*</span></label>
            </div>
            <div class="col-sm-10">
                <input type="text" title="Enter Name" value="<?php echo $name; ?>" name="name" id="name" class="form-control" >
            </div>
        </div>
  	</div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-2 control-label">
                <label class="form-label" for="admin_id">Admin<span class="red">*</span></label>
            </div>
            <div class="col-sm-10">
                <select name="admin_id" title="Choose Option">
                    <option value="0">Select Admin</option>
                    <?php
                    $res=doquery("Select * from admin order by name",$dblink);
                    if(numrows($res)>0){
                        while($rec=dofetch($res)){
                            ?>
                            <option value="<?php echo $rec["id"]?>"<?php echo($admin_id==$rec["id"])?"selected":"";?>><?php echo unslash($rec["name"]); ?></option>
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
                <label class="form-label" for="target">Target<span class="manadatory">*</span></label>
            </div>
            <div class="col-sm-10">
                <input type="text" title="Enter Target" value="<?php echo $target; ?>" name="target" id="target" class="form-control" >
            </div>
        </div>
    </div>
  	<div class="form-group">
    	<div class="row">
        	<div class="col-sm-2 control-label">
            	<label for="company" class="form-label"></label>
            </div>
            <div class="col-sm-10">
                <input type="submit" value="UPDATE" class="btn btn-default btn-l" name="uc_edit" title="Update Record" />
            </div>
        </div>
  	</div>
</form>