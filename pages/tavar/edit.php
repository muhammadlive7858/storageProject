<?php
    require "../../includes/head.php";
    
    require "../../autoload.php";
    // update
    $object = new Product($pdo);
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['edit'])){
        $data['name'] = $_POST['name'];
        $data['storage_id'] = $_POST['storage_id'];
        $data['category_id'] = $_POST['category_id'];
        $data['term'] = $_POST['term'];
        $data['cost'] = $_POST['cost'];
        $data['price'] = $_POST['price'];
        $data['count'] = $_POST['count'];


        $id = $_POST['id'];
        $object->update($id,$data);
    }
    // find
    if(isset($_GET['id']))
    {
        $category = new Category($pdo);
        $category = $category->getAll();

        $storage = new Storage($pdo);
        $storage = $storage->getAll();

        $result = $object->edit($_GET['id']);
        // echo"<pre>";
        // var_dump($result);
        // echo"</pre>";
    }
    
?>
    <main id="main" class="main" style="min-height:100vh;">
    <h4>Tavar tahrirlash sahifasi</h4>
            <form action="" class="form-control" method="POST">
                <input type="hidden" name="edit" value="true">
                <input type="hidden" name="id"  value="<?= $result['id']  ?>">
                <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required value="<?= $result['name']   ?>">
                <h6 class="mx-1">Omborxona tanlang:</h6>
                <select name="storage_id" id="" class="form-control m-1">
                    <option value="<?= $result['storage_id']   ?>">O'zgarmasin</option>
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
                        <option value="<?= $result['category_id']   ?>">O'zgarmasin</option>
                    <?php
                        foreach($category as $value):
                    ?>
                        <option value="<?=$value['id']  ?>"><?=$value['name']  ?></option>
                    <?php
                        endforeach;
                    ?>
                </select> 
                <input type="date" name="term" class="form-control m-1" placeholder="Muddati:" required value="<?= $result['term']   ?>"> 
                <input type="number" name="cost" class="form-control m-1" placeholder="Tannarxi:" required value="<?= $result['cost']   ?>"> 
                <input type="number" name="price" class="form-control m-1" placeholder="Baxosi:" required value="<?= $result['price']   ?>"> 
                <input type="number" name="count" class="form-control m-1" placeholder="Soni:" required value="<?= $result['count']   ?>"> 

                <button class="btn btn-primary m-1">Saqlash</button>
            </form>
    </main>

  <?php
        require "../../includes/footer.php";
  ?>