<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once APPPATH."third_party/User_Auth.php";

class Userauth{
  var $CI;
  public function __construct($params = array())
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        $this->CI->load->model('model_login');
        $this->CI->load->model('model_previlege');
        $this->CI->config->item('base_url');
        $this->CI->load->database();   
        date_default_timezone_set('Asia/Jakarta');    
  }

  	public function cek_loggedin(){
      $status_login = $this->CI->session->userdata('loggedin');
      $token =  $this->CI->session->userdata('token');
  		if($this->session_usr_decode($status_login)==true and $this->cek_token($token)==true){
  			return TRUE;
  		}else{
  			return FALSE;
  		}
  	}

    public function get_jumlahUser(){
      $jumlah = $this->CI->model_login->mjumlah_user();
      return $jumlah;
    }

	  public function logout(){
      $token = $this->session_usr_decode($this->CI->session->userdata('token'));
      $extract= $this->extract_token($token);
      $this->CI->model_login->mupdate_logout($extract['id_log']);
		  $this->CI->session->sess_destroy();
	  }

    public function hash_password($data_user, $userid) {
        $salt = md5($userid);
        return hash('sha256', $salt.$this->CI->encrypt->decode($data_user['data2']));
    }

    public function generate_token($time,$id){
      $token = $this->CI->encrypt->encode($time.$id);
      return $token;
    }

    public function cek_token($token){
        $id_user = $this->get_id_user();
        $this->CI->db->select('token');
        $this->CI->db->from('pengguna');
        $this->CI->db->where('id_user', $id_user);
        $this->CI->db->where('token', md5($token));
        $query = $this->CI->db->get();   
        if($query->num_rows() == 1){
          $hasil = true;
        }else{
          $hasil = false;
        }
        return $hasil;      
    }

    public function session_usr_encode($data){
      $encode = $this->CI->encrypt->encode($data);
      return $encode;
    }

    public function session_usr_decode($data){
      $decode =  $this->CI->encrypt->decode($data);
      return $decode;
    }

    public function extract_token($token){
      $decode = $this->session_usr_decode($token);
      $size = strlen($decode);
      $time = substr($decode,0,19);
      $id = substr($decode,19,$size);
      $data = array('time_log'=>$time,
                    'id_log'=>$id);
      return $data;
    }

    public function get_id_user(){
      $extract_token = $this->extract_token($this->CI->session->userdata('token'));
      $get_id = $extract_token['id_log'];
      return $get_id;
    }

    public function get_previlege_user($id_user){
        $this->CI->db->select('A.id_previlege,B.nama_previlege');
        $this->CI->db->from('pengguna as A');
        $this->CI->db->join('previlege as B', 'B.id_previlege = A.id_previlege','inner');
        $this->CI->db->where('A.id_user', $id_user);
        $query = $this->CI->db->get();   
        if($query->num_rows() == 1){
          foreach($query->result() as $hasil){
            $data_previlege = array('id_previlege'=>$hasil->id_previlege,
                                    'nama_previlege'=>$hasil->nama_previlege);
          }
        }else{
            $data_previlege = false;
        }
        return $data_previlege;
    }

    public function is_admin(){
     $id_user = $this->get_id_user();
     $previlege = $this->get_previlege_user($id_user);
      if($previlege['nama_previlege'] == "admin"){
        return true;
      }else{
        return false;
      }
    }

    public function is_owner(){
     $id_user = $this->get_id_user();
     $previlege = $this->get_previlege_user($id_user);
      if($previlege['nama_previlege'] == "owner"){
        return true;
      }else{
        return false;
      }
    }

    public function is_kasir(){
     $id_user = $this->get_id_user();
     $previlege = $this->get_previlege_user($id_user);
      if($previlege['nama_previlege'] == "kasir"){
        return true;
      }else{
        return false;
      }
    }

    public function is_pegawai(){
     $id_user = $this->get_id_user();
     $previlege = $this->get_previlege_user($id_user);
      if($previlege['nama_previlege'] == "pegawai"){
        return true;
      }else{
        return false;
      }
    }

    public function generalize_time(){
        return date("Y-m-d h:m:s");
    }
    
}