<?
print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';
?>
<div class="content">
	<legend>Create a new Match</legend>

	<?=form_open('profile/editSubmit');?>

	<table class="table table-bordered " stlye="">
		<tr>
			<th><a href="#">First Name</a></th>
			<td><input type="text" name="profile_model[firstname]" value="" />  </td> 
		</tr>
		<tr>
			<th><a href="#">Last Name</a></th>
			<td><input type="text" name="profile_model[lastname]" value="" />  </td> 
		</tr>
	</table>
</div>