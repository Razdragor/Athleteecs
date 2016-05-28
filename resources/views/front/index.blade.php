@extends('layouts.app')

@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="row timeline-facebook">
                <div class="col-md-8">
                    <!-- //Notice .timeline-panel class-->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- //Notice .timeline-2-cols class-->
                <ul class="timeline-2-cols">
                    <li>
                        <!-- //Notice .timeline-badge class-->
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record"></i>
                            </a>
                        </div>
                        <!-- //Notice .timeline-panel class-->
                        <div class="timeline-panel">
                            <a href="#" class="pull-left">
                                <!-- //Notice .timeline-panel-avatar class-->
                                <img src="{{asset('asset/img/avatars/avatar-55.png')}}" alt="Julio Marquez" class="timeline-panel-avatar">
                            </a>
                            <!-- //Notice .timeline-panel-body class-->
                            <!-- //Notice .timeline-panel-message class-->
                            <div class="timeline-panel-body timeline-panel-message">
                                <form role="form">
                                    <!-- //Notice .new-message class-->
                                    <textarea id="new-message" placeholder="What&quot;s happening, User?" rows="3" class="new-message form-control" style="resize: none;"></textarea>
                                    <div class="form-actions">
                                        <div class="btn-group">
                                            <a data-original-title="" class="btn btn-default"><i class="fa fa-map-marker"></i>
                                            </a>
                                            <a data-original-title="" class="btn btn-default"><i class="fa fa-camera"></i>
                                            </a>
                                        </div>
                                        <button type="button" class="btn btn-primary pull-right">Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <!-- //Notice .timeline-inverted class-->
                    <li class="timeline-inverted">
                        <!-- //Notice .timeline-badge class-->
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record invert"></i>
                            </a>
                        </div>
                        <!-- //Notice .timeline-panel class-->
                        <div class="timeline-panel">
                            <!-- //Notice .timeline-heading class-->
                            <div class="timeline-heading">
                                <img src="http://lorempixel.com/800/250/sports/5/" alt="Image" class="img-responsive">
                            </div>
                            <!-- //Notice .timeline-body class-->
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis
                                    quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                            <!-- //Notice .timeline-footer class-->
                            <div class="timeline-footer">
                                <!---->
                                <a href="#"><i class="fa fa-thumbs-up"></i>
                                </a>
                                <!---->
                                <a href="#"><i class="fa fa-comment"></i>
                                </a>
                                <!---->
                                <a href="#"><i class="fa fa-share"></i>
                                </a>
                                <!---->
                                <a class="late-reading">Continue Reading</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record"></i>
                            </a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img src="http://lorempixel.com/800/250/sports/5/" alt="Image" class="img-responsive">
                            </div>
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis
                                    quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                            <div class="timeline-footer">
                                <a href="#"><i class="fa fa-thumbs-up"></i>
                                </a>
                                <a href="#"><i class="fa fa-comment"></i>
                                </a>
                                <a href="#"><i class="fa fa-share"></i>
                                </a>
                                <a class="late-reading">Continue Reading</a>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record invert"></i>
                            </a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis
                                    quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                            <div class="timeline-footer">
                                <a href="#"><i class="fa fa-thumbs-up"></i>
                                </a>
                                <a href="#"><i class="fa fa-comment"></i>
                                </a>
                                <a href="#"><i class="fa fa-share"></i>
                                </a>
                                <a class="late-reading">Continue Reading</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record"></i>
                            </a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img src="http://lorempixel.com/800/250/sports/5/" alt="Image" class="img-responsive">
                            </div>
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis
                                    quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                            <div class="timeline-footer">
                                <a href="#"><i class="fa fa-thumbs-up"></i>
                                </a>
                                <a href="#"><i class="fa fa-comment"></i>
                                </a>
                                <a href="#"><i class="fa fa-share"></i>
                                </a>
                                <a class="late-reading">Continue Reading</a>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record invert"></i>
                            </a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <img src="http://lorempixel.com/800/250/sports/2" alt="Image" class="img-responsive">
                            </div>
                            <div class="timeline-body">
                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis
                                    quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            </div>
                            <div class="timeline-footer primary">
                                <a href="#"><i class="fa fa-thumbs-up"></i>
                                </a>
                                <a href="#"><i class="fa fa-comment"></i>
                                </a>
                                <a href="#"><i class="fa fa-share"></i>
                                </a>
                                <a class="late-reading">Continue Reading</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge primary">
                            <a href="#"><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record invert"></i>
                            </a>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p><b>All the credits go to<a href="http://bootsnipp.com/rafamaciel">Rafamaciel</a></b>
                                </p>
                                <p>I only make it responsive and remove the empty spaces to be more like Facebook timeline!</p>
                            </div>
                            <div class="timeline-footer primary">
                                <a href="#"><i class="fa fa-thumbs-up"></i>
                                </a>
                                <a href="#"><i class="fa fa-comment"></i>
                                </a>
                                <a href="#"><i class="fa fa-share"></i>
                                </a>
                                <a class="late-reading">Continue Reading</a>
                            </div>
                        </div>
                    </li>
                    <li style="float: none;" class="clearfix"></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
