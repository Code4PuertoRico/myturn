<?php

$host= getenv('OPENSHIFT_HOMEDIR');

require("PHPMailer/class.phpmailer.php");

$list = file_get_contents($host."app-root/repo/php/list.txt");
$array = explode("\n", $list);


foreach($array as $person){
	if($person == "")
		continue;
	$info = explode(" ",$person);
	    $mail = new PHPMailer();
	    $mail->IsSMTP();
	    $mail->SMTPAuth = true;
	    $mail->Host     = "ssl://smtp.gmail.com";
	    $mail->Port     = 465;
	    $mail->Username = "myturn.pr@gmail.com";
	    $mail->Password = "**************";
	    $mail->FromName = "Myturn";
	    $mail->Subject  = "Your Turn";
	    $mail->Body     = "Your Turn is close $info[2]";	
   	    $mail->AddAddress("$info[0]@$info[1]");
    if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo "Message has been sent : $info[0] \n";
    }
}
?>
