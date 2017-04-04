<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_pelanggan');
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
 
       
    public function add(){
       $this->form_validation->set_rules('nama','nama pelanggan','trim|required');
        $this->form_validation->set_rules('layanan[]','layanan','required');
        $this->form_validation->set_rules('estimasi_waktu','estimasi waktu','required');
        $this->form_validation->set_rules('harga','harga layanan','required|is_natural_no_zero');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        $this->form_validation->set_message('is_natural_no_zero', 'nilai %s tidak boleh 0');
        if ($this->form_validation->run() == FALSE){
                $pesan = validation_errors();
                $this->session->set_flashdata('error_form', $pesan);
                redirect('administrator/cuci_mobil');
            }else{
                $nama = $this->input->post('nama');
                $layanan = $this->input->post('layanan');
                $estimasi_waktu = $this->input->post('estimasi_waktu');
                $harga = $this->input->post('harga');
                $time_Start = date("H:i:s");
                $timeInSecond = ($this->generate_time_to_second(date("H:i:s")))+($this->generate_time_to_second($estimasi_waktu));
                $timeInHIS = gmdate("H:i:s", $timeInSecond);
                $time_End = $timeInHIS;
                $dataLayanan = array('id_layanan'=>'',
                                    'nama_pelanggan'=>$nama,
                                    'telepon'=>'',
                                    'time_start'=>$time_Start,
                                    'time_end'=>$time_End,
                                    'tanggal'=>date("Y-m-d"),
                                    'status'=>'menunggu',
                                    'harga_total'=>$harga,
                                    'layanan_is_delete'=>'no');
                $add = $this->model_pelanggan->m_tambah_pelanggan($dataLayanan);
                $hasil_akhir = array();
                if($add){
                    $add_detail = $this->add_detail_pelanggan($add,$layanan);
                    if($add_detail){
                        $this->session->set_flashdata('sukses_adm', "data pencucian sukses ditambahkan");
                        redirect('administrator/cuci_mobil');
                    }else{
                        $this->session->set_flashdata('error_adm', "data relation pencucian error");
                        redirect('administrator/cuci_mobil');
                    }  
                }else{
                    $this->session->set_flashdata('error_adm', "data pencucian gagal ditambahkan");
                    redirect('administrator/cuci_mobil');
                }
            }        
    }

    public function generate_time_to_second($time){
        $parseTime = date_parse($time);
        $insecond = ($parseTime['hour']*3600) + ($parseTime['minute']*60) + ($parseTime['second']);
        return $insecond;
    }

    public function add_detail_pelanggan($id_layanan,$data_service){
        $hasil_akhir = array();

        for($i=0; $i<count($data_service); $i++){
            $dataRelation = array('id_detail_layanan'=>$this->get_kode_detail_pelanggan(),
                                  'id_layanan'=>$id_layanan,
                                  'id_service'=>$this->userauth->session_usr_decode($data_service[$i]));
            if($this->model_pelanggan->m_tambah_detailPelanggan($dataRelation)){
                array_push($hasil_akhir,true);
            }else{
               array_push($hasil_akhir,false); 
            }
        }   

        if(in_array(false, $hasil_akhir)){
            $boolean = false;
        }else{
            $boolean =  true;
        }
        return $boolean;
    } 


    public function get_kode_detail_pelanggan(){
        $total_row = $this->model_pelanggan->mget_jumlah_detailPelanggan();
        if($total_row < 1){
            $kode_detail = "dtl_relation_1000001";
        }else{
            $last_id = $this->model_pelanggan->mget_last_detailPelanggan();
            $id_akumulasi = substr($last_id,13)+1;
            $kode_detail = str_pad($id_akumulasi, 20, "dtl_relation_", STR_PAD_LEFT);
        }
        return $kode_detail;
    }
     
    public function tes(){
        $id = "8";
        $pelanggan = $this->model_pelanggan->mget_data_pelanggan_byid($id);
        $layanan = $this->model_layanan->mget_all_layanan();
        
        foreach($layanan->result() as $hasil){
            $data_layanan[] = array('id_layanan'=>$hasil->id_service,
                                     'nama_layanan'=>$hasil->nama_service,
                                     'status'=>'uncheck');
        }

        if($pelanggan){
            foreach($pelanggan->result() as $hasil){
                $data_pelanggan[] = array('id_layanan'=>$hasil->id_service,
                                          'nama_layanan'=>$hasil->nama_service,
                                          'status'=>'check');
            }

            // //BEST ANSWER 
            for($i=0; $i<count($data_layanan); $i++){
                foreach($data_pelanggan as $value1){
                    if($value1['id_layanan'] == $data_layanan[$i]['id_layanan']){
                        $data_layanan[$i]['status'] = 'check';
                    }
                }
            }
        }

       // return $data_layanan;
       echo json_encode($data_layanan);        


    }

    // public function tes(){
        // $a[0] = array('data1'=>'1',
        //               'data2'=>'check');
        // $a[1] = array('data1'=>'2',
        //               'data2'=>'check');
        // $a[2] = array('data1'=>'3',
        //               'data2'=>'check');

        // $data1 = array();

        // $b[0] = array('data1'=>'1',
        //            'data2'=>'uncheck');
        // $b[1] = array('data1'=>'2',
        //            'data2'=>'uncheck');

        // //BEST ANSWER 
        // for($i=0; $i<count($a); $i++){
        //     foreach($b as $value1){
        //         if($value1['data1'] == $a[$i]['data1']){
        //             $a[$i]['data2'] = 'uncheck';
        //         }
        //     }
        // }

        // echo json_encode($a);


        //ALTERNATIVE ANSWER
        // $total = count($a);
        // for($i=0; $i<$total; $i++){ 
        //     foreach($b as $value1){
        //         $value_b = $value1['data1'];
        //         if($value_b == $a[$i]['data1']){
        //             unset($a[$i]);
        //             $i=$i+1;
        //         }
        //     }
        // }
        // $val_a = array_values(array_filter($a));
        // $val_b = array_values(array_filter($b));
        // $data2= array_merge($val_a,$val_b);
        // sort($data2);
        // echo json_encode($data2);
    // }


}