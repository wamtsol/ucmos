<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["coverage_add"])){
	extract($_POST);
	$err="";
	if(empty($campaign_id))
		$err="Fields with (*) are Mandatory.<br />";
	if(numrows(doquery("select id from coverage where campaign_id='".$campaign_id."' and uc_id='".$uc_id."' and day_number='".$day_number."'", $dblink))>0)
		$err.='Record already exists.<br />';
	if($err==""){
		$sql="INSERT INTO coverage (campaign_id, uc_id, day_number, total_vaccinated, user_id) VALUES ('".slash($campaign_id)."', '".$_SESSION["logged_in_admin"]["admin_type_id"]==1?slash($uc_id):slash($ucid)."', '".slash($day_number)."', '".slash($total_vaccinated)."', '".$_SESSION["logged_in_admin"]["id"]."')";
		doquery($sql,$dblink);
		unset($_SESSION["coverage_manage"]["add"]);
		header('Location: coverage_manage.php?tab=list&msg='.url_encode("Successfully Added"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["coverage_manage"]["add"][$key]=$value;
		header('Location: coverage_manage.php?tab=add&err='.url_encode($err));
		die;
	}
}