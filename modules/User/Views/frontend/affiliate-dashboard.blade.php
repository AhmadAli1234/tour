@extends('layouts.user')
@section('head')
@endsection
@section('content')
<style>
    svg{
        float: right;
    }
    .btn{
        float: right;
        width: 260px;
        padding: 3px;
    }
</style>
    <h2 class="title-bar no-border-bottom">
        {{__("Affiliate Dashboard")}}
    </h2>
    @include('admin.message')
    <br><br>
    <div class="bravo-user-dashboard">
        <div class="row dashboard-price-info row-eq-height">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>
                                <b>
                                    Matricular Number <br><br>
                                    Affiliate Link
                                </b>
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <h5>
                                OUTF74<br><br>
                                <input type="text" class="form-control" readonly value="https://lowxy.fr/register">
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12" style="float: right;">
                <button class="btn btn-success" onclick="PrintElem('qr-div')">Print</button>
               <br><br><br>
               <div id="qr-div">
                {!! QrCode::size(256)->generate('https://lowxy.fr/register') !!}
               </div>
                
                
                </div>            
        </div>
    </div>
   
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset("libs/chart_js/Chart.min.js") }}"></script>
    <script type="text/javascript">

    function PrintElem(divId) {
       
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        // Replace the entire page content with the content of the div to print
        document.body.innerHTML = printContents;

        // Print the div content
        window.print();

        // Restore the original page content
        document.body.innerHTML = originalContents;
        }

        jQuery(function ($) {
            "use strict"
            $(".bravo-user-render-chart").each(function () {
                let ctx = $(this)[0].getContext('2d');
                window.myMixedChartForVendor = new Chart(ctx, {
                    type: 'bar',//line - bar
                    data: earning_chart_data,
                    options: {
                        min:0,
                        responsive: true,
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                stacked: true,
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '{{__("Timeline")}}'
                                }
                            }],
                            yAxes: [{
                                stacked: true,
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '{{__("Currency: :currency_main",['currency_main'=>setting_item('currency_main')])}}'
                                },
                                ticks: {
                                    beginAtZero: true,
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += tooltipItem.yLabel + " ({{setting_item('currency_main')}})";
                                    return label;
                                }
                            }
                        }
                    }
                });
            });


            $(".bravo-user-chart form select").on('change',function () {
                $(this).closest("form").submit();
            });

            var start = moment().startOf('week');
            var end = moment();
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                "alwaysShowCalendars": true,
                "opens": "left",
                "showDropdowns": true,
                ranges: {
                    '{{__("Today")}}': [moment(), moment()],
                    '{{__("Yesterday")}}': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '{{__("Last 7 Days")}}': [moment().subtract(6, 'days'), moment()],
                    '{{__("Last 30 Days")}}': [moment().subtract(29, 'days'), moment()],
                    '{{__("This Month")}}': [moment().startOf('month'), moment().endOf('month')],
                    '{{__("Last Month")}}': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    '{{__("This Year")}}': [moment().startOf('year'), moment().endOf('year')],
                    '{{__('This Week')}}': [moment().startOf('week'), end]
                }
            }, cb).on('apply.daterangepicker', function (ev, picker) {
                $.ajax({
                    url: '{{url('user/reloadChart')}}',
                    data: {
                        chart: 'earning',
                        from: picker.startDate.format('YYYY-MM-DD'),
                        to: picker.endDate.format('YYYY-MM-DD'),
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (res) {
                        if (res.status) {
                            window.myMixedChartForVendor.data = res.data;
                            window.myMixedChartForVendor.update();
                        }
                    }
                })
            });
            cb(start, end);
        });
    </script>
@endsection