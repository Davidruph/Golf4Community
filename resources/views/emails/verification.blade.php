<!DOCTYPE html>
<html>

<head>
    <title>Verification Email</title>
</head>

<body>
    <table cellspacing="0" cellpadding="10" border="0" align="left" width="100%">
        <tr>
            <th style="background-color:#eb9532;color:#FFFFFF;padding:30px;">Golf4Community</th>
            <th style="background-color:green;color:#FFFFFF;padding:30px;">Hi {{ $fullname }}, Thanks for sharing
                your passion for golf with
                us.</th>
        </tr>
        <tr>
            <td colspan="2">
                <p style="color:#000000;font-weight:500;">
                    Welcome! Our goal is to help you meet fellow golfers. Please activate your account by clicking
                    below:
                </p>
                <center style="margin-top:15px;">
                    <a href="{{ $verificationLink }}"
                        style="background-color:#990000;color:#FFFFFF;padding:6px;text-decoration:none;font-weight:600;font-size:11px;">
                        ACTIVATE YOUR ACCOUNT NOW!
                    </a>
                </center>
                <p>If the link doesn’t work, copy this link into your browser:</p>
                <p>{{ $verificationLink }}</p>
            </td>
        </tr>
    </table>
</body>

</html>
