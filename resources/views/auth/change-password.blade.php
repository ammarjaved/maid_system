


@extends('layouts.vertical', ['page_title' => 'Agency'])

@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                    <li class="breadcrumb-item"><a href="{{route('maid.index')}}">Personal</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>
            <h4 class="page-title">Change Password</h4>
        </div>
    </div>
</div>

<div class="container col-7">
    <div class="card p-3 ">
        <h1 class="text-center">Change Password</h1>

        @if (Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}</p>
    @endif


        <form action="/new-password" method="post">
            @csrf
            <input type="hidden" value="{{Auth::user()->name}}" name="name">
        <div class="p-2">
            <label>Enter Old Password</label>
            <span class="text-danger">@error('old_password'){{ $message }}@enderror</span>
            <input class="form-control" name="old_password" type="text">
        </div>

        <div class="p-2">
            <label>Enter Old Password</label>
            <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>
            <input class="form-control" name="new_password" type="text">
        </div>

        <div class="p-2">
            <label>Enter Old Password</label>
            <span class="text-danger">@error('new_password_confirm'){{ $message }}@enderror</span>
            <input class="form-control" name="new_password_confirm" type="text">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3">Change Password</button>
            </div>
        </form>

    </div>
</div>

@endsection