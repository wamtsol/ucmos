<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["uc_add"])){
	extract($_POST);
	$err="";
	if( empty($name) )
		$err="Fields with (*) are Mandatory.<br />";
	if($err==""){
        $sql="INSERT INTO uc (tehseel_id, name, admin_id, target) VALUES ('".slash($tehseel_id)."', '".slash($name)."','".slash($admin_id)."','".slash($target)."')";
		doquery($sql,$dblink);
		unset($_SESSION["uc_manage"]["add"]);
		header('Location: uc_manage.php?tab=list&msg='.url_encode("Sucessfully Added"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["uc_manage"]["add"][$key]=$value;
		header('Location: uc_manage.php?tab=add&err='.url_encode($err));
		die;
	}
}