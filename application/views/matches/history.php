<?
//print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';
?>
<div class="content">
	<legend>Match History</legend>	


	<table class="table tablesorter" id="sort">
		<thead>
			<tr>
				<th>Match title</th>
				<th>Match Date</th>
				<th>Match Court</th>
				<th>Venue Type</th>
				<th>Booking #</th>
				<th>Players</th>
				
			</tr>
		</thead>
		<tbody>
			<?
				foreach ($matches as $key => $value) {
					?>
					<tr>
						<td><?=$value['match_desc']?></td>
						<td><?=date('M d, Y g:i a',strtotime($value['booked_for']))?></td>
						<td><?=$value['court_name']?></td>
						
						<td><?=ucfirst($value['venue_type'])?></td>
						<td><?=$value['bookings_id']?></td>
						<td>
							<? foreach ($value['players'] as $playerkey => $playervalue) {
								?>
									<div><i class="icon-user"></i>
										<?=ucwords(  $playervalue['firstname']  . " " .  $playervalue['lastname'] )?></div>
								<?
							}?>
						</td>
					</tr>
					<?
				}
			?>
		</tbody>
	</table>

</div>