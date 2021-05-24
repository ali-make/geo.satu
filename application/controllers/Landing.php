<?php
class Landing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('utama_model');
        $this->load->helper(array('url_helper', 'form'));
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['locations'] = $this->utama_model->get_loc();
        $data['title'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('utama/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL) {
        $data['locations_id'] = $this->utama_model->get_loc($id);

        if (empty($data['locations_id'])) {
            show_404();
        }

        $data['title'] = $data['locations_id']['kec'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('utama/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        //$this->load->helper('form');
        //$this->load->library('form_validation');

        $data['title'] = 'Posting';

        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('lon', 'Longitude', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('utama/create');
            $this->load->view('templates/footer');
        } else {
            $this->reverse_geo();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('utama/success');
            $this->load->view('templates/footer');
        }
    }

    public function reverse_geo()
    {
        $lat = $this->input->post('lat');
        $lon = $this->input->post('lon');

        $lan = 'id';
        $apikey = 'PxeAZYLiwtXcQL6UpA8cg5B8Zm-VCrhXMhEUfk93Oo4';
        $url = "https://revgeocode.search.hereapi.com/v1/revgeocode?at=$lat%2C$lon&lan=$lan&apikey=$apikey";

        $json = file_get_contents($url);

        $json = json_decode($json);

        $data = array(
            $address = $json->items[0]->address->label,
            $kel = $json->items[0]->address->subdistrict,
            $kec = $json->items[0]->address->district,
            $lat = $json->items[0]->position->lat,
            $lon = $json->items[0]->position->lng
        );

        $this->utama_model->set_loc($data);
    }

    public function delete_loc($id)
    {
        $this->utama_model->delete_loc($id);

        redirect();
    }
}