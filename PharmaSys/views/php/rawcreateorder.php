<?php
 $conn=oci_connect('system','20082010','localhost/xe');
 $initial=$_GET['q'];
  $obj=json_decode($initial);
  $sql="insert into orders(pharmacy_id,emp_id,order_date) values($obj->employee_id,$obj->pharmacy_id,'$obj->date')";
  $result=oci_parse($conn,$sql);
oci_execute($result);
oci_free_statement($result);
oci_close($conn);
?>
