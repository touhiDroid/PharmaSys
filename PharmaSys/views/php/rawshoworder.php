<?php
 $conn=oci_connect('tanzeer','20082010','localhost/xe');
 
$sql="select o.pharmacy_id,o.emp_id,o.order_id,o.order_date,op.product_code,op.quantity 
from orders o,order_product op
 where o.order_id=op.order_id order by o.order_date desc,o.pharmacy_id asc";
 
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

