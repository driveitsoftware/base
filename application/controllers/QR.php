<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class QR extends BaseController
{

	public function __construct()
	{
		parent::__construct();
	}


    public function index($code='')
	{
		if($code == ""){
			redirect('https://tiqs.com/pageqr');
		}

//		var_dump($code);
//		die();


		$QRcode=urldecode ( $code );
		$this->db->select('*')->from('tbl_qrcodes')->where('code', $code);
		$query = $this->db->get();
		$result = $query->row();

		if ($result->spot ==='') {
			if ($result->vendorId != 0){
				redirect('https://tiqs.com/alfred/make_order?vendorid=' . $result->vendorId);
			}
			elseif($result->vendorId === 0)
			{
				redirect('https://tiqs.com/showqr/'.$result->id);
			}
		}

		if ($result->spot !='') {
			redirect('https://tiqs.com/alfred/make_order?vendorid=' . $result->vendorId. '&spotid='. $result->spot );
		}

		redirect('https://tiqs.com/showqr/'.$result->id);

	}
}

?>
