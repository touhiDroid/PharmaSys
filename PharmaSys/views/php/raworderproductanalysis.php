<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$initial = $_GET['q'];
$obj = json_decode($initial);
//$sql="insert into orders(pharmacy_id,emp_id,order_date) values($obj->pharmacy_id,$obj->employee_id,'$obj->date')";
$sql = "select o.emp_id,op.product_code,sum(op.quantity) as t
 from orders o, order_product op 
 where o.emp_id=$obj->user_id and o.order_id=op.order_id and o.order_date>='$obj->start_date' and o.order_date<='$obj->end_date' group by o.emp_id,op.product_code";
$result = oci_parse($conn, $sql);

oci_execute($result);
$table = array();
$a = 0;
while ($row = oci_fetch_array($result)) {
	$table[$a] = $row;
	++$a;
	// echo $row[0];
}
echo json_encode($table);
oci_free_statement($result);
oci_close($conn);
?>
