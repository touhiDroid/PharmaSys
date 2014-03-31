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

    <script type="text/javascript">
        $( document ).ready(function() {
            $("li").click(function () {
                $(this).siblings().find(".selected").removeClass("selected");
                $(this).addClass("selected");
            });
            $("#my_profile").addClass('selected');
            setProfile();
            $("#my_profile").click(function(){
                //alert("Profile");
                setProfile();
                return false;
            });// MY PROFILE END

            /*$("#product_list").click(function(){
                alert("redirecting..");
                window.location = 'http://localhost/_DatabaseProject/PharmaSys/views/postorder.php';
            });*/
            function setProfile(){
                //$("#my_profile").
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/_DatabaseProject/PharmaSys/php/get_cur_profile.php',
                    dataType: "json", 
                    success: function(data) {
                        //alert(data[1]);
                        $("#d_body").html(
                            'Name: '+data[3]+'<br>'
                            +'Type: '+data[2]+'<br>'
                            +'Phone No.: '+data[8]+'<br>'
                            +'Email: '+data[9]+'<br>'
                            +'Salary: '+data[10]+'<br>'
                            +'Join Date: '+data[12]+'<br>'
                            +'Birth Date: '+data[13]+'<br>'
                            +'Area code: '+data[14]+'<br>'
                            +'House No: '+data[4]+'<br>'
                            +'Road No: '+data[5]+'<br>'
                            +'Post Office: '+data[6]+'<br>'
                            +'District: '+data[7]+'<br>'
                            );
                    },
                });
            }// setProfile() End

        });// READY Block end

        /*function setProfile(dataRow){
            alert(dataRow[3]+" : some from dataRow");
            document.getElementById("d_body").innerHTML="New text!";
        }*/
    </script>
</head>

<body>

    <div id="wrapper">
        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>

        <div id="page-content-wrapper"><br><br><br>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div style="float: left;">
                        <img src="http://localhost/_DatabaseProject/PharmaSys/images/pro_pic.png" alt="Manager" />
                    </div>
                    <div  style="float: left;" id="d_body">
                        body.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
