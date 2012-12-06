<?
//print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';

?>
<script type="text/javascript" src="<?=base_url('asset/tablesorter/tablesorter_filterable.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/tablesorter/tablesorter_filter_withcallback.js')?>"></script>
<script type="text/javascript" src="<?=base_url('asset/tablesorter/jquery.tablesorter.pager_withcallback.js')?>"></script>
<link rel="stylesheet" href="<?=base_url('asset/tablesorter/style.css')?>">
<div class="content">
		

	<legend>Browse Players</legend>
	<div class="searchbar" style="text-align:right; margin-right:20px;">
		Search:
		<input style="margin-bottom: 1px;" name="filter" id="filter-box" value="" maxlength="30" size="30" type="text" >
		<input id="filter-clear-button" type="submit" value="Clear" class="btn"/>
	</div>
	<hr/>
	<table class="table tablesorter" id="sort">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Competitive</th>
				<th>Handedness</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?
			foreach ($query as $key => $value) {
				?>
				<tr>
					<td><?=ucfirst($value['firstname'])?></td>
					<td><?=ucfirst($value['lastname'])?></td>
					<td><?=$value['email']?></td>
					<td><?=ucfirst($value['competitiveness'])?></td>
					<td><?=ucfirst($value['handedness'])?></td>
					<td>
						<div class="btn-group">
						  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						    Action
						    <span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu">
						    <!-- dropdown menu links -->

						    	<li>
						    		<a href="mailto:<?=$value['email']?>">Email</a>
						    	</li>
						    	
						    	<li>
						    		<a href="">Message Player</a>
						    	</li>
						    	<li class="divider"></li>
						    	<li>
						    		<a href="#">Add as Friend</a>
						    	</li>
						    	<li>
						    		<a href="#">Report Player</a>
						    	</li>
						    	<li>
						    		<a href="#">Review Player</a>
						    	</li>
						  </ul>
						</div>
					</td>
				</tr>
				<?
			}
			?>
		</tbody>
	</table>


</div>

<script type="text/javascript">
	$(function(){
		$("#sort").tablesorter({
			headers: { 
	            5: { sorter: false } 
	        }
   		})
   		.tablesorterFilter({
   			filterContainer: $("#filter-box"),
			filterClearContainer: $("#filter-clear-button"),
			filterColumns: [0,1,2],
			filterCaseSensitive: false			
		});
	})
</script>
