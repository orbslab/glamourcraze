<?php 
    include_once 'header.php';
?>
    <div class="container">
<?php
    try {
        $keyword = $_GET['keyword'];
        $keyword = htmlspecialchars($keyword);
        $conn->quote($keyword);
        $like_keyword = "%{$keyword}%";
        $category = $_GET['category'];

        if ($category != '') {
            $sql = $conn->prepare("SELECT * FROM product_list WHERE category='$category' AND name LIKE ?"); 
        }
        else {
            $sql = $conn->prepare("SELECT * FROM product_list WHERE name LIKE ?");
        }
        $sql->execute([$like_keyword]);

        if($sql->rowCount() > 0) {
            while ($row1 = $sql->fetch(PDO::FETCH_ASSOC)) {
?>
        <div class="card res-box">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 img">
                        <center><img src="controller/<?php echo $row1['img'];?>" alt="product" width="120" height="120"></center>
                    </div>
                    <div class="col-md-8">
                        <h5><?php echo $row1['name']; ?></h5>
                        <a href="#" style="color: grey;"><?php echo $row1['category']; ?></a>
                        <p class="rating" style="color: orange;">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p>
                        <a href="productdetails.php?num=<?php echo $row1['id'];?>">View Details</a>
                    </div>
                    <div class="col-md-2 details1">
                        <p><?php echo $row1['price']; ?> Taka</p>
                        <button type="button" class="btn btn-warning">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
                    }
                } else {
                    echo "<h1>Sorry, No Result Found!</h1>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $sql = null;
        ?>

        <!-- <div class="pagination">
            <a href="#"><<</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">>></a>
        </div> -->
    </div>

<?php 
    include_once 'footer.php';
?>