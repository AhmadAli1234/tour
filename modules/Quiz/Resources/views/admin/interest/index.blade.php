@extends('admin.layouts.app')
@section('title','Interest')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All interest")}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/interest/create')}}" class="btn btn-primary">Add new Interest</a>
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
                                    <th width="20%" class="title">Name</th>
                                    <th>Image</th>
                                    <th width="">Parent</th>
                                    <th width="15%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td class="title">
                                                {{$row->name??''}}
                                            </td>
                                            <td>
                                                @if(isset($row->image))
                                                    <img width="250" height="150" src="{{asset($row->image)}}"/>
                                                @endif
                                            </td>
                                            <td class="title">{{$row->parent->name??''}} </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('interest.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                                    <a href="{{route('interest.admin.delete',['id'=>$row->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> {{__('Delete')}}</a>
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
