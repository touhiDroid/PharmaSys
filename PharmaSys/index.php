<!DOCTYPE html>
<html>
<head>
    <title>Demo Pharmaceutical Ltd.</title>
    <link href="js/image_slider/jsImgSlider/themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/image_slider/jsImgSlider/themes/2/js-image-slider.js" type="text/javascript"></script>
    <link href="js/image_slider/jsImgSlider/themes/2/generic.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <div id="sliderFrame">
        <div id="slider">
            <a href="http://www.menucool.com/jquery-slider" target="_blank">
                <img src="images/1.jpg" alt="Welcome to jQuery Slider" />
            </a>
            <a class="lazyImage" href="images/2.jpg" title="Pure Javascript. No jQuery. No Flash.">Pure JavaScript</a>
            <a href="http://www.menucool.com/javascript-image-slider"><b data-src="images/3.jpg">Image Slider</b></a>
            <a class="lazyImage" href="images/4.jpg" title="">Slide 4</a>
        </div>
        <!--thumbnails-->
        <div id="thumbs">
            <div class="thumb">
                <div class="frame"><img src="images/t1.jpg" /></div>
                <div class="thumb-content"><p>HTML Content</p>Thumbnails allows any HTML content</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="images/t2.jpg" /></div>
                <div class="thumb-content"><p>Customizable</p>Thumbnail style is customizable</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="images/t3.jpg" /></div>
                <div class="thumb-content"><p>Variety of Layouts</p>Just a CSS tweak.</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="images/t4.jpg" /></div>
                <div class="thumb-content"><p>Integration</p>Built-in functions for the thumbnails</div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
        <div style="clear:both;height:0;"></div>
    </div>
    <div class="div2">
        <p>As shown by the demo, the thumbnails change their active status while the main image slides, and clicking on an thumbnail will switch the main image.</p>
        <p>If there are lots of thumbnails and the containing block does not have enough room to show them, 
        you can consider showing the thumbnails in multiple columns or rows by tweaking the js-image-slider.css (Example: <a href="http://www.menucool.com/1165/How-to-place-thumbnail-columns-around-both-sides">Place thumbnail columns around slider both sides</a>). 
        Another solution is to make the slider work together with Menucool jQuery Slider. 
        See <a href="http://www.menucool.com/slider/jquery-slideshow">jQuery Slideshow</a>.</p>
        <p>Visit online <a href="http://www.menucool.com/slider/javascript-image-slider-demo2">Demo 2</a> and 
        <a href="http://www.menucool.com/javascript-image-slider" target="_blank">JavaScript Image Slider</a> for detailed instructions.</p>
        <p>This demo requires a license for its advanced features.</p>        
    </div>
</body>
</html>
