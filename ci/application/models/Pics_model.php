<?php
// applicaiton/models/Pics_model.php

class Pics_model extends CI_Model {

        public function __construct()
        {
        }// constructor
    
    public function get_pics($tags)
    {
        //move api key to custom_config.php later
        $api_key = 'a077d091a0760ea2f20c8b2cf8ff43c9';
        $tags = 'catamaran,monohaul,liveaboard';
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $tags;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';

        $response = json_decode(file_get_contents($url));
        $pics = $response->photos->photo;
                
        return $pics;
        
    }//end get_pics  method
    
    
    
}//end class