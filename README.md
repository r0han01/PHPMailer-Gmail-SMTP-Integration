## PHP Mailer Setup with Gmail SMTP on InfinityFree

This repository contains a basic PHP script using **PHPMailer** to send emails via Gmail SMTP on **InfinityFree** hosting. It includes a test email functionality, styling, and error handling. Please follow the instructions below to set up your own email sender using this repo.

![ScreenShot Tool -20250114015553](https://github.com/user-attachments/assets/2dd9d5c6-42ed-4deb-afab-063e16d11036)


## Prerequisites

- A **Gmail account** to use for sending emails.
- **InfinityFree** web hosting account (or any other free hosting that supports PHP and SMTP).
- **PHPMailer** library.
- **App Password** from Google (for Gmail SMTP authentication).
  
**YouTube Tutorial**: Follow the **App Passwords tutorial** - https://youtu.be/hXiPshHn9Pw?feature=shared to learn how to create a Google App Password for your Gmail account.


### **Creating an App Password for Gmail (For PHPMailer Integration)**

When using Gmail's SMTP server to send emails via PHPMailer, you'll need to create an **App Password**. This is necessary because Google requires it for accounts with 2-Step Verification enabled. 

Follow these steps to create your own **App Password**:

1. **Go to Google Account Settings**: Visit [Google Account Settings](https://myaccount.google.com/security).
2. **Enable 2-Step Verification** (if not already enabled): 
   - On the Security page, under "Signing in to Google," click on **2-Step Verification** and follow the instructions to enable it.
3. **Create an App Password**:
   - Under "Signing in to Google," find the section titled **App passwords**. 
   - Click on **App passwords** (you may be prompted to sign in again).
   - Under the "Select App" dropdown, choose **Mail** and select **Other (Custom name)** for the device name. Enter a name (for example, `PHPMailer`) and click **Generate**.
4. **Copy the Generated App Password**: 
   - After clicking "Generate," you'll see a 16-character password in a yellow box like this:
###
![ScreenShot Tool -20250114020017 (1)](https://github.com/user-attachments/assets/c753c677-4b63-435f-8efc-ef1a746a764f)
###
![ScreenShot Tool -20250114020257](https://github.com/user-attachments/assets/30abb87b-4a05-4eac-8951-ff2f1e6939a1)
###
   
```markdown
rfyh kfgh ykfh djfh
```

This **16-character password** is the **App Password** you will use in place of your regular Gmail password in your PHPMailer script.

### **Important Note:**
- The **App Password** is case-sensitive, so be sure to copy it exactly as shown.
- You will only need to create an **App Password** once per device/application.
- Do **not** use your regular Gmail password for this. Always use the App Password for applications like PHPMailer.

---

## Steps to Set Up

### 1. **Creating the Project Files on InfinityFree**

After signing up and logging into your **InfinityFree** hosting account, follow these steps:

#### Step 1: Set Up the Directory Structure

1. Go to the **File Manager** under your InfinityFree control panel.
2. Inside the **htdocs** folder, create two directories:
   - `php-email-project` (for your email project files)
   - `PHPMailer` (this will contain the PHPMailer library)

   Your directory structure should look like this:
```
/htdocs
    ├── /PHPMailer                
    │   ├── /src                  # This src folder is directly from Github Repo mentioned below from official PHPMailer
    │     ├── Exception.php
    │     ├── PHPMailer.php
    │     ├── SMTP.php
    │     └── (other files)
    │
    ├── /php-email-project        
    │   ├── /send_email.php           


```
###
![ScreenShot Tool -20250114015850 (1)](https://github.com/user-attachments/assets/38909a58-820a-405f-bff8-a2374b2e2a83)
###
![ScreenShot Tool -20250114015905 (1)](https://github.com/user-attachments/assets/0bc85883-94a4-45e3-b688-63420e7de38f)
###

#### Step 2: Upload PHPMailer Library

1. Download the latest PHPMailer from GitHub - https://github.com/PHPMailer/PHPMailer.
2. Extract the contents of the `PHPMailer` folder and upload it to your `PHPMailer` folder inside `htdocs` on InfinityFree.
###
![ScreenShot Tool -20250114020900 (1)](https://github.com/user-attachments/assets/e91fe9aa-1c1e-4a10-b2bd-f92fb37d5ea6)
###
![Screenshot from 2025-01-14 02-12-25](https://github.com/user-attachments/assets/0886f140-e006-4cb6-8c43-2ccf304f0542)
###
![Screenshot from 2025-01-14 02-15-38](https://github.com/user-attachments/assets/05f65c2f-e3ef-4c8d-be19-913f86030163)
###

#### Step 3: Upload the Email Sending Script

1. Inside the `php-email-project` folder, create a file called `send-email.php` and paste your email-sending script there. 
2. Here’s the sample script that sends an email using **Gmail SMTP**.

```php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com';
    $mail->Password = 'your-app-password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('your-email@gmail.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent via PHPMailer using Gmail SMTP!';

    if ($mail->send()) {
        echo 'Message has been sent.';
    } else {
        echo 'Message could not be sent.';
    }
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
```
- Replace `'your-email@gmail.com'` and `'your-app-password'` with your own Gmail and App Password.
###
![ScreenShot Tool -20250114022228 (1)](https://github.com/user-attachments/assets/1ea1480c-dbf9-4660-9cb6-7f8b1c2068a3)
###

#### Step 4: Add the Test.php File
- To ensure the server is working, you can create a simple test.php file that checks if PHP is functioning correctly. Place it in the `php-email-project` directory:

```php
<?php
phpinfo();
?>
```
- Visit this file by accessing `https://yourdomain.com/php-email-project/test.php`. If PHP is set up correctly, this page will display all the information about your server’s PHP setup.

### 2. Setting Up Gmail App Password
- To use Gmail SMTP, you need to create an App Password if you have Two-Factor Authentication (2FA) enabled on your Gmail account.


#### Go to your Google Account Settings.
- Navigate to the `Security` tab.
- Under the `"Signing in to Google"` section, click App Passwords. In order to use App Password enable 2-step verification first & try search App Password on the search bar after refreshing the page.
- Select Mail as the app and Other (Custom Name) for the device. Enter something like `"PHP Mailer"`.
- Google will generate a password that you can use in your script to authenticate with Gmail SMTP.
### 3. Important PHP Error Reporting
- To help debug any issues, you can add the following PHP code to your script. This will display any PHP errors on the page, making it easier to troubleshoot problems.

- In the `send-email.php` file, add this snippet at the very top:

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
```
- This will ensure that any `errors are shown in the browser`, which is useful when developing or debugging your application.

#### 4. URL Routing
- Once you’ve uploaded your files to InfinityFree, you’ll need to visit the correct URLs to interact with the script:

#### Test Page:
- `https://yourdomain.com/php-email-project/test.php`
###
![Screenshot from 2025-01-14 02-37-31](https://github.com/user-attachments/assets/6d51de2f-bb3f-4064-ad1d-f15161d64ae2)
###

- This checks if your server is running properly and displays PHP info.

- Email Sending Page: https://yourdomain.com/php-email-project/send-email.php

This is the URL that sends the test email. After visiting it, you should see a message confirming whether the email was sent or not.

#### 5. Additional Resources
- PHPMailer Documentation - https://github.com/PHPMailer/PHPMailer/blob/master/README.md
- Gmail SMTP Settings - https://developers.google.com/gmail/imap/imap-smtp
- InfinityFree Documentation - https://developers.google.com/gmail/imap/imap-smtp


#### 6. Frontend HTML Code

The frontend HTML code for this project is integrated within the `index.php` file, located inside the **php-email-project** folder.

You can customize the user interface and the email-sending process by modifying the HTML and PHP code together. Since the HTML structure is embedded within the PHP file, you can easily update or modify both the backend email logic and the frontend display in one place.

#### Customizing the User Interface:
Feel free to adjust the HTML structure and styles directly within `index.php` to fit your needs. For example, you can change the design, add more UI elements like input forms, buttons, or any other customization.

The PHP backend (for sending the email using PHPMailer) is seamlessly linked to the frontend HTML code. After the email is sent successfully, it will display a success message with an interactive design.


### 7. **Preventing Emails from Going to Spam**

When using email-sending scripts like the one in this project with Gmail or Yahoo SMTP servers, it is important to understand that these email services have high security measures in place to prevent spam. If you don’t configure your server properly, the emails you send might end up in the recipient’s spam folder. This can happen for a variety of reasons, such as:

- Sending too many emails from an IP that has no reputation or that has been flagged by spam filters.
- Using certain keywords in the email body or subject line that are commonly associated with spam.
- Not properly authenticating the email server you’re using (which could lead to phishing attempts being flagged).

To avoid these issues and make sure that your emails are delivered successfully, follow these steps:

1. **Use SPF, DKIM, and DMARC**: 
   - These are email authentication methods that help prevent your emails from being flagged as spam. 
   - Set up **SPF (Sender Policy Framework)** and **DKIM (DomainKeys Identified Mail)** records for your domain if you're using custom email addresses.
   - If you're sending emails via Gmail’s SMTP, you don't need to worry about these records, but they are important if you're using a custom domain.

2. **Limit the Frequency of Sending Emails**: 
   - Avoid sending large quantities of emails in a short amount of time. This can trigger spam filters. Sending emails in smaller batches or adding a delay between sending emails is a good practice.
   
3. **Ensure Your Content Is Legitimate**: 
   - Spam filters check for common spammy phrases, such as "Earn money now" or "Click here for a free prize." Avoid using such language in your email content.
   - Personalize your emails, and ensure they are related to legitimate communication.

4. **Avoid Sending Multiple Emails to Invalid Addresses**: 
   - If your email address has a poor reputation because you’re sending to many invalid or non-existent addresses, it could lead to your emails being flagged as spam.
   - Always verify email addresses before sending emails.

5. **Add a Reply-to Email Address**: 
   - Make sure you set a valid "Reply-To" email address, so that recipients can contact you back easily, which increases trust with email servers.
   
6. **Consider Using a Third-Party Service**: 
   - If you plan to send emails in bulk or need a reliable solution, consider using email-sending services like **SendGrid**, **Mailgun**, or **Amazon SES**. These services have good reputations and ensure that your emails don’t get flagged as spam.

7. **Check Your Spam Score**:
   - Tools like Mail-Tester - (https://www.mail-tester.com/) or IsNotSpam - https://isnotspam.com/ can help you analyze your email and give you feedback on potential spam issues. You can send a test email to one of these services and check the results.

By following these tips and ensuring proper configuration, you can significantly reduce the chances of your emails being marked as spam by Gmail, Yahoo, and other email providers.

**Note**: You can find more detailed discussions on this issue on forums and blog posts like this StackOverflow discussion - https://stackoverflow.com/questions/12188334/php-mail-form-sending-to-gmail-spam.




### Conclusion
By following the steps outlined in this guide, you can successfully set up a PHP script that sends emails using Gmail SMTP on InfinityFree hosting. Make sure you’ve created your Gmail App Password and uploaded the required files to the correct directories. With proper error reporting enabled, you can quickly debug and fix any issues along the way.

Don't forget to check the YouTube tutorial - https://www.youtube.com/watch?v=hXiPshHn9Pw for creating Gmail App Passwords!
