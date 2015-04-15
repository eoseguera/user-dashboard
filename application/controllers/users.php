<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Message');
	}

	public function index()
	{
		$this->load->view('homepage');
	}

	public function manage()
	{
		$data = array();
		$data['users'] = $this->User->all();
		$data['current_user'] = $this->User->find_by_id($this->session->userdata('user_id'));
		$this->load->view('manageusers',$data);
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function login()
	{
		$post = $this->input->post();

		$email = $post['email'];
        $password = $post['password'];
        $user = $this->User->find_by_email($email);

        if(isset($user) && $user['password'] == $password)
        {
        	$this->session->set_userdata('user_id', $user['id']);
        	$data = array();
        	$data['user'] = $user;
        	redirect('/users/show/' . $user['id']);
        }
        else
        {
        	redirect('/signin');
        }
	}

	public function new_user()
	{
		$this->load->view('register');
	}

	public function show($id)
	{
		$data = array();
		$data['user'] = $this->User->find_by_id($id);
		$data['messages'] = $this->Message->find_all_by_id($id);
		$current_id = 0;
		$messages = array(1);
		foreach($data['messages'] as $key => $message)
		{
			if($message['message_id'] != $current_id)
			{
				$current_id = $message['message_id'];
				$messages[] = array(
					"person_leaving_message" => $message['person_leaving_message'],
					"content" => $message['content']
					);
			}
			if(!isset($messages[$key]['comments']))
			{
				$messages[$message['message_id']]['comments'] = array();
			}
			$messages[$message['message_id']]['comments'][] = array(
				"content" => $message['comment'],
				"person_leaving_comment" => $message['person_leaving_comment']);
		}
		$data['messages'] = $messages;
		$this->load->view("profile", $data);
	}

	public function create()
	{
		$post = $this->input->post();
		$this->User->create($post);
		$id = $this->db->insert_id();
		$this->show($id);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect("/users/signin");   
    }
}

//end of main controller