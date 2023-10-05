@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bravo-login-form-page bravo-login-page">
            <div class="col-md-5">
                <div class="">
                <div class="text-center">
                    <h5 style="color: #0070F3;">Inscription</h5>
                    <p style="font-size:15px;margin-bottom:30px">Accédez à l'univers LOWXY depuis un seul compte</p>
                </div>
                    @include('Layout::auth.register-form',['captcha_action'=>'register_normal'])
                </div>
            </div>
        </div>
    </div>
@endsection
