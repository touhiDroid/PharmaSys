<?php
 $conn=oci_connect('tanzeer','20082010','localhost/xe');
$sql="select * from product";
$result=oci_parse($conn,$sql);
oci_execute($result);
 $table=array();
    $a=0;
while($row=oci_fetch_array($result))
{
 $table[$a]=$row;
      ++$a;
	 // echo $row[0];
}
echo json_encode($table);
oci_free_statement($result);
oci_close($conn);
?>

