<?php
// require '../../session_start.php';
require '../../database.php';



class AuthController 
{
    private $conn;
    private $table_name = 'user';
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function login($data)
    {
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name WHERE email = ?");
        $statament->execute([$data['email']]);
        $user = $statament->fetch();

        if($user and $user['password'] == $this->verify($data['password'])){
            $result = true; 
        }

        if($result){
            $user = [
                'id'=>$user['id'],
                'name'=>$user['name'],
                'role'=>$user['role'],
                'email'=>$user['email'],
                'password'=>$user['password']
            ];
            $_SESSION['user'] = $user;
        }
        // echo "<pre>";
        // print_r($_SESSION['user']);
        // echo"</pre>";
        // die();
        header('Location:/pages/auth/profile.php');
    }
    public function register($data){
        $statament = $this->conn->prepare("SELECT * FROM $this->table_name");
        $statament->execute();
        $users = $statament->fetchAll();

        foreach($users as $user){
            if($user['email'] == $data['email']){
                $response = "User's email already exit";
                $_SESSION['message'] = $response;
                return $response;
            }
        }

        $statement = $this->conn->prepare("INSERT INTO $this->table_name(name,email,role,password) VALUES(:name,:email,:role,:password)");
        $result = $statement->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password'=>$this->hash($data['password'])
        ]);
        if($result){
            $user = [
                'name'=>$data['name'],
                'role'=>$data['role'],
                'email'=>$data['email'],
                'password'=>$data['password']
            ];
            $_SESSION['user'] = $user;
        }
        // echo "<pre>";
        // print_r($_SESSION['user']);
        // echo"</pre>";
        // die();
        header('Location:/pages/auth/login.php');
    }
    public function logout(){
        unset($_SESSION['user']);
    }
    protected function hash(string $password){
        return md5("2023".md5("muhammad".$password));
    }protected function verify(string $password){
        return md5("2023".md5("muhammad".$password));
    }
}