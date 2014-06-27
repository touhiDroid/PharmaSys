<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$initial = $_GET['q'];
$obj = json_decode($initial);
$sql = "select * from order_product where order_id=$obj->id";

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
