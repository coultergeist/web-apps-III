<?php
//application/controllers/News.php

class News extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('news_model');
            $this->load->helper('url_helper');
            $this->config->set_item('banner','News Section');

    }

    public function index()
    {
            $data['news'] = $this->news_model->get_news();
            $data['title'] = 'News archive';
        
            $this->config->set_item('title','News Page');
        
            $this->load->view('news/index', $data);
    }

    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        $this->config->set_item('title',$data['news_item']['title']);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('news/view', $data);
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        $this->config->set_item('title','Create News Item');
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('news/create', $data);

        }
        else
        {
            $slug = $this->news_model->set_news();
            
            if($slug)
            {//show view page
                
                feedback("News item entered successfully!","info");
                redirect('/news/view/' . $slug);
                
            }else{//error!
                
                feedback("News item NOT entered!","error");
                redirect('/news/create');
            }
        }
    }
}

