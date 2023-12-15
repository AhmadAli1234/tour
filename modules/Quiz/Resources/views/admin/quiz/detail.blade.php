@extends('admin.layouts.app')

@section('content')
    <form action="{{route('quiz.admin.store',['id'=>($row->id) ? $row->id : '-1'])}}" method="post" class="dungdt-form">
    @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? 'Edit quiz: '.$row->title :'Add new Quiz'}}</h1>
                    
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
                            <div class="panel-title"><strong>Quiz content</strong></div>
                            <div class="panel-body">
                                
                                @include('quiz::admin.quiz.form',['row'=>$row??''])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        @if(is_default_lang())
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Interest</label>
                                        <select name="interest_id" class="form-control" required>
                                            <option value="">{{ __('-- Please Select --')}} </option>
                                            @isset($interests)
                                                @foreach($interests as $interest)
                                                    <option value="{{$interest->id}}" {{isset($row->interest_id) && $row->interest_id==$interest->id?'selected':''}}>{{$interest->parent_id?'--':''}}{{$interest->name??''}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" value="{{ $row->latitude ?? '' }}" placeholder="Enter Latitude.." name="latitude" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" value="{{ $row->longitude ?? '' }}" placeholder="Enter Longitude.." name="longitude" class="form-control" required>
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
