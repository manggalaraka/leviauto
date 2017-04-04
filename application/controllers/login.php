<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_login');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>'); 
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

        if($this->userauth->cek_loggedin()){   
        	redirect('administrator');    
		}
    }

    public function index(){
    	// $subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 2);
     //    $subdomain_name = $subdomain_arr[0];
     //    echo json_encode($subdomain_name);


		$jumlahUser =  $this->userauth->get_jumlahUser();
		if($jumlahUser==0){
			$autoreg = $this->AutoRegisterUser();
			if($autoreg){
				$this->session->set_flashdata('sukses', "auto register user sukses");
				redirect('login');
			}else{
				$this->session->set_flashdata('error', "auto register user gagal");
				redirect('login');
			}
		}else{
			$data['content_report_successornot'] = $this->userreport->call_flashdata_report(); 
			$data['judulHalaman'] = "Login";
			$data['judulContent'] = "LeviAuto";
			$data['halamanJSInt'] = null;
			$data['halamanJSExt'] = null;
			$this->load->view('header_footer/headerDefault',$data);
			$this->load->view('content/v_login',$data);
			$this->load->view('header_footer/footerDefault',$data);
		}
	}

	public function AutoRegisterUser(){
		$user = array('data1'=>'1',
					  'data2'=>'admin',
					  'data3'=>'admin',
					  'data4'=>'12345',
					  'data5'=>'yes',
					  'data6'=>'no');
		$autoreg = $this->model_login->m_signup_user($user);
		return $autoreg;
	}

	public function login_exe(){
		$user = $this->input->post('user');
		$pass = $this->encrypt->encode($this->input->post('password'));
		$id = null;
		$data_user = array('data1'=>$user,
						   'data2'=>$pass);	
		$cek_exist = $this->cek_user_exist($data_user);
		if($cek_exist){
			$hash = $this->userauth->hash_password($data_user,$cek_exist);
			$cek_login = $this->model_login->mcek_user_login($data_user,$hash);
			if($cek_login){
      			$time = date("Y-m-d h:i:s");
				$token = $this->userauth->generate_token($time,$cek_exist);
				$update_login = $this->model_login->mupdate_login($time,$token,$cek_exist);
				if($update_login){
					foreach($cek_login->result() as $hasil){

						$data_sesion = array('log_nama'=>$hasil->nama,
											 'log_username'=>$hasil->username,
											 'log_previlege'=>$this->userauth->session_usr_encode($hasil->id_previlege),
											 'log_photo'=>$hasil->foto,
											 'token'=>$token,
	                						 'loggedin' => $this->userauth->session_usr_encode(TRUE));
					}
				$this->session->set_userdata($data_sesion);
				$this->session->set_flashdata('sukses_adm', "Selamat Datang ".$user);
				redirect('administrator');

				}else{
					$this->session->set_flashdata('error', "generate user login gagal");	
					redirect('login');					
				}
			}else{
				$this->session->set_flashdata('error', "Data user tidak ditemukan");	
				redirect('login');
			}	
		}else{
			$this->session->set_flashdata('error', "Data user tidak ditemukan");	
			redirect('login');
		}
	}


	public function cek_user_exist($data_user){

		$cek_exist = $this->model_login->mcek_user_exist($data_user);
		if($cek_exist){
			foreach($cek_exist->result() as $hasil){ $id = $hasil->id_user;}
			return $id;
		}else{
			return false;
		}
	}	

	public function tes(){

		$decimal = 32;
		$decimal0 = 32;
		$decimal1 = 32;
		$pembagi = 2;
		$biner = null;
		$nilai = null;
		$nilai_array = array();
		for($i=0; $i<$decimal; $i++){
			if($decimal1>=1){
				$decimal1 = $decimal1/$pembagi;
				$biner .= "0";
				if(is_float($decimal1)){
					$decimal1 = round(($decimal1),0,PHP_ROUND_HALF_DOWN);
					echo $decimal1."</br>";
				}else{
					echo $decimal1."</br>";
				}
			}else{
				break;
			}
		}

		echo "</br></br>";

		while($decimal0>=1){

			if($decimal0%$pembagi == 0){
				$decimal0 = $decimal0/$pembagi;
				$biner .= "0";
			}else{
				$decimal0 = round(($decimal0/$pembagi),0,PHP_ROUND_HALF_DOWN);
				$biner .= "1";
			}

			echo $decimal0."</br>";
		}

			// echo $biner;
			echo "binernya => ".strrev($biner)." desimalnya =>".bindec(strrev($biner));


	}

	public function custom_subdomain(){
		$sub = "sub";
		return $sub;
	}

	public function palindrome(){
		$katabijak = "aaaaba";
		$hasil = array();
		for($i=0; $i<strlen($katabijak); $i++){
			for($c=0; $c<=strlen($katabijak); $c++){
				$kata = substr($katabijak,$i,$c);
				if(strlen($kata)>=2 and $c>=2){
					$cek = $this->is_palidrome_compare(substr($katabijak,$i,$c));
					if($cek){
						if(!in_array($kata, $hasil)){
							array_push($hasil,$kata);
						}
					}
				}
			}	
		}

		echo "jumlah palindrome = ".sizeof($hasil)."</br>";

		echo "nilai palindrome = ".json_encode($hasil)."</br>";
	}


	function is_palidrome_compare($s)
	{
		$len=strlen($s);
		$midpoint=round($len/2);
		$i=0;
		while ( $i < $midpoint )
		{
			if ($s[$i]!=$s[$len-$i-1])
				return false;
				$i++;
		}
			return true; 
	}






}