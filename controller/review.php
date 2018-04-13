<?php
	include_once 'header.php';

    if(isset($_GET["delete"])) {
      $delete = $_GET["delete"];
    }

    try {
        $sql = "DELETE FROM review WHERE review_id='$delete'";

        $conn->exec($sql);

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
?>

		<table class="table table-bordered table-hover review">
            <thead>
                <tr class="text-center">
                	<th>Name</th>
                    <th>P. Id</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Time</th>
                    <th>Option</th>
                </tr>
            </thead>
                <tbody class="text-center">
                    <?php 
                        try {
                          $stmt = $conn->prepare("SELECT * FROM review"); 
                          $stmt->execute();

                          if($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['p_id'];?></td>
                        <td> <?php echo $row['rating'];?> </td>
                        <td><?php echo $row['comment'];?></td>
                        <td><?php echo $row['time'];?></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
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

            <!-- Modal -->
              <div class="modal fade" id="delete" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Review</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are You Sure To Delete This Review?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="review.php?delete=<?php echo $row['review_id'];?>" class="btn btn-danger"> Delete </a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

<?php
	include_once 'footer.php';
?>