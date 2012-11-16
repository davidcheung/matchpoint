<?

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<link rel="stylesheet" href="<?=base_url('asset/bootstrap/css/bootstrap.min.css')?>"> <!--bootstrap-responsive.min.css-->
	<script type="text/javascript" src="<?=base_url('asset/bootstrap/js/bootstrap.min.js')?>"></script>
</head>
<body>
	
<?

	$attributes = array('class' => 'email', 'id' => 'myform');

	echo form_open('email/send', $attributes);



	$username = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              //'style'       => 'width:50%',
              'placeholder'	=> 'Username'
            );

	echo form_input($username);

	$email = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'placeholder'	=> 'Email Address'
            );

	echo form_input($email);



	?>
	<input type="submit" value="submit">

	<?

	echo form_close();
?>




</body>
</html>