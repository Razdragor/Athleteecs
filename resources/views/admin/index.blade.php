@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/jqplot/jquery.jqplot.css') }}" />
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/themes/smoothness/jquery-ui.css" />
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="btn-icon col-xs-6 col-sm-6 col-md-2 col-md-offset-2">
            <a class="btn btn-neutral" role="button" href="#"><i class="fa fa-dashboard fa-lg"></i>
                <span class="label label-warning">2</span>
                <div class="title">Dashboard</div>
            </a>
        </div>
        <div class="btn-icon col-xs-6 col-sm-6 col-md-2">
            <a class="btn btn-primary" role="button" href="#"><i class="fa fa-bar-chart-o fa-lg"></i>
                <div class="title">Stats</div>
            </a>
        </div>
        <div class="btn-icon col-xs-6 col-sm-6 col-md-2">
            <a class="btn btn-success" role="button" href="#"><i class="fa fa-calendar fa-lg"></i>
                <div class="title">Calendar</div>
            </a>
        </div>
        <div class="btn-icon col-xs-6 col-sm-6 col-md-2">
            <a class="btn btn-warning" role="button" href="#"><i class="fa fa-inbox fa-lg"></i>
                <div class="title">Inbox</div>
                <span class="label label-primary pull-right">26</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">Nombres d'inscrit par jour</div>
                <div class="panel-body">
                    <div id="chart1" class="jqplot-target" style="width: 90%" ></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({ cache: false });

        function getRequest(url, callback) {
            $.get(url, function(data) {
                callback(data);
            });
        }

        // CHART BART 2

        $(document).ready(function () {
            getRequest('admin/datauser', function(data) {
                console.log(data);
            var plot1 = $.jqplot("chart1", [data['data']], {
                seriesColors: ["rgb(211, 235, 59)"],
                highlighter: {
                    show: true,
                    sizeAdjust: 1,
                    tooltipOffset: 9
                },
                grid: {
                    background: 'rgba(57,57,57,0.0)',
                    drawBorder: false,
                    shadow: false,
                    gridLineColor: '#222222',
                    gridLineWidth: 2
                },
                legend: {
                    show: true,
                    placement: 'outside'
                },
                seriesDefaults: {
                    rendererOptions: {
                        smooth: true,
                        animation: {
                            show: true
                        }
                    },
                    showMarker: false
                },
                axesDefaults: {
                    rendererOptions: {
                        baselineWidth: 1.5,
                        baselineColor: '#444444',
                        drawBaseline: false
                    }
                },
                axes: {
                    xaxis: {
                        renderer: $.jqplot.DateAxisRenderer,
                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                        tickOptions: {
                            formatString: "%b %e",
                            angle: -30,
                            textColor: '#dddddd'
                        },
                        tickInterval: "1 days",
                        drawMajorGridlines: false
                    },
                    yaxis: {
                        renderer: $.jqplot.LogAxisRenderer,
                        pad: 0,
                        rendererOptions: {
                            minorTicks: 1
                        },
                        tickOptions: {
                            formatString: "%'d",
                            showMark: false
                        }
                    }
                }
            });

                $('.jqplot-highlighter-tooltip').addClass('ui-corner-all')
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/jquery.jqplot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.dateAxisRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.logAxisRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.canvasTextRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.canvasAxisTickRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.highlighter.js') }}"></script>

@endsection
