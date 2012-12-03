<div class="content">

	<?
		//echo "<pre>"; print_r( $query) ; echo "</pre>";
	?>

	<? 
		//this is where the form goes
		echo form_open('profile/editSubmit');
	?>
	
	<input type="hidden" name="user_id" value="<?=$user_id?>"/>
	<input type="hidden" name="profile_model[address_id]" value="<?=$query[0]['address_id']?>"/>
	<legend> Profile of  <?=$username?> </legend>
	
	
	<div style="width:500px;" >
		<table class="table table-bordered " stlye="">
			<tr>
				<th><a href="#">First Name</a></th>
				<td><input type="text" name="profile_model[firstname]" value="<?=$query[0]['firstname']?>" />  </td> 
			</tr>
			<tr>
				<th><a href="#">Last Name</a></th>
				<td><input type="text" name="profile_model[lastname]" value="<?=$query[0]['lastname']?>" />  </td> 
			</tr>
			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="This is used for filtering if you only want to play against opponent of same gender">
						Gender
					</a>
				</th>
				<td>
					<span class="pull-left">
						<label ><input type="radio" name="profile_model[gender]" value="m" <?=($query[0]['gender'] =="m" ? "checked" : "")?> />  Male </label>
					</span>
					
					<span class="pull-left" style="margin-left:20px;">
						<label> <input type="radio" name="profile_model[gender]" value="f" <?=($query[0]['gender'] =="f" ? "checked" : "")?> /> Female </label>
					</span>
				</td> 
			</tr>
			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Email
					</a>
				</th>
				<td><input type="text" name="user[firstname]" value="<?=$user_query[0]['email']?>" />  </td> 
			</tr>
			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="This indicates whether or not you want to participate in competitive tournaments">
						Competitiveness
					</a>
				</th>
				<td>
					<span class="pull-left">
						<label ><input type="radio" name="profile_model[competitiveness]" value="casual" <?=($query[0]['competitiveness'] =="casual" ? "checked" : "")?> />  Causal </label>
					</span>
					
					<span class="pull-left" style="margin-left:20px;">
						<label> <input type="radio" name="profile_model[competitiveness]" value="competitive" <?=($query[0]['competitiveness'] =="competitive" ? "checked" : "")?> /> Competitive </label>
					</span>
				</td> 
			</tr>
	
			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="Main hand you use as a tennis player">
						Handedness
					</a>
				</th>
				<td>
					<span class="pull-left">
						<label ><input type="radio" name="profile_model[handedness]" value="left" <?=($query[0]['handedness'] =="left" ? "checked" : "")?> />  Left Handed  </label>
					</span>
					
					<span class="pull-left" style="margin-left:20px;">
						<label> <input type="radio" name="profile_model[handedness]" value="right" <?=($query[0]['handedness'] =="right" ? "checked" : "")?> /> Right Handed </label>
					</span>
				</td> 
			</tr>


			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Address Line 1
					</a>
				</th>
				<td><input type="text" name="address_model[line1]" value="<?=$query[0]['line1']?>" />  </td> 
			</tr>


			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						City
					</a>
				</th>
				<td><input type="text" name="address_model[city]" value="<?=$query[0]['city']?>" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Province
					</a>
				</th>
				<td><input type="text" name="address_model[province]" value="<?=$query[0]['province']?>" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Country
					</a>
				</th>
				<td><input type="text" name="address_model[country]" value="<?=$query[0]['country']?>" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Postal Code
					</a>
				</th>
				<td><input type="text" name="address_model[postal]" value="<?=$query[0]['postal']?>" />  </td> 
			</tr>






			<tr>
				<td colspan="2">
					<input class="btn" type="submit" value="Submit"/>
				</td>
			</tr>
	
	
		</table>
	</div>
</div>

<script type="text/javascript">	
	$('*[rel="tooltip"]').tooltip({ placement : 'right'});
</script>