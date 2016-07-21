<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-quiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Livescore</title>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.13/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="/js/stats.js"></script>
</head>
<body class="livescore">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <div class="logo">
                        <img src="/images/postnordlogo.png">
                    </div>
                </div>
                <div class="col-xs-6 text-right">
                    Heat: <span class="heat-number">1</span>
                </div>
            </div>
        </div>
    </header>
    <section class="player-score">
        <div class="section-grid">
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
        </div>
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="player-list">
                            <li>
                                <div class="left">
                                    <img src="/images/kasper.png">
                                    <span>Tid:</span>
                                </div>
                                <div class="right">
                                    <div class="sections">
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                        <div class="section"></div>
                                    </div>
                                    <div class="time">
                                        <span class="progress" data-progress="0"></span>
                                        <span class="counter"><span class="minutes">00</span>:<span class="seconds">00</span></span>
                                    </div>
                                </div>
                                <div class="end">
                                    <span class="total">13.7 km/l</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="live-trucks">
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        live lastbiler
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="live-vans">
        <div class="outer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        live vans
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>