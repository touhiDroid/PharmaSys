<!DOCTYPE HTML>
<html>
	<head>
    <title>Post Order</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
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
	
	                            if(j==0){ newCell.innerHTML=eval(json)[i].PRODUCT_NAME;
	                            }
	                            if(j==1)
	                            {
	                                newCell.innerHTML=json[i].PRODUCT_CODE;
	                            }
	                            if(j==2){ newCell.innerHTML=eval(json)[i].PACK_SIZE;
	                            }
	                            if(j==3)
	                            {
	                                newCell.innerHTML=json[i].TRADE_PRICE;
	                            }
	                            if(j==4){ newCell.innerHTML=eval(json)[i].TRADE_PRICE_VAT;
	                            }
	                            if(j==5){ 
	                            	
	                            }
	                            
	                           
	                           
	                           
	                        }
	
	                    }
	                   
				 }

            }

            xmlhttp.open("POST","php/getproducts.php",true);


            xmlhttp.send();
        }
    </script>

</head>
<body onload="init()">
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
</body>
</html>