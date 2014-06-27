<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//echo "<script type='text/javascript' >alert('inside News_Upload.php');</script>";
		$pwd =  $_POST['emp_pwd'];
		$type =  $_POST['emp_type']; // -> selection value
		$name =  $_POST['emp_name'];
		$house =  $_POST['emp_house'];
		$road =  $_POST['emp_road'];
		$po =  $_POST['post_office'];
		$district =  $_POST['emp_district'];
		$phone =  $_POST['phone'];
		$email =  $_POST['email'];
		$salary =  $_POST['salary'];
		$gender =  $_POST['gender'];
		$jd =  $_POST['join_date'];
		$bd =  $_POST['birth_date'];
		$ac =  $_POST['area_code'];

		$db = oci_connect("system","touhid18","localhost/orcl");
		$sql='call insert_doctor(:param1,:param2,:param3,:param4,:param5,:param6,:param7,:param8,:param9,:param10,:param11,:param12,:param13,:param14)';
		$result=oci_parse($db,$sql);
		oci_bind_by_name($result, ':param1',$pwd);
		oci_bind_by_name($result, ':param2',$type);
		oci_bind_by_name($result, ':param3',$name);
		oci_bind_by_name($result, ':param4',$house);
		oci_bind_by_name($result, ':param5',$road);
		oci_bind_by_name($result, ':param6',$po);
		oci_bind_by_name($result, ':param7',$district);
		oci_bind_by_name($result, ':param8',$phone);
		oci_bind_by_name($result, ':param9',$email);
		oci_bind_by_name($result, ':param10',$salary);
		oci_bind_by_name($result, ':param11',$gender);
		oci_bind_by_name($result, ':param12',$jd);
		oci_bind_by_name($result, ':param13',$bd);
		oci_bind_by_name($result, ':param14',$ac);

		if( oci_execute($result) )
			echo "Doctor successfully added!";
		else
			echo "Not executed! ".oci_error();

		/*if( ! empty($_FILES['emp_cv']) ) {
			$cv_file = base64_encode( file_get_contents($_FILES['emp_cv']['tmp_name']) );
			echo "File got: ".$cv_file;
		}*/
	}
	else
		echo 'Bad Request!';
?>