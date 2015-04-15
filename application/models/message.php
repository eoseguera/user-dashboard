<?php

class Message extends CI_Model{

	function create($post)
	{
		$query = "INSERT INTO messages (user_id, to_id, content) VALUES (?,?,?)";
		$values = array($post['user_id'], $post['to_id'], $post['message']);

		return $this->db->query($query, $values);
	}

	function find_all_by_id($id)
	{
		$query = "SELECT users.first_name AS person_leaving_message, messages.content, comments.content AS comment, users2.first_name AS person_leaving_comment, messages.id AS message_id
			FROM messages
			LEFT JOIN users
			ON users.id=messages.user_id
			LEFT JOIN comments
			ON messages.id=comments.message_id
			LEFT JOIN users AS users2
			ON comments.user_id=users2.id
			WHERE messages.to_id=?";
		$values = array($id);

		return $this->db->query($query, $values)->result_array();
	}
}