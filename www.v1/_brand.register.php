<?php
	include_once('core.config.php');
?>
<html>
	<head>
		<title>Brandspool :: Register</title>
	</head>
	<body>
		<?php UX_ProceedErrors(); ?>

		<form role="form" method="post" action="core.proceed.php?form=brand.create">
			<fieldset>
				<legend>Information</legend>
				Brand Name: <input type="text" <?php f('name'); ?> /><br/>
			</fieldset>
			<br/>
			<fieldset>
				<legend>Account</legend>
				E-mail: <input type="text" <?php f('email'); ?> /><br/>
				password 1: <input type="password" <?php f('pass1'); ?> /><br/>
				password 2: <input type="password" <?php f('pass2'); ?> />
			</fieldset>
			<input type="submit" class="btn btn-primary" value="register"/>
		</form>

		<a href="index.php">back</a>
	</body>
</html>
<?php
	shutdown();
?>