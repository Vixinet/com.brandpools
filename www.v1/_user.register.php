<?php
	include_once('core.config.php');
?>
<html>
	<head>
		<title>Brandspool :: Register</title>
	</head>
	<body>
		<?php UX_ProceedErrors(); ?>

		<form role="form" method="post" action="core.proceed.php?form=user.create">
			<fieldset>
				<legend>Information</legend>
				Firstname: <input type="text" <?php f('firstname'); ?> /><br/>
				Lastname:  <input type="text" <?php f('lastname'); ?> /><br/>
				Address 1: <input type="text" <?php f('address1'); ?> /><br/>
				Address 2: <input type="text" <?php f('address2'); ?> /><br/>
				Zip code:  <input type="text" <?php f('zipcode'); ?>  /><br/>
				Town:      <input type="text" <?php f('town'); ?> /><br/>
				Country:
				<select name="country">
					<option <?php s('country', 'BE'); ?> >Belgium</option>
					<option <?php s('country', 'FI'); ?> >Finland</option>
					<option <?php s('country', 'FR'); ?> >France</option>
					<option <?php s('country', 'DE'); ?> >Germany</option>
				</select>
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