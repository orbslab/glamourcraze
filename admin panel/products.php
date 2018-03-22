<?php
	include_once 'header.php';
?>
		<h4>Your Products List</h4><br>
		<div class="row">
            <div class="col-md-3 col-sm-3">
                <form>
                    <div class="form-group">
                      <select class="form-control">
                            <option>Category</option>
                            <option>Saari</option>
                            <option>Kameez</option>
                            <option>Bedsheet</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-9 col-sm-9">
                <form class="form-inline" action="">
				    <div class="input-group col-sm-9">
				    	<div class="input-group-prepend">
				    		<span class="input-group-text"><i class="fa fa-search"></i></span>
				    	</div>
				    	<input type="text" class="form-control mr-sm-2" placeholder="Product Id, Product Name">
				    	<button class="btn btn-success" type="submit">Search</button>
				    </div> 
				</form>
            </div>
        </div><br>

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
                        $stmt = $conn->prepare("SELECT * FROM product_list"); 
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