<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Post Order</title>
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
			function sentOrder () {
				var path = document.URL;
				var id = path.split("?");
				var order_id=id[1];
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
	<div id="wrapper">
        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
            include 'navbar.php';
            include 'mio_side_menu.php';
        ?>

        <div id="page-content-wrapper"><br><br><br>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
				<div role="form" align="center">
					<br>
					<br>
					<!-- <button class="btn btn-large" onclick="addOrder()">
						Add New Order Item
					</button> -->
					<br>
					<!-- <br>
					<button class="btn btn-large" float="center">Order for Pharmacy</button> -->
					<div class="form-group">
						<label for="product_code">Product Code</label>
						<input id="product_code" class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Product Code"/>
					</div>

					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input id="quantity" class="form-control" style="width: 50%; text-align:center;" type="text"  placeholder="Quantity"/>
					</div>

					<button onclick="sentOrder()" class="btn btn-success">Send</button>
            	</div>
            </div>
        </div>
    </div>
</body>
</html>