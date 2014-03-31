<?php
    session_start();
    include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
    if( isSessionSet() ){
        $con=oci_connect("system","touhid18","localhost/orcl");
        if($con){
            $mio_id = $_GET['mio_id'];
            $sql="select * from employee where emp_id=".$mio_id;
            $result=oci_parse($con,$sql);
            //echo "Connection: ".$con.", SQL: ".$sql.", Result: ".$result."<br>";
            if($result){
                if( oci_execute($result) ) {
                    if($row=oci_fetch_array($result))
                    {
                        /*$sell_sql = "select op.product_code,sum(op.quantity),sum(op.quantity*p.trade_price_vat) 
                                    from order_product op, product p, orders o 
                                    where o.emp_id=".$mio_id." and o.order_id=op.order_id and op.product_code=p.product_code 
                                    group by op.product_code order by sum(op.quantity*p.trade_price_vat) desc;";
                        $result_2=oci_parse($con,$sell_sql);
                        if($result_2) {
                            if( oci_execute($result_2) ) {
                                $sell_array = array();
                                $c=0;
                                while($sell_row=oci_fetch_array($result_2)) {
                                    $sell_array[$c]=$sell_row;
                                    ++$c;
                                }
                            }
                        }*/
                        $_SESSION["get_mio_id_manager"]=$mio_id;
                        echo "<script type='text/javascript' >alert('".$_SESSION["get_mio_id_manager"]."');</script>";
                        oci_free_statement($result_2);
                        oci_free_statement($result);
                        oci_close($con);
                    }
                    else{
                        echo "<script type='text/javascript' >alert('SQL error');</script>";
                        oci_free_statement($result);
                        oci_close($con);
                        //exit(0);
                    }
                }
                else {
                    echo "<script type='text/javascript' >alert('OCI execution error!');</script>";
                    oci_free_statement($result);
                    oci_close($con);
                    //exit(0);
                }
            }
            else {
                echo "<script type='text/javascript' >alert('OCI Parse error!');</script>";
                oci_free_statement($result);
                oci_close($con);
                //exit(0);
            }
        }
        else{
            echo "<script type='text/javascript' >alert('OCI connection error!');</script>";
            //oci_free_statement($result);
            oci_close($con);
             //exit(0);
        }
    }
    else
        echo "<script type='text/javascript' >alert('Session Timed Out! Please log in again.');</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo Pharmaceutical Ltd.</title>
    <!-- Image Slider -->
    <link href="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/js-image-slider.js" type="text/javascript"></script>

    <!-- Graph Requirements
    <link href="css/basic.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/enhance.js"></script>     
    <script type="text/javascript">
        // Run capabilities test
        enhance({
            loadScripts: [
                'js/excanvas.js',
                'js/jquery.min.js',
                'js/visualize.jQuery.js',
                'js/example.js'
            ],
            loadStyles: [
                'css/visualize.css',
                'css/visualize-light.css'
            ]   
        });   
    </script> -->

    <!-- CSS -->
    <link href="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/generic.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/styles_touhid.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/Bootstrap/simple-sidebar/css/simple-sidebar.css" rel="stylesheet">

    <!-- JS -->
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/JQuery/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/JQuery/jquery.form.js" type="text/javascript"></script>
    <!--<script src="http://localhost/_DatabaseProject/PharmaSys/js/manager_view.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        $( document ).ready(function() {

            var mioTable = $("#mio_table");
            alert("Calling");
            $.ajax({
                url: 'http://localhost/_DatabaseProject/PharmaSys/views/php/get_employee_basis_sell.php',
                dataType: "json", 
                success: function(data) {
                    alert("Scuccess has received data as: "+data);
                    /*$.each( data, function(i, jObj) {
                        var id=jObj.EMP_ID;
                        id="<a id='mio"+id+"' href='mio_profile_show.php?mio_id="+id+"' >"+id+"</a>";
                        //mioIdArray[count++]=id;

                        var name=jObj.EMP_NAME;
                        var phone_no=jObj.PHONE_NO;
                        var email=jObj.EMAIL;
                        var area_code=jObj.AREA_CODE;
                        //alert(name+", "+email);
                        var address=jObj.HOUSE_NO+", "+jObj.ROAD_NO+", "+jObj.POST_OFFICE+", "+jObj.DISTRICT;
                        mioTable.append('<tr><td>'+id+'</td><td>'+name+'</td><td>'+phone_no+'</td><td>'+email+'</td><td>'+area_code+'</td><td>'+address+'</td></tr>');
                    });*/
                },
            });// ajax end

        });// READY Block end  
    </script>


</head>

<body>

    <div id="wrapper">
        <?php
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>

        <div id="page-content-wrapper"><br><br><br>
            <!-- Keep all page content within the page-content inset div! -->
            <div style="float: left;">
                <img src="http://localhost/_DatabaseProject/PharmaSys/images/pro_pic.png" alt="Manager" />
            </div>
            <div  style="float: left;" id="d_body">
                Name: <?php echo $row[3];?> <br>
                Phone No: <?php echo $row[8];?> <br>
                Email: <?php echo $row[9];?> <br>
                Salary: <?php echo $row[10];?> <br>
                Join Date: <?php echo $row[12];?> <br>
                Birth Date: <?php echo $row[13];?> <br>
                Area Code: <?php echo $row[14];?> <br>
                House No: <?php echo $row[4];?> <br>
                Road No: <?php echo $row[5];?> <br>
                Post Office: <?php echo $row[6];?> <br>
                District: <?php echo $row[7];?> <br>
            </div>
            <table class="table table-stripped" id="mio_table">
                <caption><h3>MIO Sales by Product</h3></caption>
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Quantity</th>
                        <th>Price(with VAT)</th>
                    </tr>
                </thead>
            </table>
            
        </div>
    </div>
</body>
</html>

<!--
    <div>
                <table>
                    <caption>MIO Sales by Product</caption>
                    <thead>
                        <tr>
                            <td></td>
                            <th scope="col">food</th>
                            <th scope="col">auto</th>
                            <th scope="col">household</th>
                            <th scope="col">furniture</th>
                            <th scope="col">kitchen</th>
                            <th scope="col">bath</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Mary</th>
                            <td>190</td>
                            <td>160</td>
                            <td>40</td>
                            <td>120</td>
                            <td>30</td>
                            <td>70</td>
                        </tr>
                        <tr>
                            <th scope="row">Tom</th>
                            <td>3</td>
                            <td>40</td>
                            <td>30</td>
                            <td>45</td>
                            <td>35</td>
                            <td>49</td>
                        </tr>
                        <tr>
                            <th scope="row">Brad</th>
                            <td>10</td>
                            <td>180</td>
                            <td>10</td>
                            <td>85</td>
                            <td>25</td>
                            <td>79</td>
                        </tr>
                        <tr>
                            <th scope="row">Kate</th>
                            <td>40</td>
                            <td>80</td>
                            <td>90</td>
                            <td>25</td>
                            <td>15</td>
                            <td>119</td>
                        </tr>       
                    </tbody>
                </table>
            <div>
-->
