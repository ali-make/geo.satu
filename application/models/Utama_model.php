<?php 
class Utama_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function get_loc($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('locations');
            return $query->result_array();
        }

        $query = $this->db->get_where('locations', array( 'id'  =>  $id ));
        return $query->row_array();
    }

    public function set_loc($data)
    {
        //$this->load->helper('url');

        //$slug = url_title($this->input->post('address'), 'dash', TRUE);

        $address    = $data[0];
        $kel        = $data[1];
        $kec        = $data[2];
        $lat        = $data[3];
        $lon        = $data[4];

        $sql = "INSERT INTO locations(address, kel, kec, lat, lon) VALUES('$address', '$kel', '$kec', '$lat', '$lon')";

        $this->db->query($sql);
    }

    public function delete_loc($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('locations');
    }

    /*
    public function insert_loc($data)
    {
        $address    = $data[0];
        $kel        = $data[1];
        $kec        = $data[2];
        $lat        = $data[3];
        $lon        = $data[4];

        $sql = "INSERT INTO locations(address, kel, kec, lat, lon) VALUES('$address', '$kel', '$kec', '$lat', '$lon')";

        $this->db->query($sql);
    }
    */
}