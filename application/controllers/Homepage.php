<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */


require APPPATH . '/libraries/BaseController.php';

class Homepage extends CI_Controller
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

    public function index()
    {

//		redirect('Https://tiqs.com/maintenance.html');
		redirect('https://tiqs.blog');
    }

	public function maintenance()
	{

		redirect('Https://tiqs.com/maintenance.html');
//		redirect('https://tiqs.blog');
	}

	public function redirection($redirect)
	{
		$redirect=urldecode ( $redirect );

//		$redirect = 'Https://tiqs.com/maintenance.html';

		if ($redirect !='') {
			redirect($redirect);
		}

	}

	public function vendor($vendorId, $spotId = '')
	{
//		redirect('Https://tiqs.com/maintenance.html');

		if ($spotId ==='') {
			redirect('https://tiqs.com/alfred/make_order?vendorid=' . $vendorId);
		}

		if ($spotId !='') {
			redirect('https://tiqs.com/alfred/make_order?vendorid=' . $vendorId. '&spotid='. $spotId );
		}

	}

	public function culturehallqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=28311');
	}

	public function continuqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=28204');
	}

	public function barniniqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=28198');
	}

	public function cocktailboxqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=18716');
	}


	public function deluxeafterworkqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=26246');
	}

	public function aapgirafqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=26421');
	}


	public function goestinkqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=24888');

	}

	public function divagationqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=22144');

	}

	public function mexcalli()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=6871');

	}

	public function vitrindemoqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=9287');

	}

	public function nounasfoodbarqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=16754');

	}

	public function democrazyqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=11816');

	}

	public function viggos()
	{
		redirect('https://tiqs.com/alfred/check424/2034');
	}


	public function bardesamisbxlqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=22762');

	}

	public function nieuwithofqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=22761');

	}


	public function muziekclub_democrazyqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=19055');

	}

	public function thuishavenprty()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=5655&spotid=566');

	}

	public function lost()
	{
		redirect('https://tiqs.com/lostandfound/home');
	}

	public function optdak()
	{
		redirect('https://tiqs.com/reservations/optdak');
	}

	public function qr()
	{
		redirect('https://tiqs.com/spot/sendreservation');
	}

	public function about()
	{
		redirect('https://tiqs.news');
	}

	public function alfred()
	{
		redirect('https://tiqs.com/alfred/index.php');
	}

	public function order()
	{
		redirect('https://tiqs.com/order/index.php');
	}

	public function qrorderprint()
	{
		redirect('https://tiqs.com/order/Api/Orders/data/?mac=1');
	}

	public function shop()
	{
		redirect('https://tiqs.com/shop/index.php');
	}

	public function optdakqr()
	{
		redirect('https://tiqs.com/optdak/?vendor_id=2&spot_id=999999');
	}

	public function secretgardenqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=3491');
	}

	public function ibizaqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=418');
	}

	public function shazanna()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=877');
	}

	public function thuishavenloods()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=1162&spotid=350');
	}

	public function fitzcarraldoqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=423');
	}

	public function zvafoodqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=422');
	}

	public function zomervanantwerpenqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=421');
	}

	public function zomerfabriekqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=420');
	}

	public function bichodelasdunasqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=424');
	}

	public function levenindedekenijqr()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=1797');
	}

	public function charlatan()
	{
		redirect('https://tiqs.com/alfred/make_order?vendorid=427');
	}

	public function differentradio()
	{
		redirect('https://tiqs.com/lostandfound/check');
	}

	public function home()
	{
		redirect('https://tiqs.com/home/start');
	}

	public function privacy()
	{
		redirect('https://www.tiqs.com/alfred/legal');
	}

	public function start()
	{
		redirect('https://tiqs.com/about/us/');
	}

	public function pay()
	{
		redirect('https://tiqs.com/lostandfound/pay/1');
	}

	public function subscription()
	{
		redirect('https://tiqs.com/lostandfound/pay/3');
	}
	public function bag()
	{
		redirect('https://tiqs.com/lostandfound/home');
	}

	public function box()
	{
		redirect('https://tiqs.com/lostandfound/box');
	}

	public function kids()
	{
		redirect('https://tiqs.com/lostandfound/kids');
	}

	public function uploadsicon($icons)
	{
		redirect('https://tiqs.com/lostandfound/uploads/icons/' . $icons);
	}

	public function interesting()
	{
		redirect('https://tiqs.com/lostandfound/home');
	}

	public function arinfo()
	{
		redirect('https://tiqs.com/lostandfound/home');
	}

	public function location($location)
	{
		redirect('https://tiqs.com/lostandfound/location/' . $location);
	}

	public function registerhotel()
	{
		redirect('https://tiqs.com/lostandfound/registerhotel');
	}

	public function hotel()
	{
		redirect('https://tiqs.com/lostandfound/registerhotel');
	}

	public function ambassador()
	{
		redirect('https://tiqs.com/lostandfound/ambassador');
	}

	public function peter()
	{
		phpinfo();
	}

	public function machineinfo()
	{
		phpinfo();
	}

}

?>
