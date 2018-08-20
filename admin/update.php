<?php

 	include '../connections/db_connect.php' ;
	mysqli_report(MYSQLI_REPORT_ALL);
	$idd = $_POST['id'];

	$_SESSION['loggedin'] = true ;
if(isset($_POST['change_product']) && $_SESSION['loggedin'] == true ){	
	
	$sql_query = $db->prepare( "SELECT id, details, product_name ,rent, deposit, platform, category, product_quantity, img_one from products WHERE id=?") OR die('query preparation failed');
	
	$sql_query->bind_param('i',$idd);
	$sql_query->execute();
	
	$sql_query->bind_result($idd, $p_details, $p_name, $p_rent, $p_deposit, $p_platform, $p_cat, $p_quant , $image );
	$sql_query->fetch();
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Danish">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>mSpark Update Product</title>
    
	
	<link rel="stylesheet" href="css/lib/html5-editor/bootstrap-wysihtml5.css" />
	<!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
		
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- End Comment -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
		
        <!-- Left Sidebar  -->
		<?php include 'admin_left_sidebar.php' ;?>
		<!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Product</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
                        <li class="breadcrumb-item active">Update Product</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
			
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="card card-outline-primary">
						    <div class="card-header">
                                <h4 class="m-b-0 text-white">Update Product</h4>
                            </div>
							<div class="card-body">
                            <form action="update_content.php" method="POST" enctype="multipart/form-data">
							
							<input type="hidden" name="idimage[]" value="<?php echo $idd; ?>">
							<input type="hidden" name="idimage[]" value="<?php echo $image; ?>">
							
                            <h3 class="card-title m-t-15">Game Title</h3>
							<input name="product-title" type="text" placeholder="Name of the Game" class="input-md form-control" value="<?php echo $p_name; ?>" required>
							
							</input>
							<br>
                            
							<div class="row p-t-20">
                            
							<div class="form-group col-sm-4">
							<label>Rent</label>
							<input name="product-rent" type="number" placeholder="₹" class="form-control" value="<?php echo $p_rent; ?>" required></input>							
							</div>
							
							<div class="form-group col-sm-4">
							<label>Deposit</label>
							<input name="product-deposit" type="number" placeholder="&#8377" class="form-control" value="<?php echo $p_deposit; ?>" required></input>							
							</div>
							
							<div class="form-group col-sm-4">
							<label>Platform</label>
							<input name="product-platform" type="text" placeholder="PS4" class="form-control"  value="<?php echo $p_platform; ?>" required></input>							
							</div>
							
							<div class="form-group col-sm-4">
							<label>Category</label>
							<input name="product-cat" type="text" placeholder="action/fantasy" class="form-control"  value="<?php echo $p_cat; ?>"  required></input>							
							</div>
							
							<!---<div class="form-group col-sm-4">
							<label>Sub-Category</label>
							<input name="product-sub-cat" type="text" placeholder="Optional" class="form-control"></input>							
							</div>--->
							
							<div class="form-group col-sm-4">
							<label>Quantity</label>
							<input name="product-quantity" type="number" placeholder="5" class="form-control"  value="<?php echo $p_quant; ?>" required></input>							
							</div>
							
							<div class="form-group col-sm-4">
							<label>Extra Details</label>
							<input name="product-details" type="text" placeholder="Deluxe etc." class="form-control"  value="<?php echo $p_details; ?>" ></input>							
							</div>

							<div class="form-group col-sm-6">
							<label>Update Image (Optional)</label><br>
                            <input type="file" size="32" name="my_field" value="">
							</div>
							
							<div class="form-group col-sm-12">
							<button type="submit" class="btn btn-success" name="updateproduct" id="submit_form" value="Submit Form" style="width:99%;"> <i class="fa fa-check"></i>
							Add Game</button>
                            </div>
							
							</form>
							</div>
							</div>
						</div>
					</div>
				</div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Powered by <a href="https://psychocodes.in">Psychocodes.in</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="js/lib/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-init.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>
</html>
<?php

}
elseif(isset($_POST['change_blog']) && $_SESSION['loggedin'] == true ){
	
	$sql_query = $db->prepare( "SELECT id, title, image, body FROM posts WHERE id=?") OR die('query preparation failed');
	
	$sql_query->bind_param('i',$idd);
	$sql_query->execute();
	
	$sql_query->bind_result($id, $title, $image, $blogcontent );
	$sql_query->fetch();
	
?>	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>mSpark Admin Blog </title>
    
	
	<link rel="stylesheet" href="css/lib/html5-editor/bootstrap-wysihtml5.css" />
	<!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
		
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->

                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- End Comment -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
		
        <!-- Left Sidebar  -->
		<?php include 'admin_left_sidebar.php' ;?>
		<!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Blog</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
			
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
					<div class="card card-outline-primary">
						<div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Blog</h4>
						</div>
                        <div class="card-body">
                            <div class="card-body">
                            
							<form action="update_content.php" method="POST" enctype="multipart/form-data">
							
							<input type="hidden" name="idimage[]" value="<?php echo $idd; ?>">
							<input type="hidden" name="idimage[]" value="<?php echo $image; ?>">
							
							<h3 class="card-title m-t-15"> Title </h3>
							<input name="blog-title" type="text" placeholder="Blog Title" class="input-md form-control" required value="<?php echo $title; ?>">
							
							</input>
							<br>
                            
							<div class="form-group">
							<h3>Blog</h3>
							</div>
                            
							<div class="form-group">
							<textarea name="blog-content" class="textarea_editor form-control" rows="15" placeholder="Enter text ..." style="height:450px" required>
							
							<?php echo $blogcontent; ?>
							
							</textarea>
							
							<p class="text-muted m-b-15 f-s-12">Edit blog for mSpark </p>
							</div>

							<div class="form-group">
                            <input type="file" size="32" name="my_field" value="">
							</div>
							
							<div class="form-group">
							<button type="submit" class="btn btn-success" name="updateblog" id="submit_form" value="Submit Form" style="width:99%;"><i class="fa fa-check"></i>Update Blog</button>
                            </div>
							
							</form>
							</div>
						</div>
					</div>
					</div>
				</div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Powered by <a href="https://psychocodes.in">Psychocodes.in</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="js/lib/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="js/lib/html5-editor/wysihtml5-init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>
</html>
<?php
}

else{
	echo "Unauthorized Access";
}
?>