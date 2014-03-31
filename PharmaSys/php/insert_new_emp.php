<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//echo "<script type='text/javascript' >alert('inside News_Upload.php');</script>";
		$name =  $_POST['emp_name'];
		$pwd =  $_POST['emp_pwd'];
		$type =  $_POST['emp_type']; // -> selection value
		$house =  $_POST['emp_house'];
		$road =  $_POST['emp_road'];
		$post_office =  $_POST['post_office'];
		$district =  $_POST['emp_district'];
		$phone =  $_POST['phone'];
		$email =  $_POST['email'];
		$gender =  $_POST['gender'];
		$join_date =  $_POST['join_date'];
		$birth_date =  $_POST['birth_date'];
		$area_code =  $_POST['area_code'];

		if( ! empty($_FILES['emp_cv']) ) {
			$cv_file = base64_encode( file_get_contents($_FILES['emp_cv']['tmp_name']) );
			echo "File got: ".$cv_file;
		}
	}
	else
		echo 'Bad Request!';
?>