<?php
// applicaiton/models/News_model.php

class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }// constructor
    
    public function get_news($slug = false)
    {
        if ($slug === false)
        {
                $query = $this->db->get('su17_news');
                return $query->result_array();
        }

        $query = $this->db->get_where('su17_news', array('slug' => $slug));
        return $query->row_array();
    }//end get_news method
}//end class