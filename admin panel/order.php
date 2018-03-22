<?php
    include_once 'header.php';
?>
        <h4>New Orders List</h4><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>Order Number</th>
                    <th>Product Id</th>
                    <th>Total Price</th>
                    <th>Order Time</th>
                    <th>More</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    try {
                        $stmt = $conn->prepare("SELECT * FROM order_list"); 
                        $stmt->execute();

                        if($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['order_num'];?></td>
                    <td><?php echo $row['p_id'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo $row['time'];?></td>
                    <td>
                        <a href="orderdetails.php?num=<?php echo $row['order_num'];?>" target="_blank" class="btn btn-info" role="button">Details</a>
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

<?php
    include_once 'footer.php';
?>