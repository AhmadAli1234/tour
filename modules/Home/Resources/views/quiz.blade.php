@extends('layouts.app2')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
    .ui.dropdown {
        max-width: 400px;
    }
    .submit{
        
    font-weight: 500;
    font-size: 16px;
    color: #FFFFFF;
    background: #8683FF;
    box-shadow: 0px 4px 16px rgba(0, 0, 40, 0.4);
    border-radius: 10px;
    display: inline-block;
    padding: 12px 52px 12px 14px;
    background-image: url('new/images/wt-arrorw.png');
    background-repeat: no-repeat;
    background-position: 93% 50%;
    transition: .2s;
    width: 260px;
    }

</style>
<form method="post" action="{{route('quiz.store')}}">
    @csrf
    <section class="evviede-venir-area" id="quest_section" style="visibility: visible; opacity:1">
        <div class="container">
            <div class="evviede-venir-wrapper-area wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="evviede-venir-title" id="quizz" style="opacity: 1; transition: all 0.5s ease 0s;">
                            <input value="1" id="step" hidden="">
                            <h1 style="text-align: left;">1/3</h1>
                            <p></p>
                            <h2 style="font-size: 25px; background: #f6ebff; border-radius: 20px;">
                                {{$question->question??''}} </h2>
                            <br>
                            <input type="hidden" value="{{$question->id}}" name="quiz_id">
                            <input type="text" name="answer" id="answer" placeholder="Votre reponse ici..." required>
                            <div class="evviede-venir-title" style="padding: 20px;">
                            <input class="submit" type="submit" name="submit" value="Envoyer votre reponse">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
</center>

<script type="text/javascript">
    $('#submitForm').on('click',function(){
        alert();
        $('form').submit();
    })

</script>
@endsection
