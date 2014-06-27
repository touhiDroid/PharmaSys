<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//echo "<script type='text/javascript' >alert('inside News_Upload.php');</script>";
		$name =  $_POST['doc_name'];
		$house =  $_POST['doc_house'];
		$road =  $_POST['doc_road'];
		$post_office =  $_POST['post_office'];
		$district =  $_POST['doc_district'];
		$phone =  $_POST['phone'];
		$email =  $_POST['email'];
		$gender =  $_POST['gender']; // -> selection value
		$degree = $_POST['degree'];
		$spec = $_POST['spec'];
		$inst = $_POST['inst'];
		$npat_pd = $_POST['npat_pd'];
		$birth_day =  $_POST['birth_date'];
		$mar_day =  $_POST['mar_date'];

		$db = oci_connect("system","touhid18","localhost/orcl");
		$sql='call insert_doctor(:param1,:param2,:param3,:param4,:param5,:param6,:param7,:param8,:param9,:param10,:param11,:param12,:param13,:param14)';
		$result=oci_parse($db,$sql);
		oci_bind_by_name($result, ':param1',$name);
		oci_bind_by_name($result, ':param2',$house);
		oci_bind_by_name($result, ':param3',$road);
		oci_bind_by_name($result, ':param4',$post_office);
		oci_bind_by_name($result, ':param5',$district);
		oci_bind_by_name($result, ':param6',$phone);
		oci_bind_by_name($result, ':param7',$email);
		oci_bind_by_name($result, ':param8',$gender);
		oci_bind_by_name($result, ':param9',$degree);
		oci_bind_by_name($result, ':param10',$spec);
		oci_bind_by_name($result, ':param11',$inst);
		oci_bind_by_name($result, ':param12',$npat_pd);
		oci_bind_by_name($result, ':param13',$birth_day);
		oci_bind_by_name($result, ':param14',$mar_day);

		if( oci_execute($result) )
			echo "Doctor successfully added!";
		else
			echo "Not executed! ".oci_error();

	}
	else
		echo 'Bad Request!';
?>