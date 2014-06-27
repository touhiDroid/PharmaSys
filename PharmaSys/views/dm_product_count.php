<!DOCTYPE HTML>
<html>

	<head>
		<title>Post Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
			function init() {
				//alert('hello');
				//localStorage.setItem("user_id",103);
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
							for (var j = 0; j <= 3; j++) {
								var newCell = newRow.insertCell(j);

								if (j == 0) {
									newCell.innerHTML = eval(json)[i].DEPO_ID;

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
				//var jobj=new Object();
				//jobj.user_id=localStorage.getItem("user_id");
				//alert('hi');

				xmlhttp.open("GET", "php/raw_dm_product_count.php", true);
				xmlhttp.send();

			}
		</script>

	</head>
	<body onload="init()">
		<table class="table table-stripped" id="orderlist">
			<thead>
				<tr>
					<th>Depo Id</th>
					<th>Product Code</th>
					<th>Quantity</th>
				</tr>
			</thead>

		</table>
	</body>
</html>
