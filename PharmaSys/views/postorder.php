<!DOCTYPE HTML>
<html>
	<head>
    <title>Post Order</title>    <!-- Image Slider -->
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
    
    <script>
        function init()
        {
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
                    var json=xmlhttp.responseText;
        
					json=JSON.parse(json);

					var table=document.getElementById("products");

					for(var i=0;i<json.length;i++)
                    {
                        var newRow=table.insertRow(table.rows.length);
                        for(var j=0;j<5;j++)
                        {
                            var newCell=newRow.insertCell(j);
                            if(j==0){
                            	newCell.innerHTML=eval(json)[i].PRODUCT_NAME;
                            }
                            if(j==1){
                                newCell.innerHTML=json[i].PRODUCT_CODE;
                            }
                            if(j==2){
                            	newCell.innerHTML=eval(json)[i].PACK_SIZE;
                            }
                            if(j==3){
                                newCell.innerHTML=json[i].TRADE_PRICE;
                            }
                            if(j==4){
                            	newCell.innerHTML=eval(json)[i].TRADE_PRICE_VAT;
                            }
                            if(j==5){
                            }
                        }
                    }
				 }
            }
            xmlhttp.open("POST","php/getproducts.php",true);
            xmlhttp.send();
            /*$("#btn").click(function(){
                window.location = "manager_view.php";
            });*/
        }
    </script>

</head>
<body onload="init()">

    <div id="wrapper">
        <?php
            include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>
        <div id="page-content-wrapper"><br><br><br>
			<table class="table table-stripped" id="products">
				<thead>
					<tr>
						<th>Product Code</th>
						<th>Product Name</th>
						<th>Pack Size</th>
						<th>Trade Price</th>
						<th>Trade_Price_Vat</th>
						<th><input type="number" value=""/></th>
					</tr>
				</thead>
				
			</table>
        </div>
        <!-- <button id="btn">Click</button> -->
    </div>
</body>
</html>