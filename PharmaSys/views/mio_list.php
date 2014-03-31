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
        //var mioIdArray = new Array();
        //var count=0;
        $( document ).ready(function() {

            setMIOList();
            /*$.each( mioIdArray, function(i, id) {
                $('#mio'+id).click(function(){
                    $.ajax({
                        type: 'POST',
                        url: 'mio_profile_show.php',
                        data: 'id='+id,
                        dataType: "json", 
                        success: function(data) {
                });
            });*/

            $("li").click(function () {
                $(this).siblings().find(".selected").removeClass("selected");
                $(this).addClass("selected");
            });
            
            $("#mio_list").addClass('selected');
            $("#mio_list").click(function(){
                //alert("MIO List");
                //setMIOList();
                return false;
            });

        });// READY Block end

        function setMIOList(){
            $.ajax({
                type: 'POST',
                url: 'http://localhost/_DatabaseProject/PharmaSys/php/get_mio_list.php',
                dataType: "json", 
                success: function(data) {

                    var mioTable = $("#mio_table");
                    $.each( data, function(i, jObj) {
                        var id=jObj.EMP_ID;
                        id="<a id='mio"+id+"' href='mio_profile_show.php?mio_id="+id+"' >"+id+"</a>";
                        //mioIdArray[count++]=id;

                        var name=jObj.EMP_NAME;
                        var phone_no=jObj.PHONE_NO;
                        var email=jObj.EMAIL;
                        var area_code=jObj.AREA_CODE;
                        //alert(name+", "+email);
                        var address=jObj.HOUSE_NO+", "+jObj.ROAD_NO+", "+jObj.POST_OFFICE+", "+jObj.DISTRICT;
                        mioTable.append('<tr><td>'+id+'</td><td>'+name+'</td><td>'+phone_no+'</td><td>'+email+'</td><td>'+area_code+'</td><td>'+address+'</td></tr>');
                    });
                },
            });// ajax end
        }
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
            <table class="table table-stripped" id="mio_table">
                <thead>
                    <tr>
                        <th>MIO ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Area Code</th>
                        <th>Address</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</body>
</html>
