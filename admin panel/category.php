<?php
	include_once 'header.php';

    if(isset($_GET["delete"])) {
      $delete = $_GET["delete"];
    }

    try {
        $sql = "DELETE FROM category WHERE cat_id='$delete'";

        $conn->exec($sql);

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
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
                    <?php 
                        try {
                          $stmt = $conn->prepare("SELECT * FROM category"); 
                          $stmt->execute();

                          if($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $row['cat_id'];?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td>
                            <a href="category.php?delete=<?php echo $row['cat_id'];?>" class="btn btn-danger" role="button"> DELETE </a>
                        </td>
                    </tr>
                    <?php
                                }
                            }
                        } catch(PDOException $e) {
                            echo "Error: ".$e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <div class="addc">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr">Added New Catagory:</label>
                        <input type="text" class="form-control" name="cat" placeholder="Category Name">
                    </div>
                    <button class="btn btn-info" role="button" name="add">ADD</button>
                </form>
            </div>
        </div>

<?php
    if(isset($_POST['add'])) {
        
        $cat = $_POST['cat'];

        try {
            $stmt1 = "INSERT INTO category (cat_name) VALUES ('$cat')";
              $conn->exec($stmt1);

        } catch(PDOException $e) {
          echo $stmt1 . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

	include_once 'footer.php';
?>