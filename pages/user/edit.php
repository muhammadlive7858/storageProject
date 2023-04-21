<?php
    
    require "../../autoload.php";
    // update
    $object = new User($pdo);
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['edit'])){
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['role'] = $_POST['role'];
        $data['password'] = $_POST['password'];

        $id = $_POST['id'];
        $responce = $object->update($id,$data);
        if($responce){
            header("Location: /pages/user/index.php");
        }
    }
    // find
    if(isset($_GET['id']))
    {
        $result = $object->edit($_GET['id']);
    }
    
    require "../../includes/head.php";
?>
    <main id="main" class="main" style="min-height:100vh;">
    <h4>Foydalanuvchi tahrirlash sahifasi</h4>
            <form action="" class="form-control" method="POST">
                <input type="hidden" name="edit" value="true">
                <input type="hidden" name="id"  value="<?= $result['id']  ?>">
                <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required value="<?= $result['name']   ?>">
                <input type="email" name="email" class="form-control m-1" placeholder="Email:" required value="<?= $result['email']   ?>"> 

                <select name="role" id="" class="form-control" id="yourRole">
                    <option value="director">Director</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="text" name="password" class="form-control m-1" placeholder="Password:" required> 

                <button class="btn btn-primary m-1">Saqlash</button>
            </form>
    </main>

  <?php
        require "../../includes/footer.php";
  ?>