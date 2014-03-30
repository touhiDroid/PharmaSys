<!DOCTYPE HTML>
<html>
	<head>
		<title>Post Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
			function sentOrder () {
				var order_id=document.getElementById("order_id").value;
				alert(order_id);
			  
			}
		</script>

	</head>
	<body>
		<table class="table table-stripped" id="products">
			<thead>
				<tr>
					<th>Order id</th>
					<th>Pharmacy Id</th>
					<th>Employee id</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td><input id="order_id"  type="text"  placeholder="Order id"/></td>
				<td><input id="pharmacy_id" type="text"  placeholder="Pharmacy_id"/></td>
				<td><input id="employee_id" type="text"  placeholder="Employee Id"/></td>
				<td><input id="date" type="text"  placeholder="Date"/></td>

				<td> <button onclick="sentOrder()"> Send</button></td>

			
			</tr>
			</tbody>

		</table>
	</body>
</html>