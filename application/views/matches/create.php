<?
//print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';
?>
<div class="content">
	<legend>Create a new Match</legend>

<div class="alert alert-error" id="playerError" style="display:none;">  
  Please Select a Player using the browse button
</div> 
<div class="alert alert-error" id="bookingError" style="display:none;">  
  Please Select a Booking using the browse button
</div> 

	<?=form_open('matches/createMatch');?>
	<input type="hidden" name="matches_model[match_creator]" value="<?=$user_id?>" >
	<table class="table table-bordered " stlye="">
		<tr>
			<th><a href="#">Bookings ID</a></th>
			<td>
				<input type="text" name="matches_model[bookings_id]" id="selectedBookings" value="" />  
				<a style="margin-top: -10px;" class="btn" href="javascript:void(0)" data-toggle="modal" onclick="browseBookings()">Browse</a> <span>or</span>
				<?=anchor('bookings', 'Make a booking')?>
			</td> 
		</tr>
		<tr>
			<th><a href="#">Against</a></th>
			<td>
				<input type="text" name="" id="selectedPlayerName" value="" />  
				<a style="margin-top: -10px;" class="btn" href="javascript:void(0)" data-toggle="modal" onclick="browsePlayers()">Browse</a>
			</td> 
		</tr>
		<tr>
			<th><a href="#">Description</a></th>
			<td><input type="text" name="matches_model[match_desc]" value="" />  </td> 
		</tr>

		<tr>
		<td colspan="2">
			<input class="btn" type="submit" value="Submit" onclick="return validate()"/>
		</td>
	</tr>
	</table>

</div>


<script type="text/javascript">	
	function browsePlayers(){
		$("#browsePlayerModal").modal('toggle');
	}
	function playerSelected(){
		var selectedRadio =  $("input.playerSelection:checked"); 
		$("#selectedPlayerName").val( selectedRadio.attr('playername') );
		$("#browsePlayerModal").modal('toggle');
	}


	function browseBookings(){
		$("#browseBookingsModal").modal('toggle');
	}
	function bookingsSelected(){
		var selectedRadio =  $("input.bookingsSelection:checked"); 
		$("#selectedBookings").val( selectedRadio.val() );
		$("#browseBookingsModal").modal('toggle');
	}


	function validate(){
		var valid = true;
		// Booking validation
		if ( $("#selectedBookings").val() > 0 ){
			$("#bookingError").hide();
		}
		else{
			$("#bookingError").show();	
			valid = false;
		}

		// Player validation
		if ( $("input.playerSelection:checked").val() > 0 )	{
			$("#playerError").hide();	
		}
		else{
			$("#playerError").show();	
			valid = false;
		}
		return valid;

	}
</script>



<!-- 						THIS IS THE POPUP FOR SELECTING A PLAYER 					 -->
<div class="modal hide fade" id="browsePlayerModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Select a Player</h3>
  </div>
  <div class="modal-body">
    <ul class="nav nav-pills nav-stacked">
    	<? foreach ($profile as $key => $value) {
    		?>
    		<li>

    			<label>
    				<a>
    					<input type="radio" class="playerSelection" name="playerSelection" playername="<?=ucfirst($value['firstname']) . " " . ucfirst($value['lastname']) ?>" value="<?=$value['user_id']?>" style="margin-bottom: 7px;">
    					<span><?=ucfirst($value['firstname']) . " " . ucfirst($value['lastname']) ?></span>	
	    			</a>
	    		</label>
    		</li>

    		<?
    	}
    	?>
    </ul>

  </div>
  <div class="modal-footer">
    <a href="javascript:void(0)" class="btn">Close</a>
    <a href="javascript:void(0)" onclick="playerSelected();" class="btn btn-primary">Save changes</a>
  </div>
</div>



<!-- 						THIS IS THE POPUP FOR SELECTING A BOOKING 					 -->
<div class="modal hide fade" id="browseBookingsModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Select a Booking</h3>
  </div>
  <div class="modal-body">
    <ul class="nav nav-pills nav-stacked">
    	<? foreach ($bookings as $key => $value) {
    		?>
    		<li>

    			<label>
    				<a>
    					<input type="radio" class="bookingsSelection"  value="<?=$value['bookings_id']?>" style="margin-bottom: 7px;">
    					<span>
    						<b> <?=$value['court_name'] . "</b> - " . date( 'M d, Y g:i a', strtotime($value['booked_for']) )?>
    					</span>	
	    			</a>
	    		</label>
    		</li>

    		<?
    	}
    	?>
    </ul>

  </div>
  <div class="modal-footer">
    <a href="javascript:void(0)" class="btn">Close</a>
    <a href="javascript:void(0)" onclick="bookingsSelected();" class="btn btn-primary">Save changes</a>
  </div>
</div>


</form>