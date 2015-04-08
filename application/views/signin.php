<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Test App</h3>
	<h1>Signin</h1>
	<form action="/users/login" id="login" method="post">
		<label for="email">Email:</label>
		<input id="email" name="email" type="email"><br>
		<label for="password">Password:</label>
		<input id="password" name="password" type = "password"><br>
		<input type="submit" value="Log In">
	</form>
	<a href="/users/new_user">Don't have an account? Register.</a>
</body>
</html>