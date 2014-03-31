<?php
    if( isSessionSet() ){
        $con=oci_connect("system","touhid18","localhost/orcl");
        if($con){



            $sql="select S.depo_id, S.stock_id, SP.product_code, SP.quantity, S.supply_date, S.received_date
                from stock S, stock_product SP
                where S.stock_id=SP.stock_id"; 




            $result=oci_parse($con,$sql);
            //echo "Connection: ".$con.", SQL: ".$sql.", Result: ".$result."<br>";
            if($result){
                if( oci_execute($result) ) {
                    $table=array();
                    $a=0;
                    while($row=oci_fetch_array($result))
                    {
                        $table[$a]=$row;
                        ++$a;
                        // echo $row[0];
                    }
                    echo json_encode($table);
                    /*else{
                        echo "<script type='text/javascript' >alert('SQL error');</script>";
                    }*/
                    oci_free_statement($result);
                    oci_close($con);
                    exit(0);
                }
                else{
                    echo "<script type='text/javascript' >alert('OCI execution error!');</script>";
                    oci_free_statement($result);
                    oci_close($con);
                }
            }
            else{
                echo "<script type='text/javascript' >alert('OCI Parse error!');</script>";
                oci_free_statement($result);
                oci_close($con);
            }
        }
        else{
            echo "<script type='text/javascript' >alert('OCI connection error!');</script>";
            oci_free_statement($result);
            oci_close($con);
        }
    }
?>