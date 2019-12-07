<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->library('calendar');
		echo $this->calendar->generate();
	}

}

/* End of file Test.php */

?>
