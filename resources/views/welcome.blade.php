<!DOCTYPE html>
<html lang="uk" dir="ltr"
      prefix="content: http://purl.org/rss/1.0/modules/content/ dc: http://purl.org/dc/terms/ foaf: http://xmlns.com/foaf/0.1/ og: http://ogp.me/ns# rdfs: http://www.w3.org/2000/01/rdf-schema# sioc: http://rdfs.org/sioc/ns# sioct: http://rdfs.org/sioc/types# skos: http://www.w3.org/2004/02/skos/core# xsd: http://www.w3.org/2001/XMLSchema#">
<head>
    <link rel="profile" href="http://www.w3.org/1999/xhtml/vocab"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="http://dochub.com.ua/sites/default/files/imgologo_0_0.jpg" type="image/jpeg"/>
    <meta name="Generator" content="Drupal 7 (http://drupal.org)"/>
    <title>Welcome to DocHubs | DocHubs</title>
    <link type="text/css" rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.7/css/bootstrap.css" media="all"/>
    <style>
        @import url("http://dochub.com.ua/sites/all/themes/bootstrap/css/3.3.7/overrides.min.css?p3eynk");
        @import url("http://dochub.com.ua/sites/all/themes/dochubpro/css/style.css?p3eynk");
    </style>
    <style>
        @import url("http://dochub.com.ua/sites/default/files/fontyourface/font.css?p3eynk");
    </style>
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Oswald:regular|Roboto+Condensed:300,regular&amp;subset=cyrillic"
          media="all"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link type="text/css" rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 element support for IE6-8 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <![endif]-->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <script>document.createElement("picture");</script>
</head>
<body class="html front not-logged-in no-sidebars page-node i18n-uk">
<header id="navbar" role="banner" class="navbar container navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="logo navbar-btn " href="/uk" title="Головна">
                <img src="{{ asset('img/dochub.jpg') }}" alt="Головна"/>
            </a>
            <a class="logo navbar-btn " href="/uk" title="Головна">
                <img src="{{ asset('img/evro.jpg') }}" alt="Головна"/>
            </a>
            <a href="http://www.hneu.edu.ua/">
                <img src="https://upload.wikimedia.org/wikipedia/uk/0/03/Logo_KhNUE.jpg" alt="Hneu" class="hneu">
            </a>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-collapse">
            <nav role="navigation">
                <ul class="menu nav navbar-nav secondary">
                    <li class="first expanded"><a href="#block-views-main-page-baner-block">Про проект</a></li>
                    <li class="leaf"><a href="#news" title="">Події</a></li>
                    <li class="leaf"><a href="#reports" title="">Звіти</a></li>
                    <li class="leaf"><a href="#contact" title="">Контакти</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<div class="region region-wide-content">
    <section id="block-views-main-page-baner-block" class="block block-views clearfix">


        <div class="view view-main-page-baner">


            <div class="view-content">
                <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
                    <div id="hero" style="background: url(//dochub.com.ua/sites/default/files/unit-picture/14/books_shelfh_2.jpg) no-repeat top center;">
                        <div class="main_hero">
                            <h2>DocHub Project</h2>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <div class="container">
        <section class="block" id="news">
            <h2 class="text-center section-heading">Новини та події</h2>
            <div class="row">
                <div class="events owl-carousel owl-theme">
                    @foreach($news as $report)
                        <?php $file = File::exists(public_path("uploads/news/{$report->id}.jpg")) ? asset("/uploads/news/$report->id.jpg") : asset('img/no.jpg') ?>
                        <div class="item" data-name="{{ $report->name }}"
                             data-img="{{ $file }}"
                             data-id="{{ $report->id }}"
                             data-desc="{{ $report->desc }}"
                             data-date="{{ \Carbon\Carbon::parse($report->date)->format('d.m.Y') }}"
                             data-place="{{ $report->place }}"
                        >
                            <div>
                                <div class="newsfront">
                                    <a href="#">
                                        <a href="#">
                                            <img class="img-responsive" src="{{ $file }}"
                                                 style="height: 450px;" alt=""/>
                                        </a>
                                    </a>
                                </div>
                            </div>
                            <div>
                            <span class="front-news-title">
                                <a href="#" class="detail">{{ $report->name }}
                                </a>
                            </span>
                            </div>
                            <div>
                                <div class="event-mark">Подія</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <hr style="margin-top: 50px;">

        <section class="block" id="reports">
            <div class="container">
                <h2 class="text-center section-heading">Звіти</h2>
                <div class="row">
                    <div class="events owl-carousel owl-theme">
                        @foreach($reports as $report)
                            <?php $file = File::exists(public_path("uploads/reports/{$report->id}.jpg")) ? asset("/uploads/reports/$report->id.jpg") : asset('img/no.jpg') ?>
                            <div class="item" data-name="{{ $report->name }}"
                                 data-img="{{ $file }}"
                                 data-desc="{{ $report->desc }}"
                                 data-date="{{ \Carbon\Carbon::parse($report->date)->format('d.m.Y') }}"
                            >
                                <div>
                                    <div class="newsfront">
                                        <a href="#">
                                            <img class="img-responsive" src="{{ $file }}"
                                                 style="height: 450px;" alt=""/>
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <span class="front-news-title text-center" style="margin-top: 50px;">
                                        <p>
                                            {{ $report->name }}
                                            <a href="#" class="detail" style="color:#F2DF7E;">Детальніше</a>
                                        </p>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <hr style="margin: 50px 0;">

        <section style="display: none;" id="content">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-3">
                        <div class="img-responsive">
                            <img src="/img" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h2 class="text-center heading">Заголовок</h2>
                        <p class="content">
                        </p>
                    </div>
                </div>
                <i class="fa fa-calendar" style="font-size: 35px; margin-top: 10px;"><h3 class="date" style="display: inline-block; margin-left: 10px;">
                        02.02.2018</h3></i><br>
                <i class="fa fa-map-marker place"
                   style="font-size: 35px; margin-top: 5px; margin-left: 6px; margin-right: 10px;">
                    <h3 style="display: inline-block; margin-left: 10px;"></h3>
                </i>
                <div class="text-center">
                    <button class="btn btn-success btn-lg" data-id="0" id="come">Я прийду!</button>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="text-center">
                <h1>Вже <strong id="comes">{{ $totalVis }}</strong> людей беруть участь у наших івентах</h1>
                <h3>Підпишись, щоб першим дізнатися про них</h3>
                <form class="form-inline" style="margin: 30px 0;" id="subscribe">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" id="exampleInputEmail2"
                               placeholder="Введіть E-mail" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg">Підписатись</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="block-footer">
    <footer class="footer container" id="contact">
        <div class="region region-footer">
            <section id="block-block-4" class="block block-block clearfix">
                <div class="text-center">
                    Контакти: <br>
                    +380-66-043-50-70<br>
                    mail@gmail.com
                    <br><br>
                    © DocHub Project Erasmus+, 2018
                </div>
            </section>
        </div>
    </footer>
</div>
<script src="http://dochub.com.ua/sites/all/modules/picture/picturefill2/picturefill.min.js?v=2.3.1"></script>
<script src="http://dochub.com.ua/sites/all/modules/picture/picture.min.js?v=7.56"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var subscr = '{{ route('subscribe') }}';
    var come = '{{ route('come') }}';
    $(document).ready(function () {
        $('.detail').on('click', function (e) {
            e.preventDefault();

            var $item = $(this).closest('.item');
            var $jumb = $('.jumbotron');

            $jumb.find('img').attr('src', $item.data('img'));
            $jumb.find('.heading').html($item.data('name'));
            $jumb.find('.content').html($item.data('desc'));
            $jumb.find('.date').html($item.data('date'));

            if ($item.data('place')) {
                $jumb.find('.place h3').html($item.data('place'));
                $jumb.find('.place').show();
                $jumb.find('.btn').data('id', $item.data('id'));
                $jumb.find('.btn').show();
            } else {
                $jumb.find('.place').hide();
                $jumb.find('.btn').hide();
            }

            $jumb.closest('section').show();

            $('html, body').animate({
                scrollTop: $("#content").offset().top
            }, 1000);
        });

        $('#subscribe').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
                url: subscr,
                dataType: 'json',
                method: 'GET',
                data: form.serialize()
            }).done(function () {
                swal('Ви успішно підписалися!');
                form[0].reset();
            });
        });

        $('#come').on('click', function (e) {
            var btn = $(this);
            var id = $(this).data('id');

            $.ajax({
                url: come + '/?id=' + id,
                dataType: 'json',
                method: 'GET',
            }).done(function () {
                swal('Чекаємо на Вас!');
                var comes = $('#comes');
                var c = +comes.html();
                comes.html(++c);
                btn.hide();
            });
        });
    });
</script>
</body>
</html>
