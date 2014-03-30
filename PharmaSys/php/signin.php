<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		include 'session.php';
		$u_id=$_POST['u_id'];
		$u_pwd=$_POST['u_pwd'];

		/*saveSession(101,"Touhid","MANAGER");
		echo "b**l";*/

		//echo "<script type='text/javascript' >alert('".$u_id."<br>".$u_pwd.", \n".$KEY_NAME."');</script>";

		$con=oci_connect("system","touhid18","localhost/orcl");
	  	if($con){
	  		$sql="select emp_id, emp_name, emp_type from employee where emp_id=".$u_id." and password='".$u_pwd."'"; 
	  		$result=oci_parse($con,$sql);
	  		//echo "Connection: ".$con.", SQL: ".$sql.", Result: ".$result."<br>";
	  		if($result){
		  		if( oci_execute($result) ) {
		  			// echo "        ***** EXECUTED ****<br>";
	  				// echo $sql."<br>";
		            //$row=oci_fetch_array($result);
		            if( $row=oci_fetch_array($result) ){
		            	// Do log in jobs: 1. save sesssion info, 2. Redirect to profile page
		            	saveSession($row[0], $row[1], $row[2]);
		            	//echo "".$row[0];
						/*session_start();
						$_SESSION [ 'u_id' ] = $u_id;
						$_SESSION [ 'u_name' ] = $row['emp_name'];
						$_SESSION [ 'u_type' ] = $row['emp_type'];*/
		            	echo "Successfully signed in!";
			            oci_free_statement($result);
			            oci_close($con);
		            	exit(0);
		            }
		            else
		            	echo "Wrong user id / password! Please try again. ".oci_error();
		            oci_free_statement($result);
		            oci_close($con);
		            exit(0);
		        }
		        else
		        	echo "OCI execution error! ".oci_error();
		        oci_free_statement($result);
			    oci_close($con);
		        exit(1);
	        }
	        else
	        	echo "OCI Parse error! ".oci_error();
            oci_free_statement($result);
            oci_close($con);
	        exit(1);
		}
		else 
			echo "Connection error! ".oci_error();
        oci_free_statement($result);
        oci_close($con);
        exit(1);
	}
	else
		echo 'Bad Request! '.oci_error();
    oci_free_statement($result);
    oci_close($con);
    exit(1);
?>