<?php
require '../../autoload.php';
$object = new Report($pdo);
$storage = $object->getStorage();
$category = $object->getCategory();

// if($_SERVER['REQUEST_METHOD'] == 'GET' and $_POST['storage_id']){
//     $id = $_GET['storage_id'];

//     $object->getReportStorage($id);
// }
?>


<?php
require "../../includes/head.php";
?>
<main id="main" class="main" style="min-height:100vh;">
<h4 class="text-center">Hisobot sahifasi</h4>

<h4>Omborlar</h4>
<div class="row">
    <?php
        foreach($storage as $box):
    ?>
        <div class="card col-md-3 m-3">
            <div class="card-body">
                <h4 class="card-title"><?=$box['name']  ?></h4>
                <p class="card-text"><?=$box['description']  ?></p>
                <a href="/pages/hisobot/storage.php?storage_id=<?=$box['id']  ?>" class="btn btn-primary">Ko'rish</a>
            </div>
        </div>
    <?php
        endforeach;
    ?>
</div>
<h4>Kategoriyalar</h4>
<div class="row">
    <?php
        foreach($category as $box):
    ?>
        <div class="card col-md-3 m-3">
            <div class="card-body">
                <h4 class="card-title"><?=$box['name']  ?></h4>
                <p class="card-text"><?=$box['description']  ?></p>
                <a href="/pages/hisobot/category.php?category_id=<?=$box['id']  ?>" class="btn btn-primary">Ko'rish</a>
            </div>
        </div>
    <?php
        endforeach;
    ?>
</div>

    

</main>

<?php
require "../../includes/footer.php";
?>



