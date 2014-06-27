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
						alert(json);

						json = JSON.parse(json);

						var table = document.getElementById("orders");

						for (var i = 0; i < json.length; i++) {
							var newRow = table.insertRow(table.rows.length);
							for (var j = 0; j <=4; j++) {
								var newCell = newRow.insertCell(j);

								if (j == 0) {
									newCell.innerHTML = eval(json)[i].PRODUCT_CODE;
								}
								if (j == 1) {
									newCell.innerHTML = json[i].PRODUCT_NAME;
								}
								if (j == 2) {
									newCell.innerHTML = eval(json)[i].TRADE_PRICE_VAT;
								}
								if (j == 3) {
									newCell.innerHTML = json[i].S;
								}
								if (j == 4) {
									newCell.innerHTML = eval(json)[i].P;
								}

							}

						}

					}

				}
				//var jobj = new Object();
				//jobj.id = id[1];
				//alert(id[1]);

				xmlhttp.open("GET", "php/rawsell_product_amount_price.php", true);
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
				<h1> Product Sell Analysis With Price </h1>
				<table class="table table-stripped" id="orders">
					<thead>
						<tr>
							<th>Product Code</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Quantity</th>
							<th>Price</th>
						</tr>
					</thead>
				</table>
			</div>
        </div>
    </div>
</body>
</html>