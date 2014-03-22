<?php
	$conn=oci_connect('system','touhid18','localhost/orcl');
	//use localhost/XE in case of express  edition
	echo 'Connecting...<br>';
	if (!$conn)
		echo 'Failed to connect to Oracle';
	else
		echo 'Successfully connected with Oracle DB :-)';
?>