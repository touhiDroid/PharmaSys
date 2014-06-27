
<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$initial = $_GET['q'];
$obj = json_decode($initial);
//$sql="insert into orders(pharmacy_id,emp_id,order_date) values($obj->pharmacy_id,$obj->employee_id,'$obj->date')";
$sql = 'call insert_mio_visit_pharmacy(:param1,:param2,:param3,:param4,:param5,:param6,:param7)';
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ':param1', $obj->mio_id);
oci_bind_by_name($result, ':param2', $obj->pharmacy_id);
oci_bind_by_name($result, ':param3', $obj->visit_day);
oci_bind_by_name($result, ':param4', $obj->visit_month);
oci_bind_by_name($result, ':param5', $obj->visit_year);
oci_bind_by_name($result, ':param6', $obj->visit_hour);
oci_bind_by_name($result, ':param7', $obj->visit_day);


oci_execute($result);
echo "Successfully created a order";
oci_free_statement($result);
oci_close($conn);
?>
