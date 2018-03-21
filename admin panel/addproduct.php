<?php
	include_once 'header.php';
?>
   		<center>
			<div class="col-md-12 view-img">
				<img src="images/add_photo.png" alt="add" height="260px" width="237px"><br><br>
				<a href="#" class="btn btn-info" role="button">Upload</a>
			</div>
		</center><br><br>

   		<div>
   			<form>
			    <div class="form-group">
			    	<label for="usr">Name:</label>
			      	<input type="text" class="col-md-6 form-control" id="usr">
			    </div>
			    <div class="form-group">
					<label for="comment">Details:</label>
					<textarea class="col-md-6 form-control" rows="5" id="comment"></textarea>
				</div>
				<div class="form-group">
					<label for="sel1">Status :</label>
                    <select class="col-md-6 form-control">
                    	<option>Discount</option>
                    	<option>0%</option>
                        <option>10%</option>
                        <option>20%</option>
                        <option>30%</option>
                        <option>40%</option>
                        <option>50%</option>
                        <option>60%</option>
                        <option>70%</option>
                        <option>80%</option>
                        <option>90%</option>
                        <option>Sold Out</option>
                    </select>
			    </div>
			    <div class="form-group">
			    	<label for="usr"> Price:</label>
			      	<input type="text" class="col-md-6 form-control" id="usr">
			    </div>
			    <div class="form-group">
			    	<label for="sel1">Catagory :</label>
                    <select class="col-md-6 form-control">
                    	<option></option>
                        <option>Saari</option>
                        <option>Kameez</option>
                        <option>Bedsheet</option>
                    </select>
                </div>
				</form>
   		</div>
   		<div class="baton">
   			<a href="#" class="btn btn-success" role="button">
                Save
            </a>
            <a href="#" class="btn btn-danger" role="button">
                Cancel
            </a>
   		</div>

<?php
	include_once 'footer.php';
?>