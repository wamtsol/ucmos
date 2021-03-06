<?php
if(!defined("APP_START")) die("No Direct Access");
$q="";
$extra='';
$is_search=false;
if(isset($_GET["q"])){
	$q=slash($_GET["q"]);
	$_SESSION["coverage_manage"]["q"]=$q;
}
if(isset($_SESSION["coverage_manage"]["q"]))
	$q=$_SESSION["coverage_manage"]["q"];
else
	$q="";
if(!empty($q)){
	$extra.=" and id like '%".$q."%'";
	$is_search=true;
}
if(isset($_GET["campaign_id"])){
	$campaign_id=slash($_GET["campaign_id"]);
	$_SESSION["coverage_manage"]["campaign_id"]=$campaign_id;
}
if(isset($_SESSION["coverage_manage"]["campaign_id"]))
	$campaign_id=$_SESSION["coverage_manage"]["campaign_id"];
else
	$campaign_id="";
if($campaign_id!=""){
	$extra.=" and campaign_id='".$campaign_id."'";
	$is_search=true;
}
if(isset($_GET["uc_id"])){
	$uc_id=slash($_GET["uc_id"]);
	$_SESSION["coverage_manage"]["uc_id"]=$uc_id;
}
if(isset($_SESSION["coverage_manage"]["uc_id"]))
	$uc_id=$_SESSION["coverage_manage"]["uc_id"];
else
    $uc_id = $ucid["id"]?$ucid["id"]:"";
if($uc_id!=""){
	$extra.=" and uc_id='".$uc_id."'";
	$is_search=true;
}
?>
<div class="page-header">
	<h1 class="title"> Coverage </h1>
  	<ol class="breadcrumb">
    	<li class="active">Manage Coverage</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> 
        	<a href="coverage_manage.php?tab=add" class="btn btn-light editproject">Add New Coverage</a> <a id="topstats" class="btn btn-light" href="#"><i class="fa fa-search"></i></a>
        </div>
  	</div>
</div>
<ul class="topstats clearfix search_filter"<?php if($is_search) echo ' style="display: block"';?>>
	<li class="col-xs-12 col-lg-12 col-sm-12">
        <div>
        	<form class="form-horizontal" action="" method="get">
                <div class="col-sm-2 col-xs-2">
                	<select name="campaign_id" id="campaign_id" class="custom_select select_multiple">
                        <option value=""<?php echo ($campaign_id=="")? " selected":"";?>>Select Campaign</option>
                        <?php
                            $res=doquery("select * from campaign order by start_date desc",$dblink);
                            if(numrows($res)>=0){
                                while($rec=dofetch($res)){
                                ?>
                                <option value="<?php echo $rec["id"]?>" <?php echo($campaign_id==$rec["id"])?"selected":"";?>><?php echo date_convert($rec["start_date"])?></option>
                                <?php
                                }
                            }	
                        ?>
                    </select>
                </div>
                <?php if($_SESSION["logged_in_admin"]["admin_type_id"]==1){?>
                <div class="col-sm-2 col-xs-2">
                	<select name="uc_id" id="uc_id" class="custom_select select_multiple">
                        <option value=""<?php echo ($uc_id=="")? " selected":"";?>>Select UC</option>
                        <?php
                            $res=doquery("select * from uc order by name",$dblink);
                            if(numrows($res)>=0){
                                while($rec=dofetch($res)){
                                ?>
                                <option value="<?php echo $rec["id"]?>" <?php echo($uc_id==$rec["id"])?"selected":"";?>><?php echo unslash($rec["name"])?></option>
                                <?php
                                }
                            }	
                        ?>
                    </select>
                </div>
                <?php }?>
                <div class="col-sm-2 col-xs-8">
                  <input type="text" title="Enter String" value="<?php echo $q;?>" name="q" id="search" class="form-control" >  
                </div>
                <div class="col-sm-2 col-xs-2">
                    <input type="button" class="btn btn-danger btn-l reset_search" value="Reset" alt="Reset Record" title="Reset Record" />
                    <input type="submit" class="btn btn-default btn-l" value="Search" alt="Search Record" title="Search Record" />
                </div>
          	</form>
        </div>
  	</li>
</ul>
<div class="panel-body table-responsive">
	<table class="table table-hover list">
    	<thead>
            <tr>
                <th width="5%" class="text-center">S.no</th>
                <th class="text-center" width="5%"><div class="checkbox checkbox-primary">
                    <input type="checkbox" id="select_all" value="0" title="Select All Records">
                    <label for="select_all"></label></div></th>
                <th width="15%">Campaign</th>
                <?php if($_SESSION["logged_in_admin"]["admin_type_id"]==1){?>
                <th width="15%">UC</th>
                <?php }?>
                <th width="10%" class="text-right">Day Number</th>
                <th width="15%" class="text-right">Total Vaccinated</th>
                <?php if($_SESSION["logged_in_admin"]["admin_type_id"]==1){?>
                <th width="10%">User</th>
                <?php }?>
                <th class="text-center" width="5%">Status</th>
                <th width="5%" class="text-right">Actions</th>
            </tr>
    	</thead>
    	<tbody>
			<?php 
            $sql="select a.*, b.start_date from coverage a inner join campaign b on a.campaign_id = b.id where 1 $extra";
            $rs=show_page($rows, $pageNum, $sql);
            if(numrows($rs)>0){
                $sn=1;
                while($r=dofetch($rs)){             
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $sn;?></td>
                        <td class="text-center"><div class="checkbox margin-t-0 checkbox-primary">
                            <input type="checkbox" name="id[]" id="<?php echo "rec_".$sn?>"  value="<?php echo $r["id"]?>" title="Select Record" />
                            <label for="<?php echo "rec_".$sn?>"></label></div>
                        </td>
                        <td><?php echo date_convert($r["start_date"]); ?></td>
                        <?php if($_SESSION["logged_in_admin"]["admin_type_id"]==1){?>
                        <td><?php echo get_field($r["uc_id"], "uc", "name"); ?></td>
                        <?php }?>
                        <td class="text-right"><?php echo $r["day_number"]==0?"Extended Coverage Day":"Day ".unslash($r["day_number"]); ?></td>
                        <td class="text-right"><?php echo unslash($r["total_vaccinated"]); ?></td>
                        <?php if($_SESSION["logged_in_admin"]["admin_type_id"]==1){?>
                        <td><?php echo get_field($r["user_id"], "admin", "name"); ?></td>
                        <?php }?>
                        <td class="text-center"><a href="coverage_manage.php?id=<?php echo $r['id'];?>&tab=status&s=<?php echo ($r["status"]==0)?1:0;?>">
                            <?php
                            if($r["status"]==0){
                                ?>
                                <img src="images/offstatus.png" alt="Off" title="Set Status On">
                                <?php
                            }
                            else{
                                ?>
                                <img src="images/onstatus.png" alt="On" title="Set Status Off">
                                <?php
                            }
                            ?>
                        </a></td>
                        <td class="text-right">
                            <a href="coverage_manage.php?tab=edit&id=<?php echo $r['id'];?>"><img title="Edit Record" alt="Edit" src="images/edit.png"></a>&nbsp;&nbsp;
                            <a onclick="return confirm('Are you sure you want to delete')" href="coverage_manage.php?id=<?php echo $r['id'];?>&amp;tab=delete"><img title="Delete Record" alt="Delete" src="images/delete.png"></a>
                        </td>
                    </tr>
                    <?php 
                    $sn++;
                }
                ?>
                <tr>
                    <td colspan="5" class="actions">
                        <select name="bulk_action" id="bulk_action" title="Choose Action">
                            <option value="null">Bulk Action</option>
                            <option value="delete">Delete</option>
                        </select>
                        <input type="button" name="apply" value="Apply" id="apply_bulk_action" class="btn btn-light" title="Apply Action"  />
                    </td>
                    <td colspan="4" class="paging" title="Paging" align="right"><?php echo pages_list($rows, "coverage", $sql, $pageNum)?></td>
                </tr>
                <?php	
            }
            else{	
                ?>
                <tr>
                    <td colspan="9"  class="no-record">No Result Found</td>
                </tr>
                <?php
            }
            ?>
    	</tbody>
  	</table>
</div>
