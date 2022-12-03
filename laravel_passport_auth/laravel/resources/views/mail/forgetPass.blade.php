<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
</head>
<body>
    Change your password <a href="http://localhost:3000/reset/{{ $token }}">Click here</a>
    <br>
    Pin Code: {{ $token }}
</body>
</html>