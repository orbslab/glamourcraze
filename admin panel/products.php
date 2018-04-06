<?php
	include_once 'header.php';

    $limit = 15;  
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;
?>
		<h4>Your Products List</h4><br>
        <form action="search.php" method="get">
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
                        $stmt = $conn->prepare("SELECT * FROM product_list LIMIT $start_from, $limit"); 
                        $stmt->execute();

                        if($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><img src="<?php echo $row['img']; ?>" alt="dress" width="100px" height="100px"></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['up_date']; ?></td>
                                    <td>
                                        <a href="edit.php?num=<?php echo $row['id'];?>" target="_blank" class="btn btn-info" role="button">Details</a>
                                    </td>
                                </tr>
                <?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
                try {
                    $pag = $conn->prepare("SELECT COUNT(id) FROM product_list");
                    $pag->execute();
                    $pag_row = $pag->fetch(PDO::FETCH_ASSOC);

                    $total_records = $pag_row[0];  
                    $total_pages = ceil($total_records / $limit);
                    $start_loop = $page;
                    $difference = $total_pages - $page;

                    if($difference <= 5) {
                        $start_loop = $total_pages - 5;
                    }
                    
                    $end_loop = $start_loop + 4;
                    
                    if($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='products.php?page=".($page - 1)."'>Previous</a></li>";
                    } else {
                        echo "<li class='page-item disabled' disabled><a class='page-link' href='products.php?page=".($page - 1)."'>Previous</a></li>";
                    }

                    for ($i=$start_loop; $i<=$end_loop; $i++) {  
                        echo "<li class='page-item'><a class='page-link' href='products.php?page=".$i."'>".$i."</a></li>";  
                    }

                    if($page <= $end_loop) {
                        echo "<li class='page-item'><a class='page-link' href='products.php?page=".($page + 1)."'>Next</a></li>";
                    } else {
                        echo "<li class='page-item disabled'><a class='page-link' href='products.php?page=".($page + 1)."'>Next</a></li>";
                    }
                } catch(PDOException $e) {
                  echo "Error: ".$e->getMessage();
                }
            ?>
        </ul>

<?php
	include_once 'footer.php';
?>