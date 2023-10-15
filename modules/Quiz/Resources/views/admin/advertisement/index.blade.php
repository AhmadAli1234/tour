@extends('admin.layouts.app')
@section('title','Advertisement')
@section('content')
<style>
        /* Apply CSS styles to the iframe */
        iframe {
            width: 300px; /* Set the desired width */
            height: 150px; /* Set the desired height */
        }
    </style>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All Advertisement")}}</h1>
            <div class="title-actions">
                <a href="{{url('admin/module/advertisement/create')}}" class="btn btn-primary">Add new Advertisement</a>
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
                                    <th class="title">Content</th>
                                    <th width="130px">Interest</th>
                                    <th width="15%"></th>
                                </tr>
                                </thead>
                                <tbody> 
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                @if($row->website_url)
                                                    <a target="blank" href="{{$row->website_url}}">click here to open website <br>{{$row->website_url}}</a>
                                                @elseif($row->advertisement)
                                                    {!! $row->advertisement !!}
                                                @else

                                                @php
                                                $extension = pathinfo($row->video, PATHINFO_EXTENSION);
                                                @endphp
                                                <video width="300" height="150" controls>
                                                    <source src="{{asset($row->video)}}" type="video/{{$extension}}">
                                                </video>
                                                @endif
                                            </td>
                                            <td class="title">{{$row->interest->name??''}} </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('advertisement.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i> {{__('Edit')}}</a>
                                                    <a href="{{route('advertisement.admin.delete',['id'=>$row->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> {{__('Delete')}}</a>
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
