<?php
 $conn=oci_connect('tanzeer','20082010','localhost/xe');
 $initial=$_GET['q'];
  $obj=json_decode($initial);
   $sql="insert into order_product values($obj->order_id,'$obj->product_code',$obj->quantity)";
   //$sql="insert into order_product values(102,'TAB_ACZ2',200)";
   $result=oci_parse($conn,$sql);
oci_execute($result);
oci_free_statement($result);
oci_close($conn);
?>
