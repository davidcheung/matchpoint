
<div class="content">
	<!-- <p>This will load profile of  -  <?=$username?> </p> -->
	
	<legend> Profile of  <?=$username?>  
		
	</legend>
	
	
	<div style="width:500px;">
		
		<?=anchor('profile/edit','Setup',array('class'=>'btn pull-right','style'=>'margin-top:-60px;'))?>
		
		<table class="table table-bordered table-hover" stlye="">
			<tr>
				<th>First Name</th>
				<td><?=$query[0]['firstname']?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?=$query[0]['lastname']?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?=($query[0]['gender'] =="f" ? "Female" : "Male")?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?=$user_query[0]['email']?></td>
			</tr>
			<tr>
				<th>Competitiveness</th>
				<td><?=ucfirst($query[0]['competitiveness'])?></td>
			</tr>
			<tr>
				<th>Handedness</th>
				<td><?=($query[0]['handedness']=="left"? "Left handed" : "Right handed")?></td>
			</tr>
			

			
<? if ($query[0]['longitude'] !=0  &&  $query[0]['latitude']!= 0 )
{ ?>
	<tr>
				<td colspan="2" style="text-align:Center;">
<img width="250" src="http://maps.googleapis.com/maps/api/staticmap?center=<?=$query[0]['longitude']?>,<?=$query[0]['latitude']?>&zoom=15&size=250x250&sensor=false&markers=color:blue%7Clabel:S|<?=$query[0]['longitude']?>,<?=$query[0]['latitude']?>"/>
</td>
			</tr>
<? } ?>

				
		</table>
	</div>
</div>