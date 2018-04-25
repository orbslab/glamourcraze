	<div id="so-groups" class="right so-groups-sticky hidden-xs" style="top: 196px">
		<a class="sticky-categories" data-target="popup" data-popup="#popup-categories"><span>Categories</span><i class="fa fa-align-justify"></i></a>
		<a class="sticky-mycart" data-target="popup" data-popup="#popup-mycart"><span>Cart</span><i class="fa fa-shopping-cart"></i></a>
		<a class="sticky-mysearch" data-target="popup" data-popup="#popup-mysearch"><span>Search</span><i class="fa fa-search"></i></a>
		<a class="sticky-backtop" data-target="scroll" data-scroll="html"><span>Go to Top</span><i class="fa fa-angle-double-up"></i></a>
		<div class="popup popup-categories popup-hidden" id="popup-categories">
			<div class="popup-screen">
				<div class="popup-position">
					<div class="popup-container popup-small">
						<div class="popup-header">
							<span><i class="fa fa-align-justify"></i>All Categories</span>
							<a class="popup-close" data-target="popup-close" data-popup-close="#popup-categories">&times;</a>
						</div>
						<div class="popup-content">
							<div class="nav-secondary">
								<ul>
									<?php
		                                try {
		                                    $link = $conn->prepare("SELECT * FROM category");
		                                    $link->execute();
		                                    while ($link_row = $link->fetch(PDO::FETCH_ASSOC)) {
		                            ?>
										<li>
											<a href="products.php?cat=<?php echo $link_row['cat_name'];?>"><i class="fa fa-chevron-down nav-arrow"></i><?php echo $link_row['cat_name'];?></a>
										</li>
									<?php
		                                    }
		                                } catch(PDOException $e) {
		                                  echo "Error: ".$e->getMessage();
		                                }
		                            ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popup popup-mycart popup-hidden" id="popup-mycart">
			<div class="popup-screen">
				<div class="popup-position">
					<div class="popup-container popup-small">
						<div class="popup-html">
							<div class="popup-header">
								<span><i class="fa fa-shopping-cart"></i>Shopping Cart</span>
								<a class="popup-close" data-target="popup-close" data-popup-close="#popup-mycart">&times;</a>
							</div>
							<div class="popup-content">
								<div class="cart-header">
									<div class="notification gray">
										<i class="fa fa-shopping-cart info-icon"></i>
										<p><?php echo sizeof($_SESSION['cart']);?> Product On Cart.<a href="cart.php"> Go For Check Out</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popup popup-mysearch popup-hidden" id="popup-mysearch">
			<div class="popup-screen">
				<div class="popup-position">
					<div class="popup-container popup-small">
						<div class="popup-html">
							<div class="popup-header">
								<span><i class="fa fa-search"></i>Search</span>
								<a class="popup-close" data-target="popup-close" data-popup-close="#popup-mysearch">&times;</a>
							</div>
							<div class="popup-content">
								<div class="form-content">
									<form action="search.php" method="get">
										<div class="row space">
											<div class="col">
												<div class="form-box">
													<input type="text" name="keyword" placeholder="Search" id="input-search" class="field" />
													<i class="fa fa-search sbmsearch"></i>
												</div>
											</div>
											<div class="col">
												<div class="form-box">
													<button type="submit" id="button-search" class="btn button-search">Search</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		
	<!-- Footer Section Start -->
	<footer class="footer-container footer">
		<div class="footer-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-2 col-sm-2">
						<a class="brand" href="#">Glamour Craze</a>
					</div>
					<div class="col-lg-8 col-md-10 col-sm-10">
						<ul class="">
							<li class="">
								<a href="#" class="nav-link">About-us</a>
							</li>
							<li>
								<a class="nav-link">FAQ's</a>
							</li>
							<li>
								<a href="#" class="nav-link">Affiliates</a>
							</li>
							<li>
								<a href="#" class="nav-link">Privacy</a>
							</li>
							<li>
								<a href="#" class="nav-link">Contact</a>
							</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>
		<div class="footer-main">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 infos-footer">
						<div class="module">
							<h3 class="modtitle-f">Contact Info</h3>
							<ul>
								<li class="adres">
									San Luis potosí, centro historico, 78000 san luis potosí, SPL, Mexico
								</li>
								<li class="phone">
									(+880) 1742-924545
								</li>
								<li class="mail">
									<a href="mailto:contact@glamourcrazebd.com">contact@glamourcrazebd.com</a>
								</li>
								<li class="time">
									Open time: 24/7 Day
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 box-footer">
						<div class="module clearfix">
							<h3 class="modtitle-f">My Account</h3>
							<div class="modcontent">
								<ul class="menu">
									<li><a href="#">Brands</a></li>
									<li><a href="#">Gift Certificates</a></li>
									<li><a href="#">Affiliates</a></li>
									<li><a href="#">Specials</a></li>
									<li><a href="#">FAQs</a></li>
									<li><a href="#">Custom Link</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 box-footer">
						<div class="module clearfix">
							<h3 class="modtitle-f">Information</h3>
							<div class="modcontent">
								<ul class="menu">
									<li><a href="#">About Us</a></li>
									<li><a href="#">FAQ</a></li>
									<li><a href="#">Warranty And Services</a></li>
									<li><a href="#">Support 24/7 page</a></li>
									<li><a href="#">Product Registration</a></li>
									<li><a href="#">Product Support</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 box-footer">
						<div class="module clearfix">
							<h3 class="modtitle-f">Services</h3>
							<div class="modcontent">
								<ul class="menu">
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Support</a></li>
									<li><a href="#">Site Map</a></li>
									<li><a href="#">Customer Service</a></li>
									<li><a href="#">Custom Link</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 text-center">
						<p>GlamourCraze ©<?php echo date('Y');?> Online Store. All Rights Reserved. Powered By <a href="http://www.Orbslab.org" target="_blank">Orbslab.org</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>