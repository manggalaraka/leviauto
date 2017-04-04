<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_produk extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function mget_all_produk(){
        $this->db->select('*');
        $this->db->from('product_detail');
        $query = $this->db->get();
        return  $query;
    }

    public function mget_last_produk(){
        $this->db->select('id_produk');
        $this->db->from('product_detail');
        $this->db->order_by('id_produk','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_produk;
            }
            return $id;
        }
    }     

    public function m_tambah_produk($data){
        $this->db->set('id_produk',$data['data1']);
        $this->db->set('nama_produk',$data['data2']);
        $this->db->set('kd_kategori',$data['data3']);
        $this->db->set('kd_suplier',$data['data4']);
        $this->db->set('stock',$data['data4']);
        $this->db->set('harga',$data['data4']);
        return $this->db->insert('product_detail');
    }

}

