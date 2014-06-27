<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$initial = $_GET['q'];
$obj = json_decode($initial);
//$sql="insert into orders(pharmacy_id,emp_id,order_date) values($obj->pharmacy_id,$obj->employee_id,'$obj->date')";
$sql = 'call insert_stock_product(:param1,:param2,:param3)';
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ':param1', $obj->stock_id);
oci_bind_by_name($result, ':param2', $obj->product_code);
oci_bind_by_name($result, ':param3', $obj->quantity);

oci_execute($result);
echo "Successfully posted ";
oci_free_statement($result);
oci_close($conn);
?>
