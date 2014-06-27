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
									newCell.innerHTML = eval(json)[i].STOCK_ID;

								}
								if (j == 1) {
									newCell.innerHTML = json[i].DEPO_ID;
								}
								if (j == 2) {
									newCell.innerHTML = eval(json)[i].SUPPLY_DATE;
								}
								if (j == 3) {
									newCell.innerHTML = "Show Details";
									newCell.onmouseover = function() {
										this.style.cursor = 'pointer';
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										this.title = "Click to Edit the supply of supply id " + x;
									};
									newCell.onclick = function() {

										window.location.href = "show_supply_dm.php?" + this.parentNode.cells[0].innerHTML;

									};
								}

							}

						}

					}

				}
				var jobj=new Object();
				jobj.user_id=localStorage.getItem("user_id");
				alert("LS: "+localStorage.getItem("user_id"));

				xmlhttp.open("GET", "php/raw_show_dm_stocklist.php?q="+JSON.stringify(jobj), true);
				xmlhttp.send();

			}
		</script>

	</head>
	<body onload="init()">
		<table class="table table-stripped" id="orderlist">
			<thead>
				<tr>
					<th>Supply Id</th>
					<th>Depo Id</th>
					<th>Supply Date</th>
					<th>SELECT</th>
				</tr>
			</thead>

		</table>
	</body>
</html>
