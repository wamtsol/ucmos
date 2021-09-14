<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["campaign_edit"])){
	extract($_POST);
	$err="";
	if(empty($start_date))
		$err="Fields with (*) are Mandatory.<br />";
	if($err==""){
        $sql="Update campaign set `start_date`='".date_dbconvert($start_date)."', `total_days`='".slash($total_days)."'"." where id='".$id."'";
		doquery($sql,$dblink);
		unset($_SESSION["campaign_manage"]["edit"]);
		header('Location: campaign_manage.php?tab=list&msg='.url_encode("Successfully Updated"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["campaign_manage"]["edit"][$key]=$value;
		header("Location: campaign_manage.php?tab=edit&err=".url_encode($err)."&id=$id");
		die;
	}
}
/*----------------------------------------------------------------------------------*/
if(isset($_GET["id"]) && $_GET["id"]!=""){
	$rs=doquery("select * from campaign where id='".slash($_GET["id"])."'",$dblink);
	if(numrows($rs)>0){
		$r=dofetch($rs);
		foreach($r as $key=>$value)
			$$key=htmlspecialchars(unslash($value));
			$start_date = date_convert($start_date);
		if(isset($_SESSION["campaign_manage"]["edit"]))
			extract($_SESSION["campaign_manage"]["edit"]);
	}
	else{
		header("Location: campaign_manage.php?tab=list");
		die;
	}
}
else{
	header("Location: campaign_manage.php?tab=list");
	die;
}