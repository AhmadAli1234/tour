<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header" style="margin-left:95%">

                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="{{ url('images/ico_close.svg') }}" alt="close">
                    </i>
                </span>
            </div>
            <div class="text-center">
                <h5 style="color: #0070F3;">Connexion</h5>
                <p style="font-size:15px;margin-bottom:30px">Accédez à l'univers LOWXY depuis un seul compte</p>
            </div>
            <div class="modal-body relative">
                @include('Layout::auth/login-form')
            </div>
        </div>
    </div>
</div>
<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative" style="width: 113%;">
            <div class="modal-header" style="margin-left:95%">
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="{{ url('images/ico_close.svg') }}" alt="close">
                    </i>
                </span>
            </div>
            <div class="text-center">
                <h5 style="color: #0070F3;">Inscription</h5>
                <p style="font-size:15px;margin-bottom:30px">Accédez à l'univers LOWXY depuis un seul compte</p>
            </div>
            <div class="modal-body">
            <input type="hidden" name="user_type" class="user_type" value="">
                @include('Layout::auth/register-form')
            </div>
        </div>
    </div>
</div>
<script>
    function getUserType(val){
        $('.user_type').val(val);
    }
</script>