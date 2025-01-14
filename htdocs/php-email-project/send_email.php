<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
// Include PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();  // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through (Gmail)
    $mail->SMTPAuth = true;  // Enable SMTP authentication
    $mail->Username = 'rk987828@gmail.com';  // Your Gmail email address
    $mail->Password = 'iasf qucy cygi qgqv';  // Replace with your App Password (see below for more info)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
    $mail->Port = 587;  // TCP port to connect to

    //Recipients
    $mail->setFrom('rk987828@gmail.com', 'Rohan Kumar');  // Your Gmail address
    $mail->addAddress('rk987828@gmail.com', 'Raju');  // Recipient's email address (replace with the actual email)

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent via PHPMailer using Gmail SMTP!';

    // Send email
    if ($mail->send()) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-image: url("https://www.usatoday.com/gcdn/-mm-/3b8b0abcb585d9841e5193c3d072eed1e5ce62bc/c=0-30-580-356/local/-/media/2017/07/09/USATODAY/usatsports/email-inbox_large.jpg?width=580&height=326&fit=crop&format=pjpg&auto=webp");
                    background-size: cover;
                    background-position: center;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    color: white;
                    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
                }
                .message-container {
                    background-color: rgba(0, 0, 0, 0.6);  /* Dimming the background */
                    color: white;
                    padding: 40px;
                    border-radius: 15px;
                    text-align: center;
                    max-width: 600px;
                    width: 100%;
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .message-container:hover {
                    transform: scale(1.05);  /* Slightly enlarging on hover */
                    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.6);  /* Stronger shadow on hover */
                }
                .message-container h1 {
                    font-size: 45px;
                    margin-bottom: 20px;
                    letter-spacing: 1px;
                }
                .message-container p {
                    font-size: 20px;
                    margin-bottom: 25px;
                }
                .message-container .btn {
                    background-color: #4CAF50;
                    color: white;
                    padding: 18px 30px;
                    border: none;
                    border-radius: 30px;
                    font-size: 20px;
                    cursor: pointer;
                    transition: background-color 0.3s, transform 0.3s;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }
                .message-container .btn:hover {
                    background-color: #45a049;
                    transform: scale(1.1);  /* Enlarging the button on hover */
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
                }
            </style>
        </head>
        <body>
            <div class="message-container">
                <h3>Email Sent Successfully!</h3>
                <p>Your email has been sent successfully. Thank you for using our service.</p>
                <button class="btn" onclick="window.location.reload();">Refresh to Send Again</button>
            </div>
        </body>
        </html>
        ';
    } else {
        echo 'Message could not be sent.';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
