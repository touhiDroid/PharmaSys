<!DOCTYPE html>
<html>
<head>
    <title>Demo Pharmaceutical Ltd.</title>

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

            $("li").click(function () {
                $(this).siblings().find(".selected").removeClass("selected");
                $(this).addClass("selected");
            });
            
            $("#add_pharmacy").addClass('selected');
            $("#add_pharmacy").click(function(){
                alert("New Pharmacy Entry");
                //setMIOList();
                return false;
            });

            var fn = $('#form_new_pharm');
            var ln = $('#loader'); // loder.gif image
            $( "#save_pharm" ).click(function() {
                fn.ajaxForm({
                    beforeSend: function(){
                        //alert("beforeSend");
                        ln.show();
                        /*var name=$('#emp_name').val();*/
                    },
                    success: function(e){
                        alert(e+" : success code achieved");
                        ln.hide();
                        fn.resetForm();
                    },
                    error: function(e){
                        alert("error");
                    }
                });
            });

        });// READY Block end
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

            <h1 style="text-align: center;">New Pharmacy Entry Form</h1><br><br>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />

            <form  id="form_new_pharm" action="http://localhost/_DatabaseProject/PharmaSys/php/insert_new_pharm.php" method="POST" >

                <div class="form-group">
                    <label for="pharm_name" class="col-sm-2 control-label">Pharmacy Name:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="pharm_name" id="pharm_name" placeholder="Full Name"/></br>
                </div>

                <div class="form-group">
                    <label for="area_code" class="col-sm-2 control-label">Area Code:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="area_code" id="area_code" placeholder="Area Code"/></br>
                </div>

                <div class="form-group">
                    <label for="pharm_house" class="col-sm-2 control-label">House No.:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="pharm_house" id="pharm_house"placeholder="House No."/></br>
                </div>

                <div class="form-group">
                    <label for="pharm_road" class="col-sm-2 control-label">Road No.:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="pharm_road" id="pharm_road" placeholder="Road No."/></br>
                </div>

                <div class="form-group">
                    <label for="post_office" class="col-sm-2 control-label">Post Office:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="post_office" id="post_office" placeholder="Post Office"/></br>
                </div>

                <div class="form-group">
                    <label for="pharm_district" class="col-sm-2 control-label">District:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="pharm_district" id="pharm_district" placeholder="District"/></br>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone Number:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="phone" id="phone" placeholder="Phone No"/></br>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="email" id="email" placeholder="Email Address"/></br>
                </div>

                <div class="form-group">
                    <label for="sapd" class="col-sm-2 control-label">Sell Amount Per Day:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="sapd" id="sapd" placeholder="Sell Amount Per Day"/></br>
                </div>

                <div class="form-group">
                    <label for="est_date" class="col-sm-2 control-label">Established Date:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="est_date" id="est_date" placeholder="DD-MMM-YY"/></br>
                </div>

                <div align="center">
                    <div class="form-group" style="align:center;">
                        <input type="submit" id="save_pharm" name="save_doc" class="btn btn-primary" value="Save Pharmacy"/>
                    </div>
                </div>

            </form>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />
            </div>
    </div>
</body>
</html>