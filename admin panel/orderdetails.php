<?php
	include_once 'header.php';

  if(isset($_GET["num"])) {
      $num = $_GET["num"];
  }
?>

	<h4>Order Details</h4><br>

  <?php 
    try {
      $stmt = $conn->prepare("SELECT * FROM order_list WHERE order_num='$num'"); 
      $stmt->execute();

      if($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $order_id = explode(",", $row['p_id']);
          
          foreach ($order_id as $value) {
            try {
              $stmt1 = $conn->prepare("SELECT * FROM product_list WHERE id='$value'");
              $stmt1->execute();

              if($stmt1->rowCount() > 0) {
                while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  ?>
                	<div class="row product-box">
                  	<div class="col-md-2">
                  		<img src="<?php echo $row1['img'];?>" alt="add" height="150px" width="150px">
                  	</div>
                  	<div class="col-md-10">
                  		<ul>
                  			<li>Product Name : <?php echo $row1['name'];?></li>
                  			<li>Product Id : <?php echo $row1['id'];?></li>
                  			<li>Product Category : <?php echo $row1['category'];?></li>
                  			<li>Product Price : <?php echo $row1['price'];?></li>
                        <li>Product Details : <?php echo $row1['details'];?></li>
                  		</ul>
                  	</div>
                	</div><br>
  <?php 
                }
              }
            } catch(PDOException $e) {
              echo "Error: ".$e->getMessage();
            }
          }
  ?>

  	<div class="user-details">
  		<h3>User Details</h3>
  		<p>Name: <?php echo $row['user_name'];?></p>
  		<p>Address: <?php echo $row['user_add'];?></p>
  		<p>Email: <?php echo $row['user_email'];?></p>
  		<p>Mobile: <?php echo $row['user_num'];?></p>
  	</div><br><br>
  <?php
        }
      }
    } catch(PDOException $e) {
      echo "Error: ".$e->getMessage();
    }
  ?>

  	<form action="" method="post">
  		<button class="btn btn-success" role="button" name="approve"> Approve </button>
      <button class="btn btn-danger" role="button" name="cancel"> Delete </button>
    </form>

<?php
  if(isset($_POST['approve'])) {
    try {
        $sql = "UPDATE order_list SET status='2' WHERE order_num='$num'";
        
        $stmt1 = $conn->prepare($sql);
        $stmt1->execute();

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
  }

	include_once 'footer.php';
?>