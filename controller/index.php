<?php
	include_once 'header.php';
?>
		<!-- Page Name and Clock -->
		<div class="row">
			<div class="col-md-6">
				<img src="../images/glamour.png" width="200" height="100">
			</div>
			<div class="col-md-6 text-center">
				<center>
					<div class="watch">
				        <table class="tabBlock" align="center" cellspacing="0" cellpadding="0" border="0">
				            <tr><td class="clock" id="dc"></td>
				                <td>
				                    <table cellpadding="0" cellspacing="0" border="0">
				                        <tr><td class="clocklg" id="dc_hour"></td></tr>
				                        <tr><td class="clocklg" id="dc_second"></td></tr>
				                    </table>
				                </td>
				            </tr>
				        </table>
				    </div>
			    </center>
			</div>
		</div>

		<?php
			try {
	            $stmt = $conn->prepare("SELECT * FROM order_list WHERE status=2");
	            $stmt->execute();
	            $orders = $stmt->rowCount();
	            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          			$sell += $row['price'];
          		}

	            $stmt1 = $conn->prepare("SELECT * FROM product_list"); 
	            $stmt1->execute();
	            $products = $stmt1->rowCount();

	        } catch(PDOException $e) {
	        	echo "Error: ".$e->getMessage();
	        }
		?>
		<!-- Buttons -->
		<div class="row">
			<div class="col-md-4">
				<div class="card bg-primary text-white">
			    	<div class="card-body">
			    		<h1><?php echo $orders;?></h1>
			    		<p>Total Order</p>
			    	</div>
			  	</div>
			</div>
			<div class="col-md-4">
				<div class="card bg-success text-white">
			    	<div class="card-body">
			    	<h1><?php echo $sell;?> Taka</h1>
			    	<p>Total Sell</p>
			    </div>
			  	</div>
			</div>
			<div class="col-md-4">
				<div class="card bg-info text-white">
			    	<div class="card-body">
			    		<h1><?php echo $products;?></h1>
			    		<p>Total Products</p>
			    	</div>
			  	</div>
			</div>
		</div><br>

		<!-- Calender -->
		<div class="row cal-map">
			<div class="col-md-6"  style="overflow-y: scroll;">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Customer</th>
				        <th>Address</th>
				        <th>Email</th>
				      </tr>
				    </thead>
				    <tbody>
		    	<?php
                    try {
                        $query = $conn->prepare("SELECT user_name, user_add, user_email FROM order_list"); 
                        $query->execute();

                        if($query->rowCount() > 0) {
                            while ($q = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
				      <tr>
				        <td><?php echo $q['user_name'];?></td>
				        <td><?php echo $q['user_add'];?></td>
				        <td><?php echo $q['user_email'];?></td>
				      </tr>
				<?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
				    </tbody>
				  </table>
			</div>
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57903.16604574594!2d91.82596224696448!3d24.899759462898533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1521999150837" width="100%" height="400" style="border:1px solid black;" allowfullscreen></iframe>
			</div>
		</div>

<?php
	include_once 'footer.php';
?>