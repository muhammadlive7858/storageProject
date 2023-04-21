<?php
require '../../database.php';

class User 
{
    private $conn;
    private $table_name = 'user';
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
        $sql = "UPDATE $this->table_name SET name = :name, email = :email,role = :role,password = :password WHERE id = :id";

        $values = array(
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':role' => $data['role'],
            ':password' => $this->hash($data['password']),

            ':id' => $id
        );

        $stmt = $this->conn->prepare($sql);
        $result =  $stmt->execute($values);
        return $result;
    }

    public function destroy( int $user_id)
    {
        $statament = $this->conn->prepare("DELETE FROM $this->table_name WHERE id =?");
        $statament->execute([
            $user_id
        ]);
        header('Location:/pages/user/index.php');
    }
    protected function hash(string $password){
        return md5("2023".md5("muhammad".$password));
    }protected function verify(string $password){
        return md5("2023".md5("muhammad".$password));
    }
}