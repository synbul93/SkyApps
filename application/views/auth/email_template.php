<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles for the email template */
        .logo {
            display: block;
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="min-width:333px">
        <tr style="background:#FFFFFF ;height: 109px;">
            <td style="padding-left: 33px; padding-right: 33px; border-left: 3px solid rgb(202, 202, 202); border-right: 3px solid rgb(202, 202, 202); border-top: 3px solid rgb(202, 202, 202);">
                <div style="float: left;  min-width:292px; width:333px; margin: 7px 0;">
                    <a href="<?= base_url(''); ?>" style="display: block; text-decoration: none; margin: 0px; font-size: 27px; color: rgb(227, 2, 10); font-weight: bold; font-family: arial; min-width:173px;">
                        <img src="<?= base_url('assets/img/bsky.png'); ?>" style="color:#357;width:80px" alt="Bsky">
                    </a>
                </div>
                <span style="float: right; font-family: arial; font-weight: bold; font-size: 15px;  margin-top: 30px;min-width:42px; padding-right: 11px;  text-align: center; vertical-align: center;color:#535E6B">
                    <?= (isset($subject) ? $subject : ''); ?>
                </span>
            </td>
        </tr>
        <tr>
            <td valign="top" style="border: 3px solid #CACACA;background: #EDEDED;padding-left: 33px; padding-right: 33px;padding-top: 17px;padding-bottom:17px;">
                Dear <?= (isset($to) ? $to : ''); ?>
                <br />
                <br />
                <?= (isset($message) ? $message : ''); ?>
                <br />
                <br />
                Thank you, <br />
                Greetings Bitter Coffee.
            </td>
        </tr>

        <tr>
            <td>
                <span style="font-size:10pt;color:#828282">
                    <br />
                    &copy; <?= date('Y') ?> SkyApps
                    <br /><br />
                </span>
            </td>
        </tr>
    </table>