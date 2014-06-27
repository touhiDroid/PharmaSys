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
							for (var j = 0; j < 3; j++) {
								var newCell = newRow.insertCell(j);

								if (j == 0) {
									newCell.innerHTML = eval(json)[i].STOCK_ID;
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

				xmlhttp.open("GET", "php/raw_show_supply.php?q=" + JSON.stringify(jobj), true);
				xmlhttp.send();

			}

			function addOrder() {
				var path = document.URL;
				var id = path.split("?");
				window.location.href = "postsupply.php?" + id[1];
			}

		</script>

	</head>
	<body onload="init()">
		<div align="center">
			<br>
			<br>
			<button class="btn btn-large" onclick="addOrder()">
				Add New Supply Item
			</button>
			<br>
			<br>
			<table class="table table-stripped" id="orders">
				<thead>
					<tr>
						<th>Supply Id</th>
						<th>Product Code</th>
						<th>Quantity</th>
					</tr>
				</thead>

			</table>
		</div>
	</body>
</html>