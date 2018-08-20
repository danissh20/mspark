<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
	echo count($_SESSION['name']);
	exit();
  }

  if(isset($_POST['item_name']))
  {
    $_SESSION['name'][]=$_POST['item_name'];
    $_SESSION['rent'][]=$_POST['item_rent'];
    $_SESSION['deposit'][]=$_POST['item_deposit'];
    $_SESSION['id'][]=$_POST['item_id'];
    echo count($_SESSION['id']);
    exit();
  }

  if(isset($_POST['showcart']))
  {
	echo '<ul class="header-cart-wrapitem">' ;
	for($i=0; $i < count($_SESSION['id']); $i++)
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
<?php    exit();	
  }
?>