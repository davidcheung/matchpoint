<div class="content">
	<? 
		//this is where the form goes
		echo form_open('courts/createSubmit');
	?>
	<legend>New Court</legend>

	<input type="hidden" name="court_model[court_status]" value="1"/>
	<div style="width:500px;" >
		<table class="table table-bordered " stlye="">
			<tr>
				<th><a href="#">Court Name</a></th>
				<td><input type="text" name="court_model[court_name]" value="" />  </td> 
			</tr>
			<tr>
				<th><a href="#">Venue Type</a></th>
				<td>
					
					<span class="pull-left">
						<label ><input style="margin-bottom:9px;" type="radio" name="court_model[venue_type]" value="public"/>  Public </label>
					</span>
					
					<span class="pull-left" style="margin-left:20px;">
						<label ><input style="margin-bottom:9px;" type="radio" name="court_model[venue_type]" value="private"/>  Private </label>
					</span>
				</td> 
			</tr>


			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Address Line 1
					</a>
				</th>
				<td><input type="text" name="address_model[line1]" value="" />  </td> 
			</tr>


			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						City
					</a>
				</th>
				<td><input type="text" name="address_model[city]" value="Toronto" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Province
					</a>
				</th>
				<td><input type="text" name="address_model[province]" value="Ontario" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Country
					</a>
				</th>
				<td><input type="text" name="address_model[country]" value="Canada" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Postal Code
					</a>
				</th>
				<td><input type="text" name="address_model[postal]" value="" />  </td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Number of Courts
					</a>
				</th>
				<td>
					<select name="court_model[number_of_courts]">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
					</select>
				</td> 
			</tr>

			<tr>
				<th>
					<a href="#" rel="tooltip" data-original-title="">
						Surface Type
					</a>
				</th>
				<td>
					<select name="court_model[surface_type]">
						<?
						foreach ($surfaceType as $key => $value) {
							?>
							<option value="<?=$value['surface_type']?>"><?=$value['surface_type']?></option>
							<?
						}
						?>
					</select>
				</td> 
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