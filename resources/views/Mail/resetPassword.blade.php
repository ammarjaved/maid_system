<html>

<head>
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <div class="flex">
        <div class="main col-6">

            <h2>Reset your password</h2>
            <p>if you want to change your password please click below link before 24 hours</p>
            <a href="{{$details['url']}}"><button>Reset Your Password</button></a>
            <p>If you don't want to rest your password you can safely ignore this email. Only a person with access to
                your email can reset your account password.</p>
        </div>
    </div>


</body>

</html>

<style>
    * {
        box-sizing: border-box;
        text-align: center;
        font-family: sans-serif;

    }

    p {
        font-size: large;
    }


    [class*="col-"] {
        float: left;
        padding: 15px;

    }


    .col-6 {
        width: 50%;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: center;
        background: #F4F5F7;
        border-radius: 30px;
    }

    button {
        color: white;
        background: #282a35cc;
        padding: 13px;
        font-size: 15px;
        font-weight: 700;
        border: none;

    }

    button:hover {
        cursor: pointer;
        background: #282A35;

    }
</style>
