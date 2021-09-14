<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["coverage_edit"])){
	extract($_POST);
	$err="";
	if(empty($campaign_id))
		$err="Fields with (*) are Mandatory.<br />";
	if(numrows(doquery("select id from coverage where campaign_id='".$campaign_id."' and uc_id='".$uc_id."' and day_number='".$day_number."' and id<>'".$id."'", $dblink))>0)
		$err.='Record already exists.<br />';
	if($err==""){
        $sql="Update coverage set `campaign_id`='".slash($campaign_id)."', `uc_id`='".slash($uc_id)."', `day_number`='".slash($day_number)."', `total_vaccinated`='".slash($total_vaccinated)."', `user_if`='".slash($user_if)."'"." where id='".$id."'";
		doquery($sql,$dblink);
		unset($_SESSION["coverage_manage"]["edit"]);
		header('Location: coverage_manage.php?tab=list&msg='.url_encode("Successfully Updated"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["coverage_manage"]["edit"][$key]=$value;
		header("Location: coverage_manage.php?tab=edit&err=".url_encode($err)."&id=$id");
		die;
	}
}
/*----------------------------------------------------------------------------------*/
if(isset($_GET["id"]) && $_GET["id"]!=""){
	$rs=doquery("select * from coverage where id='".slash($_GET["id"])."'",$dblink);
	if(numrows($rs)>0){
		$r=dofetch($rs);
		foreach($r as $key=>$value)
			$$key=htmlspecialchars(unslash($value));
		if(isset($_SESSION["coverage_manage"]["edit"]))
			extract($_SESSION["coverage_manage"]["edit"]);
	}
	else{
		header("Location: coverage_manage.php?tab=list");
		die;
	}
}
else{
	header("Location: coverage_manage.php?tab=list");
	die;
}