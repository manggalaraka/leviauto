<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_layanan');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>');
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        date_default_timezone_set('Asia/Jakarta');

        if(!$this->userauth->cek_loggedin()){
            redirect('administrator');
		}       
    }

    public function index(){
        redirect('administrator');            
    }
 

     public function generate_waktu_harga(){
        $encode = $this->input->post('data_encode');
        $type = $this->input->post('data_type');
        $decode = $this->userauth->session_usr_decode($encode);
        $time = "0";
        $price = "0";
        $data_layanan = $this->model_layanan->mget_layanan_byid($decode);
        $data_array = array();
        if($data_layanan){
            foreach($data_layanan->result() as $hasil){
                if($type=="add"){
                    $time = $this->generate_time_to_second($hasil->estimasi_service)*1;
                    $price = floatval($hasil->harga_service)*1;
                }else{
                    $time = $this->generate_time_to_second($hasil->estimasi_service)*-1;
                    $price = floatval($hasil->harga_service)*-1;
                }
            }
        }

         array_push($data_array,$price,$time);
         echo json_encode($data_array);
     }

    public function generate_time_to_second($time){
        $parseTime = date_parse($time);
        $insecond = ($parseTime['hour']*3600) + ($parseTime['minute']*60) + ($parseTime['second']);
        return $insecond;
    }





}