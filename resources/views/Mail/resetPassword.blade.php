<html>

<head>
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <div style="display: flex;
    justify-content: center;
    align-items: center;">
        <div
            style=" width: 50%; background: #F4F5F7;
        border-radius: 30px; padding:15px;text-align: center;
        font-family: sans-serif;">

            <h2>Reset your password</h2>
            <p style="font-size: large;">if you want to change your password please click below link before 24 hours</p>
            <a href="{{ $details['url'] }}"><button
                    style="     font-size: 16px;
                    padding: 7px 16px;
                    border: 0px;
                    background: #147ecbf2;
                    color: white;
                    font-weight: 700;
                    cursor: pointer;">Reset
                    Your Password</button></a>

            <p style="font-size: large;">If you don't want to rest your password you can safely ignore this email. Only a
                person with access to
                your email can reset your account password.</p>
        </div>
    </div>


</body>

</html>
