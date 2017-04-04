<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_kategori');
        $this->load->model('model_produk');
        $this->load->model('model_suplier');
        $this->load->model('model_stocklist');
        $this->load->model('model_layanan');
        $this->load->model('model_pelanggan');
        $this->load->model('model_previlege');
        $this->load->model('model_pembelian');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"> ', '</div>');
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

        if($this->userauth->cek_loggedin()){
           if($this->userauth->is_kasir()){
                $layout_type = "page-container-boxed";
           }else{
                $layout_type = "page-container-boxed";
           }
    
            $this->data = array('log_nama'=>$this->session->userdata('log_nama'),
                                'log_username'=>$this->session->userdata('log_username'),
                                'log_previlege'=>$this->session->userdata('log_previlege'),
                                'log_photo'=>$this->session->userdata('log_photo'),
                                'token'=>$this->session->userdata('token'),
                                'loggedin'=>$this->session->userdata('loggedin'),
                                'navtop'=>$this->load->view('menubar/v_navbarTop',null,true),
                                'navside'=>"",
                                'body_layout'=>$layout_type,
                                'main_breadcrumb'=>"Dashboard",
                                'content_report_successornot'=>$this->userreport->call_flashdata_report()); 
		}else{
			redirect('login');
		}       
    }

    public function index(){
        $data['judulHalaman'] = "Dashboard";
        $data['judulContent'] = null;
        $data['halamanJSPlugin'] = null;
        $data['halamanJSPendukung'] = null;
        $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
        $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
        $data['contentUtama'] = $this->set_ContentIndexDashboard($data);
        $data['contentPendukung'] =null;
        $this->load->view('header_footer/headerDefault',$data);
        $this->load->view('content/v_dashboard',$data);
        $this->load->view('header_footer/footerDefault',$data);             
    }

    public function tambah_pegawai(){
        $jumlahPrevilege = $this->model_previlege->mget_jumlah_previlege();
        if($jumlahPrevilege<1){
            if($this->AutoRegisterPrevilege()){
                redirect('administrator/tambah_pegawai');
            }else{
                $this->session->set_flashdata('error_adm', "auto register previlege gagal");
                redirect('administrator');
            }
        }else{
            $data['judulHalaman'] = "Tambah Pegawai";
            $data['judulContent'] = "Tambah Pegawai";
            $data['previlege'] = $this->model_previlege->mget_all_previlege();
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/kepegawaian/v_tambah_pegawai',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  
        }           
    }

    public function tambah_layanan(){
        $jumlahLayanan = $this->model_layanan->mget_jumlah_layanan();
        if($jumlahLayanan<1){
            if($this->AutoRegisterService()){
                redirect('administrator/tambah_layanan');
            }else{
                $this->session->set_flashdata('error_adm', "auto register layanan gagal");
                redirect('administrator');
            }
        }else{
            $data['judulHalaman'] = "Tambah Layanan";
            $data['judulContent'] = "Tambah Layanan";
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/layanan/v_tambah_layanan',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  
        }                             
    }

    public function daftar_layanan(){
            $data['judulHalaman'] = "Daftar Layanan";
            $data['judulContent'] = "Tabel Layanan";
            $data['layanan'] = $this->model_layanan->mget_all_layanan();
            $data['halamanJSPlugin'] = $this->load->view('header_footer/footerExport',null,true);
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/layanan/v_daftar_layanan',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);          
    }

    public function cuci_mobil(){
            $data['judulHalaman'] = "Cuci Mobil";
            $data['judulContent'] = "Tambah Cuci Mobil Baru";
            $data['layanan'] = $this->model_layanan->mget_all_layanan();
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = $this->load->view('header_footer/functionCuciMobil',$data,true);
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/layanan/v_cuci_baru',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);          
    }  

    public function daftar_cuci(){
            $keyword = $this->input->get('keyword');
            $data['keyword'] = $keyword;
            $data['judulHalaman'] = "Daftar Cuci";
            $data['judulContent'] = "Tabel Cucian Mobil";
            $data['data_cucian'] = $this->data_cuci_semua_pelanggan($keyword);
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/layanan/v_daftar_cuci',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);   
    } 

    public function data_cuci_semua_pelanggan($keyword){
    if(empty($keyword)){
            $allPelanggan = $this->model_pelanggan->mget_data_pelanggan_all();
            $key = false;
        }else{
            $allPelanggan = $this->model_pelanggan->mget_data_pelanggan_keyword($keyword);
            $key = true;
        }
            if($allPelanggan){
                foreach ($allPelanggan->result() as $hasil) {
                   $alldata[] = array('id_layanan'=>$hasil->id_layanan,
                                    'nama_pelanggan'=>$hasil->nama_pelanggan,
                                    'telepon'=>$hasil->telepon,
                                    'tanggal'=>$hasil->tanggal,
                                    'status'=>$hasil->status,
                                    'harga_total'=>$hasil->harga_total,
                                    'detail'=>$this->detail_cuci_tiap_pelanggan($hasil->id_layanan));
                }
            }else{
                $alldata = false;
            }
            return $alldata;
    }


    public function detail_cuci_tiap_pelanggan($id){
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

       return $data_layanan;
       //echo json_encode($data_layanan);     

    } 



    public function ganti_onderdil(){
        $jumlahOnderdil = $this->model_stocklist->mget_jumlah_stocklist();
        if($jumlahOnderdi<1){
                $this->session->set_flashdata('error_adm', "data stock onderdil kosong / tidak ditemukan, user harus menambahkan terlebih dahulu");
                redirect('administrator/tambah_stocklist');
        }else{
            $data['judulHalaman'] = "Ganti Onderdil";
            $data['judulContent'] = "Tambah Onderdil Baru";
            $data['layanan'] = null;
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = null;
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  
        }

    }

    public function tambah_stocklist(){
            $data['judulHalaman'] = "Stock Onderdil";
            $data['judulContent'] = "Tambah Stock Onderdil Baru";
            $data['layanan'] = $this->model_stocklist->mget_all_stocklist();
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/inventory/v_tambah_stocklist',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  

    }

    public function restock_produk(){
            $data['judulHalaman'] = "Stock Onderdil";
            $data['judulContent'] = "Restock Onderdil";
            $data['stocklist'] = $this->model_stocklist->mget_all_stocklist();
            $data['halamanJSPlugin'] = null;
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/inventory/v_restock_barang',$data,true);
            $data['contentPendukung'] =null;
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  

    }

    public function daftar_stocklist(){
        $jumlahStock = $this->model_stocklist->mget_jumlah_stocklist();
        if($jumlahStock<1){
            $this->session->set_flashdata('error_adm', "Halaman belum bisa diakses, data stock barang masih kosong");
            redirect('administrator');
        }else{
            $keyword = $this->input->get('keyword');
            $stock = $this->data_stocklist($keyword);
            $data['judulHalaman'] = "Daftar Stock Onderdil";
            $data['judulContent'] = "Tabel Stock Onderdil";
            $data['stock'] = $stock;
            $data['halamanJSPlugin'] = $this->load->view('header_footer/footerExport',null,true);
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/inventory/v_daftar_stock',$data,true);
            $data['contentPendukung'] =$this->modal_daftar_stocklist($stock);
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  
        }      
    }

    public function data_stocklist($keyword){
    if(empty($keyword)){
            $allStocklist = $this->model_stocklist->mget_all_stocklist();
            //$key = false;
        }else{
            $allStocklist = $this->model_stocklist->mget_stocklist_by_keyword($keyword);
            //$key = true;
        }
            return $allStocklist;
    }

    public function modal_daftar_stocklist($stock){
        $data['stock'] = $stock;
        $data['judul1'] = "<span class='fa fa-shopping-cart'></span>"." Restock Inventory";
        $data['judul2'] = "<span class='fa fa-edit'></span>"." Edit Inventory";
        $data['judul3'] = "<span class='fa fa-minus-square'></span>"." Hapus Inventory";
        return $this->load->view('content/inventory/v_modal_stocklist',$data,true);
    }


   public function daftar_pembelian(){
        $jumlahPembelian = $this->model_pembelian->mget_jumlah_pembelian();
        if($jumlahPembelian<1){
            $this->session->set_flashdata('error_adm', "Halaman belum bisa diakses, data pembelian masih kosong");
            redirect('administrator');
        }else{
            $keyword = $this->input->get('keyword');
            $pembelian = $this->data_pembelian($keyword);
            $data['judulHalaman'] = "Daftar Pembelian";
            $data['judulContent'] = "Tabel Pembelian";
            $data['pembelian'] = $pembelian;
            $data['halamanJSPlugin'] = $this->load->view('header_footer/footerExport',null,true);
            $data['halamanJSPendukung'] = null;
            $data['halamanJSUtama'] = $this->load->view('header_footer/footerDashboard',$data,true);
            $data['menuNavigasiSamping'] = $this->load->view('menubar/v_navbarSide',$data,true);
            $data['contentUtama'] = $this->load->view('content/keuangan/pengeluaran/v_daftar_pembelian',$data,true);
            $data['contentPendukung'] =$this->modal_pembelian($pembelian);
            $this->load->view('header_footer/headerDefault',$data);
            $this->load->view('content/v_dashboard',$data);
            $this->load->view('header_footer/footerDefault',$data);  
        }      
    }

    public function data_pembelian($keyword){
    if(empty($keyword)){
            $allPembelian = $this->model_pembelian->mget_all_pembelian();
            //$key = false;
        }else{
            $allPembelian = $this->model_pembelian->mget_pembelian_by_keyword($keyword);
            //$key = true;
        }
            return $allPembelian;
    }

    public function modal_pembelian($stock){
        $data['stock'] = $stock;
        $data['judul2'] = "<span class='fa fa-edit'></span>"." Edit Data Pembelian";
        $data['judul3'] = "<span class='fa fa-minus-square'></span>"." Hapus Data Pembelian";
        // return $this->load->view('content/inventory/v_modal_stocklist',$data,true);
    }


    public function AutoRegisterService(){

        $layanan1 = array('data1'=>'service_10001',
                          'data2'=>'Cuci Mobil',
                          'data3'=>'',
                          'data4'=>'00:10:00',
                          'data5'=>'35000');

        $layanan2 = array('data1'=>'service_10002',
                          'data2'=>'Dorsmir Mobil',
                          'data3'=>'',
                          'data4'=>'00:15:00',
                          'data5'=>'45000');

        $layanan3 = array('data1'=>'service_10003',
                          'data2'=>'Salon Mobil',
                          'data3'=>'',
                          'data4'=>'00:50:00',
                          'data5'=>'700000');

        $data_layanan = array();
        $hasil_akhir = array();
        array_push($data_layanan, $layanan1,$layanan2,$layanan3);

        for($i=0; $i<sizeof($data_layanan); $i++){
            if($this->model_layanan->m_tambah_service($data_layanan[$i])){
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

    public function AutoRegisterPrevilege(){
        $prev1 = array('data1'=>'1',
                          'data2'=>'admin',
                          'data3'=>'0');

        $prev2 = array('data1'=>'2',
                          'data2'=>'owner',
                          'data3'=>'0');

        $prev3 = array('data1'=>'3',
                          'data2'=>'kasir',
                          'data3'=>'0');

        $prev4 = array('data1'=>'4',
                          'data2'=>'pegawai',
                          'data3'=>'0');
        $data_previlege = array();
        $hasil_akhir = array();
        array_push($data_previlege,$prev1,$prev2,$prev3,$prev4);

        for($i=0; $i<sizeof($data_previlege); $i++){
            if($this->model_previlege->m_tambah_previlege($data_previlege[$i])){
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

    public function get_kode_layanan(){
        $total_row = $this->model_layanan->mget_jumlah_layanan();
        if($total_row < 1){
            $kode_layanan = "service_10001";
            return $kode_layanan;
        }else{
            $last_id = $this->model_layanan->mget_last_layanan();
            $id_akumulasi = substr($last_id,8)+1;
            $id_layanan = str_pad($id_akumulasi, 13, "service_", STR_PAD_LEFT);
            return $id_layanan;
        }
    }

    public function set_ContentIndexDashboard($data){
        $previlege = 3;
        if($previlege == 1){
            return $this->load->view('content/v_content_DashAdmin',$data,true);
        }else if($previlege == 2){
            return $this->load->view('content/v_content_DashAdmin',$data,true);
        }else if($previlege == 3){
            return $this->load->view('content/v_content_DashKasir',$data,true);
        }else{
            return null;
        }
    }

    public function set_SideMenu($data){
        $previlege = 3;
        if($previlege == 1){
            return $this->load->view('content/v_content_DashAdmin',$data,true);
        }else if($previlege == 2){
            return $this->load->view('content/v_content_DashAdmin',$data,true);
        }else if($previlege == 3){
            return $this->load->view('content/v_content_DashKasir',$data,true);
        }else{
            return null;
        }
    }

    public function logout(){
        $logout = $this->userauth->logout();
        redirect('login');
    }



    public function tes(){
      // echo $this->generialize_kd_kategori()."</br></br>";
      // echo $this->generialize_kd_suplier()."</br></br>";
      // echo $this->generialize_kd_produk();
      //echo $this->generialize_kd_sales();
        echo $this->generialize_kd_relation_salestoproduk();
    }
     

}