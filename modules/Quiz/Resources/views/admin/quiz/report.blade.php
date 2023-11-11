@extends('admin.layouts.app')
@section('title','Quiz')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Quiz Report")}}</h1>
        </div>
        @include('admin.message')
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Matricular No</th>
                                    <th>Date</th>
                                    <th>Quiz Played</th>
                                    <th>Quiz Won</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($rows))
                                    @foreach($rows as $row)
                                        <tr>
                                            <td class="title">{{$row->user->name??''}}</td>
                                            <td>{{$row->user->referred_by??''}}</td>
                                            <td>{{$row->date??''}}</td>
                                            <td>{{$row->total??0}}</td>
                                            <td>{{$row->win??0}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('script.body')
<script>
     table = new DataTable('#myTable');
</script>
@endsection
