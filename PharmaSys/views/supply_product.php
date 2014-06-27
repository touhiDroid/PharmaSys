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
                $(this).siblings().find(".active").removeClass("active");
                $(this).addClass("active");
            });
            
            $("#supply_product").addClass('active');
            $("#supply_product").click(function(){
                alert("New Supply Entry");
                return false;
            });

            $.ajax({
                url: 'http://localhost/_DatabaseProject/PharmaSys/views/php/get_supplied_stock.php',
                dataType: "json", 
                success: function(data) {
                    alert("Scuccess data received as: "+data);
                },
            });// ajax end

            /*$("#add_product").click(function(){
                var prod_id=("#new_product").val();
                ("#new_product").val('');

            });
            $("#add_product").submit(function(){
                return false;
            });*/

            var fn = $('#form_new_stock');
            var ln = $('#loader'); // loder.gif image
            $( "#save_stock" ).click(function() {
                fn.ajaxForm({
                    beforeSend: function(){
                        //alert("beforeSend");
                        ln.show();
                        /*var name=$('#emp_name').val();*/
                    },
                    success: function(e){
                        alert(e+": success code achieved");
                        ln.hide();
                        fn.resetForm();
                    },
                    error: function(e){
                        alert("error");
                    }
                });
            });

        });// READY DONE
    </script>
</head>
<body>

    <div id="wrapper">

        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
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
            <h1 style="text-align: center;">New Supply Entry Form</h1><br><br>

            <form  id="form_new_stock" action="http://localhost/_DatabaseProject/PharmaSys/php/insert_new_stock.php" method="POST" >

                <div class="form-group">
                    <label for="stock_id" class="col-sm-2 control-label">Stock Id:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="stock_id" id="stock_id" placeholder="Stock ID"/></br>
                </div>
                <div class="form-group">
                    <label for="depot_id" class="col-sm-2 control-label">Depot Id:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="depot_id" id="depot_id" placeholder="Depot ID"/></br>
                </div>
                <div class="form-group">
                    <label for="products" class="col-sm-2 control-label">Added Products:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="products" id="products" placeholder="Comma Separated Product IDs with quantity preceded : as - TABN1:20,TABN23:12"/></br>
                </div>

                <div class="form-group" style="float: center;">
                    <input type="submit" id="save_stock" name="save_emp" class="btn btn-primary" value="Save Employee"/>
                </div>

            </form>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />
            <table class="table table-stripped" id="stock_table">
                <thead>
                    <tr>
                        <th>Depot ID</th>
                        <th>Stock ID</th>
                        <th>Prouct Code</th>
                        <th>Quantity</th>
                        <th>Supply Date</th>
                        <th>Receive Date</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</body>
</html>