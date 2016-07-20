@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/jqplot/jquery.jqplot.css') }}" />
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/themes/smoothness/jquery-ui.css" />
    <style>
        .fixed-panel {
            min-height: 290px;
            max-height: 290px;
            overflow-y: scroll;
        }
    </style>
@endsection

@section('content')
<div class="container" style="margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Dashboard</h3>
            <ul class="breadcrumb breadcrumb-arrows breadcrumb-default">
                <li>
                    <a href="/"><i class="fa fa-home fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-bar-chart-o"></i>Nombres d'inscrit par jour</div>
                </div>
                <div class="panel-body">
                    <div id="chart1" class="jqplot-target" style="width: 90%" ></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-bar-chart-o"></i>Nombres de publications/commentaire par heure</div>
                </div>
                <div class="panel-body">
                    <div id="chart2" class="jqplot-target" style="width: 90%" ></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{--<div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-bar-chart-o"></i>Activités</div>
                </div>
                <div class="panel-body">
                    <div id="chart3" class="jqplot-target" style="width: 90%" ></div>
                </div>
            </div>
        </div>--}}
        <div class="col-md-6">
            <div class="panel panel-feed panel-default">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-th-list"></i>Signalement</div>
                    <div class="panel-tools pull-right">
                        <ul class="nav nav-tabs">
                            <li class="">
                                <a aria-expanded="false" href="#activities-feed" data-toggle="tab">Publications</a>
                            </li>
                            <li class="active">
                                <a aria-expanded="true" href="#users-feed" data-toggle="tab">Commentaires</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="activities-feed" class="tab-pane activities-feed">
                            <div>
                                <div class="fixed-panel">
                                    <ul class="list-group">
                                        @foreach($posts as $post)
                                            <li class="list-group-item">
                                                <a href="{{ route('admin.publication.show', ['publication' => $post->id]) }}">
                                                    @if($post->score < 5)
                                                        <div class="label label-success feed-icon"><i class="fa fa-warning"></i></div>
                                                    @elseif($post->score < 5)
                                                        <div class="label label-warning feed-icon"><i class="fa fa-warning"></i></div>
                                                    @else
                                                        <div class="label label-danger feed-icon"><i class="fa fa-warning"></i></div>
                                                    @endif
                                                        <span>&nbsp;{{ $post->message }}&nbsp;</span>
                                                      <span class="feed-time">
                                                        <em>{{ $post->timeago($post->created_at) }}</em>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane users-feed active" id="users-feed">
                            <div>
                                <div class="fixed-panel">
                                    <ul class="list-group">
                                        @foreach($comments as $comment)
                                            <li class="list-group-item">
                                                <a href="{{ route('admin.publication.show', ['publication' => $comment->publication->id]) }}">
                                                    <img class="feed-avatar" width="55px" alt="{{ $comment->user->firstname.' '.$comment->user->lastname }}" src="{{ $comment->user->picture }}">
                                                    @if($comment->score < 5)
                                                        <div class="label label-success feed-icon"><i class="fa fa-warning"></i></div>
                                                    @elseif($comment->score < 5)
                                                        <div class="label label-warning feed-icon"><i class="fa fa-warning"></i></div>
                                                    @else
                                                        <div class="label label-danger feed-icon"><i class="fa fa-warning"></i></div>
                                                    @endif
                                                    <span>{{ $comment->message }}</span>
                                                    <span class="feed-time">
                                                        <em>{{ $comment->timeago($comment->created_at) }}</em>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
            getRequest('admin/datapublication', function(data) {
                console.log(data);
                var plot1 = $.jqplot("chart2", [data['post'], data['comment']], {
                    seriesColors: ["rgb(247,35, 12)", "rgb(44,117,255)"],
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
                        placement: 'inside'
                    },
                    series: [{label: 'Publications'}, {label: 'Commentaires'}],
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
                            tickInterval: "30 days",
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
            /*getRequest('admin/dataactivite', function(data) {
                var plot1 = $.jqplot("chart3", data, {
                    seriesColors: ["rgb(247,35, 12)", "rgb(44,117,255)"],
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
                    series: [{label: 'Publications'}, {label: 'Commentaires'}],
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
            });*/
        });
    </script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/jquery.jqplot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.dateAxisRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.logAxisRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.canvasTextRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.canvasAxisTickRenderer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/jqplot/plugins/jqplot.highlighter.js') }}"></script>



@endsection
