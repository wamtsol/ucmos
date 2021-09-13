<?php
if(!defined("APP_START")) die("No Direct Access");
if(isset($_GET["id"]) && !empty($_GET["id"])){
	doquery("delete from tehseel where id='".slash($_GET["id"])."'",$dblink);
	header("Location: tehseel_manage.php");
	die;
}