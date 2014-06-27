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
            
            $("#add_product").addClass('selected');
            $("#add_product").click(function(){
                alert("New Product Entry");
                //setMIOList();
                return false;
            });

            var fn = $('#form_new_prod');
            var ln = $('#loader'); // loder.gif image
            $( "#save_prod" ).click(function() {
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

            <h1 style="text-align: center;">New Product Entry Form</h1><br><br>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />

            <form  id="form_new_prod" action="http://localhost/_DatabaseProject/PharmaSys/php/insert_new_prod.php" method="POST" >

                <div class="form-group">
                    <label for="prod_name" class="col-sm-2 control-label">Product Name:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="prod_name" id="prod_name" placeholder="Full Name"/></br>
                </div>

                <div class="form-group">
                    <label for="prod_code" class="col-sm-2 control-label">Product Code:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="prod_code" id="prod_code" placeholder="Product Code"/></br>
                </div>

                <div class="form-group">
                    <label for="prod_origin" class="col-sm-2 control-label">Product Origin.:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="prod_origin" id="prod_origin"placeholder="Product Origin."/></br>
                </div>

                <div class="form-group">
                    <label for="prod_catg" class="col-sm-2 control-label">Product Category.:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="prod_catg" id="prod_catg" placeholder="Product Category."/></br>
                </div>

                <div class="form-group">
                    <label for="pack_size" class="col-sm-2 control-label">Pack Size:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="pack_size" id="pack_size" placeholder="Pack Size"/></br>
                </div>

                <div class="form-group">
                    <label for="trade_price" class="col-sm-2 control-label">Trade Price (BDT):</label>
                    <input class="form-control" style="width: 75%;" type="text" name="trade_price" id="trade_price" placeholder="Trade Price (BDT)"/></br>
                </div>

                <div class="form-group">
                    <label for="tpv" class="col-sm-2 control-label">Trade Price Including Vat(BDT):</label>
                    <input class="form-control" style="width: 75%;" type="text" name="tpv" id="tpv" placeholder="Trade Price Including Vat(BDT)"/></br>
                </div>

                <div align="center">
                    <div class="form-group" style="align:center;">
                        <input type="submit" id="save_prod" name="save_doc" class="btn btn-primary" value="Save Pharmacy"/>
                    </div>
                </div>

            </form>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />
            </div>
    </div>
</body>
</html>