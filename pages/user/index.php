<?php
require '../../autoload.php';
$object = new User($pdo);
$result = $object->getAll();

if($_SERVER['REQUEST_METHOD'] = 'POST' and isset($_POST['delete'])){
    $object->destroy($_POST['id']);
}

?>
<?php
require "../../includes/head.php";
?>
<main id="main" class="main" style="min-height:100vh;">
<h4>Hamma tavarlar sahifasi</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Password</th>

                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $i = 1;
            foreach($result as $value):
        ?>
            <tr>
                <th scope="row"><?=$i++   ?></th>
                <td><?=$value['name']   ?></td>
                <td><?=$value['email']   ?></td>
                <td><?=$value['role']   ?></td>
                <td><?=$value['password']   ?></td>

                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="id" value="<?= $value['id']  ?>">
                        <button class="btn btn-danger" onclick="confirm('Haqiqatdan ham o\'chirmoqchimisiz?')">O'chirish</button>
                    </form>
                    <a href="edit.php?id=<?=$value['id'] ?>" class="btn btn-success">Tahrirlash</a>
                </td>
            </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>
    

</main>

<?php
require "../../includes/footer.php";
?>