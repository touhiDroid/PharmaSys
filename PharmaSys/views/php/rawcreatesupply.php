<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$initial = $_GET['q'];
$obj = json_decode($initial);
//$sql="insert into orders(pharmacy_id,emp_id,order_date) values($obj->pharmacy_id,$obj->employee_id,'$obj->date')";
$sql = 'call insert_supply(:param1,:param2)';
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ':param1', $obj->depo_id);
oci_bind_by_name($result, ':param2', $obj->date);

oci_execute($result);
echo "Successfully created a supply";
oci_free_statement($result);
oci_close($conn);
?>
