<?php
 $conn=oci_connect('system','touhid18','localhost/orcl');
$sql="select op.product_code,p.product_name,trade_price_vat,sum(op.quantity) as s,sum(op.quantity*p.trade_price_vat) as p 
from order_product op,product p where op.product_code=p.product_code 
group by op.product_code,p.product_name,p.trade_price_vat order by sum(op.quantity*p.trade_price_vat) desc";
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

