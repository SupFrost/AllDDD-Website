<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link href='./css/fullcalendar.css' rel='stylesheet'/>
    <link href='./css/fullcalendar.print.css' rel='stylesheet' media='print'/>
    <script src='./js/moment.min.js'></script>
    <script src='./js/jquery.min.js'></script>
    <script src='./js/fullcalendar.min.js'></script>
    <script src='./js/gcal.js'></script>
    <script src='./js/lang/nl.js'></script>
    <link type="text/css" href="js/calendar%20theme/jquery-ui.theme.css" rel="stylesheet">
    <script>

        $(document).ready(function () {

            $('#calendar').fullCalendar({

                googleCalendarApiKey: 'AIzaSyCyZQEIdq_Sp2tOs_3ijLYdnPBpILnucyQ',
                // 'developer_key' => 'AIzaSyCyZQEIdq_Sp2tOs_3ijLYdnPBpILnucyQ',


                events: {
                    googleCalendarId: 'p5c5n16v2fnjk11a31a1kns9n0@group.calendar.google.com'
                },
                firstDay: 1

            });

        });


    </script>
    <style>

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>

</head>
<body id="page1" style="min-height:100%; position:relative;">
<!--header -->
<div class="lists">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/premade/Menu.php"; ?>
    </header>

    <section class="content">


        <div id='loading'>loading...</div>

        <div id='calendar'></div>

    </section>
</div>
<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>