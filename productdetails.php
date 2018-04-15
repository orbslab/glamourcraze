<?php 
    include_once 'header.php';

    if(isset($_GET["num"])) {
      $num = $_GET["num"];
    }

    if(isset($_GET["cart"])) {
        foreach ($_SESSION['cart'] as $value) {
            if($value == $_GET["cart"]) {
                $condition = true;
            }
        }

        if($condition == true) {
            echo '<script language="javascript"> alert("This Item Is Already On Cart") </script>';
        } else {
            array_push($_SESSION['cart'],$_GET["cart"]);
            ?><script>window.location="index.php";</script><?php
        }
        
    }

    try {
        $review = $conn->prepare("SELECT * FROM review WHERE p_id=?"); 
        $review->execute([$num]);

        if($review->rowCount() > 0) {

            while ($rev_row = $review->fetch(PDO::FETCH_ASSOC)) {

                switch ($rev_row['rating']) {
                    case 5:
                        $five++;
                        break;
                    case 4:
                        $four++;
                        break;
                    case 3:
                        $three++;
                        break;
                    case 2:
                        $two++;
                        break;
                    case 1:
                        $one++;
                        break;
                    default:
                        continue;
                }
            }
            $total_rev = $review->rowCount();
            $avg_rat = ((1*$one) + (2*$two) + (3*$three) + (4*$four) + (5*$five)) / $total_rev;
            $avg_rat = round($avg_rat);
        } else {
            $total_rev = 1;
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    try {
        $prod = $conn->prepare("SELECT * FROM product_list WHERE id=?"); 
        $prod->execute([$num]);

        if($prod->rowCount() > 0) {
            while ($prod_row = $prod->fetch(PDO::FETCH_ASSOC)) {

                $cata = $prod_row['category'];
?>

   <div class="row" style="padding: 20px; text-align: justify;">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <center>
                <img id="zoom_01" src="controller/<?php echo $prod_row['img'];?>" alt="product" height="400" data-zoom-image="controller/<?php echo $prod_row['img'];?>">
            </center>
        </div>
        <script>
          $('#zoom_01').elevateZoom({
            easing : true,
            scrollZoom : true
          });
        </script>
        <div class="col-md-3 an">
            <h1><?php echo $prod_row['name'];?></h1>
            <p><?php echo $prod_row['category'];?></p>
            <p class="rating">
            <?php
                for($i=1; $i<=$avg_rat; $i++) {
            ?>
                    <i class="fa fa-star" style="color: orange;"></i>
            <?php
                }

                for($i=1; $i<=5-$avg_rat; $i++) {
            ?>
                    <i class="fa fa-star"></i>
            <?php
                }
            ?>
            </p>
            <?php if($prod_row['status'] != '' && $prod_row['status'] != 'sold out') {?>
                <p class="up"><?php echo $prod_row['status'];?>% Discount</p>
            <?php   } else if($prod_row['status'] != '' && $prod_row['status'] == 'sold out') {?>
                <p class="up"><?php echo $prod_row['status'];?></p>
            <?php } ?>
            <p>Price: <span class="up"><?php echo $prod_row['price'];?></span> Taka Only</p>
            <p><?php echo $prod_row['details'];?></p>
            <a href="productdetails.php?num=<?php echo $num;?>&cart=<?php echo $prod_row['id'];?>"><button type="button" class="btn btn-primary btn-block">ADD TO CART</button></a>
        </div>
        <div class="col-md-2"></div>
    </div><br>

    <?php
                }
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
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
                            $rec = $conn->prepare("SELECT * FROM product_list WHERE category=? LIMIT 4"); 
                            $rec->execute([$cata]);

                            if($rec->rowCount() > 0) {
                                while ($rec_row = $rec->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-md-3">
                        <div class="column">
                            <div class="post-module">
                                <div class="thumbnail">
                                    <div class="date">
                                        <a href="productdetails.php?num=<?php echo $rec_row['id'];?>">
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

    <!--Rating-->
    <div class="container" id="rating-comment">
        <div class="row">
            <div class="col-lg-6  col-md-6">
                <div class="container" id="rating">

                    <span class="heading">User Rating</span>
                    
                    <?php
                        for($i=1; $i<=$avg_rat; $i++) {
                    ?>
                            <span class="fa fa-star checked"></span>
                    <?php
                        }

                        for($i=1; $i<=5-$avg_rat; $i++) {
                    ?>
                            <span class="fa fa-star"></span>
                    <?php
                        }
                    ?>
                    <p><?php echo $avg_rat." average based on ".$total_rev." reviews.";?></p><hr>

                    <div class="row star">
                        <div class="side">
                            <div>5 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:<?php echo round(100*($five/$total_rev));?>%"><?php echo round(100*($five/$total_rev));?>%</div>
                            </div>
                        </div>
                        <div class="side right"></div>
                        <div class="side">
                            <div>4 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width:<?php echo round(100*($four/$total_rev));?>%"><?php echo round(100*($four/$total_rev));?>%</div>
                            </div>
                        </div>
                        <div class="side right"></div>
                        <div class="side">
                            <div>3 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width:<?php echo round(100*($three/$total_rev));?>%"><?php echo round(100*($three/$total_rev));?>%</div>
                            </div>
                        </div>
                        <div class="side right"></div>
                        <div class="side">
                            <div>2 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar" style="width:<?php echo round(100*($two/$total_rev));?>%"><?php echo round(100*($two/$total_rev));?>%</div>
                            </div>
                        </div>
                        <div class="side right"></div>
                        <div class="side">
                            <div>1 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width:<?php echo round(100*($one/$total_rev));?>%"><?php echo round(100*($one/$total_rev));?>%</div>
                            </div>
                        </div>
                        <div class="side right"></div>
                    </div>
                </div>
            </div>

            <!--Comment-->
            <div class="col-lg-6 col-md-6">
              <div class="contact-form-area">
                <h5>Post Your Comment</h5><br>
                  <form action="" method="post">
                    <div class="row">
                      <div class="form-group col-md-6 col-xs-12">
                          <input class="form-control" type="text" placeholder="Name" id="fname" name="fname" required>
                      </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select required class="form-control" id="sel1" name="rate">
                                <option disabled>Give Rate</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5" selected>5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                          <textarea class="form-control" rows="4" placeholder="Type Your Comment" name="comment" required></textarea>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                          <button class="btn btn-primary" name="submit">Post Comment</button>
                        </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>

<?php
    date_default_timezone_set("Asia/Dhaka");

    if (isset($_POST['submit'])) {

      $name = $_POST['fname'];
      $comment = $_POST['comment'];
      $rate = $_POST['rate'];

      $up_date = date("Y-m-d");

      try {
          $give_rev = "INSERT INTO review (p_id, user_name, rating, comment, time) VALUES ('$num', '$name', '$rate', '$comment', '$up_date')";
          $conn->exec($give_rev);

      } catch(PDOException $e) {
        echo $give_rev . "<br>" . $e->getMessage();
      }
    }

    $conn = null;

    include_once 'footer.php';
?>