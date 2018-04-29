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
                    <div class="col-md-2 details1 an">
                        <p><?php echo $row1['price']; ?> Taka</p>
                        <a href="productdetails.php?num=<?php echo $row1['id'];?>"><button type="button" class="btn btn-primary btn-block">ADD TO CART</button></a>
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

        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>

<?php 
    include_once 'footer.php';
?>