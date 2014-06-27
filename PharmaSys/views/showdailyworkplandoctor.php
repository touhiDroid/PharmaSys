<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>DWP Show</title>
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
			function getEmpOrderProductAnalysis() {
				deleterows();
				var start_date = document.getElementById("start_date").value;
				var end_date = document.getElementById("end_date").value;
				//alert(order_id);
				var jobj = new Object();
				jobj.start_date = start_date;
				jobj.end_date = end_date;
				jobj.user_id = localStorage.getItem("user_id");

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
							for (var j = 0; j <= 8; j++) {
								var newCell = newRow.insertCell(j);

								if (j == 0) {
									newCell.innerHTML = eval(json)[i].MIO_ID;
								}
								if (j == 1) {
									newCell.innerHTML = json[i].DOCTOR_ID;
								}
								if (j == 2) {
									newCell.innerHTML = json[i].VISIT_DAY;
								}
								if (j == 3) {
									newCell.innerHTML = eval(json)[i].VISIT_MONTH;
								}
								if (j == 4) {
									newCell.innerHTML = json[i].VISIT_YEAR;
								}
								if (j == 5) {
									newCell.innerHTML = json[i].VISIT_HOUR;
								}
								if (j == 6) {
									newCell.innerHTML = eval(json)[i].VISIT_MIN;
								}
								if (j == 7) {
									newCell.innerHTML = json[i].PRODUCT_PROMOTED;
								}
								if (j == 8) {
									newCell.innerHTML = json[i].VISIT_DONE;
									newCell.onmouseover = function() {
										this.style.cursor = 'pointer';
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										this.title = "Click to Mark As Complete " + x;
									};
									newCell.onclick = function() {
										var row = this.parentNode;
										var a= row.cells[0].innerHTML;
										var b= row.cells[1].innerHTML;
										var c= row.cells[2].innerHTML;
										var d= row.cells[3].innerHTML;
										var e= row.cells[4].innerHTML;
										update(a,b,c,d,e);
										//window.location.href = "showEmpOrder.php?" + this.parentNode.cells[0].innerHTML;

									};
								}

							}

						}

					}

				}
				alert(JSON.stringify(jobj));
				xmlhttp.open("GET", "php/rawshowdailyworkplandoctor.php?q=" + JSON.stringify(jobj), true);
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
			function update(mio,did,vd,vm,vy)
			{
				var mio_id = mio;
				var doctor_id =did;
				var visit_day = vd;
				var visit_month =vm;
				var visit_year =vy;
				
				var jobj = new Object();
				jobj.mio_id = mio_id;
				jobj.doctor_id = doctor_id;
				jobj.visit_day = visit_day;
				jobj.visit_month = visit_month;
				jobj.visit_year = visit_year;
				//alert(jobj);
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
				xmlhttp.open("GET", "php/rawupdatemiovisitdoctor.php?q=" + JSON.stringify(jobj), true);
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
					<h1> Doctor Visit Plan </h1>
					<br>
					<input id="start_date" class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="MONTH NUMBER" />
					<br>
					<input id="end_date"  class="form-control" style="width: 50%; text-align:center;"  type="text"  placeholder="YEAR"/>
					<br>

					<button onclick="getEmpOrderProductAnalysis()" class="btn btn-info">Search</button>
					<br>
					<br>
					<table class="table table-stripped" id="orderlist">
						<thead>
							<tr>
								<th>MIO ID</th>
								<th>DOCTOR ID</th>
								<th>VISIT DAY</th>
								<th>VISIT MONTH</th>
								<th>VISIT YEAR</th>
								<th>VISIT HOUR</th>
								<th>VISIT MIN</th>
								<th>PRODUCT</th>
								<th>STATUS</th>
							</tr>
						</thead>

					</table>

				</div>
</body>
</html>