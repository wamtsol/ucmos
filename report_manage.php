<?php
include("include/db.php");
include("include/utility.php");
include("include/session.php");
include("include/paging.php");
define("APP_START", 1);
$filename = 'report_manage.php';
include("include/admin_type_access.php");
$tab_array=array("coverage", "coverage_print");
if(isset($_REQUEST["tab"]) && in_array($_REQUEST["tab"], $tab_array)){
	$tab=$_REQUEST["tab"];
}
else{
	$tab="coverage";
}
switch($tab){
	case 'coverage':
		include("modules/reports/coverage_do.php");
	break;
	case 'coverage_print':
		include("modules/reports/coverage_print.php");
	break;
}
?>
<?php include("include/header.php");?>
  <div class="container-widget row">
    <div class="col-md-12">
      <?php
		switch($tab){
			case 'coverage':
				include("modules/reports/coverage.php");
			break;
		}
      ?>
    </div>
  </div>
</div>
<?php include("include/footer.php");?>