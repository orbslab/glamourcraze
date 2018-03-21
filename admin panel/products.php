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
                <tr>
                    <td>1</td>
                    <td>lorem pinchi atom</td>
                    <td><img src="images/1.jpg" alt="dress" width="100px" height="100px"></td>
                    <td>899</td>
                    <td>Kameez</td>
                    <td>70%</td>
                    <td>25-04-2018</td>
                    <td>
                        <a href="edit.php" target="_blank" class="btn btn-info" role="button">Details</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>lorem pinchi atom</td>
                    <td><img src="images/2.jpg" alt="dress" width="100px" height="100px"></td>
                    <td>799</td>
                    <td>Saari</td>
                    <td>Sold Out</td>
                    <td>25-04-2018</td>
                    <td>
                        <a href="edit.php" target="_blank" class="btn btn-info" role="button">Details</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>lorem pinchi atom</td>
                    <td><img src="images/3.jpg" alt="dress" width="100px" height="100px"></td>
                    <td>599</td>
                    <td>Saari</td>
                    <td>50%</td>
                    <td>25-04-2018</td>
                    <td>
                        <a href="edit.php" target="_blank" class="btn btn-info" role="button">Details</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>lorem pinchi atom</td>
                    <td><img src="images/3.jpg" alt="dress" width="100px" height="100px"></td>
                    <td>999</td>
                    <td>Kameez</td>
                    <td>70%</td>
                    <td>25-04-2018</td>
                    <td>
                        <a href="edit.php" target="_blank" class="btn btn-info" role="button">Details</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>lorem pinchi atom</td>
                    <td><img src="images/2.jpg" alt="dress" width="100px" height="100px"></td>
                    <td>899</td>
                    <td>Sarri</td>
                    <td>Sold Out</td>
                    <td>25-04-2018</td>
                    <td>
                        <a href="edit.php" target="_blank" class="btn btn-info" role="button">Details</a>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>lorem pinchi atom</td>
                    <td><img src="images/1.jpg" alt="dress" width="100px" height="100px"></td>
                    <td>1050</td>
                    <td>Bed Sheet</td>
                    <td>70%</td>
                    <td>25-04-2018</td>
                    <td>
                        <a href="edit.php" target="_blank" class="btn btn-info" role="button">Details</a>
                    </td>
                </tr>
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