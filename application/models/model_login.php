<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Model_login extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function mjumlah_user(){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('user_is_delete',"no");
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function mcek_user_login($data_user,$hash){
    	$user = $data_user['data1'];
    	$this->db->select('*');
    	$this->db->from('pengguna');
        $this->db->where('username',$user);
        $this->db->where('password',$hash);
        $this->db->where('activated',"yes");
        $this->db->where('user_is_delete',"no");
    	$query = $this->db->get();
	    	if($query->num_rows() == 1){
	    		return $query;
	    	}else{
	    		return FALSE;
	    	}
    }

    public function mupdate_login($date,$token,$id){
        $this->db->set('last_login',$date);
        $this->db->set('token',md5($token));
        $this->db->where('id_user',$id);
        return $this->db->update('pengguna');
    }

    public function mupdate_logout($id){
        $this->db->set('token',"");
        $this->db->where('id_user',$id);
        return $this->db->update('pengguna');
    }    

    public function mcek_user_exist($data_user){
        $user = $data_user['data1'];
        $this->db->select('id_user');  
        $this->db->from('pengguna');
        $this->db->where('username',$user);
        $this->db->where('activated',"yes");
        $this->db->where('user_is_delete',"no");
        $query = $this->db->get();
            if($query->num_rows() == 1){
                return $query;
            }else{
                return FALSE;
            }  
    }

    public function m_signup_user($data_user){
        //insert
        $this->db->set('id_previlege',$data_user['data1']);
        $this->db->set('nama',$data_user['data2']);
        $this->db->set('username',$data_user['data3']);
        $this->db->set('password',$data_user['data4']);
        $this->db->set('activated',$data_user['data5']);
        $this->db->set('user_is_delete',$data_user['data6']);
        $insert = $this->db->insert('pengguna');
        $last_id = $this->db->insert_id();

        if($insert){
        //then update pass
            $salt = md5($last_id);
            $pass = hash('sha256', $salt.$data_user['data4']);
            $this->db->set('password',$pass);
            $this->db->where('id_user',$last_id);
            return $this->db->update('pengguna');
        }else{
            return false;
        }
    }

}

