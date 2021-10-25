<?php 
class Contact{
    
    public function contact_us($data){
        $fname=$data['name'];
        $email=$data['email'];
        $phone=$data['phone'];
        $message=$data['message'];
        $body="One message received from Gadget Shop contact us. details are below..<br> Name=$fname <br> Email=$email <br> Phone=$phone <br> Message=$message <br>";
        return $this->sent_mail("undercovermessage@gmail.com", "Message received from Gadget Shop", $body);
    }
    
    public function sent_mail($to,$subject,$body){
        $mailFromName="Gadget Shop";
        $mailFrom="undercovermessage@gmail.com";

        //Mail Header
        $mailHeader = 'MIME-Version: 1.0'."\r\n";
        $mailHeader .= "From: $mailFromName <$mailFrom>\r\n";
        $mailHeader .= "Reply-To: $mailFrom\r\n";
        $mailHeader .= "Return-Path: $mailFrom\r\n";
        $mailHeader .= 'X-Mailer: PHP'.phpversion()."\r\n";
        $mailHeader .= 'Content-Type: text/html; charset=utf-8'."\r\n";

        //Email to Admin
        if(mail($to, $subject, $body, $mailHeader)){
            return true;
        }else{
            return false;
        }
    }
}

?>