<script type="text/javascript">
    function setProfile(dataRow){
        alert(dataRow+" : some");
    }
</script>
<?php
    session_start();
    include 'C:/xampp/htdocs/_DatabaseProject/PharmaSys/php/session.php';
    if( isSessionSet() ){
        $con=oci_connect("system","touhid18","localhost/orcl");
        if($con){
            $sql="select * from employee where emp_id=".getSessionEmployeeId(); 
            $result=oci_parse($con,$sql);
            //echo "Connection: ".$con.", SQL: ".$sql.", Result: ".$result."<br>";
            if($result){
                if( oci_execute($result) ) {
                    if( $row=oci_fetch_array($result) ){
                        /*echo "<script type='text/javascript' >alert('"
                            .$row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[6]
                            .$row[7].$row[8].$row[9].$row[10].$row[11].$row[12].$row[13]
                            .$row[14].$row[15].$row[16].$row[17]
                            ."');</script>";*/
                        ?><script type="text/javascript">setProfile( <?php $row[1]; ?> );</script><?php
                        oci_free_statement($result);
                        oci_close($con);
                    }
                    else{
                        echo "<script type='text/javascript' >alert('SQL error');</script>";
                        oci_free_statement($result);
                        oci_close($con);
                    }
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
<!DOCTYPE html>
<html>
<head>
    <title>Demo Pharmaceutical Ltd.</title>
    <!-- Image Slider -->
    <link href="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/js-image-slider.js" type="text/javascript"></script>

    <!-- CSS -->
    <link href="http://localhost/_DatabaseProject/PharmaSys/js/image_slider/jsImgSlider/themes/2/generic.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/styles_touhid.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/_DatabaseProject/PharmaSys/css/Bootstrap/simple-sidebar/css/simple-sidebar.css" rel="stylesheet">

    <!-- JS -->
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/JQuery/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="http://localhost/_DatabaseProject/PharmaSys/js/JQuery/jquery.form.js" type="text/javascript"></script>
    <!--<script src="http://localhost/_DatabaseProject/PharmaSys/js/manager_view.js" type="text/javascript"></script>-->
</head>
<body>

    <div id="wrapper">
        <?php       
            include 'navbar.php';
            include 'manager_side_menu.php';
        ?>

    <!-- <div class="page-content-wrapper">
        <span>hello<br><br><br><br><br>salam</span>
        <div id="d_body">
        </div>
        <button id="bt" class="btn-primary">click</button>
    </div> -->
        <div id="page-content-wrapper"><br><br><br>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div style="float: left;">
                        <img src="http://localhost/_DatabaseProject/PharmaSys/images/pro_pic.png" alt="Manager" />
                    </div>
                    <div  style="float: left;" id="d_body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
