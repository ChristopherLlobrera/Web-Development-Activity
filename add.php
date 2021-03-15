<?php include('header.php');
      include('try.php');
      session_start();
      if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $price = $_POST['price'];

          $sql = 'INSERT INTO crud.products(name,price)VALUES(?,?)';
          $query = $pdo->prepare($sql);
          $query ->bindValue(1,$name);
          $query ->bindValue(2,$price);
          $query ->execute();
          
          $_SESSION['success'] = "<div class='alert alert-success' role ='alert'>Record Created</div>";
      }

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products - Add Product</h1>
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
                            <input type="text" name="name" class="form-control">   
                    </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label>Enter Product Price</label>
                            <input type="text" name="price" class="form-control">   
                    </div>
                </div>       
           </div>
           <div class="row">
                <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Submit Record" name="submit" >
                </div>
           </div>
        </form>
    </div>
    
<?php include('footer.php');?>