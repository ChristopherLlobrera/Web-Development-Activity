<?php include('header.php');
      include('try.php');
      session_start();
        $sql = 'SELECT * FROM crud.products';
        $query = $pdo->prepare($sql);
        $query->execute();
        $items= $query->fetchAll();
        unset ($_SESSION['success']);

       
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                <div>
                <a href="add.php" class="btn btn-primary">Add Record</a>
                </div>
            </div>
        </div>
        <br>
        <div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text center">ID</th>
                            <th class="text center">Product</th>
                            <th class="text center">Price</th>
                            <th class="text center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($items as $item) { ?>
                        <tr>
                            <td><?php echo($item['id']);?></td>
                            <td><?php echo($item['name']);?></td>
                            <td><?php echo($item['price']);?></td>
                            <td class="text center">
                                <a href="edit.php?id=<?php echo $item['id'];?>" class="btn btn-info">Edit</a>
                                <a href="delete.php?id=<?php echo $item['id'];?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                       <?php }?>
                    </tbody>
                </table>
            </div>
            
        </div>    
    </div>
<?php include('footer.php');?>    
    