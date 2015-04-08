<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Test App</h3>
	<h1>Register</h1>
	<form action="/users/create" id="register" method="post">
		<label>Email Address:</label>
		<input id="email" name="email" type = "email"><br>
		<label>First Name:</label>
		<input id="first_name" name="first_name" type = "text"><br>
		<label>Last Name:</label>
		<input id="last_name" name="last_name" type = "text"><br>
		<label>Password:</label>
		<input id="password" name="password" type = "password"><br>
		<label>Confirm Password:</label>
		<input id="confirm_password" name="confirm_password" type = "password"><br>
		<input type="submit" value="Register">
	</form>
	<a href="/users/signin">Already have an account? Login</a>
</body>
</html>