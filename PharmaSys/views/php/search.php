<?php
	$str = $_POST['search_val'];
	//echo $str; 

	$conn=oci_connect('system','touhid18','localhost/orcl');

	$sql="select product_name from product where product_name like '%".$str."' or product_name like '".$str."%' ";
	$result=oci_parse($conn,$sql);
	if( oci_execute($result)){
		$table=array();
		$a=0;
		while($row=oci_fetch_array($result)){
			$table[$a]=$row;
		    ++$a;
			echo $row[0]."\n";
		}
		echo json_encode($table);
		oci_free_statement($result);
		oci_close($conn);
	}
	else echo "OCI Execution Error!";

?>