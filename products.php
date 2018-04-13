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
                                <div class="date"> <a href="#0">
                                    <div class="day"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
                                    </a> 
                                </div>
                                <img src="controller/<?php echo $csql_row['img'];?>" class="img-responsive" alt="">
                            </div>
                            <div class="post-content">
                                <div class="category">-10%</div>
                                <div class="sub_title text-center">
                                    <?php echo $csql_row['name'];?>
                                </div>
                                <div class="post-meta text-center"><span class="timestamp">TK : <?php echo $csql_row['price'];?></span></div>
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

            <div class="pagination">
                <a href="#"><<</a>
                <a href="#">1</a>
                <a href="#" class="active">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">>></a>
            </div>
        </div>
        <div class="col-md-1">
    </div>

<?php 
    include_once 'footer.php';
?>