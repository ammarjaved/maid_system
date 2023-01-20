<html>

<head>
    <title>AGENCY REEGISTERED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <div style="display: flex;
    justify-content:center">
        <div
            style=" width: 50%; background: #F4F5F7;
        border-radius: 30px; padding:15px;text-align: center;
        font-family: sans-serif;">

            <h2>Registered Successfully</h2>
            <p style="line-height: 0; font-size: large;">You are successfully registered in AeroSynergy</p>
            <p style="line-height: 0; font-size: large;"><span style="font-weight: 700">Username : </span>{{ $details['name'] }}</p>
            <p style="line-height: 0; font-size: large;"><span style="font-weight: 700">Password : </span> {{ $details['password'] }}</p>
            <a href="{{ $details['url'] }}"><button style="    font-size: 16px;
                padding: 7px 16px;
                border: 0px;
                background: #147ecbf2;
                color: white;
                font-weight: 700;
                cursor: pointer;">Change Password</button></a>
            <p>if you want to change your password please click link before 24 hours</p>
        </div>
    </div>

</body>

</html>
