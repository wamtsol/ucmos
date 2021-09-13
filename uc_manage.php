<?php
include("include/db.php");
include("include/utility.php");
include("include/session.php");
include("include/paging.php");
define("APP_START", 1);
$filename = 'uc_manage.php';
include("include/admin_type_access.php");
$tab_array=array("list", "add", "edit", "status", "delete", "bulk_action", "salary");
if(isset($_REQUEST["tab"]) && in_array($_REQUEST["tab"], $tab_array)){
	$tab=$_REQUEST["tab"];
}
else{
	$tab="list";
}

switch($tab){
	case 'add':
		include("modules/uc/add_do.php");
	break;
	case 'edit':
		include("modules/uc/edit_do.php");
	break;
	case 'delete':
		include("modules/uc/delete_do.php");
	break;
	case 'status':
		include("modules/uc/status_do.php");
	break;
	case 'bulk_action':
		include("modules/uc/bulkactions.php");
	break;
		die;
	break;
}
?>
<?php include("include/header.php");?>
  <div class="container-widget row">
    <div class="col-md-12">
      <?php
		switch($tab){
			case 'list':
				include("modules/uc/list.php");
			break;
			case 'add':
				include("modules/uc/add.php");
			break;
			case 'edit':
				include("modules/uc/edit.php");
			break;
		}
      ?>
    </div>
  </div>
</div>
<?php include("include/footer.php");?>