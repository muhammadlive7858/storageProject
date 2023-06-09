<?php
session_start();


class Enter
{   
    private $conn;
    private $table_name = 'product';
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function search($name)
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE name LIKE :name");
        $statament->execute(['name'=>'%'.$name.'%']);
        $product = $statament->fetchAll();
        return $product;
    }
    public function plus($id)
    {
        $session = $_SESSION['enter_products'];

        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE id = ?");
        $statament->execute([$id]);
        $product = $statament->fetch();
        if($_SESSION['enter_products'] == NULL){
            $_SESSION['enter_products'] = [];
            $data = [
                    'product_id'=>$product['id'],
                    'name'=>$product['name'],
                    'count'=>$product['count']    
            ];
            array_push($_SESSION['enter_products'], $data);
        }else{
            $data = [];
            foreach($_SESSION['enter_products'] as $value){
                if($product['id'] == $value['product_id']){
                
                }else{
                    array_push($data,[
                        'product_id'=>$value['product_id'],
                        'name'=>$value['name'],
                        'count'=>$value['count']
                    ]);
                }
            }
            array_push($data,[
                'product_id'=>$product['id'],
                'name'=>$product['name'],
                'count'=>$product['count']    
            ]);
            unset($_SESSION['enter_products']);
            $_SESSION['enter_products'] = [];
            $_SESSION['enter_products'] = $data;
        }
        // echo "<pre>";
        // print_r($_SESSION['enter_products']);
        // echo "</pre>";
        // die();

        return $product;
    }
    public function enter($data){
        $i = 0;
        $n = 0;
        //  echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        foreach($data['product'] as $key1=>$id)
        {
            foreach($data['count'] as $key2 =>$count){
                
                    if($key1 === $key2){
                        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE id = ?");
                        $statament->execute([$id]);
                        $product = $statament->fetch();

                        $sql = "UPDATE $this->table_name SET count = :count WHERE id = :id";

                        $values = array(
                            ':count' =>$product['count'] + $count,

                            ':id' => $id
                        );

                        $stmt = $this->conn->prepare($sql);
                        $result =  $stmt->execute($values);
                    }

                    // $n++;
            }
            // $i++;
        }
        unset($_SESSION['enter_products']);
        header("Location: /pages/tavar/index.php");
    }
    public function clear()
    {
        unset($_SESSION['enter_products']);
    }
}