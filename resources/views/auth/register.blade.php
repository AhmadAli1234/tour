@extends('layouts.app')

@section('content')
<style>
.price-box {
    padding: 50px;
    background: #FFFFFF;
    border: 1px solid #EAEAEA;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.07), 0px 2px 4px rgba(0, 0, 0, 0.05), 0px 12px 24px rgba(0, 0, 0, 0.05);
    border-radius: 12px;
    min-height: 500px;
    display: flex;
    flex-direction: column;
    transition: .2s;
}
</style>
    <div class="container">
        <div class="row justify-content-center bravo-login-form-page bravo-login-page price-box-inner">
            <div class="col-md-5 price-box">
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
