<!DOCTYPE html>
<html>
<head>
    <title>Demo Pharmaceutical Ltd.</title>
    <!-- Image Slider -->
    <link href="js/image_slider/jsImgSlider/themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/image_slider/jsImgSlider/themes/2/js-image-slider.js" type="text/javascript"></script>

    <!-- CSS -->
    <link href="js/image_slider/jsImgSlider/themes/2/generic.css" rel="stylesheet" type="text/css" />
    <link href="css/Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/styles_touhid.css" rel="stylesheet" type="text/css" />

    <!-- JS -->
    <script src="js/JQuery/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="js/JQuery/jquery.form.js" type="text/javascript"></script>
    <script src="js/touhidJs.js" type="text/javascript"></script>
</head>
<body>
    <?php
        include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
        include 'views/navbar.php';
    ?>

    <div class="container">
        <span>Hello<br><br><br></span>
        <div id="sliderFrame" style="width: 90%;">
            <div id="slider">
                <a href="http://www.google.com/" target="_blank">
                    <img src="images/1.jpg" alt="Welcome to Demo Pharmaceuticals Ltd." />
                </a>
                <a class="lazyImage" href="images/2.jpg" title="This site is created for DB term project."></a>
                <a class="lazyImage" href="images/3.jpg" title="Developers: 1005018 (Touhid), 1005029 (Shovon)"></a>
                <a class="lazyImage" href="images/4.jpg" title="Project Supersisor: Md. Ashiqur Rahman Azim, Lecturer, CSE, BUET"></a>
            </div>
            <!--thumbnails-->
            <div id="thumbs">
                <div class="thumb">
                    <div class="frame"><img src="images/t1.jpg" /></div>
                    <div class="thumb-content"><p>Demo</p>Welcome to Demo Pharma. Ltd.</div>
                    <div style="clear:both;"></div>
                </div>
                <div class="thumb">
                    <div class="frame"><img src="images/t2.jpg" /></div>
                    <div class="thumb-content"><p>DB Term Project</p>Semestar: 3/1 <br>CSE, BUET</div>
                    <div style="clear:both;"></div>
                </div>
                <div class="thumb">
                    <div class="frame"><img src="images/t3.jpg" /></div>
                    <div class="thumb-content"><p>Developers</p>Touhid (1005018)<br>Shovon (1005029)</div>
                    <div style="clear:both;"></div>
                </div>
                <div class="thumb">
                    <div class="frame"><img src="images/t4.jpg" /></div>
                    <div class="thumb-content"><p>Supervisor</p>Md. Ashiqur Rahman Azim, CSE, BUET</div>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
            <div style="clear:both;height:0;"></div>
        </div>


        <div class="div2" id="div_shower">
            <p>As shown by the demo, the thumbnails change their active status while the main image slides, and clicking on an thumbnail will switch the main image.</p>
            <p>If there are lots of thumbnails and the containing block does not have enough room to show them, 
            you can consider showing the thumbnails in multiple columns or rows by tweaking the js-image-slider.css (Example: <a href="http://www.menucool.com/1165/How-to-place-thumbnail-columns-around-both-sides">Place thumbnail columns around slider both sides</a>). 
            Another solution is to make the slider work together with Menucool jQuery Slider. 
            See <a href="http://www.menucool.com/slider/jquery-slideshow">jQuery Slideshow</a>.</p>
            <p>Visit online <a href="http://www.menucool.com/slider/javascript-image-slider-demo2">Demo 2</a> and 
            <a href="http://www.menucool.com/javascript-image-slider" target="_blank">JavaScript Image Slider</a> for detailed instructions.</p>
            <p>This demo requires a license for its advanced features.</p>
        </div>

        <div id="toPopup" style="background-color: #C8C8C8; vertical-align: center;display:none">
            <div class="close"></div>
            <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
            <div id="popup_content" style="vertical-align: center;">
                <!--your content start-->
                <div style="vertical-align: center;">  <h3>Sign In </h3></div>
                <form id="form_signin" action="php/signin.php" method="POST">
                    <div class="input-group" style="margin 50px;">
                      <span class="input-group-addon">User ID:   &nbsp;&nbsp;</span>
                      <input type="text" name="u_id" id="u_id" class="form-control" placeholder="User ID">
                    </div>
                    <div class="input-group" style="margin 50px;">
                      <span class="input-group-addon">Password: </span>
                      <input type="text" name="u_pwd" id="u_pwd" class="form-control" placeholder="Password">
                      <span class="input-group-btn">
                        <input type="submit" id="btn_sign_in_f" class="btn btn-default" value="Sign In"/>
                      </span>
                    </div>
                </form>
                <img style="display:none; float: center;" id="loader" src="images/loading.gif" alt="Loading...." title="Loading...." />
            </div> <!--your content end-->
        </div> <!--toPopup end-->
    </div>
</body>
</html>
