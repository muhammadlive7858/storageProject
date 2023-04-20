<?php
    
    
    require "../../autoload.php";
    
    $category = new Category($pdo);
    $category = $category->getAll();

    $storage = new Storage($pdo);
    $storage = $storage->getAll();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $object = new Product($pdo);

        $name = $_POST['name'];
        $storage_id = $_POST['storage_id'];
        $category_id = $_POST['category_id'];
        $term = $_POST['term'];
        $cost = $_POST['cost'];
        $price = $_POST['price'];
        $count = $_POST['count'];

        $object->add($name,$storage_id,$category_id,$term,$cost,$price,$count);
    }
    
    require "../../includes/head.php";
?>
    <main id="main" class="main" style="min-height:100vh;">
        <h4>Tavar yaratish sahifasi</h4>
        <form action="" class="form-control" method="POST">
                <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required>
                <h6 class="mx-1">Ombor tanlang:</h6>
                <select name="storage_id" id="" class="form-control m-1">
                    <?php
                        foreach($storage as $value):
                    ?>
                        <option value="<?=$value['id']  ?>"><?=$value['name']  ?></option>
                    <?php
                        endforeach;
                    ?>
                </select> 
                <h6 class="mx-1">Kategoriya tanlang:</h6>
                <select name="category_id" id="" class="form-control m-1">
                    <?php
                        foreach($category as $value):
                    ?>
                        <option value="<?=$value['id']  ?>"><?=$value['name']  ?></option>
                    <?php
                        endforeach;
                    ?>
                </select> 
                <h6 class="mx-1">Yaroqlilik muddati:</h6>
                <input type="date" name="term" id="" required class="form-control">
                <input type="number" name="cost" class="form-control m-1" placeholder="Tannarx:" required> 
                <input type="number" name="price" class="form-control m-1" placeholder="Baxosi:" required> 
                <input type="number" name="count" class="form-control m-1" placeholder="Soni:" required>

                <button class="btn btn-primary m-1">Saqlash</button>
        </form>
      
    </main>

  <?php
        require "../../includes/footer.php";
  ?>