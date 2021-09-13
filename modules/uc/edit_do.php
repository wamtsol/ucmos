<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["uc_edit"])){
	extract($_POST);
	$err="";
	if(empty($name) )
		$err="Fields with (*) are Mandatory.<br />";
	if($err==""){
        $sql="Update uc set `tehseel_id`='".slash($tehseel_id)."'".", `name`='".slash($name)."', `admin_id`='".slash($admin_id)."', `target`='".slash($target)."'"." where id='".$id."'";
		doquery($sql,$dblink);
		unset($_SESSION["uc_manage"]["edit"]);
		header('Location: uc_manage.php?tab=list&msg='.url_encode("Sucessfully Updated"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["uc_manage"]["edit"][$key]=$value;
		header("Location: uc_manage.php?tab=edit&err=".url_encode($err)."&id=$id");
		die;
	}
}
/*----------------------------------------------------------------------------------*/
if(isset($_GET["id"]) && $_GET["id"]!=""){
	$rs=doquery("select * from uc where id='".slash($_GET["id"])."'",$dblink);
	if(numrows($rs)>0){
		$r=dofetch($rs);
		foreach($r as $key=>$value)
			$$key=htmlspecialchars(unslash($value));
		if(isset($_SESSION["uc_manage"]["edit"]))
			extract($_SESSION["uc_manage"]["edit"]);
	}
	else{
		header("Location: uc_manage.php?tab=list");
		die;
	}
}
else{
	header("Location: uc_manage.php?tab=list");
	die;
}