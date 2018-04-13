<?php
	include_once 'header.php';
?>
		<h4>Your Products List</h4><br>
        <form action="" method="get">
    		<div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <select class="form-control" name="cat">
                            <option disabled="1" selected> Select Category</option>
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
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="form-inline">
    				    <div class="input-group col-sm-9">
    				    	<div class="input-group-prepend">
    				    		<span class="input-group-text"><i class="fa fa-search"></i></span>
    				    	</div>
    				    	<input type="text" class="form-control mr-sm-2" placeholder="Product Id, Product Name" name="src" required="1">
    				    	<button class="btn btn-success" type"search">Search</button>
    				    </div> 
    				</div>
                </div>
            </div>
        </form><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>P. Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Catagories</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>More</th>
                </tr>
            </thead>
            <tbody class="text-center">

                <?php
                    try {
                        $src = $_GET['src'];
                        $src = htmlspecialchars($src);
                        $conn->quote($src);
                        $like_src = "%{$src}%";

                        if (isset($_GET['cat'])) {
                            $cat = $_GET['cat'];
                            $sql = $conn->prepare("SELECT * FROM product_list WHERE category='$cat' AND name LIKE ? OR id=?"); 
                        }
                        else {
                            $sql = $conn->prepare("SELECT * FROM product_list WHERE name LIKE ? OR id=?");
                        }
                        $sql->execute([$like_src, $src]);

                        if($sql->rowCount() > 0) {
                            while ($row1 = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                                <tr>
                                    <td><?php echo $row1['id']; ?></td>
                                    <td><?php echo $row1['name']; ?></td>
                                    <td><img src="<?php echo $row1['img']; ?>" alt="dress" width="100px" height="100px"></td>
                                    <td><?php echo $row1['price']; ?></td>
                                    <td><?php echo $row1['category']; ?></td>
                                    <td><?php echo $row1['status']; ?></td>
                                    <td><?php echo $row1['up_date']; ?></td>
                                    <td>
                                        <a href="edit.php?num=<?php echo $row1['id'];?>" target="_blank" class="btn btn-info" role="button">Details</a>
                                    </td>
                                </tr>
                <?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $sql = null;
                ?>
            </tbody>
        </table>
        <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>

<?php
	include_once 'footer.php';
?>