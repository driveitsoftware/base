<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */


require APPPATH . '/libraries/BaseController.php';

class ID extends CI_Controller
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

	public function index($code)
	{
		redirect('https://tiqs.com/lostandfound/check/'.$code);
	}


//	public function lost()
//	{
//		redirect('https://tiqs.com/lostandfound/home');
//	}
//
//
//	public function about()
//	{
//		redirect('https://tiqs.com/about/us');
//	}
//
//	public function alfred()
//	{
//		redirect('https://tiqs.com/alfred/index.php');
//	}
//
//	public function shop()
//	{
//		redirect('https://tiqs.com/shop/index.php');
//	}
//
//	public function shazanna()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=877');
//	}
//
//	public function thuishavenloods()
//	{
////		redirect('https://tiqs.com/alfred/make_order?vendorid=5655&spotid=566');
//		redirect('https://tiqs.com/alfred/make_order?vendorid=1162&spotid=350');
//	}
//
//	public function fitzcarraldoqr()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=423');
//	}
//
//	public function zvafoodqr()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=422');
//	}
//
//	public function zomervanantwerpenqr()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=421');
//	}
//
//	public function zomerfabriekqr()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=420');
//	}
//
//
//	public function bichodelasdunasqr()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=424');
//	}
//
//	public function levenindedekenijqr()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=1797');
////		https://tiqs.com/alfred/check424/1797
////		redirect('https://tiqs.com/alfred/check424/1797');
//
//	}
//
//	public function charlatan()
//	{
//		redirect('https://tiqs.com/alfred/make_order?vendorid=427');
////		redirect('https://tiqs.com/charlatanqr/index.php/?vendor_id=2&spot_id=999999');
//	}
//
//	public function differentradio()
//	{
//		redirect('https://tiqs.com/lostandfound/check');
//	}
//
//	public function home()
//	{
//		redirect('https://tiqs.com/home/start');
//	}
//
//	public function privacy()
//	{
//		redirect('https://www.tiqs.com/alfred/legal');
//	}
//
//	public function start()
//	{
//		redirect('https://tiqs.com/about/us/');
//	}
//
//	public function pay()
//	{
//		redirect('https://tiqs.com/lostandfound/pay/1');
//	}
//
//	public function subscription()
//	{
//		redirect('https://tiqs.com/lostandfound/pay/3');
//	}
//	public function bag()
//	{
//		redirect('https://tiqs.com/lostandfound/home');
//	}
//
//	public function box()
//	{
//		redirect('https://tiqs.com/lostandfound/box');
//	}
//
//	public function kids()
//	{
//		redirect('https://tiqs.com/lostandfound/kids');
//	}
//
//	public function uploadsicon($icons)
//	{
//		redirect('https://tiqs.com/lostandfound/uploads/icons/' . $icons);
//	}
//
//	public function interesting()
//	{
//		redirect('https://tiqs.com/lostandfound/home');
//	}
//
//	public function arinfo()
//	{
//		redirect('https://tiqs.com/lostandfound/home');
//	}
//
//	public function location($location)
//	{
//		redirect('https://tiqs.com/lostandfound/location/' . $location);
//	}
//
//	public function registerhotel()
//	{
//		redirect('https://tiqs.com/lostandfound/registerhotel');
//	}
//
//	public function hotel()
//	{
//		redirect('https://tiqs.com/lostandfound/registerhotel');
//	}
//
//	public function ambassador()
//	{
//		redirect('https://tiqs.com/lostandfound/ambassador');
//	}
//
//	public function machineinfo()
//	{
//		phpinfo();
//	}
//
//	public function redirection($redirect)
//	{
//		$redirect=urldecode ( $redirect );
//		if ($redirect !='') {
//			redirect("https://".$redirect);
//		}
//
//	}
//
//	public function vendor($vendorId, $spotId = '')
//	{
////		var_dump($vendorId);
////		var_dump($spotId);
////		die();
//		if ($spotId ==='') {
//			redirect('https://tiqs.com/alfred/make_order?vendorid=' . $vendorId);
//		}
//
//		if ($spotId !='') {
//			redirect('https://tiqs.com/alfred/make_order?vendorid=' . $vendorId. '&spotid='. $spotId );
//		}
//
//	}


}

?>
