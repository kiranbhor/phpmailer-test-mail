
<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "vendor/autoload.php";

$emailData = array();
$emailData['mailTo'] = "kiranbhor05@gmail.com";
$emailData['mailFromNickName'] = "alPHa Support";
$emailData['mailSubject'] = 'Your registration has been saved successfully.';
$emailData['mailFrom'] = 'alpha.support@symbal.com';
$emailData['mailBody'] = 'Hello kiran,<br><br>
                Today at ' . date('H:i:s', time()) . ', we received a password reset request.<br>
                Please click the link <a href="test">HERE</a> to reset your password.  .<br><br>
                If this request was not initiated by you, please ignore the message.<br><br>
                The link provided will be expired in 24 hours.<br><br>
                Thank You,<br>
                alPHa Support.
                ';

sendEmail($emailData);

function sendEmail($mailOptions = array(), $con = "")
{

    $smtpName = "smtp.mailtrap.io"; #"localhost";
    $smtpHost = "smtp.mailtrap.io"; #"smtp.office365.com";
    $smtpPort = 587;
    $smtpConnectionClass = "plain";
    $smtpUsername = "5f419396c0b4af"; #"alpha.support@symbal.com";
    $smtpPassword = "bd1c04e592e2b5"; #"bpUQgsd6nzrstTe";
    $smtpSsl = "tls";
    $mailBody = "Test Mail from MITR";
    $mailFrom = "actelionregenapps@gmail.com";
    $mailSubject = "Test Mail from MITR";
    $mailFromNickName = "Actelion";
    $mailTo = "kiranbhor05@gmail.com";
    $mailSenderType = "user";

    if (array_key_exists('mailTo', $mailOptions)) {
        $mailTo = $mailOptions['mailTo'];
    }
    if (array_key_exists('mailCc', $mailOptions)) {
        $mailCc = $mailOptions['mailCc'];
    }

    if (array_key_exists('mailFrom', $mailOptions)) {
        $mailFrom = $mailOptions['mailFrom'];
    }
    if (array_key_exists('mailFromNickName', $mailOptions)) {
        $mailFromNickName = $mailOptions['mailFromNickName'];
    }
    if (array_key_exists('mailSubject', $mailOptions)) {
        $mailSubject = $mailOptions['mailSubject'];
    }
    if (array_key_exists('mailBody', $mailOptions)) {
        $mailBody = $mailOptions['mailBody'];
    }
    if (array_key_exists('sender_type', $mailOptions)) {
        $mailSenderType = $mailOptions['sender_type'];
    }

    $phpmailer = new PHPMailer;
    $phpmailer->IsSMTP();
    $phpmailer->Host = $smtpHost;
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPDebug = 2;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Username = $smtpUsername;
    $phpmailer->Password = $smtpPassword;
    $phpmailer->Port = $smtpPort;
    $phpmailer->From = $mailFrom;
    $phpmailer->FromName = $mailFromNickName;

    $phpmailer->AddAddress($mailTo);
    $phpmailer->Subject = $mailSubject;

    $phpmailer->IsHTML(true);
    $phpmailer->Body = $mailBody;
    $phpmailer->CharSet = 'UTF-8';

    $phpmailer->CharSet = 'UTF-8';

    //SMTP Settings
    //$phpmailer = new PHPMailer();
    //        $phpmailer->IsSMTP();
    //        $phpmailer->SMTPAuth   = true;
    //        $phpmailer->Host       = "email-smtp.us-east-1.amazonaws.com";
    //        $phpmailer->Username   = "AKIAJ4QML7VZQJUNJN2Q";
    //        $phpmailer->Password   = "AkK/WJa+nUToP41tm6yIokejhChuSI4lqE1HNLQfJX6e";
    //        $phpmailer->SetFrom('noreply@pygmalion.in', 'NoReply'); //from (verified email address)
    $phpmailer->Subject = $mailSubject; //subject

    //message
    $body = $mailBody;

    //        $body = preg_replace("[\]",'',$body);

    $phpmailer->MsgHTML($body);
    //

    //recipient
    $phpmailer->AddAddress($mailTo);
    if (!$phpmailer->Send()) {
        $error = "Error sending: " . $phpmailer->ErrorInfo;
        echo $error;
        return true;
    } else {
        $error = "Letter is sent";
        return true;
    }

    // To send HTML mail, the Content-type header must be set
    //        $headers  = 'MIME-Version: 1.0' . "\r\n";
    //        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    //        $headers .= "From:".$mailFrom;

    //        $emailSend = mail($mailTo,$mailSubject,$mailBody,$headers);

    //        return $emailSend;
}
