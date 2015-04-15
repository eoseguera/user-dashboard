<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Message');
	}

	public function create()
	{
		$post = $this->input->post();
		$this->Message->create($post);
		redirect('/users/show/' . $post['to_id']);
	}
}