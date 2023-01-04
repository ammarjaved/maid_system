<html>
    <head>
        <title>AGENCY REEGISTERED</title>
    </head>
    <body>
        <p>You are successfully registered in AeroSunergy</p>
        <p>username : {{$details['name']}}</p>
        <p>password :   {{$details['password']}}</p>

        <p>if you want to change your password please click below link before 24 hours</p>
        {{$details['url']}}
        <p>Thank you</p>
    </body>

</html>