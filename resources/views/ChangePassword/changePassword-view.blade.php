<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.shared/title-meta', ['title' => 'Change Password'])
    @include('layouts.shared/head-css', ['mode' => $mode ?? '', 'demo' => $demo ?? ''])

</head>

<body class="loading authentication-bg authentication-bg-pattern">


    <div class="container col-md-5 mt-5">
        <div class="card p-3 ">
            <h1 class="text-center">Change Password</h1>

            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
            @endif


            <form action="/change-your-password/{{ $token }}" method="post">
                @csrf


                <input type="hidden" value="{{ $username }}" name="username">
                <div class="p-2">
                    <label>Enter New Password</label>
                    <div>
                        <span class="text-danger ">
                            @error('new_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <input class="form-control" name="new_password" type="text">
                </div>

                <div class="p-2">
                    <label>Confirm New Password</label>
                    <div>
                        <span class="text-danger col-md-12">
                            @error('new_password_confirm')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <input class="form-control" name="new_password_confirm" type="text">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-3">Change Password</button>
                </div>
            </form>

        </div>
    </div>



    @include('layouts.shared/footer-script')

</body>

</html>
