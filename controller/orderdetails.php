<?php
	include_once 'header.php';

  if(isset($_GET["num"])) {
      $num = $_GET["num"];
  }

  if(isset($_GET["delete"])) {
      $delete = $_GET["delete"];

      try {
          $del = "DELETE FROM order_list WHERE order_num='$delete'";
          $conn->exec($del);

          echo "<script>window.close();</script>";
      } catch(PDOException $e) {
        echo $del . "<br>" . $e->getMessage();
      }
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
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
    </form>

    <!-- Modal -->
      <div class="modal fade" id="delete" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Order</h4>
            </div>
            <div class="modal-body">
              <p>Are You Sure To Delete This Order?</p>
            </div>
            <div class="modal-footer">
              <a href="orderdetails.php?delete=<?php echo $num;?>" class="btn btn-danger" role="button" name="delete"> Delete </a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<?php

  if (isset($_POST['approve'])) {
    $to = $row['user_email'];
    $subject = "Your Order Is Accepted";

    $message = "
    <html>
    <head>
      <title>Your Order Is Accepted</title>
    </head>
    <body>
      <div style='border: 1px solid black; padding: 5px; width: 500px; text-align: justify;'>
        <h1 style='background: lightgreen; text-align: center; padding: 10px;'>Your Order Is Accepted</h1>
        <p>Dear Sir/Madam,</p>
        <p>After review your order, <b>GlamourCraze</b> team accept your order, hope as soon as possible we delivered your item to your given address.</p><br>
        <p>Thank You</p>
      </div>
    </body>
    </html>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: hello@orbslab.org' . "\r\n";

    mail($to,$subject,$message,$headers);


    try {
        $sql = "UPDATE order_list SET status='2' WHERE order_num='$num'";
        
        $stmt1 = $conn->prepare($sql);
        $stmt1->execute();

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    $alert = "Order is accepted";
    echo "<script type='text/javascript'>alert('$alert');</script>";
  }

	include_once 'footer.php';
?>