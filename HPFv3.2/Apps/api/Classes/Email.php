<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends PHPMailer{
    public function __construct(){
    	$this->isSMTP();
	    $this->Host = 'server2.intelhost.com.my';
	    $this->SMTPAuth = true;
	    $this->Username = 'admin@mypro-intelligent.com';
	    $this->Password = '#MxYxPxRxOx#';
	   	$this->SMTPSecure = 'tls';
	    $this->Port = 25;
	    
	    $this->setFrom('admin@mypro-intelligent.com', 'Intelligent Ecommerce');
	    //$this->addBCC('intelhost2u@gmail.com');
		
		// $x = email_template::getBy(["e_status" => 0]);
		// foreach($x as $ccemail){
			// $cc = ccmail::getBy(["cc_code" => $ccemail->e_id]);
			// if(count($cc) > 0){
				// $cc = $cc[0];
// 				
				// $addresses = explode(',', $cc->cc_email);
				// foreach ($addresses as $address) {
				     // $this->addBCC($address);
				// }
			// }
		// }
	    //$this->addAddress('intelhost2u@gmail.com', 'Information');
	    
	    $this->isHTML(true);
	    $this->Subject = "Email from Email Engine in Intelligent Ecommerce.";
	    $this->Body    = "Email by PHPMailer says Hello! If you get this email, this mean there's something goes wrong. We are developing it while you using it maybe?";
	    $this->AltBody = 'Please view this email using HTML email client';
    	
	}
	public function setTemplate($template, $settings = []){
		$xn = DB::conn() -> query("SELECT * FROM email_template WHERE e_code = ? ", ["e_code" => $template])-> results();
		
		if(count($xn) > 0){
			$xn = $xn[0];
			
			$xx = $xn->e_content;
			
			foreach($settings as $key => $val){
				$xx = str_replace($key, $val, $xx);
			}
			
			$addresses = explode(',', $xn->e_ccmail);
			foreach ($addresses as $address) {
			     $this->addBCC($address);
			}
			
			$this->Body = $xx;
		}else{
			die("Template File Not Found");
		}
	}
	
	public function setTemplateNew($template, $settings = []){
		$x = DB::conn() -> query("SELECT * FROM email_template WHERE e_code = ? ", ["e_code" => $template])-> results();
		
		if(count($x) > 0){
			$x = $x[0];
			$bcc = DB::conn() -> query("SELECT * FROM ccmail WHERE cc_code = ? ", ["cc_code" => $x->e_id])-> results();
			
			if(count($bcc) > 0){
				$bcc = $bcc[0];
				$addresses = explode(',', $bcc->cc_email);
				foreach ($addresses as $address) {
				     $this->addBCC($address);
				}
			}
			
			$xx = ($x->e_content);
			
			foreach($settings as $key => $val){
				$xx = str_replace($key, $val, $xx);
			}
			
			$this->Body = $xx;
		}else{
			die("Template File Not Found");
		}
	}
}

?>