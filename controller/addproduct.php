<?php
	include_once 'header.php';
?>

 			<form action="" method="post" enctype="multipart/form-data" runat="server">
          <div class="form-group col-md-12 view-img">
            <center>
              <img src="../images/add_photo.png" id="add-img" alt="add" height="260px" width="237px"><br><br>
              <input class="btn btn-info" type="file" name="image" required="1" accept="image/*" onchange="readURL(this);"/>
            </center>
          </div><br><br>
        <div class="form-group">
		    	<label for="usr">Name:</label>
		      	<input type="text" class="col-md-6 form-control" name="name" placeholder="Enter Your Product Name" required="1">
		    </div>
		    <div class="form-group">
					<label for="comment">Details:</label>
					<textarea class="col-md-6 form-control" rows="5" name="details" placeholder="Write About Your Product. Like Available Color, Available Size etc" required="1"></textarea>
				</div>
				<div class="form-group">
					<label for="sel1">Status :</label>
            <select class="col-md-6 form-control" name="status" required="1">
            	<option selected="1" disabled="1">Select Status</option>
              <option value="10">10% Discount</option>
              <option value="20">20% Discount</option>
              <option value="30">30% Discount</option>
              <option value="40">40% Discount</option>
              <option value="50">50% Discount</option>
              <option value="60">60% Discount</option>
              <option value="70">70% Discount</option>
              <option value="80">80% Discount</option>
              <option value="90">90% Discount</option>
              <option value="sold out">Sold Out</option>
            </select>
		    </div>
		    <div class="form-group">
		    	<label for="usr"> Price :</label>
		      <input required type="text" class="col-md-6 form-control" placeholder="Enter Your Product Price" name="price">
		    </div>
		    <div class="form-group">
		    	<label for="sel1">Catagory :</label>
          <select required class="col-md-6 form-control" name="category">
          	<option selected="1" disabled="1">Select Category</option>
            <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM category");
                    $stmt->execute();
                    $orders = $stmt->rowCount();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      
            ?>
                    <option value="<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></option>
            <?php
                    }
                } catch(PDOException $e) {
                  echo "Error: ".$e->getMessage();
                }
            ?>
          </select>
        </div>
        <div class="baton">
          <button class="btn btn-success" role="button" name="submit"> Save </button>
          <button class="btn btn-danger" role="button" name="cancel"> Cancel </button>
        </div>
			</form>

      <?php
        date_default_timezone_set("Asia/Dhaka");

        if (isset($_POST['submit'])) {
          $pic_path = "product_pic/".time().$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],$pic_path);

          $name = $_POST['name'];
          $details = $_POST['details'];
          $status = $_POST['status'];
          $price = $_POST['price'];
          $cate = $_POST['category'];

          $up_date = date("Y-m-d");

          try {
              $sql = "INSERT INTO product_list (name, details, img, status, price, category, up_date) VALUES ('$name', '$details', '$pic_path', '$status', '$price', '$cate', '$up_date')";
              $conn->exec($sql);
              echo '<script type="text/javascript">alert("Product Successfully Added!")</script>';
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
        }

        $conn = null;

        include_once 'footer.php';
      ?>