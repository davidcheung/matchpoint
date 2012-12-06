<?
//print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';

?>

<div class="content" style="">
	
	<legend>
		View Bookings of 
		<b><?=ucwords($bookings[0]['firstname'] . " " .$bookings[0]['lastname'])?></b>
	</legend>

	<table class="table table-bordered table-striped" style="width:75%;">
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Duration</th>
			<th>Location</th>
			
			
		</tr>
	<?
		foreach ($bookings as $key => $value) {
			?>
			<tr>
				<td><?=date( 'M d, Y',strtotime($value['booked_for'])) ?></td>
				<td><?=date( 'g:i a',strtotime($value['booked_for'])) ?></td>
				<td><?=$value['book_duration']?></td>
				<td><?=$value['court_name']?></td>
				
			</tr>
			<?
		}
	?>
	</table>
</div>