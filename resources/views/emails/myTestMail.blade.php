<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>RFL</title>
    </head>
    
    <body>
        <h1>A message has come via Contact Form.</h1>
        <p>Name: {{ $details['name'] }}</p>
        <p>Email: {{ $details['email'] }}</p>
        <p>Mobile: {{ $details['mobile'] }}</p>
        <p>Message: {{ $details['message'] }}</p>
        <p>Thank You</p>
    </body>
</html>