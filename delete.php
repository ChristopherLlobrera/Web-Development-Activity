<?php
    include('try.php');
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR : ID not found');
    

        $sql = 'DELETE FROM crud.products WHERE id = ?' ;             
        $query = $pdo->prepare($sql);
        $query ->bindValue(1,$id);
        $query->execute();
        header("Location:"  . "htttp://" . $_SERVER['http_HOST'] . '/');
        
?>