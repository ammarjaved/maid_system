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
                    <label>Confirm New Password</label>
                    <span class="text-danger">
                        @error('new_password')
                            {{ $message }}
                        @enderror
                    </span>

                    <div class="input-group input-group-merge">
                        <input type="password" name="new_password" id="new_password" class="form-control"
                            placeholder="Enter your password">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>

                <div class="p-2">
                    <label>Confirm New Password</label>
                    <span class="text-danger">
                        @error('new_password_confirm')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="input-group input-group-merge">
                        <input type="password" name="new_password_confirm" value="{{ old('new_password_confirm') }}"
                            id="new_password_confirm" class="form-control" placeholder="Enter your password">
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
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
