<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page non trouvée</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/css/social.core.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
        <link href="{{ asset('asset/css/layouts/login2.css') }}" rel="stylesheet">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                margin-top: 150px;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
        </style>
    </head>
    <body class="backgroundsignin">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4">
                <div class="error-page"><i class="fa fa-warning fa-5x"></i>
                    <h1>Page Non Trouvée</h1>
                    <span class="text-danger">
                        <small><strong>Erreur 404</strong></small>
                    </span>
                    <p>Désolé, la page que vous recherchez n'existe pas.</p>
                    <div class="form-group content">
                        <div class="input-group">
                            <a class="btn btn-default" href="{{ url('/') }}" >Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
