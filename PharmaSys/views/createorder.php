<!DOCTYPE HTML>
<html>
	<head>
		<title>Create Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
			function sentOrder () {
				var pharmacy_id=document.getElementById("pharmacy_id").value;
				var employee_id=document.getElementById("employee_id").value;
				var date=document.getElementById("date").value;
                if(pharmacy_id!="" && employee_id!="" && date!="")
                {
				//alert(pharmacy_id);
				  var jobj=new Object();
                jobj.pharmacy_id=pharmacy_id;
                jobj.employee_id=employee_id;
                jobj.date=date;
                alert(date);
                var xmlhttp;
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
                        window.location.href="postorder2.php?"+pharmacy_id;
                    }


                }

                xmlhttp.open("GET","php/rawcreateorder.php?q="+JSON.stringify(jobj),true);
                xmlhttp.send();
                }


			}
		</script>

	</head>
	<body>
		<table class="table table-stripped" id="products">
			<thead>
				<tr>
					<th>Pharmacy Id</th>
					<th>Employee id</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td><input id="pharmacy_id" type="text"  placeholder="Pharmacy_id"/></td>
				<td><input id="employee_id" type="text"  placeholder="Employee Id"/></td>
				<td><input id="date" type="text"  placeholder="Date"/></td>

				<td> <button onclick="sentOrder()" class="btn"> Create</button></td>

			
			</tr>
			</tbody>

		</table>
	</body>
</html>