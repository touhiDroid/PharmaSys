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
            
            $("#new_emp_entry").addClass('selected');
            $("#new_emp_entry").click(function(){
                alert("New employee entry");
                //setMIOList();
                return false;
            });

            var fn = $('#form_new_emp');
            var ln = $('#loader'); // loder.gif image
            $( "#save_emp" ).click(function() {
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

            <h1 style="text-align: center;">New Employee Entry Form</h1><br><br>

            <form  id="form_new_emp" action="http://localhost/_DatabaseProject/PharmaSys/php/insert_new_emp.php" method="POST" >

                <div class="form-group">
                    <label for="emp_name" class="col-sm-2 control-label">Employee Name:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="emp_name" id="emp_name" placeholder="Full Name"/></br>
                </div>
                <div class="form-group">
                    <label for="emp_pwd" class="col-sm-2 control-label">Password:</label>
                    <input class="form-control" style="width: 50%;" type="password" name="emp_pwd" id="emp_pwd"placeholder="Password To Be Provided"/></br>
                </div>

                <div class="form-group">
                    <label for="emp_type" class="col-sm-2 control-label">Employee Type:</label>
                    <select id="emp_type" name="emp_type"  class="form-control"  style="width: 50%;" placeholder="Select">
                        <option value="DEPOT MANAGER" class="down">Depot Manager</option>
                        <option value="MIO MANAGER" class="down">MIO Manager</option>
                        <option value="MIO" class="down">MIO</option>
                    </select><br>
                </div>

                <div class="form-group">
                    <label for="emp_house" class="col-sm-2 control-label">House No:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="emp_house" id="emp_house" placeholder="House No"/></br>
                </div>

                <div class="form-group">
                    <label for="emp_road" class="col-sm-2 control-label">Road No:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="emp_road" id="emp_road" placeholder="Road No"/></br>
                </div>

                <div class="form-group">
                    <label for="post_office" class="col-sm-2 control-label">Post Office:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="post_office" id="post_office" placeholder="Post Office"/></br>
                </div>

                <div class="form-group">
                    <label for="emp_district" class="col-sm-2 control-label">District:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="emp_district" id="emp_district" placeholder="District"/></br>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Phone Number:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="phone" id="phone" placeholder="Phone No"/></br>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="email" id="email" placeholder="Email Address"/></br>
                </div>

                <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label">Gender:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="gender" id="gender" placeholder="Gender"/></br>
                </div>

                <div class="form-group">
                    <label for="join_date" class="col-sm-2 control-label">Join Date:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="join_date" id="join_date" placeholder="DD-MMM-YY"/></br>
                </div>

                <div class="form-group">
                    <label for="birth_date" class="col-sm-2 control-label">Birth Date:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="birth_date" id="birth_date" placeholder="DD-MMM-YY"/></br>
                </div>

                <div class="form-group">
                    <label for="area_code" class="col-sm-2 control-label">Area Code:</label>
                    <input class="form-control" style="width: 50%;" type="text" name="area_code" id="area_code" placeholder="Area Code"/></br>
                </div>

                <div class="form-group">
                    <p>Please specify a file:
                    <input class="form-control" style="width: 50%;" type="file" name="emp_cv" size="40"></p>
                </div>

                <div class="form-group" style="align:center;">
                    <input type="submit" id="save_emp" name="save_emp" class="btn btn-primary" value="Save Employee"/>
                </div>

            </form>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />

        </div>
    </div>
</body>
</html>
