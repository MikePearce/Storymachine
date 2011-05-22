<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {
    
    var $data;
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'User story machine: themes';
    }
    
	/**
	 * Show the backlogs
	 **/
	public function index()
	{
        $this->data->backlogs = $this->Backlogs_model->getBacklogs();
	    $this->layout->view('backlogs/backlog', $this->data); 
	}
	
	/**
	 * Create a new backlog
	 **/
	public function create()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		    'name', 
		    'Backlog name', 
		    'trim|required|min_length[2]|max_length[224]|xss_clean|callback_backlog_exists'
		);
        
        // If it fails validation, then show them!
		if ($this->form_validation->run() == FALSE)
		{
			$this->layout->view('backlogs/new_backlog', $this->data); 
		}
		else { // Otherwise, add it and redirect.
            
		    $this->Backlogs_model->addBacklog($this->input->post('name'));
            redirect('/backlogs/');
		}
	}
