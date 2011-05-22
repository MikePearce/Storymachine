<?php

class Stories_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getStoriesByBacklogId($backlog_id)
    {
        $ret = FALSE;
        // Get the storynames/themes
        $this->db->select('stories.*, themes.themeName')
           ->from('stories')
           ->join('themes', 'stories.themeid = themes.id', 'left')
           ->order_by('priority_order', 'ASC');
       $query = $this->db->get();

       if ($query->num_rows() > 0)
       {
           $ret = $query->result();
       }
       return $ret ? $ret : FALSE;
    }
    
    public function addStory($quickStory, $backlog_id, $acc)
    {
        $this->db->insert(
            'stories', 
            array(
                    'backlogs_id' => $backlog_id,
                    'story' => $quickStory,
                    'date_added' => date('Y-m-d H:i:s'),
                    'acceptance_criteria' => $acc
                )
        );
    }
    
    public function changePriority($priorityOrder)
    {
        $query = 'UPDATE stories SET priority_order =
            CASE ';

        $newp = implode(',', $priorityOrder);
        $x = 1;
        foreach ($priorityOrder AS $i)
        {
            $query .= 'WHEN id = '. $i .' THEN '. $x++ .' ';
        }
        $query .= 'END WHERE id IN ('. $newp .')';

        $q = $this->db->query($query);
        return $this->db->affected_rows();
    }
    
}