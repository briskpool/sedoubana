<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 4px #cc2766;">
        <thead>
            <tr>
                <th style="text-align:left; padding-left: 15px;"><img style="max-width: 150px;" src="https://sedoubana.com/assets/images/logo.png" alt="Sedoubana"></th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <td colspan="2" style="font-size:13px;font-weight:normal;padding:30px 15px 0 15px;">
                    <!-- <p>Hi <b> Muddasir Khan,</b> <br> You have recently booked a trip. Please find the details below.</p> -->
                    <p>You have recieved a new message</p>
                </td>
            </tr>


            <tr>
                <td colspan="2" style="padding:15px;">
                    <p style="font-size:14px;margin:0;padding:10px;border-bottom:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">Name</span> <?= $name ?>
                    </p>
                    <p style="font-size:14px;margin:0;padding:10px;border-bottom:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">Email</span>
                        <a href="mailto:<?= $email ?>" style="text-decoration: none; color: #000;" target="_blank"><?= $email ?></a>
                    </p>
                    <p style="font-size:14px;margin:0;padding:10px;border-bottom:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">Subject</span> <?= $subject ?>
                    </p>
                    <p style="font-size:14px;margin:0;padding:10px;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;"><?= $message ?> </span>
                    </p>

                </td>
            </tr>
        </tbody>
        <tfooter>
            <tr>
                <td colspan="2" style="font-size:12px;padding:50px 15px 0 15px;">
                    If you have any question or facing problems with <a href="https://sedoubana.com">sedoubana.com</a>, feel free to contact us:
                    <a href="mailto:contact@sedoubana.com">contact@sedoubana.com</a>
                </td>
            </tr>
        </tfooter>
    </table>
</body>

</html>