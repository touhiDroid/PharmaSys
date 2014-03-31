<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		//echo "<script type='text/javascript' >alert('inside News_Upload.php');</script>";
		$product_list =  $_POST['products'];
		echo $product_list."\n";

		$order_array = array();
		$count=0;
		$prod_q = strtok($product_list, ",");
		while($prod_q){
			$order_array[$count++]=$prod_q;
			$prod_q = strtok(",");
		}

		$prod_id_array = array();
		$prod_qt_array = array();
		$a=0;
		for( $a=0; $a<$count;$a++ ){
			$prod_id_array[$a] = strtok($order_array[$a], ":"); 
			$prod_qt_array[$a] = strtok(":");
			echo "Prod ID: ".$prod_id_array[$a].", quantity=".$prod_qt_array[$a]."\n";
		}
	}
	else
		echo 'Bad Request!';
?>