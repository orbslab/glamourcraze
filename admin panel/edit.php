<?php
	include_once 'header.php';

  if(isset($_GET["num"])) {
      $id = $_GET["num"];
  }

  if (isset($_GET['delete'])) {
      $delete = $_GET['delete'];

      try {
          $del = "DELETE FROM product_list WHERE id='$delete'";
          $conn->exec($del);

          echo "<script>window.close();</script>";
      } catch(PDOException $e) {
        echo $del . "<br>" . $e->getMessage();
      }
  }

  try {
    $stmt = $conn->prepare("SELECT * FROM product_list WHERE id='$id'"); 
    $stmt->execute();

    if($stmt->rowCount() > 0) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 			<form enctype="multipart/form-data" action="" method="post">
        <div class="form-group col-md-12 view-img">
          <center>
            <img id="zoom_01" src="<?php echo $row['img'];?>" alt="add" height="260px" width="237px" data-zoom-image="<?php echo $row['img'];?>"><br><br>
            <input class="btn btn-info" type="file" name="img" accept="image/*" onchange="readURL(this);"/>
          </center>
        </div>
		    <div class="form-group">
		    	<label for="usr">Name:</label>
		      	<input type="text" class="col-md-6 form-control" name="name" value="<?php echo $row['name'];?>" required="1">
		    </div>
		    <div class="form-group">
				<label for="comment">Details:</label>
				<textarea class="col-md-6 form-control" rows="5" name="details" required="1"><?php echo $row['details'];?></textarea>
			</div>
			<div class="form-group">
				<label for="sel1">Status:</label>
          <select required class="col-md-6 form-control" name="status">
            <option value="<?php echo $row['status'];?>" selected>Select Status</option>
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
		    	<label for="usr"> Price:</label>
		      	<input type="text" class="col-md-6 form-control" name="price" value="<?php echo $row['price'];?>" required="1">
		    </div>
		    <div class="form-group">
		    	<label for="sel1">Select Catagory</label>
            <select required class="col-md-6 form-control" name="category">
            	<option value="<?php echo $row['category'];?>" selected>Select Category</option>
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
          <button class="btn btn-success" role="button" name="update"> Update </button>
          <a href="edit.php?delete=<?php echo $id;?>" class="btn btn-danger" role="button" name="delete"> Delete </a>
        </div>
			</form>

      <script>
          $('#zoom_01').elevateZoom({
            easing : true,
            scrollZoom : true
          });
      </script>

<?php
      date_default_timezone_set("Asia/Dhaka");

      if (isset($_POST['update'])) {
        
        if(!empty($_POST['img'])) {
          unlink($row['img']);
          $pic_path = "../product_pic/".time().$_FILES['img']['name'];
          move_uploaded_file($_FILES['img']['tmp_name'],$pic_path);

        } else {
          $pic_path = $row['img'];
        }

        $name = $_POST['name'];
        $details = $_POST['details'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $cate = $_POST['category'];

        $up_date = date("Y-m-d");

        try {
            $sql = "UPDATE product_list SET name='$name', details='$details', img='$pic_path', status='$status', price='$price', category='$cate', up_date='$up_date' WHERE id='$id'";
            
            $stmt1 = $conn->prepare($sql);
            $stmt1->execute();

        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
      }

      $conn = null;

      }
    }
  } catch(PDOException $e) {
    echo "Error: ".$e->getMessage();
  }

	include_once 'footer.php';
?>