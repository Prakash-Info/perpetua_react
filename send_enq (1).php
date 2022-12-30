<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$conn = mysqli_connect("localhost", "accuhv2a_accuhealth", "9Hs&F7+wn1oC", "accuhv2a_accuhealth");

	$fullname  		= $_POST['fullname'];
	$pnumber  		= $_POST['pnumber'];
	$email_id 		= $_POST['email_id'];
	$pin_code		= $_POST['pin_code'];

	$sql = "INSERT INTO franchise_contact_form (`name`,`phone`,`email`,`pincode`,`created`) 
	VALUES ('$fullname', '$pnumber', '$email_id', '$pin_code', NOW())";
	
	$res = $conn->query($sql);
	if( $res )
      {
       //   1st form
      if ($_POST['frmName']==="top_enq_frm") {
        	$sname="<p>Hello Admin,</p><p><strong>Name :</strong> ".$fullname."</p><p><strong>Email Id :</strong> ".$email_id."</p><p><strong>Phone :</strong> ".$pnumber."</p><p><strong>Pincode :</strong> ".$pin_code."</p>"; 
        
            $mail = new PHPMailer;
            // $mail->isSMTP(true);
            // $mail->SMTPDebug = 0;
            // $mail->Host = 'mail.accuhealthlabs.com';
            // $mail->Port = 465;
            // $mail->SMTPSecure = 'SSL';
            // $mail->SMTPAuth = true;
            // $mail->Username = "care@accuhealthlabs.com";
            // $mail->Password = '@n5Afr;9[#Bg';
            $mail->setFrom('biswajit.flr@gmail.com', 'Request a Demo');
            $mail->addReplyTo('biswajit.flr@gmail.com', 'Admin');
            $mail->addAddress('biswajit.flr@gmail.com');
            $mail->AddCC('biswajit.flr@gmail.com');
            $mail->Subject = 'Accuhealthlabs Quick Enquery From Franchise';
            $mail->msgHTML("<!DOCTYPE html><body>".$sname."</body></html>");
            $mail->AltBody = 'This is a plain-text message body';                    
            if($mail->send()){
                $data['success'] = true;
                } 
                    else
                {
                $data['success'] = false;
                }
            }
          
        //   2nd form
        if ($_POST['frmName']==="btm_enq_frm") {
        	$sname="<p>Hello Admin,</p><p><strong>Name :</strong> ".$fullname."</p><p><strong>Email Id :</strong> ".$email_id."</p><p><strong>Phone :</strong> ".$pnumber."</p><p><strong>Pincode :</strong> ".$pin_code."</p>"; 
        
            $mail = new PHPMailer;
            // $mail->isSMTP(true);
            // $mail->SMTPDebug = 0;
            // $mail->Host = 'mail.accuhealthlabs.com';
            // $mail->Port = 465;
            // $mail->SMTPSecure = 'SSL';
            // $mail->SMTPAuth = true;
            // $mail->Username = "care@accuhealthlabs.com";
            // $mail->Password = '@n5Afr;9[#Bg';
            $mail->setFrom('biswajit.flr@gmail.com', 'Request a Demo');
            $mail->addReplyTo('biswajit.flr@gmail.com', 'Admin');
            $mail->addAddress('biswajit.flr@gmail.com');
            $mail->AddCC('biswajit.flr@gmail.com');
            $mail->Subject = 'Accuhealthlabs Get In Touch From Franchise';
            $mail->msgHTML("<!DOCTYPE html><body>".$sname."</body></html>");
            $mail->AltBody = 'This is a plain-text message body';                    
            if($mail->send()){
                $data['success'] = true;
                } 
                    else
                {
                $data['success'] = false;
                }
            }
    
    echo json_encode($data);
}

?>