@extends('admin.layouts.app')
@section('content')

        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{ __('Affiliates Report')}}</h1>
                </div>
            </div>
            @include('admin.message')
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Join Date</th>
                                        <th>Matricular No</th>
                                        <th>Joined By</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($affiliates))
                                        @foreach($affiliates as $affiliate)
                                        <tr>
                                            <td>{{$affiliate->name??''}}</td>
                                            <td>{{$affiliate->email??''}}</td>
                                            <td>{{$affiliate->created_at??''}}</td>
                                            <td>{{$affiliate->referred_by??''}}</td>
                                            <td>{{$affiliate->affiliated_by->name??''}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
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
