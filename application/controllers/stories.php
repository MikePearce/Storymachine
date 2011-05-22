<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
    
    var $data;
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'User story machine: stories';
    }
    
	/**
	 * Show the backlogs
	 **/
	public function index()
	{
        redirect('/');
    }
	
	/**
	 * Create a new backlog
	 **/
	public function quickadd()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		    'quickstory', 
		    'Quickadd Story', 
		    'trim|required|xss_clean'
		);
        
        // If it fails validation, then show them!
		if ($this->form_validation->run() == TRUE)
		{
		    $this->Stories_model->addStory(
		        $this->input->post('quickstory'),
		        $this->input->post('backlog_id'),
		        json_encode(array(''))
		        );

		}
		// Back to the story page
		redirect($this->input->post('current_url'));
	}
	
	public function savepriority()
	{
	    $rows = $this->Stories_model->changePriority(
	        $this->input->post('storyid')
	    );
	    print 'Updated '. $rows .' stories!';
	}
	
	public function __destruct()
	{
        //$this->session->set_flashdata('referrer', current_url()); 
	}
}
