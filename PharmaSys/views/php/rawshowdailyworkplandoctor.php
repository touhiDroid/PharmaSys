<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$initial = $_GET['q'];
$obj = json_decode($initial);
//$sql="insert into orders(pharmacy_id,emp_id,order_date) values($obj->pharmacy_id,$obj->employee_id,'$obj->date')";
$sql = "select * from mio_visit_doctor where mio_id=$obj->user_id and visit_month=$obj->start_date and visit_year=$obj->end_date order by visit_done asc,
visit_year desc, visit_month asc";
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
