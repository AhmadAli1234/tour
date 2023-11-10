@extends('layouts.app2')

@section('content')
<style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .page-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }
        .result-card {
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .winner {
            background-color: #4CAF50;
            color: #fff;
        }
        .loser {
            background-color: #FF5722;
            color: #fff;
        }
        h1 {
            font-size: 24px;
        }
        p {
            font-size: 16px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .score {
            font-size: 20px;
            font-weight: bold;
        }
    </style>

<div class="container page-container">
    @if($status=='pass')
        <div class="result-card winner">
            <h1>Winner</h1>
            <img src="{{asset('images/pass.webp')}}" width="300" height="300" alt="Winner Image">
            <p>Congratulations! You are the winner.</p>
            <p class="score">Your Passed: 3/3</p>
            <br>
            <div class="flex">
            <a href="{{url('/user/profile')}}"><button class="btn" style="color:white; background-color:#8683FF">Click here to Take your Prise</button></a>
            </div>
        </div>
    @else
        <div class="result-card loser">
            <h1>Loser</h1>
            <img src="{{asset('images/fail.jpg')}}" width="300" height="300" alt="Loser Image">
            <p>Unfortunately, you didn't win this time.</p>
            <p class="score">You Passed: {{$result_count??0}}/3</p>
            <br>
            <a href="{{route('quiz.try-more')}}"><button class="btn btn-danger" style="color:white;">Try Again</button></a>
        </div>
    @endif
</div>
@endsection