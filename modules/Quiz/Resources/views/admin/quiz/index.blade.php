@extends('admin.layouts.app')
@section('title','Quiz')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All quiz")}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/quiz/create')}}" class="btn btn-primary">Add new Quiz</a>
            </div>
        </div>
        @include('admin.message')
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="20%" class="title">Question</th>
                                    <th >Answer</th>
                                    <th width="130px">Interest</th>
                                    <th width="130px">Latitude</th>
                                    <th width="130px">Longitude</th>
                                    <th width="15%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td class="title">
                                                {{$row->question??''}}
                                            </td>
                                            <td>{!!$row->answer ?? '' !!}</td>
                                            <td class="title">{{$row->interest->name??''}} </td>
                                            <td>{{$row->latitude??''}} </td>
                                            <td>{{$row->longitude??''}} </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('quiz.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                                    <a href="{{route('quiz.admin.delete',['id'=>$row->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> {{__('Delete')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">{{__("No data")}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            </div>
                        </form>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
