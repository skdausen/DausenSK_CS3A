<?php
session_start();
include('smtp/PHPMailerAutoload.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="send-otp.css">
</head>
<body>

<?php
// Function to send email
function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "gironellajose09@gmail.com"; // Sender's Email
    $mail->Password = "kvaz buye wegt ycju"; // App password
    $mail->SetFrom("gironellajose09@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    return $mail->Send();
}


if (isset($_POST['send_otp'])) {
    $email = $_POST['email'];
    $otp = rand(100000, 999999);
    $_SESSION['email'] = $email;
    $_SESSION['otp'] = $otp;

    $subject = "Email Verification";
    $body = "Your 6 Digit OTP Code: <b>$otp</b>";

    if (smtp_mailer($email, $subject, $body)) {
        echo "<script>alert('OTP sent to $email');</script>";  
        echo "<form method='post' class='otp-form'>
                <label>Enter OTP:</label><br>
                <input type='number' name='entered_otp' required>
                <br><br>
                <input type='submit' name='verify_otp' value='Verify OTP'>
              </form>";
    } else {
        echo "<p class='error'>Failed to send OTP. Please try again.</p>";
    }
}


elseif (isset($_POST['verify_otp'])) {
    $enteredOtp = $_POST['entered_otp'];
    if ($_SESSION['otp'] == $enteredOtp) {
        echo "<script>alert('OTP Verified Successfully!');</script>";  
        header("Location: ../feed.php");
    } else {
        echo "<p class='error'>Invalid OTP. Please try again.</p>";
    }
}


else {
    echo "<form method='post' class='email-form'>
            <label>Enter your email:</label><br>
            <input type='email' name='email' required>
            <br><br>
            <input type='submit' name='send_otp' value='Send OTP'>
          </form>";
}
?>

</body>
</html>
