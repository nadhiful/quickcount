<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
//Get Kode
//=========================================================================//

public function getKodeKecamatan()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_kecamatan,2)) as kd_max from kecamatan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%02s", $tmp);
            }
        }
        else
        {
            $kd = "01";
        }
        return "MGTNKCM".$kd;
    }
//=======================================================================//	

	public function load_village($note,$id)
	{
		if ($note == "l_des") {
			$hasil = $this->db->select('*')
							  ->from('desa')
							  ->get();
			if($hasil->num_rows() > 0){
				$des = $hasil->result();
				return $des;
			}else{
				 return array();
			}
		}
	}

	public function load_district($note,$id)
	{
		if ($note == "l_kecamatan") {
			$hasil = $this->db->get('kecamatan');
			if ($hasil->num_rows() > 0 ) {
				return $hasil->result();
			}else{
				return array();
			}
		}
	}
	public function insert_data($value)
	{
		if ($value="add_district") {
			$data=array(
					       'kd_kecamatan'		=>$this->input->post('kd_kecamatan'),
					       'nama_kecamatan'	=>$this->input->post('nama')
	        			);
        		if ($this->db->insert('kecamatan', $data))
        		{
                	echo "YES";
           		}
          		  else
	            {
	                echo "NO";
	            }
		}
	}


	public function update_data($value)
	{
		if ($value="update_district") {
			$id_kecamatan 	= $this->input->post('kd_kecamatan');
			$data=array(
					        'nama_kecamatan'	=>$this->input->post('kd_nama')
	        			);
        	var_dump($value);
        	// $this->db->where('kd_kecamatan', $id_kecamatan)
        	// 		 ->update('kecamatan',$data);       	
		}
	}



}

/* End of file  */
/* Location: ./application/models/ */