<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Test App <a href="/users/manage">Dashboard</a> <a href="/users/logout">Log off</a></h3>
	<h3><?= $user['first_name'] ?> <?= $user['last_name'] ?></h3>
	<p>Registered at: <?= $user['created_at'] ?></p>
	<p>User ID: #<?= $user['id'] ?></p>
	<p>Email address: <?= $user['email'] ?></p>
	<p>Description: I am happy to be here!</p>
	
	<?php
	if($user['id'] != $this->session->userdata('user_id'))
	{ ?>
		<h2>Leave a message for <?= $user['first_name'] ?></h2>
		<form action="/messages/create" id="register" method="post">
			<input type="hidden" name="to_id" value=<?= $user['id'] ?>>
			<textarea id="message" name="message" rows="10" cols="80"></textarea><br>
			<input type="submit" value="Post">
		</form>
	<?php } ?>
	
	
	<div class="message">
		<h2>John</h2>
		<p>Hi Michael, it is John</p>

		<div class="comments">
			<div class="comment">
				<h4>Michael</h4>
				<p>Hello, this is Michael</p>
			</div>
			<div class="comment">
				<h4>KB</h4>
				<p>This is KB</p>
			</div>
		</div>
	</div>

	<div class="message">
		<h2>KB</h2>
		<p>Hi this is KB</p>

		<div class="comments">
			<div class="comment">
				<h4>Mark</h4>
				<p>Hey this is Mark</p>
			</div>
		</div>
	</div>
	
</body>
</html>