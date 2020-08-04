<?php

class DB{
        public function connect(){
            $pdo = new PDO("mysql:dbname=lesson01; host=localhost;", "root", "");
            return $pdo;
        }
    
        public function insert(){
            return "insert into login_mypage(name, mail, password, picture, comments)
        values(?, ?, ?, ?, ?)";
        }
    
        public function select_login(){
            return "select * from login_mypage where mail = ? && password = ?";
        }
    
        public function update(){
            return "update login_mypage set name= ?,mail = ?, password = ?, comments = ? where id = ?  ";
        }
    
        public function select_update(){
            return "select * from login_mypage where id = ?";
        }
    

}


?>