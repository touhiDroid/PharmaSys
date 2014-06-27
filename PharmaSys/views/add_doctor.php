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

            var fn = $('#form_new_doc');
            var ln = $('#loader'); // loder.gif image
            $( "#save_doc" ).click(function() {
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

            <h1 style="text-align: center;">New Doctor Entry Form</h1><br><br>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />

            <form  id="form_new_doc" action="http://localhost/_DatabaseProject/PharmaSys/php/insert_new_doc.php" method="POST" >

                <div class="form-group">
                    <label for="doc_name" class="col-sm-2 control-label">Doctor Name:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="doc_name" id="doc_name" placeholder="Full Name"/></br>
                </div>

                <div class="form-group">
                    <label for="degree" class="col-sm-2 control-label">Degree:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="degree" id="degree" placeholder="Degree"/></br>
                </div>

                <div class="form-group">
                    <label for="spec" class="col-sm-2 control-label">Speciality:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="spec" id="spec" placeholder="Speciality"/></br>
                </div>

                <div class="form-group">
                    <label for="inst" class="col-sm-2 control-label">Institution:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="inst" id="inst" placeholder="Institution"/></br>
                </div>

                <div class="form-group">
                    <label for="npat_pd" class="col-sm-2 control-label">Number of Patients/Day:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="npat_pd" id="npat_pd" placeholder="Number of Patients Per Day"/></br>
                </div>

                <div class="form-group">
                    <label for="doc_house" class="col-sm-2 control-label">House No.:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="doc_house" id="doc_house"placeholder="House No."/></br>
                </div>

                <div class="form-group">
                    <label for="doc_road" class="col-sm-2 control-label">Road No.:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="doc_road" id="doc_road" placeholder="Road No."/></br>
                </div>

                <div class="form-group">
                    <label for="post_office" class="col-sm-2 control-label">Post Office:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="post_office" id="post_office" placeholder="Post Office"/></br>
                </div>

                <div class="form-group">
                    <label for="doc_district" class="col-sm-2 control-label">District:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="doc_district" id="doc_district" placeholder="District"/></br>
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
                    <label for="gender" class="col-sm-2 control-label">Gender:</label>
                    <select id="gender" name="gender"  class="form-control"  style="width: 75%;" placeholder="Select">
                        <option value="Male" class="down">Male</option>
                        <option value="Female" class="down">Female</option>
                    </select><br>
                </div>

                <div class="form-group">
                    <label for="birth_date" class="col-sm-2 control-label">Birth Date:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="birth_date" id="birth_date" placeholder="DD-MMM-YY"/></br>
                </div>

                <div class="form-group">
                    <label for="mar_date" class="col-sm-2 control-label">Marriage Date:</label>
                    <input class="form-control" style="width: 75%;" type="text" name="mar_date" id="mar_date" placeholder="DD-MMM-YY"/></br>
                </div>

                <div align="center">
                    <div class="form-group" style="align:center;">
                        <input type="submit" id="save_doc" name="save_doc" class="btn btn-primary" value="Save Doctor"/>
                    </div>
                </div>

            </form>
            <img style="display:none" id="loader" src="http://localhost/_DatabaseProject/PharmaSys/images/loading.gif" alt="Loading...." title="Loading...." />
            </div>
    </div>
</body>
</html>
