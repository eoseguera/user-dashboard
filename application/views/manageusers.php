<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Test App <a href="/users/show/<?= $current_user['id'] ?>">Profile</a> <a href="/users/logout">Log off</a></h3>
	<h1>Manage Users</h1>
	<?php
	if($current_user['user_level'] == 'admin')
	{ ?>
		<form action="/users/new_user" method="post">
			<input type="submit" value="Add new">
		</form>
	<?php } ?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name^</th>
				<th>email</th>
				<th>created_at</th>
				<th>user_level</th>
				<?php
				if($current_user['user_level'] == 'admin')
				{ ?>
					<th>actions</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($users as $user)
			{ ?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><a href="/users/show/<?= $user['id'] ?>"><?= $user['first_name'] ?> <?= $user['last_name'] ?></a></td>
					<td><?= $user['email'] ?></td>
					<td><?= $user['created_at'] ?></td>
					<td><?= $user['user_level'] ?></td>
					<?php
					if($current_user['user_level'] == 'admin')
					{ ?>
						<td><a href="/users/edit/<?= $user['id'] ?>">Edit</a></td>
						<td><a href="/users/destroy/<?= $user['id'] ?>">Remove</a></td>
					<?php } ?>
				</tr>
	  <?php } ?>
		</tbody>
	</table>

</body>
</html>