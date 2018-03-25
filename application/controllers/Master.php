<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>');
	}

//Bagian Load Fungsi Index
public function index()
	{
		$data = array(
						'isi' 			=> 'master/dashboard',
						'title'			=> 'Halaman Awal',
						'label'			=> 'Dashboard'
					);
		$this->load->view('layout/wrapper', $data);
	}
//Part Related With Data Village
public function village()
	{
		$id 	=	0;
		$data = array(
						'title_id'		=> 'ID Polis',
						'isi' 			=> 'master/village/index',
						'data'			=>	$this->Master_model->load_village("l_desa",$id),
						'title'			=> 'Daftar Desa',
						'label'			=> 'Data Desa'
					);
		$this->load->view('layout/wrapper', $data);
	}

	public function add_village()
	{
		$data = array(
						'isi' 			=> 'master/village/add',
						'title'			=> 'Tambah Desa',
						'label'			=> 'Tambah Data Desa'
					);
		$this->load->view('layout/wrapper', $data);
	}
//End Part With Data District
//===============================================//
//Part Related With Data District
public function district()
	{
		$id   = 0;
		$data = array(
						'isi' 			=> 'master/district/index',
						'data'			=>	$this->Master_model->load_district("l_kecamatan",$id),
						'id_kecamatan'	=> 	$this->Master_model->getKodeKecamatan(),
						'title'			=> 'Daftar Desa',
						'label'			=> 'Data Desa'
					);
		$this->load->view('layout/wrapper', $data);
	}

	public function add_district()
	{
		//set validation rules
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        //run validation check
        if ($this->form_validation->run() == FALSE)
        {   //validation fails
            echo validation_errors();
        }else{
        		$this->Master_model->insert_data("add_district");
        }
	}

	public function update_district()
	{
		//set validation rules
        $this->form_validation->set_rules('kd_nama', 'Nama', 'trim|required');
        //run validation check
        if ($this->form_validation->run() == FALSE)
        {   //validation fails
            // $data=array(
            // 				'kd_kecamatan'		=>$this->input->post('id_kecamatan'),
					       //  'nama_kecamatan'	=>$this->input->post('kd_nama')
	        			// );
            // var_dump($data);
            echo validation_errors();
        }else{
        	 // $data=array(
          //   				'kd_kecamatan'		=>$this->input->post('id_kecamatan'),
					     //    'nama_kecamatan'	=>$this->input->post('kd_nama')
	        	// 		);
          //   var_dump($data);
        $this->Master_model->update_data("update_district");	 	
        }
	}



//End Part With Data District
//===============================================//
//Part Related With Data Candidate
	public function candidate()
	{
		$data = array(
						'isi' 			=> 'master/candidate/index',
						'data_village'	=>	$this->Master->load_candidate(),
						'title'			=> 'Daftar Calon',
						'label'			=> 'Data Calon'
					);
		$this->load->view('layout/wrapper', $data);
	}

	public function add_candidate()
	{
		$data = array(
						'isi' 			=> 'master/candidate/add',
						'title'			=> 'Tambah Kandidat',
						'label'			=> 'Tambah Data Kandidat'
					);
		$this->load->view('layout/wrapper', $data);
	}	
//End Part of Data Candidate	
//===============================================//
//Part Related With Data Officer
	public function officer()
	{
		$data = array(
						'isi' 			=> 'master/officer/index',
						'data_village'	=>	$this->Master->load_officer(),
						'title'			=> 'Daftar Petugas',
						'label'			=> 'Data Petugas'
					);
		$this->load->view('layout/wrapper', $data);
	}

	public function add_officer()
	{
		$data = array(
						'isi' 			=> 'master/officer/add',
						'title'			=> 'Tambah Petugas',
						'label'			=> 'Tambah Data Petugas'
					);
		$this->load->view('layout/wrapper', $data);
	}	
//End Part of Data Officer	


}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */