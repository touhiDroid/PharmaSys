<?php
	
	$KEY_ID='u_id';
	$KEY_NAME='u_name';
	$KEY_TYPE='u_type';

	//echo "<script type='text/javascript' >alert('inside session.php');</script>";

	function saveSession($emp_id, $emp_name, $emp_type){
		session_start();
		$_SESSION[ 'u_id' ] = $emp_id;
		$_SESSION[ 'u_name' ] = $emp_name;
		$_SESSION[ 'u_type' ] = $emp_type;
		/*echo $emp_id.", ".$emp_name.", ".$emp_type;
		echo $_SESSION[ 'u_id' ].", ".$_SESSION[ 'u_name' ].", ".$_SESSION[ 'u_type' ];
		echo  $KEY_ID .", ". $KEY_NAME .", ". $KEY_TYPE ;*/
		if (!is_writable(session_save_path())) {
    		echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
}
	}

	function isSessionSet(){
		if( isset($_SESSION [ 'u_type' ]) )
			return true;
		else
			return false;
	}

	function getSessionEmployeeId(){
		if( isset($_SESSION [ 'u_id' ]) )
			return $_SESSION [ 'u_id' ];
		else
			return "Session Ended!";
	}

	function getSessionEmployeeName(){
		if( isset($_SESSION [ 'u_name' ]) )
			return $_SESSION[ 'u_name' ];
		else
			return "Session Incorrect!";
	}

	function getSessionEmployeeType(){
		if( isset($_SESSION [ 'u_type' ]) )
			return $_SESSION [ 'u_type' ];
		else
			return "Session Ended!";
	}
?>