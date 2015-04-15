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
			<input type="hidden" name="user_id" value=<?= $this->session->userdata('user_id') ?>>
			<textarea id="message" name="message" rows="10" cols="80"></textarea><br>
			<input type="submit" value="Post">
		</form>
	<?php } ?>
	
	<?php
	
	foreach($messages as $message)
	{ ?>
		<div class="message">
			<h2><?= $message['person_leaving_message'] ?></h2>
			<p><?= $message['content'] ?></p>
			
			<?php
			if(isset($message['comments']))
			{ 
				foreach($message['comments'] as $comment)
				{ ?>
					<div class="comment">
						<h4><?= $comment['person_leaving_comment'] ?></h4>
						<p><?= $comment['content'] ?></p>
					</div>
				<?php }
			} ?>
		</div>
		
	<?php }	?>

	
	
</body>
</html>