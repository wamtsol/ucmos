<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["campaign_add"])){
	extract($_POST);
	$err="";
	if(empty($start_date))
		$err="Fields with (*) are Mandatory.<br />";
	if($err==""){
		$sql="INSERT INTO campaign (start_date, total_days) VALUES ('".date_dbconvert($start_date)."', '".slash($total_days)."')";
		doquery($sql,$dblink);
		unset($_SESSION["campaign_manage"]["add"]);
		header('Location: campaign_manage.php?tab=list&msg='.url_encode("Successfully Added"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["campaign_manage"]["add"][$key]=$value;
		header('Location: campaign_manage.php?tab=add&err='.url_encode($err));
		die;
	}
}