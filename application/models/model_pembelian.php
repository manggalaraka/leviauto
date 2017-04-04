<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_pembelian extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function mget_jumlah_pembelian(){
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('pembelian_is_delete','no');
        $query = $this->db->get();        
        return  $query->num_rows();
    }

    public function mget_all_pembelian(){
        $this->db->select('*');
        $this->db->from('pembelian as A');
        $this->db->join('stocklist as B','B.id_stock = A.id_stock','left outer');
        $this->db->where('A.pembelian_is_delete',"no");
        $this->db->order_by('A.id_pembelian','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query; 
        }else{
            return false;
        }
    }


    public function mget_pembelian_by_keyword($data){
        $this->db->select('*');
        $this->db->from('pembelian as A');
        $this->db->join('stocklist as B','B.id_stock = A.id_stock','left outer');
        $this->db->where('A.pembelian_is_delete',"no");
        $this->db->like('A.keterangan', $data);
        $this->db->or_like('A.tanggal_pembelian', $data); 
        $this->db->or_like('B.nama_produk', $data); 
        $this->db->or_like('B.id_stock', $data); 
        $this->db->order_by('A.id_pembelian','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query; 
        }else{
            return false;
        }
    }


    public function mget_last_pembelian(){

    }     

    public function m_tambah_pembelian($data){
        return $this->db->insert('pembelian',$data);
    }

}

