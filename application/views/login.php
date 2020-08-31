<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?= form_open() ?>
<ul>
	<li><input type="text" name="email" placeholder="email"></li>
	<li><input type="password" name="pass" placeholder="password"></li>
	<li><button type="submit">Login</button></li>
</ul>
<?= form_close()  ?>
</body>
</html>