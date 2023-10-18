@extends('admin.layouts.app')

@section('content')
    <form action="{{route('interest.admin.store',['id'=>($row->id) ? $row->id : '-1'])}}" method="post" enctype="multipart/form-data" class="dungdt-form">
    @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Edit interest: '.$row->title :'Add new Interest'}}</h1>
                    
                </div>
                <div class="title-actions">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
            </div>
            @include('admin.message')
            @include('Language::admin.navigation')
            <div class="lang-content-box">
                <div class="row">
                    
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-title"><strong>Interest content</strong></div>
                            <div class="panel-body">
                                
                                @include('quiz::admin.interest.form',['row'=>$row??''])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        @if(is_default_lang())
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Interest</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="">{{ __('-- Please Select --')}} </option>
                                            @isset($interests)
                                                @foreach($interests as $interest)
                                                    <option value="{{$interest->id}}" {{isset($row->parent_id) && $row->parent_id==$interest->id?'selected':''}}>{{$interest->name??''}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
