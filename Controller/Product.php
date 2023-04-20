<?php
// require '../../session_start.php';
require '../../database.php';

class Product 
{
    private $conn;
    private $table_name = 'product';
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function getAll()
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name");
        $statament->execute();
        $product = $statament->fetchAll();
        return $product;
    }

    public function add($name,$storage_id,$category_id,$term,$cost,$price,$count)
    {
            $statement = $this->conn->prepare("INSERT INTO $this->table_name(name,storage_id,category_id,term,cost,price,count) VALUES(:name,:storage_id,:category_id,:term,:cost,:price,:count)");
            $result = $statement->execute([
                'name' => $name,
                'storage_id' => $storage_id,
                'category_id' => $category_id,
                'term'=>$term,
                'cost' => $cost,
                'price' => $price,
                'count' => $count
            ]);
            // var_dump($result);
            if($result){
                // $_SESSION['message'] = "Omborxona yaratildi";
                header('Location:/pages/tavar/index.php');
            }else{
                // $_SESSION['message'] = "Omborxona yaratilmadi";
                header('Location:/pages/tavar/create.php');
            }
    }

    public function edit($id)
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE id = ?");
        $statament->execute([$id]);
        $product = $statament->fetch();
        // var_dump($storage);
        return $product;
    }
    public function update(int $id , array $data)
    {
        $sql = "UPDATE $this->table_name SET name = :name, storage_id = :storage_id,category_id = :category_id,term = :term,cost = :cost,price = :price,count = :count WHERE id = :id";

        $values = array(
            ':name' => $data['name'],
            ':storage_id' => $data['storage_id'],
            ':category_id' => $data['category_id'],
            ':term' => $data['term'],
            ':cost' => $data['cost'],
            ':price' => $data['price'],
            ':count' => $data['count'],

            ':id' => $id
        );

        $stmt = $this->conn->prepare($sql);
        $result =  $stmt->execute($values);
        header('Location:/pages/tavar/index.php');
    }

    public function destroy( int $storageId)
    {
        $statament = $this->conn->prepare("DELETE FROM $this->table_name WHERE id =?");
        $statament->execute([
            $storageId
        ]);
        header('Location:/pages/tavar/index.php');
    }
}