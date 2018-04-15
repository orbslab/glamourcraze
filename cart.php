<?php 
	include_once 'header.php';

	if(isset($_GET['pid'])) {
		if (($key = array_search($_GET['pid'], $_SESSION['cart'])) !== false) {
		    unset($_SESSION['cart'][$key]);
		}
	}
?>

	<br><div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			  <h2>Selected Products</h2>
			  <div class="card">
			    <div class="card-header">
			    	<div class="card-text text-right">
			    		<a href="ordersuccess.php">Empty Cart</a>
			    	</div>
			    </div>
			    <div class="card-body">
			    	<?php
			    		foreach ($_SESSION['cart'] as $value) {
				            $orders .= $value.",";

				            try {
		                        $cart = $conn->prepare("SELECT * FROM product_list WHERE id='$value'"); 
		                        $cart->execute();

		                        if($cart->rowCount() > 0) {
		                            while ($cart_row = $cart->fetch(PDO::FETCH_ASSOC)) {
			    	?>
			    	<div class="row" style="border: 1px solid grey;">
			    		<div class="col-md-3">
			    			<img src="controller/<?php echo $cart_row['img'];?>" alt="item" height="150" width="150">
			    		</div>
			    		<div class="col-md-9">
			    			<div class="cart-item">
				    			<h5><?php echo $cart_row['name'];?></h5>
				    			<a href=""><?php echo $cart_row['category'];?></a>
				    			<p class="rating">
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    				<i class="fa fa-star"></i>
				    			</p>
				    			<p class="up"><?php echo $cart_row['price'];?> Taka</p>
				    			<a href="cart.php?remove=true&pid=<?php echo $cart_row['id'];?>" style="color: red;">Remove</a>
			    			</div>
			    		</div>
			    	</div>
			    	<?php
					    				$total +=  $cart_row['price'];

					    			}
		                        }
		                    } catch(PDOException $e) {
		                        echo "Error: " . $e->getMessage();
		                    }
		                }
	                ?>
			    </div>
			  </div>
		</div>
		<div class="col-md-3">
			<h2>Make Order</h2>
			  <div class="card bg-dark text-white">
			    <div class="card-header">
			    	<h5>Summary</h5>
			    </div>
			    <div class="card-body">
			    	<h4 class="up text-center">Total <?php echo $total?> Taka</h4><hr>
			    	
			    	<form action="" method="post">
					    <div class="input-group">
					    	<div class="input-group-prepend">
					        	<span class="input-group-text">
					        		<i class="fa fa-user"></i>
					        	</span>
					      	</div>
					      	<input type="text" class="form-control" name="cname" placeholder="Customer Name" required>
					    </div><br>
					    <div class="input-group">
					    	<div class="input-group-prepend">
					        	<span class="input-group-text">
					        		<i class="fa fa-phone"></i>
					        	</span>
					      	</div>
					      	<input type="number" name="cphone" class="form-control" placeholder="Phone Number" required>
					    </div><br>
					    <div class="input-group">
					    	<div class="input-group-prepend">
					        	<span class="input-group-text">
					        		<i class="fa fa-at"></i>
					        	</span>
					      	</div>
					      	<input type="email" name="cemail" class="form-control" placeholder="Email Address">
					    </div><br>
					    <div class="input-group">
					    	<div class="input-group-prepend">
					        	<span class="input-group-text">
					        		<i class="fa fa-location-arrow"></i>
					        	</span>
					      	</div>
					      	<input type="text" name="cadd" class="form-control" placeholder="Customer Address" required>
					    </div><hr>
					    <p><i class="fa fa-shopping-cart"></i> Cash On Delivery</p>
					    <button type="submit" class="btn btn-primary btn-block" name="order">CHECKOUT</button>
					</form>
			    </div>
			  </div>
		</div>
		<div class="col-md-1"></div>
	</div><br>

	<?php
		$orders = rtrim($orders,',');
		date_default_timezone_set("Asia/Dhaka");

	    if (isset($_POST['order'])) {

	      $name = $_POST['cname'];
	      $phone = $_POST['cphone'];
	      $email = $_POST['cemail'];
	      $add = $_POST['cadd'];
	      $up_date = date("Y-m-d h:i:sa");

	      try {
	          $give_ord = "INSERT INTO order_list (p_id, price, time, user_name, user_add, user_num, user_email, status) VALUES ('$orders', '$total', '$up_date', '$name', '$add', '$phone', '$email', '1')";
	          $conn->exec($give_ord);
	          echo "<script>window.location='ordersuccess.php';</script>";

	      } catch(PDOException $e) {
	        echo $give_ord . "<br>" . $e->getMessage();
	      }
	    }
	?>

	<div class="cart-rec">
        <center>
            <h4>You Might Also Like</h4>
        </center><br><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row best">
                    <?php
                        try {
                            $rec = $conn->prepare("SELECT * FROM product_list ORDER BY id DESC LIMIT 4"); 
                            $rec->execute();

                            if($rec->rowCount() > 0) {
                                while ($rec_row = $rec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-md-3">
                        <div class="column">
                            <div class="post-module">
                                <div class="thumbnail">
                                    <div class="date">
                                        <a href="#0">
                                            <div class="day"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
                                        </a>
                                    </div>
                                    <img src="controller/<?php echo $rec_row['img']; ?>" class="img-responsive" alt="product">
                                </div>
                                <div class="post-content">
                                    <a href="productdetails.php?num=<?php echo $rec_row['id'];?>">
                                        <?php if($rec_row['status'] != '' && $rec_row['status'] != 'sold out') {?>
                                            <div class="category">- <?php echo $rec_row['status'];?>%</div>
                                        <?php   } else if($rec_row['status'] != '' && $rec_row['status'] == 'sold out') {?>
                                            <div class="category"><?php echo $rec_row['status'];?></div>
                                        <?php } ?>
                                        <h2 class="sub_title text-center"><?php echo $rec_row['name'];?></h2>
                                        <div class="post-meta text-center"><span class="timestamp">TK : <?php echo $rec_row['price'];?></span></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                                }
                            }
                        } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

<?php 
	include_once 'footer.php';
?>