<?php
require '../../autoload.php';
$object = new Category($pdo);
$result = $object->getAllStorage();

if($_SERVER['REQUEST_METHOD'] = 'POST' and isset($_POST['delete'])){
    $object->destroy($_POST['id']);
}

?>


<?php
require "../../includes/head.php";
?>
<main id="main" class="main" style="min-height:100vh;">
<h4>Hamma kategoriyalar sahifasi</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
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
                <td><?=$value['description']   ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="id" value="<?= $value['id']  ?>">
                        <button class="btn btn-danger">O'chirish</button>
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