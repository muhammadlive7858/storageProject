<?php
    
    require "../../autoload.php";
    // update
    $object = new Category($pdo);
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['edit'])){
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $id = $_POST['id'];
        $object->update($id,$data);
    }
    // find
    if(isset($_GET['id']))
    {
        $result = $object->edit($_GET['id']);
        // echo"<pre>";
        // var_dump(gettype($result));
        // echo"</pre>";
    }
    
?>
<?php
require "../../includes/head.php";
?>
    <main id="main" class="main" style="min-height:100vh;">
        <h4>Kategoriyalar tahrirlash sahifasi</h4>
            <?php
                if(isset($result)):
            ?>
                <form action="" class="form-control" method="POST">
                    <input type="hidden" name="edit" value="true">
                    <input type="hidden" name="id"  value="<?= $result['id']  ?>">
                    <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required value="<?= $result['name']   ?>">
                    <input type="text" name="description" class="form-control m-1" placeholder="Malumoti:" required value="<?= $result['description']   ?>"> 
                    <button class="btn btn-primary m-1">Saqlash</button>
                </form>
            <?php
                endif
            ?>
    </main>

  <?php
        require "../../includes/footer.php";
  ?>