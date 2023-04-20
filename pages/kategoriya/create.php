<?php
    require "../../includes/head.php";
    
    require "../../autoload.php";

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $object = new Category($pdo);
        $name = $_POST['name'];
        $description = $_POST['description'];
        $result = $object->add($name,$description);
        if(isset($result)){
            // $fullPath = $_SERVER['DOCUMENT_ROOT'];
            // header("Location: $fullPath/pages/index.php");
        }
    }
    
    
    
?>
    <main id="main" class="main" style="min-height:100vh;">
        <h4>Kategoriyalar yaratish sahifasi</h4>
        <form action="" class="form-control" method="post">
                <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required>
                <input type="text" name="description" class="form-control m-1" placeholder="Malumoti:" required> 
                <button class="btn btn-primary m-1">Saqlash</button>
        </form>
      
    </main>

  <?php
        require "../../includes/footer.php";
  ?>