<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our CIMS Platform</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4;padding:20px;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                <tr>
                    <td style="background:#4F46E5;padding:20px;text-align:center;color:#ffffff;font-size:24px;font-weight:bold;">
                        Welcome, {{ $userData['name'] }} 🎉
                    </td>
                </tr>
                <tr>
                    <td style="padding:30px;color:#333333;font-size:16px;line-height:1.6;">
                        <p>Hi <strong>{{ $userData['name'] }}</strong>,</p>
                        <p>Your account has been successfully created! Below are your login details:</p>

                        <table cellpadding="5" cellspacing="0" style="margin:20px 0;width:100%;border:1px solid #ddd;border-radius:6px;">
                            <tr>
                                <td style="font-weight:bold;background:#f9f9f9;width:150px;">Email:</td>
                                <td>{{ $userData['email'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;background:#f9f9f9;">Password:</td>
                                <td>{{ $userData['password'] }}</td>
                            </tr>
                        </table>

                        <p>You can login anytime using the button below:</p>

                        <p style="text-align:center;margin:30px 0;">
                            <a href="{{ url('/login') }}"
                               style="display:inline-block;padding:12px 24px;background:#4F46E5;color:#ffffff;text-decoration:none;border-radius:6px;font-weight:bold;">
                                Login Now
                            </a>
                        </p>

                        <p>If you did not request this account, please ignore this email.</p>
                        <p style="margin-top:30px;">Thanks,<br>E-class Team</p>
                    </td>
                </tr>
                <tr>
                    <td style="background:#f9f9f9;padding:15px;text-align:center;font-size:12px;color:#888888;">
                        &copy; {{ date('Y') }} Your Company. All rights reserved.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
