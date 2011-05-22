<?php

class Backlogs_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getBacklogs()
    {
        // Get the storynames/themes
        $this->db->select('id, backlog_name')
           ->from('backlogs')
           ->order_by('backlog_name', 'ASC');
       $query = $this->db->get();
       $a = $query->result();
       $ret = array();
       foreach($a AS $row)
       {
           $class = new stdClass;
           $class->id = $row->id;
           $class->backlog_name = $row->backlog_name;
           $ret[$row->id] = $class;
       }
       return $ret;
    }
    
    public function getBacklogByName($name, $fuzzy = FALSE)
    {
        $this->db->select('*')->from('backlogs');
        $ret = FALSE;

        // If it's come from the URL
        if ($fuzzy) 
        {
           $this->db->like('backlog_name', $name);                        
        }
        else {
           $this->db->where('backlog_name', $name);            
        }

     
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
          $ret = $query->row(); 
        }
        return $ret ? $ret : FALSE;   
    }
    
    /**
     * Add a backlog item
     * @todo: Add some error handling
     */
    public function addBacklog($name)
    {
        $this->db->insert('backlogs', array('backlog_name' => $name)); 
    }
}