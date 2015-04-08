<?php

class User extends CI_Model{

	public function all()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function create($post)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)";
		$values = array($post['first_name'], $post['last_name'], $post['email'], $post['password']);

		return $this->db->query($query, $values);
	}

	function find_by_email($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$values = array($email);

		return $this->db->query($query, $values)->row_array();
	}

	function find_by_id($id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$values = array($id);

		return $this->db->query($query, $values)->row_array();
	}
}