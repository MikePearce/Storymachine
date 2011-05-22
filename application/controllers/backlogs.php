<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backlogs extends CI_Controller {
    
    var $data;
    
    public function __construct()
    {
        parent::__construct();
        $this->data->title_for_layout = 'User story machine: backlogs';
	    $this->load->model('Backlogs_model');
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
	
	/**
	 * Check and see if the backlog exists
	 * $str string the backlog name
	 */
	public function backlog_exists($str)
	{
	    if ($this->Backlogs_model->getBacklogByName($str))
	    {
	        $this->form_validation->set_message(
	            'backlog_exists', 
	            'That backlog already exists'
	        );
	    }
	    else {
	        
	    }
	}
	
	/**
	 * Show the backlog
	 * $backlog_name string The name of the backlog
	 * @todo Un-urling the name; how does this work with apos or other chars?
	 */
	public function view($backlog_name)
	{
	    // Un-url the name
        $backlog_name = str_replace(array('-', '_'), " ", $backlog_name);
        
        // Get the backlog
        if (
            $this->data->backlog = $this->Backlogs_model->getBacklogByName(
                $backlog_name, 
                TRUE
            )
        )
        {
            // Get the stories
            $data['stories'] = $this->Stories_model->getStoriesByBacklogId(
                $this->data->backlog->id
            );

            $this->data->stories = $this->load->view(
                'snippets/story_table', 
                $data,
                TRUE //return
            );
            // Show
            $this->layout->view('stories/show_stories', $this->data);          
        }
        else {
            print 'backlog error';
        }
    }
    
    public function __destruct()
    {
        //$this->session->set_flashdata('referrer', current_url()); 
    }
}
