<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo Pharmaceutical Ltd.</title>
    <!-- Image Slider -->
    <link href="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/js-image-slider.js" type="text/javascript"></script>

    <!-- CSS -->
    <link href="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/generic.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/styles_touhid.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/Bootstrap/simple-sidebar/css/simple-sidebar.css" rel="stylesheet">

    <!-- JS -->
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/JQuery/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/JQuery/jquery.form.js" type="text/javascript"></script>
    <!--<script src="http://localhost/_DatabaseProject/PharmaSys/js/manager_view.js" type="text/javascript"></script>-->
</head>
<body>

    <div id="wrapper">

        <?php
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>
    <!-- <div class="page-content-wrapper">
        <span>hello<br><br><br><br><br>salam</span>
        <div id="d_body">
        </div>
        <button id="bt" class="btn-primary">click</button>
    </div> -->
        <div id="page-content-wrapper"><br><br><br><br>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div  style="float: left;" id="d_body">
                        Product List
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
