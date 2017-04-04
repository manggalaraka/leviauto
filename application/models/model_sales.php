<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_sales extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function mget_all_sales(){
        $this->db->select('*');
        $this->db->from('sales_product');
        $query = $this->db->get();
        return  $query;
    }

    public function mget_all_sales_to_produk(){
        $this->db->select('*');
        $this->db->from('sales_have_product');
        $query = $this->db->get();
        return  $query;        
    }

    public function mget_last_sales(){
        $this->db->select('id_sales');
        $this->db->from('sales_product');
        $this->db->order_by('id_sales','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_sales;
            }
            return $id;
        }
    }   

    public function mget_last_sales_to_produk(){
        $this->db->select('id_relation');
        $this->db->from('sales_have_product');
        $this->db->order_by('id_relation','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_relation;
            }
            return $id;
        }        
    }  

    public function m_tambah_sales($data){
        $this->db->set('id_sales',$data['data1']);
        $this->db->set('nama_sales',$data['data2']);
        return $this->db->insert('sales_product');
    }

    public function m_tambah_sales_to_produk($data){
        $this->db->set('id_relation',$data['data1']);
        $this->db->set('id_sales',$data['data2']);
        $this->db->set('id_produk',$data['data3']);
        return $this->db->insert('sales_have_product');
    }

}

