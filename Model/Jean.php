<?php

namespace Model;

class Jean extends QueryBuilder
{
 protected $columns = ['id', 'username', 'password', 'email',  ];
 public $infos = [];
 public $table = 'users';
 private $connexion = null;
 public $id;
 public $username;
 public $password;
 public $email;

 public function __construct()
 {
 $this->connexion = new \PDO('mysql:host=localhost;dbname=test', 'root', 'root');
        $this->connexion->query("SET NAMES utf-8;");
 }

 public function getId()
 {
 return $this->id;
 }

 public function setId($id)
 {
 $this->id = $id;
 }

 public function getUsername()
 {
 return $this->username;
 }

 public function setUsername($username)
 {
 $this->username = $username;
 }

 public function getPassword()
 {
 return $this->password;
 }

 public function setPassword($password)
 {
 $this->password = $password;
 }

 public function getEmail()
 {
 return $this->email;
 }

 public function setEmail($email)
 {
 $this->email = $email;
 }

 public function getAll()
 {
 $data = [];
 $data[] = $this->id;
 $data[] = $this->username;
 $data[] = $this->password;
 $data[] = $this->email;
 return $this->infos = $data;
 }

 public function getWithId($id)
 {
 $exist = parent::exist($this->table, 'id', $id);
 if($exist === true)
 {
 $data = parent::getById($this->table, $id);
 $this->id = $data[0]['id'];
 $this->username = $data[0]['username'];
 $this->password = $data[0]['password'];
 $this->email = $data[0]['email'];
 return true;
 }
 else {
 return false;
 }
 }

}
