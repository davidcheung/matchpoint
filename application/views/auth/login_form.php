<link rel="icon" href="<?=base_url('asset/images/tennis_ball.ico')?>" type="image/gif">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url('asset/bootstrap/css/bootstrap.min.css')?>"> <!--bootstrap-responsive.min.css-->
<script type="text/javascript" src="<?=base_url('asset/bootstrap/js/bootstrap.min.js')?>"></script>

<link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
<div style="text-align:center;" align="center">
<div style="margin:0 auto;width:350px;text-align:left;margin-top:50px;">
<?php

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=>'input-block-level'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class'=>'input-block-level'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<h2 class="form-signin-heading">MatchPoint</h2>
<?php echo form_open($this->uri->uri_string(), array( 'class'=> 'form-signin')); ?>
<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
	</tr>
	<tr>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
	</tr>
	<tr>
		<td><?php echo form_password($password); ?></td>
		<td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
	</tr>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>

	<tr>
		<td colspan="3">
			
				
			<div class="btn-group">
			  <div class="btn">
			  	<?php echo  form_checkbox($remember) ?>
			  	<span onclick="$('#remember').trigger('click');"> Remember Me</span>
			  </div>
			  <div class="btn">
			  	<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
			  </div>
			  <div class="btn">
			  	<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
			  </div>
			</div>
			
			
			
		</td>
	</tr>
</table>
<br/>
<input type="submit" name="submit" value="Sign In" class="btn btn-inverse">
<?php echo form_close(); ?>

</div>

</div>