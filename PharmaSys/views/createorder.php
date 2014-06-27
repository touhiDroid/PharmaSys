<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Create Order</title>
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
				//alert(localStorage.getItem("user_id"));
				var pharmacy_id=document.getElementById("pharmacy_id").value;
				var employee_id=localStorage.getItem("user_id");
				var date=document.getElementById("date").value;
                if(pharmacy_id!="" && employee_id!="" && date!="")
                {
    				alert(employee_id);
    				var jobj=new Object();
                    jobj.pharmacy_id=pharmacy_id;
                    jobj.employee_id=employee_id;
                    jobj.date=date;
                   // alert(date);
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
                            // window.location.href="postorder2.php?"+pharmacy_id;
                        }
                    }
                    xmlhttp.open("GET","php/rawcreateorder.php?q="+JSON.stringify(jobj),true);
                    xmlhttp.send();
                }


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
        		<table class="table table-stripped" id="products">
        			<tbody>
        			<tr>
        				<td><input id="pharmacy_id" type="text"  class="form-control" placeholder="Pharmacy_id"/></td>
        				<td><input id="date" type="text"  class="form-control" placeholder="Date"/></td>
        				<td> <button onclick="sentOrder()" class="btn btn-success"> Create</button></td>
        			</tr>
        			</tbody>

        		</table>
            </div>
        </div>
    </div>
</body>
</html>