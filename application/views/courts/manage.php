<?
//print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';
?>
<div class="content">
	<table class="table">
		<thead>
			<tr>
				<th>Court Name</th>
				<th>Surface Type</th>
				<th>Venue Type</th>
				<th>Address</th>
				<th>Number of Courts</th>
			</tr>
		</thead>
		<tbody>
			<?
			foreach ($courts as $key => $value) {
				?>
				<tr>
					<td><?=$value['court_name']?></td>
					<td><?=$value['surface_type']?></td>
					<td><?=ucfirst($value['venue_type'])?></td>
					<td><?
						echo $value['line1'] . ", ".
						$value['city'] . ", ".
						$value['province'] . ", ".
						$value['country'] . ", ".
						$value['postal'] 
					?></td>
					<td><?=$value['number_of_courts']?></td>
				</tr>
				<?
			}
			?>
		</tbody>
	</table>
</div>