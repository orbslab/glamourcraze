<?php
	include_once 'header.php';
?>

		<div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>Category No</th>
                        <th>Cataegory Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>Lorem Ipson</td>
                        <td>
                            <button class="btn btn-danger" role="button"> DELETE </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lorem Ipson</td>
                        <td>
                            <button class="btn btn-danger" role="button"> DELETE </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Lorem Ipson</td>
                        <td>
                            <button class="btn btn-danger" role="button"> DELETE </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="addc">
                <form>
                    <div class="form-group">
                        <label for="usr">Added New Catagory:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Category Name">
                    </div>
                    <button class="btn btn-info" role="button">ADD</button>
                </form>
            </div>
        </div>

<?php
	include_once 'footer.php';
?>