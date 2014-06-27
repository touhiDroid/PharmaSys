<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//echo "<script type='text/javascript' >alert('inside News_Upload.php');</script>";
		$name =  $_POST['prod_name'];
		$code =  $_POST['prod_code'];
		$orig =  $_POST['prod_origin'];
		$catg =  $_POST['prod_catg'];
		$pksz =  $_POST['pack_size'];
		$tp   =	 $_POST['trade_price'];
		$tpv  =  $_POST['tpv'];

		$db = oci_connect("system","touhid18","localhost/orcl");
		$sql='call insert_product(:param1,:param2,:param3,:param4,:param5,:param6,:param7)';
		$result=oci_parse($db,$sql);
		oci_bind_by_name($result, ':param1',$code);
		oci_bind_by_name($result, ':param2',$name);
		oci_bind_by_name($result, ':param3',$orig);
		oci_bind_by_name($result, ':param4',$catg);
		oci_bind_by_name($result, ':param5',$pksz);
		oci_bind_by_name($result, ':param6',$tp);
		oci_bind_by_name($result, ':param7',$tpv);

		if( oci_execute($result) )
			echo "Doctor successfully added!";
		else
			echo "Not executed! ".oci_error();

	}
	else
		echo 'Bad Request!';
?>