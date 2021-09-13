<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["tehseel_add"])){
	extract($_POST);
	$err="";
	if( empty($name) )
		$err="Fields with (*) are Mandatory.<br />";
	if($err==""){
		$sql="INSERT INTO tehseel (name) VALUES ('".slash($name)."')";
		doquery($sql,$dblink);
		unset($_SESSION["tehseel_manage"]["add"]);
		header('Location: tehseel_manage.php?tab=list&msg='.url_encode("Sucessfully Added"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["tehseel_manage"]["add"][$key]=$value;
		header('Location: tehseel_manage.php?tab=add&err='.url_encode($err));
		die;
	}
}