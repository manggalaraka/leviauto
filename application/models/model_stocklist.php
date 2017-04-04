<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_stocklist extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function mget_jumlah_stocklist(){
        $this->db->select('*');
        $this->db->from('stocklist');
        $this->db->where('stocklist_is_delete','no');
        $query = $this->db->get();        
        return  $query->num_rows();
    }

    public function mget_all_stocklist(){
        $this->db->select('*');
        $this->db->from('stocklist');
        $this->db->where('stocklist_is_delete','no');
        $this->db->order_by('nama_produk','asc');
        $query = $this->db->get();     
        if($query->num_rows() > 0){   
            return  $query;
        }else{
            return false;
        }
    }

    public function mget_stocklist_by_keyword($data){
        $this->db->select('*');
        $this->db->from('stocklist');
        $this->db->where('stocklist_is_delete',"no");
        $this->db->like('id_stock', $data);
        $this->db->or_like('nama_produk', $data); 
        $this->db->order_by('nama_produk','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query; 
        }else{
            return false;
        }        
    }

    public function mget_last_stocklist(){ //tidak memakai clasusa where sebab fungsi ini digunakan untuk men generate id layanan
        $this->db->select('id_stock');
        $this->db->from('stocklist');
        $this->db->order_by('id_stock','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_stock;
            }
            return $id;
        }
    }     

    public function m_tambah_stocklist($data){
        return $this->db->insert('stocklist',$data);
    }

    public function m_restock($data){
       $this->db->set('stock_barang',$data['stock_barang']);
       $this->db->set('harga_beli',$data['harga_beli']);
       $this->db->where('id_stock',$data['id_stock']);    
       return $this->db->update('stocklist');                                   
    }


}