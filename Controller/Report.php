<?php
// require '../../session_start.php';
require '../../database.php';

class Report 
{
    private $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function getStorage()
    {
        // storage 
        $statament = $this->conn->prepare("SELECT * FROM storage");
        $statament->execute();
        $storage = $statament->fetchAll();
        return $storage;
        
    }
    public function getReportStorage($id){
        $data = [];
        // var_dump($id);
        $statament = $this->conn->prepare("SELECT * FROM `product` WHERE storage_id = ?");
        $statament->execute([$id]);
        $product = $statament->fetchAll();

        $report = [];
        $total_cost = 0;
        $total_price = 0;
        $total_count = 0;

        foreach($product as $value){
            $total_cost = $total_cost + ($value['cost'] * $value['count']);
            $total_price = $total_price + ($value['price'] * $value['count']);
            $total_count = $total_count + $value['count'];

        }
        $report['total_cost'] = $total_cost;
        $report['total_price'] = $total_price;
        $report['total_count'] = $total_count;

        $data['product'] = $product;
        $data['report'] = $report;

        return $data;
    }
    public function getCategory(){
        // category
        $statament = $this->conn->prepare("SELECT * FROM category");
        $statament->execute();
        $category = $statament->fetchAll();
        return $category;
    }
    public function getReportCategory($id){
        $data = [];
        // var_dump($id);
        $statament = $this->conn->prepare("SELECT * FROM `product` WHERE category_id = ?");
        $statament->execute([$id]);
        $product = $statament->fetchAll();

        $report = [];
        $total_cost = 0;
        $total_price = 0;
        $total_count = 0;

        foreach($product as $value){
            $total_cost = $total_cost + ($value['cost'] * $value['count']);
            $total_price = $total_price + ($value['price'] * $value['count']);
            $total_count = $total_count + $value['count'];

        }
        $report['total_cost'] = $total_cost;
        $report['total_price'] = $total_price;
        $report['total_count'] = $total_count;

        $data['product'] = $product;
        $data['report'] = $report;

        return $data;
    }
}