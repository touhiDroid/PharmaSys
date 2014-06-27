<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>DWP Doctor</title>
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
		<script type="text/javascript">
			function sentDailyWorkPlanDoctor() {
				var mio_id = document.getElementById("mio_id").value;
				//alert(mio_id);
				var doctor_id = document.getElementById("doctor_id").value;
				var visit_day = document.getElementById("visit_date").value;
				var visit_month = document.getElementById("visit_month").value;
				var visit_year = document.getElementById("visit_year").value;
				var visit_hour = document.getElementById("visit_hour").value;
				var visit_min = document.getElementById("visit_min").value;
				var product = document.getElementById("product").value;
				alert(mio_id+visit_day);
				//alert(order_id);
				var jobj = new Object();
				jobj.mio_id = mio_id;
				jobj.doctor_id = doctor_id;
				jobj.visit_day = visit_day;
				jobj.visit_month = visit_month;
				jobj.visit_year = visit_year;
				jobj.visit_hour = visit_hour;
				jobj.visit_min = visit_min;
				jobj.product =product;
				var xmlhttp;
				if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						var str = xmlhttp.responseText;
						alert(str);
						//init();
					}

				}
				alert(JSON.stringify(jobj));
				xmlhttp.open("GET", "php/rawcreatedailyworkplandoctor.php?q=" + JSON.stringify(jobj), true);
				xmlhttp.send();

			}
		</script>

</head>
<body>	
	<div id="wrapper">
        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
            include 'navbar.php';
            include 'mio_side_menu.php';
        ?>

        <div id="page-content-wrapper"><br><br><br>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
				<div align="center">
					<h1>
						Create Daily Work Plan for Visiting Doctor
					</h1>
					<br>
					<input id="mio_id"   class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="MIO ID" align="center" />
					<br>
					<input id="doctor_id"   class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Doctor ID"/>
					<br>
					<input id="visit_date"  class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Day"/>
					<br>
					<input id="visit_month"  class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Month"/>
					<br>
					<input id="visit_year"  class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Year"/>
					<br>
					<input id="visit_hour"  class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Hour"/>
					<br>
					<input id="visit_min"  class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Minute"/>

					<br>
					<input id="product"  class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Product To be promoted"/>
					<br>

					<button onclick="sentDailyWorkPlanDoctor()" class="btn btn-success">
						Save
					</button>
				</div>
            </div>
        </div>
    </div>
</body>
</html>