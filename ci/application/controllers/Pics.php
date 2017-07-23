<?php
//application/controllers/Pics.php

class Pics extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('pics_model');
            $this->load->helper('url_helper');
            $this->config->set_item('banner','Pics Section');

    }

    public function index()
    {//will show categories of pictures
                  
            /*
            $data['title'] = 'Pic Categories';
        
            $this->config->set_item('title','Pics');
        
            $this->load->view('news/index', $data);
            */
    }

    public function view($tags = NULL)
    {//will show pictures for one category only

            $data['pics'] = $this->pics_model->get_pics($tags);

            $data['title'] = 'Pic Categories';
        
            $this->config->set_item('title','Pics');
        
            $this->load->view('pics/view', $data);      
       
    }
    
}

