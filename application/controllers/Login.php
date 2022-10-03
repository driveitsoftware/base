<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */


require APPPATH . '/libraries/BaseController.php';

class Login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('user_model');

    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {


        redirect('https://tiqs.com/public/');

        $this->load->library('session');
        $this->isLoggedIn();

    }


    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
    
    /**
     * This function used to logged in user
     */
        public function loginMe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');

            $result = $this->login_model->loginMe($email, $password);

            if(!empty($result))
            {
                if($result->active==0) {

                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('code', 'code to activate your account, received by e-mail and/or SMS', 'required|max_length[32]');

                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('code');
                    }

                }
                    else
                {

                    $lastlogin = $this->login_model->lastLoginInfo($result->userId);

                    $sessionArray = array('userId' => $result->userId,
                        'role' => $result->roleId,
                        'roleText' => $result->role,
                        'name' => $result->name,
                        // volgens mij gaat hier iets mnis met de datum/tijd.
                        // wanneer een variable ongedeclareert is dan moeten er ''' omheen.
                        'lastLogin' => $lastlogin > 'createdDtm',
                        'isLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                    $loginInfo = array("userId" => $result->userId, "sessionData" => json_encode($sessionArray), "machineIp" => $_SERVER['REMOTE_ADDR'], "userAgent" => getBrowserAgent(), "agentString" => $this->agent->agent_string(), "platform" => $this->agent->platform());

                    $this->login_model->lastLogin($loginInfo);

                    redirect('/dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');

                $this->index();
            }
        }
    }


    public function loginMeAuto($email, $password)
    {
            // destrou sessions... for purpose of clean code
            //  $this->session->sess_destroy();

            $result = $this->login_model->loginMe($email, $password);

            if(!empty($result))
            {
                // is account active?
                if(!$result->active) {

                    $this->session->set_flashdata('fail', 'Your account needs to be activated.');

                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email');

                    if ($this->form_validation->run() == FALSE) {
                        $this->loginMe();
                    } else {


                    }
                }
                else {
                    $lastlogin = $this->login_model->lastLoginInfo($result->userId);

                    $sessionArray = array('userId' => $result->userId,
                        'role' => $result->roleId,
                        'roleText' => $result->role,
                        'name' => $result->name,
                        'lastLogin' => $lastlogin > 'createdDtm',
                        'isLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                    $loginInfo = array("userId" => $result->userId, "sessionData" => json_encode($sessionArray), "machineIp" => $_SERVER['REMOTE_ADDR'], "userAgent" => getBrowserAgent(), "agentString" => $this->agent->agent_string(), "platform" => $this->agent->platform());

                    $this->login_model->lastLogin($loginInfo);

                    redirect('/dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');

                $this->index();
            }
    }


    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('forgotPassword');
        }
        else
        {
            redirect('/dashboard');
        }
    }




    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));
            
            if($this->login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo->name;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;

        
        if ($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password reset successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password reset failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }

   function actemail($email, $password)
    {
        //generate simple random code
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 5);

        // hier de juiste user vinden.

        $result = $this->user_model->checkUserExists($email);

        if(!empty($result))

        {


            //getUserInfoByMail
            $userId = $result->userid;
            $data['code'] = $code;
            $data['active'] = false;
            $this->user_model->editUser($data, $userId);
            $this->session->set_flashdata('success', 'New User created successfully');

            // send mail message with code
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => '<a href="mailto:pnroos1964@gmail.com" rel="nofollow">pnroos1964@gmail.com</a>', // change it to yours
                'smtp_pass' => 'N#ld#rt01@!', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>
							<p>Password: ".$password."</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."user/activate/".$userId."/".$code."'>Activate My Account</a></h4>
						</body>
						</html>
						";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject('Signup Verification Email');
            $this->email->message($message);

            //sending email
            if($this->email->send()){
                $this->session->set_flashdata('message','Activation code sent to email');
            }
            else{
                $this->session->set_flashdata('message', $this->email->print_debugger());

            }

            $this->loginMeAuto($email,$password);

        }

        else
        {
            // hier message geven dat de e-mail nog niet bestaat
            $this->session->set_flashdata('error', 'User creation failed, try it again');
            redirect("/login/register");
        }

    }

    public function register()
    {
        // not yet, but nescessary to put spomething in for not registering at this moment

        $d=strtotime("now");
        $e=strtotime("June 1 2019");

        if($d < $e) {

            $this->session->set_flashdata('error', 'At this moment you can pre-register through: sales@tiqs.com. Shop opens 4th of July!');
            redirect("/login");
        }

        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->library('session');

        $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        // $this->form_validation->set_rules('role','Role','trim|required|numeric');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        }else{
            if($this->user_model->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('error', 'We already know you, please reset password (forgot password) or use other e-mail address to (register)');
                // $this->session->set_flashdata('flash_message', 'User email already exists');
                redirect("/login");
            }else{

                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $password = $this->input->post('password');
                // default set for register
                // $roleId = $this->input->post('role');
                $selector = $this->input->post('selector');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $roleId=2; // role user 2= vendor 1=administrator 3=employee
                $vendorId=9;  // created by = 9 = register online by the system.
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'username'=> $name,
                    'mobile'=>$mobile, 'createdBy'=>$vendorId, 'createdDtm'=>date('Y-m-d H:i:s' ), 'istype'=>$selector );

                $result = $this->user_model->registernew($userInfo);

                if($result > 0) {
                    $this->actemail($email, $password);

                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                    redirect("/login");
                }

                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));



            };
        }
    }



}

?>