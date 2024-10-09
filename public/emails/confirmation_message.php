<?php 
function email_confirmation(){


$html_content = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>
<body>
    <center>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td align="center" style="padding: 25px 0; background-color: #31d92b;">
                    
                </td>
            </tr>
            <tr>
                <td align="center" valign="top" style="font-size: 0; background-color: #f2f0eb; padding: 20px 45px;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td style="font-family: Arial, sans-serif; font-size: 18px; color: #1b302b; text-align: center;">
                                <h1 style="font-size: 72px; color: #010101;"> Limelight Cinema</h1>
                                <h2 style="font-size: 18px; letter-spacing: 4px; color: #000000;">Message Recieved</h2>
                                <p>Thank you for your message,</p>
                                <p>We have received your message and will get back to you shortly.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="font-size: 0; background-color: #f2f0eb; padding: 20px 45px;">
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td style="border-radius: 75px; background: #f2f0eb; text-align: center;">
                                <a href="http://projection.cloud/public/index.php" style="border: 2px solid #22225f; font-family: Arial, sans-serif; font-size: 16px; padding: 15px 45px; color: #010101; border-radius: 75px; text-decoration: none;">
                                    View our website
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
';
return $html_content;
}

?>