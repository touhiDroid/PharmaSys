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
		function getEmpOrderProductAnalysis() {
			deleterows();
			var start_date = document.getElementById("start_date").value;
			var end_date = document.getElementById("end_date").value;
			var emp_id=document.getElementById("emp_id").value;
			//alert(order_id);
			var jobj = new Object();
			jobj.start_date = start_date;
			jobj.end_date = end_date;
			jobj.user_id=emp_id;
			//jobj.user_id = localStorage.getItem("user_id");

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
					json = JSON.parse(str);
					var table = document.getElementById("orderlist");

					for (var i = 0; i < json.length; i++) {

						var newRow = table.insertRow(table.rows.length);
						for (var j = 0; j <= 2; j++) {
							var newCell = newRow.insertCell(j);

							if (j == 0) {
								newCell.innerHTML = eval(json)[i].EMP_ID;
							}
							if (j == 1) {
								newCell.innerHTML = json[i].PRODUCT_CODE;
							}
							if (j == 2) {
								newCell.innerHTML = json[i].T;
							}

						}

					}

				}

			}
			alert(JSON.stringify(jobj));
			xmlhttp.open("GET", "php/raworderproductanalysis.php?q=" + JSON.stringify(jobj), true);
			xmlhttp.send();

		}

		function deleterows(){
		var table = document.getElementById("orderlist");
		var num = table.rows.length;
		for (var i = 1; i < num; i++) {
			table.deleteRow(i);
			num--;
			i--;
		}
		}
	</script>

</head>
<body>

    <div id="wrapper">

        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>
        <div id="page-content-wrapper">
			<div align="center"><br><br><br>
				<h1> Product Sell Analysis Per Employee</h1>
				<br>
				<br>
				<br>
				<input id="start_date" class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Start Date" align="center" />
				<br>
				<input id="end_date" class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="End Date"/>
				<br>
				<input id="emp_id" class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Employee ID" align="center" />
				<br><br>

				<button onclick="getEmpOrderProductAnalysis()" class="btn btn-info">
					Analyze By Date Range
				</button>
				<br>
				<h1> Analysis Table</h1>
				<table class="table table-stripped" id="orderlist">
					<thead>
						<tr>
							<th>Employee ID</th>
							<th>Product_Code</th>
							<th>Quantity</th>
						</tr>
					</thead>

				</table>
			</div>
        </div>
    </div>
</body>
</html>