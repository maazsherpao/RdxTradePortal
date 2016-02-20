<link href="assets/css/core.css" rel="stylesheet" type="text/css" />
<link href="assets/css/components.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
<?php
session_start();
require_once "config.php";
$id = $_GET['id'];

$stmt = $db_con->prepare("SELECT * FROM customers WHERE id = :id");
$stmt->execute(array(":id"=>$id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $result['email'];
$first_name = $result['first_name'];
//$user_password = $_SESSION['ref'];
 function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

         $user_password = randomPassword();
         $password  = sha1($user_password);

         $stmt1 = $db_con->prepare("UPDATE customers SET password = :password WHERE id = :id");
         $stmt1->execute(array(":password"=>$password,":id"=>$id));

         $to = "{$email}";
         $subject = 'Acount Confirmation';
         
         $message = "<h2>Congratulations {$first_name}</h2>";
         $message .= "<p>Your account has been successfully confirmed, please visit the following link to login.</p>";
         $message .= "<p><a class='btn btn-primary' href='http://trade.thefitness.co.uk/login' target=_blank>http://trade.thefitness.co.uk/login</a></p>";
         $message .= "<p>Username: {$email}</p>";
         $message .= "<p>Password: {$user_password}</p>";

         
         $message .= "<p>Please be noted that our trade hours are Monday to Friday, 9:00AM - 5:00PM UTC.</p>";
         $message .= "<p></p><p></p>";
         $message .= "<p>Warm Regards</p>";
         $message .= "<p>Team Business Development</p>";
         $message .= "<p>RDX</p>";
         $message .= "<p>E: trade@rdxsports.com</p>";
         $message .= "<p>P: +44 (0) 161 660 8876</p>";

         $headers = 'To:'.$first_name  ."\r\n";
         $header .= 'From:RDX SPORT <trade@rdxsports.com>' ."\r\n";
         $header .= 'Cc:trade@rdxsports.com' ."\r\n";
         $header .= 'MIME-Version: 1.0' ."\r\n";
         $header .= 'Content-type: text/html' ."\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
         	$stmt = $db_con->prepare("UPDATE customers SET confirm = 1,is_active = 1 WHERE id = :id");
         	$stmt->execute(array(":id"=>$id));

            header("location:customers.php");
         }else {
            echo "Message could not be sent...";
         }

  // header("location:customers.php");



?>