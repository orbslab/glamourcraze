<?php 
    include_once 'header.php';

    $pbc = $_GET['cat'];
?>

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-2" style="border-right: 1px solid grey;">
            <div class="cat">
                <ul>
                    <p><b>Category</b></p>
                    <li><a href="products.php?cat=All">All</a></li>
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
        </div>
        <div class="col-md-9">
            <div class="row best">
                <?php
                    if($pbc == 'All') {
                        $csql = "SELECT * FROM product_list";
                    } else {
                        $csql = "SELECT * FROM product_list WHERE category=?";
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
                <li><a href="#">Previous</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
        <div class="col-md-1">
    </div>

<?php 
    include_once 'footer.php';
?>