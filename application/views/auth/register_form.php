<!DOCTYPE HTML> 

   <html>
   <head>
   		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   		 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/bootstrap.min.js"></script>
   		 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/css/bootstrap.min.css">
   		 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.1/css/bootstrap-responsive.min.css">
          <link rel="stylesheet" href="<?=base_url('asset/css/style.css')?>">
   		 <style type="text/css">
   		 body{
   		 
   		 }
   		 </style>
   	</head>

      <body>
         <div style="text-align:center;" align="center">
<div style="margin:0 auto;width:350px;text-align:left;margin-top:50px;">

   	<legend>Register</legend>
   	 <?php
   	if ($use_username) {
   		$username = array(
   			'name'	=> 'username',
   			'id'	=> 'username',
   			'value' => set_value('username'),
   			'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
   			'size'	=> 30,
   		);
   	}
   	$email = array(
   		'name'	=> 'email',
   		'id'	=> 'email',
   		'value'	=> set_value('email'),
   		'maxlength'	=> 80,
   		'size'	=> 30,
   	);
   	$password = array(
   		'name'	=> 'password',
   		'id'	=> 'password',
   		'value' => set_value('password'),
   		'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
   		'size'	=> 30,
   	);
   	$confirm_password = array(
   		'name'	=> 'confirm_password',
   		'id'	=> 'confirm_password',
   		'value' => set_value('confirm_password'),
   		'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
   		'size'	=> 30,
   	);
   	$captcha = array(
   		'name'	=> 'captcha',
   		'id'	=> 'captcha',
   		'maxlength'	=> 8,
   	);


   	?>
   	<?php echo form_open($this->uri->uri_string()); ?>










       <?

       if (  form_error($username['name']) != "" || ( isset($errors[$username['name']])?$errors[$username['name']]:'' ) != "" ){
         ?>
          <div class="alert alert-error"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
         <?
       }

        if ( form_error($password['name']) != "" ){
      ?> <div class="alert alert-error"><?php echo form_error($password['name']); ?></div><?   
      }


      if ( form_error($email['name']) != "" || (isset($errors[$email['name']])?$errors[$email['name']]:'') != "" ){

         ?>
         <div class="alert alert-error"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
         <?
      }


      if (  form_error($confirm_password['name']) != "" ){

         ?>
         <div class="alert alert-error"><?php echo form_error($confirm_password['name']); ?></div>
         <?
      }
      ?>



   	<table class="table table-bordered">
   		<?php if ($use_username) { ?>
   		<tr>
   			<td><?php echo form_label('Username', $username['id']); ?></td>
   			<td><?php echo form_input($username); ?></td>
         </tr>
        
   		<?php } ?>
   		<tr>
   			<td><?php echo form_label('Email Address', $email['id']); ?></td>
   			<td><?php echo form_input($email); ?></td>
         </tr>
         
         

   		<tr>
   			<td><?php echo form_label('Password', $password['id']); ?></td>
   			<td><?php echo form_password($password); ?></td>
         </tr>
         
        
         

   		<tr>
   			<td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
   			<td><?php echo form_password($confirm_password); ?></td>
         </tr>
         
         
   		

   	
   		<?php if ($captcha_registration) {
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
   	</table>
   	
      <input type="submit" name="register" value="Register" class="btn">

   	<?php echo form_close(); ?>

</div>
</div>
</body>
      </html>

