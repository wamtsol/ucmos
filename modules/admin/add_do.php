<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_POST["admin_add"])){
	extract($_POST);
	$err="";
	if(empty($admin_type_id) || empty($name) || empty($username) || empty($email) || empty($password))
		$err="Fields with (*) are Mandatory.<br />";
	if(!empty($email) && !emailok($email))
		$err.="E-mail is not valid.<br />";
	if(numrows(doquery("select id from admin where username='".slash($username)."'", $dblink))>0)
		$err.='Username already exists.<br />';
	if(numrows(doquery("select id from admin where email='".slash($email)."'", $dblink))>0)
		$err.='Email address already exists.<br />';
	if($err==""){
		$sql="INSERT INTO admin (admin_type_id, username, name, email, phone_number, password) VALUES ('".slash($admin_type_id)."', '".slash($username)."','".slash($name)."','".slash($email)."','".slash($phone_number)."','".slash($password)."')";
		doquery($sql,$dblink);
		$id=inserted_id();
		foreach($uc_ids as $uc_id){
			doquery( "insert into admin_2_uc values('".$id."', '".$uc_id."')", $dblink );
		}
		unset($_SESSION["admin_manage"]["add"]);
		header('Location: admin_manage.php?tab=list&msg='.url_encode("Successfully Added"));
		die;
	}
	else{
		foreach($_POST as $key=>$value)
			$_SESSION["admin_manage"]["add"][$key]=$value;
		header('Location: admin_manage.php?tab=add&err='.url_encode($err));
		die;
	}
}