<!DOCTYPE HTML>
<html>
<head>
	<title>Show Order</title>
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
		function init() {

			//var path = document.URL;
			//var id = path.split("?");
			//alert(id[1]);
			var xmlhttp;
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var json = xmlhttp.responseText;

					json = JSON.parse(json);

					var table = document.getElementById("table_doctor");

					for (var i = 0; i < json.length; i++) {
						var newRow = table.insertRow(table.rows.length);
						for (var j = 0; j < 11; j++) {
							var newCell = newRow.insertCell(j);
							if (j == 0) {
								newCell.innerHTML = json[i].NAME;
							}
							if (j == 1) {
								newCell.innerHTML = json[i].INSTITUTION;
							}
							if (j == 2) {
								newCell.innerHTML = json[i].DEGREE;
							}
							if (j == 3) {
								newCell.innerHTML = json[i].SPECIALITY;
							}
							if (j == 4) {
								newCell.innerHTML = json[i].GENDER;
							}
							if (j == 5) {
								newCell.innerHTML = json[i].EMAIL;
							}
							if (j == 6) {
								newCell.innerHTML = json[i].PHONE_NO;
							}
							if (j == 7) {
								newCell.innerHTML = json[i].NUM_PATIENT_PER_DAY;
							}
							if (j == 8) {
								newCell.innerHTML = json[i].HOUSE_NO+", "+json[i].ROAD_NO+", "+json[i].POST_OFFICE+", "+json[i].DISTRICT;
							}
							if (j == 9) {
								newCell.innerHTML = json[i].BIRTH_DAY;
							}
							if (j == 10) {
								newCell.innerHTML = json[i].MARRIAGE_DAY;
							}
							

						}

					}

				}

			}
			//var jobj = new Object();
			//jobj.id = id[1];
			//alert(id[1]);

			xmlhttp.open("GET", "php/get_doc_list.php" , true);
			xmlhttp.send();

		}
	</script>

</head>
<body onload="init()">

    <div id="wrapper">

        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>
        <div id="page-content-wrapper">
			<div align="center"><br><br><br>
				<h1> Saved Doctor List </h1>
				<table class="table table-stripped" id="table_doctor">
					<thead>
						<tr>
							<th>Doctor Name</th>
							<th>Institution</th>
							<th>Degree</th>
							<th>Speciality</th>
							<th>Gender</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Patients/Day</th>
							<th>Address</th>
							<th>Birth Day</th>
							<th>Marriage Day</th>
						</tr>
					</thead>
				</table>
        	</div>
        </div>
    </div>
</body>
</html>