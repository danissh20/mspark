<?php
	session_start();
 	include '../connections/db_connect.php' ;
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
                    <h3 class="text-primary">All Blog Posts</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Blog posts</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
			
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                    <div class="card-body">
                      <div class="table-responsive m-t-40">   
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Content</th>
							  <th>Created At</th>
							  <th>Image</th>
							  <th>Action</th>
                            </tr>
                          </thead>                          
						  
						  <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Content</th>
							  <th>Created At</th>
							  <th>Image</th>
							  <th>Action</th>
                            </tr>
                          </tfoot>
						  <tbody>
							
</html>

<?php

	$size = 10;

	if(isset($_GET['page'])){
		$start = ($_GET['page']-1) *$size;
		$_SESSION['blogpage'] = $_GET['page'];
		$currpage = $_GET['page'];
	}
	elseif( isset($_SESSION['blogpage']) ){
		$start = $_SESSION['blogpage'] * $size;
		$currpage = $_SESSION['blogpage'];
	}
	else{
		$start=0;
		$currpage = 0;
	}

	$sql_query_pages     = "SELECT id FROM posts";
    $result_pages        = $db->query($sql_query_pages);
    $total_records_pages = $result_pages->num_rows;
    $pages         = intval($total_records_pages / $size);
	
	echo '<nav aria-label="Page navigation example">
	<ul class="pagination">
	<li class="page-item">';

    for ($i = 1; $i < $currpage; $i++) {
		echo "<li class='page-item'> <a class='page-link' href='?page=".$i."'> $i </a> </li>";
		}
	echo "<li class='page-item active'> <a class='page-link' href='?page=".$i."'>  $i  </a> </li>";
	$i++;	
    for (; $i <= $pages; $i++) {
		echo "<li class='page-item'> <a class='page-link' href='?page=".$i."'>  $i  </a> </li>";
		}
	echo '</ul></li></nav>';
	
	$sql_display = "SELECT id, title ,image, DATE_FORMAT(created_at, '%d/%m/%Y') AS date, LEFT(body , 50) AS body_concise FROM posts LIMIT $start, $size;";
	
	$result = $db->query($sql_display);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

        echo "<tr><th scope='row'>". $idd=$row['id'] ;
		echo '</th><td>';
			echo $row['title'];
		echo "</td><td>";	
			echo $row['body_concise'];
		echo "</td><td>";
			echo $row['date'];
		echo "</td><td>";
			$MyPhoto = $row['image'];
			echo "<img id='".$idd."' src = '../uploads/blogs/".$MyPhoto."' data-toggle='modal' data-target='#myModal' height='100'/>";
?>
		</td><td>

		<form action='update.php' method='POST'>
			<input type='hidden' name = 'id' value = "<?php echo $idd;?>.">
			<input type = 'submit' class='btn' name= 'change_blog' value='Edit'>
		</form>
			
		<form action='delete.php' method='POST' onsubmit="return confirm('Are you sure you want to Delete?');">
		<input type='hidden' name = 'id' value = "<?php echo $idd;?> ">
		<input type = 'submit' class='btn btn-danger' name= 'deleteblog' value ='Delete'>
		</form>
			
		</td>
		</tr>
<?php
	}
	}//end if
?>
						 
<html>						  
                          </tbody>
                        </table>
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
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

	
	<!--For Exporting and Stuff-->
	<script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>	
</body>

</html>