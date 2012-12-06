 <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

 <script type="text/javascript" src="<?=base_url('asset/jquery-time-slider-master/jquery.time.slider.js')?>"></script>


  <link rel="stylesheet" href="<?=base_url('asset/jquery-time-slider-master/jquery.time.slider.css')?>" type="text/css" media="all" />

<div class="content" style="width:600px;">
<?

//print '<pre>' . htmlspecialchars(print_r( $_ci_data['_ci_vars'], true)) . '</pre>';

if ( $haserror != "") {
	?>
	<div class="alert alert-error">  
	  <strong>Error!</strong> &nbsp;<?=$haserror?>
	</div>  
	<?
}
echo form_open('bookings/submitBookings',array('onsubmit' =>"return validate_courtbooking()"));

?>
<legend>Book a court</legend>
<input type="hidden" name="bookings_model[booked_by]" value="<?=$user_id?>"/>

<table class="table">
	<tr>
		<th>Name</th>
		<td>
			<input type="text" name="bookings_model[bookings_desc]" id="" />
		</td>
	</tr>
	<tr>
		<th>Court</th>
		<td>
			<select name="bookings_model[court_id]" id="" >
				<?
				foreach ($courts as $key => $value) {
					?>
					<option value="<?=$value['court_id']?>" <?=($court_id == $value['court_id'] ? "selected" :"") ?>><?=$value['court_name']?></option>
					<?
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<th>Date</th>
		<td>
			<input type="text" class="datepicker" name="bookings_model[date]" placeholder="Pick a Date"/>
			
				
			<div class="alert alert-error" id="date-error">  
			  <strong>Error!</strong> &nbsp; When would you like to book this court?
			</div>  
		</td>
	</tr>
	<tr>
		<th>Time</th>
		<td><input type="text" class="timeslider" name="bookings_model[time]" placeholder="Pick a Time"/></td>
	</tr>
	<tr>
		<th>Duration</th>
		<td>
			<select name="bookings_model[book_duration]">
				<option value="30">30mins</option>
				<option value="60">1 hour</option>
				<option value="90">1.5 hours</option>
				<option value="120">2 hours</option>
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

<script type="text/javascript">
	
$(function(){

	$(".datepicker").datepicker({
		changeMonth: true,
        changeYear: true
	});

	$(".timeslider").timeslider();

});
function validate_courtbooking(){
	if ( $.trim( $(".datepicker").val() ) == "" )
	{
		$("#date-error").show();
		return false;
	}
	else{
		$("#date-error").hide();
	}
}


</script>
<style type="text/css">
	.timeslider-container{
		min-height: 22px;
	}
	#date-error{
		display:none;
	}
</style>