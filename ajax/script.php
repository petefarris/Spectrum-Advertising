<?php 
if(isset($_REQUEST)){

//0. Define Function:: 

//1. Set post data 
$emailErr = $fnameErr = $stackErr = $messageErr = "";
$check = false; 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (empty($_POST['name'])) {
    $fnameErr = "Name is required \n";
    echo $fnameErr;
    $check = true;  
  } else {
    $name =  test_input($_POST['first_name']); 
  }

if (empty($_POST['email_address'])) {
    $emailErr = "Email Address is required \n";
    echo $emailErr;
    $check = true;  
  } else {
    $email_address = test_input($_POST['email_address']); 
  }
    
if (empty($_POST['stack'])) {
    $stackErr = "Billboard Stack is not selected";
    echo $stackErr;
    $check = true;  
  } else {
    $stack = test_input($_POST['stack']); 
  }
    
if (empty($_POST['message'])) {
    $messageErr = "Please enter email message";
    echo $messageErr;
    $check = true;  
  } else {
    $message = test_input($_POST['message']); 
  }

// PREPARE THE BODY OF THE MESSAGE

//2. Check Validaty::

if (!$check){ 
			$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) ." </td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email_address']) . "</td></tr>";
			$message .= "<tr><td><strong>Billboard Stack Desired: </strong> </td><td>" . strip_tags($_POST['stack']) . "</td></tr>";
            $message .= "<tr><td><strong>Message: </strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
			
			//  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
			
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
            if (preg_match($pattern, trim(strip_tags($_POST['email_address'])))) { 
                $cleanedFrom = trim(strip_tags($_POST['email_address'])); 
            } else { 
	            $check = true; 
                echo "The email address you entered was invalid. Please try again!"; 
            } 

			// Send Email: 
			
			       //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
             
			$to = 'pfarris@spectrumcapitalre.com';
			
			$subject = 'Spectrum Advertising :: Online Inquiry';
			
			$headers = "From: ".$_POST['email_address']. "\r\n";
			$headers .= "Reply-To: ".$_POST['email_address']. "\r\n";
			$headers .= "Bcc: pfarris@spectrumcapitalre.com \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            if (mail($to, $subject, $message, $headers)) {
				return 'Inquiry Successful'; 
            } else {
	          $check = true; 
              return 'There was a problem sending the email.';
            }
} 




}
?>