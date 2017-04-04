<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once APPPATH."third_party/User_Auth.php";

class Userreport{
  var $CI;
  public function __construct($params = array())
  {
        $this->CI =& get_instance();    
  }

  	public function flashdata_report($pesan){


        // $flashdata_sukses = ( '</br><h2 class="text-center"><span class="label label-success">'.$pesan.'</span></h2></br>');
                            
        $flashdata_sukses = ( '<div class="col-md-offset-4 col-md-4 col-md-offset-4">
                                <div class="alert alert-info" role="alert"> 
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>'.$pesan.'</strong>
                                </div>
                              </div>' );


        // $flashdata_error = ( '</br><h2 class="text-center"><span class="label label-warning">'.$pesan.'</span></h2></br>');
                            
        $flashdata_error = ( '<div class="col-md-offset-4 col-md-4 col-md-offset-4">
                                <div class="alert alert-danger" role="alert"> 
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>'.$pesan.'</strong>
                                </div>
                              </div>' );

        $flashdata_sukses_adm = ( '<div class="col-md-12">
                                <div class="alert alert-info" role="alert"> 
                                  <strong>'.$pesan.'</strong>
                                </div>
                              </div>' );


        // $flashdata_error = ( '</br><h2 class="text-center"><span class="label label-warning">'.$pesan.'</span></h2></br>');
                            
        $flashdata_error_adm = ( '<div class="col-md-12">
                                <div class="alert alert-danger" role="alert"> 
                                  <strong>'.$pesan.'</strong>
                                </div>
                              </div>' );   

        $flashdata_error_form = $pesan;                             

        $report = array('sukses' => $flashdata_sukses,
                        'error' => $flashdata_error,
                        'sukses_adm' => $flashdata_sukses_adm,
                        'error_adm' => $flashdata_error_adm,
                        'error_form'=> $flashdata_error_form);

        return $report;
    }

    public function call_flashdata_report(){   
      if($this->CI->session->flashdata('error')){
          $pesan = $this->CI->session->flashdata('error');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['error'];
      }else if($this->CI->session->flashdata('sukses')){
          $pesan = $this->CI->session->flashdata('sukses');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['sukses'];
      }else if($this->CI->session->flashdata('error_adm')){
          $pesan = $this->CI->session->flashdata('error_adm');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['error_adm'];
      }else if($this->CI->session->flashdata('sukses_adm')){
          $pesan = $this->CI->session->flashdata('sukses_adm');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['sukses_adm'];
      } else if($this->CI->session->flashdata('error_form')){
          $pesan = $this->CI->session->flashdata('error_form');
          $call_template = $this->flashdata_report($pesan);
          return $call_template['error_form'];
      } 
    }

}