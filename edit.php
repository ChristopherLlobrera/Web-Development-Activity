<?php 
    include('try.php');
    include('header.php');

    session_start();

    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not Found!');

    $sql = 'SELECT * FROM crud.products WHERE id = ?';
    $query = $pdo->prepare($sql);
    $query ->bindValue(1,$id);
    $query ->execute();
    $item = $query->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){      
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql2 = 'UPDATE crud.products SET name=?, price=? WHERE id = ?' ;
        
        $stmt = $pdo->prepare($sql2);
        $stmt ->bindValue(1,$name);
        $stmt ->bindValue(2,$price);
        $stmt ->execute();
        
        $_SESSION['success'] = "<div class='alert alert-success' role ='alert'>Record Updated</div>";
    }
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products - Edit Product</h1>
                <a href="index.php" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
        <form action="" method="POST">    
        <?php
            if(isset($_SESSION['success']))
            {
                echo $_SESSION['success'];
            }
        ?> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                            <label>Enter Product name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $item['name'];?>">   
                    </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label>Enter Product Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $item['price'];?>">   
                    </div>
                </div>       
           </div>
           <div class="row">
                <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Update Record" name="submit">
                </div>
           </div>
        </form>
    </div>
<?php include('footer.php');?>