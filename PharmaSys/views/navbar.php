<?php 
echo '<!-- navbar -->
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <img src="http://localhost/_DatabaseProject/PharmaSys/images/icon.png" style="float: left; align: center;"/>
        <a class="navbar-brand" href="http://localhost/_DatabaseProject/PharmaSys">Demo Pharmaceuticals Ltd.</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li id="nav_home" class="active"> <a href="http://localhost/_DatabaseProject/PharmaSys">Home</a> </li>
            <li id="nav_product">
                <a id="" href="" class="top_link"><span>PRODUCTS</span></a>
                <ul class="sub-list-item">
                    <li><a href="pharma-products.php">Pharma Products</a></li>
                    <li><a href="ophthalmic-products.php">Ophtha products</a></li>
                    <li><a href="products-by-trade-name.php">Search by Trade Name</a></li>
                    <li><a href="products-by-generic-name.php">Search by Generic Name</a></li>
                    <li><a href="products-by-therapeutic-class.php">Search by Therapeutic Class</a></li>
                    <li><a href="APL_Products.xls">Product List</a></li>
                </ul>
            <li>
            <li id="nav_about">    <a href="#">About</a>  </li>
            <li id="nav_contact">    <a href="#">Contact</a>  </li>

          </ul>';
$name = getSessionEmployeeName();
if( isSessionSet() )
  { // TODO : Navigate for other 3 users by checking types: "MANAGER", "MIO MANAGER", "DEPOT MANAGER", "MIO"
  echo  '<p class="navbar-text navbar-right">
          <a href="http://localhost/_DatabaseProject/PharmaSys/views/manager_view.php" class="navbar-link">'
            .$name
          .'</a></p>';
}
else
  echo   '<form class="navbar-form navbar-right" role="sign-in">
            <button type="button" id="btn_sign_in" class="btn btn-primary ">
              <span class="glyphicon glyphicon-user"></span>Sign In
            </button>
          </form>';

echo     '<form class="navbar-form navbar-right" role="search" action="search.php">
            <div class="form-group left-inner-addon">
              <input type="text" name="search_val" id="search_val" class="form-control" placeholder="Search">
              <i class="glyphicon glyphicon-search"></i>
            </div>
          </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->';
//echo "<script type='text/javascript' >alert('done navbar');</script>";
?>