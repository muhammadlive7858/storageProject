<?php
// require '../../session_start.php';
require '../../database.php';

class Category
{
    private $conn;
    private $table_name = 'category';
    public function __construct($conn){
        $this->conn = $conn;
    }
    static function redirect($url) {
        header("Location: " . $url);
        exit();
    }
    public function getAll()
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name");
        $statament->execute();
        $storage = $statament->fetchAll();
        return $storage;
    }

    public function add($name,$description)
    {
        // var_dump($_SESSION['message']);
        $statement = $this->conn->prepare("INSERT INTO $this->table_name(name,description) VALUES(:name,:description)");
        $result = $statement->execute([
            'name' => $name,
            'description' => $description
        ]);
        header('Location:/pages/kategoriya/index.php');
    }

    public function edit($id)
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE id = ?");
        $statament->execute([$id]);
        $category = $statament->fetch();
        // var_dump($storage);
        return $category;
    }
    public function update(int $storageId , array $data)
    {
        $sql = "UPDATE $this->table_name SET name = :name, description = :description WHERE id = :id";

        $values = array(
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':id' => $storageId
        );

        $stmt = $this->conn->prepare($sql);
        $result =  $stmt->execute($values);
        header('Location:/pages/kategoriya/index.php');
    }

    public function destroy( int $storageId)
    {
        $statament = $this->conn->prepare("DELETE FROM $this->table_name WHERE id =?");
        $statament->execute([
            $storageId
        ]);
        header('Location:/pages/kategoriya/index.php');
    }
}