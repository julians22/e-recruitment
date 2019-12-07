<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('calKaryawan');
	}
	
	

	public function index()
	{
		$data['title'] = 'E-Recruirtment';
		$data['calon'] = $this->calKaryawan->list();
		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}

	public function insert()
	{
		$token = base64_encode(random_bytes(10));
		$tanggalInput = date_create($this->input->post('tanggal'));
		$tanggal = date_format($tanggalInput, "Y-m-d");
		
		
		$data = [
			'nama_lengkap' 	=> $this->input->post('nama'),
			'email' 		=> $this->input->post('email'),
			'posisi'		=> $this->input->post('posisi'),
			'telepon' 		=> $this->input->post('no'),
			'tanggal_hadir' => $tanggal,
			'token' 		=> $token
		];

		$this->db->insert('tbl_calon_karyawan', $data);
		$this->_sendEmail($data);
	}

	private function _sendEmail($data)
	{
		$data['calon'] = $this->calKaryawan->getByEmail($data['email']);
		
		$config = [
			'mailtype'		=> 'html',
			'charset'		=> 'utf-8',
			'protocol' 		=> 'smtp',
			'smtp_host'		=> 'ssl://smtp.googlemail.com',
			'smtp_user'		=> 'deanabne2212@bsi.ac.id',
			'smtp_pass'		=> 'dajulian22',
			'smtp_timeout' 	=> '8',
			'smtp_port'		=> 465,
			'newline'		=> "\r\n"
		];
		//load library email dan konfigurasinya
		$this->load->library('email');
		$this->email->initialize($config);
		
		//email pengirim dan nama
		$this->email->from('dean@bsi.com', 'Dean Abner Julian');

		//email penerima
		$this->email->to($this->input->post('email'));

		//subject email
		$this->email->subject('Undangan Interview');

		//isi pesan ambil dari views dan masukkan beberapa data ke dalam views
		$body = $this->load->view('isiemail', $data,TRUE);
		$this->email->message($body);
		//kirim email
		$this->email->send();
		
		$this->email->print_debugger();

		//alihkan ke function list
		redirect('home/index');
	}

}

/* End of file Home.php */

