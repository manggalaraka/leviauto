<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_suplier extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function mget_all_suplier(){
        $this->db->select('*');
        $this->db->from('product_suplier');
        $query = $this->db->get();
        return  $query;
    }

    public function mget_last_suplier(){
        $this->db->select('kd_suplier');
        $this->db->from('product_suplier');
        $this->db->order_by('kd_suplier','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->kd_suplier;
            }
            return $id;
        }
    }     

    public function m_tambah_suplier($data){
        $this->db->set('kd_suplier',$data['data1']);
        $this->db->set('nama_suplier',$data['data2']);
        $this->db->set('alamat_suplier',$data['data3']);
        $this->db->set('keterangan_suplier',$data['data4']);
        return $this->db->insert('product_suplier');
    }

}

