<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_previlege extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function mget_jumlah_previlege(){
        $this->db->select('*');
        $this->db->from('previlege');
        $query = $this->db->get();        
        return  $query->num_rows();
    }

    public function mget_all_previlege(){
        $this->db->select('*');
        $this->db->from('previlege');
        $this->db->order_by('id_previlege','asc');
        $query = $this->db->get();        
        return  $query;
    }


    public function m_tambah_previlege($data){
        $this->db->set('id_previlege',$data['data1']);
        $this->db->set('nama_previlege',$data['data2']);
        $this->db->set('gaji',$data['data3']);
        return $this->db->insert('previlege');
    }

    public function mget_previlege_byid($id){
        
    }

    public function mboolean_is_admin($id){

    }

    public function mboolean_is_owner($id){

    }

    public function mboolean_is_kasir($id){

    }

    public function mboolean_is_pegawai($id){

    }

}