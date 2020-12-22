<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
</head>
<body>
    <p>Link thay đổi mật khẩu của bạn được gửi từ storemobile.xyz nha
        <a href="{{ route('confirm_password',['token' => $token, 'email' => $email ]) }}">link thay đổi</a>
    </p>
</body>
</html>