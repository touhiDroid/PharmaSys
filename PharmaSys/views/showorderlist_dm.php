<!DOCTYPE HTML>
<html>
	<head>
		<title>Post Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
			function init() {
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
							for (var j = 0; j <= 5; j++) {
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
									newCell.innerHTML = "MARK AS DELIVERED";
									newCell.onmouseover = function() {
										this.style.cursor = 'pointer';
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										this.title = "Click to Go To the order of order id " + x;
									};
									newCell.onclick = function() {
										
										var row = this.parentNode;
										var x = row.cells[0].innerHTML;
										markasDelivered(x);
										//window.location.href = "showorder2.php?" + this.parentNode.cells[0].innerHTML;

									};
								}

							}

						}

					}

				}

				xmlhttp.open("POST", "php/rawshoworderlist.php", true);

				xmlhttp.send();
			}
			function markasDelivered(x)
			{
				alert(x);
				var jobj=new Object();
                jobj.order_id=x;
				 if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        var str=xmlhttp.responseText;
                        alert(str);
                        //init();
                    }


                }
				
                xmlhttp.open("GET","php/raw_mark_as_delivered.php?q="+JSON.stringify(jobj),true);
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
	<body onload="init()">
		<table class="table table-stripped" id="orderlist">
			<thead>
				<tr>
					<th>Order ID</th>
					<th>Employee ID</th>
					<th>Pharmacy ID</th>
					<th>Pharmacy Name</th>
					<th>Date</th>
					<th>Mark as delivered</th>
				</tr>
			</thead>

		</table>
	</body>
</html>F