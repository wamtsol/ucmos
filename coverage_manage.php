<?php
include("include/db.php");
include("include/utility.php");
include("include/session.php");
include("include/paging.php");
define("APP_START", 1);
$filename = 'coverage_manage.php';
include("include/admin_type_access.php");
$tab_array=array("list", "add", "edit", "status", "delete", "bulk_action");
if(isset($_REQUEST["tab"]) && in_array($_REQUEST["tab"], $tab_array)){
	$tab=$_REQUEST["tab"];
}
else{
	$tab="list";
}
$ucid = dofetch(doquery("select id from uc where admin_id = '".$_SESSION["logged_in_admin"]["id"]."'",$dblink));

switch($tab){
	case 'add':
		include("modules/coverage/add_do.php");
	break;
	case 'edit':
		include("modules/coverage/edit_do.php");
	break;
	case 'delete':
		include("modules/coverage/delete_do.php");
	break;
	case 'status':
		include("modules/coverage/status_do.php");
	break;
	case 'bulk_action':
		include("modules/coverage/bulkactions.php");
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
				include("modules/coverage/list.php");
			break;
			case 'add':
				include("modules/coverage/add.php");
			break;
			case 'edit':
				include("modules/coverage/edit.php");
			break;
		}
      ?>
    </div>
  </div>
</div>
<?php include("include/footer.php");?>