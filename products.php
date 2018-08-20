<?php
include 'connections/db_connect.php' ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<?php include_once 'common_header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-021.jpg);">
		<h2 class="l-text2 t-center">
			Games
		</h2>
		<p class="m-text13 t-center">
			New, Hot and Exclusives Available
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!-- Categories -->
						<h4 class="m-text14 p-b-7">
							Platform
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="?category=ALL" class="s-text13 active1">
									All
								</a>
							</li>
<?php
	$sql_display = "SELECT DISTINCT platform FROM products;";
	$result = $db->query($sql_display);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
?>		<li class="p-t-4">
			<a href="?category=<?php echo $row['platform']; ?>" class="s-text13">
				<?php echo $row['platform']; ?>
			</a>
		</li>		
<?php		}
	}
?>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Search
						</h4>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Games...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!-- Product -->
					<div class="row">
<?php

	$size = 12;

	if(isset($_GET['page'])){
		$start = ($_GET['page']-1) *$size;
		$_SESSION['productpage'] = $_GET['page'];
		$currpage = $_GET['page'];
	}
	elseif( isset($_SESSION['productpage']) ){
		$start = $_SESSION['productpage'] * $size;
		$currpage = $_SESSION['productpage'];
	}
	else{
		$start=0;
		$currpage = 0;
	}
	
	
if( isset($_GET['category']) && $_GET['category']=='ALL'  ){
	$sql_products = "SELECT * FROM products LIMIT $start, $size";
}
elseif( isset($_GET['category']) ){
	$sql_products = "SELECT * FROM products WHERE platform='".$_GET['category']."' LIMIT $start, $size";
}
else{
	$sql_products = "SELECT * FROM products LIMIT $start, $size";
}

$result_products = $db->query($sql_products) ;

if (!$result_products->num_rows > 0){
	echo "All Games out on Rent right now";
}
else{
	while($row = $result_products->fetch_assoc()) {
?>
						
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="uploads/products/<?php echo $row['img_one'] ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php?id='<?php echo $row['id']; ?>'" class="block2-name dis-block s-text3 p-b-5">
											<?php echo $row['product_name']; ?>
									</a>
									<span class="block2-id" style="display:none;">
										<?php echo $row['id']; ?>
									</span>
										Rent: <span class="block2-rent m-text6 p-r-5">
											₹<?php echo $row['rent'] ?>
										</span>
										<br>
										Deposit: <span class="block2-deposit m-text6 p-r-5">
											₹<?php echo $row['deposit'] ?>
										</span>
								</div>
							</div>
						</div>
<?php
	}
}
?>

<!-- Original Product Reference
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="images/item-08.jpg" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">

											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.php" class="block2-name dis-block s-text3 p-b-5">
										Denim jacket blue
									</a>

									<span class="block2-price m-text6 p-r-5">
										 ₹92.50
									</span>
								</div>
							</div>
-->
						</div>


					<!-- Pagination -->
					<!--
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
					-->
<div class="pagination flex-m flex-w p-t-26">
<?php
	//page number
    $sql_query_pages     = "SELECT id FROM products";
    $result_pages        = $db->query($sql_query_pages);
    $total_records_pages = $result_pages->num_rows;
    $pages         = intval($total_records_pages / $size);

    for ($i = 1; $i < $currpage; $i++) {
		echo "<a class='item-pagination flex-c-m trans-0-4' href='?page=".$i."'> $i </a>";
		}
	echo "<a class='item-pagination flex-c-m trans-0-4 active-pagination' href='?page=".$i."'> $i </a>";
	$i++;	
    for (; $i <= $pages; $i++) {
		echo "<a class='item-pagination flex-c-m trans-0-4' href='?page=".$i."'> $i </a>";
		}
		// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause
include_once "paging.php";

?>		
</div>
<!--pagination end-->			
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php require_once 'common_footer.php' ;?>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript" >
	
    function show_cart()
    {
	console.log("Show cart called");
      $.ajax({
      type:'post',
      url:'store_items.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        document.getElementById("mycartmob").innerHTML=response;
        
      }
     });

    }

		$('.block2-btn-addcart').each(function(){
			var name = $(this).parent().parent().parent().find('.block2-name').html();
			var idProduct = $(this).parent().parent().parent().find('.block2-id').html();
			var rentProduct = $(this).parent().parent().parent().find('.block2-rent').html();
			var depositProduct = $(this).parent().parent().parent().find('.block2-deposit').html();
			$(this).on('click', function(){
				swal(name, "is added to cart !", "success");
		
			$.ajax({
			type:'post',
			url:'store_items.php',
			data:{
			item_name:name,
			item_rent:rentProduct,
			item_deposit:depositProduct,
			item_id:idProduct
			},
			success:function(response) {
			document.getElementById("total_items").innerHTML=response;
			document.getElementById("total_items_mobile").innerHTML=response;
			document.getElementById("countt").innerHTML=response;
			
			}
			});
	  
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>