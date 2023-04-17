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
    public function getAllStorage()
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name");
        $statament->execute();
        $storage = $statament->fetchAll();
        return $storage;
    }

    public function add($name,$description)
    {
        var_dump($_SESSION['message']);
        $statement = $this->conn->prepare("INSERT INTO $this->table_name(name,description) VALUES(:name,:description)");
        $result = $statement->execute([
            'name' => $name,
            'description' => $description
        ]);
        var_dump($result);
        if($result){
            // $_SESSION['message'] = "Omborxona yaratildi";
            header("Location:".__dir__."../pages/omborxona/index.php");
        }else{
            // $_SESSION['message'] = "Omborxona yaratilmadi";
            header("Location:".__dir__."../pages/omborxona/create.php");
        }
    }

    public function edit($id)
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE id = ?");
        $statament->execute([$id]);
        $storage = $statament->fetch();
        // var_dump($storage);
        return $storage;
    }
    public function update(int $storageId , array $data)
    {

    }

    public function destroy( int $storageId)
    {
        $statament = $this->conn->prepare("DELETE FROM $this->table_name WHERE id =?");
        $statament->execute([
            $storageId
        ]);
    }
}