<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_layanan extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function mget_jumlah_layanan(){
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('service_is_delete','no');
        $query = $this->db->get();        
        return  $query->num_rows();
    }



    public function mget_all_layanan(){
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('service_is_delete','no');
        $this->db->order_by('id_service','asc');
        $query = $this->db->get();        
        return  $query;
    }

    public function mget_last_layanan(){ //tidak memakai clasusa where sebab fungsi ini digunakan untuk men generate id layanan
        $this->db->select('id_service');
        $this->db->from('service');
        $this->db->order_by('id_service','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_service;
            }
            return $id;
        }
    }    


    public function mget_layanan_byid($id){
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('service_is_delete','no');
        $this->db->where('id_service',$id);
        $query = $this->db->get();      
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function m_tambah_service($data){
        $this->db->set('id_service',$data['data1']);
        $this->db->set('nama_service',$data['data2']);
        $this->db->set('keterangan_service',$data['data3']);
        $this->db->set('estimasi_service',$data['data4']);
        $this->db->set('harga_service',$data['data5']);
        return $this->db->insert('service');
    }




}