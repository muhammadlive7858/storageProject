<?php
    require "../../includes/head.php";
    
    require "../../autoload.php";
    // update
    $object = new Storage($pdo);
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['edit'])){
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $id = $_POST['id'];
        $object->update($id,$data);
    }
    // find
    if(isset($_GET['id']))
    {
        $statament = $pdo->prepare("SELECT * FROM storage WHERE id = ?");
        $statament->execute([$id]);
        $result = $statament->fetch();
        // $result = $object->edit($_GET['id']);
        echo"<pre>";
        var_dump($result);
        echo"</pre>";
    }
    
?>
    <main id="main" class="main" style="min-height:100vh;">
    <h4>Omborxona tahrirlash sahifasi</h4>
            <form action="" class="form-control" method="POST">
                <input type="hidden" name="edit" value="true">
                <input type="hidden" name="id"  value="<?php $result['id']  ?>">
                <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required value="<?php $result['name']   ?>">
                <input type="text" name="description" class="form-control m-1" placeholder="Malumoti:" required value="<?php $result['description']   ?>"> 
                <button class="btn btn-primary m-1">Saqlash</button>
            </form>
    </main>

  <?php
        require "../../includes/footer.php";
  ?>