<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
$q = "hanoi";
$units = "metric";
$appid = "924d5fbdb9605c1d223691266ca93e9d";
$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $q . "&units=" . $units . "&appid=" . $appid;

$request = file_get_contents($url);
$data = json_decode($request);
$currentTime = time();
?>

<!doctype html>
<html>
<head>
    <title>Forecast Weather using OpenWeatherMap with PHP</title>

    <style>
        body {
            font-family: Arial;
            font-size: 0.95em;
            color: #929292;
        }

        .report-container {
            border: #E0E0E0 1px solid;
            padding: 20px 40px 40px 40px;
            border-radius: 2px;
            width: 550px;
            margin: 0 auto;
        }

        .weather-icon {
            vertical-align: middle;
            margin-right: 20px;
        }

        .weather-forecast {
            color: #212121;
            font-size: 1.2em;
            font-weight: bold;
            margin: 20px 0px;
        }

        span.min-temperature {
            margin-left: 15px;
            color: #929292;
        }

        .time {
            line-height: 25px;
        }
    </style>

</head>
<body>

<div class="report-container">
    <h2><?php echo $data->name; ?> Weather Status</h2>
    <div class="time">
        <div><?php echo date("l g:i a", $currentTime); ?></div>
        <div><?php echo date("jS F, Y", $currentTime); ?></div>
        <div><?php echo ucwords($data->weather[0]->description); ?></div>
    </div>
    <div class="weather-forecast">
        <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon"/> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
    </div>
    <div class="time">
        <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
        <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
    </div>
</div>


</body>
</html>