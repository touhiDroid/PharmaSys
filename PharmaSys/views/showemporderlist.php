<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Post Order</title>
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
				//alert('hello');
				//localStorage.setItem("user_id",105);
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

						var table = document.getElementById("orderlist");

						for (var i = 0; i < json.length; i++) {
							var newRow = table.insertRow(table.rows.length);
							for (var j = 0; j <= 6; j++) {
								var newCell = newRow.insertCell(j);

								if (j == 0) {
									newCell.innerHTML = eval(json)[i].ORDER_ID;
									newCell.onmouseover = function() {
										this.style.cursor = 'pointer';
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										this.title = "Click to Go To the order of order id " + x;
									};
									newCell.onclick = function() {
										
										window.location.href = "showorder2.php?" + this.parentNode.cells[0].innerHTML;

									};
								}
								if (j == 1) {
									newCell.innerHTML = json[i].EMP_ID;
								}
								if (j == 2) {
									newCell.innerHTML = eval(json)[i].PHARMACY_ID;
								}
								if (j == 3) {
									newCell.innerHTML = json[i].NAME;
								}
								if (j == 4) {
									newCell.innerHTML = json[i].ORDER_DATE;
								}
								if (j == 5) {
									newCell.innerHTML = "EDIT";
									newCell.onmouseover = function() {
										this.style.cursor = 'pointer';
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										this.title = "Click to Edit the order of order id " + x;
									};
									newCell.onclick = function() {
										
										window.location.href = "showEmpOrder.php?" + this.parentNode.cells[0].innerHTML;

									};
								}
								if (j == 6) {
									newCell.innerHTML = "MARK AS DELIVERED";
									newCell.onmouseover = function() {
										this.style.cursor = 'pointer';
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										this.title = "Click to Go To the order of order id " + x;
									};
									newCell.onclick = function() {
										
										//window.location.href = "showorder2.php?" + this.parentNode.cells[0].innerHTML;

									};
								}

							}

						}

					}

				}
				var jobj=new Object();
				jobj.user_id=localStorage.getItem("user_id");
				alert(jobj.user_id);

				xmlhttp.open("GET","php/rawShowEmpOrderList.php?q="+JSON.stringify(jobj),true);
				xmlhttp.send();

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
				<table class="table table-stripped" id="orderlist">
					<thead>
						<tr>
							<th>Order ID</th>
							<th>Employee ID</th>
							<th>Pharmacy ID</th>
							<th>Pharmacy Name</th>
							<th>Date</th>
							<th>Edit</th>
							<th>Mark as delivered</th>
						</tr>
					</thead>

				</table>
            </div>
        </div>
    </div>
</body>
</html>