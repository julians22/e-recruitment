<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class calKaryawan extends CI_Model {

    public function list()
    {
        return $this->db->get('tbl_calon_karyawan')->result_array();
	}
	
	public function getByEmail($data)
	{
		return $this->db->get_where('tbl_calon_karyawan', ['email' => $data])->row_array();
	}

}

/* End of file calKaryawan.php */
