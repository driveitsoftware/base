<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */


require APPPATH . '/libraries/BaseController.php';

class Showqr extends BaseController
{
	/**
	 * This is default constructor of the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 */

    public function index($id)
    {
		$data['id'] = $id;
		$this->global['pageTitle'] = 'QRcode number';
		$this->loadViews("404qr", $this->global, $data, NULL);
    	//		redirect('https://tiqs.news');
    }


}

?>
