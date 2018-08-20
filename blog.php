<?php
	require_once 'connections/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<?php require_once 'common_header.php'; ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-022.jpg);">
		<h2 class="l-text2 t-center" style="color:#191e16;">
			Blog
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						
						
						<!-- item blog -->
<?php
$sql_blogs = "SELECT title,image, DATE_FORMAT(created_at, '%d/%m/%Y') AS date, LEFT(body , 200) AS body_concise FROM posts LIMIT 5";
$result_blogs = $db->query($sql_blogs) ;
if ($result_blogs->num_rows > 0) {
	while($row = $result_blogs->fetch_assoc()) {
?>						
						<div class="item-blog p-b-80">
							<a href="blog-detail.php" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="uploads/blogs/<?php echo $row['image']?>" alt="IMG-BLOG" style="max-width:720px; max-heigth:539px;">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									<?php echo $row['date']; ?>
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="blog-detail.php" class="m-text24">
										<?php echo $row['title']; ?>
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By mSpark Gaming
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										Gaming
										<span class="m-l-3 m-r-6">|</span>
									</span>
								</div>

								<p class="p-b-12">
									<?php echo $row['body_concise']; ?>...
								</p>

								<a href="blog-detail.php" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
<?php
	}
}
?>					
						

						<!-- item blog -->
						<div class="item-blog p-b-80">
							<a href="blog-detail.php" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="images/blog-03.jpg" alt="IMG-BLOG">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									16 Dec, 2018
								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="blog-detail.php" class="m-text24">
										Black Friday Guide: Best Sales & Discount Codes
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										Cooking, Food
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										8 Comments
									</span>
								</div>

								<p class="p-b-12">
									Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eget dictum tortor. Donec dictum vitae sapien eu varius
								</p>

								<a href="blog-detail.php" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>

					<!-- Pagination -->
<div class="pagination flex-m flex-w p-r-50">
<?php
	
	//page number
	$size = 5;
	
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

    for ($i = 1; $i < $currpage; $i++) {
		echo "<a class='item-pagination flex-c-m trans-0-4' href='?page=".$i."'> $i </a>";
		}
	echo "<a class='item-pagination flex-c-m trans-0-4 active-pagination' href='?page=".$i."'> $i </a>";
	$i++;	
    for (; $i <= $pages; $i++) {
		echo "<a class='item-pagination flex-c-m trans-0-4' href='?page=".$i."'> $i </a>";
		}
?>
</div>	
					
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Categories
						</h4>

						<ul>
							<li class="p-t-6 p-b-8 bo6">
								<a href="?category=ALL" class="s-text13 p-t-5 p-b-5">
									ALL
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="?category=PS4" class="s-text13 p-t-5 p-b-5">
									PS4
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="?category=PSVR" class="s-text13 p-t-5 p-b-5">
									PSVR
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="?category=XBOXONE" class="s-text13 p-t-5 p-b-5">
									XBOX ONE
								</a>
							</li>
							
						</ul>

						<!-- 5 Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Featured Products
						</h4>
						<ul class="bgwhite">
<?php
$sql_products = "SELECT * FROM products LIMIT 5";
$result_products = $db->query($sql_products) ;
if (!$result_products->num_rows > 0){
	echo "All Games out on Rent right now";
}
else{
	while($row = $result_products->fetch_assoc()) {
?>

								<li class="flex-w p-b-20">
								<a href="product-detail.php" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="uploads/products/<?php echo $row['img_one'] ?>" alt="IMG-PRODUCT" style="max-heigth:960px; max-width:720px;">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.php" class="s-text20">
										<?php echo $row['product_name'] ?>
									</a>

									Rent: <span class="dis-block s-text17 p-t-6">
										₹<?php echo $row['rent'] ?>
									</span>
									Deposit: <span class="dis-block s-text17 p-t-6">
										₹<?php echo $row['deposit'] ?>
									</span>
								</div>
							</li>

<?php
	}
}
?>
							
<!--
							<li class="flex-w p-b-20">
								<a href="product-detail.php" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="images/item-17.jpg" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="product-detail.php" class="s-text20">
										Converse All Star Hi Black Canvas
									</a>

									<span class="dis-block s-text17 p-t-6">
										Rs 39.00
									</span>
								</div>
							</li>
-->
						</ul>

						<!-- Archive -->
						<h4 class="m-text23 p-t-50 p-b-16">
							Archive
						</h4>

						<ul>
							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									July 2018
								</a>

								<span class="s-text13">
									(9)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									June 2018
								</a>

								<span class="s-text13">
									(39)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									May 2018
								</a>

								<span class="s-text13">
									(29)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									April  2018
								</a>

								<span class="s-text13">
									(35)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									March 2018
								</a>

								<span class="s-text13">
									(22)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									February 2018
								</a>

								<span class="s-text13">
									(32)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									January 2018
								</a>

								<span class="s-text13">
									(21)
								</span>
							</li>

							<li class="flex-sb-m">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									December 2017
								</a>

								<span class="s-text13">
									(26)
								</span>
							</li>
						</ul>

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

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
