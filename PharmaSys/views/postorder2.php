<!DOCTYPE HTML>
<html>
	<head>
		<title>Post Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
			function sentOrder () {
				var order_id=document.getElementById("order_id").value;
                var product_code=document.getElementById("product_code").value;
                var quantity=document.getElementById("quantity").value;
                alert(quantity);
				//alert(order_id);
                var jobj=new Object();
                jobj.order_id=order_id;
                jobj.product_code=product_code;
                jobj.quantity=quantity;
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
                    }


                }

                xmlhttp.open("GET","php/rawpostorder.php?q="+JSON.stringify(jobj),true);
                xmlhttp.send();



			  
			}
		</script>

	</head>
	<body>
		<button class="btn btn-large" float="center">Order for Pharmacy</button>
		<table class="table table-stripped" id="products">
			<thead>
				<tr>
					<th>Order id</th>
					<th>Product Code</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>
			<tr>
				<td><input id="order_id"  type="text"  placeholder="Order id"/></td>
				<td><input id="product_code" type="text"  placeholder="Product Code"/></td>
				<td><input id="quantity" type="text"  placeholder="Quantity"/></td>
				<td> <button onclick="sentOrder()" class="btn btn-large"> Send</button></td>

			
			</tr>
			</tbody>

		</table>
	</body>
</html>