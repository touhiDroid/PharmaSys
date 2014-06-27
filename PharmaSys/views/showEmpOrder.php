<?php session_start();?>
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
		<script type="text/javascript">
			function init() {

				var path = document.URL;
				var id = path.split("?");
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

						var table = document.getElementById("orders");

						for (var i = 0; i < json.length; i++) {
							var newRow = table.insertRow(table.rows.length);
							for (var j = 0; j < 3; j++) {
								var newCell = newRow.insertCell(j);

								if (j == 0) {
									newCell.innerHTML = eval(json)[i].ORDER_ID;
								}
								if (j == 1) {
									newCell.innerHTML = json[i].PRODUCT_CODE;
								}
								if (j == 2) {
									newCell.innerHTML = eval(json)[i].QUANTITY;
								}

							}

						}

					}

				}
				var jobj = new Object();
				jobj.id = id[1];
				alert(id[1]);

				xmlhttp.open("GET", "php/rawgetorder.php?q=" + JSON.stringify(jobj), true);
				xmlhttp.send();

			}

			function addOrder() {
				var path = document.URL;
				var id = path.split("?");
				window.location.href = "postorder2.php?" + id[1];
			}

		</script>

</head>
<body onload="init()">
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
					<br>
					<br>
					<button class="btn btn-large" onclick="addOrder()">
						Add New Order Item
					</button>
					<br>
					<br>
					<table class="table table-stripped" id="orders">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Product Code</th>
								<th>Quantity</th>
							</tr>
						</thead>

					</table>
				</div>
            </div>
        </div>
    </div>
</body>
</html>