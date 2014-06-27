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
					 
					 var table=document.getElementById("orders");

	                    for(var i=0;i<json.length;i++)
	                    {
	                        var newRow=table.insertRow(table.rows.length);
	                        for(var j=0;j<6;j++)
	                        {
	                            var newCell=newRow.insertCell(j);
	
	                            if(j==0){ newCell.innerHTML=eval(json)[i].PHARMACY_ID;
	                            }
	                            if(j==1)
	                            {
	                                newCell.innerHTML=json[i].EMP_ID;
	                            }
	                            if(j==2){ newCell.innerHTML=eval(json)[i].ORDER_ID;
	                            }
	                            if(j==3)
	                            {
	                                newCell.innerHTML=json[i].ORDER_DATE;
	                            }
	                            if(j==4){ newCell.innerHTML=eval(json)[i].PRODUCT_CODE;
	                            }
	                            if(j==5){ 
	                            	newCell.innerHTML=eval(json)[i].QUANTITY;
	                            }
	                            
	                           
	                           
	                           
	                        }
	
	                    }
	                   
				 }

            }

            xmlhttp.open("POST","php/rawshoworder.php",true);


            xmlhttp.send();
        }
    </script>

</head>
<body onload="init()">
	<table class="table table-stripped" id="orders">
		<thead>
			<tr>
				<th>Pharmacy id</th>
				<th>Employee id</th>
				<th>Order id</th>
				<th>Date</th>
				<th>Product Code</th>
				<th>Quantity</th>
			</tr>
		</thead>
		
	</table>
</body>
</html>