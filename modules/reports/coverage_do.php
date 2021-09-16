<?php
if(!defined("APP_START")) die("No Direct Access");
$extra='';
$is_search=true;
if(isset($_GET["campaign_id"])){
	$campaign_id=slash($_GET["campaign_id"]);
	$_SESSION["reports"]["general_journal"]["campaign_id"]=$campaign_id;
}
if(isset($_SESSION["reports"]["general_journal"]["campaign_id"]))
	$campaign_id=$_SESSION["reports"]["general_journal"]["campaign_id"];
else
	$campaign_id="";

