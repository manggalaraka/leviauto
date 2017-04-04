<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_pelanggan extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function mget_jumlah_detailPelanggan(){
        $this->db->select('*');
        $this->db->from('detail_layanan');
        $query = $this->db->get();        
        return  $query->num_rows();
    }


    public function mget_last_detailPelanggan(){//tidak memakai clasusa where sebab fungsi ini digunakan untuk men generate id layanan
        $this->db->select('id_detail_layanan');
        $this->db->from('detail_layanan');
        $this->db->order_by('id_detail_layanan','asc');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }else{
            foreach($query->result() as $hasil){
                $id = $hasil->id_detail_layanan;
            }
            return $id;
        }
    } 

    
    public function m_tambah_detailPelanggan($data){
        return $this->db->insert("detail_layanan",$data);
    }


    public function m_tambah_pelanggan($data){
        $query = $this->db->insert("layanan",$data);
        if($query){
            $last_id = $this->db->insert_id();
            return $last_id;
        }else{
            return false;
        }
    }

    public function mget_data_pelanggan_all(){
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->where('layanan_is_delete',"no");
        $this->db->order_by('id_layanan','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query; 
        }else{
            return false;
        }
    }


    public function mget_data_pelanggan_byid($id){
        $this->db->select('*');
        $this->db->from('layanan as A');
        $this->db->join('detail_layanan as B','B.id_layanan = A.id_layanan','inner');
        $this->db->join('service as C','C.id_service = B.id_service','inner');
        $this->db->where('A.id_layanan',$id);
        $this->db->where('A.layanan_is_delete',"no");
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query; 
        }else{
            return false;
        }
    }

    public function mget_data_pelanggan_keyword($data){
        $this->db->select('*');
        $this->db->from('layanan');
        $this->db->where('layanan_is_delete',"no");
        $this->db->like('nama_pelanggan', $data);
        $this->db->or_like('tanggal', $data); 
        $this->db->order_by('id_layanan','asc');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query; 
        }else{
            return false;
        }
    }


}