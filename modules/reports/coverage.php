<?php
if(!defined("APP_START")) die("No Direct Access");
?>
<div class="page-header">
	<h1 class="title">Reports</h1>
  	<ol class="breadcrumb">
    	<li class="active">Coverage Report</li>
  	</ol>
  	<div class="right">
    	<div class="btn-group" role="group" aria-label="..."> 
        	<a id="topstats" class="btn btn-light" href="#"><i class="fa fa-search"></i></a> 
            <!-- <a class="btn print-btn" href="report_manage.php?tab=general_journal_print"><i class="fa fa-print" aria-hidden="true"></i></a> -->
        </div>
  	</div>
</div>
<ul class="topstats clearfix search_filter"<?php if($is_search) echo ' style="display: block"';?>>
	<li class="col-xs-12 col-lg-12 col-sm-12">
        <div>
        	<form class="form-horizontal" action="" method="get">
            	<input type="hidden" name="tab" value="coverage" />
                <span class="col-sm-1">Campaign</span>
                <div class="col-sm-2">
                    <select name="campaign_id">
                    	<?php
                        $rs=doquery( "select * from campaign order by start_date desc", $dblink );
						if( numrows( $rs ) > 0 ) {
							while( $r = dofetch( $rs ) ) {
								?>
								<option value="<?php echo $r[ "id" ]?>"<?php echo $r[ "id" ]==$campaign_id?' selected':''?>><?php echo date_convert( $r[ "start_date" ] )?></option>
								<?php
							}
						}
						?>
                    </select>
                </div>           
                <div class="col-sm-3 text-left">
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
                <th>
                	<a href="" class="sorting">
                    	Campaign
                        
                  	</a>
                </th>
                <th>Day 1</th>
                <th>Day 2</th>
                <th>Day 3</th>
                <th>Day 4</th>
                <th>Day 5</th>
                <th class="text-right">Target</th>
                <th class="text-right">Total Vaccinated</th>
                <th class="text-right">Remaing</th>
            </tr>
    	</thead>
    	<tbody>
            <tr>
                <td class="text-center"></td>
                <td></td>
                <td>Day 1</td>
                <td>Day 2</td>
                <td>Day 3</td>
                <td>Day 4</td>
                <td>Day 5</td>
                <td class="text-right"></td>
                <td class="text-right"></td>
                <td class="text-right"></td>
            </tr>
    	</tbody>
  	</table>
</div>
