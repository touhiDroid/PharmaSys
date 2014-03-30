<!DOCTYPE HTML>
<html>
	<head>
		<title>Show Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
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
							for (var j = 0; j <3; j++) {
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
		</script>

	</head>
	<body onload="init()">
		<table class="table table-stripped" id="orders">
			<thead>
				<tr>
					<th>Order ID</th>
					<th>Product Code</th>
					<th>Quantity</th>
				</tr>
			</thead>

		</table>
	</body>
</html>