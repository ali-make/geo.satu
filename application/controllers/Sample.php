<?php 
class Utama extends CI_Controller {

    public $at;
    public $la;
    public $apikey;
    public $url;
    public $latlong;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('utama_model');
    }

    public function index()
    {
        // set location lat lon
        $at = '';

        // set language
        $la = 'id';
        // set apikey
        $apikey = 'PxeAZYLiwtXcQL6UpA8cg5B8Zm-VCrhXMhEUfk93Oo4';
        // set url api
        $url = "https://revgeocode.search.hereapi.com/v1/revgeocode?at=$at&lang=$la&apikey=$apikey";

        // call api
        $json = file_get_contents($url);

        $json = json_decode($json);

       
        $data = array(
            $address = $json->items[0]->address->label,
            $kel = $json->items[0]->address->subdistrict,
            $kec = $json->items[0]->address->district,
            $lat = $json->items[0]->position->lat,
            $lon = $json->items[0]->position->lng
        );
        

        //echo $address;
        //echo '<hr>' . $kel;
        //echo '<hr>' . $kec;
        //echo '<hr>' . $lat;
        //echo '<hr>' . $lon;

        //$this->utama_model->insert_loc($data);
    }
}