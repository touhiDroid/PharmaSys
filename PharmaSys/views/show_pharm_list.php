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
						for (var j = 0; j < 7; j++) {
							var newCell = newRow.insertCell(j);
							if (j == 0) {
								newCell.innerHTML = json[i].NAME;
							}
							else if (j == 1) {
								newCell.innerHTML = json[i].AREA_CODE;
							}
							else if (j == 2) {
								newCell.innerHTML = json[i].EMAIL;
							}
							else if (j == 3) {
								newCell.innerHTML = json[i].PHONE_NO;
							}
							else if (j == 4) {
								newCell.innerHTML = json[i].SELL_AMOUNT_PER_DAY;
							}
							else if (j == 5) {
								newCell.innerHTML = json[i].HOUSE_NO+", "+json[i].ROAD_NO+", "+json[i].POST_OFFICE+", "+json[i].DISTRICT;
							}
							else if (j == 6) {
								newCell.innerHTML = json[i].ESTABLISHED_DATE;
							}
						}
					}

				}

			}
			//var jobj = new Object();
			//jobj.id = id[1];
			//alert(id[1]);

			xmlhttp.open("GET", "php/get_pharm_list.php" , true);
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
							<th>Pharmacy Name</th>
							<th>Area Code</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Sell/Day (BDT)</th>
							<th>Address</th>
							<th>Established Date</th>
						</tr>
					</thead>
				</table>
        	</div>
        </div>
    </div>
</body>
</html>