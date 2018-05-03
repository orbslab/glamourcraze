<?php 
    include_once 'header.php';

    $pbc = $_GET['cat'];
?>

    <div class="filter row m-top-10">
        <div class="col-sm-6">
            <ul>
                <p><b>Category</b></p>
                <li><a href="products.php?cat=All Category">All Category</a></li>
                <?php
                    try {
                        $op2 = $conn->prepare("SELECT * FROM category");
                        $op2->execute();
                        while ($op2_row = $op2->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <li class="dropdown-item">
                        <li><a href="products.php?cat=<?php echo $op2_row['cat_name'];?>"><?php echo $op2_row['cat_name'];?></a></li>
                    </li>
                <?php
                        }
                    } catch(PDOException $e) {
                      echo "Error: ".$e->getMessage();
                    }
                ?>
            </ul>
        </div>
        <div class="col-sm-6 m-l-5">
            <ul>
                <p><b>Filter</b></p>
                <li>
                    <div class="form-check">
                      <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=New Arrivals'">
                        <input type="checkbox" class="form-check-input" value="">New Arrival
                      </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                      <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=Most Rated'">
                        <input type="checkbox" class="form-check-input" value="">Most Rated
                      </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                      <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=High To Low Price'">
                        <input type="checkbox" class="form-check-input" value="">High To Low Price
                      </label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                      <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=Low To High Price'">
                        <input type="checkbox" class="form-check-input" value="">Low To High Price
                      </label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-2" style="border-right: 1px solid grey;">
            <div class="cat">
                <ul>
                    <p><b>Category</b></p>
                    <li><a href="products.php?cat=All Category">All Category</a></li>
                    <?php
                        try {
                            $op2 = $conn->prepare("SELECT * FROM category");
                            $op2->execute();
                            while ($op2_row = $op2->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <li class="dropdown-item">
                            <li><a href="products.php?cat=<?php echo $op2_row['cat_name'];?>"><?php echo $op2_row['cat_name'];?></a></li>
                        </li>
                    <?php
                            }
                        } catch(PDOException $e) {
                          echo "Error: ".$e->getMessage();
                        }
                    ?>
                </ul><hr>

                <ul>
                    <p><b>Filter</b></p>
                    <li>
                        <div class="form-check">
                          <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=New Arrivals'">
                            <input type="checkbox" class="form-check-input" value="">New Arrival
                          </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                          <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=Most Rated'">
                            <input type="checkbox" class="form-check-input" value="">Most Rated
                          </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                          <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=High To Low Price'">
                            <input type="checkbox" class="form-check-input" value="">High To Low Price
                          </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                          <label class="form-check-label" onclick="window.location.href='products.php?cat=<?php echo $pbc;?>&filter=Low To High Price'">
                            <input type="checkbox" class="form-check-input" value="">Low To High Price
                          </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <p class="tag"><a href="#"> <?php echo $pbc;?> ></a><a href="#"> <?php echo $_GET['filter'];?></a></p>
            <div class="row best pro-best">
                <?php
                    if($pbc == 'All Category') {
                        if($_GET['filter'] == 'New Arrivals') {
                            $csql = "SELECT * FROM product_list ORDER BY id DESC";
                        }
                        else if($_GET['filter'] == 'Most Rated') {
                            $csql = "SELECT * FROM product_list ORDER BY review ASC";
                        }
                        else if($_GET['filter'] == 'High To Low Price') {
                            $csql = "SELECT * FROM product_list ORDER BY price DESC";
                        }
                        else if($_GET['filter'] == 'Low To High Price') {
                            $csql = "SELECT * FROM product_list ORDER BY price ASC";
                        } else {
                            $csql = "SELECT * FROM product_list";
                        }
                    } else {
                        if($_GET['filter'] == 'New Arrivals') {
                            $csql = "SELECT * FROM product_list WHERE category=? ORDER BY id DESC";
                        }
                        else if($_GET['filter'] == 'Most Rated') {
                            $csql = "SELECT * FROM product_list WHERE category=? ORDER BY review ASC";
                        }
                        else if($_GET['filter'] == 'High To Low Price') {
                            $csql = "SELECT * FROM product_list WHERE category=? ORDER BY price DESC";
                        }
                        else if($_GET['filter'] == 'Low To High Price') {
                            $csql = "SELECT * FROM product_list WHERE category=? ORDER BY price ASC";
                        } else {
                            $csql = "SELECT * FROM product_list WHERE category=?";
                        }
                    }

                    try {
                        $csql = $conn->prepare($csql);
                        $csql->execute([$pbc]);

                        while ($csql_row = $csql->fetch(PDO::FETCH_ASSOC)) {
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
                                <img src="controller/<?php echo $csql_row['img']; ?>" class="img-responsive" alt="product">
                            </div>
                            <div class="post-content">
                                <a href="productdetails.php?num=<?php echo $csql_row['id'];?>">
                                    <?php if($csql_row['status'] != '' && $csql_row['status'] != 'sold out') {?>
                                        <div class="category">- <?php echo $csql_row['status'];?>%</div>
                                    <?php   } else if($csql_row['status'] != '' && $csql_row['status'] == 'sold out') {?>
                                        <div class="category"><?php echo $csql_row['status'];?></div>
                                    <?php } ?>
                                    <h2 class="sub_title text-center"><?php echo $csql_row['name'];?></h2>
                                    <div class="post-meta text-center"><span class="timestamp">TK : <?php echo $csql_row['price'];?></span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    } catch(PDOException $e) {
                      echo "Error: ".$e->getMessage();
                    }
                ?>
            </div>

            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
        <div class="col-md-1">
    </div>

<?php 
    include_once 'footer.php';
?>