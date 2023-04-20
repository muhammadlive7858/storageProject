<?php
require '../../autoload.php';
$object = new Report($pdo);

if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['storage_id'])){
    $id = $_GET['storage_id'];

    $result = $object->getReportStorage($id);
}
    $product = [];
    $report = [];

    foreach($result as $key =>$value){
        if($key == 'product'){
            $product = $value;
        }elseif($key == 'report'){
            $report = $value;
        }
    }

?>
<?php
require "../../includes/head.php";
?>
<main id="main" class="main" style="min-height:100vh;">
<h4 class="text-center">Hisobot sahifasi</h4>
<hr>
<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Jami</th>
                <th scope="col">Tannarx</th>
                <th scope="col">Narx</th>
                <th scope="col">Soni</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $i = 1;
            // foreach($report as $value):
        ?>
            <tr>
                <th scope="row">#</th>
                <td><?=$report['total_cost']   ?></td>
                <td><?=$report['total_price']   ?></td>
                <td><?=$report['total_count']   ?></td>
            </tr>
        <?php
            // endforeach;
        ?>
        </tbody>
    </table>    

<h4 class="">Tavarlar</h4>
<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Omborxona</th>
                <th scope="col">Kategoriya</th>
                <th scope="col">Muddati</th>
                <th scope="col">Tannarx</th>
                <th scope="col">Narx</th>
                <th scope="col">Soni</th>

                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $i = 1;
            foreach($product as $value):
        ?>
            <tr>
                <th scope="row"><?=$i++   ?></th>
                <td><?=$value['name']   ?></td>
                <td><?=$value['storage_id']   ?></td>
                <td><?=$value['category_id']   ?></td>
                <td><?=$value['term']   ?></td>
                <td><?=$value['cost']   ?></td>
                <td><?=$value['price']   ?></td>
                <td><?=$value['count']   ?></td>

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






