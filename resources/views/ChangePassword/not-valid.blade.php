<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.shared/title-meta', ['title' => 'Not Valid'])
    @include('layouts.shared/head-css', ['mode' => $mode ?? '', 'demo' => $demo ?? ''])

</head>

<body class="loading authentication-bg authentication-bg-pattern">


    <div class="container col-md-5 mt-5">
        <div class="card p-5 ">
            <h1 class="text-center">{{$message}}</h1>

           
        </div>
    </div>



    @include('layouts.shared/footer-script')

</body>

</html>
