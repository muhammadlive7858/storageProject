<?php
require '../../autoload.php';
$object = new Enter($pdo);
// search
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['name']))
{
    $name = $_POST['name'];
    $result = $object->search($name);
}
// plus
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['product']))
{
    $object->plus($_POST['product']);
}
//kirim
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['enter_product']))
{
    $data = [];
    $data['product'] = $_POST['enter_product'];
    $data['count'] = $_POST['count'];

    $object->enter($data);
}
?>


<?php
require "../../includes/head.php";
?>
<main id="main" class="main" style="min-height:100vh;">
<h4 class="text-center">Kirim sahifasi</h4>

    <form action="" class="form-control d-flex" method="post">
        <input type="text" name="name" class="form-control m-1" placeholder="Nomini kiriting:" required>
        <button class="btn btn-primary m-1">Qidirish</button>
    </form>
    <hr>
    <?php
        if(isset($result)):
    ?>
        <form action="" method="post" class="d-flex">
            <select name="product" id="" class="form-control m-1">
                <?php
                    foreach($result as $value):
                ?>
                        <option value="<?=$value['id']  ?>"><?=$value['name'] ?></option>
                <?php
                    endforeach;
                ?>
            </select>
            <button class="btn btn-primary m-1 ">Qo'shish</button>
        </form>
    <?php
        endif;
    ?>
    <!-- session -->
    <hr>
        <div class="d-flex w-100">
            <h5 class=" m-2 w-25">Nomi</h5>
            <h5 class=" m-2 w-25">Mavjud</h5>
            <h5 class=" m-2 w-25">Kirim soni</h5>

        </div> 
    <hr> 
    <form action="" method="POST" class="form-control">
    <?php
        $products = $_SESSION['enter_products'];   
        if(!empty($products)):
        foreach($products as $product):
    ?>
            <div class="d-flex w-100">
                <input type="hidden" name="enter_product[]" value="<?=$product['product_id']  ?>">
                <input type="text"  class="form-control m-1 w-25" placeholder="Nomi :"  value="<?=$product['name']  ?>" readonly>
                <input type="text"  class="form-control m-1 w-25" placeholder="Mavjud :"  value="<?=$product['count']  ?>" readonly>
                <input type="number" class="form-control m-1 w-25" placeholder="Kirim soni:" name="count[]" required>
            </div>
    <?php
        endforeach;
        endif;
    ?>
    <button class="btn btn-primary m-1">Kirim</button>
    </form>
</main>

<?php
require "../../includes/footer.php";
?>



