<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_kategori extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function mget_all_kategori(){
        $this->db->select('*');
        $this->db->from('product_kategori');
        $query = $this->db->get();
        return  $query;
    }

    public function mget_last_kategori(){
        $this->db->select('kd_kategori');
        $this->db->from('product_kategori');
        $this->db->order_by('kd_kategori','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->kd_kategori;
            }
            return $id;
        }
    } 

    public function m_tambah_kategori($data){
        $this->db->set('kd_kategori',$data['data1']);
        $this->db->set('kategori_produk',$data['data2']);
        return $this->db->insert('product_kategori');
    }    


}

