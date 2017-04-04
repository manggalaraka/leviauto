<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocklist extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('model_stocklist');
        $this->load->model('model_pembelian');
        $this->form_validation->set_error_delimiters(' <div class="alert alert-danger">', '</div>');
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate'); 
        $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

        if(!$this->userauth->cek_loggedin()){
            redirect('administrator');
		}       
    }

    public function index(){
        redirect('administrator');            
    }
 
    public function add(){
       $this->form_validation->set_rules('nama','nama barang','trim|required|is_unique[stocklist.nama_produk]');
        $this->form_validation->set_rules('stock','stock barang','required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_beli','harga beli','required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_jual','harga jual','required|is_natural_no_zero');
        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        $this->form_validation->set_message('is_natural_no_zero', 'nilai %s harus lebih besar daripada 0');
        if ($this->form_validation->run() == FALSE){
                $pesan = validation_errors();
                $this->session->set_flashdata('error_form', $pesan);
                redirect('administrator/tambah_stocklist');
            }else{
                $idBarang = $this->get_kode_stocklist();
                $namaBarang = $this->input->post('nama');
                $stock = $this->input->post('stock');
                $hargaBeli =  $this->input->post('harga_beli');
                $hargaJual =  $this->input->post('harga_jual');
                $action = "add";
                $dataStock = array('id_stock'=>$idBarang,
                                   'nama_produk'=>$namaBarang,
                                   'stock_barang'=>$stock,
                                   'harga_beli'=>$hargaBeli,
                                   'harga_jual'=>$hargaJual,
                                   'stocklist_is_delete'=>'no');
                $dataPembelian = array('id_pembelian'=>'',
                                       'id_stock'=>$idBarang,
                                       'total'=>intval($hargaBeli*$stock),
                                       'keterangan'=>$action,
                                       'tanggal_pembelian'=>$this->userauth->generalize_time(),
                                       'pembelian_is_delete'=>'no');
                if($this->model_stocklist->m_tambah_stocklist($dataStock)){
                    if($this->model_pembelian->m_tambah_pembelian($dataPembelian)){
                        $this->session->set_flashdata('sukses_adm', "data inventory ".$namaBarang." baru sukses ditambahkan");
                        redirect('administrator/tambah_stocklist');
                    }else{
                        $this->session->set_flashdata('error_adm', "data inventory ".$namaBarang." pembelian gagal ditambahkan");
                        redirect('administrator/tambah_stocklist');
                    }
                }else{
                        $this->session->set_flashdata('error_adm', "data stock gagal ditambahkan");
                        redirect('administrator/tambah_stocklist');
                }
            }
    }

    public function restock(){
       $this->form_validation->set_rules('id','id barang','trim|required');
       $this->form_validation->set_rules('nama','nama barang','trim|required');
        $this->form_validation->set_rules('stock_awal','stock awal barang','required|is_natural_no_zero');
        $this->form_validation->set_rules('stock','stock barang','required|is_natural_no_zero');
        $this->form_validation->set_rules('harga_beli','harga beli','required|is_natural_no_zero');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan dilengkapi');
        $this->form_validation->set_message('is_natural_no_zero', 'nilai %s harus lebih besar daripada 0');
        if ($this->form_validation->run() == FALSE){
                $pesan = validation_errors();
                $this->session->set_flashdata('error_form', $pesan);
                redirect('administrator/daftar_stocklist');
            }else{
                $id = $this->input->post('id');
                $nama = $this->input->post('nama');
                $stock_awal = $this->input->post('stock_awal');
                $stock_tambah = $this->input->post('stock');
                $stock = intval($stock_awal+$stock_tambah);
                $harga_beli = $this->input->post('harga_beli');
                $action = "restock";
               $dataStock = array('id_stock'=>$id,
                                   'stock_barang'=>$stock,
                                   'harga_beli'=>$harga_beli);

                $dataPembelian = array('id_pembelian'=>'',
                                       'id_stock'=>$id,
                                       'total'=>intval($harga_beli*$stock),
                                       'keterangan'=>$action,
                                       'tanggal_pembelian'=>$this->userauth->generalize_time(),
                                       'pembelian_is_delete'=>'no');

                if($this->model_stocklist->m_restock($dataStock)){
                    if($this->model_pembelian->m_tambah_pembelian($dataPembelian)){
                        $this->session->set_flashdata('sukses_adm', "data inventory ".$nama." sukses direstock");
                        redirect('administrator/daftar_stocklist');
                    }else{
                        $this->session->set_flashdata('error_adm', "data inventory ".$nama." gagal direstock");
                        redirect('administrator/tambah_stocklist');
                    }
                }else{
                        $this->session->set_flashdata('error_adm', "data stock gagal ditambahkan");
                        redirect('administrator/tambah_stocklist');
                }

            }

    }
 
    public function get_kode_stocklist(){
        $total_row = $this->model_stocklist->mget_jumlah_stocklist();
        if($total_row < 1){
            $kode_stock = "stocklist_10001";
            return $kode_stock;
        }else{
            $last_id = $this->model_stocklist->mget_last_stocklist();
            $id_akumulasi = substr($last_id,10)+1;
            $kode_stock = str_pad($id_akumulasi, 15, "stocklist_", STR_PAD_LEFT);
            return $kode_stock;
        }
    }
     

}