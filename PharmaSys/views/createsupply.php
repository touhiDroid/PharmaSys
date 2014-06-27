<!DOCTYPE HTML>
<html>
	<head>
		<title>Create Order</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
		<script>
			function sentOrder () {
				//alert(localStorage.getItem("user_id"));
				var depo_id=document.getElementById("depo_id").value;
				//var employee_id=localStorage.getItem("user_id");
				var date=document.getElementById("supply_date").value;
               
				  var jobj=new Object();
                jobj.depo_id=depo_id;
                //jobj.employee_id=employee_id;
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
                alert(JSON.stringify(jobj));

                xmlhttp.open("GET","php/rawcreatesupply.php?q="+JSON.stringify(jobj),true);
                xmlhttp.send();
              


			}
		</script>

	</head>
	<body>
	<div align="center">
			
				<br>
				<td><input id="depo_id" type="text"  placeholder="Depot Id"/></td>
				<br>
				<td><input id="supply_date" type="text"  placeholder="Date"/></td>
				<br>
				<td> <button onclick="sentOrder()" class="btn"> Create</button></td>
	</div>

			
			
	</body>
</html>