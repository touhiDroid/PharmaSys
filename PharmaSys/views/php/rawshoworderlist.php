<?php
 $conn=oci_connect('tanzeer','20082010','localhost/xe');
 
$sql=" select o.order_id,o.emp_id,p.pharmacy_id,p.name,o.order_date 
from orders o, pharmacy p where o.completed='0' and p.pharmacy_id=o.pharmacy_id order by pharmacy_id";
 
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

