	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Free Shipping on All Plans
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						msparkgamingindia@gmail.com
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>INR</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!--Wrap Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Home</a>
							</li>

							<!----Sale is how it works--->
							<li class="sale-noti">
								<a href="renting.php">How Rent Works</a>
							</li>
							
							<li>
								<a href="products.php">Shop</a>
							</li>

							<li>
								<a href="cart.php">Cart</a>
							</li>

							<li>
								<a href="blog.php">Blog</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Desktop Icon -->
				<div class="header-icons">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<!--CART-->
					<div  class="header-wrapicon2" onclick="show_cart();" >
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON" onclick="show_cart();">
						<span id="total_items" class="header-icons-noti">
						<?php
						if(isset($_SESSION['id']) ){
						$count = count($_SESSION['id']);
						}else{	$count = 0;
						}
						echo $count;
						?>
						</span>

						<!-- Header cart noti -->
						<div id="mycartmob" class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">

							
<?php						
							if($count == 0){
								echo '
									<!-- Button -->
									<a href="products.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" style="background-color:#e65540">
										Start Shopping
									</a>
								';
							}
							for($i=0;$i < $count ;$i++)
							{	?>	
								<li class="header-cart-item">
									<div class="header-cart-item-txt">
										<a href="products?id=<?php echo $_SESSION['id'][$i]; ?>" class="header-cart-item-name">
											<?php echo $_SESSION['name'][$i]; ?>
											<!--PHP CODE-->
										</a>

										<span class="header-cart-item-info">
											<?php echo $_SESSION['rent'][$i]; ?>
											<?php echo $_SESSION['deposit'][$i]; ?>
											<!--PHP CODE-->
										</span>
									</div>
								</li>
						<?php } ?>
							</ul>

							<div class="header-cart-total">
								<!-- CALC IT Total:  ₹36.00-->
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2" onclick="show_cart();" >
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON" onclick="show_cart();">
						<span id="total_items_mobile" class="header-icons-noti">
						<?php
						if(isset($_SESSION['id']) ){
						$count = count($_SESSION['id']);
						}else{	$count = 0;
						}
						echo $count;
						?>
						</span>

						<!-- Header cart noti -->
						<div id="mycart" class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">

							
<?php						
							if($count == 0){
								echo '
									<!-- Button -->
									<a href="products.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" style="background-color:#e65540">
										Start Shopping
									</a>
								';
							}
							for($i=0;$i < $count ;$i++)
							{	?>	
								<li class="header-cart-item">

									<div class="header-cart-item-txt">
										<a href="product-detail.php?id=<?php echo $_SESSION['id'][$i]; ?>" class="header-cart-item-name">
											<?php echo $_SESSION['name'][$i]; ?>
											<!--PHP CODE-->
										</a>

										<span class="header-cart-item-info">
											<?php echo $_SESSION['rent'][$i]; ?>
											<?php echo $_SESSION['deposit'][$i]; ?>
											<!--PHP CODE-->
											

										</span>
									</div>
								</li>
						<?php } ?>
							</ul>

							<div class="header-cart-total">
								<!-- CALC IT Total:  ₹36.00-->
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for all plans
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								msparkgamingindia@gmail.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>INR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="products.php">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="renting.php">How Rent Works</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.php">Cart</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.php">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.php">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>