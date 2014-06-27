<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//echo "<script type='text/javascript' >alert('inside News_Upload.php');</script>";
		$name =  $_POST['pharm_name'];
		$ac = $_POST['area_code'];
		$house =  $_POST['pharm_house'];
		$road =  $_POST['pharm_road'];
		$post_office =  $_POST['post_office'];
		$district =  $_POST['pharm_district'];
		$phone =  $_POST['phone'];
		$email =  $_POST['email'];
		$sapd = $_POST['sapd'];
		$est_date =  $_POST['est_date'];

		$db = oci_connect("system","touhid18","localhost/orcl");
		$sql='call insert_pharmacy(:param1,:param2,:param3,:param4,:param5,:param6,:param7,:param8,:param9,:param10)';
		$result=oci_parse($db,$sql);
		oci_bind_by_name($result, ':param1',$name);
		oci_bind_by_name($result, ':param2',$ac);
		oci_bind_by_name($result, ':param3',$house);
		oci_bind_by_name($result, ':param4',$road);
		oci_bind_by_name($result, ':param5',$post_office);
		oci_bind_by_name($result, ':param6',$district);
		oci_bind_by_name($result, ':param7',$phone);
		oci_bind_by_name($result, ':param8',$email);
		oci_bind_by_name($result, ':param9',$sapd);
		oci_bind_by_name($result, ':param10',$est_date);

		if( oci_execute($result) )
			echo "Pharmacy successfully added!";
		else
			echo "Not executed! ".oci_error();

	}
	else
		echo 'Bad Request!';
?>