<?php
if(!defined("APP_START")) die("No Direct Access");
$q="";
$extra='';
$is_search=false;
if(isset($_GET["q"])){
	$q=slash($_GET["q"]);
	$_SESSION["uc_manage"]["q"]=$q;
}
if(isset($_SESSION["uc_manage"]["q"]))
	$q=$_SESSION["uc_manage"]["q"];
else
	$q="";
if(!empty($q)){
	$extra.=" and name like '%".$q."%'";
	$is_search=true;
}
if(isset($_GET["tehseel_id"])){
	$tehseel_id=slash($_GET["tehseel_id"]);
	$_SESSION["uc_manage"]["tehseel_id"]=$tehseel_id;
}
if(isset($_SESSION["uc_manage"]["tehseel_id"]))
	$tehseel_id=$_SESSION["uc_manage"]["tehseel_id"];
else
	$tehseel_id="";
if($tehseel_id!=""){
	$extra.=" and tehseel_id='".$tehseel_id."'";
	$is_search=true;
}
if(isset($_GET["admin_id"])){
	$admin_id=slash($_GET["admin_id"]);
	$_SESSION["uc_manage"]["admin_id"]=$admin_id;
}
if(isset($_SESSION["uc_manage"]["admin_id"]))
	$admin_id=$_SESSION["uc_manage"]["admin_id"];
else
	$admin_id="";
if($admin_id!=""){
	$extra.=" and admin_id='".$admin_id."'";
	$is_search=true;
}
?>
<div class="page-header">
	<h1 class="title"> UC</h1>
  	<ol class="breadcrumb">
    	<li class="active">Manage UC</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> 
        	<a href="uc_manage.php?tab=add" class="btn btn-light editproject">Add New UC</a> <a id="topstats" class="btn btn-light" href="#"><i class="fa fa-search"></i></a>
        </div>
  	</div>
</div>
<ul class="topstats clearfix search_filter"<?php if($is_search) echo ' style="display: block"';?>>
	<li class="col-xs-12 col-lg-12 col-sm-12">
        <div>
        	<form class="form-horizontal" action="" method="get">
                <div class="col-sm-3 col-xs-2">
                	<select name="tehseel_id" id="tehseel_id" class="custom_select select_multiple">
                        <option value=""<?php echo ($tehseel_id=="")? " selected":"";?>>Select Tehseel</option>
                        <?php
                            $res=doquery("select * from tehseel order by name ",$dblink);
                            if(numrows($res)>=0){
                                while($rec=dofetch($res)){
                                ?>
                                <option value="<?php echo $rec["id"]?>"<?php echo($tehseel_id==$rec["id"])?"selected":"";?>><?php echo unslash($rec["name"])?></option>
                            <?php
                                }
                            }	
                        ?>
                    </select>
                </div>
                <div class="col-sm-3 col-xs-2">
                	<select name="admin_id" id="admin_id" class="custom_select select_multiple">
                        <option value=""<?php echo ($admin_id=="")? " selected":"";?>>Select Admin</option>
                        <?php
                            $res=doquery("select * from admin order by name ",$dblink);
                            if(numrows($res)>=0){
                                while($rec=dofetch($res)){
                                ?>
                                <option value="<?php echo $rec["id"]?>" <?php echo($admin_id==$rec["id"])?"selected":"";?>><?php echo unslash($rec["name"])?></option>
                            <?php
                                }
                            }	
                        ?>
                    </select>
                </div>
                <div class="col-sm-3 col-xs-2">
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
                <th width="20%">Tehseel</th>
                <th width="20%">Name</th>
                <th width="20%">Admin</th>
                <th width="20%">Target</th>
                <th width="10%" class="text-center">Status</th>
                <th width="5%">Actions</th>
            </tr>
    	</thead>
    	<tbody>
			<?php 
            $sql="select * from uc where 1 $extra";
            $rs=show_page($rows, $pageNum, $sql);
            if(numrows($rs)>0){
                $sn=1;
				$total = 0;
                while($r=dofetch($rs)){             
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $sn;?></td>
                        <td class="text-center"><div class="checkbox margin-t-0 checkbox-primary">
                            <input type="checkbox" name="id[]" id="<?php echo "rec_".$sn?>"  value="<?php echo $r["id"]?>" title="Select Record" />
                            <label for="<?php echo "rec_".$sn?>"></label></div>
                        </td>
                        <td><?php echo get_field($r["tehseel_id"], "tehseel", "name"); ?></td>
                        <td><?php echo unslash($r["name"]); ?></td>
                        <td><?php echo get_field($r["admin_id"], "admin", "name"); ?></td>
                        <td><?php echo unslash($r["target"]); ?></td>
                        <td class="text-center"><a href="uc_manage.php?id=<?php echo $r['id'];?>&tab=status&s=<?php echo ($r["status"]==0)?1:0;?>">
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
                        <td>
                            <a href="uc_manage.php?tab=edit&id=<?php echo $r['id'];?>"><img title="Edit Record" alt="Edit" src="images/edit.png"></a>&nbsp;&nbsp;
                            <a onclick="return confirm('Are you sure you want to delete')" href="uc_manage.php?id=<?php echo $r['id'];?>&amp;tab=delete"><img title="Delete Record" alt="Delete" src="images/delete.png"></a>
                        </td>
                    </tr>
                    <?php 
                    $sn++;
                }
                ?>
                <tr>
                    <td colspan="4" class="actions">
                        <select name="bulk_action" id="bulk_action" title="Choose Action">
                            <option value="null">Bulk Action</option>
                            <option value="delete">Delete</option>
                            <option value="statuson">Set Status On</option>
                            <option value="statusof">Set Status Off</option>
                        </select>
                        <input type="button" name="apply" value="Apply" id="apply_bulk_action" class="btn btn-light" title="Apply Action"  />
                    </td>
                    <td colspan="3" class="paging" title="Paging" align="right"><?php echo pages_list($rows, "uc", $sql, $pageNum)?></td>
                </tr>
                <?php	
            }
            else{	
                ?>
                <tr>
                    <td colspan="8"  class="no-record">No Result Found</td>
                </tr>
                <?php
            }
            ?>
    	</tbody>
  	</table>
</div>
