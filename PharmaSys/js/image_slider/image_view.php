<!DOCTYPE html>
<html>
<head>
    <title>News Image Slider</title>

    <script type="text/javascript" src="file:///android_asset/JQuery/jquery-1.9.1.js"></script>
    <script src="file:///android_asset/news_slider/themes/newsJs.js" type="text/javascript"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            //console.log("construct calling");
            constructTheNewsPage();
        });
    </script>

    <link href="file:///android_asset/news_slider/themes/js-image-slider.css" rel="stylesheet" type="text/css" />
    <link href="file:///android_asset/news_slider/generic.css" rel="stylesheet" type="text/css" />
    <script src="file:///android_asset/news_slider/themes/js-image-slider.js" type="text/javascript"></script>
</head>
<body style = "background: #FFFFCC;">
    <div id="sliderFrame">
        <div id="slider">
        </div>
        <div id="htmlcaption" style="display: none;">
            You can also go to this link : <a href="http://www.durbinbd.org/">Durbin</a>
        </div>
    </div>

</body>
</html>
