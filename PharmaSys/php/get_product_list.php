<?php
    session_start();
    include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
    if( isSessionSet() ){
        $con=oci_connect("system","touhid18","localhost/orcl");
        if($con){
            $sql="select * from product "; 
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