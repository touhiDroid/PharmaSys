<?php
$conn = oci_connect('system', 'touhid18', 'localhost/orcl');
$sql = "select * from stock order by supply_date desc";

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
