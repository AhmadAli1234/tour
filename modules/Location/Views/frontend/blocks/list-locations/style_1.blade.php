<style>
    .min-height-350 {
        min-height: 14.875rem!important;
    }
    .destination:after{
        height: 0 !important;
        width: 0 !important;
    }
    .destination{
        margin-top: 175px !important;
    }
    .section-title:after{
        height: 0 !important;
        width: 0 !important;
    }
    .rounded-border, .rounded-border:after, .rounded-border:before {
        border-radius: 10px;
    }
</style>
<div class="bravo-list-locations destinantion-block destinantion-v1 border-bottom border-color-8 mt-6">
    <div class="container space-bottom-1">
        <div class="text-left mb-5 mt-4">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">{{$title}}</h2>
        </div>
        <div class="row mb-1">
            @if(!empty($rows))  
                @foreach($rows as $key=>$row)
                    @php
                        $class = "col-md-2 mb-3 mb-md-4";
                    @endphp
                    <div class="{{ $class }}">
                        @include('Location::frontend.blocks.list-locations.loop') 
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>