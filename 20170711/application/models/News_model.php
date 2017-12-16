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
    
    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        //return $this->db->insert('su17_news', $data);
        
        if($this->db->insert('su17_news', $data))
        {//data entered, show it!
        
            //This is what we'd do to pass the id # to the view page:
            // $this->db->insert_id();
            
            //the slug is used by the view page to load the current news item
            return $slug;
            
        }else{//problem
            
            return false;
        }
    }
}//end class