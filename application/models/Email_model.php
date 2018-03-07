<?php 

class Email_model extends CI_Model {

	public function __construct(){

		parent::__construct();

		

	}

	public function index(){

	

	}



	public function sendMail($to,$subject, $html1){

		// date_default_timezone_set('UTC');



		$from = "support@shubhyatracabs.in";

		$this->load->library('email');

	//	$config['protocol'] = "sendmail";
		$config['useragent'] = 'Hude Labs Mailer';
		$config['protocol'] = 'smtp';

		// $config['smtp_host'] =  'smtp.mandrillapp.com';
		$config['smtp_crypto'] =  'tls';
		
		$config['smtp_host'] =  'mail1.omailo.com';

		$config['smtp_user'] =  'mailer@shubhyatracabs.in';

		$config['smtp_pass'] = 'WkNZ56F-VDu5e-Cne0eMkA';

		$config['smtp_port'] = '587';

		$config['charset'] = 'UTF8';

		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$this->from = 'ShubhYatraCabs';

		$this->from_email = 'support@shubhyatracabs.in';

		$this->email->clear();

		$this->email->set_newline("\r\n");

		$this->email->from($this->from_email, $this->from);

		$this->email->reply_to($this->from, $this->from_email);

		//$this->email->reply_to($this->from, $this->from_email);

		$this->email->to($to);

		$email_nosend[] = "abhishekyagnik@yahoo.com";
		$email_nosend[] = "info@shubhyatracabs.in";

		if( !in_array($to, $email_nosend) ){

			$this->email->bcc(''); 

			//$this->email->bcc('abhishekyagnik@yahoo.com');

		}

		$this->email->subject($subject);

		$this->email->message($html1);	
		

		

		if ( ! $this->email->send())

		{

		     show_error($this->email->print_debugger())."<br>";

		 }

		//else

    	//	echo 'Your e-mail has been sent!<br>';

			// if(!isset($html1['orderid'])){ $html1['orderid'] = '';}

			// if(!isset($html1['uid'])){ $html1['uid'] = '';}

			// if(!isset($html1['itemid'])){ $html1['itemid'] = '';}

			// $emaildata = array(

			// 	'email_subject'=> $subject,

			// 	'email_body'=> $html,

			// 	'email_orderid'=> $html1['orderid'],

			// 	'email_itemid'=> $html1['itemid'],

			// 	'email_userid' => $html1['uid'],

			// 	'email_email' => $to,

			// 	'email_datetime' => $this->now(),



			// 	);

   //  	 	$this->saveEmail($emaildata);

			// return true;



		}



}