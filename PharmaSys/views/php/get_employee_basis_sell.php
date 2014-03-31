<?php
    //echo "<script type='text/javascript' >alert('MIO ID:');</script>";
    $con_2=oci_connect("system","touhid18","localhost/orcl");
    if($con_2){
        //echo $_SESSION["get_mio_id_manager"];
        //echo "Connection: ".$con_2.", SQL: ".$sql.", Result: ".$result."<br>";
        //echo "<script type='text/javascript' >alert('MIO ID: ".$mio_id."');</script>";
        $sql_2="select op.product_code,sum(op.quantity),sum(op.quantity*p.trade_price_vat)
            from order_product op, product p, orders o 
                                where o.emp_id=126 and o.order_id=op.order_id and op.product_code=p.product_code 
                                group by op.product_code order by sum(op.quantity*p.trade_price_vat) desc ";
        $result_2=oci_parse($con_2, $sql_2);
        if($result_2){
            if( oci_execute($result_2) ) {
                $sell_array = array();
                $c=0;
                while( $sell_row=oci_fetch_array($result_2) )
                {
                    $sell_array[$c]=$sell_row;
                    ++$c;
                }
                echo json_encode($sell_array);
                oci_free_statement($result_2);
                oci_close($con_2);
                exit(0);
            }
            else {
                echo "OCI execution error!";
                oci_free_statement($result);
                oci_close($con_2);
                exit(0);
            }
        }
        else {
            echo "OCI Parse error!";
            oci_free_statement($result);
            oci_close($con_2);
            exit(0);
        }
    }
    else{
        echo "OCI connection error!";
        //oci_free_statement($result);
        oci_close($con_2);
         exit(0);
    }
?>