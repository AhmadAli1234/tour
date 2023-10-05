@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center bravo-login-form-page bravo-login-page">
        <div class="col-md-5">
            <div class="">
            <div class="text-center" style="margin-top: 20px; margin-left">
                <h5 style="color: #0070F3;">Connexion</h5>
                <p style="font-size:15px;margin-bottom:30px">Accédez à l'univers LOWXY depuis un seul compte</p>
            </div>
                @include('Layout::auth.login-form',['captcha_action'=>'login_normal'])
            </div>
        </div>
    </div>
</div>
@endsection
